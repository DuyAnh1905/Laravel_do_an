@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header">Thêm truyện</div>
          
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

            <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Tên truyện</label>
                    <input type="text"  name="title" value="{{old('title')}}" class="form-control" onkeyup="ChangeToSlug()" id="slug"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                        <label for="exampleInputEmail" class="form-label">slug truyện</label>
                        <input type="text" name="slug_truyen" value="{{old('slug_truyen')}}" class="form-control"  id="convert_slug"
                         aria-describedby="emailHelp">
                    </div>
                
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">tóm tắt</label>
                    <textarea type="text" rows="5" style="resize: none;" name="content" value="{{old('content')}}" class="form-control" id="exampleInputEmail"
                        aria-describedby="emailHelp"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">thể loại</label>
                    <input type="text" name="theloai" value="{{old('theloai')}}" class="form-control" id="exampleInputEmail"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">tác giả</label>
                    <input type="text" name="tatgia" value="{{old('tatgia')}}" class="form-control" id="exampleInputEmail"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">NXB</label>
                    <input type="text" name="NXB" value="{{old('NXB')}}" class="form-control" id="exampleInputEmail"
                        aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">hình ảnh</label>
                    <input type="file" name="slide_url" class="form-control-file"
                        id="exampleInputEmail" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                        <label for="exampleInputEmail" class="form-label">Kích hoạt</label>
                        <select class="form-select" name="is_active" aria-label="Default select example">
                            <option value="1" selected>Kích hoạt</option>
                            <option value="0">Không kích hoạt</option>
                        </select>
                    </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Danh mục</label>
                    <select name="category_id" class="form-select" id="category">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>

                
                <button type="submit" class="btn btn-dark">Thêm</button>
            </form>
        </div>
    </div>
</div>
@endsection