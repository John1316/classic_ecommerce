@extends('backend.layouts.app')

@php $pageTitle = 'Edit Category'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    @component('backend.layouts.header', ['navTitle' => 'Edit Category'])
        
    @endcomponent
    
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ $pageTitle }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name in English</label>
                                        <input type="text" name="en_name" id="en_name" class="form-control" value="{{ $row->en_name }}">
                                    </div>
                                    @if($errors->has('en_name'))
                                        <span class="text-danger">{{ $errors->first('en_name') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">الإسم بالعربي</label>
                                        <input type="text" name="ar_name" id="ar_name" class="form-control" value="{{ $row->ar_name }}">
                                    </div>
                                    @if($errors->has('ar_name'))
                                        <span class="text-danger">{{ $errors->first('ar_name') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Text in English</label>
                                        <textarea cols="5" rows="10" name="en_text" id="en_text" class="form-control" >{{ $row->en_text }}</textarea>
                                    </div>
                                    @if($errors->has('en_text'))
                                        <span class="text-danger">{{ $errors->first('en_text') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">التفاصيل بالعربي</label>
                                        <textarea cols="5" rows="10" name="ar_text" id="ar_text" class="form-control" >{{ $row->ar_text }}</textarea>
                                    </div>
                                    @if($errors->has('ar_text'))
                                        <span class="text-danger">{{ $errors->first('ar_text') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Brand</label>
                                        <select class="form-control" name="brand_id" style="background-color:#202940">
                                            <option value="">Select a brand</option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}" {{ $brand->id == $row->brand_id ? 'selected' : null }}>{{ $brand->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('brand_id'))
                                        <span class="text-danger">{{ $errors->first('brand_id') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Category Image</label>
                                        <input type="file" name="image">
                                        @if($row->image !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('categories/' . $row->image) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Banner Image </label>
                                        <input type="file" name="banner_image" id="banner_image">
                                        @if($row->banner_image !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('banner_images/' . $row->banner_image) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('banner_image'))
                                        <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                                    @endif
                                </div>

                            </div>
                        <button type="submit" class="btn btn-primary pull-right">Edit Category</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection