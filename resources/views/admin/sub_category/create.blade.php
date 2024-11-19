@extends('admin.layouts.layout')
@section('admin_page_title')
    Create Sub-Category - Admin Panel
@endsection
@section('admin_layout')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create Sub-Category</h5>
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
                <form action="{{route('store.subcat')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <label for="subcategory_name" class="fw-bold mb-2">Give A Name To Your New Sub-Category</label>
                        <input type="text" class="form-control mb-2" name="subcategory_name">
                        <label for="subcategory_id" class="fw-bold mb-2">Select A Category</label>
                        <select name="category_id" class="form-control mb-2">
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary w-100">Add Sub-Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
