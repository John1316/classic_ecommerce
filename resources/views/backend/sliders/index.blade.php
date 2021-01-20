@extends('backend.layouts.app')

@php $pageTitle = ' Sliders'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@push('css')
    <style>

    </style>
@endpush

@section('content')
    @component('backend.layouts.header', ['navTitle' => ' Sliders Control'])
        
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
                    <div class="col-md-4 text-right">
                      <a class="btn btn-white btn-round" href="{{ route('sliders.create') }}">Add Slider</a>
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
                      Title
                    </th>
                    <th>
                      Text 
                    </th>
                    <th>
                      Image 
                    </th>
                   
                    <th class="text-right">
                      Control
                    </th>
                  </thead>
                @foreach($rows as $slider)
                  <tbody>
                    <tr>
                    <td>
                     {{$slider->id}}
                      </td>
                      <td>
                     {{$slider->en_title}}
                      </td>
                      <td>
                     {{$slider->en_text}}
                      </td>
                      <td>
                        <img src="{{ asset('sliders/' . $slider->image) }}" width="100px" height="100px">
                      </td>  
                      
                      <td class="td-actions text-right">
                      <a href="{{ route('sliders.edit', $slider->id) }}">
                                <button title="" class="btn btn-white btn-link btn-sm" type="button" data-original-title=" Edit Slider" rel="tooltip">
                                <i class="material-icons">edit</i>
                                </button>
                            </a>
                              <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST">
                                  {{ csrf_field() }}
                                  {{ method_field('delete') }}
                                  <button title="" class="btn btn-white btn-link btn-sm" type="submit" data-original-title=" Delete Slider" rel="tooltip" onclick="return confirm('Are you sure ?');">
                                  <i class="material-icons">close</i>
                                  </button>
                              </form>
                     </td>
                    </tr>
                  </tbody>
                 @endforeach
                </table>
                {{ $rows->links() }}  
                @else
                    <h3 class="text-center">No Sliders Found</h3>
                @endif
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection