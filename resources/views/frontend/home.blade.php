@extends('frontend.layout.master')

@section('content')

@include('frontend.partial._hero')
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{ $product->getFirstMediaUrl('products') }}" alt="{{ $product->title }}">
                        <div class="card-body">
                            <p class="card-text">{{ $product->title }} XXX</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Add To Cart</button>
                                </div>
                                <small class="text-muted">{{$product->price}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            {{ $products->render() }}
        </div>
    </div>

@endsection
