@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="row">

        <div class="col-md-6">

            <!-- Product image-->
            <img class="card-img-top" src="/public/uploads/truyen/{{ $product->slide_url }}" alt="..." />

        </div>

        <div class="col-md-6">

            <h1>{{ $product->title }}</h1>

            <ul class="list-unstyled">
                <li><b>Tác Giả:</b> {{ $product->tatgia }}</li>
                <li><b>Tóm tắt:</b> {{ $product->content }}</li>
            </ul>

            <a class="btn btn-outline-dark mt-auto" href="{{ '/' }}">Quay lại</a>

        </div>

    </div>
    
    <div class="row mt-4">
        <div class="col-md-12">
            <ul class="list-unstyled">
                <li><b>Nội Dung:</b></li>
                @foreach($chapters as $chapter)
                    <li><a>{{ $chapter->tieude }}</a></li>
                    <li>{{ $chapter->noidung }}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-12 d-flex justify-content-center">
    <!-- Hiển thị nút phân trang -->
    <ul class="pagination">
        {{-- Nút trang trước --}}
        @if ($chapters->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">quay lại</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $chapters->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">quay lại </a>
            </li>
        @endif

        {{-- Số trang --}}
        @for ($i = 1; $i <= $chapters->lastPage(); $i++)
            <li class="page-item {{ ($chapters->currentPage() == $i) ? 'active' : '' }}">
                <a class="page-link" href="{{ $chapters->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        {{-- Nút trang sau --}}
        @if ($chapters->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $chapters->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Sang chap</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">Sang chap</span>
            </li>
        @endif
    </ul>
</div>

    </div>

</div>

@endsection
