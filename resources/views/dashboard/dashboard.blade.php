<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #28a745; /* Green color */
      color: #fff;
      padding: 15px 20px;
    }
    header .profile {
      text-align: center;
      margin-bottom: 20px;
    }
    header .profile h3 {
      margin: 0;
    }
    header .profile a {
      color: #ffc107;
      text-decoration: none;
      padding: 10px 20px;
      border: 1px solid #ffc107;
      border-radius: 5px;
    }
    header .nav {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      justify-content: center;
    }
    header .nav li {
      margin: 0 15px;
    }
    header .nav li a {
      color: #fff;
      text-decoration: none;
      font-size: 18px;
    }
    header .nav li a:hover {
      text-decoration: underline;
    }
    header .add-account {
      text-align: center;
      margin-top: 20px;
    }
    header .add-account a {
      color: #ffc107;
      text-decoration: none;
      padding: 10px 20px;
      border: 1px solid #ffc107;
      border-radius: 5px;
    }
    .dashboard {
      padding: 40px 20px;
    }
    .dashboard .heading {
      margin-bottom: 40px;
      font-size: 32px;
      font-weight: bold;
      color: #28a745; /* Green color */
    }
    .box-container {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
    }
    .box {
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      border-radius: 10px;
      padding: 20px;
      text-align: center;
      width: 30%;
      margin-bottom: 20px;
    }
    .box img {
      width: 100px;
      height: 100px;
      margin-bottom: 10px;
    }
    .box h3 {
      font-size: 28px;
      margin: 0 0 10px;
      color: #28a745; /* Green color */
    }
    .box p {
      font-size: 18px;
      color: #666;
    }
    .box a {
      display: inline-block;
      margin-top: 15px;
      color: #fff;
      background-color: #28a745; /* Green color */
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }
    .box a:hover {
      background-color: #218838; /* Darker green color */
    }
  </style>
</head>
<body>
  <header>
    <div class="profile text-center">
      <h3 class="m-0">Hello:{{ auth()->user()->name }}</h3>
      <a href="{{ route('profile.edit') }}" class="btn">View profile</a>
    </div>
    <ul class="nav">
      <li><i class="fa-solid fa-house"></i><a href="{{ route('dashboard') }}">Home</a></li>
      <li><i class="fas fa-pen"></i><a href="{{ route('products.create') }}">Add Products</a></li>
      <li><i class="fas fa-eye"></i><a href="{{ route('products.index') }}">View Products</a></li>
      <li><i class="fas fa-right-from-bracket"></i><a href="{{ route('logout') }}" onclick="return confirm('logout from the website?');">Logout</a></li>
    </ul>
    <div class="add-account">
      <a href="{{ route('registerSeller') }}" class="btn">Register</a>
    </div>
  </header>

  <!-- Start Of Dashboard -->
  <section class="dashboard">
    <div class="container">
      <h1 class="heading text-center">Dashboard</h1>
      <div class="box-container">
        <div class="box">

            <h3>{{ $newProducts }}</h3>
          <p>Add New Products</p>
          <a href="{{ route('products.create') }}" class="btn">Add New Products</a>
        </div>
        <div class="box">

          <h3>{{ $totalProducts }}</h3>
          <p>Total Number Of Products</p>
          <a href="{{ route('products.index') }}" class="btn">View Products</a>
        </div>
        <div class="box">

          <h3>{{ $sellersCount }}</h3>
          <p>Number OF Sellers</p>
          <a href="{{ route('profile.edit') }}" class="btn">Your Prfile</a>
        </div>
      </div>
    </div>
  </section>
  <!-- End Of Dashboard -->
</body>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
<script>
  $('.dropify').dropify();
</script>
</html>
