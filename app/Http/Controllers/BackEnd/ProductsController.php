<?php

namespace App\Http\Controllers\BackEnd;

use App\Product;
use App\Category;
use App\OrderDetail;
use App\ProductImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Product::latest()->paginate(10);

        return view('backend.products.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();

        return view('backend.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $requestArray = $request->all();
        
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('products'), $fileName);
        }

        function make_slug($string, $separator = '-') {
            $string = trim($string);
            $string = mb_strtolower($string, 'UTF-8');

            $string = preg_replace("/[^a-z0-9_\s\-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/u", "", $string);

            // Remove multiple dashes or whitespaces or underscores
            $string = preg_replace("/[\s\-]+/", " ", $string);

            // Convert whitespaces and underscore to the given separator
            $string = preg_replace("/[\s_]/", $separator, $string);

            return $string;
        }

        $ar_slug = make_slug($request->ar_name);

        if($request->hasFile('banner_image')) {
            $file1 = $request->file('banner_image');
            $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
            $file1->move(public_path('products'), $fileName1);
        }

        $requestArray = ['en_slug' => Str::slug($request->en_name), 'ar_slug' => $ar_slug, 'image' => $fileName, 'banner_image' => $fileName1] + $request->all();

        $product = Product::create($requestArray);

        if($request->hasFile('images')) {
            $files = $request->file('images');
            foreach($files as $file) {

                $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
                $file->move(public_path('products'), $fileName);

                $product->productImages()->create([
                    'image' => $fileName
                ]);

            }
        }

        Session::flash('flash_message', 'Product added successfully!');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findorFail($id);

        return view('backend.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Product::findorFail($id);

        $categories = Category::get();
        
        return view('backend.products.edit', compact('row', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $requestArray = $request->all();

        $product = Product::findorFail($id);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('products'), $fileName);

            if($product->image !== NULL) {
                if (file_exists(public_path('products/'. $product->image))) {
                    unlink(public_path('products/'. $product->image));
                }
            }
        }

        if($request->hasFile('banner_image')) {
            $file1 = $request->file('banner_image');
            $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
            $file1->move(public_path('products'), $fileName1);

            if($product->banner_image !== NULL) {
                if (file_exists(public_path('products/'. $product->banner_image))) {
                    unlink(public_path('products/'. $product->banner_image));
                }
            }
        }

        function make_slug($string, $separator = '-') {
            $string = trim($string);
            $string = mb_strtolower($string, 'UTF-8');

            $string = preg_replace("/[^a-z0-9_\s\-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/u", "", $string);

            // Remove multiple dashes or whitespaces or underscores
            $string = preg_replace("/[\s\-]+/", " ", $string);

            // Convert whitespaces and underscore to the given separator
            $string = preg_replace("/[\s_]/", $separator, $string);

            return $string;
        }

        $ar_slug = make_slug($request->ar_name);

        $requestArray = ['en_slug' => Str::slug($request->en_name), 'ar_slug' => $ar_slug,
            'image' => $request->hasFile('image') ? $fileName : $product->image,
            'banner_image' => $request->hasFile('banner_image') ? $fileName1 : $product->banner_image
        ] + $request->all();

        $product->update($requestArray);

        if($request->hasFile('images')) {
            $files = $request->file('images');
            foreach($files as $file) {

                $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
                $file->move(public_path('products'), $fileName);

                $product->productImages()->create([
                    'image' => $fileName
                ]);

            }
        }

        Session::flash('flash_message', 'Product updated successfully!');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findorFail($id);

        $product->update([
            'status' => 0
        ]);

        Session::flash('flash_message', 'Product disabled successfully!');
        return redirect()->route('products.index');
    }

    public function recover($id) {
        $product = Product::findorFail($id);

        $product->update([
            'status' => 1
        ]);

        Session::flash('flash_message', 'Product enabled successfully!');
        return redirect()->route('products.index');
    }

    public function deleteProductImages(Request $request, $id) {
        $productImage = ProductImage::findorFail($id);
        
        if (file_exists(public_path('products/'. $productImage->image))) {
            unlink(public_path('products/'. $productImage->image));
            $product = $productImage->product;
            $productImage->delete();
        }

        return redirect()->route('products.edit', $product->id);
    }
}
