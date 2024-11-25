@extends('seller.layouts.layout')
@section('seller_page_title')
    Create Product - Seller Panel
@endsection
@section('seller_layout')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Add Product</h5>
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
                <form action="{{route('seller.product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <label for="product_name" class="fw-bold mb-2">Give A Name To Your New Product</label>
                        <input type="text" class="form-control mb-2" name="product_name"
                               placeholder="Samsung Galaxy S22 Ultra">

                        <label for="description" class="fw-bold mb-2">Describe Your Product</label>
                        <textarea id="description" class="form-control mb-2" name="description"></textarea>

                        <label for="images" class="fw-bold mb-2">Product Photos</label>
                        <input type="file" class="form-control mb-2" name="images[]" multiple>

                        <label for="sku" class="fw-bold mb-2">SKU</label>
                        <input type="text" class="form-control mb-2" name="sku" placeholder="XUOM2378">

                        <livewire:category-subcategory/>

                        <label for="store_id" class="fw-bold mb-2">Select Store</label>
                        <select type="text" class="form-control mb-2" name="store_id">
                            <option value="">Select Store</option>
                            @foreach($stores as $store)
                                <option value="{{$store->id}}">{{$store->store_name}}</option>
                            @endforeach
                        </select>

                        <label for="regular_price" class="fw-bold mb-2">Product Regular Price</label>
                        <input type="number" class="form-control mb-2" name="regular_price">

                        <label for="discounted_price" class="fw-bold mb-2">Discounted Price (If any)</label>
                        <input type="number" class="form-control mb-2" name="discounted_price">

                        <label for="tax_rate" class="fw-bold mb-2">Tax</label>
                        <input type="number" class="form-control mb-2" name="tax_rate">

                        <label for="stock_quantity" class="fw-bold mb-2">Stock Quantity</label>
                        <input type="text" class="form-control mb-2" name="stock_quantity">

                        <label for="slug" class="fw-bold mb-2">Slug</label>
                        <input type="text" class="form-control mb-2" name="slug" placeholder="Star-Store">

                        <label for="meta_title" class="fw-bold mb-2">Meta Name</label>
                        <input type="text" class="form-control mb-2" name="meta_title">

                        <label for="meta_description" class="fw-bold mb-2">Meta Description</label>
                        <input type="text" class="form-control mb-2" name="meta_description">

                        <button type="submit" class="btn btn-primary w-100">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

