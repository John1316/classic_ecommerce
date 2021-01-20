@extends('backend.layouts.app')

@php $pageTitle = ' Edit Main Page '; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    @component('backend.layouts.header', ['navTitle' => '  Edit Main Page'])
        
    @endcomponent
    
     
    <div class="row">
                <div class="col-md-8">
                    <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ $pageTitle }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('main.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Home First Number </label>
                                        <input type="number" name="home_first_number" id="home_first_number" class="form-control" value="{{ $row->home_first_number }}">
                                    </div>
                                    @if($errors->has('home_first_number'))
                                        <span class="text-danger">{{ $errors->first('home_first_number') }}</span>
                                    @endif
                                </div>  

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Home First Number Title in English </label>
                                        <input type="text" name="en_home_first_number_title" id="en_home_first_number_title" class="form-control" value="{{ $row->en_home_first_number_title }}">
                                    </div>
                                    @if($errors->has('en_home_first_number_title'))
                                        <span class="text-danger">{{ $errors->first('en_home_first_number_title') }}</span>
                                    @endif
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Home First Number Title in Arabic </label>
                                        <input type="text" name="ar_home_first_number_title" id="ar_home_first_number_title" class="form-control" value="{{ $row->ar_home_first_number_title }}">
                                    </div>
                                    @if($errors->has('ar_home_first_number_title'))
                                        <span class="text-danger">{{ $errors->first('ar_home_first_number_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Home Second Number </label>
                                        <input type="number" name="home_second_number" id="home_second_number" class="form-control" value="{{ $row->home_second_number }}">
                                    </div>
                                    @if($errors->has('home_second_number'))
                                        <span class="text-danger">{{ $errors->first('home_second_number') }}</span>
                                    @endif
                                </div>  

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Home Second Number Title in English </label>
                                        <input type="text" name="en_home_second_number_title" id="en_home_second_number_title" class="form-control" value="{{ $row->en_home_second_number_title }}">
                                    </div>
                                    @if($errors->has('en_home_second_number_title'))
                                        <span class="text-danger">{{ $errors->first('en_home_second_number_title') }}</span>
                                    @endif
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Home Second Number Title in Arabic </label>
                                        <input type="text" name="ar_home_second_number_title" id="ar_home_second_number_title" class="form-control" value="{{ $row->ar_home_second_number_title }}">
                                    </div>
                                    @if($errors->has('ar_home_second_number_title'))
                                        <span class="text-danger">{{ $errors->first('ar_home_second_number_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Home Third Number </label>
                                        <input type="number" name="home_third_number" id="home_third_number" class="form-control" value="{{ $row->home_third_number }}">
                                    </div>
                                    @if($errors->has('home_third_number'))
                                        <span class="text-danger">{{ $errors->first('home_third_number') }}</span>
                                    @endif
                                </div>  

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Home Third Number Title in English </label>
                                        <input type="text" name="en_home_third_number_title" id="en_home_third_number_title" class="form-control" value="{{ $row->en_home_third_number_title }}">
                                    </div>
                                    @if($errors->has('en_home_third_number_title'))
                                        <span class="text-danger">{{ $errors->first('en_home_third_number_title') }}</span>
                                    @endif
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Home Third Number Title in Arabic </label>
                                        <input type="text" name="ar_home_third_number_title" id="ar_home_third_number_title" class="form-control" value="{{ $row->ar_home_third_number_title }}">
                                    </div>
                                    @if($errors->has('ar_home_third_number_title'))
                                        <span class="text-danger">{{ $errors->first('ar_home_third_number_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Home Fourth Number </label>
                                        <input type="number" name="home_fourth_number" id="home_fourth_number" class="form-control" value="{{ $row->home_fourth_number }}">
                                    </div>
                                    @if($errors->has('home_fourth_number'))
                                        <span class="text-danger">{{ $errors->first('home_fourth_number') }}</span>
                                    @endif
                                </div>  

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Home Fourth Number Title in English </label>
                                        <input type="text" name="en_home_fourth_number_title" id="en_home_fourth_number_title" class="form-control" value="{{ $row->en_home_fourth_number_title }}">
                                    </div>
                                    @if($errors->has('en_home_fourth_number_title'))
                                        <span class="text-danger">{{ $errors->first('en_home_fourth_number_title') }}</span>
                                    @endif
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Home Fourth Number Title in Arabic </label>
                                        <input type="text" name="ar_home_fourth_number_title" id="ar_home_fourth_number_title" class="form-control" value="{{ $row->ar_home_fourth_number_title }}">
                                    </div>
                                    @if($errors->has('ar_home_fourth_number_title'))
                                        <span class="text-danger">{{ $errors->first('ar_home_fourth_number_title') }}</span>
                                    @endif
                                </div>

                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Home Advatage First Title In English</label>
                                        <input type="text" name="en_home_advantage_first_title" id="en_home_advantage_first_title" class="form-control" value="{{ $row->en_home_advantage_first_title }}">
                                    </div>
                                    @if($errors->has('en_home_advantage_first_title'))
                                        <span class="text-danger">{{ $errors->first('en_home_advantage_first_title') }}</span>
                                    @endif
                                </div> 

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Home Advatage First Title In Arabic</label>
                                        <input type="text" name="ar_home_advantage_first_title" id="ar_home_advantage_first_title" class="form-control" value="{{ $row->ar_home_advantage_first_title }}">
                                    </div>
                                    @if($errors->has('ar_home_advantage_first_title'))
                                        <span class="text-danger">{{ $errors->first('ar_home_advantage_first_title') }}</span>
                                    @endif
                                </div> 


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Home Advatage First Text In English</label>
                                        <textarea cols="5" rows="10" name="en_home_advantage_first_text" id="en_home_advantage_first_text" class="form-control" >{{ $row->en_home_advantage_first_text}}</textarea>
                                    </div>
                                    @if($errors->has('en_home_advantage_first_text'))
                                        <span class="text-danger">{{ $errors->first('en_home_advantage_first_text') }}</span>
                                    @endif
                                </div>   

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Home Advatage First Text In Arabic</label>
                                        <textarea cols="5" rows="10" name="ar_home_advantage_first_text" id="ar_home_advantage_first_text" class="form-control" >{{ $row->ar_home_advantage_first_text}}</textarea>
                                    </div>
                                    @if($errors->has('ar_home_advantage_first_text'))
                                        <span class="text-danger">{{ $errors->first('ar_home_advantage_first_text') }}</span>
                                    @endif
                                </div>   

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Home Advatage Second Title In English</label>
                                        <input type="text" name="en_home_advantage_second_title" id="en_home_advantage_second_title" class="form-control" value="{{ $row->en_home_advantage_second_title }}">
                                    </div>
                                    @if($errors->has('en_home_advantage_second_title'))
                                        <span class="text-danger">{{ $errors->first('en_home_advantage_second_title') }}</span>
                                    @endif
                                </div> 

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Home Advatage Second Title In Arabic</label>
                                        <input type="text" name="ar_home_advantage_second_title" id="ar_home_advantage_second_title" class="form-control" value="{{ $row->ar_home_advantage_second_title }}">
                                    </div>
                                    @if($errors->has('ar_home_advantage_second_title'))
                                        <span class="text-danger">{{ $errors->first('ar_home_advantage_second_title') }}</span>
                                    @endif
                                </div> 


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Home Advatage Second Text In English</label>
                                        <textarea cols="5" rows="10" name="en_home_advantage_second_text" id="en_home_advantage_second_text" class="form-control" >{{ $row->en_home_advantage_second_text}}</textarea>
                                    </div>
                                    @if($errors->has('en_home_advantage_second_text'))
                                        <span class="text-danger">{{ $errors->first('en_home_advantage_second_text') }}</span>
                                    @endif
                                </div>   

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Home Advatage second Text In Arabic</label>
                                        <textarea cols="5" rows="10" name="ar_home_advantage_second_text" id="ar_home_advantage_second_text" class="form-control" >{{ $row->ar_home_advantage_second_text}}</textarea>
                                    </div>
                                    @if($errors->has('ar_home_advantage_second_text'))
                                        <span class="text-danger">{{ $errors->first('ar_home_advantage_second_text') }}</span>
                                    @endif
                                </div> 

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Home Advatage Third Title In English</label>
                                        <input type="text" name="en_home_advantage_third_title" id="en_home_advantage_third_title" class="form-control" value="{{ $row->en_home_advantage_third_title }}">
                                    </div>
                                    @if($errors->has('en_home_advantage_third_title'))
                                        <span class="text-danger">{{ $errors->first('en_home_advantage_third_title') }}</span>
                                    @endif
                                </div> 

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Home Advatage Third Title In Arabic</label>
                                        <input type="text" name="ar_home_advantage_third_title" id="ar_home_advantage_third_title" class="form-control" value="{{ $row->ar_home_advantage_third_title }}">
                                    </div>
                                    @if($errors->has('ar_home_advantage_third_title'))
                                        <span class="text-danger">{{ $errors->first('ar_home_advantage_third_title') }}</span>
                                    @endif
                                </div> 


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Home Advatage Third Text In English</label>
                                        <textarea cols="5" rows="10" name="en_home_advantage_third_text" id="en_home_advantage_third_text" class="form-control" >{{ $row->en_home_advantage_third_text}}</textarea>
                                    </div>
                                    @if($errors->has('en_home_advantage_third_text'))
                                        <span class="text-danger">{{ $errors->first('en_home_advantage_third_text') }}</span>
                                    @endif
                                </div>   

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Home Advatage Third Text In Arabic</label>
                                        <textarea cols="5" rows="10" name="ar_home_advantage_third_text" id="ar_home_advantage_third_text" class="form-control" >{{ $row->ar_home_advantage_third_text}}</textarea>
                                    </div>
                                    @if($errors->has('ar_home_advantage_third_text'))
                                        <span class="text-danger">{{ $errors->first('ar_home_advantage_third_text') }}</span>
                                    @endif
                                </div> 

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Home Advatage Fourth Title In English</label>
                                        <input type="text" name="en_home_advantage_fourth_title" id="en_home_advantage_fourth_title" class="form-control" value="{{ $row->en_home_advantage_fourth_title }}">
                                    </div>
                                    @if($errors->has('en_home_advantage_fourth_title'))
                                        <span class="text-danger">{{ $errors->first('en_home_advantage_fourth_title') }}</span>
                                    @endif
                                </div> 

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Home Advatage Fourth Title In Arabic</label>
                                        <input type="text" name="ar_home_advantage_fourth_title" id="ar_home_advantage_fourth_title" class="form-control" value="{{ $row->ar_home_advantage_fourth_title }}">
                                    </div>
                                    @if($errors->has('ar_home_advantage_fourth_title'))
                                        <span class="text-danger">{{ $errors->first('ar_home_advantage_fourth_title') }}</span>
                                    @endif
                                </div> 


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Home Advatage Fourth Text In English</label>
                                        <textarea cols="5" rows="10" name="en_home_advantage_fourth_text" id="en_home_advantage_fourth_text" class="form-control" >{{ $row->en_home_advantage_fourth_text}}</textarea>
                                    </div>
                                    @if($errors->has('en_home_advantage_fourth_text'))
                                        <span class="text-danger">{{ $errors->first('en_home_advantage_fourth_text') }}</span>
                                    @endif
                                </div>   

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Home Advatage Fourth Text In Arabic</label>
                                        <textarea cols="5" rows="10" name="ar_home_advantage_fourth_text" id="ar_home_advantage_fourth_text" class="form-control" >{{ $row->ar_home_advantage_fourth_text}}</textarea>
                                    </div>
                                    @if($errors->has('ar_home_advantage_fourth_text'))
                                        <span class="text-danger">{{ $errors->first('ar_home_advantage_fourth_text') }}</span>
                                    @endif
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Home footer  Title In English</label>
                                        <input type="text" name="en_footer_about_title" id="en_footer_about_title" class="form-control" value="{{ $row->en_footer_about_title }}">
                                    </div>
                                    @if($errors->has('en_footer_about_title'))
                                        <span class="text-danger">{{ $errors->first('en_footer_about_title') }}</span>
                                    @endif
                                </div> 

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Home footer Title In Arabic</label>
                                        <input type="text" name="ar_footer_about_title" id="ar_footer_about_title" class="form-control" value="{{ $row->ar_footer_about_title }}">
                                    </div>
                                    @if($errors->has('ar_footer_about_title'))
                                        <span class="text-danger">{{ $errors->first('ar_footer_about_title') }}</span>
                                    @endif
                                </div> 


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Home footer Text In English</label>
                                        <textarea cols="5" rows="10" name="en_footer_about_text" id="en_footer_about_text" class="form-control" >{{ $row->en_footer_about_text}}</textarea>
                                    </div>
                                    @if($errors->has('en_footer_about_text'))
                                        <span class="text-danger">{{ $errors->first('en_footer_about_text') }}</span>
                                    @endif
                                </div>   

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Home footer Text In Arabic</label>
                                        <textarea cols="5" rows="10" name="ar_footer_about_text" id="ar_footer_about_text" class="form-control" >{{ $row->ar_footer_about_text}}</textarea>
                                    </div>
                                    @if($errors->has('ar_footer_about_text'))
                                        <span class="text-danger">{{ $errors->first('ar_footer_about_text') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Home Advirtise first Image  </label>
                                        <input type="file" name="home_first_ad" id="home_first_ad" >
                                        @if($row->home_first_ad !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('main/' . $row->home_first_ad) }}" width="100px" height="">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('home_first_ad'))
                                        <span class="text-danger">{{ $errors->first('home_first_ad') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Home Advirtise second Image </label>
                                        <input type="file" name="home_second_ad" id="home_second_ad" >
                                        @if($row->home_second_ad !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('main/' . $row->home_second_ad) }}" width="100px" height="">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('home_second_ad'))
                                        <span class="text-danger">{{ $errors->first('home_second_ad') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Home Numbers Banner Image  </label>
                                        <input type="file" name="home_number_banner" id="home_number_banner" >
                                        @if($row->home_number_banner !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('main/' . $row->home_number_banner) }}" width="100px" height="">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('home_number_banner'))
                                        <span class="text-danger">{{ $errors->first('home_number_banner') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Home Advantage first Image  </label>
                                        <input type="file" name="home_advantage_first_icon" id="home_advantage_first_icon" >
                                        @if($row->home_advantage_first_icon !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('main/' . $row->home_advantage_first_icon) }}" width="100px" height="">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('home_advantage_first_icon'))
                                        <span class="text-danger">{{ $errors->first('home_advantage_first_icon') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Home Advantage Second Image  </label>
                                        <input type="file" name="home_advantage_second_icon" id="home_advantage_second_icon" >
                                        @if($row->home_advantage_second_icon !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('main/' . $row->home_advantage_second_icon) }}" width="100px" height="">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('home_advantage_second_icon'))
                                        <span class="text-danger">{{ $errors->first('home_advantage_second_icon') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Home Advantage Third Image  </label>
                                        <input type="file" name="home_advantage_third_icon" id="home_advantage_third_icon" >
                                        @if($row->home_advantage_third_icon !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('main/' . $row->home_advantage_third_icon) }}" width="100px" height="">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('home_advantage_third_icon'))
                                        <span class="text-danger">{{ $errors->first('home_advantage_third_icon') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Home Advantage Fourth Image  </label>
                                        <input type="file" name="home_advantage_fourth_icon" id="home_advantage_fourth_icon" >
                                        @if($row->home_advantage_fourth_icon !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('main/' . $row->home_advantage_fourth_icon) }}" width="100px" height="">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('home_advantage_fourth_icon'))
                                        <span class="text-danger">{{ $errors->first('home_advantage_fourth_icon') }}</span>
                                    @endif
                                </div>

                            </div>
                              
                        <button type="submit" class="btn btn-primary pull-right">Edit Main </button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection