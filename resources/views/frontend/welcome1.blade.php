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
            <div data-provide="slider" data-autoplay="false" data-arrows="true">
                
                <div><img class="h-620px w-100 mt-2" src="/frontend/assets/img/banner/Slider1.png"></div>
                <div><img class="h-620px w-100 mt-2" src="/frontend/assets/img/banner/3.png"></div>

            </div>
        </header>
        <!-- end header -->

        <!-- start full width ads -->
        <section class="ad pt-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-12">
                        <img class="h-90px w-100" src="/frontend/assets/img/720-90.png" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- end full width ads -->

        <!-- section products  -->
        <section class="products">
            <div class="container-fluid">
                <h2 class="heading">Featured Products</h2>
                <div class="slider-arrows-circle-dark text-center" data-provide="slider" data-slides-to-show="4" data-arrows="true" data-autoplay-speed="1000" data-autoplay="false">
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
        <section class="counter bg-main my-3 py-9" style="background-image: url(/frontend/assets/img/banner/Slider\ 2.png); background-size: 100% 100%; background-attachment: fixed;">
            <div class="container">
                <div class="row gap-y text-center ">

                    <div class="col-6 col-lg-3">
                        <p class="lead-8 mb-0 text-black" data-provide="countup" data-from="0" data-to="100"></p>
                        <p class="text-uppercase ls-2 text-black">Clients</p>
                    </div>

                    <div class="col-6 col-lg-3">
                        <p class="lead-8 mb-0 text-black" data-provide="countup" data-from="0" data-to="250"></p>
                        <p class="text-uppercase ls-2 text-black">Products</p>
                    </div>

                    <div class="col-6 col-lg-3">
                        <p class="lead-8 mb-0 text-black" data-provide="countup" data-from="0" data-to="330"></p>
                        <p class="text-uppercase ls-2 text-black">Reviews</p>
                    </div>

                    <div class="col-6 col-lg-3">
                        <p class="lead-8 mb-0 text-black" data-provide="countup" data-from="0" data-to="430"></p>
                        <p class="text-uppercase ls-2 text-black">Happy clients</p>
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
                        <img class="meduim-banner-size" src="/frontend/assets/img/300-250.png">
                    </div>
                    <div class="col-xl-9 col-12">
                        <div class="slider-arrows-circle-dark text-center" data-provide="slider" data-slides-to-show="3" data-arrows="true">
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
            <h2 class="heading">Our advantages</h2>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">

                        <ol class="timeline">
                                <li class="timeline-item">
                                    <h4 class="fw-700">Organic</h4>
                                    <p class="card-text">We use an organic ingredients in all our products to provide our consumers with high quality, delicious products</p>
                                </li>

                                <li class="timeline-item">
                                    <h4 class="fw-700">Healthy</h4>
                                    <p class="card-text">We offer you a wide range of products that are healthy without using Hydrogenated oils or Preservatives</p>
                                </li>

                                <li class="timeline-item">
                                    <h4 class="fw-700">Diversity</h4>
                                    <p class="card-text">We offer a variety of products such as butter cookies, tea biscuits, chocolate chip cookies, and digestive biscuit</p>
                                </li>

                                <li class="timeline-item">
                                    <h4 class="fw-700">Technology</h4>
                                    <p class="card-text">We use the latest machines and techniques to provide you with a unique products with a unique taste.</p>
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
                    <div class="p-2"><img src="/frontend/assets/img/visa-payement.png"></div>
                    <div class="p-2"><img src="/frontend/assets/img/fawry-en.png"></div>
                    <div class="p-2"><img src="/frontend/assets/img/bee.jpg"></div>
                    <div class="p-2"><img src="/frontend/assets/img/aman.png"></div>
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
                
                <div><img class="h-620px w-100 mt-2" src="/frontend/assets/img/banner/Slider1.png"></div>
                <div><img class="h-620px w-100 mt-2" src="/frontend/assets/img/banner/3.png"></div>

            </div>
        </header>
        <!-- end header -->

        <!-- start full width ads -->
        <section class="ad pt-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-12">
                        <img class="h-90px w-100" src="/frontend/assets/img/720-90.png" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- end full width ads -->

        <!-- section products  -->
        <section class="products">
            <div class="container-fluid">
                <h2 class="heading">منتجاتنا المميزه</h2>
                <div dir="ltr" class="slider-arrows-circle-dark text-center" data-provide="slider" data-slides-to-show="4" data-arrows="true" data-autoplay-speed="1000" data-autoplay="false">
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
                                        <h4 class="text-main font-weight-bold mr-3">{{ $post->price_after_discount }} جنيه</h4>
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
        <section class="counter bg-main my-3 py-9" style="background-image: url(/frontend/assets/img/banner/Slider\ 2.png); background-size: 100% 100%; background-attachment: fixed;">
            <div class="container">
                <div class="row gap-y text-center ">

                    <div class="col-6 col-lg-3">
                        <p class="lead-8 mb-0 text-black" data-provide="countup" data-from="0" data-to="100"></p>
                        <p class="text-uppercase ls-2 text-black">عملاء</p>
                    </div>

                    <div class="col-6 col-lg-3">
                        <p class="lead-8 mb-0 text-black" data-provide="countup" data-from="0" data-to="250"></p>
                        <p class="text-uppercase ls-2 text-black">منتجات</p>
                    </div>

                    <div class="col-6 col-lg-3">
                        <p class="lead-8 mb-0 text-black" data-provide="countup" data-from="0" data-to="330"></p>
                        <p class="text-uppercase ls-2 text-black">المراجعات</p>
                    </div>

                    <div class="col-6 col-lg-3">
                        <p class="lead-8 mb-0 text-black" data-provide="countup" data-from="0" data-to="430"></p>
                        <p class="text-uppercase ls-2 text-black">العملاء السعداء</p>
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
                        <img class="meduim-banner-size" src="/frontend/assets/img/300-250.png">
                    </div>
                    <div class="col-xl-9 col-12">
                        <div dir="ltr" class="slider-arrows-circle-dark text-center" data-provide="slider" data-slides-to-show="3" data-arrows="true">
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
                                        <h4 class="fw-700 ml-4">طبيعي</h4>
                                        <img src="/frontend/assets/img/organic.png" alt="">

                                    </div>
                                        <p class="card-text">نستخدم منتجات ومكونات طبيعية لنقدم لكم أفضل وأشهى المنتجات</p>
                                </li>

                                <li class="timeline-item">
                                    <div class="row justify-content-between align-items-center no-gutters">
                                        <img class="mr-3" src="/frontend/assets/img/heart.png" alt="">

                                        <h4 class="fw-700 mr-6">صحي</h4>

                                    </div>
                                    <p class="card-text">نقدم لكم منتجات متنوعة بكونات صحية خالية من الزيوت المهدرجة والمواد الحافظة</p>
                                </li>

                                <li class="timeline-item">
                                    <div class="row justify-content-between align-items-center no-gutters">
                                        <h4 class="fw-700">تنوع</h4>

                                        <img class="" src="/frontend/assets/img/cookies.png" alt="">
                                    </div>
                                    <p class="card-text">نقدم لكم منتجات متنوعة "بسكويت بالزبدة، بسكويت بالشوكولاتة، بسكويت شاي وبسكويت بالشوفان والدايجستف</p>
                                </li>

                                <li class="timeline-item">
                                    <div class="row justify-content-between align-items-center no-gutters">
                                        <img src="/frontend/assets/img/tech.png" alt="">

                                        <h4 class="fw-700 mr-3">تكنولوجيا</h4>

                                    </div>
                                    <p class="card-text">نستخدم أحدث الأجهزة والمعدات ووسائل التصنيع لنقدم لكم منتجات مميزة ذات طعم مميز وجودة عالية</p>
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
                    <div class="p-2"><img src="/frontend/assets/img/visa-payement.png"></div>
                    <div class="p-2"><img src="/frontend/assets/img/fawry-en.png"></div>
                    <div class="p-2"><img src="/frontend/assets/img/bee.jpg"></div>
                    <div class="p-2"><img src="/frontend/assets/img/aman.png"></div>
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