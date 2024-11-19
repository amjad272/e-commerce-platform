@extends('seller.layouts.layout')
@section('seller_page_title')
    Manage Stores - Seller Panel
@endsection
@section('seller_layout')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">All stores</h4>
                </div>
                @if(session('message'))
                    <div class="alert alert-success ms-3 me-3">
                        {{session('message')}} <i class="align-middle" data-feather="check"></i>
                    </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Store</th>
                                <th>Description</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stores as $store)
                                <tr>
                                    <td>{{$store->id}}</td>
                                    <td>{{$store->store_name}}</td>
                                    <td>{{$store->details}}</td>
                                    <td>{{$store->slug}}</td>
                                    <td><a href="{{route('edit.store',$store->id)}}" class="btn btn-primary">Edit</a>
                                        <form action="{{route('delete.store',$store->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Delete" class="btn btn-danger mt-1">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

