<x-app-layout>
    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Product Detail</h1>
            </div>

          </div>
        </div>
      </div>
    </section>

	<div class="container">
		@if(Session::has('success'))
			<p class="alert {{ Session::get('alert-class','alert-info') }}">{{ Session::get('success') }}</p>
		@endif
	</div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="{{ asset('assets/images/'.$product->product_image) }}" class="image-popup"><img src="{{ asset('assets/images/'.$product->product_image) }}" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3 class="text-white">{{ $product->product_name }}</h3>
    				<p class="price"><span>{{ $product->price }}</span></p>
    				<p> {{ $product->description }}</p>
						
			<form method="POST" action="{{ route('add.cart', $product->product_id) }}">
				@csrf
				<input type="hidden" name="product_id" value="{{ $product->product_id }}">
				<input type="hidden" name="product_name" value="{{ $product->product_name }}">
				<input type="hidden" name="price" value="{{ $product->price }}">
				<input type="hidden" name="product_image" value="{{ $product->product_image }}">
				
				<div class="row">
                    <div class="input-group col-md-6 d-flex mb-3">
                        <span class="input-group-btn mr-2">
                            <button type="button" class="quantity-left-minus btn btn-outline-secondary" data-type="minus" data-field="" style="cursor: pointer; min-width: 40px;">
                           <i class="icon-minus"></i>
                            </button>
                        </span>
                        <input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="1" min="1" max="100" style="max-width: 80px;">
                        <span class="input-group-btn ml-2">
                            <button type="button" class="quantity-right-plus btn btn-outline-secondary" data-type="plus" data-field="" style="cursor: pointer; min-width: 40px;">
                             <i class="icon-plus"></i>
                         </button>
                        </span>
                    </div>
                </div>

				@if($checkingInCart == 0)
          			<button type="submit" name="submit" class="btn btn-primary py-3 px-5">Add to Cart</button>
    			@else
					<button style="background-color: black" class="btn btn-secondary py-3 px-5" disabled>Added to Cart</button>
				@endif
			</form>
				</div>
				</div>
    		</div>

    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Discover</span>
            <h2 class="mb-4">Related products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
        <div class="row">

        @foreach($relatedProducts as $relatedProduct)
        	<div class="col-md-3">
        		<div class="menu-entry">
    					<a href="{{ route('product.single', $relatedProduct->product_id) }}" class="img" style="background-image: url({{ asset('assets/images/'.$relatedProduct->image.'')}});"></a>
    					<div class="text text-center pt-4">
    						<h3><a href="{{ route('product.single', $relatedProduct->product_id) }}">{{ $relatedProduct->name }}</a></h3>
    						<p>{{ $relatedProduct->description }}</p>
    						<p class="price"><span>${{ $relatedProduct->price }}</span></p>
    						<p><a href="{{ route('product.single', $relatedProduct->product_id) }}" class="btn btn-primary btn-outline-primary">Show</a></p>
    					</div>
    				</div>
        	</div>
        @endforeach
        </div>
    	</div>
    </section>

	@push('scripts')
	<script>
        $(document).ready(function(){
            console.log('Quantity buttons initialized');

            var quantitiy=0;
            $('.quantity-right-plus').click(function(e){
                // Stop acting like a button
                e.preventDefault();
                console.log('Plus button clicked');
                // Get the field name
                var quantity = parseInt($('#quantity').val());
                
                // If is not undefined
                    
                    $('#quantity').val(quantity + 1);
      
                    // Increment
                
            });

            $('.quantity-left-minus').click(function(e){
                // Stop acting like a button
                e.preventDefault();
                console.log('Minus button clicked');
                // Get the field name
                var quantity = parseInt($('#quantity').val());
                
                // If is not undefined
              
                    // Increment
                    if(quantity>1){
                    $('#quantity').val(quantity - 1);
                    }
            });
            
        });
    </script>
	@endpush
</x-app-layout>