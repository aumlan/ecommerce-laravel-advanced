@extends('frontend.layout.master')

@section('content')

@include('frontend.partial._hero')
    <div class="album py-5 bg-light">
        <div class="container">

            @if(session()->has('message'))
                <div class="alert alert-{{ session()->get('type')  }}">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href="{{ route('frontend.product.details', $product->slug) }}">
                            <img class="card-img-top" src="{{ $product->getFirstMediaUrl('products') }}" alt="{{ $product->title }}">
                        </a>
                        <div class="card-body">
                            <p class="card-text">{{ $product->title }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <form action="{{ route('frontend.cart.add') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">
                                            Add To Cart
                                        </button>
                                    </form>
                                </div>
                                <small class="text-muted">
                                    @if ($product->sale_price !== null && $product->sale_price > 0)
                                        $ <strike> {{ $product->price }}</strike> ${{ $product->sale_price }}
                                    @else
                                        ${{ $product->price }}
                                    @endif
                                </small>
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
