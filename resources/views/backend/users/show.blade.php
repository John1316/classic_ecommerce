@extends('backend.layouts.app')

@php $pageTitle = 'Show User'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    @component('backend.layouts.header', ['navTitle' => 'Show User'])
        
    @endcomponent
    
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ $pageTitle }}</h4>
                    </div>
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $row->name }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Mobile Number</label>
                                        <input type="number" name="mobile" class="form-control" value="{{ $row->phone }}" disabled>
                                    </div>
                                </div>
                                @foreach($row->addresses as $address)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Area</label>
                                        <input type="text" name="area" class="form-control" value="{{ $address->location->en_location }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Address</label>
                                        <input type="text" name="address" class="form-control" value="{{ $address->address }}" disabled>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        <div class="clearfix"></div>
                    </div>
                    </div>
            </div>
            </div>
@endsection