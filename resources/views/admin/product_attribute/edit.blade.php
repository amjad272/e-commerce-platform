@extends('admin.layouts.layout')
@section('admin_page_title')
    Edit Attribute - Admin Panel
@endsection
@section('admin_layout')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Attribute</h5>
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
                <form action="{{route('update.attribute',$edited->id)}}" method="post" class="mt-0">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <label for="attribute_value" class="fw-bold mb-2">Give A Name To Your New Attribute</label>
                        <input type="text" class="form-control mb-2" name="attribute_value"
                               value="{{$edited->attribute_value}}">
                        <button type="submit" class="btn btn-primary w-100">Update Attribute</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
