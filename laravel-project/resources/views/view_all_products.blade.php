<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="myProducts.css">
    <title>View All Products</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="./assets/Megaparts-Logo-Light-Large.png" class="img-fluid" alt="Responsive image">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="{{ route('my-products') }}">My Products</a></li>
                <li><a href="{{ route('cart') }}">My Cart</a></li>
                <li><a href="{{ route('profile') }}">Add product</a></li>
               
            </ul>
        </nav>
    </header>
    <div class="container-products">
        @foreach ($products as $product)
        <div class="part-container">
            <img src="{{ $product->img_url }}" alt="">
            <p class="part-description">{{ $product->part_description }}</p>
            <div class="price">
                <span class="category">{{ $product->category }}</span>
                <p class="sum">{{ number_format($product->price, 2) }}</p>
            </div>
            @if (auth()->check() && $product->user_id !== auth()->user()->id)
                <form action="{{ route('add_to_cart') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="number" name="quantity" value="1" min="1">
                    <button type="submit">Add to Cart</button>
                </form>
            @endif
        </div>
        @endforeach
    </div>
</body>
</html>
