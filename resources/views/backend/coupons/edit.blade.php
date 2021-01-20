@extends('backend.layouts.app')

@php $pageTitle = 'Edit Coupon'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    @component('backend.layouts.header', ['navTitle' => 'Edit Coupon'])
        
    @endcomponent
    
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ $pageTitle }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('coupons.update', $row->id) }}" method="POST">
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Coupon Code</label>
                                        <input type="text" name="code" class="form-control" value="{{ $row->code }}">
                                    </div>
                                    @if($errors->has('code'))
                                        <span class="text-danger">{{ $errors->first('code') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Discount</label>
                                        <input type="number" name="percentage" class="form-control" value="{{ $row->percentage }}">
                                    </div>
                                    @if($errors->has('percentage'))
                                        <span class="text-danger">{{ $errors->first('percentage') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Status</label>
                                        <select name="status" class="form-control" style="background-color:#202940">
                                            <option value="1" {{ $row->status == 1 ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{ $row->status == 0 ? 'selected' : ''}}>Inactive</option>
                                        </select>
                                    </div>
                                    @if($errors->has('status'))
                                        <span class="text-danger">{{ $errors->first('status') }}</span>
                                    @endif
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary pull-right">Edit Coupon</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection