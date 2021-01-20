@extends('backend.layouts.app')

@php $pageTitle = 'Edit Location'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    @component('backend.layouts.header', ['navTitle' => 'Edit Location'])
        
    @endcomponent
    
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ $pageTitle }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('locations.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <div class="row">
                        
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">location in English</label>
                                        <input type="text" name="en_location" id="en_location" class="form-control" value="{{ $row->en_location }}">
                                    </div>
                                    @if($errors->has('en_location'))
                                        <span class="text-danger">{{ $errors->first('en_location') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">مكان التوصيل</label>
                                        <input type="text" name="ar_location" id="ar_location" class="form-control" value="{{ $row->ar_location }}">
                                    </div>
                                    @if($errors->has('ar_location'))
                                        <span class="text-danger">{{ $errors->first('ar_location') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">price</label>
                                        <input type="text" name="price" id="price" class="form-control" value="{{ $row->price }}">
                                    </div>
                                    @if($errors->has('price'))
                                        <span class="text-danger">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>
            
                            </div>
                        <button type="submit" class="btn btn-primary pull-right">Edit Location</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection