<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .profile {
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .profile h3 {
            margin: 0;
            font-size: 24px;
            color: #333333;
        }

        .profile .btn {
            background-color: #28a745;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 10px;
            display: inline-block;
        }

        .nav {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: flex-end;
            background-color: #333333;
            padding: 10px 0;
        }

        .nav li {
            margin-right: 20px;
        }

        .nav li a {
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            display: block;
            padding: 10px 15px;
            transition: 0.3s ease;
        }

        .nav li a:hover {
            background-color: #555555;
        }

        .add-account {
            text-align: right;
            margin-top: 10px;
        }

        .add-account .btn {
            background-color: #28a745;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
        }

        .content {
            display: flex;
            justify-content: space-between;
        }

        .userInfo {
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            text-align: center;
        }

        .userInfo .image {
            max-width: 50%;
            margin: 0 auto;
        }

        .userInfo .image img {
            max-width: 100%;
            height: auto;
            border-radius: 50%;
        }

        .userInfo .info h5 {
            margin: 0;
            color: #333333;
            font-size: 20px;
        }

        .userInfo .info p {
            color: #666666;
            margin: 5px 0;
            font-size: 16px;
        }

        .userdetails {
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 70%;
        }

        .tabs {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .tabs li {
            cursor: pointer;
            margin-right: 10px;
            padding: 10px 15px;
            background-color: #f0f0f0;
            border-radius: 5px 5px 0 0;
            transition: 0.3s ease;
        }

        .tabs li.active {
            background-color: #28a745;
            color: #ffffff;
        }

        .contentUserDetails {
            margin-top: 20px;
        }

        .input {
            margin-bottom: 20px;
        }

        .input label {
            display: block;
            margin-bottom: 5px;
            color: #333333;
            font-size: 16px;
        }

        .input input[type="text"],
        .input input[type="email"],
        .input input[type="password"],
        .input input[type="file"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #cccccc;
            border-radius: 5px;
        }

        .input input[type="file"] {
            padding: 7px;
        }

        .input input[type="file"].dropify-wrapper {
            height: 70px !important;
            width: 100% !important;
            border: none !important;
        }

        .input input[type="file"].dropify-preview {
            padding: 0 !important;
        }

        .input input[type="file"].dropify-render img {
            max-width: 100%;
            height: auto;
        }

        .input input[type="submit"] {
            background-color: #28a745;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s ease;
        }

        .input input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>

        <ul class="nav">
            <li><a href="{{ route('dashboard') }}">Home</a></li>
            <li><a href="{{ route('products.create') }}">Add Products</a></li>
            <li><a href="{{ route('products.index') }}">View Products</a></li>
            <li><a href="{{ route('logout') }}" onclick="return confirm('Logout from the website?');">Logout</a></li>
        </ul>

    </header>
    <!-- End Header -->

    <!-- Profile Section -->
    <sefction class="profile">
        <div class="container">
            <div class="content d-flex justify-content-between align-items-start flex-wrap">
                <!-- User Info -->
                <div class="userInfo">
                    <div class="image">
                        <img src="{{ asset('storage/' . $user->image) }}" alt="" height="50">
                    </div>
                    <div class="info mt-3">
                        <h5>{{ $user->name }}</h5>

                    </div>
                </div>

                <!-- User Details -->
                <div class="userdetails">
                    <ul class="tabs d-flex justify-content-start gap-3">
                        <li data-choose=".personal_details" class="active">Personal Details</li>
                    </ul>
                    <div class="contentUserDetails">
                        <div class="Content personal_details">
                            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="input">
                                    <label for="fName">Name</label>
                                    <input type="text" id="fName" name="name" value="{{ $user->name }}">
                                </div>
                                <div class="input">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" value="{{ $user->email }}">
                                </div>
                                <div class="input">
                                    <label for="imageInput">Change Profile Image</label>
                                    <input type="file" name="image" accept="image/*">
                                    @if ($user->image)
                                        <img src="{{ asset('storage/' . $user->image) }}" alt="#"
                                            height="50">
                                    @endif
                                    @error('image')
                                        <div class="alert alert-danger" style='width:27%; text-align:center;margin:.3%'>
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                        </div>
                        {{-- <input type="submit" value="Edit" class="btn"> --}}
                        <button type="submit" class="btn">Update</button>
                        </form>
                    </div>
                    <div style=" height:50px; color: red"></div>
                    <ul class="tabs d-flex justify-content-start gap-3" style="margin-bottom: 20px">
                        <li data-choose=".change_password" class="active">Change Password</li>
                    </ul>


                    <div class="Content change_password">
                        <section>
                            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                @csrf
                                @method('put')

                                <div class="input">
                                    <label for="currentPassword">Current Password</label>
                                    <input type="password" id="currentPassword" name="current_password" class="mt-1 block w-full" autocomplete="current-password">
                                    @error('current_password')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="input">
                                    <label for="newPassword">New Password</label>
                                    <input type="password" id="newPassword" name="password" class="mt-1 block w-full" autocomplete="new-password">
                                    @error('password')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="input">
                                    <label for="confirmPassword">Confirm Password</label>
                                    <input type="password" id="confirmPassword" name="password_confirmation" class="mt-1 block w-full" autocomplete="new-password">
                                    @error('password_confirmation')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="flex items-center gap-4">
                                    <button type="submit" class="btn btn-success">Change Password</button>

                                    @if (session('status') === 'password-updated')
                                        <p
                                            x-data="{ show: true }"
                                            x-show="show"
                                            x-transition
                                            x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-gray-600 dark:text-gray-400"
                                        >{{ __('Saved.') }}</p>
                                    @endif
                                </div>
                            </form>
                        </section>
                    </div>


                </div>
            </div>
        </div>
        </div>
        </section>
        <!-- End Profile Section -->

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
        <script>
            $('.dropify').dropify();
        </script>
        <!-- End Scripts -->
</body>

</html>
