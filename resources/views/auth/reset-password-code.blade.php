<x-app-layout>
  <section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_1.jpg') }});">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">
          <div class="col-md-7 col-sm-12 text-center ftco-animate">
            <h1 class="mb-3 mt-5 bread">Set New Password</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="ftco-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ftco-animate">
          <form method="POST" action="{{ route('password.code.update') }}" class="billing-form ftco-bg-dark p-3 p-md-5" style="max-width:560px; margin:0 auto;">
            @csrf
            <h3 class="mb-4 billing-heading">Create a new password</h3>
            <div class="row align-items-end">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="password">New Password</label>
                  <div style="position: relative;">
                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="New password" style="padding-right:45px;">
                    <button type="button" aria-label="Show/Hide password" onclick="togglePassword('password')" style="position:absolute; right:10px; top:50%; transform: translateY(-50%); background:none; border:none; cursor:pointer; color:#c49b63; font-size:18px;">
                      <i class="fa-solid fa-eye" id="password-icon"></i>
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
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password" style="padding-right:45px;">
                    <button type="button" aria-label="Show/Hide confirm password" onclick="togglePassword('password_confirmation')" style="position:absolute; right:10px; top:50%; transform: translateY(-50%); background:none; border:none; cursor:pointer; color:#c49b63; font-size:18px;">
                      <i class="fa-solid fa-eye" id="password_confirmation-icon"></i>
                    </button>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group mt-4">
                  <button type="submit" class="btn btn-primary py-3 px-4">Update password</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script>
    function togglePassword(id){
      const input = document.getElementById(id);
      const icon = document.getElementById(id + '-icon');
      if(input.type === 'password') { input.type = 'text'; icon.classList.remove('fa-eye'); icon.classList.add('fa-eye-slash'); }
      else { input.type = 'password'; icon.classList.remove('fa-eye-slash'); icon.classList.add('fa-eye'); }
    }
  </script>
</x-app-layout>
