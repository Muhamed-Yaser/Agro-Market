{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
</head>

<body>
    <!-- start of header  -->
    <header>
        <div class="profile text-center">
            <h3 class="m-0">Ahmed 3bdaiem</h3>
            <a href="{{ route('profile.edit') }}" class="btn">View profile</a>
        </div>
        <ul class="nav">
            <li><i class="fas fa-right-from-bracket"></i><a href="#"
                    onclick="return confirm('Logout from the website?');">Logout</a></li>
        </ul>
        <div class="add-account">
            <a href="{{ route('registerSeller') }}" class="btn">Register</a>
        </div>
    </header>
    <div id="menu-Btn" class="fas fa-bars"></div>
    <!-- end of header  -->

    <!-- start Profile  -->
    <section class="Profile">
        <div class="container">
            <div class="content d-flex justify-content-between align-items-start flex-wrap">
                <div class="userInfo">
                    <div class="image">
                        <img src="{{ asset('images/t4.jpg') }}" alt="" id="displayImage">
                    </div>
                    <div class="info text-center mt-3">
                        <h5>Ahmed 3bdaiem</h5>
                        <p>Lead Designer / Developer</p>
                    </div>
                </div>
                <div class="userdetails">
                    <ul class="tabs d-flex justify-content-start gap-3">
                        <li data-choose=".personal_details" class="active">Personal Details</li>
                        <li data-choose=".change_passwords">Change Password</li>
                    </ul>
                    <div class="contentUserDetails">
                        <div class="container">
                            <div class="Content programs_details">
                                <section>
                                    <header>
                                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                            {{ __('Profile Information') }}
                                        </h2>
                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                            {{ __("Update your account's profile information and email address.") }}
                                        </p>
                                    </header>
                                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                                        @csrf
                                        @method('patch')

                                        <div>
                                            <x-input-label for="name" :value="__('Name')" />
                                            <x-text-input id="name" name="name" type="text"
                                                class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus
                                                autocomplete="name" />
                                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                        </div>

                                        <div>
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" name="email" type="email"
                                                class="mt-1 block w-full" :value="old('email', $user->email)" required
                                                autocomplete="username" />
                                            <x-input-error class="mt-2" :messages="$errors->get('email')" />

                                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                                <div>
                                                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                                        {{ __('Your email address is unverified.') }}

                                                        <button form="send-verification"
                                                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                                            {{ __('Click here to re-send the verification email.') }}
                                                        </button>
                                                    </p>

                                                    @if (session('status') === 'verification-link-sent')
                                                        <p
                                                            class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                                            {{ __('A new verification link has been sent to your email address.') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>

                                        <div class="flex items-center gap-4">
                                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                                            @if (session('status') === 'profile-updated')
                                                <p x-data="{ show: true }" x-show="show" x-transition
                                                    x-init="setTimeout(() => show = false, 2000)"
                                                    class="text-sm text-gray-600 dark:text-gray-400">
                                                    {{ __('Saved.') }}</p>
                                            @endif
                                        </div>
                                    </form>
                                </section>
                            </div>
                            <div class="Content personal_details">
                                <form action="">
                                    <div class="name_email_inputs d-flex justify-content-start flex-wrap">
                                        <div class="input">
                                            <label for="fName" class="d-block">Name</label>
                                            <input type="text" class="w-100" value="Ahmed 3bdaiem" id="fName">
                                        </div>
                                        <div class="input">
                                            <label for="email" class="d-block">Email</label>
                                            <input type="email" class="w-100" value="ahmed3bdaiem@gmail.com"
                                                id="email">
                                        </div>
                                    </div>
                                    <div class="image_input justify-content-start flex-wrap mt-2">
                                        <div class="input">
                                            <label for="imageInput" class="d-block">Image</label>
                                            <input type="file" class="dropify" data-height="100" data-width="50"
                                                class="w-100" id="imageInput" accept="image/*">
                                        </div>
                                    </div>
                                    <input type="submit" value="Edit">
                                </form>
                            </div>
                            <div class="Content change_passwords">
                                <form action="">
                                    <div class="password d-flex justify-content-start flex-wrap mt-3 flex-column">
                                        <div class="input mb-3">
                                            <label for="oldPass" class="d-block">Old Password</label>
                                            <input type="password" class="w-100 input_password" id="oldPass">
                                            <div class="image">
                                                <img src="{{ asset('images/eye-close.png') }}" class="eyeicon">
                                            </div>
                                        </div>
                                        <div class="input mb-3">
                                            <label for="newPass" class="d-block">New Password</label>
                                            <input type="password" class="w-100 input_password" id="newPass">
                                            <div class="image">
                                                <img src="{{ asset('images/eye-close.png') }}" class="eyeicon">
                                            </div>
                                        </div>
                                        <div class="input mb-3">
                                            <label for="cPass" class="d-block">Confirm Password</label>
                                            <input type="password" class="w-100 input_password" id="cPass">
                                            <div class="image">
                                                <img src="{{ asset('images/eye-close.png') }}" class="eyeicon">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" value="Edit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Profile  -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
</body>

</html> --}}
