@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Your Cart</h1>

    @if(session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @if(count($cartItems) > 0)  {{-- Use the correct variable for cart items --}}
        <ul class="list-group">
            @foreach($cartItems as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <h5>{{ $item['name'] }}</h5>
                        <p>Quantity: {{ $item['quantity'] }}</p>
                        <p>Price: ${{ $item['price'] }}</p>
                        <p>Total: ${{ $item['quantity'] * $item['price'] }}</p>
                    </div>
                    <div>
                        <button wire:click="removeItem({{ $item['id'] }})" class="btn btn-danger">Remove</button>
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
@endsection
