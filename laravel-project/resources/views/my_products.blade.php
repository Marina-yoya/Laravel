<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="myProducts.css">
    <title>My Products</title>
</head>

<body>
    <header>
        <div class="logo">
            <img src="./assets/Megaparts-Logo-Light-Large.png" class="img-fluid" alt="Responsive image">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="{{ route('profile') }}">Add product</a></li>
                <li><a href="{{ route('view_all_products') }}">View All Products</a></li>
            </ul>
        </nav>
    </header>
<div class="container-products">
    @foreach($products as $product)
    <div class="part-container">
        <img src="{{ $product->img_url }}" alt="">
        <p class="part-description">
            {{ $product->part_description }}
        </p>
        <div class="price">
            <span class="category">
                {{ $product->category }}
            </span>
            <p class="sum">
                {{ number_format($product->price, 2) }}
            </p>
        </div>
        <div class="product-actions">
            <a href="{{ route('edit_product', ['product_id' => $product->id]) }}" class="edit-button">Edit</a>
            <a href="{{ route('delete_product', ['product_id' => $product->id]) }}" class="delete-button">Delete</a>
        </div>
    </div>
@endforeach
</div>

</body>

</html>