<!DOCTYPE html>
<html lang="en">

<head>
<!-- Meta Tags
    ============================================= -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="Digital Bond">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- Your Title Page
    ============================================= -->
<title>@yield('title')</title>
<!-- Favicon Icons
     ============================================= -->
<link rel="shortcut icon" href="{{ asset('frontend/assets/img/Layer-0-copy.png') }}">
<!-- Bootstrap Links
     ============================================= -->
<!-- Plugins
     ============================================= -->
<!-- Owl Carousal -->
    @if(app()->getLocale() == 'en')
        <link href="{{ asset('frontend/assets/css/page.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
        <!-- Favicons -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('frontend/assets/loader.png')}}" type="image/x-icon">
    @else
        <link href="{{ asset('frontend/assets/css/page.min.css') }}" rel="stylesheet">
        <link href="{{asset('frontend/assets/css/all.min.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/assets/css/style-ar.css')}}" rel="stylesheet">

        {{-- font --}}
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=El+Messiri&display=swap" rel="stylesheet">

        <!-- Favicons -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        {{-- <link rel="icon" href="{{ asset('frontend/assets/loader.png') }}"> --}}
        <link rel="shortcut icon" href="{{ asset('frontend/assets/loader.png')}}" type="image/x-icon">

    @endif

</head>
<body id="bg">
    <div class="page-wrapper">
        @yield('classic-ecommerce')
    </div>

    <!-- Core JS Libraries -->
    @if(app()->getLocale() == 'en')
        <script src="{{ asset('frontend/assets/js/page.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/script.js') }}"></script>
        <script>
            function checkPass() {
                //Store the password field objects into variables ...
                var pass1 = document.getElementById("password");
                var pass2 = document.getElementById("confirmPass");
                //Store the Confimation Message Object ...
                var message = document.getElementById("confirmMessage");
                //Set the colors we will be using ...
                var goodColor = "#66cc66";
                var badColor = "#f40303";
                //Compare the values in the password field
                //and the confirmation field
                if (pass1.value == pass2.value) {
                    //The passwords match.
                    //Set the color to the good color and inform
                    //the user that they have entered the correct password
                    message.style.color = goodColor;
                    message.innerHTML = "";
                } else {
                    //The passwords do not match.
                    //Set the color to the bad color and
                    //notify the user.

                    message.style.color = badColor;
                    message.innerHTML =
                        "<div class='alert alert-danger' role='alert'>Password doesn't match</div>";
                }
            }
        </script>
      @else
        <script src="{{asset('frontend/assets/js/page.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/script-ar.js')}}"></script>
        <script>
            function checkPass() {
                //Store the password field objects into variables ...
                var pass1 = document.getElementById("password");
                var pass2 = document.getElementById("confirmPass");
                //Store the Confimation Message Object ...
                var message = document.getElementById("confirmMessage");
                //Set the colors we will be using ...
                var goodColor = "#66cc66";
                var badColor = "#f40303";
                //Compare the values in the password field
                //and the confirmation field
                if (pass1.value == pass2.value) {
                    //The passwords match.
                    //Set the color to the good color and inform
                    //the user that they have entered the correct password
                    message.style.color = goodColor;
                    message.innerHTML = "";
                } else {
                    //The passwords do not match.
                    //Set the color to the bad color and
                    //notify the user.

                    message.style.color = badColor;
                    message.innerHTML =
                        "<div class='alert alert-danger' role='alert'>Password doesn't match</div>";
                }
            }
        </script>
      @endif
  @yield('scripts')
</body>
</html>