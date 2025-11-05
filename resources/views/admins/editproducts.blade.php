@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Edit Product</h5>
          <form method="POST" action="{{ route('update.products', $product->product_id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-outline mb-4 mt-4">
                  <label for="product_name">Product Name</label>
                  <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Product Name" value="{{ $product->product_name }}" required />
                </div>

                <div class="form-outline mb-4">
                  <label for="price">Price</label>
                  <input type="number" name="price" id="price" class="form-control" placeholder="Price" value="{{ $product->price }}" required />
                </div>

                <div class="form-outline mb-4">
                  <label for="quantity">Quantity</label>
                  <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Quantity" value="{{ $product->quantity }}" required />
                </div>

                <div class="form-outline mb-4">
                  <label for="product_image">Product Image (leave empty to keep current image)</label>
                  <input type="file" name="product_image" id="product_image" class="form-control" />
                  @if($product->product_image)
                    <div class="mt-2">
                      <p>Current Image:</p>
                      <img src="{{ asset('assets/images/' . $product->product_image) }}" alt="{{ $product->product_name }}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                    </div>
                  @endif
                </div>

                <div class="form-group mb-4">
                  <label for="description">Description</label>
                  <textarea name="description" class="form-control" id="description" rows="3">{{ $product->description }}</textarea>
                </div>
               
                <div class="form-outline mb-4">
                  <label for="type">Type</label>
                  <select name="type" id="type" class="form-select form-control" required>
                    <option value="">Choose Type</option>
                    <option value="drink" {{ $product->type == 'drink' ? 'selected' : '' }}>Drink</option>
                    <option value="dessert" {{ $product->type == 'dessert' ? 'selected' : '' }}>Dessert</option>
                    <option value="coffee" {{ $product->type == 'coffee' ? 'selected' : '' }}>Coffee</option>
                    <option value="dish" {{ $product->type == 'dish' ? 'selected' : '' }}>Dish</option>
                    <option value="pizza" {{ $product->type == 'pizza' ? 'selected' : '' }}>Pizza</option>
                  </select>
                </div>

                <button type="submit" name="submit" class="btn btn-primary mb-4">Update Product</button>
                <a href="{{ route('all.products') }}" class="btn btn-secondary mb-4 ml-2">Cancel</a>
              </form>

            </div>
          </div>
        </div>
      </div>
@endsection
