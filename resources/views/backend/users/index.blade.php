@extends('backend.layouts.app')

@php $pageTitle = 'Users Control'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@push('css')
    <style>

    </style>
@endpush

@section('content')
    @component('backend.layouts.header', ['navTitle' => 'Users'])
        
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
                    {{-- <div class="col-md-4 text-right">
                      <a class="btn btn-white btn-round" href="{{ route('users.create') }}">Add User</a>
                    </div> --}}
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if(count($rows))
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                      ID
                    </th>
                    <th>
                      Name
                    </th>
                    <th>
                      Email
                    </th>
                    <th>
                      Phone
                    </th>
                    <th class="text-right">
                      Control
                    </th>
                  </thead>
                  @foreach ($rows as $user)
                  <tbody>
                    <tr>
                      <td>
                        {{$user->id}}
                      </td>
                      <td>
                        {{$user->name}}
                      </td>
                      <td>
                        {{$user->email}}
                      </td>
                      <td>
                        {{$user->phone}}
                      </td>
                      <td class="td-actions text-right">
                            <a href="{{ route('users.show', $user->id) }}">
                                <button title="" class="btn btn-white btn-link btn-sm" type="button" data-original-title="Show User" rel="tooltip">
                                <i class="material-icons">zoom_in</i>
                                </button>
                            </a>
                            @if(auth()->user()->role === 'super-admin' || auth()->user()->role === 'admin')
                              <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                  {{ csrf_field() }}
                                  {{ method_field('delete') }}
                                  <button title="" class="btn btn-white btn-link btn-sm" type="submit" data-original-title="Remove User" rel="tooltip" onclick="return confirm('Are you sure you want to delete this item?');">
                                  <i class="material-icons">close</i>
                                  </button>
                              </form>
                            @endif
                     </td>
                    </tr>
                  </tbody>
                  @endforeach
                </table>
                {{ $rows->links() }} 
                    @else
                    <h3 class="text-center">No Users Found</h3>
                @endif
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection


