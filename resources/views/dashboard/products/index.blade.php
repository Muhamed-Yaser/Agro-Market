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
        justify-content: space-between; */
            align-items: center;
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
    <div class="" style="margin-left:-650px ; margin-top: 40px ; margin-bottom: -8px ;">
        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline-info mr-4">Back</a>
        <a href="{{ route('products.create') }}" class="btn btn-sm btn-outline-success mr-2">Create</a>

    </div>

    <x-alert type="success" />
    <x-alert type="info" />

    <table class="table" style="width: 70% ; margin-left: 15%; margin-top: 9%; text-align: center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Compare Price</th>
                <th> Type</th>
                <th>Created At</th>
                <th>Description</th>
                <th colspan="2">Oprations</th>
            </tr>
        </thead>
        <tbody>
            <script>
                function confirmDelete(event) {
                    event.preventDefault(); // Prevent form submission
                    if (confirm("Are you sure you want to delete this product?")) {
                        event.target.submit(); // If the user confirms, submit the form
                    }
                }
            </script>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                            <a href="#" target="_blank">
                                <img src="{{ asset('storage/' . $product->product_image) }}" alt="Product Image" height="50">
                            </a>
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>${{ $product->price }}</td>
                    <td>${{ $product->compare_price }}</td>
                    <td>{{ $product->type }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}"
                            class="btn btn-sm btn-outline-success">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('products.destroy', $product->id) }}" method="post" onsubmit="confirmDelete(event)">
                            @csrf
                            <!-- Form Method Spoofing -->
                            <input type="hidden" name="_method" value="delete">
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">No products defined.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $products->withQueryString()->links('pagination::bootstrap-4') }}

</body>
<!-- <script src="../js/all.min.js"></script> -->
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
<script>
    $('.dropify').dropify();
</script>

</html>
