@extends('layouts.app')

@section('styles')
    <style>
        .product-images .main-image {
            width: 100%;
            max-width: 500px;
        }

        .product-info {
            padding: 20px;
        }

        .product-actions {
            margin-top: 20px;
        }

        .add-to-cart,
        .add-to-wishlist {
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .related-products {
            margin-top: 40px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="product-images">
            <div class="main-image">
                <img src="{{ asset('images/dress-shirt-img.png') }}" alt="{{ $product->name }}">
            </div>
            <div class="image-gallery">
                <img src="{{ asset('images/dress-shirt-img.png') }}" alt="Product Image 1">
                <img src="{{ asset('images/dress-shirt-img.png') }}" alt="Product Image 2">
                <img src="{{ asset('images/dress-shirt-img.png') }}" alt="Product Image 3">
            </div>
        </div>

        <div class="product-info">
            <h1>{{ $product->name }}</h1>
            <div class="rating">
                <span>⭐⭐⭐⭐☆</span>
                <a href="#reviews">({{ $product->reviews_count }} reviews)</a>
            </div>
            <p class="price">${{ $product->price }}</p>
            <p class="description">
                {{ $product->description }}
            </p>
        </div>

        <div class="product-actions">
            {{-- <button class="add-to-cart" href="{{ route('add.to.cart', $product->id) }}" >Add to Cart</button> --}}
            <button class="add-to-wishlist">Add to Wishlist</button>
            <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-primary">Buy Now</a>
        </div>

        <div class="product-details">
            <h2>Product Details</h2>
            <p>{{ $product->long_description }}</p>

            <h3>Specifications:</h3>
            <ul>
                <li>Material: {{ $product->material }}</li>
                <li>Dimensions: {{ $product->dimensions }}</li>
                <li>Weight: {{ $product->weight }}g</li>
            </ul>
        </div>
    </div>
@endsection
