@extends('frontend.layouts.app')

@section('title')
    @if(app()->getLocale() == 'en')
        Home | Shipping Address
    @else
        الرئيسية |  مكان التوصيل
    @endif
@endsection

@section('classic-ecommerce')
    @if(app()->getLocale() == 'en')
    
        @include('frontend.layouts.header')

        @include('frontend.layouts.loader')

        <!-- start header -->
        <header class="pageheader d-flex align-items-center" style="background-image:  linear-gradient(to top right , rgba(0,0,0,.09), rgba(0,0,0,0.2)) ,url({{ asset('banner_images/'. $banner_images->shipping_banner_image) }})">
            <div class="container pageheader__caption text-white">
                <h4 class="pageheader__caption--h4">Shipping Address</h4>
                <h6 class="pageheader__caption--h6"><i class="fa fa-home" aria-hidden="true"></i> \ Shipping Address</h6>
            </div>
        </header>
        <!-- end header -->

        <!-- Main  -->
        <main class="main-content my-8">

            <section class="checkout">
                <div class="container">

                @if(Session::has('flash_message'))
                    <div class="{{ Session::get('flash_class') }}">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
                <div class="row">
                    <form action="{{ route('confirm-shipping-address') }}" method="POST">
                    @csrf
                        @foreach($userAddresses as $userAddress)
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="choosen_address" value="{{ $userAddress->id }}" required>
                                <label class="custom-control-label">{{ $userAddress->location->en_location }} ({{ $userAddress->address }})</label>
                            </div>
                        @endforeach
                        <button class="btn btn-main" type="submit">Check out</button>
                        <button class="btn btn-white text-main shadow-5 my-5" type="button" id="newAddressBtn">New address</button>

                    </form>
                </div>
                <div class="row no-gutters">
                        
                    
                    <div class="col-12" id="newAddress">
                        <div class="custom-control custom-radio my-3">
                            <input type="radio" class="custom-control-input" name="choosen_address">
                            <label class="custom-control-label">New address</label>
                        </div>
                        <form action="{{ route('add-new-address') }}" method="POST">
                            <div class="form-row">
                                    @csrf
                                    <div class="col-md-6 form-group">
                                        <select class="form-control" name="area">
                                            @foreach($areas as $area)
                                                <option value="{{ $area->id }}">{{ $area->en_location }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <input class="form-control" type="text" placeholder="Address" name="address">
                                    </div>
                                    
                                    <button class="btn btn-main ml-3" type="submit">Save Address</button>
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
    <header class="pageheader d-flex align-items-center" style="background-image:  linear-gradient(to top right , rgba(0,0,0,.09), rgba(0,0,0,0.2)) , url({{ asset('banner_images/'. $banner_images->shipping_banner_image) }})">
        <div class="container pageheader__caption text-white">
            <h4 class="pageheader__caption--h4">عنوان الشحن</h4>
            <h6 class="pageheader__caption--h6"><i class="fa fa-home" aria-hidden="true"></i> \ عنوان الشحن</h6>
        </div>
    </header>
    <!-- end header -->

    <!-- Main  -->
    <main class="main-content my-8">

        <section class="checkout">
            <div class="container">

            @if(Session::has('flash_message'))
                <div class="{{ Session::get('flash_class') }}">
                    {{ Session::get('flash_message') }}
                </div>
            @endif
            <div class="row">
                    <form action="{{ route('confirm-shipping-address') }}" method="POST">
                    @csrf
                        @foreach($userAddresses as $userAddress)
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="choosen_address" value="{{ $userAddress->id }}" required>
                                <label class="custom-control-label">{{ $userAddress->location->ar_location }} ({{ $userAddress->address }})</label>
                            </div>
                        @endforeach
                        <button class="btn btn-main my-5" type="submit">الدفع</button>
                        <button class="btn btn-white text-main shadow-5 my-5" type="button" id="newAddressBtn">عنوان جديد</button>

                    </form>
                </div>
            <div class="row no-gutters">
                
                
                <div class="col-12" id="newAddress">
                    <div class="custom-control custom-radio my-3">
                        <input type="radio" class="custom-control-input" name="choosen_address">
                        <label class="custom-control-label">عنوان جديد</label>
                    </div>
                    <form action="{{ route('add-new-address') }}" method="POST">
                        <div class="form-row">
                                @csrf
                                <div class="col-md-6 form-group">
                                    <select class="form-control" name="area">
                                        @foreach($areas as $area)
                                            <option value="{{ $area->id }}">{{ $area->ar_location }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 form-group">
                                    <input class="form-control" type="text" placeholder="العنوان" name="address">
                                </div>
                                
                                <button class="btn btn-main mr-3" type="submit">حفظ العنوان</button>
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

@section('scripts')
    <script>
        $("#newAddressBtn").click(function () {
            $("#newAddress").slideToggle(500);
            });
        $("#newAddress").hide();
    </script>
@endsection