
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
                $ {{ $product->price }}
            </h5>
            <br>

            <p>
                {{ $product->description }}
            </p>
            <br>
            <button type="button" class="btn btn-success">
                Add To Cart
            </button>
        </div>
    </div>
</div>
@endsection
