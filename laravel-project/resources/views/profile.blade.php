<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('profile.css') }}">
    <title>Add Product</title>
</head>

<body>

    <header>
        <div class="logo">
            <img src="{{ asset('assets/Megaparts-Logo-Light-Large.png') }}" class="img-fluid" alt="Responsive image">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="{{ route('my-products') }}">My Products</a></li>
                <li><a href="{{ route('cart') }}">My Cart</a></li>
                <li><a href="{{ route('view_all_products') }}">View All Products</a></li>
            </ul>
        </nav>
    </header>
    <h2>Add Product</h2>
    @include('product_form')
    
</body>

</html>
