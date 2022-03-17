{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Mobile Number -->
            <div class="mt-4">
                <x-label for="mobile" :value="__('Mobile Number')" />

                <x-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" :value="old('mobile')" required />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-label for="address" :value="__('Address')" />

                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
            </div>

            <!-- Country -->
            <div class="mt-4">
                <x-label for="country_id" :value="__('Country')" />

                <x-input id="country_id" class="block mt-1 w-full" type="text" name="country_id" :value="old('country_id')" required />
            </div>

            <!-- State -->
            <div class="mt-4">
                <x-label for="state_id" :value="__('State')" />

                <x-input id="state_id" class="block mt-1 w-full" type="text" name="state_id" :value="old('state_id')" required />
            </div>

            <!-- City -->
            <div class="mt-4">
                <x-label for="city_id" :value="__('City')" />

                <x-input id="city_id" class="block mt-1 w-full" type="text" name="city_id" :value="old('city_id')" required />
            </div>

            <!-- Pin Code -->
            <div class="mt-4">
                <x-label for="pincode" :value="__('Pin Code')" />

                <x-input id="pincode" class="block mt-1 w-full" type="text" name="pincode" :value="old('pincode')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register - Mega Project</title>
    <link rel="icon" type="image/png" href="favicon.png"/>
    <!-- Font Icon -->
    <link rel="stylesheet" href="forms/fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="forms/css/style.css">
</head>
<body>
    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign Up</h2>
                        <form method="POST" action="{{route('register')}}" class="register-form" id="register-form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account-circle material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Name" :value="old('name')" required />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email material-icons-name"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email" :value="old('email')" required />
                            </div>
                            <div class="form-group">
                                <label for="mobile"><i class="zmdi zmdi-phone material-icons-name"></i></label>
                                <input type="number" name="mobile" id="mobile" placeholder="Mobile Number" :value="old('mobile')" required />
                            </div>
                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-home material-icons-name"></i></label>
                                <input type="text" name="address" id="address" placeholder="Address" :value="old('address')" required />
                            </div>
                            <div class="form-group">
                                <label for="country_id"><i class="zmdi zmdi-airplane material-icons-name"></i></label>
                                <div>
                                    <select name="country_id" id="country-dd" class="form-control" required>
                                        <option value="" class="option_color">Select Country</option>
                                        @foreach ($countries as $data)
                                            <option value="{{ $data->id }}">
                                                {{ $data->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="state_id"><i class="zmdi zmdi-car material-icons-name"></i></label>
                                <div>
                                    <select name="state_id" id="state-dd" class="form-control" required>
                                        <option value="" class="option_color">Select State</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city_id"><i class="zmdi zmdi-city material-icons-name"></i></label>
                                <div>
                                    <select name="city_id" id="city-dd" class="form-control" required>
                                        <option value="" class="option_color">Select City</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pincode"><i class="zmdi zmdi-pin material-icons-name"></i></label>
                                <input type="number" name="pincode" id="pincode" placeholder="Pin Code" :value="old('pincode')" required />
                            </div>
                            <div class="form-group">
                                <label for="role_id"><i class="zmdi zmdi-key material-icons-name"></i></label>
                                <div>
                                    <select name="role_id" id="role_id">
                                        <option selected class="option_color">Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image"><i class="zmdi zmdi-image-alt material-icons-name"></i></label>
                                <input type="file" name="image" id="image" placeholder="Profile" :value="old('image')" required />
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock-open material-icons-name"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required autocomplete="new-password" />
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation"><i class="zmdi zmdi-lock material-icons-name"></i></label>
                                <input type="password" name="password_confirmation" required id="password_confirmation" placeholder="Confirm Password" />
                            </div>
                            <div class="form-group form-button">
                                &nbsp;&nbsp;&nbsp;
                                <input type="reset" class="form-submit" value="Reset"/>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="submit" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="forms/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="{{route('login')}}" class="signup-image-link">Already User? Sign In</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- JavaScript -->
    <script src="forms/vendor/jquery/jquery.min.js"></script>
    <script src="forms/js/main.js"></script>
    <!-- Country, State and City Dropdown Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#country-dd').on('change', function() {
                var idCountry = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{ url('api/fetch-states') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state-dd').html('<option value="" class="option_color">Select State</option>');
                        $.each(result.states, function(key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html('<option value="" class="option_color">Select City</option>');
                    }
                });
            });
            $('#state-dd').on('change', function() {
                var idState = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{ url('api/fetch-cities') }}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#city-dd').html('<option value="" class="option_color">Select City</option>');
                        $.each(res.cities, function(key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
