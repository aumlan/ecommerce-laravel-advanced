@extends('frontend.layout.master')

@section('content')
    <div class="container mt-5">

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <table id="cart" class="table table-hover table-condensed table-responsive">
            <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($cart as $key=>$product)
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ $product['img'] }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $product['title'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{  number_format($product['price']) }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $product['quantity'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{  number_format($product['sub_total']) }}</td>
                    <td class="actions" data-th="">
                        <form action="{{ route('frontend.cart.remove') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $key}}">
                            <button type="submit" class="btn btn-danger btn-sm remove-from-cart" >
                                <i class="fa fa-trash-o"></i>Remove
                            </button>

                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
            <tfoot>

            <tr>
                <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                <td colspan="2"><a href="{{ route('frontend.cart.clear')}}" class="btn btn-info"><i class="fa fa-angle-left"></i> Clear Cart</a></td>
                <td class="text-center"><strong>Total ${{ number_format($total,2)  }}</strong></td>
            </tr>
            </tfoot>
        </table>

    </div>
@endsection
