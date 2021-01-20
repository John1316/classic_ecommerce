@extends('backend.layouts.app')

@php $pageTitle = ' Main Page '; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@push('css')
    <style>

    </style>
@endpush

@section('content')
    @component('backend.layouts.header', ['navTitle' => ' Main Page Control'])
        
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
                    Home AD First Image
                    </th>
                    <th>
                    Home AD Second Image 
                    </th>
                    <th>
                    Home Number Bunner Image 
                    </th>
                   
                    <th class="text-right">
                      Control
                    </th>
                  </thead>
                @foreach($rows as $main)
                  <tbody>
                    <tr>
                      <td>
                      {{$main->id}}
                      </td>
                      <td>
                        <img src="{{ asset('main/' . $main->home_first_ad) }}" width="100px" height="100px">
                      </td> 
                      <td>
                        <img src="{{ asset('main/' . $main->home_second_ad) }}" width="100px" height="100px">
                      </td> 
                      <td>
                        <img src="{{ asset('main/' . $main->home_number_banner) }}" width="100px" height="100px">
                      </td>
                      <td class="td-actions text-right">
                      <a href="{{ route('main.edit', $main->id) }}">
                                <button title="" class="btn btn-white btn-link btn-sm" type="button" data-original-title=" Edit Main Page " rel="tooltip">
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
                    <h3 class="text-center">No Main Page Found</h3>
                @endif
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection