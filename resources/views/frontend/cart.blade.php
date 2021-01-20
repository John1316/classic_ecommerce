@extends('frontend.layouts.app')

@section('title')
    @if(app()->getLocale() == 'en')
        Home | Cart
    @else
        الرئيسية | عربة التسوق
    @endif
@endsection

@section('classic-ecommerce')

    @if(app()->getLocale() == 'en')
        
        @include('frontend.layouts.header')

        @include('frontend.layouts.loader')

        <!-- start header -->
            <header class="pageheader d-flex align-items-center" style="background-image: linear-gradient(to top right , rgba(0,0,0,.09), rgba(0,0,0,0.2)) , url({{ asset('banner_images/'. $banner_images->cart_banner_image) }})">
                <div class="container pageheader__caption text-white">
                    <h4 class="pageheader__caption--h4">Cart</h4>
                    <h6 class="pageheader__caption--h6"><i class="fa fa-home" aria-hidden="true"></i> \ Cart</h6>
                </div>
            </header>
        <!-- end header -->

        <!-- Main  -->
            <main class="main-content">

                <section class="checkout">
                    <div class="container">

                    @if(isset($order))
                        @if(Session::has('flash_message'))
                            <div class="{{ Session::get('flash_class') }}">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif

                        <div class="row gap-y  my-3">
                            <form action="{{ route('update-cart') }}" method="POST">
                                @csrf
                                <div class="col-12">
                                        @foreach($order->order_details as $orderDetail)
                                            <div class="card border-1">
                                                <div class="card-body p-2">
                                                    <div class="row align-items-center justify-content-between">
                                                        <div class="col-lg-3 col-12">
                                                            <img class="checkout__img w-100" src="{{ asset('products/'. $orderDetail->product->image) }}" alt="">
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="card-description">
                                                                <h5>{{ $orderDetail->product->en_name }}</h5>
                                                            </div>                            
                                                        </div>
                                                        <div class="col-lg-1 col-12 text-center">
                                                            <input type="number" value="{{ $orderDetail->quantity }}" min="1" class="form-control-sm w-70px" name="quantity[]">
                                                        </div>
                                                        <input type="hidden" name="products_id[]" value="{{ $orderDetail->product_id }}">
                                                        <div class="col-lg-3 col-12 text-center">
                                                            <h4 class="price">{{ $orderDetail->price }} EGP</h4>
                                                        </div>
                                                        <div class="col-lg-2 col-12 text-center">
                                                            <a href="{{ route('delete-from-cart', $orderDetail->id) }}" class="btn btn-lg btn-white text-danger fs-20"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                    
                                        @endforeach

                                    <div class="col-12">
                                        <div class="row no-gutters justify-content-end">
                                            <div class="col-lg-4 my-3">
                                                <button class="btn btn-block btn-green-light text-white" type="submit">Update Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="col-lg-6">
                                <div class="card border-1">
                                    <div class="card-body">
                                        <h5 class="card-title">Enter your coupon if you have one</h5>
                                        <form action="{{ route('apply-coupon') }}" method="POST">
                                        @csrf
                                            <div class="row no-gutters">
                                                <div class="col-12">
                                                    <input type="text" class="form-control mb-3" name="promo_code">
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-dark" type="submit">Apply coupon</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="cart-price bg-white border-1">
                                    <div class="flexbox">
                                    <div>
                                        <p><strong>Subtotal:</strong></p>
                                        @if($promoInNumber != NULL)
                                            <p><strong>Discount:</strong></p>
                                        @endif
                                    </div>

                                    <div>
                                        <p>{{ $subTotal }} EGP</p>
                                        @if($promoInNumber != NULL)
                                            <p>{{ $promoInNumber }} EGP</p>
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
                                    <div class="row justify-content-end mt-3">
                                    

                                        <div class="col-6">
                                            <a class="btn btn-block btn-main" href="{{ route('shipping-address') }}" type="submit">Checkout <i class="ti-angle-right fs-9"></i></a>
                                        </div>
                                    </div>
                                </div>

                                

                            </div>
                        </div>
                    @else
                        <h3>No Shopping cart yet</h3>
                    @endif

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
            <header class="pageheader d-flex align-items-center" style="background-image: linear-gradient(to top right , rgba(0,0,0,.09), rgba(0,0,0,0.2)) , url({{ asset('banner_images/'. $banner_images->cart_banner_image) }})">
                <div class="container pageheader__caption text-white">
                    <h4 class="pageheader__caption--h4">عربه التسوق</h4>
                    <h6 class="pageheader__caption--h6"> <i class="fa fa-home" aria-hidden="true"></i> \ عربه التسوق</h6>
                </div>
            </header>
        <!-- end header -->

        <!-- Main  -->
            <main class="main-content">

                <section class="checkout">
                    <div class="container">

                    @if(isset($order))
                        @if(Session::has('flash_message'))
                            <div class="{{ Session::get('flash_class') }}">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif

                        <div class="row gap-y my-3">
                            <form action="{{ route('update-cart') }}" method="POST">
                                @csrf
                                <div class="col-12">
                                        @foreach($order->order_details as $orderDetail)
                                            <div class="card border-1">
                                                <div class="card-body p-2">
                                                    <div class="row align-items-center justify-content-between">
                                                        <div class="col-lg-3 col-12">
                                                            <img class="checkout__img w-100" src="{{ asset('products/'. $orderDetail->product->image) }}" alt="">
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="card-description">
                                                                <h5>{{ $orderDetail->product->ar_name }}</h5>
                                                            </div>                            
                                                        </div>
                                                        <div class="col-lg-1 col-12 text-center">
                                                            <input type="number" value="{{ $orderDetail->quantity }}" min="1" class="form-control-sm w-70px" name="quantity[]">
                                                        </div>
                                                        <input type="hidden" name="products_id[]" value="{{ $orderDetail->product_id }}">
                                                        <div class="col-lg-3 col-12 text-center">
                                                            <h4 class="price">{{ $orderDetail->price }} جنيه</h4>
                                                        </div>
                                                        <div class="col-lg-2 col-12 text-center">
                                                            <a href="{{ route('delete-from-cart', $orderDetail->id) }}" class="btn btn-lg btn-white text-danger fs-20"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                    
                                        @endforeach

                                    <div class="col-12">
                                        <div class="row no-gutters justify-content-end">
                                            <div class="col-lg-4 my-3">
                                                <button class="btn btn-block btn-green-light text-white" type="submit">تعديل عربه التسوق</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="col-lg-6">
                                <div class="card border-1">
                                    <div class="card-body">
                                        <h5 class="card-title">ادخل خصمك اذا كان لديك واحد</h5>
                                        <form action="{{ route('apply-coupon') }}" method="POST">
                                        @csrf
                                            <div class="row no-gutters">
                                                <div class="col-12">
                                                    <input type="text" class="form-control mb-3" name="promo_code">
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-dark" type="submit">تطبيق الخصم</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="cart-price bg-white border-1">
                                    <div class="flexbox">
                                    <div>
                                        <p><strong>المجموع الفرعي:</strong></p>
                                        @if($promoInNumber != NULL)
                                            <p><strong>Discount:</strong></p>
                                        @endif
                                    </div>

                                    <div>
                                        <p>{{ $subTotal }} جنيه</p>
                                        @if($promoInNumber != NULL)
                                            <p>{{ $promoInNumber }} جنيه</p>
                                        @endif
                                    </div>
                                    </div>

                                    <hr>

                                    <div class="flexbox">
                                        <div>
                                            <p><strong>المجموع النهائي:</strong></p>
                                        </div>

                                        <div>
                                            <p class="fw-600">{{ $total }} جنيه</p>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end mt-3">
                                    

                                        <div class="col-6">
                                            <a class="btn btn-block btn-main" href="{{ route('shipping-address') }}" type="submit">الدفع <i class="ti-angle-left fs-9"></i></a>
                                        </div>
                                    </div>
                                </div>

                                

                            </div>
                        </div>
                    @else
                        <h3>لا توجد عربة تسوق حتى الآن</h3>
                    @endif

                    </div>

                </section>

            </main>
        <!-- end of main Content -->

        @include('frontend.layouts.mini-cart')

        @include('frontend.layouts.footer')

    @endif

@endsection