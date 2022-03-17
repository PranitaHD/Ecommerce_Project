<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
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
    <title>Reset Password - Mega Project</title>
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
                        <h2 class="form-title">Reset Password</h2>
                        <form method="POST" action="{{route('password.update')}}" class="register-form" id="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="token"><i class="zmdi zmdi-email material-icons-name"></i></label>
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email material-icons-name"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email" :value="old('email', $request->email)"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock material-icons-name"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation"><i class="zmdi zmdi-lock material-icons-name"></i></label>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" class="form-submit" value="Reset Password"/>
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
