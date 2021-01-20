@extends('frontend.layouts.app')

@section('title')
  @if(app()->getLocale() == 'en')
    Home | Classic
  @else
    الرئيسية | كلاسيك
  @endif
@endsection

@section('classic-ecommerce')

@if(app()->getLocale() == 'en')
    
    @include('frontend.layouts.header')

    @include('frontend.layouts.loader')

    <!-- start main-content -->
    <main>

        <!-- start header -->
        <header class="header text-center p-0">
            <div data-provide="slider" data-autoplay="true" data-autoplay-speed="1000" data-arrows="true">
                @foreach($sliders as $sldier)
                <div><img class="h-620px w-100 mt-2" src="{{ asset('sliders/'. $sldier->image) }}"></div>
                @endforeach

            </div>
        </header>
        <!-- end header -->

        <!-- start full width ads -->
        <section class="ad pt-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-12">
                        <img class="h-90px w-100" src="{{ asset('main/'. $main->home_first_ad) }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- end full width ads -->

        <!-- section products  -->
        <section class="products">
            <div class="container-fluid">
                <h2 class="heading">Featured Products</h2>
                <div class="slider-arrows-circle-dark text-center" data-provide="slider" data-slides-to-show="4" data-arrows="true" data-autoplay-speed="1000" data-autoplay="true">
                    @foreach ($features as $post)
                        <div class="p-2 meduim-banner-size" >
                            <div class="products__card product-3 mb-3">
                                <a class="product-media" href="#">
                                    <span class="badge py-4 px-3 bg-main text-white badge-pos-right font-weight-bold"><s> {{ $post->price_before_discount }} EGP </s></span>
                                    <img class="h-150px w-100 img1" src="{{ asset('products/'. $post->image) }}" alt="">
                                </a>
                                <div class="products__controls">
                                    <ul class="list-unstyled justify-content-center">
                                        <li><button class="btn px-3 btn-white" data-toggle="modal" data-target="#modalFeatured{{$post->id}}"><i class="fa fa-search" aria-hidden="true"></i></button></li>
                                        <form action="{{ route('add-to-cart') }}" method="POST">
                                            @csrf
                                        <input type="hidden" name="product_id" value="{{ $post->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <li><button class="btn px-3 btn-white" type="submit"><i class="fa fa-cart-plus" aria-hidden="true"></i></button></li>
                                        </form>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <h6><a href="{{ route('productDetails', $post->en_slug) }}">{{ $post->en_name }}</a></h6>
                                <p class="font-weight-bold">Price : {{ $post->price_after_discount }} EGP</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>    
            </div>
        </section>

        <!-- modal begin -->
        @foreach($features as $post)
            <div class="modal fade" id="modalFeatured{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div data-provide="slider" data-autoplay="true" data-autoplay-speed="1000">
                                        <div><img class="h-250px w-100" src="{{ asset('products/'. $post->image) }}"></div>
                                        @foreach($post->productImages as $productImage)
                                            <div><img class="h-250px w-100" src="{{ asset('products/'. $productImage->image) }}"></div>
                                        @endforeach
                                    </div> 
                                </div>
                                <div class="col-lg-6 col-12">
                                    <h3 class="mb-3">{{ $post->en_name }}</h3>
                                    <p class="mb-3">{{ $post->en_text }}</p>
                                    <div class="price d-flex">
                                        <h4 class="text-main font-weight-bold mr-3">{{ $post->price_after_discount }} EGP</h4>
                                        <h4 class="font-weight-bold"><s>{{ $post->price_before_discount }} EGP</s></h4>
                                    </div>
                                    <div class="row no-gutters justify-content-between">
                                        <form action="{{ route('add-to-cart') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $post->id }}">
                                            <input class="form-control-sm w-60px" min="1" value="1" type="number" name="quantity">
                                            <button class="btn btn-main" type="submit">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
        <!-- modal end -->

        <!-- end products -->

        <!-- start counter -->
        <section class="counter bg-main my-3 py-9" style="background-image:linear-gradient(to top right , rgba(0,0,0,.09), rgba(0,0,0,0.2)) ,  url({{ asset('main/'. $main->home_number_banner) }}); background-size: 100% 100%; background-attachment: fixed;">
            <div class="container">
                <div class="row gap-y text-center ">

                    <div class="col-6 col-lg-3">
                        <p class="lead-8 mb-0 text-main" data-provide="countup" data-from="0" data-to="{{$main->home_first_number}}"></p>
                        <p class="text-uppercase ls-2 text-main">{{$main->en_home_first_number_title}}</p>
                    </div>

                    <div class="col-6 col-lg-3">
                        <p class="lead-8 mb-0 text-main" data-provide="countup" data-from="0" data-to="{{$main->home_second_number}}"></p>
                        <p class="text-uppercase ls-2 text-main">{{$main->en_home_second_number_title}}</p>
                    </div>

                    <div class="col-6 col-lg-3">
                        <p class="lead-8 mb-0 text-main" data-provide="countup" data-from="0" data-to="{{$main->home_third_number}}"></p>
                        <p class="text-uppercase ls-2 text-main">{{$main->en_home_third_number_title}}</p>
                    </div>

                    <div class="col-6 col-lg-3">
                        <p class="lead-8 mb-0 text-main" data-provide="countup" data-from="0" data-to="{{$main->home_fourth_number}}"></p>
                        <p class="text-uppercase ls-2 text-main">{{$main->en_home_fourth_number_title}}</p>
                    </div>

                </div>
            </div>
        </section>
        <!-- end counter -->
        
        <!-- start section deals -->
        <section class="deals"> 
            <h2 class="heading">New hot deals</h2>
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-12 deals__resposnive text-center">
                        <img class="meduim-banner-size" src="{{ asset('main/'. $main->home_second_ad) }}">
                    </div>
                    <div class="col-xl-9 col-12">
                        <div class="slider-arrows-circle-dark text-center" data-autoplay="true" data-provide="slider" data-slides-to-show="3" data-arrows="true">
                        @foreach($hotdeals as $deal)
                            <div class="px-2 meduim-banner-size">
                                <div class="product-3   mb-3">
                                    <a class="product-media" href="#">
                                        <span class="badge py-4 px-3 bg-gold text-white badge-pos-left">Gold</span>
                                        <img class="h-150px w-100" src="{{ asset('products/'. $deal->image) }}" alt="product">
                                    </a>
                                    <div class="product-detail">
                                        <h6><a href="{{ route('productDetails', $deal->en_slug) }}">{{ $deal->en_name }}</a></h6>
                                        <p class="font-weight-bold">Price : {{ $deal->price_after_discount }} EGP <s class="text-darkgray mx-2">{{ $deal->price_before_discount }} EGP</s></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>   
                    </div>
                </div>
                
            </div>
        </section>
        <!-- end section deals -->

        <!-- start section advantages -->
        <section class="advantages text-black">
            <h2 class="heading">Our Advantages </h2>
            <div class="container">
                <div class="row">
                    <div  class="col-lg-8 mx-auto">

                        <ol class="timeline">
                                <li class="timeline-item">
                                    <div class="row justify-content-between align-items-center no-gutters">
                                        <h4 class="fw-700 ml-5 ">{{$main->en_home_advantage_first_title}}</h4>
                                        <img src="{{ asset('main/'. $main->home_advantage_first_icon) }}" alt="" style="width:42px;height:52px;">

                                    </div>
                                        <p class="card-text">{{$main->en_home_advantage_first_text}}</p>
                                </li>

                                <li class="timeline-item">
                                    <div class="row justify-content-between align-items-center no-gutters">
                                        <img class="mr-3" src="{{ asset('main/'. $main->home_advantage_second_icon) }}" alt="" style="width:42px;height:52px;">

                                        <h4 class="fw-700 mr-6">{{$main->en_home_advantage_second_title}}</h4>

                                    </div>
                                    <p class="card-text">{{$main->en_home_advantage_second_text}}</p>
                                </li>

                                <li class="timeline-item">
                                    <div class="row justify-content-between align-items-center no-gutters">
                                        <h4 class="fw-700">{{$main->en_home_advantage_third_title}}</h4>

                                        <img class="" src="{{ asset('main/'. $main->home_advantage_third_icon) }}" alt="" style="width:42px;height:52px;">
                                    </div>
                                    <p class="card-text">{{$main->en_home_advantage_third_text}}</p>
                                </li>

                                <li class="timeline-item">
                                    <div class="row justify-content-between align-items-center no-gutters">
                                        <img src="{{ asset('main/'. $main->home_advantage_fourth_icon) }}" alt="" style="width:42px;height:52px;">

                                        <h4 class="fw-700 mr-3">{{$main->en_home_advantage_fourth_title}}</h4>

                                    </div>
                                    <p class="card-text">{{$main->en_home_advantage_fourth_text}}</p>
                                </li>
                        </ol>

                    </div>
                </div>
                
            </div>

        </section>
        <!-- end section advantages -->

        <!-- start sponsors methods -->
        <section class="sponsors">
            <h2 class="heading my-5">Partners</h2>
            <div class="container">
                <div class="text-center" data-provide="slider" data-slides-to-show="4" data-autoplay="true">
                    @foreach($partners as $partner)
                        <div class="p-2"><img src="{{ asset('clients/'. $partner->logo) }}" alt="{{ $partner->en_title }}" title="{{ $partner->en_title }}"></div>
                    @endforeach
                </div>
            </div>
            
        </section>
        <!-- end sponsors methods -->

    </main>
    <!-- main-content -->

    @include('frontend.layouts.mini-cart')

    @include('frontend.layouts.footer')

