<x-app-layout>
    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">My Orders</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>My Orders</span></p>
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
	    				<table class="table" id="ordersTable">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>Order ID</th>
						        <th>Customer Name</th>
						        <th>Address</th>
						        <th>Email</th>
						        <th>Total Price</th>
                    			<th>Status</th>
								<th>Review</th>
								<th>Details</th>
						      </tr>
						    </thead>
						    <tbody>

                        @if($orders->count() > 0)
                            @foreach($orders as $order)
						      <tr class="text-center">
						        <td class="product-remove">#{{ $order->order_id }}</td>
						        
						        <td class="image-prod">{{ $order->first_name }} {{ $order->last_name }}</td>
						        
						        <td class="product-name">
						        	<p>{{ $order->address }}, {{ $order->city }}</p>
						        </td>
						        
						        <td class="price">{{ $order->email }}</td>
						        
						        <td class="total">${{ $order->price }}</td>
                    			<td class="total">
									<span class="badge badge-{{ $order->status == 'Delivered' ? 'success' : ($order->status == 'Processing' ? 'warning' : 'info') }}">
										{{ $order->status }}
									</span>
								</td>
								<td class="total">
									@if($order->status == 'Delivered')
										<a class="btn btn-sm btn-primary" href="{{ route('write.reviews') }}">Write Review</a>
									@else
										<p>Not available</p>
									@endif
								</td>
								<td>
									<button class="btn btn-sm toggle-order-details" type="button" data-target="#orderDetails{{ $order->order_id }}" style="background-color: #c49b63 !important; border-color: #c49b63 !important; color: #ffffff !important; font-weight: 500 !important;">
										<span style="color: #ffffff !important;">View Products ({{ $order->orderItems->count() }})</span>
									</button>
								</td>
						      </tr>
							  <!-- Order Items Details Row -->
							  <tr>
								<td colspan="8" style="padding: 0; border: none;">
									<div class="order-details-collapse" id="orderDetails{{ $order->order_id }}" style="display: none;">
										<div class="card m-3" style="border: none; background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
											<div class="card-body p-4">
												<h5 class="mb-4" style="color: #c49b63; font-weight: 600; border-bottom: 2px solid #c49b63; padding-bottom: 10px;">
													<i class="fas fa-shopping-bag mr-2"></i>Order Items
												</h5>
												@if($order->orderItems->count() > 0)
													<div class="table-responsive">
														<table class="table table-hover" style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
															<thead style="background: linear-gradient(135deg, #c49b63 0%, #a67c52 100%); color: white;">
																<tr>
																	<th style="padding: 15px; border: none; width: 120px; text-align: center;">Image</th>
																	<th style="padding: 15px; border: none; width: 30%; padding-left: 20px;">Product Name</th>
																	<th style="padding: 15px; border: none; width: 15%; text-align: center;">Price</th>
																	<th style="padding: 15px; border: none; width: 15%; text-align: center;">Quantity</th>
																	<th style="padding: 15px; padding-right: 25px; border: none; width: 20%; text-align: right;">Subtotal</th>
																</tr>
															</thead>
															<tbody>
																@foreach($order->orderItems as $item)
																<tr style="transition: all 0.3s ease;">
																	<td style="padding: 15px; vertical-align: middle; text-align: center;">
																		<div style="width: 80px; height: 80px; overflow: hidden; border-radius: 10px; box-shadow: 0 3px 6px rgba(0,0,0,0.15); display: inline-flex; align-items: center; justify-content: center; background: #fff;">
																			<img src="{{ asset('assets/images/'.$item->product_image) }}" alt="{{ $item->product_name }}" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
																		</div>
																	</td>
																	<td style="padding: 15px; vertical-align: middle; padding-left: 20px;">
																		<span style="font-weight: 600; color: #333; font-size: 15px;">{{ $item->product_name }}</span>
																	</td>
																	<td style="padding: 15px; vertical-align: middle; text-align: center;">
																		<span style="color: #666; font-weight: 500; font-size: 15px;">${{ number_format($item->price, 0) }}</span>
																	</td>
																	<td style="padding: 15px; vertical-align: middle; text-align: center;">
																		<span class="badge" style="background-color: #c49b63; color: #fff; padding: 8px 16px; border-radius: 20px; font-size: 14px; font-weight: 600;">x{{ $item->quantity }}</span>
																	</td>
																	<td style="padding: 15px; vertical-align: middle; text-align: right; padding-right: 25px;">
																		<span style="color: #c49b63; font-weight: 700; font-size: 17px;">${{ number_format($item->subtotal, 2) }}</span>
																	</td>
																</tr>
																@endforeach
																<tr style="background: #f8f9fa; border-top: 2px solid #c49b63;">
																	<td colspan="4" style="padding: 20px 15px; text-align: right; font-weight: 700; font-size: 17px; color: #333;">
																		Total:
																	</td>
																	<td style="padding: 20px 25px 20px 15px; text-align: right; font-weight: 800; font-size: 20px; color: #c49b63;">
																		${{ number_format($order->orderItems->sum('subtotal'), 2) }}
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
												@else
													<div class="alert alert-info" style="background: #e8f4f8; border: none; border-left: 4px solid #17a2b8; border-radius: 8px;">
														<i class="fas fa-info-circle mr-2"></i>No items found for this order.
													</div>
												@endif
											</div>
										</div>
									</div>
								</td>
							  </tr>
                            @endforeach
                        @else
                            <tr>
								<td colspan="8">
									<p class="alert alert-success">You have no orders</p>
								</td>
							</tr>
                        @endif

						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
			</div>
		</section>

