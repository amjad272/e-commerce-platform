@extends('admin.layouts.layout')
@section('admin_page_title')
    Create Category - Admin Panel
@endsection
@section('admin_layout')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create Category</h5>
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
                @if(session('success'))
                    <div class="alert alert-success">
                        Category Added Successfully <i class="align-middle" data-feather="check"></i>
                    </div>
                @endif
                <form action="{{route('storecat')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <label for="category_name" class="fw-bold mb-2">Give A Name To Your New Category</label>
                        <input type="text" class="form-control mb-2" name="category_name">
                        <button type="submit" class="btn btn-primary w-100">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
