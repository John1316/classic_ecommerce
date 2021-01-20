<?php

namespace App\Providers;

use App\Main;
use App\Brand;
use App\Category;
use App\ContactUs;
use App\BannerImage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('brands', Brand::get());
        view()->share('categories', Category::get());
        view()->share('contact_us', ContactUs::first());
        view()->share('main', Main::first());
        view()->share('banner_images', BannerImage::first());
    }
}