@push('scripts')
<script>
$(document).ready(function() {
    console.log('Orders page script loaded');
    
    // Xử lý click vào nút View Products
    $('.toggle-order-details').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        var targetId = $(this).attr('data-target');
        var $target = $(targetId);
        
        console.log('Button clicked, target:', targetId);
        
        // Toggle hiển thị với animation
        if ($target.is(':visible')) {
            console.log('Hiding details');
            $target.slideUp(400);
            $(this).removeClass('active');
        } else {
            console.log('Showing details');
            // Đóng tất cả các order details khác (optional)
            $('.order-details-collapse').slideUp(400);
            $('.toggle-order-details').removeClass('active');
            
            // Mở order details hiện tại
            $target.slideDown(400);
            $(this).addClass('active');
        }
    });
    
    // Hover effect CHỈ cho các dòng sản phẩm trong order details
    $('.order-details-collapse table tbody tr').hover(
        function() {
            // Không áp dụng cho dòng Total
            if (!$(this).find('td[colspan]').length) {
                $(this).css('background-color', '#f8f9fa');
            }
        },
        function() {
            if (!$(this).find('td[colspan]').length) {
                $(this).css('background-color', '');
            }
        }
    );
});
</script>

<style>
    /* Animation cho toggle button */
    .toggle-order-details {
        transition: all 0.3s ease;
        background-color: #c49b63 !important;
        border-color: #c49b63 !important;
        color: #fff !important;
        font-weight: 500 !important;
    }
    
    .toggle-order-details:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(196, 155, 99, 0.5);
        background-color: #b08956 !important;
        border-color: #b08956 !important;
        color: #fff !important;
    }
    
    .toggle-order-details.active {
        background-color: #a67c52 !important;
        border-color: #a67c52 !important;
        color: #fff !important;
    }
    
    /* Đảm bảo chữ luôn hiển thị - ghi đè mọi CSS khác */
    .toggle-order-details,
    .toggle-order-details:link,
    .toggle-order-details:visited,
    .toggle-order-details:active,
    .toggle-order-details:focus {
        color: #fff !important;
        text-decoration: none !important;
    }
    
    /* Animation CHỈ cho các dòng sản phẩm trong bảng chi tiết */
    .order-details-collapse table tbody tr:not(:last-child) {
        transition: all 0.3s ease;
    }
    
    .order-details-collapse table tbody tr:not(:last-child):hover {
        transform: translateX(5px);
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    
    /* Smooth animation cho collapse */
    .order-details-collapse {
        overflow: hidden;
    }
    
    /* Đảm bảo dòng thông tin đơn hàng chính KHÔNG bị ảnh hưởng */
    #ordersTable > tbody > tr {
        background-color: transparent !important;
    }
    
    #ordersTable > tbody > tr:hover {
        background-color: transparent !important;
    }
</style>
@endpush

</x-app-layout>