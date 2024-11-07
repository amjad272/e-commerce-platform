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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('message'))
                    <div class="alert alert-success ms-3 me-3">
                        {{session('message')}} <i class="align-middle" data-feather="check"></i>
                    </div>
                @endif
                <form action="{{route('update.cat',$edited->id)}}" method="post" class="mt-0">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <label for="category_name" class="fw-bold mb-2">Give A Name To Your New Category</label>
                        <input type="text" class="form-control mb-2" name="category_name"
                               value="{{$edited->category_name}}">
                        <button type="submit" class="btn btn-primary w-100">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
