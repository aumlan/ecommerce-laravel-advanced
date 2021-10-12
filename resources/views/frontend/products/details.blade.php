
@extends('frontend.layout.master')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 text-center">
            <img src="{{ $product->getFirstMediaUrl('products') }}" alt="" height="250px" width="250px">
        </div>
        <div class="col-md-6">
            <h3>
                {{ $product->title }}
            </h3>
            <h5>
                @if ($product->sale_price !== null )
                    $<strike> {{ $product->price }}</strike> ${{ $product->sale_price }}
                @else
                    ${{ $product->price }}
                @endif
            </h5>
            <br>

            <p>
                {{ $product->description }}
            </p>
            <br>

            <form action="{{ route('frontend.cart.add') }}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="btn btn-success">
                    Add To Cart
                </button>

            </form>
        </div>
    </div>
</div>
@endsection
