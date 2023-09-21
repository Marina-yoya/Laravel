<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('profile.css') }}">
    <title>Edit Product</title>
</head>

<body>
    <header>
        <div class="logo">
            <img src="{{ asset('assets/Megaparts-Logo-Light-Large.png') }}" class="img-fluid" alt="Responsive image">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="{{ route('profile') }}">Add product</a></li>
                <li><a href="{{ route('my-products') }}">View All Products</a></li>
            </ul>
        </nav>
    </header>
    <h2>Edit Product</h2>

    <form action="{{ route('update_product', ['product_id' => $product->id]) }}" method="POST" class="form-container">
        @csrf
        <input type="hidden" name="product_id" class="form-input" value="{{ $product->id }}">
        <label for="part_name" class="form-label">Product Name:</label>
        <input type="text" id="part_name" name="part_name" class="form-input" value="{{ $product->part_name }}" required>

        <label for="img_url" class="form-label">Image URL:</label>
        <input type="text" id="img_url" name="img_url" class="form-input" value="{{ $product->img_url }}" required>

        <label for="part_description" class="form-label">Description:</label>
        <input type="text" id="part_description" name="part_description" class="form-input" value="{{ $product->part_description }}" required>

        <label for="category" class="form-label">Category:</label>
        <input type="text" id="category" name="category" class="form-input" value="{{ $product->category }}" required>

        <label for="price" class="form-label">Price:</label>
        <input type="number" id="price" name="price" class="form-input" step="0.01" value="{{ $product->price }}" required>

        <input type="submit" value="Save Changes" class="form-submit">
    </form>

</body>

</html>
