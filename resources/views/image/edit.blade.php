@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header">Cập nhật hình ảnh</div>

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
                <form method="POST" action="{{ route('image.update', $image->id) }}">
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                        <label for="image" class="form-label">Đường dẫn hình ảnh</label>
                        <input type="text" name="image" value="{{ $image->image }}" class="form-control" id="image">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <input type="text" name="description" value="{{ $image->description }}" class="form-control" id="description">
                    </div>

                    <div class="mb-3">
                        <label for="post_id" class="form-label">Bài viết</label>
                        <select name="post_id" class="form-select" id="post_id">
                            @foreach($posts as $post)
                            <option value="{{ $post->id }}" @if($post->id == $image->post_id) selected @endif>{{ $post->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-dark">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
