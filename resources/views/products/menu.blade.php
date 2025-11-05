<x-app-layout>
    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Our Menu</h1>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-intro">
    	<div class="container-wrap">
    		<div class="wrap d-md-flex align-items-xl-end">
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
	    						<p>	Quang Trung, Dong Da, Ha Noi, Viet Nam</p>
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

    <section class="ftco-menu mb-5 pb-5">
    	<div class="container">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Discover</span>
            <h2 class="mb-4">Our Products</h2>
            <p>Each drink on this menu is a story of meticulousness. We hand-pick the finest ingredients to bring you the complete experience, whether it's a cup of coffee to wake you up in the morning or a sweet drink for a relaxing afternoon</p>
          </div>
        </div>
    		<div class="row d-md-flex">
	    		<div class="col-lg-12 ftco-animate p-md-5">
		    		<div class="row">
		          <div class="col-md-12 nav-link-wrap mb-5">
		            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">

		              <a class="nav-link active" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Drinks</a>

					  <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Coffees</a>

		              <a class="nav-link" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false">Desserts</a>

					  <a class="nav-link" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false">Burgers</a>

                      <a class="nav-link" id="v-pills-6-tab" data-toggle="pill" href="#v-pills-6" role="tab" aria-controls="v-pills-6" aria-selected="false">Pizzas</a>

					  <a class="nav-link" id="v-pills-7-tab" data-toggle="pill" href="#v-pills-7" role="tab" aria-controls="v-pills-7" aria-selected="false">Dishes</a>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex align-items-center">
		            
		            <div class="tab-content ftco-animate" id="v-pills-tabContent">

		              

		              <div class="tab-pane fade show active" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
		                <div class="row">

                        @foreach ($drinks as $drink)
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="{{ route('product.single',$drink->product_id) }}" class="menu-img img mb-4" style="background-image: url({{ asset('assets/images/'.$drink->image.'') }});"></a>
		              				<div class="text">
		              					<h3><a href="{{ route('product.single',$drink->product_id) }}">{{ $drink->name }}</a></h3>
		              					<p>{{ $drink->description }}</p>
		              					<p class="price"><span>{{ $drink->price }}₫</span></p>
		              					<p><a href="{{ route('product.single',$drink->product_id) }}" class="btn btn-primary btn-outline-primary">Show detail</a></p>
		              				</div>
		              			</div>
		              		</div>
                        @endforeach 

		              	</div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
		                <div class="row">
                        @foreach ($coffees as $coffee)
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="{{ route('product.single',$coffee->product_id) }}" class="menu-img img mb-4" style="background-image: url({{ asset('assets/images/'.$coffee->image.'') }});"></a>
		              				<div class="text">
		              					<h3><a href="{{ route('product.single',$coffee->product_id) }}">{{ $coffee->name }}</a></h3>
		              					<p>{{ $coffee->description }}</p>
		              					<p class="price"><span>{{ $coffee->price }}</span></p>
		              					<p><a href="{{ route('product.single',$coffee->product_id) }}" class="btn btn-primary btn-outline-primary">Show detail</a></p>
		              				</div>
		              			</div>
		              		</div>
                        @endforeach
		              	</div>
		              </div>

					  <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
		                <div class="row">
                        @foreach ($desserts as $dessert)
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="{{ route('product.single',$dessert->product_id) }}" class="menu-img img mb-4" style="background-image: url({{ asset('assets/images/'.$dessert->image.'') }});"></a>
		              				<div class="text">
		              					<h3><a href="{{ route('product.single',$dessert->product_id) }}">{{ $dessert->name }}</a></h3>
		              					<p>{{ $dessert->description }}</p>
		              					<p class="price"><span>{{ $dessert->price }}</span></p>
		              					<p><a href="{{ route('product.single',$dessert->product_id) }}" class="btn btn-primary btn-outline-primary">Show detail</a></p>
		              				</div>
		              			</div>
		              		</div>
                        @endforeach
		              	</div>
		              </div>

					  <div class="tab-pane fade" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab">
		                <div class="row">
                        @foreach ($burgers as $burger)
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="{{ route('product.single',$burger->product_id) }}" class="menu-img img mb-4" style="background-image: url({{ asset('assets/images/'.$burger->image.'') }});"></a>
		              				<div class="text">
		              					<h3><a href="{{ route('product.single',$burger->product_id) }}">{{ $burger->name }}</a></h3>
		              					<p>{{ $burger->description }}</p>
		              					<p class="price"><span>{{ $burger->price }}</span></p>
		              					<p><a href="{{ route('product.single',$burger->product_id) }}" class="btn btn-primary btn-outline-primary">Show detail</a></p>
		              				</div>
		              			</div>
		              		</div>
                        @endforeach
		              	</div>
		              </div>

					  <div class="tab-pane fade" id="v-pills-6" role="tabpanel" aria-labelledby="v-pills-6-tab">
		                <div class="row">
                        @foreach ($pizzas as $pizza)
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="{{ route('product.single',$pizza->product_id) }}" class="menu-img img mb-4" style="background-image: url({{ asset('assets/images/'.$pizza->image.'') }});"></a>
		              				<div class="text">
		              					<h3><a href="{{ route('product.single',$pizza->product_id) }}">{{ $pizza->name }}</a></h3>
		              					<p>{{ $pizza->description }}</p>
		              					<p class="price"><span>{{ $pizza->price }}</span></p>
		              					<p><a href="{{ route('product.single',$pizza->product_id) }}" class="btn btn-primary btn-outline-primary">Show detail</a></p>
		              				</div>
		              			</div>
		              		</div>
                        @endforeach
		              	</div>
		              </div>

						<div class="tab-pane fade" id="v-pills-7" role="tabpanel" aria-labelledby="v-pills-7-tab">
		                <div class="row">
                        @foreach ($dishes as $dish)
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="{{ route('product.single',$dish->product_id) }}" class="menu-img img mb-4" style="background-image: url({{ asset('assets/images/'.$dish->image.'') }});"></a>
		              				<div class="text">
		              					<h3><a href="{{ route('product.single',$dish->product_id) }}">{{ $dish->name }}</a></h3>
		              					<p>{{ $dish->description }}</p>
		              					<p class="price"><span>{{ $dish->price }}</span></p>
		              					<p><a href="{{ route('product.single',$dish->product_id) }}" class="btn btn-primary btn-outline-primary">Show detail</a></p>
		              				</div>
		              			</div>
		              		</div>
                        @endforeach
		              	</div>
		              </div>



		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
    	</div>
    </section>
</x-app-layout>