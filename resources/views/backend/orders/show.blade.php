@extends('backend.layouts.app')

@php $pageTitle = 'Order Details'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    @component('backend.layouts.header', ['navTitle' => 'Order Details'])
        
    @endcomponent
   
    <h3 style="color:wheat;">Customer Details:</h3>
    <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->user->email }}</td>
                    <td>{{ $order->user->phone }}</td>
                </tr>
        </tbody>
    </table>

    <hr>
    
    <h3 style="color:wheat">Shipping Details:</h3>
    <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Area</th>
                <th scope="col">Address</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $checkout->address->location->en_location }}</td>
                    <td>{{ $checkout->address->address }}</td>
                </tr>
        </tbody>
    </table>

    <hr>

    <h3 style="color:wheat">Order Details:</h3>
    <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Sub Total</th>
              </tr>
            </thead>
            <tbody>
                @foreach($orderDetails as $orderDetail)
                    <tr>
                        <th scope="row">{{ $orderDetail->order->id }}</th>
                        <td>{{ $orderDetail->product->en_name }}</td>
                        <td>{{ $orderDetail->price }}</td>
                        <td>{{ $orderDetail->quantity }}</td>
                        <td>{{ $orderDetail->price * $orderDetail->quantity }}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
            <h3 style="color:wheat">Order:</h3>
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td>SubTotal</td>
                  <td>EGP {{ $subTotal }}</td>
                </tr>   
                <tr>
                  <td>Shipping</td>
                  <td>EGP {{ $delivery }}</td>
                </tr>
                <tr>
                  <td>Taxes</td>
                  <td>% {{ $taxes }}</td>
                </tr>
                @if($promo)
                <tr>
                    <td class="text-success">Discount</td>
                    <td class="text-success">-% {{ $promo->percentage }}</td>
                </tr>
                @endif
                <tr>
                  <td class="amount">Total</td>
                  <td class="amount">EGP {{ $total }}</td>
                </tr>
              </tbody>
            </table>
@endsection