@if(app()->getLocale() == 'en')
    <div class="row">
        <div class="col-12">
            <h2 class="text-center heading">Our Products</h2>
        </div>
        @foreach($products as $product)
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="card shadow-5">
                    <div class="card-img-top">
                        <img class="card-img" src="{{ asset('products/'. $product->image) }}" alt="Card image cap">
                        <div class="badges-product">
                            <a class="badge badge-warning" href="#">{{ $product->category->brand->en_name }}</a>
                            <a class="badge badge-info" href="#">{{ $product->category->en_name }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title fw-700 fs-20 ">{{ $product->en_name }}</h5>
                        <p>{{ $product->en_text }}</p>
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
@else
    <div class="row">
        <div class="col-12">
            <h2 class="text-center heading">منتجاتنا</h2>
        </div>
        @foreach($products as $product)
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="card shadow-5">
                    <div class="card-img-top">
                        <img class="card-img" src="{{ asset('products/'. $product->image) }}" alt="Card image cap">
                        <div class="badges-product">
                            <a class="badge badge-warning" href="#">{{ $product->category->brand->ar_name }}</a>
                            <a class="badge badge-info" href="#">{{ $product->category->ar_name }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title fw-700 fs-20 ">{{ $product->ar_name }}</h5>
                        <p>{{ $product->ar_text }}</p>
                        <p class="font-weight-bold">{{ $product->price_after_discount }} جنيه <s class="text-darkgray mx-2">{{ $product->price_before_discount }} جنيه</s></p>                                    
                        <div class="row justify-content-between no-gutters">
                            <a class="fs-12 btn btn-main" href="{{ route('productDetails', $product->ar_slug) }}">Show details <i class="fa fa-angle-right pl-1"></i></a>
                            <a class="fs-12 btn btn-main" data-toggle="modal" data-target="#modal{{$product->id}}" href="#"><i class="fa fa-eye pl-1"></i></a>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $products->links() }}
@endif