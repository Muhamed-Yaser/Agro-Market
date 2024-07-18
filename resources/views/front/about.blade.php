<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us</title>
    <link rel="stylesheet" href="{{ asset('normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('style.css') }}" />
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet" />
    <style>
        .about-container {
            text-align: center;
            padding: 20px;
        }
        .about-image {
            position: relative;
            width: 100%;
            height: 100vh;
            background-image: url('{{ $imageUrl }}');
            background-size: cover;
            background-position: center;
        }
        .about-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
        }
        .about-text {
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 20px;
            font-size: 18px;
            line-height: 2.6;
            padding: 20px;
            width: 100%;
            margin: 40px auto;
            background-color: #f8f8f8;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="Nav">
        <div class="container">
            <div class="content d-flex justify-content-between align-items-center flex-wrap">
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="">
                </div>
                <ul class="links">
                    <a href="{{ route('products') }}">Home</a>
                    <a href="{{ route('about') }}">About</a>
                    <a href="{{ route('Allproducts') }}">Products</a>
                    <a href="{{ route('favProducts') }}">favorites</a>

                </ul>
                <div class="icon">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="about-container">
        <div class="about-image"></div>
        <div class="about-text">
            {!! nl2br(e($aboutText)) !!}
        </div>
    </div>
    <section class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="box">
                        <div class="image">
                            <img src="{{ asset('images/logo-removebg-preview.png') }}" alt="">
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem eveniet facilis nostrum
                            corrupti laudantium voluptatibus?</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="box">
                        <h3>quick links</h3>
                        <a class="link" href="{{ route('products') }}"> <i class="las la-angle-right"></i> Home</a>
                        <a class="link" href="{{ route('about') }}"> <i class="las la-angle-right"></i> About</a>
                        <a class="link" href=".{{ route('Allproducts') }}"> <i class="las la-angle-right"> </i> Products</a>
                        <a class="link" href="{{ route('favProducts') }}"> <i class="las la-angle-right"></i> favorites</a>
                        <a class="link" href="#contact"> <i class="las la-angle-right"></i> Contact</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="box">
                        <h3>Business hours</h3>
                        <p> <span>Sat - Fri :</span> 8:00 AM – 8:00 PM</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="box">
                        <h3>contact info</h3>
                        <a href="#" class="link"> <i class="ri-phone-fill"></i>(647) 803-8443</a>
                        <a href="mailto: test@gmail.com" class="link"> <i class="ri-mail-fill"></i> test@gmail.com
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
