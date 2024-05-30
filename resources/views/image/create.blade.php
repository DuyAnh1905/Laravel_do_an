@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
  
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Thêm hình ảnh</div>
            

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="card-body">
                <form method="POST" action="{{ route('image.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="image" class="form-label">Đường dẫn hình ảnh</label>
                        <input type="text" name="image" value="{{ old('image') }}" class="form-control" id="image" aria-describedby="imageHelp">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <input type="text" name="description" value="{{ old('description') }}" class="form-control" id="description" aria-describedby="descriptionHelp">
                    </div>
                    <div class="mb-3">
                    <label for="post" class="form-label">Danh mục</label>
                    <select name="post_id" class="form-select" id="post">
                        @foreach($posts as $post)
                        <option value="{{ $post->id }}">{{ $post->title }}</option>
                        @endforeach
                    </select>
                </div>
                    <!-- Add any other fields you want to create -->

                    <button type="submit" class="btn btn-dark">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
