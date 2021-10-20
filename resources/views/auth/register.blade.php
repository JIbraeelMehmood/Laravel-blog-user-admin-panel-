
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
                            <form class="theme-form"  action="{{ route('register') }}" method="post">
                                @csrf
                                <h4> <b>Create Account</b></h4>
                                <p>Enter your details to begin</p>
                                <div class="form-group row" >
                                <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Name') }}</label>
                                    <div class="col-md-12">
                                        <input id="name" type="text" class=" p-4 bg-light form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>
                                    <div class="col-md-12">
                                    <input id="email" type="email" class=" p-4 bg-light form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>






                                <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-left">{{ __('Role') }}</label>
                                    <div class="col-md-12">
                                    <input id="role" type="role" class=" p-4 bg-light form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role">
                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                



                                
                                <div class="form-group row">
                                <label for="mobile" class="col-md-4 col-form-label text-md-left">{{ __('Mobile') }}</label>
                                    <div class="col-md-12">
                                    <input id="mobile" type="text" class=" p-4 bg-light form-control @error('mobile') is-invalid @enderror"  name="mobile" required  autofocus  >
                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                
                                <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>
                                    <div class="col-md-12">
                                    <input id="password" type="password" class="p-4 bg-light form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-left">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="p-4 bg-light form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
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
