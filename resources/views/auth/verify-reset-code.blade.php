<x-app-layout>
  <section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_1.jpg') }});">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">
          <div class="col-md-7 col-sm-12 text-center ftco-animate">
            <h1 class="mb-3 mt-5 bread">Verify Code</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="ftco-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ftco-animate">
          <form method="POST" action="{{ route('password.code.verify.submit') }}" class="billing-form ftco-bg-dark p-3 p-md-5" style="max-width:560px; margin:0 auto;">
            @csrf
            <h3 class="mb-4 billing-heading">Enter the 6-digit code</h3>
            @if (session('status'))
              <div class="alert alert-success" style="background:#1f2937; color:#fff; border:1px solid #2b2b2b;">{{ session('status') }}</div>
            @endif
            <div class="row align-items-end">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="code">Code sent to {{ $email }}</label>
                  <input id="code" type="text" name="code" class="form-control" placeholder="123456" inputmode="numeric" pattern="[0-9]*" maxlength="6" required>
                  @error('code')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group mt-4">
                  <button type="submit" class="btn btn-primary py-3 px-4">Verify</button>
                  <a href="{{ route('password.request') }}" class="btn btn-secondary">Resend code</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</x-app-layout>
