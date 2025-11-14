<x-app-layout>
<section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_2.jpg') }});" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Register</h1>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
			<form method="POST" action="{{ route('register') }}" class="billing-form ftco-bg-dark p-3 p-md-5">
				@csrf
				<h3 class="mb-4 billing-heading">Register</h3>
	          	<div class="row align-items-end">
                	<div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus placeholder="Username">
							@error('name')
								<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
							@enderror
                        </div>
                    </div>
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="email">Email</label>
	                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
						@error('email')
							<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
	                </div>
	              </div>
                 
	              <div class="col-md-12">
	                <div class="form-group">
	                	<label for="password">Password</label>
	                	<div style="position: relative;">
	                    	<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password" style="padding-right: 45px;">
	                    	<button type="button" onclick="togglePassword('password')" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: #c49b63; font-size: 18px;">
	                            <i class="fas fa-eye" id="password-icon"></i>
	                        </button>
	                    </div>
						@error('password')
							<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
	                </div>

                </div>
				<div class="col-md-12">
	                <div class="form-group">
	                	<label for="password_confirmation">Confirm Password</label>
	                	<div style="position: relative;">
	                    	<input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" style="padding-right: 45px;">
	                    	<button type="button" onclick="togglePassword('password_confirmation')" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: #c49b63; font-size: 18px;">
	                            <i class="fas fa-eye" id="password_confirmation-icon"></i>
	                        </button>
	                    </div>
	                </div>

                </div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
							<div class="radio">
                                <button type="submit" class="btn btn-primary py-3 px-4">Register</button>
					    </div>
					</div>
                </div>

               
	          </form><!-- END -->
          </div> <!-- .col-md-8 -->
          </div>
        </div>
      </div>
    </section> <!-- .section -->

    <script>
    function togglePassword(inputId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(inputId + '-icon');
        
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
    </script>
</x-app-layout>