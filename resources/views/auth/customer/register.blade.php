@extends('auth.customer_layout.main')

@section('content')
<div class="account-page">
    <div class="container">
        <div class="row">

                <div class="col-2">
                    <img src="{{ asset('assets/img/hero-img-1.png') }}" width="100%">
                </div>
            <div class="col-2">
                <div class="form-container " style="height: 450px">

                    <div class="form-btn">
                        <span onclick="login()">Login</span>
                        <span onclick="register()">Register</span>
                        <hr id="Indicator">
                    </div>
                    <form id="LoginForm" action="{{route('customers.login')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <input type="text" name="email" placeholder="Username">
                        <input type="password" name="password" placeholder="Password">
                        <button type="submit" class="btnn">Login</button>
                        <a href="">Forget Password</a>
                    </form>

                    <form id="RegForm" action="{{route('customers.create_register')}}"   method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <input type="text" name="name" placeholder="Username">
                        <input type="email" name="email" placeholder="Email">
                        <input type="text" name="phone" placeholder="Phone number">
                        <input type="password" name="password" placeholder="Password">
                        <input type="password" name="password_confirmation" placeholder="Re-enter-password">
                        <button type="submit" class="btnn">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px"
            } else {
                MenuItems.style.maxHeight = "0px"
            }
        }
    </script>
    <script>
        var LoginForm = document.getElementById("LoginForm");
        var RegForm = document.getElementById("RegForm");
        var Indicator = document.getElementById("Indicator");

        function register() {
            RegForm.style.transform = "translate(0px)";
            LoginForm.style.transform = "translatex(0px)";
            Indicator.style.transform = "translateX(100px)";

        }

        function login() {

            RegForm.style.transform = "translatex(300px)";
            LoginForm.style.transform = "translatex(300px)";
            Indicator.style.transform = "translate(0px)";
        }

        $(document).ready(function(){
            // Function to handle form submission
            $('#RegForm').submit(function(event) {
                event.preventDefault(); // Prevent default form submission

                // Get the CSRF token value from the form
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Create FormData object
                var formData = new FormData(this);

                // Make the Ajax request
                $.ajax({
                    url: $(this).attr('action'), // URL from form's action attribute
                    method: $(this).attr('method'), // HTTP method from form's method attribute
                    dataType: 'json',
                    data: formData, // Set FormData object as data
                    processData: false, // Don't process the formData
                    contentType: false, // Set content type to false when sending FormData
                    headers: {
                        'X-CSRF-TOKEN': csrfToken // Include CSRF token in request headers
                    },
                    success: function(data) {
                        console.log(data);
                        // Handle successful response
                        login(); // Assuming login() is a function defined elsewhere
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        console.error('Error:', error);
                        var errorMessage = xhr.responseJSON.message; // Get error message from JSON response
                        alert('Error: ' + errorMessage); // Example of displaying error message to user
                    }
                });
            });

            // Example function login()
            function login() {

                RegForm.style.transform = "translatex(300px)";
                LoginForm.style.transform = "translatex(300px)";
                Indicator.style.transform = "translate(0px)";
            }
        });

    </script>
@endpush

@endsection
