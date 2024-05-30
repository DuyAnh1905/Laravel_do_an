@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt kê hình ảnh</div>

                <div class="card-body">
                    @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{session('status')}}
                    </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Đường dẫn</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($image as $image)
                            <tr>
                                <td>{{ $image->id }}</td>
                                <td>{{ $image->image }}</td>
                                <td>{{ $image->description }}</td>
                                <td><img src="{{ $image->image }}" alt="image" style="width: 100px;"></td>
                                <td>
                                    <a href="{{route('image.edit',[$image->id])}}" class="btn btn-primary">Sửa</a>
                                    <form action="{{route('image.destroy',[$image->id])}}"  method="POST">
                                        @method("DELETE")
                                        @csrf
                                        <button class="btn btn-danger" onclick="return confirm('Bạn muốn xoá hình ảnh này?');" >Xoá</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
