@if(app()->getLocale() == 'en')
    <div class="cart" id="cart">
        <div id="cart__options">
            <div class="row no-gutters justify-content-between">
                <h2 class="mb-0">Cart</h2>
                <button id="x-cart-btn" class=" btn btn-white text-black mb-0">X</button>
            </div>
            <hr class="mt-3 mb-5">
            @if(isset($userOrder))
                @foreach($userOrder->order_details as $orderDetail)
                    <div class="row">
                        <div class="col-4 text-center">
                            <img src="{{ asset('products/'. $orderDetail->product->image) }}" alt="">
                        </div>
                        <div class="col-6 text-center">
                            <p class="mb-0">{{ $orderDetail->product->en_name }}</p>
                            <h6>{{ $orderDetail->quantity }} x <b>EGP {{ $orderDetail->price }}</b></h6>
                        </div>
                        <div class="col-2 text-center">
                            <h5><a href="{{ route('delete-from-cart', $orderDetail->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a></h5>
                        </div>
                    </div>
                    <hr>
                @endforeach
                <div class="row no-gutters justify-content-between">
                    <p>Sub Total : </p>
                    <p class="fs-18 fw-700">EGP {{ $userOrderSubTotal }}</p>
                </div>
                @if($userOrderPromoInNumber != NULL)
                <div class="row no-gutters justify-content-between">
                    <p>Discount : </p>
                    <p class="fs-18 fw-700">EGP {{ $userOrderPromoInNumber }}</p>
                </div>
                @endif
                <div class="row no-gutters justify-content-between">
                    <p>Total : </p>
                    <p class="fs-18 fw-700">EGP {{ $userOrderTotal }}</p>
                </div>
                <a href="{{ route('cart') }}" class="btn btn-secondry btn-block"><i class="fa fa-cart-plus mr-3" aria-hidden="true"></i>View cart</a>
                <a href="{{ route('shipping-address') }}" class="btn btn-secondry btn-block"><i class="fa fa-caret-square-o-right mr-3" aria-hidden="true"></i>Check out</a>
            @else
                <h4>No Shopping cart</h4>
            @endif
        </div>
    </div> 
@else
    <div class="cart" id="cart">
        <div id="cart__options">
            <div class="row no-gutters justify-content-between">
                <h2 class="mb-0">عربة التسوق</h2>

                <button id="x-cart-btn" class=" btn btn-white text-black mb-0">X</button>
            </div>
            <hr class="mt-3 mb-5">
            @if(isset($userOrder))
                @foreach($userOrder->order_details as $orderDetail)
                    <div class="row">
                        <div class="col-4 text-center">
                            <img src="{{ asset('products/'. $orderDetail->product->image) }}" alt="">
                        </div>
                        <div class="col-6 text-center">
                            <p class="mb-0">{{ $orderDetail->product->en_name }}</p>
                            <h6>{{ $orderDetail->quantity }} x</h6>
                            <h6>{{ $orderDetail->price }} جنيه</h6>
                        </div>
                        <div class="col-2 text-center">
                            <h5><a href="{{ route('delete-from-cart', $orderDetail->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a></h5>
                        </div>

                        
                    </div>
                    <hr>
                @endforeach
                <div class="row no-gutters justify-content-between">
                    <p>المجموع الفرعي: </p>
                    <p class="fs-18 fw-700"> {{ $userOrderSubTotal }} جنيه</p>
                </div>
                @if($userOrderPromoInNumber != NULL)
                <div class="row no-gutters justify-content-between">
                    <p>التخفيض : </p>
                    <p class="fs-18 fw-700"> {{ $userOrderPromoInNumber }} جنيه</p>
                </div>
                @endif
                <div class="row no-gutters justify-content-between">
                    <p>المجموع الكلي : </p>
                    <p class="fs-18 fw-700"> {{ $userOrderTotal }} جنيه</p>
                </div>
                <a href="{{ route('cart') }}" class="btn btn-secondry btn-block"><i class="fa fa-cart-plus mr-3" aria-hidden="true"></i>عرض عربة التسوق</a>
                <a href="{{ route('shipping-address') }}" class="btn btn-secondry btn-block"><i class="fa fa-caret-square-o-right mr-3" aria-hidden="true"></i>الدفع</a>
            @else
                <h4>لا توجد عربة تسوق</h4>
            @endif
        </div>
    </div>
@endif