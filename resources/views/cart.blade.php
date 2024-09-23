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



{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Cart</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('cart') && count(session('cart')) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('cart') as $id => $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>
                        <form action="{{ route('update.cart') }}" method="POST">
                            @csrf
                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
                            <input type="hidden" name="id" value="{{ $id }}">
                            <button type="submit">Update</button>
                        </form>
                    </td>
                    <td>${{ $item['price'] }}</td>
                    <td>
                        <form action="{{ route('remove.from.cart', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection --}}
