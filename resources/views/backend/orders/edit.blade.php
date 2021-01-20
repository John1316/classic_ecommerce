@extends('backend.layouts.app')

@php $pageTitle = 'Edit Order'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@push('css')
    <style>

    </style>
@endpush

@section('content')
    @component('backend.layouts.header', ['navTitle' => 'Orders'])
        
    @endcomponent

    <div class="row">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">{{ $pageTitle }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('orders.update', $row->id) }}" method="POST">
                    {{ method_field('put') }}
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Order Status</label>
                                <select name="order_status" class="form-control" style="background-color:#202940">
                                    <option value="">Select a Status</option>
                                    @if($row->status == 'submitted') 
                                        <option value="" selected disabled>Submitted</option>
                                        <option value="confirmed">Confirmed</option>
                                        <option value="" disabled>Progress</option>
                                        <option value="" disabled>On the way</option>
                                        <option value="" disabled>Delivered</option>
                                    @elseif($row->status == 'confirmed')
                                        <option value="" disabled>Submitted</option>
                                        <option value="" selected disabled>Confirmed</option>
                                        <option value="progress">Progress</option>
                                        <option value="" disabled>On the way</option>
                                        <option value="" disabled>Delivered</option>
                                    @elseif($row->status == 'progress')
                                        <option value="" disabled>Submitted</option>
                                        <option value="" disabled>Confirmed</option>
                                        <option value="" disabled selected>Progress</option>
                                        <option value="on_the_way">On the way</option>
                                        <option value="" disabled>Delivered</option>
                                    @elseif($row->status == 'on_the_way')
                                        <option value="" disabled>Submitted</option>
                                        <option value="" disabled>Confirmed</option>
                                        <option value="" disabled>Progress</option>
                                        <option value="" disabled selected>On the way</option>
                                        <option value="delivered">Delivered</option>
                                    @else
                                        <option value="" disabled>Submitted</option>
                                        <option value="" disabled>Confirmed</option>
                                        <option value="" disabled>Progress</option>
                                        <option value="" disabled>On the way</option>
                                        <option value="" disabled selected>Delivered</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        @if($errors->has('order_status'))
                            <span class="text-danger">{{ $errors->first('order_status') }}</span>
                        @endif
                    </div>
                    @if($row->status !== 'delivered') 
                        <button type="submit" class="btn btn-primary pull-right">Edit Order</button>
                        <div class="clearfix"></div>
                    @endif
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection