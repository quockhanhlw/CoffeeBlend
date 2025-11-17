<x-app-layout>
    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_1.jpg') }});" >
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            	            <div class="col-md-7 col-sm-12 text-center ftco-animate">
	            	<h1 class="mb-3 mt-5 bread">Login</h1>
	            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
			<form method="POST" action="{{ route('login') }}" class="billing-form ftco-bg-dark p-3 p-md-5">
                @csrf
				<h3 class="mb-4 billing-heading">Login</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="Email">Email</label>
	                  <input id="email" type="email" class="form-control" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
	                </div>
	              </div>
                 
	              <div class="col-md-12">
                        <div class="form-group">
                        	<label for="Password">Password</label>
                            <div style="position: relative;">
                            	<input id="password" type="password" class="form-control" @error('password') is-invalid @enderror name="password" required autocomplete="current-password" placeholder="Password" style="padding-right: 45px;">
                            	<button type="button" aria-label="Hiện/ẩn mật khẩu" onclick="togglePassword('password')" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer;">
                                    <!-- Inline SVG icons (no CDN dependency) -->
                                    <svg id="password-icon-eye" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="20" height="20" style="fill:#c49b63;">
                                        <path d="M572.52 241.4C518.05 135.59 407.81 64 288 64S57.95 135.59 3.48 241.4a48.07 48.07 0 000 45.2C57.95 376.41 168.19 448 288 448s230.05-71.59 284.52-161.4a48.07 48.07 0 000-45.2zM288 400c-97.2 0-189.09-57.35-237.93-144C98.91 169.35 190.8 112 288 112s189.09 57.35 237.93 144C477.09 342.65 385.2 400 288 400zm0-272a128 128 0 10128 128 128 128 0 00-128-128zm0 208a80 80 0 1180-80 80 80 0 01-80 80z"/>
                                    </svg>
                                    <svg id="password-icon-eye-slash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="20" height="20" style="fill:#c49b63; display:none;">
                                        <path d="M633.8 458.1L23 3.4C15.5-2.1 5.4-.7.9 6.8s-.7 15.1 6.8 19.6L86 79C33.3 121.1 4.1 172.4 1.1 178.1a47.73 47.73 0 000 45.8C55.8 330.8 167.7 400 288 400a310.22 310.22 0 00125.4-26l84.8 62.2c3.2 2.4 7 3.6 10.8 3.6 5.3 0 10.6-2.4 14-7 6-7.8 4.4-18.9-3.2-24.7zM288 352c-97.2 0-189.1-57.3-237.9-144 14.7-25.4 43.5-67.5 88.3-99.8l56.7 41.5A127.66 127.66 0 00160 256a128 128 0 00176 119.5l29.3 21.5A262.54 262.54 0 01288 352zm346.9-128.1a48 48 0 000-45.8c-12.1-22.2-38.4-63.1-79.7-97.4l-39.4 28.9C558.4 135.4 592.1 177.2 608 208c-48.8 86.7-140.7 144-237.9 144-9.3 0-18.5-.6-27.6-1.7l-41.2-30.2c21.1-9.2 38.6-25.5 49.7-46l31 22.7A128.05 128.05 0 00480 256a127.66 127.66 0 00-34.1-87.3l30.6-22.4C524.4 171.6 577.3 220.6 634.9 287.9z"/>
                                    </svg>
                                </button>
	                    	</div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
	                </div>

                </div>
                <div class="col-md-12">
                    <div class="form-group d-flex justify-content-between align-items-center mt-2" style="font-size: 14px;">
                        <div>
                            <label style="margin:0; padding:0; font-weight:500; font-size:14px;">
                                <input type="checkbox" name="remember" style="margin-right:4px;"> Remember me
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" style="color:#c49b63; text-decoration:none;">Forgot password?</a>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
							<div class="radio">
                                <button name ="submit" type="submit" class="btn btn-primary py-3 px-4">Login</button>
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
        const eye = document.getElementById(inputId + '-icon-eye');
        const slash = document.getElementById(inputId + '-icon-eye-slash');
        const isHidden = input.type === 'password';
        input.type = isHidden ? 'text' : 'password';
        if (eye && slash) {
            eye.style.display = isHidden ? 'none' : '';
            slash.style.display = isHidden ? '' : 'none';
        }
    }
    </script>

  {{--   <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>--}} 
</x-app-layout>
