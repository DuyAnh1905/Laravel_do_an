@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhập truyện</div>

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
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('product.update', [$product->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Tên truyện</label>
                            <input type="text" name="title" value="{{ $product->title }}" class="form-control" onkeyup="ChangeToSlug()" id="slug" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="slug_truyen" class="form-label">Slug truyện</label>
                            <input type="text" name="slug_truyen" value="{{ $product->slug_truyen }}" class="form-control" id="convert_slug" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Tóm tắt</label>
                            <textarea name="content" rows="5" class="form-control" id="content" style="resize: none">{{ $product->content }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="theloai" class="form-label">Thể Loại</label>
                            <input type="text" name="theloai" value="{{ $product->theloai }}" class="form-control" id="theloai" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="tatgia" class="form-label">Tác giả</label>
                            <input type="text" name="tatgia" value="{{ $product->tatgia }}" class="form-control" id="tatgia" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="slide_url" class="form-label">Hình ảnh</label>
                            <input type="file" name="slide_url" class="form-control-file" id="slide_url" aria-describedby="emailHelp">
                        </div>
                        <img src="{{ asset('public/uploads/truyen/' . $product->slide_url) }}" alt="image" style="width: 300px;">
                        <div class="mb-3">
                            <label for="NXB" class="form-label">NXB</label>
                            <input type="text" name="NXB" value="{{ $product->NXB }}" class="form-control" id="NXB" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="is_active" class="form-label">Kích hoạt</label>
                            <select class="form-select" name="is_active" id="is_active">
                                <option value="1" {{ $product->is_active == 1 ? 'selected' : '' }}>Kích hoạt</option>
                                <option value="0" {{ $product->is_active == 0 ? 'selected' : '' }}>Không kích hoạt</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Danh mục</label>
                            <select name="category_id" class="form-select" id="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-dark">Cập nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
