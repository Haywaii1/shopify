@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Your Cart</h1>
        @if(session('cart') && count(session('cart')) > 0)
            <ul class="list-group">
                @foreach(session('cart') as $id => $details)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h5>{{ $details['name'] }}</h5>
                            <p>Quantity: {{ $details['quantity'] }}</p>
                            <p>Price: ${{ $details['price'] }}</p>
                            <p>Total: ${{ $details['quantity'] * $details['price'] }}</p>
                        </div>
                        <div>
                            <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger">Remove</a>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="mt-3">
                <a href="{{ url('/home') }}" class="btn btn-primary">Continue Shopping</a>
                <a href="{{ route('checkout') }}" class="btn btn-success">Proceed to Checkout</a>
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                Your cart is empty!
            </div>
            <a href="{{ url('/home') }}" class="btn btn-primary">Continue Shopping</a>
        @endif
    </div>
</body>
</html>
@endsection