@else

    @include('frontend.layouts.header')

    @include('frontend.layouts.loader')

    <!-- start main-content -->
    <main>

        <!-- start header -->
        <header class="header text-center p-0">
            <div data-provide="slider" data-autoplay="false" data-arrows="true" dir="ltr">
                
                @foreach($sliders as $sldier)
                <div><img class="h-620px w-100 mt-2" src="{{ asset('sliders/'. $sldier->image) }}"></div>
                @endforeach

            </div>
        </header>
        <!-- end header -->

        <!-- start full width ads -->
        <section class="ad pt-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-12">
                        <img class="h-90px w-100" src="{{ asset('main/'. $main->home_first_ad) }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- end full width ads -->

        <!-- section products  -->
        <section class="products">
            <div class="container-fluid">
                <h2 class="heading">منتجاتنا المميزه</h2>
                <div dir="ltr" class="slider-arrows-circle-dark text-center" data-provide="slider" data-slides-to-show="4" data-arrows="true" data-autoplay-speed="1000" data-autoplay="true">
                    @foreach ($features as $post)
                        
                        <div class="p-2 meduim-banner-size" >
                            <div class="products__card product-3 mb-3">
                                <a class="product-media" href="#">
                                    <span class="badge py-4 px-3 bg-main text-white badge-pos-right font-weight-bold"><s> {{ $post->price_before_discount }} </s></span>
                                    <img class="h-150px w-100 img1" src="{{ asset('products/'. $post->image) }}" alt="">
                                </a>    
                                <div class="products__controls">
                                    <ul class="list-unstyled justify-content-center">
                                        <li><button class="btn px-3 btn-white" data-toggle="modal" data-target="#modalFeatured{{$post->id}}"><i class="fa fa-search" aria-hidden="true"></i></button></li>
                                        <form action="{{ route('add-to-cart') }}" method="POST">
                                             @csrf
                                            <input type="hidden" name="product_id" value="{{ $post->id }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <li><button class="btn px-3 btn-white" type="submit"><i class="fa fa-cart-plus" aria-hidden="true"></i></button></li>
                                        </form>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <h6><a href="{{ route('productDetails', $post->ar_slug) }}">{{ $post->ar_name }}</a></h6>
                                <p class="font-weight-bold">السعر : {{ $post->price_after_discount }} جنيه</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>    
            </div>
        </section>
        <!-- modal begin -->
        @foreach($features as $post)
            <div class="modal fade" id="modalFeatured{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div data-provide="slider" data-autoplay="true" data-autoplay-speed="1000" dir="auto">
                                        <div><img class="h-250px w-100" src="{{ asset('products/'. $post->image) }}"></div>
                                        @foreach($post->productImages as $productImage)
                                            <div><img class="h-250px w-100" src="{{ asset('products/'. $productImage->image) }}"></div>
                                        @endforeach
                                    </div> 
                                </div>
                                <div class="col-lg-6 col-12">
                                    <h3 class="mb-3">{{ $post->ar_name }}</h3>
                                    <p class="mb-3">{{ $post->ar_text }}</p>
                                    <div class="price d-flex">
                                        <h4 class="text-main font-weight-bold ml-3">{{ $post->price_after_discount }} جنيه</h4>
                                        <h4 class="font-weight-bold"><s>{{ $post->price_before_discount }} جنيه</s></h4>
                                    </div>
                                    <div class="row no-gutters justify-content-between">
                                        <form action="{{ route('add-to-cart') }}" method="POST">
                                        @csrf
                                            <input type="hidden" name="product_id" value="{{ $post->id }}">
                                            <input class="form-control-sm w-60px" min="1" value="1" type="number" name="quantity">
                                            <button class="btn btn-main" type="submit">اضف الى العربه</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
        <!-- modal end -->
        <!-- end products -->

        <!-- start counter -->

        <section class="counter bg-main my-3 py-9" style="background-image: linear-gradient(to top right , rgba(0,0,0,.09), rgba(0,0,0,0.2)) ,  url({{ asset('main/'. $main->home_number_banner) }}); background-size: 100% 100%; background-attachment: fixed;">
            <div class="container">
                <div class="row gap-y text-center ">

                    <div class="col-6 col-lg-3">
                        <p class="lead-8 mb-0 text-main" data-provide="countup" data-from="0" data-to="{{$main->home_first_number}}"></p>
                        <p class="text-uppercase ls-2 text-main">{{$main->ar_home_first_number_title}}</p>
                    </div>

                    <div class="col-6 col-lg-3">
                        <p class="lead-8 mb-0 text-main" data-provide="countup" data-from="0" data-to="{{$main->home_second_number}}"></p>
                        <p class="text-uppercase ls-2 text-main">{{$main->ar_home_second_number_title}}</p>
                    </div>

                    <div class="col-6 col-lg-3">
                        <p class="lead-8 mb-0 text-main" data-provide="countup" data-from="0" data-to="{{$main->home_third_number}}"></p>
                        <p class="text-uppercase ls-2 text-main">{{$main->ar_home_third_number_title}}</p>
                    </div>

                    <div class="col-6 col-lg-3">
                        <p class="lead-8 mb-0 text-main" data-provide="countup" data-from="0" data-to="{{$main->home_fourth_number}}"></p>
                        <p class="text-uppercase ls-2 text-main">{{$main->ar_home_fourth_number_title}}</p>
                    </div>

                </div>
            </div>
        </section>
        <!-- end counter -->
        
        <!-- start section deals -->
        <section class="deals"> 
            <h2 class="heading">افضل عروضنا</h2>
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-12 deals__resposnive text-center">
                        <img class="meduim-banner-size" src="{{ asset('main/'. $main->home_second_ad) }}">
                    </div>
                    <div class="col-xl-9 col-12">
                        <div dir="ltr" class="slider-arrows-circle-dark text-center" data-autoplay="true" data-provide="slider" data-slides-to-show="3" data-arrows="true">
                        @foreach($hotdeals as $deal)
                            <div class="px-2 meduim-banner-size">
                                <div class="product-3   mb-3">
                                    <a class="product-media" href="#">
                                        <span class="badge py-4 px-3 bg-gold text-white badge-pos-left">Gold</span>
                                        <img class="h-150px w-100" src="{{ asset('products/'. $deal->image) }}" alt="product">
                                    </a>

                                    <div class="product-detail">
                                        <h6><a href="{{ route('productDetails', $deal->ar_slug) }}">{{ $deal->ar_name }}</a></h6>
                                        <p class="font-weight-bold">السعر : {{ $deal->price_after_discount }} جنيه <s class="text-darkgray mx-2">{{ $deal->price_before_discount }} جنيه</s></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>   
                    </div>
                </div>
                
            </div>
        </section>
        <!-- end section deals -->

        <!-- start section advantages -->
        <section class="advantages text-black">
            <h2 class="heading">مميزاتنا</h2>
            <div class="container">
                <div class="row">
                    <div dir="ltr" class="col-lg-8 mx-auto">

                        <ol class="timeline">
                                <li class="timeline-item">
                                    <div class="row justify-content-between align-items-center no-gutters">
                                        <h4 class="fw-700 ml-4">{{$main->ar_home_advantage_first_title}}</h4>
                                        <img src="{{ asset('main/'. $main->home_advantage_first_icon) }}" alt="">

                                    </div>
                                        <p class="card-text">{{$main->ar_home_advantage_first_text}}</p>
                                </li>

                                <li class="timeline-item">
                                    <div class="row justify-content-between align-items-center no-gutters">
                                        <img class="mr-3" src="{{ asset('main/'. $main->home_advantage_second_icon) }}" alt="">

                                        <h4 class="fw-700 mr-6">{{$main->ar_home_advantage_second_title}}</h4>

                                    </div>
                                    <p class="card-text">{{$main->ar_home_advantage_second_text}}</p>
                                </li>

                                <li class="timeline-item">
                                    <div class="row justify-content-between align-items-center no-gutters">
                                        <h4 class="fw-700">{{$main->ar_home_advantage_third_title}}</h4>

                                        <img class="" src="{{ asset('main/'. $main->home_advantage_third_icon) }}" alt="">
                                    </div>
                                    <p class="card-text">{{$main->ar_home_advantage_third_text}}</p>
                                </li>

                                <li class="timeline-item">
                                    <div class="row justify-content-between align-items-center no-gutters">
                                        <img src="{{ asset('main/'. $main->home_advantage_fourth_icon) }}" alt="">

                                        <h4 class="fw-700 mr-3">{{$main->ar_home_advantage_fourth_title}}</h4>

                                    </div>
                                    <p class="card-text">{{$main->ar_home_advantage_fourth_text}}</p>
                                </li>
                        </ol>

                    </div>
                </div>
                
            </div>

        </section>
        <!-- end section advantages -->

        <!-- start sponsors methods -->
        <section class="sponsors">
            <h2 class="heading my-5">Partners</h2>
            <div class="container">
                <div class="text-center" data-provide="slider" data-slides-to-show="4" data-autoplay="true">
                    @foreach($partners as $partner)
                        <div class="p-2"><img src="{{ asset('clients/'. $partner->logo) }}" alt="{{ $partner->en_title }}" title="{{ $partner->en_title }}"></div>
                    @endforeach
                </div>
            </div>
            
        </section>
        <!-- end sponsors methods -->

    </main>
    <!-- main-content -->

    @include('frontend.layouts.mini-cart')

    @include('frontend.layouts.footer')

@endif

@endsection