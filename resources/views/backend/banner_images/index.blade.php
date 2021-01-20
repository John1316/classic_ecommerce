@extends('backend.layouts.app')

@php $pageTitle = ' Banner Images'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@push('css')
    <style>

    </style>
@endpush

@section('content')
    @component('backend.layouts.header', ['navTitle' => ' Banner Images Control'])
        
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
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card-title ">{{ $pageTitle }} </h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if(count($rows))
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                      #
                    </th>
                    <th>
                      Cart Banner Image
                    </th>
                    <th>
                      Checkout Banner Image
                    </th>
                    <th>
                      Profile Banner Image
                    </th>
                    <th>
                      Shop Banner Image
                    </th>
                    <th>
                      Branches Banner Image
                    </th>
                   
                    <th class="text-right">
                      Control
                    </th>
                  </thead>
                @foreach($rows as $banner_image)
                  <tbody>
                    <tr>
                    <td>
                     {{$banner_image->id}}
                      </td>
                      <td>
                        <img src="{{ asset('banner_images/' . $banner_image->cart_banner_image) }}" width="100px" height="100px">
                      </td> 
                      <td>
                        <img src="{{ asset('banner_images/' . $banner_image->checkout_banner_image) }}" width="100px" height="100px">
                      </td> 
                      <td>
                        <img src="{{ asset('banner_images/' . $banner_image->profile_banner_image) }}" width="100px" height="100px">
                      </td> 
                      <td>
                        <img src="{{ asset('banner_images/' . $banner_image->shop_banner_image) }}" width="100px" height="100px">
                      </td>  
                      <td>
                        <img src="{{ asset('banner_images/' . $banner_image->branches_banner_image) }}" width="100px" height="100px">
                      </td> 
                     
                      
                      <td class="td-actions text-right">
                      <a href="{{ route('banner_images.edit', $banner_image->id) }}">
                          <button title="" class="btn btn-white btn-link btn-sm" type="button" data-original-title=" Edit Banner Images" rel="tooltip">
                          <i class="material-icons">edit</i>
                          </button>
                      </a>
                     </td>
                    </tr>
                  </tbody>
                 @endforeach
                </table>
                {{ $rows->links() }}  
                @else
                    <h3 class="text-center">No Banner Images Found</h3>
                @endif
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection