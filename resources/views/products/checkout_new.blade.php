<x-app-layout>
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">
            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Checkout</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>Checkout</span></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
			<form method="POST" action="{{ route('proccess.checkout') }}" class="billing-form ftco-bg-dark p-3 p-md-5">
				<h3 class="mb-4 billing-heading">Billing Details</h3>
	          	@csrf
	          	
	          	{{-- Display validation errors --}}
	          	@if ($errors->any())
	          	    <div class="alert alert-danger alert-dismissible fade show" role="alert">
	          	        <strong>Vui lòng kiểm tra lại thông tin:</strong>
	          	        <ul class="mb-0 mt-2">
	          	            @foreach ($errors->all() as $error)
	          	                <li>{{ $error }}</li>
	          	            @endforeach
	          	        </ul>
	          	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	          	            <span aria-hidden="true">&times;</span>
	          	        </button>
	          	    </div>
	          	@endif
	          	
                <div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">First Name</label>
	                  <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="" value="{{ old('first_name') }}">
	                  @error('first_name')
	                      <div class="invalid-feedback">{{ $message }}</div>
	                  @enderror
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Last Name</label>
	                  <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="" value="{{ old('last_name') }}">
	                  @error('last_name')
	                      <div class="invalid-feedback">{{ $message }}</div>
	                  @enderror
	                </div>
                </div>
                <div class="w-100"></div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="country">Country</label>
										<select name="country" id="country" class="form-control country-select @error('country') is-invalid @enderror" style="min-height:48px;">
											<option value="">-- Select Country --</option>
											@php
												$countries = [
													'Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola', 'Antigua and Barbuda', 'Argentina', 'Armenia', 
													'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 
													'Belgium', 'Belize', 'Benin', 'Bhutan', 'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Brazil', 
													'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cabo Verde', 'Cambodia', 'Cameroon', 'Canada', 
													'Central African Republic', 'Chad', 'Chile', 'China', 'Colombia', 'Comoros', 'Congo (Brazzaville)', 
													'Congo (Kinshasa)', 'Costa Rica', 'Croatia', 'Cuba', 'Cyprus', 'Czechia', "Côte d'Ivoire", 'Denmark', 
													'Djibouti', 'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 
													'Eritrea', 'Estonia', 'Eswatini', 'Ethiopia', 'Fiji', 'Finland', 'France', 'Gabon', 'Gambia', 'Georgia', 
													'Germany', 'Ghana', 'Greece', 'Grenada', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 
													'Honduras', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Israel', 'Italy', 
													'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 
													'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Madagascar', 'Malawi', 
													'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Mauritania', 'Mauritius', 'Mexico', 'Micronesia', 
													'Moldova', 'Monaco', 'Mongolia', 'Montenegro', 'Morocco', 'Mozambique', 'Myanmar', 'Namibia', 'Nauru', 'Nepal', 
													'Netherlands', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'North Korea', 'North Macedonia', 'Norway', 
													'Oman', 'Pakistan', 'Palau', 'Palestine', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 
													'Poland', 'Portugal', 'Qatar', 'Romania', 'Russia', 'Rwanda', 'Saint Kitts and Nevis', 'Saint Lucia', 
													'Saint Vincent and the Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe', 'Saudi Arabia', 
													'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia', 'Solomon Islands', 
													'Somalia', 'South Africa', 'South Korea', 'South Sudan', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Sweden', 
													'Switzerland', 'Syria', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Timor-Leste', 'Togo', 'Tonga', 
													'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Tuvalu', 'Uganda', 'Ukraine', 
													'United Arab Emirates', 'United Kingdom', 'United States', 'Uruguay', 'Uzbekistan', 'Vanuatu', 
													'Vatican City', 'Venezuela', 'Vietnam', 'Yemen', 'Zambia', 'Zimbabwe', 'Hong Kong SAR', 'Macau SAR', 
													'Puerto Rico', 'United States Virgin Islands', 'Bermuda', 'Cayman Islands', 'Greenland', 'Faroe Islands'
												];
											@endphp
											@foreach($countries as $country)
												<option value="{{ $country }}" {{ old('country') == $country ? 'selected' : '' }}>{{ $country }}</option>
											@endforeach
										</select>
										@error('country')
										    <div class="invalid-feedback d-block">{{ $message }}</div>
										@enderror
									</div>
								</div>
		            <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
	                	<label for="streetaddress">Street Address</label>
	                  <textarea name="address" cols="10" rows="10" class="form-control @error('address') is-invalid @enderror" placeholder="House number and street name">{{ old('address') }}</textarea>
	                  @error('address')
	                      <div class="invalid-feedback">{{ $message }}</div>
	                  @enderror
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Town / City</label>
	                  <input name="city" type="text" class="form-control @error('city') is-invalid @enderror" placeholder="" value="{{ old('city') }}">
	                  @error('city')
	                      <div class="invalid-feedback">{{ $message }}</div>
	                  @enderror
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">Postcode / ZIP *</label>
	                  <input name="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" placeholder="" value="{{ old('zip_code') }}">
	                  @error('zip_code')
	                      <div class="invalid-feedback">{{ $message }}</div>
	                  @enderror
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="" value="{{ old('phone') }}">
	                  @error('phone')
	                      <div class="invalid-feedback">{{ $message }}</div>
	                  @enderror
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email Address</label>
	                  <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="" value="{{ old('email') }}">
	                  @error('email')
	                      <div class="invalid-feedback">{{ $message }}</div>
	                  @enderror
	                </div>
                </div>
                <div class="col-md-6">
	                <div class="form-group">
	                  <input name="price" type="hidden" value="{{ Session::get('price') }}" class="form-control" placeholder="">
	                </div>
                </div>
				<div class="col-md-6">
	                <div class="form-group">
	                  <input name="user_id" type="hidden" value="{{ Auth::user()->user_id }}" class="form-control" placeholder="">
	                </div>
                </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
	                	<div class="radio">
	                	    <button type="submit" class="btn btn-primary py-3 px-4">Place an order</button>
	                	</div>
	                </div>
                </div>
              </div>
	        </form><!-- END -->
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->
    
    <style>
        .invalid-feedback {
            display: block;
            color: #dc3545;
            font-size: 0.875em;
            margin-top: 0.25rem;
        }
        
        .is-invalid {
            border-color: #dc3545;
        }
        
        .alert {
            border-radius: 0.25rem;
        }
    </style>
</x-app-layout>
