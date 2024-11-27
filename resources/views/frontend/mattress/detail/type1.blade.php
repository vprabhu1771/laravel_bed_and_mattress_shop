@extends('frontend.layout.app')

@section('title')
    {{ $product->name }}
@endsection

@section('content')

<style>
    .product-image {
        max-height: 500px;
        object-fit: cover;
    }
    .product-details {
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 8px;
    }
    .specifications-table, .features-table {
        margin-top: 20px;
    }
</style>

<div class="container my-5">
    <div class="row">
        <!-- Product Image -->
        <div class="col-md-6">
            <img src="{{ $product->name }}" alt="{{ $product->name }}" class="img-fluid product-image">
        </div>
        
        <!-- Product Details -->
        <div class="col-md-6">
            <h1 class="mb-3">{{ $product->name }}</h1>
            <p class="lead">{{ $product->description }}</p>                       
            
        </div>
    </div>
</div>
@endsection