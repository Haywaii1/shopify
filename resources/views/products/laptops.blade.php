@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <div class="container">


        <div class="container">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="product-images">

                <div class="image-gallery">
                    <img src="{{ asset('images/' . $electronics->image) }}" alt="{{ $electronics->name }}">

                </div>
            </div>

            <div class="product-info">
                <h1>{{ $electronics->name }}</h1>
                <div class="rating">
                    <span>⭐⭐⭐⭐☆</span>
                    <a href="#reviews">({{ $electronics->reviews_count }} reviews)</a>
                </div>
                <p class="price">${{ $electronics->price }}</p>
                <p class="description">
                    {{ $electronics->description }}
                </p>
            </div>

            <div class="product-actions">
                {{-- <button class="add-to-cart" href="{{ route('add.to.cart', $product->id) }}" >Add to Cart</button> --}}
                <button class="add-to-wishlist">Add to Wishlist</button>
                <a href="{{ route('add.to.cart', $electronics->id) }}" class="btn btn-primary">Buy Now</a>
            </div>

            <div class="product-details">
                <h2>Product Details</h2>
                <p>{{ $electronics->long_description }}</p>

                <h3>Specifications:</h3>
                <ul>
                    <li>Material: {{ $electronics->material }}</li>
                    <li>Dimensions: {{ $electronics->dimensions }}</li>
                    <li>Weight: {{ $electronics->weight }}g</li>
                </ul>
            </div>
        </div>
    @endsection
