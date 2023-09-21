<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('cart.css') }}">
    <title>Shopping Cart</title>
</head>

<body>
    <header>
        <div class="logo">
            <img src="{{ asset('assets/Megaparts-Logo-Light-Large.png') }}" class="img-fluid" alt="Responsive image">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="{{ route('my-products') }}">My Products</a></li>
                <li><a href="{{ route('view_all_products') }}">View All Products</a></li>
                <li><a href="{{ route('profile') }}">Add product</a></li>
               
            </ul>
        </nav>
    </header>
    <h2>My Shopping Cart</h2>
    <div class="container">
    @foreach ($cart_items as $item)
    <div class="part-container">
        <img src="{{ $item->product->img_url }}" alt="{{ $item->product->part_name }}">
        <p class="part-description">{{ $item->product->part_description }}</p>
        <div class="price">
            <span class="category">Кат. №: {{ $item->product->id }}</span>
            <p class="sum">${{ number_format($item->product->price, 2) }}</p>
        </div>
        <form method="POST" action="{{ route('remove-from-cart', ['cart_item_id' => $item->id]) }}">
            @csrf
            @method('POST')
            <button type="submit" class="remove-button">Remove</button>
        </form>
        
        {{-- <a href="{{ route('remove-from-cart', ['cart_item_id' => $item->id]) }}" class="remove-button">Remove</a> --}}
    </div>
    @endforeach
    </div>
</body>

</html>
