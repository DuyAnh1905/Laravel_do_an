@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header">Cập nhập danh mục</div>
            <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card-body">
                @if(session('status'))
                <div class="alert alert-succes" role="alert">
                    {{session('status')}}
                </div>
                @endif
            </div>

            <form method="POST" action="{{route('categories.update',[$cate->id])}}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Tên danh mục</label>
                    <input type="text" name="title" value="{{$cate->title}}" class="form-control" onkeyup="ChangeToSlug()" id="slug"
                        aria-describeddy="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">slug danh mục</label>
                    <input type="text" name="slug" value="{{$cate->slug}}" class="form-control" id="convert_slug"
                        aria-describeddy="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Mô tả danh mục</label>
                    <input type="text" name="mota" value="{{$cate->mota}}" class="form-control" id="exampleInputEmail"
                        aria-describeddy="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Kích hoạt</label>
                    <select class="form-select" name="is_active" aria-label="Default select example">
                        @if($cate->is_active==0)
                        <option value="1" selected>Kích hoạt</option>
                        <option selected value="0">Không kích hoạt</option>
                        @else
                        <option selected value="1" selected>Kích hoạt</option>
                        <option value="0">Không kích hoạt</option>
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn btn-dark">Cập nhập</button>
            </form>
        </div>
    </div>
</div>
@endsection