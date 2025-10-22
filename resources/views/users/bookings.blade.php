<x-app-layout>
    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">My Bookings</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>My Bookings</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>First name</th>
						        <th>Last name</th>
						        <th>Date</th>
						        <th>Time</th>
						        <th>Phone</th>
						        <th>Message</th>
                                <th>Status</th>
								<th>Review</th>
						      </tr>
						    </thead>
						    <tbody>

                        @if($bookings->count() > 0)
                            @foreach($bookings as $booking)
						      <tr class="text-center">
						        <td class="product-remove">{{ $booking->first_name }}</td>
						        
						        <td class="image-prod">{{ $booking->last_name }}</td>
						        
						        <td class="product-name">
						        	<h3> {{ $booking->date }}</h3>
						        </td>
						        
						        <td class="price">{{ $booking->time }}</td>
						        
						        <td>
                      				{{ $booking->phone }}
					          </td>
						        
						        <td class="total">${{ $booking->message }}</td>
                    			<td class="total">{{ $booking->status }}</td>
								<td class="total">
								@if($booking->status == 'Booked')
									<a class="btn btn-primary" href="{{ route('write.reviews') }}">Write Review</a>
								@else
									<p>Not available</p>
								@endif
								</td>
						      </tr><!-- END TR-->
                            @endforeach
                        @else
                            <p class="alert alert-success">You have no bookings</p>
                        @endif

						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
			</div>
		</section>

</x-app-layout>