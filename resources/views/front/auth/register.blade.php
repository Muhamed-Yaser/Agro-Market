
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
</head>

<body style="overflow: hidden;">
    <div class="wrapper">
        <div class="signup">
            <div class="content">
                <div class="signup_form">
                    <div class="heading text-center">

                    </div>
                    <!-- Laravel Breeze Registration Form -->
                    <x-guest-layout>
                        <form method="POST" action="{{ route('registerCustomer') }}" id="myForm"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Name -->
                            <div class="name_inputs mt-3">
                                <div class="input">
                                    <label for="name" class="d-block">Name</label>
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        value="{{old('name') }}" required autofocus />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>

                            <!-- Email Address -->
                            <div class="email_input mt-3">
                                <div class="input">
                                    <label for="email" class="d-block">Email</label>
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    value="{{old('email') }}" required />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>

                            {{-- <div class="role mt-3">
                                <label for="role" class="d-block">Role</label>
                                <input style="width: 100% ; padding: 7px" id="role" class="block mt-1 w-full" type="text" name="role"
                                       value="customer" readonly />
                                <x-input-error :messages="$errors->get('role')" class="mt-2" />
                              </div> --}}

                            <!-- Password -->
                            <div class="password_inputs mt-3">
                                <div class="input">
                                    <label for="password" class="d-block">Password</label>
                                    <x-text-input id="password" class="block mt-1 w-full" type="password"
                                        name="password" required />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <div class="input mt-3">
                                    <label for="password_confirmation" class="d-block">Confirm password</label>
                                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                        name="password_confirmation" required />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>


                            <!-- Image -->
                            <div class="image_input mt-3">
                                <label for="imageInput" class="d-block">Image</label>
                                <input type="file" class="dropify" id="imageInput" name="image" accept="image/*">
                                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            </div>


                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ms-3">
                                    {{ __('Sign Up') }}
                                </x-primary-button>
                            </div>
                        </form>
                        <p class="text-center any_account">
                            Already have an Account? <a href="{{ route('login') }}">Sign in.</a>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <script>
        // $('.dropify').dropify();

        // document.querySelector('#typeProfile').addEventListener('change', () => {
        //     const typeProfile = document.querySelector('#typeProfile').value;
        //     const sellerInfo = document.querySelector(".seller_info");
        //     const imageInput = document.getElementById('imageInput');
        //     const phoneInput = document.getElementById('phone');
        //     const ssnInput = document.getElementById('ssn');

        //     if (typeProfile === 'seller') {
        //         sellerInfo.style.display = 'block';
        //         imageInput.required = true;
        //         phoneInput.required = true;
        //         ssnInput.required = true;
        //     } else {
        //         sellerInfo.style.display = 'none';
        //         imageInput.required = false;
        //         phoneInput.required = false;
        //         ssnInput.required = false;
        //     }
        // });

        // document.getElementById('ssn').addEventListener('input', () => {
        //     const inputSSN = document.getElementById('ssn');
        //     if (inputSSN.value.length > 14) {
        //         inputSSN.value = inputSSN.value.slice(0, 14);
        //     }
        // });

        // document.getElementById('myForm').addEventListener('submit', () => {
        //     const sellerInfo = document.querySelector(".seller_info");
        //     if (window.getComputedStyle(sellerInfo).display !== 'none') {
        //         // Add your custom validation if needed
        //     }
        // });
    </script>
</body>

</html>
