<?php

namespace App\Http\Controllers\BackEnd;

use App\BannerImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateBannerImagesRequest;

class BannerImagesController extends Controller
{
    public function index()
    {
        $rows = BannerImage::latest()->paginate(10);

        return view('backend.banner_images.index', compact('rows'));
    }

    public function edit($id)
    {
        $row = BannerImage::findorFail($id);

        return view('backend.banner_images.edit', compact('row'));
    }

    public function update(UpdateBannerImagesRequest $request, $id)
    {
        $bannerImage = BannerImage::findorFail($id);

        if($request->hasFile('cart_banner_image')) {
            $file = $request->file('cart_banner_image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('banner_images'), $fileName);

            if($bannerImage->cart_banner_image !== NULL) {
                if (file_exists(public_path('banner_images/'. $bannerImage->cart_banner_image))) {
                    unlink(public_path('banner_images/'. $bannerImage->cart_banner_image));
                }
            }
        }

        if($request->hasFile('checkout_banner_image')) {
            $file1 = $request->file('checkout_banner_image');
            $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
            $file1->move(public_path('banner_images'), $fileName1);

            if($bannerImage->checkout_banner_image !== NULL) {
                if (file_exists(public_path('banner_images/'. $bannerImage->checkout_banner_image))) {
                    unlink(public_path('banner_images/'. $bannerImage->checkout_banner_image));
                }
            }
        }

        if($request->hasFile('profile_banner_image')) {
            $file2 = $request->file('profile_banner_image');
            $fileName2 = time().str_random(10).'.'.$file2->getClientOriginalExtension();
            $file2->move(public_path('banner_images'), $fileName2);

            if($bannerImage->profile_banner_image !== NULL) {
                if (file_exists(public_path('banner_images/'. $bannerImage->profile_banner_image))) {
                    unlink(public_path('banner_images/'. $bannerImage->profile_banner_image));
                }
            }
        }

        if($request->hasFile('shop_banner_image')) {
            $file3 = $request->file('shop_banner_image');
            $fileName3 = time().str_random(10).'.'.$file3->getClientOriginalExtension();
            $file3->move(public_path('banner_images'), $fileName3);

            if($bannerImage->shop_banner_image !== NULL) {
                if (file_exists(public_path('banner_images/'. $bannerImage->shop_banner_image))) {
                    unlink(public_path('banner_images/'. $bannerImage->shop_banner_image));
                }
            }
        }

        if($request->hasFile('branches_banner_image')) {
            $file4 = $request->file('branches_banner_image');
            $fileName4 = time().str_random(10).'.'.$file4->getClientOriginalExtension();
            $file4->move(public_path('banner_images'), $fileName4);

            if($bannerImage->branches_banner_image !== NULL) {
                if (file_exists(public_path('banner_images/'. $bannerImage->branches_banner_image))) {
                    unlink(public_path('banner_images/'. $bannerImage->branches_banner_image));
                }
            }
        }

        if($request->hasFile('shipping_banner_image')) {
            $file5 = $request->file('shipping_banner_image');
            $fileName5 = time().str_random(10).'.'.$file5->getClientOriginalExtension();
            $file5->move(public_path('banner_images'), $fileName5);

            if($bannerImage->shipping_banner_image !== NULL) {
                if (file_exists(public_path('banner_images/'. $bannerImage->shipping_banner_image))) {
                    unlink(public_path('banner_images/'. $bannerImage->shipping_banner_image));
                }
            }
        }

        $requestArray = 
        [
        'cart_banner_image' => $request->hasFile('cart_banner_image') ? $fileName : $bannerImage->cart_banner_image,
        'checkout_banner_image' => $request->hasFile('checkout_banner_image') ? $fileName1 : $bannerImage->checkout_banner_image,
        'profile_banner_image' => $request->hasFile('profile_banner_image') ? $fileName2 : $bannerImage->profile_banner_image,
        'shop_banner_image' => $request->hasFile('shop_banner_image') ? $fileName3 : $bannerImage->shop_banner_image,
        'branches_banner_image' => $request->hasFile('branches_banner_image') ? $fileName4 : $bannerImage->branches_banner_image,
        'shipping_banner_image' => $request->hasFile('shipping_banner_image') ? $fileName5 : $bannerImage->shipping_banner_image,
        ] + $request->all();

        $bannerImage->update($requestArray);

        Session::flash('flash_message', 'Banner Images updated successfully');
        return redirect()->route('banner_images.index');
    }
}
