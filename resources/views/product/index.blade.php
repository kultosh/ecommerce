@extends('layouts.front')

@section('content')
    <div class="container">
        <h1>{{ $categoryName ?? null }} Products</h1>

        <div class="custom-row-2">
            @foreach ($categoryProducts as $product)
                @include('product._single_product');
            @endforeach
        </div>
    </div>
@endsection
