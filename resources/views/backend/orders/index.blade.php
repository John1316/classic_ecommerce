@extends('backend.layouts.app')

@php $pageTitle = 'Orders Control'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@push('css')
    <style>

    </style>
@endpush

@section('content')
    @component('backend.layouts.header', ['navTitle' => 'Orders'])
        
    @endcomponent

    <div class="row">
        <div class="col-md-12">
        @if(Session::has('flash_message'))
        <div class="{{ Session::get('flash_class') }}">
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
                      ID
                    </th>
                    <th>
                      Username
                    </th>
                    <th>
                      Total Order
                    </th>
                    <th>
                      Status
                    </th>
                    <th>
                      Combo
                    </th>
                    <th>
                      Coupon Used
                    </th>
                    <th class="text-right">
                      Control
                    </th>
                  </thead>
                  @foreach ($rows as $order)
                  <tbody>
                    <tr>
                      <td>
                        {{ $order->id }}
                      </td>
                      <td>
                        {{ $order->user->name }}
                      </td>
                      <td>
                        {{ number_format($order->total_price, 2) }} EGP
                      </td>
                      <td>
                        {{ $order->status }}
                      </td>
                      <td>
                        @if($order->combo_id !== NULL)
                          {{ $order->combo->pieces }} pieces ({{ $order->combo->prices }} EGP)
                        @else
                          No
                        @endif
                      </td>
                      @if($order->promo_code_id == NULL)
                        <td>
                          No
                        </td>
                      @else
                        <td>
                          Yes ({{ $order->promo->percentage }}%)
                        </td>
                      @endif
                      <td class="td-actions text-right">
                            <a href="{{ route('orders.show', $order->id) }}">
                                <button title="" class="btn btn-white btn-link btn-sm" type="button" data-original-title="Show Order" rel="tooltip">
                                <i class="material-icons">zoom_in</i>
                                </button>
                            </a>
                            <a href="{{ route('orders.edit', $order->id) }}">
                                <button title="" class="btn btn-white btn-link btn-sm" type="button" data-original-title="Edit Order" rel="tooltip">
                                <i class="material-icons">edit</i>
                                </button>
                            </a>
                            @if($order->status !== 'delivered')
                              @if($order->status !== 'cancelled')
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button title="" class="btn btn-white btn-link btn-sm" type="submit" data-original-title="Cancel Order" rel="tooltip" onclick="return confirm('Are you sure you want to cancel this item?');">
                                    <i class="material-icons">close</i>
                                    </button>
                                </form>
                              @endif
                            @endif
                     </td>
                    </tr>
                  </tbody>
                  @endforeach
                </table>
                {{ $rows->links() }} 
                    @else
                    <h3 class="text-center">No Orders Found</h3>
                @endif
              </div>
            </div>
          </div>
        </div>
@endsection