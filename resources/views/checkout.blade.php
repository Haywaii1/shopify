@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Checkout</h1>

    @if(session('cart') && count(session('cart')) > 0)
        <ul class="list-group">
            @foreach(session('cart') as $id => $details)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <h5>{{ $details['name'] }}</h5>
                        <p>Quantity: {{ $details['quantity'] }}</p>
                        <p>Price: ${{ $details['price'] }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
        <form action="{{ route('checkout.process') }}" method="POST" class="mt-4">
            @csrf
            <div class="form-group">
                <label for="address">Shipping Address:</label>
                <textarea class="form-control" id="address" name="address" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Place Order</button>
        </form>
    @else
        <div class="alert alert-warning" role="alert">
            Your cart is empty! Please add items to your cart before proceeding to checkout.
        </div>
        <a href="{{ url('/home') }}" class="btn btn-primary">Continue Shopping</a>
    @endif
</div>
@endsection
