@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col">
          <div class="container">
		            @if(Session::has('success'))
			            <p class="alert {{ Session::get('alert-class','alert-info') }}">{{ Session::get('success') }}</p>
		            @endif
	            </div>

              <div class="container">
		            @if(Session::has('delete'))
			            <p class="alert {{ Session::get('alert-class','alert-info') }}">{{ Session::get('delete') }}</p>
		            @endif
	            </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Products</h5>
              <a  href="{{ route('create.products') }}" class="btn btn-primary mb-4 text-center float-right">Create Products</a>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">image</th>
                    <th scope="col">price</th>
                    <th scope="col">type</th>
                    <th scope="col" class="text-center">actions</th>
                  </tr>
                </thead>
                <tbody>

                @foreach($products as $product)
                  <tr>
                     <th scope="row">{{ $product->product_id }}</th>
                     <td>{{ $product->product_name }}</td>
                     <td><img src="{{ asset('assets/images/'.$product->product_image.'')}}" width="100" height="100" style="object-fit: cover; border-radius: 8px;"></td>
                     <td>${{ number_format($product->price, 0) }}</td>
                     <td>{{ $product->type }}</td>
                     <td class="text-center">
                        <a href="{{ route('edit.products', $product->product_id) }}" class="btn btn-sm btn-warning text-white" title="Edit">
                           <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('delete.products', $product->product_id) }}" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this product?')">
                           <i class="fas fa-trash"></i>
                        </a>
                     </td>
                  </tr>
                @endforeach

                </tbody>
              </table>
              
              <!-- Pagination -->
              <div class="d-flex justify-content-center">
                {{ $products->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection