@extends('frontend.layouts.app')

@section('title')
    @if(app()->getLocale() == 'en')
        Home | Branches
    @else
        الرئيسية | الفروع
    @endif
@endsection

@section('classic-ecommerce')

    @if(app()->getLocale() == 'en')
        
        @include('frontend.layouts.header')

        @include('frontend.layouts.loader')

        <!-- start header -->
            <header class="pageheader d-flex align-items-center" style="background-image: linear-gradient(to top right , rgba(0,0,0,.09), rgba(0,0,0,0.2)) , url({{ asset('banner_images/'. $banner_images->branches_banner_image) }})">
                <div class="container pageheader__caption text-white">
                    <h4 class="pageheader__caption--h4">Branches</h4>
                    <h6 class="pageheader__caption--h6"><i class="fa fa-home" aria-hidden="true"></i> > Branches</h6>
                </div>
            </header>
        <!-- end header -->

        <section class="branches py-7">
            <div class="container">
                <div class="row no-gutters my-4">
                    <h2 class="font-weight-bold">Contact us</h2>
                    <div class="col-12">
                        <div class="row branches__row my-4">
                            @foreach($branches as $branch)
                                {{-- <div class="col-12 col-lg-4">
                                    <div class="card shadow-5 d-block">
                                        <img class="card-img-top" src="{{ asset('branches/'. $branch->image) }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">{{ $branch->en_branch_location }}</h4>
                                            <p>City: {{ $branch->en_branch_city }}</p>
                                            <p>Address: {{ $branch->en_branch_address }}</p>
                                            <p>Phone 1: +{{ $branch->branch_phone_1 }}</p>
                                            <p>Phone 2: +{{ $branch->branch_phone_2 }}</p>
                                            @if($branch->branch_phone_3 != NULL)
                                            <p>Phone 3: +{{ $branch->branch_phone_3 }}</p>
                                            @endif
                                            <p>For sales inquiries please contact : 
                                                <a href="">k.toukan@classicfoods.com.eg</a>
                                                <a href="">mohamed.youssif@classicfoods.com.eg</a>
                                            </p>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-12 col-lg-4">
                                    <div class="card shadow-5 d-block">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3451.9313430071793!2d31.33918481495939!3d30.096152581863553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145815f08b5ce3fb%3A0x85e70073eaa877bc!2s82%20Abou%20Bakr%20El-Sedeek%2C%20Al%20Matar%2C%20El%20Nozha%2C%20Cairo%20Governorate!5e0!3m2!1sen!2seg!4v1611053077626!5m2!1sen!2seg" width="350" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>                                    
                                        <div class="card-body">
                                            <h4 class="font-weight-bold card-title"><b>{{ $branch->en_branch_location }}</b></h4>
                                            <p><b>City:</b> {{ $branch->en_branch_city }}</p>
                                            <p><b>Address:</b> {{ $branch->en_branch_address }}</p>
                                            <p><b>Phone 1:</b> +{{ $branch->branch_phone_1 }}</p>
                                            <p><b>Phone 2:</b> +{{ $branch->branch_phone_2 }}</p>
                                            @if($branch->branch_phone_3 != NULL)
                                            <p><b>Phone 3:</b> +{{ $branch->branch_phone_3 }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div> 
                    </div>
                    
                </div>

            </div>
        </section>

        @include('frontend.layouts.mini-cart')

        @include('frontend.layouts.footer')

    @else

        @include('frontend.layouts.header')

        @include('frontend.layouts.loader')

        <!-- start header -->
        <header class="pageheader d-flex align-items-center" style="background-image: linear-gradient(to top right , rgba(0,0,0,.09), rgba(0,0,0,0.2)) , url({{ asset('banner_images/'. $banner_images->branches_banner_image) }})">
            <div class="container pageheader__caption text-white">
                <h4 class="pageheader__caption--h4">الفروع</h4>
                <h6 class="pageheader__caption--h6"><i class="fa fa-home" aria-hidden="true"></i> \ الفروع</h6>
            </div>
        </header>
    <!-- end header -->

        <section class="branches py-7">
            <div class="container">
                <div class="row no-gutters my-4">
                    <h2 class="font-weight-bold">تواصل معنا</h2>
                    <div class="col-12">
                        <div class="row branches__row my-4">
                            @foreach($branches as $branch)
                                
                                <div class="col-12 col-lg-4">
                                    <div class="card shadow-5 d-block">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.404471916293!2d31.207055614958392!3d30.053938581878878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145846d1458b7539%3A0x824046cccb7ec3ea!2z2KjYsdisINin2YTZgtin2YfYsdipINin2YTYt9io2Yk!5e0!3m2!1sen!2seg!4v1611058245642!5m2!1sen!2seg" width="350" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>                                
                                        <div class="card-body">
                                            <h4 class="card-title">{{ $branch->ar_branch_location }}</h4>
                                            <p>المدينه : {{ $branch->ar_branch_city }}</p>
                                            <p>العنوان : {{ $branch->ar_branch_address }}</p>
                                            <p>الهاتف : {{ $branch->branch_phone_1 }}</p>
                                            <p>الفاكس : {{ $branch->branch_phone_2 }}</p>
                                            @if($branch->branch_phone_3 != NULL)
                                            <p>رقم حدمه العملاء : {{ $branch->branch_phone_3 }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div> 
                    </div>
                    
                </div>

            </div>
        </section>

        @include('frontend.layouts.mini-cart')

        @include('frontend.layouts.footer')

    @endif

@endsection