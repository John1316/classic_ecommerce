@if(app()->getLocale() == 'en')
    <header id="header" class="header-transparent">

        <nav class="navbar navbar-expand-lg navbar-light bg-main navbar-stick-dark" data-navbar="sticky">
            <div class="container">

                
                <div class="navbar-left">
                    <a class="navbar-brand" href="{{ route('welcome') }}">
                        <img class="logo" src="{{ asset('frontend/assets/Logo.png') }}" alt="logo">
                    <!-- <img class="logo-light" src="../assets/img/logo-light.png" alt="logo"> -->
                    </a>
                </div>
                <div class="navbar-right">
                    <button class="navbar-toggler" type="button">&#9776;</button>
                </div>
                <section class="navbar-mobile">
                    <nav class="nav nav-navbar mx-auto mt-5">
                        <li class="nav-item active">
                        <a class="nav-link" href="#">All brands <span class="arrow"></span></a>
                            <ul class="nav">
                                @foreach($brands as $brand)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('brands', $brand->en_slug) }}">{{ $brand->en_name }}  <span class="arrow"></span></a>
                                        <nav class="nav navbar__long">
                                            <div class="row no-gutters">
                                                @foreach($brand->categories as $category)
                                                    <div class="col-md-6 col-12">
                                                        <a class="nav-link" href="{{ route('categories', [$brand->en_slug, $category->en_slug]) }}">{{ $category->en_name }} </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </nav>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <a class="nav-link " href="{{ route('welcome') }}">Home</a>
                        <a class="nav-link" href="{{ route('shop') }}">Shop</a>
                        <a class="nav-link" href="{{ route('branches') }}">Branches</a>
                    </nav>

                        
                    <div class="d-flex mt-5">
                        @auth
                            <a class="nav-link" id="cart-btn" href="#">
                                <i class="fa fa-shopping-cart text-white"></i>
                                <span class="badge badge-number badge-danger">{{ isset($userOrder) ? $userOrder->order_details->count() : 0 }}</span>
                            </a>
                            <div class="dropdown mt-2">
                                <button class="btn py-1 px-3 text-white dropdown-toggle row justify-content-between" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        My profile
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="row no-gutters profile__links">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link" href="{{ route('profile') }}">My Account</a>
                                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="{{ route('logout') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        </div>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-sm btn-round btn-main text-white mt-2 fw-700" href="/ar"> عربي</a>
                        @else
                            <a class="btn btn-sm btn-round btn-main text-white ml-lg-4 mr-2 mt-2" href="{{ route('login') }}">Sign in </a>
                            <a class="btn btn-sm btn-round btn-main text-white mt-2 fw-700" href="/ar"> عربي</a>
                        @endif
                        
                    </div>
                </section>

            </div>
        </nav>
                    
    </header>
@else
    <header id="header" class="header-transparent">

        <nav class="navbar navbar-expand-lg navbar-light bg-main navbar-stick-dark" data-navbar="sticky">
            <div class="container">

                
                <div class="navbar-left">
                    <a class="navbar-brand" href="{{ route('welcome') }}">
                        <img class="logo" src="{{ asset('frontend/assets/Logo.png') }}" alt="logo">
                    <!-- <img class="logo-light" src="../assets/img/logo-light.png" alt="logo"> -->
                    </a>
                </div>
                <div class="navbar-right">
                    <button class="navbar-toggler" type="button">&#9776;</button>
                </div>
                <section class="navbar-mobile">
                    <nav class="nav nav-navbar mx-auto mt-5">
                        <li class="nav-item active">
                        <a class="nav-link" href="#">العلامات التجارية <span class="arrow"></span></a>
                            <ul class="nav">
                                @foreach($brands as $brand)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('brands', $brand->ar_slug) }}">{{ $brand->ar_name }}  <span class="arrow"></span></a>
                                        <nav class="nav navbar__long">
                                            <div class="row no-gutters">
                                                @foreach($brand->categories as $category)
                                                    <div class="col-md-6 col-12">
                                                        <a class="nav-link" href="{{ route('categories', [$brand->ar_slug, $category->ar_slug]) }}">{{ $category->ar_name }} </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </nav>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <a class="nav-link " href="{{ route('welcome') }}">الرئيسية</a>
                        <a class="nav-link" href="{{ route('shop') }}">المتجر</a>
                        <a class="nav-link" href="{{ route('branches') }}">الفروع</a>
                    </nav>

                        
                    <div class="d-flex mt-5">
                        @auth
                            <a class="nav-link" id="cart-btn" href="#">
                                <i class="fa fa-shopping-cart text-white"></i>
                                <span class="badge badge-number badge-danger">{{ isset($userOrder) ? $userOrder->order_details->count() : 0 }}</span>
                            </a>
                            <div class="dropdown mt-2">
                                <button class="btn py-1 px-3 text-white dropdown-toggle row justify-content-between" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    الملف الشخصي
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="row no-gutters profile__links">
                                        <div class="nav text-right flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link" href="{{ route('profile') }}">حسابي</a>
                                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="{{ route('logout') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">تسجيل الخروج</a>
                                        </div>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-sm btn-round btn-main text-white mt-2 fw-700" href="/en"> English</a>
                        @else
                            <a class="btn btn-sm btn-round btn-main text-white ml-lg-4 mr-2 mt-2" href="{{ route('login') }}">تسجيل الدخول </a>
                            <a class="btn btn-sm btn-round btn-main text-white mt-2 fw-700" href="/en"> English</a>
                        @endif
                        
                    </div>
                </section>

            </div>
        </nav>
                    
    </header>
@endif