
<!DOCTYPE html>
<html lang="en">
@extends('components.head')
<body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8">
                    <img class="bg-img-cover w-100 " src="./assets/images/login/1.jpg" alt="looginpage">
                </div>
                <div class="col-xl-4 p-4 mt-5 ">
                    <div class="card p-4 shadow-lg">
                        <div class="login-main m-1">
                            <form class="theme-form" action="{{ route('login') }}" method="post">
                                @csrf
                                <h4> <b>Sign in to account</b></h4>
                                <p>Enter your details to begin</p>
                                <div class="form-group " >
                                    <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="p-4 bg-light form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>
                                    <div class="col-md-12">
                                        <input id="password" type="password" class="p-4 bg-light w-100 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-6 offset-md-0">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div> 
                                </div>
                                
                                <div class="form-group" >
                                    <div class="col-md-12 offset-md-0">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link " href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>

                                <p class="mt-4 mb-0">
                                    Don't have account?
                                    <a class="ms-2" href="register">
                                        Create Account
                                    </a>
                                </p>
                                    <p class="mt-2 mb-0">
                                       Login With ?
                                        <a class="btn btn-link ms-2"  href="{{ url('/google') }}">
                                            <span class="text-info ">Google</span>
                                        </a>
                                        <a class="btn btn-link ms-2"  href="{{ url('/google') }}">
                                            <span class="text-primary">FaceBook</span>
                                        </a>
                                    </p>
                            </form>
                        </div>
                    </div>
                </div>




            </div>
            @extends('components.footer')   
        </div>
@extends('components.script')
</body>
</html>
