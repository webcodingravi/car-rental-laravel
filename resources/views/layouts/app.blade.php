<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car Rental</title>
    <link rel="icon" href="{{ asset('image/favicon.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    @vite('resources/css/app.css')
</head>

<body>
    @include('layouts.header', ['userLogin', 'listCars'])


    @yield('content')


    {{-- login/sign model --}}

    @include('login', ['user-form'])

    {{-- Footer --}}
    @include('layouts.footer')

    <script src="{{ asset('js/common.js') }}"></script>
    <script>
        $(document).ready(function() {
            // open login model
            $("body").delegate("#userLogin", "click", function() {
                $("#login-model").removeClass("hidden")
            })
            // close login model
            $("body").delegate("#close-btn", "click", function() {
                $("#login-model").addClass("hidden")
            })




            let state = 'login';
            const formTitle = document.getElementById('form-title');
            const nameField = document.getElementById('name-field');
            const nameMobile = document.getElementById('mobile-field');
            const toggleText = document.getElementById('toggle-text');
            const toggleLink = document.getElementById('toggle-link');
            const submitButton = document.getElementById('submit-button');

            toggleLink.addEventListener('click', () => {
                state = (state === 'login') ? 'register' : 'login';
                formTitle.textContent = (state === 'login') ? 'Login' : 'Sign Up';
                nameField.style.display = (state === 'register') ? 'block' : 'none';
                nameMobile.style.display = (state === 'register') ? 'block' : 'none';
                submitButton.textContent = (state === 'register') ? 'Create Account' : 'Login';
                toggleText.textContent = (state === 'register') ?
                    'Already have account?' :
                    'Create an account?';
                toggleLink.textContent = 'click here';
            });


            // register User
            $("body").delegate("#user-form", "submit", function(e) {
                e.preventDefault();
                if (state === 'register') {
                    $.ajax({
                        url: "{{ route('registerUser') }}",
                        method: "post",
                        data: $(this).serialize(),
                        dataType: "json",
                        success: function(res) {
                            if (res.status == true) {
                                new Swal({
                                    icon: "success",
                                    title: res.message
                                }).then(() => {
                                    location.reload()
                                })


                            } else {
                                if (res.error['name'] || res.error['email'] || res.error[
                                        'mobile'] || res.error[
                                        'password']) {
                                    new Swal({
                                        icon: "error",
                                        title: res.error['name'] ||
                                            res.error['email'] ||
                                            res.error['mobile'] ||
                                            res.error['password']
                                    })
                                }

                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('AJAX Error', textStatus, errorThrown);
                            alert('An error occurred:' + errorThrown)
                        }
                    })
                }

                if (state === 'login') {
                    $.ajax({
                        url: "{{ route('loginUser') }}",
                        method: "post",
                        data: $(this).serialize(),
                        dataType: "json",
                        success: function(res) {
                            if (res.status == true) {
                                new Swal({
                                    icon: "success",
                                    title: res.message
                                }).then(() => {
                                    location.reload()
                                })

                            } else {
                                new Swal({
                                    icon: "error",
                                    title: res.message
                                })


                            }
                        },

                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('AJAX Error', textStatus, errorThrown);
                            alert('An error occurred:' + errorThrown)
                        }
                    })
                }
            })



            // list cars
            $("body").delegate('#listCars', "click", function() {
                $.ajax({
                    url: "{{ route('listCars') }}",
                    method: "get",
                    success: function(res) {
                        if (res.status == true) {
                            new Swal({
                                icon: "success",
                                title: res.message
                            }).then(() => {
                                location.reload()
                            })
                        } else {
                            new Swal({
                                icon: "error",
                                title: res.message
                            })
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('AJAX Error', textStatus, errorThrown);
                        alert('An error occurred:' + errorThrown)
                    }

                })
            })
        })
    </script>

    @yield('script')
</body>

</html>
