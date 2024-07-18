
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body style="overflow: hidden;">
  <div class="wrapper">
    <div class="login">
        <div class="content">
          <div class="login_form">
            <div class="heading text-center">
              
            </div>
            <!-- Laravel Breeze Login Form -->
            <x-guest-layout>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="email_input mt-3">
                      <div class="input">
                        <label for="email" class="d-block">Email</label>
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                      </div>
                    </div>

                    <!-- Password -->
                    <div class="password_inputs mt-3">
                      <div class="input">
                        <label for="password" class="d-block">Password</label>
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                      </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-primary-button class="ms-3">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
                <p class="text-center any_account">
                    Don’t have an account? <a href="{{ route('customer.login.submit') }}">Click here to sign up.</a>
                  </p>
            </x-guest-layout>

          </div>
          <div class="images">
            <img src="{{ asset('images/banana.jpg') }}" alt="Banana">
            <img src="{{ asset('images/garlic.jpg') }}" alt="Garlic">
            <img src="{{ asset('images/Lemon.jpg') }}" alt="Lemon">
            <img src="{{ asset('images/Mango.jpg') }}" alt="Mango">
            <img src="{{ asset('images/peach.jpg') }}" alt="Peach">
            <img src="{{ asset('images/tomatoes.jpg') }}" alt="Tomatoes">
            <img src="{{ asset('images/potatoes.jpg') }}" alt="Potatoes">
            <img src="{{ asset('images/Persian figs.jpg') }}" alt="Persian figs">
            <img src="{{ asset('images/peach.jpg') }}" alt="Peach">
          </div>
        </div>
    </div>
  </div>
</body>
</html>
