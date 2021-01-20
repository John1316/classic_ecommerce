@extends('frontend.layouts.app')

@section('title')
    @if(app()->getLocale() == 'en')
        Home | profile
    @else
        الرئيسية | الصفحه الشخصيه
    @endif
@endsection

@section('classic-ecommerce')
    @if(app()->getLocale() == 'en')
    
        @include('frontend.layouts.header')

        @include('frontend.layouts.loader')

        <!-- start header -->
        <header class="pageheader d-flex align-items-center" style="background-image:  linear-gradient(to top right , rgba(0,0,0,.09), rgba(0,0,0,0.2)) , url({{ asset('banner_images/'. $banner_images->profile_banner_image) }})">
            <div class="container pageheader__caption text-white">
                <h4 class="pageheader__caption--h4">Profile</h4>
                <h6 class="pageheader__caption--h6"><i class="fa fa-home" aria-hidden="true"></i> \ Profile</h6>
            </div>
        </header>
        <!-- end header -->

        <!-- main section -->
        <section class="profile py-9">
            <div class="container">
                @if(Session::has('flash_message'))
                    <div class="{{ Session::get('flash_class') }} my-3">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-sm-12 list">
                            <div class="card border-1">
                                <div class="card-body">
                                    <div class="row no-gutters">
                                        <div class="col-12 my-2">
                                            <h6 class="mb-0">Full name</h6>
                                            <h6 class="font-weight-bold">{{ auth()->user()->name }}</h6>
                                        </div>
                                        <div class="col-12 my-2">
                                            <h6 class="mb-0">Email Address</h6>
                                            <h6 class="font-weight-bold">{{ auth()->user()->email }}</h6>
                                        </div>
                                        <div class="col-12 my-2">
                                            <h6 class="mb-0">Phone Number</h6>
                                            <h6 class="font-weight-bold mb-0">{{ auth()->user()->phone }}</h6>
                                        </div>
                                    </div>
                                    <div class="hr-gray-100 my-5"></div>
                                    <div class="row no-gutters profile__links">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link {{ session('flash_open') ? null : 'active' }}" id="v-pills-home-tab" data-toggle="pill" href="#account-info" role="tab" aria-controls="v-pills-home" aria-selected="true">Account information</a>
                                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#past" role="tab" aria-controls="v-pills-profile" aria-selected="false">Reservations</a>
                                            <a class="nav-link {{ session('flash_open') ? 'active' : null }}" id="v-pills-messages-tab" data-toggle="pill" href="#change-pass" role="tab" aria-controls="v-pills-messages" aria-selected="false">Change password</a>
                                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>                            
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 profile__right">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content" id="v-pills-tabContent">
                                <!-- start account information -->
                                <div class="tab-pane fade {{ session('flash_open') ? null : 'show active' }}" id="account-info" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <h3 class="mb-2">Account Information</h3>
                                    <form action="{{ route('update-profile') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input class="form-control border-2" type="text" name="name" value="{{ auth()->user()->name }}" required>
                                                    @if($errors->has('name'))
                                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <div class="form-group">
                                                    <label>Email address</label>
                                                    <input class="form-control border-2" type="text" name="email" value="{{ auth()->user()->email }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Phone number</label>
                                                    <input class="form-control border-2" type="text" name="phone" value="{{ auth()->user()->phone }}" required>
                                                    @if($errors->has('phone'))
                                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-main" type="submit">Update</button>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                    </form>
                                </div>
                                <!-- start past reseves -->
                                <div class="tab-pane fade" id="past" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <h3 class="mb-2 font-weight-bold">Reserves</h3>
                                    <!-- start row of loop of last reserves -->
                                    <div class="row no-gutters">
                                        <div class="col-12">
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#track">Track order</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#previous">Previous order</a>
                                                    </li>
                                                </ul>

                                                <div class="profile__past tab-content py-4">
                                                    <div class="tab-pane fade show active" id="track">
                                                        @foreach($currentOrders as $currentOrder)
                                                            <div class="alert alert-dark p-2 text-center" role="alert">
                                                                <div class="row no-gutters">
                                                                    <div class="col-lg-4">
                                                                        <p class="my-1">Date</p>
                                                                        <p class="my-1">{{ $currentOrder->created_at->format('M d Y') }}</p>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <p class="my-1">Time</p>
                                                                        <p class="my-1">{{ $currentOrder->created_at->format('H:i:s') }}</p>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <p class="my-1">Order</p>
                                                                        <p class="my-1">#{{ $currentOrder->id }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row no-gutters my-4">
                                                                @if($currentOrder->status === 'submitted')
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters active-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-edit"></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4 class="">ORDER PLACED</h4>
                                                                                <p class="">We have received your order</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters next-stage">
                                                                            <div class="col-">
                                                                                <i class="far fa-4x fa-check-square"></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4>Order Confirmed</h4>
                                                                                <p>We have received your order</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters next-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-utensils"></i>
                                                                            </div>
                                                                            <div class="col- mx-5">
                                                                                <h4>Order Processed</h4>
                                                                                <p>We have received your order</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters next-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-motorcycle"></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4>Order on the way</h4>
                                                                                <p>We have received your order</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters next-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-home"></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4>Order Delivered</h4>
                                                                                <p>We have received your order</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif($currentOrder->status === 'confirmed')
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters last-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-edit"></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4 class="">ORDER PLACED</h4>
                                                                                <p class="">We have received your order</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters active-stage">
                                                                            <div class="col-">
                                                                                <i class="far fa-4x fa-check-square"></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4>Order Confirmed</h4>
                                                                                <p>We have received your order</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters next-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-utensils"></i>
                                                                            </div>
                                                                            <div class="col- mx-5">
                                                                                <h4>Order Processed</h4>
                                                                                <p>We have received your order</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters next-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-motorcycle "></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4 class="">Order on the way</h4>
                                                                                <p class="text-darkgray">We have received your order</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters next-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-home "></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4 class="">Order Delivered</h4>
                                                                                <p class="text-darkgray">We have received your order</p>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                @elseif($currentOrder->status === 'progress')
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters last-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-edit"></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4 class="">ORDER PLACED</h4>
                                                                                <p class="">We have received your order</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters last-stage">
                                                                            <div class="col-">
                                                                                <i class="far fa-4x fa-check-square"></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4>Order Confirmed</h4>
                                                                                <p>We have received your order</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters active-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-utensils"></i>
                                                                            </div>
                                                                            <div class="col- mx-5">
                                                                                <h4>Order Processed</h4>
                                                                                <p>We have received your order</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters next-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-motorcycle "></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4 class="">Order on the way</h4>
                                                                                <p class="text-darkgray">We have received your order</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters next-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-home "></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4 class="">Order Delivered</h4>
                                                                                <p class="text-darkgray">We have received your order</p>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                @else
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters last-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-edit"></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4 class="">ORDER PLACED</h4>
                                                                                <p class="">We have received your order</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters last-stage">
                                                                            <div class="col-">
                                                                                <i class="far fa-4x fa-check-square"></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4>Order Confirmed</h4>
                                                                                <p>We have received your order</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters last-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-utensils"></i>
                                                                            </div>
                                                                            <div class="col- mx-5">
                                                                                <h4>Order Processed</h4>
                                                                                <p>We have received your order</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters active-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-motorcycle "></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4 class="">Order on the way</h4>
                                                                                <p class="text-darkgray">We have received your order</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters next-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-home "></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4 class="">Order Delivered</h4>
                                                                                <p class="text-darkgray">We have received your order</p>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="tab-pane fade" id="previous">
                                                        @foreach($previousOrders as $previousOrder)
                                                        <!-- loop start here for previous reservations -->
                                                            <div class="row no-gutters my-3">
                                                                <div class="col-12">
                                                                    <div class="card shadow-5">
                                                                        <div class="card-body">
                                                                            <div class="row no-gutters justify-content-between">
                                                                                <p class="mb-0">Date: {{ $previousOrder->created_at->format('M d Y') }}</p>
                                                                                <p class="mb-0">Time: {{ $previousOrder->created_at->format('H:i:s') }}</p>
                                                                                <p class="mb-0">ID: #{{ $previousOrder->id }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="card shadow-5">
                                                                        <div class="card-body">
                                                                            <div class="row no-gutters justify-content-between">
                                                                                <h5 class="card-title">Subtotal: </h5>
                                                                                <p class="card-text">{{ $previousOrder->subTotal }} EGP</p>
                                                                            </div>
                                                                            <div class="row no-gutters justify-content-between">
                                                                                <h5 class="card-title">Delivery Fees: </h5>
                                                                                <p class="card-text">{{ $previousOrder->delivery }} EGP</p>
                                                                            </div>
                                                                            <div class="row no-gutters justify-content-between">
                                                                                <h5 class="card-title">VAT:</h5>
                                                                                <p class="card-text text-success">-{{ $previousOrder->taxes }} %</p>
                                                                            </div>
                                                                            @if($previousOrder->promo)
                                                                            <div class="row no-gutters justify-content-between">
                                                                                    <h5 class="card-title text-success">DISCOUNT ON OFFER:</h5>
                                                                                    <p class="card-text text-success">{{ $previousOrder->promo->percentage }} %</p>
                                                                                </div>
                                                                            @endif
                                                                            <div class="row no-gutters justify-content-between">
                                                                                <h5 class="card-title text-danger">Total:</h5>
                                                                                <p class="card-text text-danger">{{ $previousOrder->total }} EGP</p>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        <!-- end start here for previous reservations -->
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <!-- end row of loop of last reserves -->

                                </div>
                                <!-- Start Change password -->
                                <div class="tab-pane fade {{ session('flash_open') ? session('flash_open') : null }}" id="change-pass" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                    <h3>Change password</h3>
                                    <form action="{{ route('update-password') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group my-4">
                                                    <label for="my-input">Old Password</label>
                                                    <input id="my-input" class="form-control" type="password" name="old_password">
                                                    @if($errors->has('old_password'))
                                                        <span class="text-danger">{{ $errors->first('old_password') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <div class="form-group my-4">
                                                    <label for="my-input">New Password</label>
                                                    <input id="my-input" class="form-control" type="password" name="password">
                                                    @if($errors->has('password'))
                                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                                    @endif
                                                </div>   
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <div class="form-group my-4">
                                                    <label for="my-input">Confirm New Password</label>
                                                    <input id="my-input" class="form-control" type="password" name="password_confirmation">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-main" type="submit">Change Password</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                            
                    </div>
                </div>
            </div>
        </section>
        <!-- end smain section -->

        @include('frontend.layouts.mini-cart')

        @include('frontend.layouts.footer')

    @else

        @include('frontend.layouts.header')

        @include('frontend.layouts.loader')

        <!-- start header -->
        <header class="pageheader d-flex align-items-center" style="background-image: linear-gradient(to top right , rgba(0,0,0,.09), rgba(0,0,0,0.2)) , url({{ asset('banner_images/'. $banner_images->profile_banner_image) }})">
            <div class="container pageheader__caption text-white">
                <h4 class="pageheader__caption--h4">الصفحه الشخصيه</h4>
                <h6 class="pageheader__caption--h6">الصفحه الشخصيه/ <i class="fa fa-home" aria-hidden="true"></i>  </h6>
            </div>
        </header>
        <!-- end header -->

        <!-- main section -->
        <section class="profile py-7">
            <div class="container">
                @if(Session::has('flash_message'))
                    <div class="{{ Session::get('flash_class') }} my-3">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-sm-12 list">
                            <div class="card border-1">
                                <div class="card-body">
                                    <div class="row no-gutters">
                                        <div class="col-12 my-2">
                                            <h6 class="mb-0">الاسم</h6>
                                            <h6 class="font-weight-bold">{{ auth()->user()->name }}</h6>
                                        </div>
                                        <div class="col-12 my-2">
                                            <h6 class="mb-0">البريد الالكتروني</h6>
                                            <h6 class="font-weight-bold">{{ auth()->user()->email }}</h6>
                                        </div>
                                        <div class="col-12 my-2">
                                            <h6 class="mb-0">رقم الهاتف</h6>
                                            <h6 class="font-weight-bold mb-0">{{ auth()->user()->phone }}</h6>
                                        </div>
                                    </div>
                                    <div class="hr-gray-100 my-5"></div>
                                    <div class="row no-gutters profile__links">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link {{ session('flash_open') ? null : 'active' }}" id="v-pills-home-tab" data-toggle="pill" href="#account-info" role="tab" aria-controls="v-pills-home" aria-selected="true">معلومات الحساب</a>
                                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#past" role="tab" aria-controls="v-pills-profile" aria-selected="false">الحجوزات</a>
                                            <a class="nav-link {{ session('flash_open') ? 'active' : null }}" id="v-pills-messages-tab" data-toggle="pill" href="#change-pass" role="tab" aria-controls="v-pills-messages" aria-selected="false">تغيير كلمة السر</a>
                                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">خروج</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>                            
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 profile__right">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content" id="v-pills-tabContent">
                                <!-- start account information -->
                                <div class="tab-pane fade {{ session('flash_open') ? null : 'show active' }}" id="account-info" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <h3 class="mb-2">معلومات الحساب</h3>
                                    <form action="{{ route('update-profile') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>الاسم</label>
                                                    <input class="form-control border-2" type="text" name="name" value="{{ auth()->user()->name }}" required>
                                                    @if($errors->has('name'))
                                                        <span class="text-danger" >{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <div class="form-group">
                                                    <label>البريد الالكتروني</label>
                                                    <input class="form-control border-2" type="text" name="email" value="{{ auth()->user()->email }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <div class="form-group">
                                                    <label>الهاتف</label>
                                                    <input class="form-control border-2" type="text" name="phone" value="{{ auth()->user()->phone }}" required>
                                                    @if($errors->has('phone'))
                                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-main" type="submit">تحديث</button>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                    </form>
                                </div>
                                <!-- start past reseves -->
                                <div class="tab-pane fade" id="past" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <h3 class="mb-2 font-weight-bold">Reserves</h3>
                                    <!-- start row of loop of last reserves -->
                                    <div class="row no-gutters">
                                        <div class="col-12">
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#track">تابع طلبك </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#previous">الطلبات السابقه</a>
                                                    </li>
                                                </ul>

                                                <div class="profile__past tab-content py-4">
                                                    <div class="tab-pane fade show active" id="track">
                                                        @foreach($currentOrders as $currentOrder)
                                                            <div class="alert alert-dark p-2 text-center" role="alert">
                                                                <div class="row no-gutters">
                                                                    <div class="col-lg-4">
                                                                        <p class="my-1">اليوم</p>
                                                                        <p class="my-1">{{ $currentOrder->created_at->format('M d Y') }}</p>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <p class="my-1">التوقيت</p>
                                                                        <p class="my-1">{{ $currentOrder->created_at->format('H:i:s') }}</p>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <p class="my-1">الحجوزات</p>
                                                                        <p class="my-1">#{{ $currentOrder->id }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row no-gutters my-4">
                                                                @if($currentOrder->status === 'submitted')
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters active-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-edit"></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4 class="">تم تفعيل الطلب</h4>
                                                                                <p class="">تم استلام طلبك</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters next-stage">
                                                                            <div class="col-">
                                                                                <i class="far fa-4x fa-check-square"></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4>تم الموافقه علي طلبك</h4>
                                                                                <p>تم استلام طلبك </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters next-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-utensils"></i>
                                                                            </div>
                                                                            <div class="col- mx-5">
                                                                                <h4>طلبك قيد التنفيذ</h4>
                                                                                <p>تم استلام طلبك</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters next-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-motorcycle"></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4>الطلب في الطريق اليك</h4>
                                                                                <p>تم استلام طلبك</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters next-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-home"></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4>تم توصيل طلبك اليك</h4>
                                                                                <p>تم استلام طلبك</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif($currentOrder->status === 'confirmed')
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters last-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-edit"></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4 class="">تم رفع الطلب</h4>
                                                                                <p>تم استلام طلبك</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters active-stage">
                                                                            <div class="col-">
                                                                                <i class="far fa-4x fa-check-square"></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4>تمت الموافقه على طلبك</h4>
                                                                                <p>تم استلام طلبك</p>                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters next-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-utensils"></i>
                                                                            </div>
                                                                            <div class="col- mx-5">
                                                                                <h4>طلبك قيد التنفيذ</h4>
                                                                                <p>تم استلام طلبك</p>                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters next-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-motorcycle "></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4 class="">طلبك في الطريق اليك</h4>
                                                                                <p>تم استلام طلبك</p>                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters next-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-home "></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4 class="">طلبك في الطريق اليك</h4>
                                                                                <p>تم استلام طلبك</p>                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                @elseif($currentOrder->status === 'progress')
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters last-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-edit"></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4 class="">تم رفع طلبك</h4>
                                                                                <p>تم استلام طلبك</p>                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters last-stage">
                                                                            <div class="col-">
                                                                                <i class="far fa-4x fa-check-square"></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4>تمت الموافقه على طلبك</h4>
                                                                                <p>تم استلام طلبك</p>                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters active-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-utensils"></i>
                                                                            </div>
                                                                            <div class="col- mx-5">
                                                                                <h4>طلبك قيد التنفيذ</h4>
                                                                                <p>تم استلام طلبك</p>                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters next-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-motorcycle "></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4 class="">طلبك في الطريق اليك</h4>
                                                                                <p>تم استلام طلبك</p>                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters next-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-home "></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4 class="">تم توصيل طلبك</h4>
                                                                                <p>تم استلام طلبك</p>                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                @else
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters last-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-edit"></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4 class="">تم رفع طلبك</h4>
                                                                                <p>تم استلام طلبك</p>                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters last-stage">
                                                                            <div class="col-">
                                                                                <i class="far fa-4x fa-check-square"></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4>تم الموافقه على طلبك</h4>
                                                                                <p>تم استلام طلبك</p>                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters last-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-utensils"></i>
                                                                            </div>
                                                                            <div class="col- mx-5">
                                                                                <h4>طلبك قيد التنفيذ</h4>
                                                                                <p>تم استلام طلبك</p>                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters active-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-motorcycle "></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4 class="">طلبك في الطريق اليك</h4>
                                                                                <p>تم استلام طلبك</p>                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="row no-gutters next-stage">
                                                                            <div class="col-">
                                                                                <i class="fa fa-4x fa-home "></i>
                                                                            </div>
                                                                            <div class="col- mx-3">
                                                                                <h4 class="">تم توصيل طلبك بنجاح</h4>
                                                                                <p>تم استلام طلبك</p>                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="tab-pane fade" id="previous">
                                                        @foreach($previousOrders as $previousOrder)
                                                        <!-- loop start here for previous reservations -->
                                                            <div class="row no-gutters my-3">
                                                                <div class="col-12">
                                                                    <div class="card shadow-5">
                                                                        <div class="card-body">
                                                                            <div class="row no-gutters justify-content-between">
                                                                                <p class="mb-0">التاريخ: {{ $previousOrder->created_at->format('M d Y') }}</p>
                                                                                <p class="mb-0">الوقت: {{ $previousOrder->created_at->format('H:i:s') }}</p>
                                                                                <p class="mb-0">#: #{{ $previousOrder->id }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="card shadow-5">
                                                                        <div class="card-body">
                                                                            <div class="row no-gutters justify-content-between">
                                                                                <h5 class="card-title">المجموع الفرعي: </h5>
                                                                                <p class="card-text">{{ $previousOrder->subTotal }} EGP</p>
                                                                            </div>
                                                                            <div class="row no-gutters justify-content-between">
                                                                                <h5 class="card-title">ضريبه التوصيل: </h5>
                                                                                <p class="card-text">{{ $previousOrder->delivery }} EGP</p>
                                                                            </div>
                                                                            <div class="row no-gutters justify-content-between">
                                                                                <h5 class="card-title">ضريبه:</h5>
                                                                                <p class="card-text">{{ $previousOrder->taxes }} %</p>
                                                                            </div>
                                                                            @if($previousOrder->promo)
                                                                            <div class="row no-gutters justify-content-between">
                                                                                    <h5 class="card-title text-success">خصم على العرض:</h5>
                                                                                    <p class="card-text text-success">{{ $previousOrder->promo->percentage }} %</p>
                                                                                </div>
                                                                            @endif
                                                                            <div class="row no-gutters justify-content-between">
                                                                                <h5 class="card-title text-danger">المجموع الكلي:</h5>
                                                                                <p class="card-text text-danger">{{ $previousOrder->total }} EGP</p>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        <!-- end start here for previous reservations -->
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <!-- end row of loop of last reserves -->

                                </div>
                                <!-- Start Change password -->
                                <div class="tab-pane fade {{ session('flash_open') ? session('flash_open') : null }}" id="change-pass" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                    <h3>Change password</h3>
                                    <form action="{{ route('update-password') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group my-4">
                                                    <label for="my-input">كلمة سر قديمة</label>
                                                    <input id="my-input" class="form-control" type="password" name="old_password">
                                                    @if($errors->has('old_password'))
                                                        <span class="text-danger" style="color: red">{{ $errors->first('old_password') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <div class="form-group my-4">
                                                    <label for="my-input">كلمة مرور جديدة</label>
                                                    <input id="my-input" class="form-control" type="password" name="password">
                                                    @if($errors->has('password'))
                                                        <span class="text-danger" style="color: red">{{ $errors->first('password') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <div class="form-group my-4">
                                                    <label for="my-input">تأكيد كلمة المرور الجديدة</label>
                                                    <input id="my-input" class="form-control" type="password" name="password_confirmation">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-main" type="submit">غير كلمة السر</button>

                                            </div>
                                        </div>
                                        

                                        

                                        
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                            
                    </div>
                </div>
            </div>
        </section>
        <!-- end smain section -->

        @include('frontend.layouts.mini-cart')

        @include('frontend.layouts.footer')
    @endif
@endsection