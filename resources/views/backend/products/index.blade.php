@extends('backend.layouts.app')

@php $pageTitle = 'Products Control'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@push('css')
    <style>

    </style>
@endpush

@section('content')
    @component('backend.layouts.header', ['navTitle' => 'Products'])
        
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
                        <a class="btn btn-white btn-round" href="{{ route('products.create') }}">Add Product</a>
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
                      Product Name
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                      Category
                    </th>
                    <th>
                        Image
                    </th>
                    <th class="text-right">
                      Control
                    </th>
                  </thead>
                  @foreach ($rows as $product)
                  <tbody>
                    <tr>
                        <td>
                        {{$product->id}}
                        </td>
                        <td>
                        {{$product->en_name}}
                        </td>
                        <td>
                          {{$product->price_before_discount}} EGP
                        </td>
                        <td>
                          {{$product->category->en_name}}
                        </td>
                        <td>
                          <img src="{{ asset('products/' . $product->image ) }}" width="100px" height="100px">
                        </td>
                      <td class="td-actions text-right">
                            <a href="{{ route('products.edit', $product->id) }}">
                                <button title="" class="btn btn-white btn-link btn-sm" type="button" data-original-title="Edit Product" rel="tooltip">
                                <i class="material-icons">edit</i>
                                </button>
                            </a>
                            @if($product->status == 1)
                              <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                  {{ csrf_field() }}
                                  {{ method_field('delete') }}
                                  <button title="" class="btn btn-white btn-link btn-sm" type="submit" data-original-title="Disable Product" rel="tooltip" onclick="return confirm('Are you sure you want to disable this item?');">
                                    <i class="material-icons">close</i>
                                  </button>
                              </form>
                            @else
                              <form action="{{ route('products.recover', $product->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button title="" class="btn btn-white btn-link btn-sm" type="submit" data-original-title="Enable Product" rel="tooltip" onclick="return confirm('Are you sure you want to enable this item?');">
                                  <i class="material-icons">done</i>
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
                    <h3 class="text-center">No Products Found</h3>
                @endif
              </div>
            </div>
          </div>
        </div>
@endsection


