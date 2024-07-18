<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            /* display: flex;
            justify-content: space-between;
            align-items: center; */
        }
    </style>
</head>

<body>
    <header>
        <div class="profile text-center">
            <h3 class="m-0">{{ auth()->user()->name }}</h3>
            <a href="{{ route('profile.edit') }}" class="btn">View profile</a>
        </div>
        <ul class="nav">
            <li><i class="fa-solid fa-house"></i><a href="{{ route('dashboard') }}">Home</a></li>
            <li><i class="fas fa-pen"></i><a href="{{ route('products.create') }}">Add Products</a></li>
            <li><i class="fas fa-eye"></i><a href="{{ route('products.index') }}">View Products</a></li>
            <li><i class="fas fa-right-from-bracket"></i><a href="{{ route('logout') }}"
                    onclick="return confirm('logout from the website?');">Logout</a></li>
        </ul>
        <div class="add-account">
            <a href="{{ route('registerSeller') }}" class="btn">register</a>
        </div>
    </header>
    <div class="" style="margin-left:300px ; margin-top: 40px ; margin-bottom: 22px ;">
        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline-info mr-4">Back</a>
    </div>
    <x-alert type="success" />
    <x-alert type="info" />

    <!-- resources/views/dashboard/products/edit.blade.php -->
    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data"
        style="width: 70%; margin-left: 22%">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
            @error('name')
                <div class="alert alert-danger" style='width:27%;text-align:center;margin:.3%'>{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control" value="{{ old('price', $product->price) }}">
            @error('price')
                <div class="alert alert-danger" style='width:27%;text-align:center;margin:.3%'>{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="compare_price">Compare Price</label>
            <input type="text" name="compare_price" class="form-control"
                value="{{ old('compare_price', $product->compare_price) }}">
            @error('compare_price')
                <div class="alert alert-danger" style='width:27%;text-align:center;margin:.3%'>{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Product description</label>
            <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="alert alert-danger" style='width:27%;text-align:center;margin:.3%'>{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="type">Choose Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="Veg" {{ $product->type == 'Veg' ? 'selected' : '' }}>Veg</option>
                <option value="Fruits" {{ $product->type == 'Fruits' ? 'selected' : '' }}>Fruits</option>
            </select>
        </div>

        <div class="form-group" style="margin-top: 19px; margin-bottom: 19px">
            <label for="product_image">Product Image</label>
            <input type="file" name="product_image" class="form-control-file" accept="image/*">

            @if ($product->product_image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $product->product_image) }}" alt="Product Image" height="100">
                </div>
            @endif
        </div>


        <button type="submit" class="btn btn-success">Update Product</button>
    </form>

</body>
<!-- <script src="../js/all.min.js"></script> -->
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
<script>
    $('.dropify').dropify();
</script>

</html>
