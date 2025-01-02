@extends('seller.layouts.layout')
@section('seller_page_title')
    Edit Product - Seller Panel
@endsection
@section('seller_layout')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Product</h5>
                </div>
                @if ($errors->any())
                    <div class="alert alert-warning ms-3 me-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }} <i class="align-middle" data-feather="alert-circle"></i></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('message'))
                    <div class="alert alert-success ms-3 me-3">
                        {{session('message')}} <i class="align-middle" data-feather="check"></i>
                    </div>
                @endif
                <form action="{{route('update.product',$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <label for="product_name" class="fw-bold mb-2">Give A Name To Your New Product</label>
                        <input type="text" class="form-control mb-2" name="product_name" value="{{$product->product_name}}">

                        <label for="sku" class="fw-bold mb-2">SKU</label>
                        <input type="text" value="{{$product->sku}}" class="form-control mb-2" name="sku" placeholder="XUOM2378">

                        <label for="regular_price" class="fw-bold mb-2">Product Regular Price</label>
                        <input type="number" value="{{$product->regular_price}}" class="form-control mb-2" name="regular_price">

                        <label for="discounted_price" class="fw-bold mb-2">Discounted Price (If any)</label>
                        <input type="number" value="{{$product->discounted_price}}" class="form-control mb-2" name="discounted_price">

                        <label for="tax_rate" class="fw-bold mb-2">Tax</label>
                        <input type="number" value="{{$product->tax_rate}}" class="form-control mb-2" name="tax_rate">

                        <label for="stock_quantity" class="fw-bold mb-2">Stock Quantity</label>
                        <input type="text" value="{{$product->stock_quantity}}" class="form-control mb-2" name="stock_quantity">

                        <button type="submit" class="btn btn-primary w-100">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
