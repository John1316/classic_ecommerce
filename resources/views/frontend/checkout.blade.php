@extends('frontend.layouts.app')

@section('title')
    @if(app()->getLocale() == 'en')
        Home | Checkout
    @else
        الرئيسية | الدفع
    @endif
@endsection

@section('classic-ecommerce')

@if(app()->getLocale() == 'en')
    
    @include('frontend.layouts.header')

    @include('frontend.layouts.loader')

    <!-- start header -->
        <header class="pageheader d-flex align-items-center" style="background-image:url({{ asset('banner_images/'. $banner_images->checkout_banner_image) }})">
            <div class="container pageheader__caption text-white">
                <h4 class="pageheader__caption--h4">Checkout</h4>
                <h6 class="pageheader__caption--h6"><i class="fa fa-home" aria-hidden="true"></i> \ Checkout</h6>
            </div>
        </header>
    <!-- end header -->

    <!-- Main  -->
        <main class="main-content">

            <section class="checkout">
                <div class="container">

                <div class="row gap-y">
                    <div class="col-lg-8">

                        @foreach($orderDetails as $orderDetail)

                            <div class="card border-1">
                                <div class="card-body p-2">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-lg-3 col-12">
                                            <img class="checkout__img w-100" src="{{ asset('products/'. $orderDetail->product->image) }}" alt="">
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="card-description">
                                                <h4 class="mt-4">{{ $orderDetail->product->en_name }}</h4>
                                            </div>                            
                                        </div>
                                        <div class="col-lg-1 col-12 text-center">
                                            <h4>{{ $orderDetail->quantity }}</h4>
                                        </div>
                                        <div class="col-lg-2 col-12 text-center">
                                            <h4 class="price">{{ $orderDetail->price }} EGP</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>                    

                        @endforeach

                    </div>


                    <div class="col-lg-4">
                        <div class="cart-price">
                            <div class="row no-gutters justify-content-between">
                                <p>Location</p>
                                <p>{{$address->location->en_location}}</p>
                            </div>
                            <div class="row no-gutters justify-content-between">
                                <p>Address</p>
                                <p>{{ $address->address }}</</p>
                            </div>
                            <div class="row no-gutters justify-content-between">
                                <p>Phone</p>
                                <p>{{ auth()->user()->phone }}</p>
                            </div>
                        </div>

                        <div class="cart-price">
                            <div class="flexbox">
                                <div>
                                    <p ><strong>Subtotal:</strong></p>
                                    <p ><strong>Shipping:</strong></p>
                                    <p ><strong>Tax (%{{ $taxes }}):</strong></p>
                                    @if($promo != NULL)
                                        <p><strong>Discount (%{{ $promo->percentage }}):</strong></p>
                                    @endif
                                </div>

                                <div>
                                    <p>{{ $subTotal }} EGP</p>
                                    <p>{{ $delivery }} EGP</p>
                                    <p>{{ $taxesInNumber }} EGP</p>
                                    @if($promo != NULL)
                                        <p><strong>{{ $promoInNumber }}  EGP</strong></p>
                                    @endif
                                </div>
                            </div>

                            <hr>

                            <div class="flexbox">
                                <div>
                                    <p><strong>Total:</strong></p>
                                </div>

                                <div>
                                    <p class="fw-600">{{ $total }} EGP</p>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('confirm-checkout') }}" method="POST">
                            @csrf
                            <div class="row justify-content-end">
                                <div class="col-6">
                                    <button class="btn btn-block btn-main" type="submit">Checkout <i class="ti-angle-right fs-9"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>



                </div>
            </section>

        </main>
    <!-- end of main Content -->

    @include('frontend.layouts.mini-cart')

    @include('frontend.layouts.footer')

@else
    @include('frontend.layouts.header')

    @include('frontend.layouts.loader')

     <!-- start header -->
     <header class="pageheader d-flex align-items-center" style="background-image: url({{ asset('banner_images/'. $banner_images->checkout_banner_image) }})">
        <div class="container pageheader__caption text-white">
            <h4 class="pageheader__caption--h4">الدفع</h4>
            <h6 class="pageheader__caption--h6"><i class="fa fa-home" aria-hidden="true"></i> \ الدفع</h6>
        </div>
    </header>
<!-- end header -->

<!-- Main  -->
    <main class="main-content">

        <section class="checkout">
            <div class="container">

            <div class="row gap-y">
                <div class="col-lg-8">

                    @foreach($orderDetails as $orderDetail)

                        <div class="card border-1">
                            <div class="card-body p-2">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-lg-3 col-12">
                                        <img class="checkout__img w-100" src="{{ asset('products/'. $orderDetail->product->image) }}" alt="">
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="card-description">
                                            <h4 class="mt-4">{{ $orderDetail->product->ar_name }}</h4>
                                        </div>                            
                                    </div>
                                    <div class="col-lg-1 col-12 text-center">
                                        <h4>{{ $orderDetail->quantity }}</h4>
                                    </div>
                                    <div class="col-lg-2 col-12 text-center">
                                        <h4 class="price">{{ $orderDetail->price }} جنيه</h4>
                                    </div>
                                </div>
                            </div>
                        </div>                    

                    @endforeach

                </div>


                <div class="col-lg-4">
                    <div class="cart-price">
                        <div class="row no-gutters justify-content-between">
                            <p>الموقع : </p>
                            <p>{{$address->location->ar_location}}</p>
                        </div>
                        <div class="row no-gutters justify-content-between">
                            <p>العنوان : </p>
                            <p>{{ $address->address }}</</p>
                        </div>
                        <div class="row no-gutters justify-content-between">
                            <p>رقم الهاتف :</p>
                            <p>{{ auth()->user()->phone }}</p>
                        </div>
                        
                        {{-- <div class="flexbox">
                            <div>
                                <p><strong>الموقع : </strong></p>
                                <p><strong>العنوان : </strong></p>
                                <p><strong>رقم الهاتف : </strong></p>
                            </div>

                            <div>
                                <p>{{ $address->location->ar_location }}</p>
                                <p>{{ $address->address }}</p>
                                <p>{{ auth()->user()->phone }}</p>
                            </div>
                        </div> --}}
                    </div>

                    <div class="cart-price">
                        <div class="flexbox">
                            <div>
                                <p><strong> المجموع الفرعي : </strong></p>
                                <p><strong>الشحن :  </strong></p>
                                <p><strong>الضريبه (%{{ $taxes }}) : </strong></p>
                                @if($promo != NULL)
                                    <p><strong>خصم (%{{ $promo->percentage }}) : </strong></p>
                                @endif
                            </div>

                            <div>
                                <p>{{ $subTotal }} جنيه</p>
                                <p>{{ $delivery }} جنيه</p>
                                <p>{{ $taxesInNumber }} جنيه</p>
                                @if($promo != NULL)
                                    <p><strong>{{ $promoInNumber }}  جنيه</strong></p>
                                @endif
                            </div>
                        </div>

                        <hr>

                        <div class="flexbox">
                            <div>
                                <p><strong>الاجمالي:</strong></p>
                            </div>

                            <div>
                                <p class="fw-600">{{ $total }} جنيه</p>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('confirm-checkout') }}" method="POST">
                        @csrf
                        <div class="row justify-content-end">
                            <div class="col-6">
                                <button class="btn btn-block btn-main" type="submit">الدفع <i class="ti-angle-left fs-9"></i></button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>



            </div>
        </section>

    </main>
<!-- end of main Content -->

    @include('frontend.layouts.mini-cart')

    @include('frontend.layouts.footer')
@endif

@endsection