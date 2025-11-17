<x-app-layout>
    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});" >
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Checkout</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checout</span></p>
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
                <div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">First Name</label>
	                  <input type="text" name="first_name" class="form-control" placeholder="">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Last Name</label>
	                  <input type="text" name="last_name" class="form-control" placeholder="">
	                </div>
                </div>
                <div class="w-100"></div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="country">Country</label>
										<select name="country" id="country" class="form-control country-select" style="min-height:48px;">
														<option>Afghanistan</option>
														<option>Albania</option>
														<option>Algeria</option>
														<option>Andorra</option>
														<option>Angola</option>
														<option>Antigua and Barbuda</option>
														<option>Argentina</option>
														<option>Armenia</option>
														<option>Australia</option>
														<option>Austria</option>
														<option>Azerbaijan</option>
														<option>Bahamas</option>
														<option>Bahrain</option>
														<option>Bangladesh</option>
														<option>Barbados</option>
														<option>Belarus</option>
														<option>Belgium</option>
														<option>Belize</option>
														<option>Benin</option>
														<option>Bhutan</option>
														<option>Bolivia</option>
														<option>Bosnia and Herzegovina</option>
														<option>Botswana</option>
														<option>Brazil</option>
														<option>Brunei</option>
														<option>Bulgaria</option>
														<option>Burkina Faso</option>
														<option>Burundi</option>
														<option>Cabo Verde</option>
														<option>Cambodia</option>
														<option>Cameroon</option>
														<option>Canada</option>
														<option>Central African Republic</option>
														<option>Chad</option>
														<option>Chile</option>
														<option>China</option>
														<option>Colombia</option>
														<option>Comoros</option>
														<option>Congo (Brazzaville)</option>
														<option>Congo (Kinshasa)</option>
														<option>Costa Rica</option>
														<option>Croatia</option>
														<option>Cuba</option>
														<option>Cyprus</option>
														<option>Czechia</option>
														<option>Côte d'Ivoire</option>
														<option>Denmark</option>
														<option>Djibouti</option>
														<option>Dominica</option>
														<option>Dominican Republic</option>
														<option>Ecuador</option>
														<option>Egypt</option>
														<option>El Salvador</option>
														<option>Equatorial Guinea</option>
														<option>Eritrea</option>
														<option>Estonia</option>
														<option>Eswatini</option>
														<option>Ethiopia</option>
														<option>Fiji</option>
														<option>Finland</option>
														<option>France</option>
														<option>Gabon</option>
														<option>Gambia</option>
														<option>Georgia</option>
														<option>Germany</option>
														<option>Ghana</option>
														<option>Greece</option>
														<option>Grenada</option>
														<option>Guatemala</option>
														<option>Guinea</option>
														<option>Guinea-Bissau</option>
														<option>Guyana</option>
														<option>Haiti</option>
														<option>Honduras</option>
														<option>Hungary</option>
														<option>Iceland</option>
														<option>India</option>
														<option>Indonesia</option>
														<option>Iran</option>
														<option>Iraq</option>
														<option>Ireland</option>
														<option>Israel</option>
														<option>Italy</option>
														<option>Jamaica</option>
														<option>Japan</option>
														<option>Jordan</option>
														<option>Kazakhstan</option>
														<option>Kenya</option>
														<option>Kiribati</option>
														<option>Kuwait</option>
														<option>Kyrgyzstan</option>
														<option>Laos</option>
														<option>Latvia</option>
														<option>Lebanon</option>
														<option>Lesotho</option>
														<option>Liberia</option>
														<option>Libya</option>
														<option>Liechtenstein</option>
														<option>Lithuania</option>
														<option>Luxembourg</option>
														<option>Madagascar</option>
														<option>Malawi</option>
														<option>Malaysia</option>
														<option>Maldives</option>
														<option>Mali</option>
														<option>Malta</option>
														<option>Marshall Islands</option>
														<option>Mauritania</option>
														<option>Mauritius</option>
														<option>Mexico</option>
														<option>Micronesia</option>
														<option>Moldova</option>
														<option>Monaco</option>
														<option>Mongolia</option>
														<option>Montenegro</option>
														<option>Morocco</option>
														<option>Mozambique</option>
														<option>Myanmar</option>
														<option>Namibia</option>
														<option>Nauru</option>
														<option>Nepal</option>
														<option>Netherlands</option>
														<option>New Zealand</option>
														<option>Nicaragua</option>
														<option>Niger</option>
														<option>Nigeria</option>
														<option>North Korea</option>
														<option>North Macedonia</option>
														<option>Norway</option>
														<option>Oman</option>
														<option>Pakistan</option>
														<option>Palau</option>
														<option>Panama</option>
														<option>Papua New Guinea</option>
														<option>Paraguay</option>
														<option>Peru</option>
														<option>Philippines</option>
														<option>Poland</option>
														<option>Portugal</option>
														<option>Qatar</option>
														<option>Romania</option>
														<option>Russia</option>
														<option>Rwanda</option>
														<option>Saint Kitts and Nevis</option>
														<option>Saint Lucia</option>
														<option>Saint Vincent and the Grenadines</option>
														<option>Samoa</option>
														<option>San Marino</option>
														<option>Sao Tome and Principe</option>
														<option>Saudi Arabia</option>
														<option>Senegal</option>
														<option>Serbia</option>
														<option>Seychelles</option>
														<option>Sierra Leone</option>
														<option>Singapore</option>
														<option>Slovakia</option>
														<option>Slovenia</option>
														<option>Solomon Islands</option>
														<option>Somalia</option>
														<option>South Africa</option>
														<option>South Korea</option>
														<option>South Sudan</option>
														<option>Spain</option>
														<option>Sri Lanka</option>
														<option>Sudan</option>
														<option>Suriname</option>
														<option>Sweden</option>
														<option>Switzerland</option>
														<option>Syria</option>
														<option>Taiwan</option>
														<option>Tajikistan</option>
														<option>Tanzania</option>
														<option>Thailand</option>
														<option>Timor-Leste</option>
														<option>Togo</option>
														<option>Tonga</option>
														<option>Trinidad and Tobago</option>
														<option>Tunisia</option>
														<option>Turkey</option>
														<option>Turkmenistan</option>
														<option>Tuvalu</option>
														<option>Uganda</option>
														<option>Ukraine</option>
														<option>United Arab Emirates</option>
														<option>United Kingdom</option>
														<option>United States</option>
														<option>Uruguay</option>
														<option>Uzbekistan</option>
														<option>Vanuatu</option>
														<option>Vatican City</option>
														<option>Venezuela</option>
														<option>Vietnam</option>
														<option>Yemen</option>
														<option>Zambia</option>
														<option>Zimbabwe</option>
														<option>Hong Kong SAR</option>
														<option>Macau SAR</option>
														<option>Puerto Rico</option>
														<option>United States Virgin Islands</option>
														<option>Bermuda</option>
														<option>Cayman Islands</option>
														<option>Greenland</option>
														<option>Faroe Islands</option>
										</select>
									</div>
								</div>
		            <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
	                	<label for="streetaddress">Street Address</label>
	                  <textarea name="address" cols="10" rows="10" class="form-control" placeholder="House number and street name"></textarea>
	                </div>
		            </div>
		          {{--    <div class="col-md-12">
		            	<div class="form-group">
	                  <input type="text" class="form-control" placeholder="Appartment, suite, unit etc: (optional)">
	                </div>
		            </div>--}}
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Town / City</label>
	                  <input name="city" type="text" class="form-control" placeholder="">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">Postcode / ZIP *</label>
	                  <input name="zip_code" type="text" class="form-control" placeholder="">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input name="phone" type="text" class="form-control" placeholder="">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email Address</label>
	                  <input name="email" type="text" class="form-control" placeholder="">
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
                      <button type="submit" id="submitOrderBtn" name="submit" class="btn btn-primary py-3 px-4">Place an order</button>
						</div>
					</div>
                </div>
	            </div>
	          </form><!-- END -->

@push('scripts')
<script>
$(document).ready(function() {
    // Ngăn chặn double submit
    $('form.billing-form').on('submit', function(e) {
        var $submitBtn = $('#submitOrderBtn');
        
        // Kiểm tra nếu đã submit rồi
        if ($submitBtn.prop('disabled')) {
            e.preventDefault();
            return false;
        }
        
        // Disable button và thay đổi text
        $submitBtn.prop('disabled', true);
        $submitBtn.html('<span class="spinner-border spinner-border-sm mr-2"></span>Processing...');
        
        // Cho phép form submit
        return true;
    });
});
</script>
@endpush

	

	

</x-app-layout>