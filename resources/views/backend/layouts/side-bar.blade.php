<div class="sidebar" data-color="purple" data-background-color="black" data-image="{{ asset('backend/assets/img/sidebar-1.jpg')}}">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
    <div class="logo" style="text-align: center"> 
      <a href="{{ route('welcome') }}" class="logo h-50"><img src="{{ asset('frontend/assets/Logo.png') }}" alt="Classic Logo" style="width: 100px; height:100px;"></a> 
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.home') }}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>

        @if(auth()->user()->role === 'super-admin')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admins.index') }}">
              <i class="material-icons">arrow_forward_ios</i>
              <p>Admins</p>
            </a>
          </li>
        @endif

        <li class="nav-item">
          <a class="nav-link" href="{{ route('users.index') }}">
            <i class="material-icons">arrow_forward_ios</i>
            <p>Users</p>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('brands.index') }}">
            <i class="material-icons">arrow_forward_ios</i>
            <p>Brands</p>
          </a>
      </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('categories.index') }}">
              <i class="material-icons">arrow_forward_ios</i>
              <p>Categories</p>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('products.index') }}">
              <i class="material-icons">arrow_forward_ios</i>
              <p>Products</p>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('orders.index') }}">
              <i class="material-icons">arrow_forward_ios</i>
              <p>Orders</p>
            </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('offers.index') }}">
            <i class="material-icons">arrow_forward_ios</i>
            <p>Offers</p>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('branches.index') }}">
            <i class="material-icons">arrow_forward_ios</i>
            <p>Branches</p>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('coupons.index') }}">
            <i class="material-icons">arrow_forward_ios</i>
            <p>Promos</p>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('locations.index') }}">
            <i class="material-icons">arrow_forward_ios</i>
            <p>Locations</p>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('clients.index') }}">
            <i class="material-icons">arrow_forward_ios</i>
            <p>Clients</p>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('contact_us.index') }}">
            <i class="material-icons">arrow_forward_ios</i>
            <p>Contact Us</p>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('banner_images.index') }}">
            <i class="material-icons">arrow_forward_ios</i>
            <p>Banner Images</p>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('main.index') }}">
            <i class="material-icons">arrow_forward_ios</i>
            <p>Main</p>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('sliders.index') }}">
            <i class="material-icons">arrow_forward_ios</i>
            <p>Sliders</p>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('settings.index') }}">
            <i class="material-icons">arrow_forward_ios</i>
            <p>Order Settings</p>
          </a>
        </li>

        <!-- your sidebar here -->
      </ul>
    </div>
  </div>