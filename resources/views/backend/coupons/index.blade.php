@extends('backend.layouts.app')

@php $pageTitle = 'Coupons Control'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@push('css')
    <style>

    </style>
@endpush

@section('content')
    @component('backend.layouts.header', ['navTitle' => 'Coupons'])
        
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
                        <a class="btn btn-white btn-round" href="{{ route('coupons.create') }}">Add Coupon</a>
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
                      Coupon Code	
                    </th>
                    <th>
                      Percentage
                    </th>
                    <th>
                      Status
                    </th>
                    <th class="text-right">
                      Control
                    </th>
                  </thead>
                  @foreach ($rows as $coupon)
                  <tbody>
                    <tr>
                      <td>
                        {{ $coupon->id }}
                      </td>
                      <td>
                        {{ $coupon->code }}
                      </td>
                      <td>
                        {{ $coupon->percentage }}
                      </td>
                      <td>
                        @if($coupon->status == 1)
                            Active
                        @else
                            Inactive
                        @endif
                      </td>
                      <td class="td-actions text-right">
                            <a href="{{ route('coupons.edit', $coupon->id) }}">
                                <button title="" class="btn btn-white btn-link btn-sm" type="button" data-original-title="Edit coupon" rel="tooltip">
                                <i class="material-icons">edit</i>
                                </button>
                            </a>
                            <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button title="" class="btn btn-white btn-link btn-sm" type="submit" data-original-title="Remove Coupon" rel="tooltip" onclick="return confirm('Are you sure you want to delete this item?');">
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
                    <h3 class="text-center">No Coupons Found</h3>
                @endif
              </div>
            </div>
          </div>
        </div>
@endsection