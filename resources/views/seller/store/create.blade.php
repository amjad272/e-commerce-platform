@extends('seller.layouts.layout')
@section('seller_page_title')
    Create Store - Seller Panel
@endsection
@section('seller_layout')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create Store</h5>
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
                <form action="{{route('seller.store.publish')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <label for="store_name" class="fw-bold mb-2">Give A Name To Your New Store</label>
                        <input type="text" class="form-control mb-2" name="store_name" placeholder="Infinity Store">

                        <label for="details" class="fw-bold mb-2">Describe Your Store</label>
                        <textarea id="details" class="form-control mb-2" name="details"></textarea>

                        <label for="slug" class="fw-bold mb-2">Give A Slug To Your Store</label>
                        <input type="text" class="form-control mb-2" name="slug" placeholder="Infinity-Store">

                        <button type="submit" class="btn btn-primary w-100">Add Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

