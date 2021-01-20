@extends('backend.layouts.app')

@php $pageTitle = 'Edit Offer'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    @component('backend.layouts.header', ['navTitle' => 'Edit Offer'])
        
    @endcomponent
    
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ $pageTitle }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('offers.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Combos</label>
                                        <select name="combo_id" class="form-control" style="background-color:#202940;">
                                            <option value="">Select a Combo *</option>
                                            @foreach($combos as $combo)
                                                <option value="{{ $combo->id }}" {{ $combo->id === $row->combo_id ? 'selected' : null }}>{{ $combo->pieces }} pieces ({{ $combo->prices }} EGP)</option>
                                            @endforeach
                                        </select>                                    
                                    </div>
                                    @if($errors->has('piece'))
                                        <span class="text-danger">{{ $errors->first('piece') }}</span>
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
                                    <div>
                                        <label class="bmd-label-floating">Image</label>
                                        <input type="file" name="image">
                                            @if($row->image !== NULL)
                                                <div class="col text-center">
                                                    <img src="{{ asset('offers/' . $row->image) }}" width="100px" height="100px;">
                                                </div>
                                            @endif
                                    </div>
                                    @if($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary pull-right">Edit Offer</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection