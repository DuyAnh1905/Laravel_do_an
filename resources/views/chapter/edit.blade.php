@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập chapter</div>

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

                    <form method="POST" action="{{ route('chapter.update', [$chapter->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Tiêu đề chapter</label>
                            <input type="text" name="tieude" value="{{ $chapter->tieude }}" class="form-control" onkeyup="ChangeToSlug()" id="slug" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="slug_truyen" class="form-label">Slug chapter</label>
                            <input type="text" name="slug_chapter" value="{{ $chapter->slug_chapter }}" class="form-control" id="convert_slug" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Tóm tắt chapter</label>
                            <textarea name="tomtat" rows="5" class="form-control" id="content" style="resize: none">{{ $chapter->tomtat }}</textarea>
                        </div>
                     
                        <div class="mb-3">
                            <label for="content" class="form-label">Nội dung chapter</label>
                            <textarea name="noidung" rows="5" class="form-control" id="content" style="resize: none">{{ $chapter->noidung }}</textarea>
                        </div>
                       
                        <div class="mb-3">
                            <label for="is_active" class="form-label">Kích hoạt</label>
                            <select class="form-select" name="is_active" id="is_active">
                                <option value="1" {{ $chapter->is_active == 1 ? 'selected' : '' }}>Kích hoạt</option>
                                <option value="0" {{ $chapter->is_active == 0 ? 'selected' : '' }}>Không kích hoạt</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="truyen_id" class="form-label">Danh mục</label>
                            <select name="truyen_id" class="form-select" id="truyen_id">
                                @foreach($posts as $post)
                                    <option value="{{ $post->id }}" {{ $post->id == $chapter->truyen_id ? 'selected' : '' }}>{{ $post->title }}</option>
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
