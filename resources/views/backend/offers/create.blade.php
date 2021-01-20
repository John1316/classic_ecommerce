@extends('backend.layouts.app')

@php $pageTitle = 'Add Offer'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    @component('backend.layouts.header', ['navTitle' => 'Add Offer'])
        
    @endcomponent
    
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ $pageTitle }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('offers.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Combos</label>
                                        <select name="combo_id" class="form-control" style="background-color:#202940;">
                                            <option value="">Select a Combo *</option>
                                            @foreach($combos as $combo)
                                                <option value="{{ $combo->id }}"}>{{ $combo->pieces }} pieces ({{ $combo->prices }} EGP)</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('combo_id'))
                                        <span class="text-danger">{{ $errors->first('combo_id') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Discount</label>
                                        <input type="number" name="percentage" class="form-control" value="{{ old('percentage') }}">
                                    </div>
                                    @if($errors->has('percentage'))
                                        <span class="text-danger">{{ $errors->first('percentage') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Image</label>
                                        <input type="file" name="image">
                                    </div>
                                    @if($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary pull-right">Add Offer</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection