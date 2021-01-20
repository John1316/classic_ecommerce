@extends('backend.layouts.app')

@php $pageTitle = ' Edit Banner Images '; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    @component('backend.layouts.header', ['navTitle' => ' Edit Banner Images '])
        
    @endcomponent
    
     
    <div class="row">
                <div class="col-md-8">
                    <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ $pageTitle }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('banner_images.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Cart Banner Image </label>
                                        <input type="file" name="cart_banner_image" id="cart_banner_image">
                                        @if($row->cart_banner_image !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('banner_images/' . $row->cart_banner_image) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('cart_banner_image'))
                                        <span class="text-danger">{{ $errors->first('cart_banner_image') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Checkout Banner Image </label>
                                        <input type="file" name="checkout_banner_image" id="checkout_banner_image">
                                        @if($row->checkout_banner_image !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('banner_images/' . $row->checkout_banner_image) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('checkout_banner_image'))
                                        <span class="text-danger">{{ $errors->first('checkout_banner_image') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Profile Banner Image </label>
                                        <input type="file" name="profile_banner_image" id="profile_banner_image">
                                        @if($row->profile_banner_image !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('banner_images/' . $row->profile_banner_image) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('profile_banner_image'))
                                        <span class="text-danger">{{ $errors->first('profile_banner_image') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Shop Banner Image </label>
                                        <input type="file" name="shop_banner_image" id="shop_banner_image">
                                        @if($row->shop_banner_image !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('banner_images/' . $row->shop_banner_image) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('shop_banner_image'))
                                        <span class="text-danger">{{ $errors->first('shop_banner_image') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Branches Banner Image </label>
                                        <input type="file" name="branches_banner_image" id="branches_banner_image">
                                        @if($row->branches_banner_image !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('banner_images/' . $row->branches_banner_image) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('branches_banner_image'))
                                        <span class="text-danger">{{ $errors->first('branches_banner_image') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Shipping Banner Image </label>
                                        <input type="file" name="shipping_banner_image" id="shipping_banner_image">
                                        @if($row->shipping_banner_image !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('banner_images/' . $row->shipping_banner_image) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('shipping_banner_image'))
                                        <span class="text-danger">{{ $errors->first('shipping_banner_image') }}</span>
                                    @endif
                                </div>
                                
            
                            </div>
                        <button type="submit" class="btn btn-primary pull-right">Edit Banner Images</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection