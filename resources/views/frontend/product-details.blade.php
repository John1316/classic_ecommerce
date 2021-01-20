@extends('frontend.layouts.app')

@section('title')
    @if(app()->getLocale() == 'en')
    Home | {{ $product->en_name }}
    @else
    الرئيسية | {{ $product->ar_name }}
    @endif
@endsection

@section('classic-ecommerce')

@if(app()->getLocale() == 'en')

    @include('frontend.layouts.header')

    @include('frontend.layouts.loader')

    <!-- start header -->
    <header class="pageheader d-flex align-items-center" style="background-image: linear-gradient(to top right , rgba(0,0,0,.09), rgba(0,0,0,0.2)) , url({{ asset('products/'. $product->banner_image) }})">
        <div class="container pageheader__caption text-white">
            <h4 class="pageheader__caption--h4">{{ $product->en_name }}</h4>
            <h6 class="pageheader__caption--h6"><i class="fa fa-home" aria-hidden="true"></i> \ Products \ {{ $product->en_name }}</h6>
        </div>
    </header>
    <!-- end header -->

    <!-- start product detaails  -->
    <section class="product-details py-6">
        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-6 col-12 mb-7 mb-md-0">
                    <div class="slider-dots-fill-primary text-center" data-provide="slider" data-dots="true" data-autoplay="true" data-autoplay-speed="1000">
                        <div><img class="product-details__img" src="{{ asset('products/'. $product->image) }}"></div>
                        @foreach($product->productImages as $productImage)
                            <div><img class="product-details__img" src="{{ asset('products/'. $productImage->image) }}"></div>
                        @endforeach
                    </div>
                </div>

                <div class="col-12 col-md-6">
                <h2 class="mb-3 fw-600">{{ $product->en_name }}</h2>
                <p class="text-light my-3">{{ $product->en_text }}</p>

                <div class="row gap-y align-items-center justify-content-between text-center p-5 mt-7">
                    <div class="col-md-auto">
                        <h3 class="product-price">
                            {{ $product->price_after_discount }} EGP <s class="text-darkgray">{{ $product->price_before_discount }} EGP</s> 
                        </h3>

                    </div>
                    <form action="{{ route('add-to-cart') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <div class="col-md-auto">
                            <button class="btn btn-lg btn-main" type="submit">Add to cart</button>
                        </div>
                    </form>
                </div>

                </div>

            </div>


            <div class="row py-7">
                <div class="col-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#specification">Full specification</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#warranty">Warranty</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#shipping">Shipping info</a>
                        </li>
                    </ul>

                    <div class="tab-content p-4">
                        <div class="tab-pane fade show active" id="specification">
                            <p>Interactively foster interoperable schemas rather than client-centric architectures. Progressively drive collaborative human capital vis-a-vis optimal ideas. Monotonectally fashion cross-platform leadership skills through high standards in manufactured products. Continually reintermediate.</p>
                            <p>Progressively deliver ethical schemas before equity invested intellectual capital. Rapidiously embrace value-added manufactured products rather than 24/7 information. Credibly whiteboard compelling methodologies installed base action items. Objectively maintain.</p>
                        </div>
                        <div class="tab-pane fade" id="warranty">
                            <p>Synergistically empower multimedia based scenarios before backward-compatible testing procedures. Interactively disintermediate distinctive portals with state of the art sources. Conveniently architect process-centric quality vectors for cross-platform models. Continually expedite.</p>

                        </div>
                        <div class="tab-pane fade" id="shipping">
                            <p>Progressively morph plug-and-play value without market positioning partnerships. Authoritatively myocardinate high standards in deliverables and effective opportunities. Interactively whiteboard premium relationships rather than go forward expertise. Phosfluorescently target process-centric.</p>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | Similar products
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->
    <section class="section bg-gray bt-1">
        <div class="container">

            <h4 class="mb-7">Similar products</h4>

            <div class="row gap-y">

                @foreach($similarProducts as $similarProduct)

                <div class="col-md-6 col-lg-3 col-12">
                    <div class="product-3">
                        <a class="product-media" href="{{ route('productDetails', $similarProduct->en_slug) }}">
                            <img class="card-img" src="{{ asset('products/'. $similarProduct->image) }}" alt="product">
                        </a>

                        <div class="product-detail">
                            <h5><a href="#">{{ $similarProduct->en_name }}</a></h5>
                            <div class="row no-gutters justify-content-center">
                                <p class="text-main"><b> {{ $similarProduct->price_after_discount }} EGP</b></p>
                                <p class="ml-2"><s> {{ $similarProduct->price_before_discount }} EGP</s></p>
                            </div>
                        </div>
                        
                    </div>
                </div>

                @endforeach

            </div>

        </div>
    </section>
    <!-- end product detaails  -->

    @include('frontend.layouts.mini-cart')

    @include('frontend.layouts.footer')

@else

    @include('frontend.layouts.header')

    @include('frontend.layouts.loader')

    <!-- start header -->
    <header class="pageheader d-flex align-items-center" style="background-image: linear-gradient(to top right , rgba(0,0,0,.09), rgba(0,0,0,0.2)) ,url({{ asset('products/'. $product->banner_image) }})">
        <div class="container pageheader__caption text-white">
            <h4 class="pageheader__caption--h4">{{ $product->ar_name }}</h4>
            <h6 class="pageheader__caption--h6"><i class="fa fa-home" aria-hidden="true"></i> \ منتجاتنا \ {{ $product->ar_name }}</h6>
        </div>
    </header>
    <!-- end header -->

    <!-- start product detaails  -->
    <section class="product-details py-6">
        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-6 col-12 mb-7 mb-md-0">
                    <div class="slider-dots-fill-primary text-center" dir="auto" data-provide="slider" data-dots="true" data-autoplay="true" data-autoplay-speed="1000">
                        <div><img class="product-details__img" src="{{ asset('products/'. $product->image) }}"></div>
                        @foreach($product->productImages as $productImage)
                            <div><img class="product-details__img" src="{{ asset('products/'. $productImage->image) }}"></div>
                        @endforeach
                    </div>
                </div>

                <div class="col-12 col-md-6">
                <h2 class="mb-3 fw-600">{{ $product->ar_name }}</h2>
                <p class="text-light my-3">{{ $product->ar_text }}</p>

                <div class="row gap-y align-items-center justify-content-between text-center p-5 mt-7">
                    <div class="col-md-auto">
                        <h3 class="product-price">
                            {{ $product->price_after_discount }} جنيه <s class="text-darkgray">{{ $product->price_before_discount }} جنيه</s> 
                        </h3>

                    </div>
                    <form action="{{ route('add-to-cart') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <div class="col-md-auto">
                            <button class="btn btn-lg btn-main" type="submit">أضف إلى السلة</button>
                        </div>
                    </form>
                </div>

                </div>

            </div>


            <div class="row py-7">
                <div class="col-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#specification">المواصفات الكاملة</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#warranty">ضمان</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#shipping">معلومات الشحن</a>
                        </li>
                    </ul>

                    <div class="tab-content p-4">
                        <div class="tab-pane fade show active" id="specification">
                            <p> عزز بشكل تفاعلي المخططات القابلة للتشغيل البيني بدلاً من البنيات التي تركز على العميل. دفع رأس المال البشري التعاوني بشكل تدريجي مقابل الأفكار المثلى. مهارات القيادة عبر منصة الموضة بشكل أحادي من خلال معايير عالية في المنتجات المصنعة. متوسّط باستمرار. </p>
                                <p> تقديم مخططات أخلاقية تدريجيًا قبل رأس المال الفكري المستثمر في رأس المال. تبنى بسرعة المنتجات المصنعة ذات القيمة المضافة بدلاً من المعلومات على مدار الساعة طوال أيام الأسبوع. ثبتت منهجيات السبورة المقنعة ذات المصداقية عناصر عمل أساسية. موضوعي الحفاظ. </p>  
                        </div>
                        <div class="tab-pane fade" id="warranty">
                            <p> تمكين السيناريوهات القائمة على الوسائط المتعددة بشكل تآزري قبل إجراءات الاختبار المتوافقة مع الإصدارات السابقة. بوابات مميزة غير وسيطة تفاعلية مع أحدث المصادر. صمم موجهات الجودة المتمحورة حول العمليات بشكل ملائم للنماذج عبر الأنظمة الأساسية. التعجيل المستمر. </p>
                        </div>
                        <div class="tab-pane fade" id="shipping">
                            <p> قم بتحويل قيمة التوصيل والتشغيل تدريجياً دون شراكات لتحديد المواقع في السوق. اعتماد معايير عالية لعضلة القلب في المخرجات والفرص الفعالة. علاقات متميزة على السبورة البيضاء التفاعلية بدلاً من المضي قدمًا في الخبرة. هدف Phosfluorescently تتمحور حول العملية. </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | Similar products
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->
    <section class="section bg-gray bt-1">
        <div class="container">

            <h4 class="mb-7">منتجات مماثلة</h4>

            <div class="row gap-y">

                @foreach($similarProducts as $similarProduct)

                <div class="col-md-6 col-lg-3 col-12">
                    <div class="product-3">
                        <a class="product-media" href="{{ route('productDetails', $similarProduct->ar_slug) }}">
                            <img class="card-img" src="{{ asset('products/'. $similarProduct->image) }}" alt="product">
                        </a>

                        <div class="product-detail">
                            <h5><a href="#">{{ $similarProduct->ar_name }}</a></h5>
                            <div class="row no-gutters justify-content-center">
                                <p class="ml-2"><s> {{ $similarProduct->price_before_discount }}جنيه</s></p>
                                <p class="text-main"><b> {{ $similarProduct->price_after_discount }}</b> جنيه</p>
                            </div>
                            
                        </div>
                    </div>
                </div>

                @endforeach

            </div>

        </div>
    </section>
    <!-- end product detaails  -->

    @include('frontend.layouts.mini-cart')

    @include('frontend.layouts.footer')

@endif
@endsection