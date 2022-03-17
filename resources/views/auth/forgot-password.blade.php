<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password - Mega Project</title>
    <link rel="icon" type="image/png" href="favicon.png"/>
    <!-- Font Icon -->
    <link rel="stylesheet" href="forms/fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="forms/css/style.css">
</head>
<body>
    <div class="main">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="forms/images/signin-image.jpg" alt="sing up image"></figure>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Forgot Password</h2>
                        <div class="form-group">
                            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                        </div>
                        <div class="mb-4" :status="session('status')"></div>
                        <div class="mb-4" :errors="$errors"></div>
                        <form method="POST" action="{{route('password.email')}}" class="register-form" id="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email material-icons-name"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" class="form-submit" value="Email Password Reset Link"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- JavaScript -->
    <script src="forms/vendor/jquery/jquery.min.js"></script>
    <script src="forms/js/main.js"></script>
</body>
</html> --}}
