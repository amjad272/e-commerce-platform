@extends('admin.layouts.layout')
@section('admin_page_title')
    Manage Sub-Category - Admin Panel
@endsection
@section('admin_layout')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">All Sub-Categories</h4>
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
                                <th>Sub-Category</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subcategories as $subcategory)
                                <tr>
                                    <td>{{$subcategory->id}}</td>
                                    <td>{{$subcategory->subcategory_name}}</td>
                                    <td>{{$subcategory->category->category_name}}</td>
                                    <td><a href="{{route('edit.subcat',$subcategory->id)}}" class="btn btn-primary">Edit</a>
                                        <form action="{{route('delete.subcat',$subcategory->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Delete" class="btn btn-danger mt-1"></input>
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
