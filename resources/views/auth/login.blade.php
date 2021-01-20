@extends('frontend.layouts.app')

@section('classic-ecommerce')
    
    @include('frontend.layouts.header')

    @include('frontend.layouts.loader')

    <div class="layout-centered">
        <section class="login main-content my-9 pt-8" style="background-image: url({{ asset("frontend/assets/banner_images/banner.png") }})">

            <div class="bg-white rounded shadow-7 w-400 mw-100 p-4">
                <div class="row justify-content-center">
                    <img class="h-100px" src="{{ asset('frontend/assets/logo-colourful.png') }}" alt="">
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" required value="{{ old('email') }}">
                        @error('email')
                            <span role="alert" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" onchange="validationForm();" onkeyup="checkPassword();" type="password" class="form-control" name="password" required>
                        @error('password')
                            <span role="alert" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 p-0">
                        <div id="passwordValidation"></div>
                    </div>
                    <div class="form-group flexbox py-3">
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" checked>
                        <label class="custom-control-label">Remember me</label>
                        </div>

                        <a class="text-muted small-2" href="user-recover.html">Forgot password?</a>
                    </div>

                    <div class="form-group">
                        <button id="loginBtn" disabled class="btn btn-block btn-main" type="submit">Login</button>
                    </div>
                </form>

                <p class="text-center text-muted small-2">Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
            </div>

        </section>
    </div>

    @include('frontend.layouts.footer')

@endsection
@section('scripts')
    <script>
        let checkPassVal = false ;
        let checkPasswordVal = false ;
        function checkPassword() {
                let password = document.getElementById('password');
                let passwordValidation = document.getElementById('passwordValidation');
                if(password.value.length < 8){
                    passwordValidation.innerHTML = "<div class='alert alert-danger'>Your password is less than 8</div>"
                    checkPasswordVal = false;

                }
                else{
                    passwordValidation.innerHTML="";
                    checkPasswordVal = true;
                    console.log(checkPasswordVal);
                }
            }

            function validationForm() {
                if ( checkPasswordVal == true) {
                    
                    console.log(checkPassVal);
                    console.log(checkPasswordVal);
                    console.log("true kol imputs tmam");
                    document.getElementById("loginBtn").removeAttribute("disabled");
                }
                else {
                    console.log(checkPasswordVal);
                    console.log(checkPassVal);
                    
                    console.log("disabled");
                    document.getElementById("loginBtn").setAttribute("disabled","disabled");
                }

            };
    </script>
@endsection