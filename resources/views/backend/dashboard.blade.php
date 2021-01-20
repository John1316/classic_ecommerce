@extends('backend.layouts.app')

@php $pageTitle = 'Dashboard Control'; @endphp

@section('title')
  {{ $pageTitle }}
@endsection

@section('content')
    @component('backend.layouts.header', ['navTitle' => 'Dashboard'])
        
    @endcomponent

    <h2 style="color:white">General Statistics</h2><hr>
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">dashboard</i>
              </div>
              <p class="card-category">Total Admins</p>
              <h3 class="card-title"><strong style="color:white">{{ $admins }}</strong>
              </h3>
            </div>
            <div class="card-footer">
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">dashboard</i>
              </div>
              <p class="card-category">Total Users</p>
              <h3 class="card-title"><strong style="color:white">{{ $users }}</strong>
              </h3>
            </div>
            <div class="card-footer">
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">dashboard</i>
              </div>
              <p class="card-category">Total Categories</p>
              <h3 class="card-title"><strong style="color:white">{{ $categories }}</strong></h3>
            </div>
            <div class="card-footer">
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">dashboard</i>
              </div>
              <p class="card-category">Total Products</p>
              <h3 class="card-title"><strong style="color:white">{{ $products }}</strong></h3>
            </div>
            <div class="card-footer">
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">dashboard</i>
              </div>
              <p class="card-category">Total Branches</p>
              <h3 class="card-title"><strong style="color:white">{{ $branches }}</strong></h3>
            </div>
            <div class="card-footer">
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">dashboard</i>
              </div>
              <p class="card-category">Total Promos</p>
              <h3 class="card-title"><strong style="color:white">{{ $promos }}</strong></h3>
            </div>
            <div class="card-footer">
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">dashboard</i>
              </div>
              <p class="card-category">Total Clients</p>
              <h3 class="card-title"><strong style="color:white">{{ $promos }}</strong></h3>
            </div>
            <div class="card-footer">
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">dashboard</i>
              </div>
              <p class="card-category">Total Orders</p>
              <h3 class="card-title"><strong style="color:white">{{ $orders }}</strong></h3>
            </div>
            <div class="card-footer">
            </div>
          </div>
        </div>
    </div>

    <br><br>

    <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">New Users</h4>
              <p class="card-category">Latest 10 Users</p>
            </div>
            @if($lastest10Users->count())
              <ul class="list-group">
                @foreach($lastest10Users as $user)
                    <a href="{{ route('users.show', $user->id) }}"><li class="list-group-item">{{ $user->name }} ({{ $user->email }})</li></a>
                @endforeach
              </ul>
              @else
                <h3 class="text-center" style="color: white">No Users Yet</h3>
            @endif
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">New Orders</h4>
                <p class="card-category">Latest 10 Orders</p>
              </div>
              @if($lastest10Orders->count())
              <ul class="list-group">
                @foreach($lastest10Orders as $order)
                    <a href="{{ route('orders.show', $order->id) }}"><li class="list-group-item">Order no. {{ $order->id }} ({{ $order->created_at }})</li></a>
                @endforeach
              </ul>
              @else
                <h3 class="text-center" style="color: white">No Orders Yet</h3>
              @endif
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>

    </script>
@endpush