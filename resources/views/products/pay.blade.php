<x-app-layout>
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">
            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">PAY WITH PAYPAL</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">HOME</a></span> <span>PAY WITH PAYPAL</span></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow-lg border-0">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <h3 class="font-weight-bold">Complete Your Payment</h3>
                                <p class="text-muted">Total Amount: <span class="h4 text-primary font-weight-bold">${{ Session::get('price') }}</span></p>
                            </div>
                            
                            <!-- Replace "test" with your own sandbox Business account app client ID -->
                            <script src="https://www.paypal.com/sdk/js?client-id=AVWK_mrdpg8qeMDj_EmDsy9tYb001GdipUL6Crm8wP4GRDCqlTr_AOHuDwsBxA15RRd-WNCdkiy1fs8s&currency=USD"></script>
                            
                            <!-- Set up a container element for the button -->
                            <div id="paypal-button-container"></div>
                            
                            <script>
                                paypal.Buttons({
                                    // Sets up the transaction when a payment button is clicked
                                    createOrder: (data, actions) => {
                                        return actions.order.create({
                                            purchase_units: [{
                                                amount: {
                                                    value: '{{ Session::get('price') }}' // Can also reference a variable or function
                                                }
                                            }]
                                        });
                                    },
                                    // Finalize the transaction after payer approval
                                    onApprove: (data, actions) => {
                                        return actions.order.capture().then(function(orderData) {
                                            window.location.href = '{{ route('products.pay.success') }}';
                                        });
                                    }
                                }).render('#paypal-button-container');
                            </script>
                            
                            <div class="text-center mt-4">
                                <p class="text-muted small">Powered by <strong>PayPal</strong></p>
                                <p class="text-muted small">Secure payment processing</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <a href="{{ route('cart') }}" class="btn btn-outline-secondary">
                            <i class="icon-arrow-left mr-2"></i> Back to Cart
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .card {
            border-radius: 15px;
        }
        
        #paypal-button-container {
            margin: 20px 0;
        }
        
        .ftco-section {
            padding: 4em 0;
        }
    </style>
</x-app-layout>