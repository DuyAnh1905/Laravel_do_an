@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header">Thêm chapter</div>
          
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
                <div class="alert alert-success" role="alert">
                    {{session('status')}}
                </div>
                @endif
            </div>

            <form method="POST" action="{{route('chapter.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Tiêu đê chapter</label>
                    <input type="text"  name="tieude" value="{{old('tieude')}}" class="form-control" onkeyup="ChangeToSlug()" id="slug"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                        <label for="exampleInputEmail" class="form-label">slug chapter</label>
                        <input type="text" name="slug_chapter" value="{{old('slug_chapter')}}" class="form-control"  id="convert_slug"
                         aria-describedby="emailHelp">
                    </div>
                
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">tóm tắt</label>
                    <textarea type="text" rows="5" style="resize: none;" name="tomtat" value="{{old('tomtat')}}" class="form-control" id="exampleInputEmail"
                        aria-describedby="emailHelp"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">nội dung</label>
                    <textarea type="text" rows="5" style="resize: none;" name="noidung" value="{{old('noidung')}}" class="form-control" id="exampleInputEmail"
                        aria-describedby="emailHelp"></textarea>
                </div>
              
                

                
                <div class="mb-3">
                        <label for="exampleInputEmail" class="form-label">Kích hoạt</label>
                        <select class="form-select" name="is_active" aria-label="Default select example">
                            <option value="1" selected>Kích hoạt</option>
                            <option value="0">Không kích hoạt</option>
                        </select>
                    </div>
                <div class="mb-3">
                    <label for="post" class="form-label">thuộc truyện</label>
                    <select name="truyen_id" class="form-select" id="post">
                        @foreach($posts as $post)
                        <option value="{{ $post->id }}">{{ $post->title }}</option>
                        @endforeach
                    </select>
                </div>

                
                <button type="submit" class="btn btn-dark">Thêm</button>
            </form>
        </div>
    </div>
</div>
@endsection