@extends('backend.layouts.app')

@php $pageTitle = 'Branches Control'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@push('css')
    <style>

    </style>
@endpush

@section('content')
    @component('backend.layouts.header', ['navTitle' => 'Branches'])
        
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
                        <a class="btn btn-white btn-round" href="{{ route('branches.create') }}">Add Branch</a>
                    </div>
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
                      Location
                    </th>
                    <th>
                      مكان الفرع
                    </th>
                    <th>
                      City
                    </th>
                    <th>
                      المحافظة
                    </th>
                    <th>
                      Address
                    </th>
                    <th>
                      العنوان
                    </th>
                    <th>
                      Phone1
                    </th>
                    <th>
                      Phone2
                    </th>
                    <th>
                      Phone3
                    </th>
                    <th class="text-right">
                      Control
                    </th>
                  </thead>
                  @foreach ($rows as $branch)
                  <tbody>
                    <tr>
                      <td>
                        {{$branch->id}}
                      </td>
                      <td>
                        {{$branch->en_branch_location}}
                      </td>
                      <td>
                        {{$branch->ar_branch_location}}
                      </td>
                      <td>
                        {{$branch->en_branch_city}}
                      </td>
                      <td>
                        {{$branch->ar_branch_city}}
                      </td>
                      <td>
                        {{$branch->en_branch_address}}
                      </td>
                      <td>
                        {{$branch->ar_branch_address}}
                      </td>
                      <td>
                        {{$branch->branch_phone_1}}
                      </td>
                      <td>
                        {{$branch->branch_phone_2}}
                      </td>
                      <td>
                        {{$branch->branch_phone_3}}
                      </td>
                      <td class="td-actions text-right">
                            <a href="{{ route('branches.edit', $branch->id) }}">
                                <button title="" class="btn btn-white btn-link btn-sm" type="button" data-original-title="Edit Branch" rel="tooltip">
                                <i class="material-icons">edit</i>
                                </button>
                            </a>
                            <form action="{{ route('branches.destroy', $branch->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button title="" class="btn btn-white btn-link btn-sm" type="submit" data-original-title="Remove Branch" rel="tooltip" onclick="return confirm('Are you sure you want to delete this item?');">
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
                    <h3 class="text-center">No Branches Found</h3>
                @endif
              </div>
            </div>
          </div>
        </div>
@endsection


