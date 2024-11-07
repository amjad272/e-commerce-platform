@extends('admin.layouts.layout')
@section('admin_page_title')
    Edit Category - Admin Panel
@endsection
@section('admin_layout')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Category</h5>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="card-body">
                        <input type="text" class="form-control mb-2" name="category_name" value="{{$edited->category_name}}">
                        <button type="submit" class="btn btn-primary w-100">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
