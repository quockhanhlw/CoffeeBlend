@extends('layouts.staff')

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
              <a  href="{{ route('create.products.staff') }}" class="btn btn-primary mb-4 text-center float-right">Create Products</a>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">image</th>
                    <th scope="col">price</th>
                    <th scope="col">type</th>
                    <th scope="col">edit</th>
                    <th scope="col">delete</th>
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
                     <td><a href="{{ route('edit.products.staff', $product->product_id) }}" class="btn btn-warning text-white text-center">edit</a></td>
                     <td><a href="{{ route('delete.products.staff', $product->product_id) }}" class="btn btn-danger text-center">delete</a></td>
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