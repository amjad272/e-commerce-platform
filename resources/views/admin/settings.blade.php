@extends('admin.layouts.layout')
@section('admin_page_title')
    Settings - Admin Panel
@endsection
@section('admin_layout')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Home Page Setting</h5>
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
                <form action="{{route('admin.homepagesetting.update')}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <label for="discounted_product_id" class="fw-bold mb-2">Discounted Product</label>
                        <select name="discounted_product_id" id="discounted_product_id" class="form-control">
                            @foreach($products as $product)
                                <option
                                    value="{{$product->id}}" {{$homepagesetting->discounted_product_id == $product->id ? "Selected":''}}>{{$product->product_name}}</option>
                            @endforeach
                        </select>

                        <label for="discount_percent" class="fw-bold mb-2">Discount Percent</label>
                        <input type="number" value="{{$homepagesetting->discount_percent}}" class="form-control mb-2"
                               name="discount_percent">

                        <label for="discount_heading" class="fw-bold mb-2">Discount Heading</label>
                        <input type="text" value="{{$homepagesetting->discount_heading}}" class="form-control mb-2"
                               name="discount_heading">

                        <label for="discount_subheading" class="fw-bold mb-2">Discount Text</label>
                        <input type="text" value="{{$homepagesetting->discount_subheading}}" class="form-control mb-2"
                               name="discount_subheading">

                        <label for="featured_product_1_id" class="fw-bold mb-2">Featured Product 1</label>
                        <select name="featured_product_1_id" id="featured_product_1_id" class="form-control">
                            @foreach($products as $product)
                                <option
                                    value="{{$product->id}}" {{$homepagesetting->featured_product_1_id == $product->id ? "Selected":''}}>{{$product->product_name}}</option>
                            @endforeach
                        </select>

                        <label for="featured_product_2_id" class="fw-bold mb-2">Featured Product 2</label>
                        <select name="featured_product_2_id" id="featured_product_2_id" class="form-control">
                            @foreach($products as $product)
                                <option
                                    value="{{$product->id}}" {{$homepagesetting->featured_product_2_id == $product->id ? "Selected":''}}>{{$product->product_name}}</option>
                            @endforeach
                        </select>

                        <button type="submit" class="btn btn-primary w-100 mt-2">Update Home Page Setting</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
