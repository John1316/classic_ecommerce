@extends('backend.layouts.app')

@php $pageTitle = 'Add Branch'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    @component('backend.layouts.header', ['navTitle' => 'Add Branch'])
        
    @endcomponent
    
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ $pageTitle }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('branches.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Branch location in English</label>
                                        <input type="text" name="en_branch_location" id="en_branch_location" class="form-control" value="{{ old('en_branch_location') }}">
                                    </div>
                                    @if($errors->has('en_branch_location'))
                                        <span class="text-danger">{{ $errors->first('en_branch_location') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">مكان الفرع</label>
                                        <input type="text" name="ar_branch_location" id="ar_branch_location" class="form-control" value="{{ old('ar_branch_location') }}">
                                    </div>
                                    @if($errors->has('ar_branch_location'))
                                        <span class="text-danger">{{ $errors->first('ar_branch_location') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Branch city in English</label>
                                        <input type="text" name="en_branch_city" id="en_branch_city" class="form-control" value="{{ old('en_branch_city') }}">
                                    </div>
                                    @if($errors->has('en_branch_city'))
                                        <span class="text-danger">{{ $errors->first('en_branch_city') }}</span>
                                    @endif
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">المحافظة</label>
                                        <input type="text" name="ar_branch_city" id="ar_branch_city" class="form-control" value="{{ old('ar_branch_city') }}">
                                    </div>
                                    @if($errors->has('ar_branch_city'))
                                        <span class="text-danger">{{ $errors->first('ar_branch_city') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Branch Address in English</label>
                                        <input type="text" name="en_branch_address" id="en_branch_address" class="form-control" value="{{ old('en_branch_address') }}">
                                    </div>
                                    @if($errors->has('en_branch_address'))
                                        <span class="text-danger">{{ $errors->first('en_branch_address') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">العنوان</label>
                                        <input type="text" name="ar_branch_address" id="ar_branch_address" class="form-control" value="{{ old('ar_branch_address') }}">
                                    </div>
                                    @if($errors->has('ar_branch_address'))
                                        <span class="text-danger">{{ $errors->first('ar_branch_address') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Branch phone1</label>
                                        <input type="number" name="branch_phone_1" id="branch_phone_1" class="form-control" value="{{ old('branch_phone_1') }}">
                                    </div>
                                    @if($errors->has('branch_phone_1'))
                                        <span class="text-danger">{{ $errors->first('branch_phone_1') }}</span>
                                    @endif
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Branch phone2</label>
                                        <input type="number" name="branch_phone_2" id="branch_phone_2" class="form-control" value="{{ old('branch_phone_2') }}">
                                    </div>
                                    @if($errors->has('branch_phone_2'))
                                        <span class="text-danger">{{ $errors->first('branch_phone_2') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Branch phone3</label>
                                        <input type="number" name="branch_phone_3" id="branch_phone_3" class="form-control" value="{{ old('branch_phone_3') }}">
                                    </div>
                                    @if($errors->has('branch_phone_3'))
                                        <span class="text-danger">{{ $errors->first('branch_phone_3') }}</span>
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
                        <button type="submit" class="btn btn-primary pull-right">Add Branch</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection