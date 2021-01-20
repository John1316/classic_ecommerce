@extends('frontend.layouts.app')

@section('title')
  @if(app()->getLocale() == 'en')
    Home | {{ $category->en_name }}
  @else
    الرئيسية | {{ $category->ar_name }}
  @endif
@endsection

@section('classic-ecommerce')

@if(app()->getLocale() == 'en')
    
    @include('frontend.layouts.header')

    @include('frontend.layouts.loader')

    <!-- start header -->
    <header class="pageheader d-flex align-items-center" style="background-image: linear-gradient(to top right , rgba(0,0,0,0.1), rgba(0,0,0,0.2)) ,url({{ asset('categories/'. $category->banner_image) }})">
        <div class="container pageheader__caption text-white">
            <h4 class="pageheader__caption--h4">{{ $category->en_name }}</h4>
            <h6 class="pageheader__caption--h6"><i class="fa fa-home" aria-hidden="true"></i> \ {{ $brand->en_name }} \ {{ $category->en_name }}</h6>
        </div>
    </header>
    <!-- end header -->

    <!-- Start product lists -->
    <section class="productlist">
        <div class="container">
            <input type="hidden" value="{{ $category->en_slug }}" name="category" id="category">
            <input type="hidden" value="{{ $brand->en_slug }}" name="brand" id="brand">
            <input type="hidden" value="{{ app()->getLocale() }}" name="lang" id="lang">
            <div class="row no-gutters justify-content-between">
                <div class="form-group">
                    <label>Sort by</label>
                    <select class="form-control" name="sortby" id="sortby">
                        <option value="featured">Featured</option>
                        <option value="lowtohigh">Price: Low to high</option>
                        <option value="hightolow">Price: high to Low</option>
                        <option value="newest">Newest arrivals</option>
                        <option value="hotdeal">Hot Deal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="text-white">aaa</label>
                    <input id="myInput" type="text" class="form-control" placeholder="Search ...">
                </div>
            </div>
            <section id="products_view">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-center heading">Our Products</h2>
                    </div>
                    @foreach($products as $product)
                        <div class="col-lg-4 col-12">
                            <div class="card shadow-5">
                                <img class="card-img img1" src="{{ asset('products/'. $product->image) }}" alt="">
                                <img class="card-img img2" src="{{ asset('products/'. $product->firstProductImage()->image) }}" alt="">
                                <div class="badges-product">
                                    <a class="badge badge-warning" href="#">{{ $product->category->brand->en_name }}</a>
                                    <a class="badge badge-info" href="#">{{ $product->category->en_name }}</a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-500 fs-20">{{ $product->en_name }}</h5>
                                    <p>{{ mb_substr($product->en_text, 0, 100) }}</p>
                                    <p class="font-weight-bold">{{ $product->price_after_discount }} EGP <s class="text-darkgray mx-2">{{ $product->price_before_discount }} EGP</s></p>
                                    <div class="row justify-content-between no-gutters">
                                        <a class="fs-12 btn btn-main" href="{{ route('productDetails', $product->en_slug) }}">Show details <i class="fa fa-angle-right pl-1"></i></a>
                                        <a class="fs-12 btn btn-main" data-toggle="modal" data-target="#modal{{$product->id}}" href="#"><i class="fa fa-eye pl-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $products->links() }}
            </section>
        </div>
    </section>
    <!-- end product lists -->

    <!-- modal begin -->
    @foreach($products as $product)
        <div class="modal fade" id="modal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div data-provide="slider" data-autoplay="true" data-autoplay-speed="1000">
                                    <div><img class="h-250px w-100" src="{{ asset('products/'. $product->image) }}"></div>
                                    @foreach($product->productImages as $productImage)
                                        <div><img class="h-250px w-100" src="{{ asset('products/'. $productImage->image) }}"></div>
                                    @endforeach
                                </div> 
                            </div>
                            <div class="col-lg-6 col-12">
                                <h3 class="mb-3">{{ $product->en_name }}</h3>
                                <p class="mb-3">{{ $product->en_text }}</p>
                                <div class="price d-flex">
                                    <h4 class="text-main font-weight-bold mr-3">{{ $product->price_after_discount }} EGP</h4>
                                    <h4 class="font-weight-bold"><s>{{ $product->price_before_discount }} EGP</s></h4>
                                </div>
                                <div class="row no-gutters justify-content-between">
                                    <form action="{{ route('add-to-cart') }}" method="POST">
                                    @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
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

    @include('frontend.layouts.mini-cart')

    @include('frontend.layouts.footer')

@else

    @include('frontend.layouts.header')

    @include('frontend.layouts.loader')

    <!-- start header -->
    <header class="pageheader d-flex align-items-center" style="background-image: linear-gradient(to top right , rgba(0,0,0,.09), rgba(0,0,0,0.2)) , url({{ asset('categories/'. $category->banner_image) }})">
        <div class="container pageheader__caption text-white">
            <h4 class="pageheader__caption--h4">{{ $category->ar_name }}</h4>
            <h6 class="pageheader__caption--h6"><i class="fa fa-home" aria-hidden="true"></i> \ {{ $brand->ar_name }} \ {{ $category->ar_name }}</h6>
        </div>
    </header>
    <!-- end header -->

    <!-- Start product lists -->
    <section class="productlist">
        <div class="container">
            <input type="hidden" value="{{ $category->ar_slug }}" name="category" id="category">
            <input type="hidden" value="{{ $brand->ar_slug }}" name="brand" id="brand">
            <input type="hidden" value="{{ app()->getLocale() }}" name="lang" id="lang">
            <div class="row no-gutters justify-content-between">
                <div class="form-group">
                    <label>رتب حسب</label>
                    <select class="form-control" name="sortby" id="sortby">
                        <option value="featured">متميز</option>
                        <option value="lowtohigh">السعر من الاقل للاكثر</option>
                        <option value="hightolow">السعر من الاكثر للاقل</option>
                        <option value="newest">أحدث الوافدين</option>
                        <option value="hotdeal">صفقة حاسمة</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="text-white">البحث</label>
                    <input id="myInput" type="text" class="form-control" placeholder="ابحث هنا... ">
                </div>
            </div>
            <section id="products_view">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-center heading">منتجاتنا</h2>
                    </div>
                    @foreach($products as $product)
                        <div class="col-lg-4 col-12">
                            <div class="card shadow-5">
                                <img class="card-img img1" src="{{ asset('products/'. $product->image) }}" alt="">
                                <img class="card-img img2" src="{{ asset('products/'. $product->firstProductImage()->image) }}" alt="">
                                <div class="badges-product">
                                    <a class="badge badge-warning" href="#">{{ $product->category->brand->ar_name }}</a>
                                    <a class="badge badge-info" href="#">{{ $product->category->ar_name }}</a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-500 fs-20">{{ $product->ar_name }}</h5>
                                    <p class="mh-85">{{ mb_substr($product->ar_text, 0, 100) }}</p>
                                    <p class="font-weight-bold">{{ $product->price_after_discount }} جنيه <s class="text-darkgray mx-2">{{ $product->price_before_discount }} جنيه</s></p>
                                    <div class="row justify-content-between no-gutters">
                                        <a class="fs-12 btn btn-main" href="{{ route('productDetails', $product->ar_slug) }}">شاهد التفاصيل<i class="fa fa-angle-left pr-1"></i></a>
                                        <a class="fs-12 btn btn-main" data-toggle="modal" data-target="#modal{{$product->id}}" href="#"><i class="fa fa-eye pl-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $products->links() }}
            </section>
        </div>
    </section>
    <!-- end product lists -->

    <!-- modal begin -->
    @foreach($products as $product)
        <div class="modal fade" id="modal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div data-provide="slider" data-autoplay="true" data-autoplay-speed="1000" dir="auto">
                                    <div><img class="h-250px w-100" src="{{ asset('products/'. $product->image) }}"></div>
                                    @foreach($product->productImages as $productImage)
                                        <div><img class="h-250px w-100" src="{{ asset('products/'. $productImage->image) }}"></div>
                                    @endforeach
                                </div> 
                            </div>
                            <div class="col-lg-6 col-12">
                                <h3 class="mb-3">{{ $product->ar_name }}</h3>
                                <p class="mb-3">{{ mb_substr($product->ar_text, 0, 100) }}</p>
                                <div class="price d-flex">
                                    <h4 class="text-main font-weight-bold ml-3">{{ $product->price_after_discount }} جنيه</h4>
                                    <h4 class="font-weight-bold"><s>{{ $product->price_before_discount }} جنيه</s></h4>
                                </div>
                                <div class="row no-gutters justify-content-between">
                                    <form action="{{ route('add-to-cart') }}" method="POST">
                                        @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input class="form-control-sm w-60px" min="1" value="1" type="number" name="quantity">
                                    <button class="btn btn-main" type="submit">اضف الي العربة</button>
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

    @include('frontend.layouts.mini-cart')

    @include('frontend.layouts.footer')

@endif

@endsection

@section('scripts')

<script>
    $('#sortby').change(function() {
        var category = $('#category').val();
        var brand = $('#brand').val();
        var lang = $('#lang').val();
        var sortby = $('#sortby').val();
        $.ajax({
            url: "/"+lang+"/"+brand+"/"+category,
            method: 'GET',
            data: {sortby:sortby},
            success:function(response) {
                $("#products_view").html(response.products_view);
            }
        })
    });

    $('#myInput').on('keyup', function(event) {
        if(event.keyCode == 13) {
            var category = $('#category').val();
            var brand = $('#brand').val();
            var lang = $('#lang').val();
            var keyword = $('#myInput').val();
            $.ajax({
            url: "/"+lang+"/"+brand+"/"+category,
            method: 'GET',
            data: {keyword:keyword},
            success:function(response) {
                $("#products_view").html(response.products_view);
            }
        })
        }
    });

    var products = {!! json_encode($productNames) !!}

    function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                /*insert the value for the autocomplete text field:*/
                inp.value = this.getElementsByTagName("input")[0].value;
                /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                closeAllLists();
            });
            a.appendChild(b);
            }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
            }
        }
    });
    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
        }
    }
    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
        }
    }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
    }

    autocomplete(document.getElementById("myInput"), products);

</script>

@endsection