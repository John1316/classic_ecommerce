@extends('backend.layouts.app')

@php $pageTitle = 'Orders Settings Control'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@push('css')
    <style>

    </style>
@endpush

@section('content')
    @component('backend.layouts.header', ['navTitle' => 'Orders Settings'])
        
    @endcomponent

    <div class="row">
        <div class="col-md-12">
            @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
            @endif
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">{{ $pageTitle }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.update', $orderSettings->id) }}" method="POST">
                    {{ method_field('put') }}
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Taxes</label>
                                <input type="number" name="taxes" class="form-control" value="{{ $orderSettings->taxes }}">
                            </div>
                            @if($errors->has('taxes'))
                                <span class="text-danger">{{ $errors->first('taxes') }}</span>
                            @endif
                        </div>
                    </div>
                <button type="submit" class="btn btn-primary pull-right">Edit Orders Settings</button>
                <div class="clearfix"></div>
                </form>
            </div>
            </div>
    </div>
    </div>
@endsection