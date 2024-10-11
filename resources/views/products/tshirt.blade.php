@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="product-images">

            <div class="image-gallery">
                <img src="{{ asset('images/' . $clothes->image) }}" alt="{{ $clothes->name }}">

            </div>
        </div>

        <div class="product-info">
            <h1>{{ $clothes->name }}</h1>
            <div class="rating">
                <span>⭐⭐⭐⭐☆</span>
                <a href="#reviews">({{ $clothes->reviews_count }} reviews)</a>
            </div>
            <p class="price">${{ $clothes->price }}</p>
            <p class="description">
                {{ $clothes->description }}
            </p>
        </div>

        <div class="product-actions">
            <button class="add-to-wishlist">Add to Wishlist</button>
            <a href="{{ route('add.to.cart', $clothes->id) }}" class="btn btn-primary">Buy Now</a>
        </div>

        <div class="product-details">
            <h2>Product Details</h2>
            <p>{{ $clothes->long_description }}</p>

            <h3>Specifications:</h3>
            <ul>
                <li>Material: {{ $clothes->material }}</li>
                <li>Dimensions: {{ $clothes->dimensions }}</li>
                <li>Weight: {{ $clothes->weight }}g</li>
            </ul>
        </div>
    </div>
@endsection
