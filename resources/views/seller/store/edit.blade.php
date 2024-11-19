@extends('seller.layouts.layout')
@section('seller_page_title')
    Edit Store - Seller Panel
@endsection
@section('seller_layout')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Store</h5>
                </div>
                @if ($errors->any())
                    <div class="alert alert-warning">
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
                <form action="{{route('update.store',$edited->id)}}" method="post" class="mt-0">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <label for="store_name" class="fw-bold mb-2">Give A Name To Your New Store</label>
                        <input type="text" class="form-control mb-2" name="store_name"
                               value="{{$edited->store_name}}">

                        <label for="details" class="fw-bold mb-2">Edit Your Store Description</label>
                        <textarea class="form-control mb-2" name="details"></textarea>

                        <label for="slug" class="fw-bold mb-2">Edit Your Store Slug</label>
                        <input type="text" class="form-control mb-2" name="slug"
                               value="{{$edited->slug}}">
                        <button type="submit" class="btn btn-primary w-100">Update Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
