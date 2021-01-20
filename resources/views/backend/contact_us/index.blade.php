@extends('backend.layouts.app')

@php $pageTitle = 'Contact Us'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@push('css')
    <style>

    </style>
@endpush

@section('content')
    @component('backend.layouts.header', ['navTitle' => ' Contact Us Control'])
        
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
                      Email
                    </th>
                    <th>
                      Phone 
                    </th>
                    <th>
                      Location 
                    </th>
                    <th>
                      Address 
                    </th>
                    {{-- <th>
                      Facebook 
                    </th>
                    <th>
                      Instagram 
                    </th>
                    <th>
                      Twitter 
                    </th> --}}
                    <th>
                      Banner Image 
                    </th>
                   
                    <th class="text-right">
                      Control
                    </th>
                  </thead>
                @foreach($rows as $contact)
                  <tbody>
                    <tr>
                    <td>
                     {{$contact->id}}
                      </td>
                      <td>
                     {{$contact->sales_email_1}}
                      </td>
                      <td>
                     {{$contact->phone}}
                      </td>
                      <td>
                        {{$contact->en_location}}
                      </td>
                      <td>
                     {{$contact->en_address}}
                      </td>
                      {{-- <td>
                     {{$contact->facebook}}
                      </td>
                      <td>
                     {{$contact->instagram}}
                      </td>
                      <td>
                     {{$contact->twitter}}
                      </td> --}}
                      <td>
                        <img src="{{ asset('contact_us/' . $contact->banner_image) }}" width="100px" height="100px">
                      </td>  
                      
                      <td class="td-actions text-right">
                      <a href="{{ route('contact_us.edit', $contact->id) }}">
                                <button title="" class="btn btn-white btn-link btn-sm" type="button" data-original-title=" Edit Contact Us " rel="tooltip">
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
                    <h3 class="text-center">No Contact Us Found</h3>
                @endif
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection