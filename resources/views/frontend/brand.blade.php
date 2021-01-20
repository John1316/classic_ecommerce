@extends('frontend.layouts.app')

@section('title')
  @if(app()->getLocale() == 'en')
    Home | {{ $brand->en_name }}
  @else
    الرئيسية | {{ $brand->ar_name }}
  @endif
@endsection

@section('classic-ecommerce')

    @if(app()->getLocale() == 'en')

        @include('frontend.layouts.header')

        @include('frontend.layouts.loader')

        <!-- start header -->
        <header class="pageheader d-flex align-items-center" style="background-image: linear-gradient(to top right , rgba(0,0,0,.09), rgba(0,0,0,0.2)) ,url({{ asset('brands/'. $brand->banner_image) }})">
            <div class="container pageheader__caption text-white">
                <h4 class="pageheader__caption--h4">{{ $brand->en_name }}</h4>
                <h6 class="pageheader__caption--h6"><i class="fa fa-home" aria-hidden="true"></i> \ {{ $brand->en_name }}</h6>
            </div>
        </header>
        <!-- end header -->

        <!-- Start product lists -->
    
        <!-- end product lists -->

        <!-- modal begin -->
        <section class="productlist">
            <div class="container">
                <div class="row">
                    @foreach ($brand->categories as $category)
                    <div class="col-12 col-lg-4 mb-3">
                        <div class="card text-white bg-img" style="background-image: url({{ asset('categories/'. $category->image) }})" data-overlay="5">
                            <div class="card-body">
                                <h5>{{$category->en_name}}</h5>
                                <p class="mb-0">{{ $category->products()->count() }} products</p>
                                <a class="fs-12 fw-600" href="{{ route('categories', [$brand->en_slug, $category->en_slug]) }}">Shop now <i class="fa fa-angle-right pl-1"></i></a>
                            </div>
                        </div>                            
                    </div>
                    @endforeach
                </div>
            </div>
            
        </section>
        <!-- modal end -->

        @include('frontend.layouts.mini-cart')

        @include('frontend.layouts.footer')

    @else

        @include('frontend.layouts.header')

        @include('frontend.layouts.loader')

        <!-- start header -->
        <header class="pageheader d-flex align-items-center" style="background-image:linear-gradient(to top right , rgba(0,0,0,.09), rgba(0,0,0,0.2)) ,url({{ asset('brands/'. $brand->banner_image) }})">
            <div class="container pageheader__caption text-white">
                <h4 class="pageheader__caption--h4">{{ $brand->ar_name }}</h4>
                <h6 class="pageheader__caption--h6"><i class="fa fa-home" aria-hidden="true"></i> \ {{ $brand->ar_name }}</h6>
            </div>
        </header>
        <!-- end header -->

        <!-- Start product lists -->

        <!-- end product lists -->

        <!-- modal begin -->
        <section class="productlist">
            <div class="container">
                <div class="row">
                    @foreach ($brand->categories as $category)
                    <div class="col-12 col-lg-4 mb-3">
                        <div class="card text-white bg-img" style="background-image: url({{ asset('categories/'. $category->image) }})" data-overlay="5">
                            <div class="card-body">
                                <h5>{{$category->ar_name}}</h5>
                                <p class="mb-0">{{ $category->products()->count() }} المنتجات</p>
                                <a class="fs-12 fw-600" href="{{ route('categories', [$brand->ar_slug, $category->ar_slug]) }}">اعرف المزيد<i class="fa fa-angle-left pr-1"></i></a>
                            </div>
                        </div>                            
                    </div>
                    @endforeach
                </div>
            </div>
            
        </section>
        <!-- modal end -->

        @include('frontend.layouts.mini-cart')

        @include('frontend.layouts.footer')

    @endif

@endsection