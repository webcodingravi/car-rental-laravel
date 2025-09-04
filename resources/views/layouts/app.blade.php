<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ !empty($meta_title) ? $meta_title : '' }} - Car Rental</title>
    @if (!empty($meta_description))
        <meta name="description" content="{{ $meta_description }}">
    @endif

    @if (!empty($meta_keywords))
        <meta name="keywords" content="{{ $meta_keywords }}">
    @endif
    <link rel="icon" href="{{ asset('image/logo/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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

    @include('auth.login', ['user-form'])


    <!-- Forgot Password Modal -->
    @include('auth.forgotPassword')

    {{-- error message --}}
    @include('alertMessage.alertMessage')

    {{-- Footer --}}
    @include('layouts.footer')

    <script src="{{ asset('js/common.js') }}"></script>
    <script>
        setTimeout(() => {
            $("#box").fadeOut('slow')
        }, 3000);
    </script>

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
            const forgotLink = document.getElementById('forgotPassword');
            const closeLogin = document.getElementById('close-btn');
            const loginModal = document.getElementById('login-model');
            const forgotModal = document.getElementById('forgot-modal');
            const closeForgot = document.getElementById('close-forgot');


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

                // Forgot password link typically only applies to login
                forgotLink.style.display = state === 'login' ? 'block' : 'none';
            });


            forgotLink.addEventListener('click', (e) => {
                e.preventDefault();
                loginModal.classList.add('hidden');
                forgotModal.classList.remove('hidden');
            });

            closeForgot.addEventListener('click', () => {
                forgotModal.classList.add('hidden');
                loginModal.classList.remove('hidden');
            });

            closeLogin.addEventListener('click', () => loginModal.classList.add('hidden'));

            window.addEventListener('click', (e) => {
                if (e.target === forgotModal) {
                    forgotModal.classList.add('hidden');
                    loginModal.classList.remove('hidden');
                }
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
