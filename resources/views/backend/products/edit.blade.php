@extends('backend.layouts.app')

@php $pageTitle = 'Edit Product'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    @component('backend.layouts.header', ['navTitle' => 'Edit Product'])
        
    @endcomponent
    
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="card-title ">{{ $pageTitle }} </h4>
                                </div>
                            </div>
                        </div>
                    <div class="card-body">
                        <form action="{{ route('products.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Product Name in English</label>
                                        <input type="text" name="en_name" id="en_name" class="form-control" value="{{ $row->en_name }}">
                                    </div>
                                    @if($errors->has('en_name'))
                                        <span class="text-danger">{{ $errors->first('en_name') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">اسم المنتج بالعربي</label>
                                        <input type="text" name="ar_name" id="ar_name" class="form-control" value="{{ $row->ar_name }}">
                                    </div>
                                    @if($errors->has('ar_name'))
                                        <span class="text-danger">{{ $errors->first('ar_name') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Description In English</label>
                                        <textarea rows="20" cols="5" name="en_text" class="form-control">{{ $row->en_text }}</textarea>
                                    </div>
                                    @if($errors->has('en_text'))
                                        <span class="text-danger">{{ $errors->first('en_text') }}</span>
                                    @endif             
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">التفاصيل بالعربي</label>
                                        <textarea rows="20" cols="5" name="ar_text" class="form-control">{{ $row->ar_text }}</textarea>
                                    </div>
                                    @if($errors->has('ar_text'))
                                        <span class="text-danger">{{ $errors->first('ar_text') }}</span>
                                    @endif             
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Price before discount</label>
                                        <input type="number" name="price_before_discount" class="form-control" value="{{ $row->price_before_discount }}">
                                    </div>
                                    @if($errors->has('price_before_discount'))
                                        <span class="text-danger">{{ $errors->first('price_before_discount') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Price after discount</label>
                                        <input type="number" name="price_after_discount" class="form-control" value="{{ $row->price_after_discount }}">
                                    </div>
                                    @if($errors->has('price_after_discount'))
                                        <span class="text-danger">{{ $errors->first('price_after_discount') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Featured</label>
                                        <select name="featured" class="form-control" style="background-color:#202940;">
                                            <option value="">Select Featured</option>
                                            <option value="1" {{ $row->featured == 1 ? 'selected' : null }}>Yes</option>
                                            <option value="0" {{ $row->featured == 0 ? 'selected' : null }}>No</option>
                                        </select>
                                    </div>
                                    @if($errors->has('featured'))
                                        <span class="text-danger">{{ $errors->first('featured') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Hot Deal</label>
                                        <select name="hot_deal" class="form-control" style="background-color:#202940;">
                                            <option value="">Select Hot Deal</option>
                                            <option value="1" {{ $row->hot_deal == 1 ? 'selected' : null }}>Yes</option>
                                            <option value="0" {{ $row->hot_deal == 0 ? 'selected' : null }}>No</option>
                                        </select>
                                    </div>
                                    @if($errors->has('hot_deal'))
                                        <span class="text-danger">{{ $errors->first('hot_deal') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Image</label>
                                        <input type="file" name="image">
                                        @if($row->image !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('products/' . $row->image) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Extra Images</label>
                                        <input type="file" name="images[]" multiple="multiple">
                                        @foreach($row->productImages as $productImage)
                                            <div class="col text-center">
                                                <img src="{{ asset('products/' . $productImage->image) }}" width="100px" height="100px;">
                                                <a href="{{ route('deleteProductImages', $productImage->id) }}" class="btn btn-danger">Delete image</a>
                                            </div>
                                        @endforeach
                                    </div>
                                    @if($errors->has('images'))
                                        <span class="text-danger">{{ $errors->first('images') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Category</label>
                                        <select name="category_id" class="form-control" style="background-color:#202940;">
                                            <option value="">Select a Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $row->category_id == $category->id ? 'selected' : null }}>{{ $category->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('category_id'))
                                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Banner Image </label>
                                        <input type="file" name="banner_image" id="banner_image">
                                        @if($row->banner_image !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('products/' . $row->banner_image) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('banner_image'))
                                        <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                                    @endif
                                </div>

                            </div>
                        <button type="submit" class="btn btn-primary pull-right">Edit Product</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection