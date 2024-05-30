@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt kê Chapter</div>

                <div class="card-body">
                    @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{session('status')}}
                    </div>
                    @endif
                    <!-- Thêm ô tìm kiếm -->
                    <div class="mb-3">
    <select id="selectTruyen" class="form-control">
        <option value="">Tất cả Chapter</option>
        @foreach($Post as $Posts)
            <option value="{{ $Posts->title }}">{{ $Posts->title }}</option>
        @endforeach
    </select>
</div>
<!-- Bảng hiển thị danh sách các truyện -->
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tiêu đề Chapter</th>
            <th scope="col">Slug Chapter</th>
            <th scope="col">Tóm tắt</th>
            <th scope="col">Thuộc truyện</th>
        </tr>
    </thead>
    <tbody id="searchResults">
        @php $count = 1 @endphp
        @foreach($Post as $post)
            @foreach($post->chapter as $chapter)
                <tr data-truyentitle="{{ $post->title }}">
                    <td>{{ $count++ }}</td>
                    <td>{{ $chapter->tieude}}</td>
                    <td>{{ $chapter->slug_chapter}}</td>
                    <td>{{ $chapter->tomtat}}</td>
                    <td>{{ $post->title}}</td>
                    <td>
                                    <a href="{{route('chapter.edit',[$chapter->id])}}" class="btn btn-primary">Sửa</a>
                                    <form action="{{route('chapter.destroy',[$chapter->id])}}"  method="POST">
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
<script>
// Xử lý tìm kiếm dựa trên lựa chọn từ dropdown
document.getElementById('selectTruyen').addEventListener('change', function() {
    var selectedTruyen = this.value.toLowerCase();
    var rows = document.getElementById('searchResults').getElementsByTagName('tr');
    var anySelected = false;
    for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName('td');
        var found = false;
        for (var j = 0; j < cells.length && !found; j++) {
            var cellText = cells[j].textContent.toLowerCase();
            if (cellText.indexOf(selectedTruyen) !== -1 || selectedTruyen === '') {
                found = true;
                anySelected = true;
            }
        }
        rows[i].style.display = found ? '' : 'none';
    }
    // Ẩn hoặc hiển thị bảng tùy thuộc vào việc có truyện nào được chọn hay không
    var table = document.querySelector('.table');
    table.style.display = anySelected ? 'table' : 'none';
});

</script>



                </div>
            </div>
        </div>
    </div>
</div>


@endsection
