@extends('frontend.layouts.app')

@section('classic-ecommerce')
    
    @include('frontend.layouts.header')

    @include('frontend.layouts.loader')

    <div class="layout-centered">
        <main class="main-content container my-9 pt-8">

            <div class="bg-white rounded shadow-7 register-card px-4 py-2">

                <div class="row justify-content-center">
                    <img class="h-80px mb-4" src="{{asset('frontend/assets/logo-colourful.png')}}" alt="">
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-1">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
                                @error('name')
                                    <span role="alert" style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group mb-1">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" required value="{{ old('email') }}">
                                @error('email')
                                    <span role="alert" style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group mb-1">
                                <label for="phone">Phone</label>
                                <input type="number" class="form-control" name="phone" required value="{{ old('phone') }}">
                                @error('phone')
                                    <span role="alert" style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>        
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group mb-1">
                                <label for="locations">Locations</label>
                                <select name="location_id" class="form-control" required>
                                    <option value="">Select a location</option>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->id }}" {{ $location->id == old('location_id') ? 'selected' : null }}>{{ $location->en_location }}</option>
                                    @endforeach
                                </select>
                                @error('location_id')
                                    <span role="alert" style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>        
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group mb-1">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" required value="{{ old('address') }}">
                                @error('address')
                                    <span role="alert" style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>        
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group mb-1">
                                <label for="password">Password</label>
                                <input type="password" id="password" onchange="validationForm();" onkeyup="checkPassword();"  class="form-control" name="password" required>
                                @error('password')
                                    <span role="alert" style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group mb-1">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" id="confirmPass" onchange="validationForm();" onkeyup="checkPass();" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-12">
                        <div id="passwordValidation"></div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div id="confirmMessage"></div>
                    </div>
                    <div class="form-group">
                        <button disabled class="btn btn-block btn-main my-3" id="registerBtn" type="submit">Register</button>
                    </div>
                </form>

                <p class="text-center text-muted small-2">have an account? <a href="{{ route('login') }}">Login here</a></p>
            </div>

        </main>
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
            function checkPass() {
                //Store the password field objects into letiables ..
                let pass1 = document.getElementById('password');
                let pass2 = document.getElementById('confirmPass');
                //Store the Confimation Message Object ...
                let message = document.getElementById('confirmMessage');
                //Compare the values in the password field 
                //and the confirmation field
                if (pass1.value == pass2.value) {
                  //The passwords match. 
                  //the user that they have entered the correct password 
                    message.innerHTML = ""
                    checkPassVal = true;
                    console.log(checkPassVal);
                } else {
                  //The passwords do not match.
                  //notify the user.
                    checkPassVal = false;

                    message.innerHTML = "<div class='alert alert-danger mb-0' role='alert'>Password doesn't match</div>"
                }
            }
            function validationForm() {
                if (checkPassVal == true && checkPasswordVal == true) {
                    
                    console.log(checkPassVal);
                    console.log(checkPasswordVal);
                    console.log("true kol imputs tmam");
                    document.getElementById("registerBtn").removeAttribute("disabled");
                }
                else {
                    console.log(checkPasswordVal);
                    console.log(checkPassVal);
                    
                    console.log("disabled");
                    document.getElementById("registerBtn").setAttribute("disabled","disabled");
                }

            };
    </script>
@endsection