@extends('front.master')
@section('content')
<main class="main">
   <div style="padding:50px">
        <div class="container login-container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6" style="margin:0 auto">
                                <div class="heading mb-1">
                                    <h2 class="title">Login</h2>
                                </div>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <label for="login-email">
                                        Username or email address
                                        <span class="required">*</span>
                                    </label>
                                    {{-- <input type="email" class="form-input form-wide" id="login-email" required /> --}}
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <label for="login-password">
                                        Password
                                        <span class="required">*</span>
                                    </label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div class="form-footer">
                                        <div class="custom-control custom-checkbox mb-0">
                                            <input type="checkbox" class="custom-control-input" id="lost-password" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                            <label class="custom-control-label mb-0" for="lost-password">Remember
                                                me</label>
                                        </div>

                                        <a href="{{ route('password.request') }}"
                                            class="forget-password text-dark form-footer-right">Forgot
                                            Password?</a>
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-md w-100">
                                        LOGIN
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
   </div>
</main><!-- End .main -->
@endsection
