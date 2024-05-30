@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt kê truyện <a href="{{ route('chapter.index') }}" class="btn btn-secondary">Sửa chap</a></div>

                <div class="card-body">
                    
                    @if(session('status'))
                    
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                        
                    </div>
                    
                    @endif
                    <table class="table">
                        
                        <thead>
                            <tr>
                                
                                <th scope="col">ID</th>
                                <th scope="col">Tên truyện</th>
                                <th scope="col">Slug truyện</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Thể Loại</th>
                                <th scope="col">Tác giả</th>
                                <th scope="col">NXB</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $count = 1 @endphp
                            @foreach($categories as $category)
                            @foreach($products->where('category_id', $category->id) as $product)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->slug_truyen }}</td>
                                <td>{{ $product->content }}</td>
                                <td>{{ $product->theloai }}</td>
                                <td>{{ $product->tatgia }}</td>
                                <td>{{ $product->NXB }}</td>
                                <td><img src="public/uploads/truyen/{{ $product->slide_url }}" alt="image" style="width: 100px;"></td>
                                <td>{{ $category->title }}</td>
                                <td>
                                    <a href="{{ route('product.edit', [$product->id]) }}" class="btn btn-primary">Sửa</a>
                                    <form action="{{ route('product.destroy', [$product->id]) }}" method="POST" style="display:inline;">
                                        @method("DELETE")
                                        @csrf
                                        <button class="btn btn-danger" onclick="return confirm('Bạn muốn xoá danh mục này?');">Xoá</button>
                                    </form>
                                    
                                </td>
                            </tr>
                            @endforeach
                            @endforeach
                            

                        </tbody>
                        
                    </table>
                    
                </div>
                
            </div>
            
        </div>
    </div>
</div>
@endsection
