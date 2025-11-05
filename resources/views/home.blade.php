<x-app-layout>
    <!-- Home Slider -->
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_1.jpg') }});">
       	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            	<span class="subheading">Welcome</span>
              <h1 class="mb-4">The Best Coffee Testing Experience</h1>
              <p class="mb-4 mb-md-5">We offer carefully selected cups of coffee, reserved for those who appreciate authentic taste.</p>
              <p><a href="{{ route('products.menu') }}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_2.jpg') }});">
       	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            	<span class="subheading">Welcome</span>
              <h1 class="mb-4">Amazing Taste &amp; Beautiful Place</h1>
              <p class="mb-4 mb-md-5">Come and experience our cozy space where every cup of coffee is a story</p>
              <p><a href="{{ route('products.menu') }}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});">
       	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            	<span class="subheading">Welcome</span>
              <h1 class="mb-4">Creamy Hot and Ready to Serve</h1>
              <p class="mb-4 mb-md-5">The ideal place for you to relax, meet friends and enjoy the rich, unforgettable flavor of coffee.</p>
              <p> <a href="{{ route('products.menu') }}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>

	<div class="container">
		@if(Session::has('date'))
			<p class="alert {{ Session::get('alert-class','alert-info') }}">{{ Session::get('date') }}</p>
		@endif
	</div>
	<div class="container">
		@if(Session::has('booking'))
			<p class="alert {{ Session::get('alert-class','alert-info') }}">{{ Session::get('booking') }}</p>
		@endif
	</div>

    <section class="ftco-intro">
    	<div class="container-wrap">
    		<div class="wrap d-md-flex align-items-xl-end">
    			
    			<div class="book p-4">
    				<h3>Book a Table</h3>
					@auth
    				<form action="{{ route('booking.tables') }}" method="POST" class="appointment-form">
					   @csrf
    					<div class="d-md-flex">
    						<div class="form-group">
								<input type="text" name="last_name" class="form-control" placeholder="Last Name">
    						</div>
							@if ($errors->has('last_name'))
								<p class="alert alert-success">{{ $errors->first('last_name') }}</p>
							@endif

    						<div class="form-group ml-md-4">
    							<input type="text" name="first_name" class="form-control" placeholder="First Name">
    						</div>
							@if ($errors->has('first_name'))
								<p class="alert alert-success">{{ $errors->first('first_name') }}</p>
							@endif

    					</div>
    					<div class="d-md-flex">
    						<div class="form-group">
	    						<div class="input-wrap">
			    		<div class="icon"><span class="ion-md-calendar"></span></div>
			    		<input type="text" name="date" class="form-control appointment_date" placeholder="Date" readonly autocomplete="off">
			    	</div>
    						</div>
    						<div class="form-group ml-md-4">
	    						<div class="input-wrap">
			    		<div class="icon"><span class="ion-ios-clock"></span></div>
			    		<input type="time" name="time" class="form-control time-picker" min="08:00" max="21:00" required>
			    	</div>
    						</div>

    			    		<input type="hidden" value="{{ Auth::user()->user_id }}" name="user_id">

    						<div class="form-group ml-md-4">
    							<input type="text" name="phone" class="form-control" placeholder="Phone Number">
    						</div>
    					</div>
    					<div class="d-md-flex">
    						<div class="form-group">
    				      <textarea id="" name="message" cols="30" rows="2" class="form-control" placeholder="Notes"></textarea>
    				    </div>
    				    <div class="form-group ml-md-4">
    				      <input type="submit" name="submit" value="Book" class="btn btn-white py-3 px-4">
    				    </div>
    					</div>
    				</form>
					@endauth
					@guest
						<div class="text-center p-5">
    					<h3 class="mb-3" style="color: white;">Please <a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register</a> to Book a Table.</h3>
						</div>
					@endguest
    			</div>
				
				<div class="info">
    				<div class="row no-gutters">
    					<div class="col-md-4 d-flex ftco-animate">
    						<div class="icon"><span class="icon-phone"></span></div>
    						<div class="text">
    							<h3>034 527 6156</h3>
    							<p>Luu Quoc Khanh</p>
    						</div>
    					</div>
    					<div class="col-md-4 d-flex ftco-animate">
    						<div class="icon"><span class="icon-my_location"></span></div>
    						<div class="text">
    							<h3>12 Chua Boc</h3>
    							<p>Quang Trung, Dong Da, Ha Noi, Viet Nam</p>
    						</div>
    					</div>
    					<div class="col-md-4 d-flex ftco-animate">
    						<div class="icon"><span class="icon-clock-o"></span></div>
    						<div class="text">
    							<h3>Open Monday-Friday</h3>
    							<p>8:00am - 9:00pm</p>
    						</div>
    					</div>
    				</div>
    			</div>
    			
    		</div>
    	</div>
    </section>

    <section class="ftco-about d-md-flex">
    	<div class="one-half img" style="background-image: url({{ asset('assets/images/about.jpg') }});"></div>
    	<div class="one-half ftco-animate">
    		<div class="overlap">
        	<div class="heading-section ftco-animate ">
        		<span class="subheading">Discover</span>
          	<h2 class="mb-4">Our Story</h2>
        	</div>
        	<div>
   				<p>
					We always dream of a place not only for enjoying coffee, 
					but also a "third home" where you can find peace in the hustle and bustle of life. 
					This coffee shop was built from the desire to connect people. Whether you come here to work, 
					meet friends or simply enjoy a good book, we are always here, 
					ready to serve you with all our hearts</p>
  			</div>
 			</div>
    	</div>
    </section>

    <section class="ftco-section ftco-services">
    	<div class="container">
    		<div class="row">
         <div class="col-md-4 ftco-animate">
           <div class="media d-block text-center block-6 services">
             <div class="icon d-flex justify-content-center align-items-center mb-5">
             	<span class="flaticon-choices"></span>
             </div>
             <div class="media-body">
               <h3 class="heading">Easy to Order</h3>
               <p>With just a few simple clicks, your favorite cup of coffee will be prepared in no time</p>
             </div>
           </div>      
         </div>
         <div class="col-md-4 ftco-animate">
           <div class="media d-block text-center block-6 services">
             <div class="icon d-flex justify-content-center align-items-center mb-5">
             	<span class="flaticon-delivery-truck"></span>
             </div>
             <div class="media-body">
               <h3 class="heading">Fastest Delivery</h3>
               <p>Don't let your coffee cravings wait. We bring hot flavor to you in a flash</p>
             </div>
           </div>      
         </div>
         <div class="col-md-4 ftco-animate">
           <div class="media d-block text-center block-6 services">
             <div class="icon d-flex justify-content-center align-items-center mb-5">
             	<span class="flaticon-coffee-bean"></span></div>
             <div class="media-body">
               <h3 class="heading">Quality Coffee</h3>
               <p>Carefully selected premium coffee beans, hand-roasted and ground to fully awaken the original flavor.</p>
             </div>
           </div>    
         </div>
       </div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row align-items-center">
    			<div class="col-md-6 pr-md-5">
    				<div class="heading-section text-md-right ftco-animate">
          		<span class="subheading">Discover</span>
            	<h2 class="mb-4">Our Menu</h2>
            	<p class="mb-4">Each drink on this menu is a story of meticulousness. We hand-pick the finest ingredients to bring you the complete experience, whether it's a cup of coffee to wake you up in the morning or a sweet drink for a relaxing afternoon.</p>
            	<p><a href="{{ route('products.menu') }}" class="btn btn-primary btn-outline-primary px-4 py-3">View Menu</a></p>
          	</div>
    			</div>
    			<div class="col-md-6">
    				<div class="row">
    					<div class="col-md-6">
    						<div class="menu-entry">
    	    					<a href="#" class="img" style="background-image: url({{ asset('assets/images/menu-1.jpg') }});"></a>
    	    				</div>
    					</div>
    					<div class="col-md-6">
    						<div class="menu-entry mt-lg-4">
    	    					<a href="#" class="img" style="background-image: url({{ asset('assets/images/menu-2.jpg') }});"></a>
    	    				</div>
    					</div>
    					<div class="col-md-6">
    						<div class="menu-entry">
    	    					<a href="#" class="img" style="background-image: url({{ asset('assets/images/menu-3.jpg') }});"></a>
    	    				</div>
    					</div>
    					<div class="col-md-6">
    						<div class="menu-entry mt-lg-4">
    	    					<a href="#" class="img" style="background-image: url({{ asset('assets/images/menu-4.jpg') }});"></a>
    	    				</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url({{ asset('assets/images/bg_2.jpg') }});" data-stellar-background-ratio="0.5">
    		<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center">
        	<div class="col-md-10">
        		<div class="row">
	          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
	            <div class="block-18 text-center">
	              <div class="text">
	              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
	              	<strong class="number" data-number="100">0</strong>
	              	<span>Coffee Branches</span>
	              </div>
	            </div>
	          </div>
	          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
	            <div class="block-18 text-center">
	              <div class="text">
	              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
	              	<strong class="number" data-number="85">0</strong>
	              	<span>Number of Awards</span>
	              </div>
	            </div>
	          </div>
	          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
	            <div class="block-18 text-center">
	              <div class="text">
	              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
	              	<strong class="number" data-number="10567">0</strong>
	              	<span>Happy Customer</span>
	              </div>
	            </div>
	          </div>
	          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
	            <div class="block-18 text-center">
	              <div class="text">
	              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
	              	<strong class="number" data-number="900">0</strong>
	              	<span>Staff</span>
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
         <div class="col-md-7 heading-section ftco-animate text-center">
         	<span class="subheading">Discover</span>
           <h2 class="mb-4">Best Sellers</h2>
           <p>Explore our most popular top picks at the bar</p>
         </div>
       </div>
       <div class="row">

	   @foreach($products as $product)
       	<div class="col-md-3">
       		<div class="menu-entry">
    					<a href="#" class="img" style="background-image: url({{ asset('assets/images/'.$product->product_image.'') }});"></a>
    					<div class="text text-center pt-4">
    						<h3><a href="{{ route('product.single', $product->product_id) }}">{{ $product->product_name }}</a></h3>
    						<p>{{ $product->description }}</p>
    						<p class="price"><span>{{ $product->price }}₫</span></p>
    						<p><a href="{{ route('product.single', $product->product_id) }}" class="btn btn-primary btn-outline-primary">Show detail</a></p>
    					</div>
    				</div>
       		</div>
		@endforeach
       </div>
    	</div>
    </section>

    <section class="ftco-gallery">
    	<div class="container-wrap">
    		<div class="row no-gutters">
					<div class="col-md-3 ftco-animate">
						<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url({{ asset('assets/images/gallery-1.jpg') }});">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    							<span class="icon-search"></span>
    						</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url({{ asset('assets/images/gallery-3.jpg') }});">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    							<span class="icon-search"></span>
    						</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url({{ asset('assets/images/gallery-3.jpg') }});">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    							<span class="icon-search"></span>
    						</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url({{ asset('assets/images/gallery-4.jpg') }});">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    							<span class="icon-search"></span>
    						</div>
						</a>
					</div>
        </div>
    	</div>
    </section>

    <section class="ftco-section img" id="ftco-testimony" style="background-image: url({{ asset('assets/images/bg_1.jpg') }});"  data-stellar-background-ratio="0.5">
    	<div class="overlay"></div>
	    <div class="container">
	      <div class="row justify-content-center mb-5">
	        <div class="col-md-7 heading-section text-center ftco-animate">
	        	<span class="subheading">Testimony</span>
	          <h2 class="mb-4">Customers Says</h2>
	          <p>There is nothing more valuable than genuine sharing from friends who have trusted and chosen us</p>
	        </div>
	      </div>
	    </div>
	    <div class="container-wrap">
	      <div class="row d-flex no-gutters">
			@foreach ($reviews as $review)
	        	<div class="col-md align-self-sm-end ftco-animate">
	          		<div class="testimony">
	             	<blockquote>
	                	<p>&ldquo;{{$review->review}}&rdquo;</p>
	              	</blockquote>
	              	<div class="author d-flex mt-4">
	                	<div class="image mr-3 align-self-center">
	                  	<img src="{{ asset('assets/images/person_1.jpg') }}" alt="">
	                	</div>
	                	<div class="name align-self-center">{{ $review->name }}</div>
	              	</div>
	          		</div>
	        	</div>
			@endforeach
	      </div>
	    </div>
	  </section>
</x-app-layout> 