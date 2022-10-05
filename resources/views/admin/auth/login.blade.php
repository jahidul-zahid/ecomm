@extends("admin.admin_layouts")

@section('admin_content')

<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
      <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Admin <span class="tx-info tx-normal">Login</span></div>

<hr>
        <form method="POST" action="{{ route('admin.login.store') }}">
          @csrf

                 <!-- Session Status -->
      <x-auth-session-status class="mb-4" :status="session('status')" />

<!-- Validation Errors -->
      <x-auth-validation-errors class="mb-4" :errors="$errors" />

     <!-- Email Address -->
        <div class="form-group">

              <x-input id="email" class="form-control" type="email" placeholder="Enter your email" name="email" :value="old('email')" required autofocus />
          </div>
      <div class="form-group">

              <x-input id="password" class="form-control" placeholder="Enter your password"
              type="password"
              name="password"
              required autocomplete="current-password" />
      </div><!-- form-group -->

        <!-- Remember Me -->
          <!-- Remember Me -->
          <div class="">
              <label for="remember_me" class="inline-flex items-center">
                  <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                  <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
              </label>
          </div>

            <div>
              <button type="submit" class="btn btn-info btn-block">Log In</button>

            </div>

        </form>

    </div><!-- login-wrapper -->
  </div><!-- d-flex -->

@endsection




