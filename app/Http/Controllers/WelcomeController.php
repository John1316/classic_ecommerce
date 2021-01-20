<?php

namespace App\Http\Controllers;

use App\Main;
use App\Brand;
use App\Branch;
use App\Client;
use App\Slider;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome() {
        $features = Product::where('featured', 1)->get();
        $hotdeals = Product::where('hot_deal', 1)->get();
        $sliders = Slider::get();
        $partners = Client::get();
        return view('frontend.welcome', compact('features', 'hotdeals', 'sliders', 'partners'));
    }

    public function shop() {
        if(request()->has('sortby')) {
            if(request()->get('sortby') == 'featured') {
                $products = Product::latest()->where('featured', 1)->paginate(9);
            } elseif(request()->get('sortby') == 'lowtohigh') {
                $products = Product::orderBy('price_after_discount', 'asc')->paginate(9);
            } elseif(request()->get('sortby') == 'hightolow') {
                $products = Product::orderBy('price_after_discount', 'desc')->paginate(9);
            } elseif(request()->get('sortby') == 'newest') {
                $products = Product::orderBy('id', 'desc')->paginate();
            } else {
                $products = Product::latest()->where('hot_deal', 1)->paginate();
            }
            $products_view = view('frontend.ajax.products_filter', compact('products'))->render();
            return response()->json(['products_view' => $products_view], 200);
        } elseif(request()->has('keyword')) {
            if(app()->getLocale() == 'en') {
                $products = Product::latest()->where('en_name', 'like', "%".request()->get('keyword')."%")->paginate(9);
            } else {
                $products = Product::latest()->where('ar_name', 'like', "%".request()->get('keyword')."%")->paginate(9);
            }
            $products_view = view('frontend.ajax.products_filter', compact('products'))->render();
            return response()->json(['products_view' => $products_view], 200);
        } else {
            $products = Product::latest()->paginate(9);
            if(app()->getLocale() == 'en') {
                $productNames = Product::pluck('en_name')->toArray();
            } else {
                $productNames = Product::pluck('ar_name')->toArray();
            }
            return view('frontend.shop', compact('products', 'productNames'));
        }
    }

    public function branches() {
        $branches = Branch::latest()->get();
        return view('frontend.branches', compact('branches'));
    }

    public function brands(Brand $brand) {
        return view('frontend.brand', compact('brand'));
    }

    public function categories(Brand $brand, Category $category) {
        if(request()->has('sortby')) {
            if(request()->get('sortby') == 'featured') {
                $products = $category->products()->latest()->where('featured', 1)->paginate(9);
            } elseif(request()->get('sortby') == 'lowtohigh') {
                $products = $category->products()->orderBy('price_after_discount', 'asc')->paginate(9);
            } elseif(request()->get('sortby') == 'hightolow') {
                $products = $category->products()->orderBy('price_after_discount', 'desc')->paginate(9);
            } elseif(request()->get('sortby') == 'newest') {
                $products = $category->products()->orderBy('id', 'desc')->paginate(9);
            } else {
                $products = $category->products()->latest()->where('hot_deal', 1)->paginate(9);
            }
            $products_view = view('frontend.ajax.products_filter', compact('products', 'brand', 'category'))->render();
            return response()->json(['products_view' => $products_view], 200);
        } elseif(request()->has('keyword')) {
            if(app()->getLocale() == 'en') {
                $products = $category->products()->latest()->where('en_name', 'like', "%".request()->get('keyword')."%")->paginate(9);
            } else {
                $products = $category->products()->latest()->where('ar_name', 'like', "%".request()->get('keyword')."%")->paginate(9);
            }
            $products_view = view('frontend.ajax.products_filter', compact('products', 'brand', 'category'))->render();
            return response()->json(['products_view' => $products_view], 200);
        } else {
            $products = $category->products()->latest()->paginate(9);
            if(app()->getLocale() == 'en') {
                $productNames = $category->products()->latest()->pluck('en_name')->toArray();
            } else {
                $productNames = $category->products()->latest()->pluck('ar_name')->toArray();
            }
            return view('frontend.category', compact('brand', 'category', 'products', 'productNames'));
        }

    }

    public function productDetails(Product $product) {
        $similarProducts = Product::where('category_id', $product->category->id)->where('id', '!=', $product->id)->get();

        return view('frontend.product-details', compact('product', 'similarProducts'));
    }
}
