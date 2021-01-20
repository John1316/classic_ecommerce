@extends('backend.layouts.app')

@php $pageTitle = ' Edit Contact Us'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    @component('backend.layouts.header', ['navTitle' => ' Edit Contact Us'])
        
    @endcomponent
    
     
    <div class="row">
                <div class="col-md-8">
                    <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ $pageTitle }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('contact_us.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Sales Email 1</label>
                                        <input type="email" name="sales_email_1" id="sales_email_1" class="form-control" value="{{ $row->sales_email_1 }}">
                                    </div>
                                    @if($errors->has('sales_email_1'))
                                        <span class="text-danger">{{ $errors->first('sales_email_1') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Sales Email 2</label>
                                        <input type="email" name="sales_email_2" id="sales_email_2" class="form-control" value="{{ $row->sales_email_2 }}">
                                    </div>
                                    @if($errors->has('sales_email_2'))
                                        <span class="text-danger">{{ $errors->first('sales_email_2') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Sales Email 3</label>
                                        <input type="email" name="sales_email_3" id="sales_email_3" class="form-control" value="{{ $row->sales_email_3 }}">
                                    </div>
                                    @if($errors->has('sales_email_3'))
                                        <span class="text-danger">{{ $errors->first('sales_email_3') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> phone </label>
                                        <input type="number" name="phone" id="phone" class="form-control" value="{{ $row->phone }}">
                                    </div>
                                    @if($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> fax </label>
                                        <input type="number" name="fax" id="fax" class="form-control" value="{{ $row->fax }}">
                                    </div>
                                    @if($errors->has('fax'))
                                        <span class="text-danger">{{ $errors->first('fax') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> المنطقة </Address> </label>
                                        <input type="text" name="ar_location" id="ar_location" class="form-control" value="{{ $row->ar_location }}">
                                    </div>
                                    @if($errors->has('ar_location'))
                                        <span class="text-danger">{{ $errors->first('ar_location') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Location </label>
                                        <input type="text" name="en_location" id="en_location" class="form-control" value="{{ $row->en_location }}">
                                    </div>
                                    @if($errors->has('en_location'))
                                        <span class="text-danger">{{ $errors->first('en_location') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> العنوان </Address> </label>
                                        <textarea cols="5" rows="10" name="ar_address" id="ar_address" class="form-control" >{{ $row->ar_address  }}</textarea>
                                    </div>
                                    @if($errors->has('ar_address'))
                                        <span class="text-danger">{{ $errors->first('ar_address') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Address </Address> </label>
                                        <textarea cols="5" rows="10" name="en_address" id="en_address" class="form-control" >{{ $row->en_address  }}</textarea>
                                    </div>
                                    @if($errors->has('en_address'))
                                        <span class="text-danger">{{ $errors->first('en_address') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> ايام العمل الرسميه </Address> </label>
                                        <input type="text" name="ar_work_days" id="ar_work_days" class="form-control" value="{{ $row->ar_work_days }}">
                                    </div>
                                    @if($errors->has('ar_work_days'))
                                        <span class="text-danger">{{ $errors->first('ar_work_days') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Working Days </Address> </label>
                                        <input type="text" name="en_work_days" id="en_work_days" class="form-control" value="{{ $row->en_work_days }}">
                                    </div>
                                    @if($errors->has('en_work_days'))
                                        <span class="text-danger">{{ $errors->first('en_work_days') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> مواعيد العمل الرسمية  </Address> </label>
                                        <input type="text" name="ar_work_hours" id="ar_work_hours" class="form-control" value="{{ $row->ar_work_hours }}">
                                    </div>
                                    @if($errors->has('ar_work_hours'))
                                        <span class="text-danger">{{ $errors->first('ar_work_hours') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Working Hours </Address> </label>
                                        <input type="text" name="en_work_hours" id="en_work_hours" class="form-control" value="{{ $row->en_work_hours }}">
                                    </div>
                                    @if($errors->has('en_work_hours'))
                                        <span class="text-danger">{{ $errors->first('en_work_hours') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Facebook Link </label>
                                        <input type="url" name="facebook" id="facebook" class="form-control" value="{{ $row->facebook  }}">
                                    </div>
                                    @if($errors->has('facebook'))
                                        <span class="text-danger">{{ $errors->first('facebook') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Instagram Link </label>
                                        <input type="url" name="instagram" id="instagram" class="form-control" value="{{ $row->instagram  }}">
                                    </div>
                                    @if($errors->has('instagram'))
                                        <span class="text-danger">{{ $errors->first('instagram') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Twitter </label>
                                        <input type="url" name="twitter" id="twitter" class="form-control" value="{{ $row->twitter }}">
                                    </div>
                                    @if($errors->has('twitter'))
                                        <span class="text-danger">{{ $errors->first('twitter') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Contact Us Banner Image</label>
                                        <input type="file" name="banner_image" id="banner_image" >
                                        @if($row->banner_image !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('contact_us/' . $row->banner_image) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('banner_image'))
                                        <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                                    @endif
                                </div>

                            </div>
                        <button type="submit" class="btn btn-primary pull-right" onclick="return confirm('Are you sure ?');"> Update </button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection