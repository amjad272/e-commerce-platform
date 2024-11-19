@extends('admin.layouts.layout')
@section('admin_page_title')
    Create Category - Admin Panel
@endsection
@section('admin_layout')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create Category</h5>
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
                <form action="{{route('store.cat')}}" method="post">
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
