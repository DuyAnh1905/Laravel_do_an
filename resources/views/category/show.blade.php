@extends('layouts.app')

@section('content')
@include('layouts.slide')

<div class="container px-4 px-lg-5 mt-5">
    <div class="text px-4 px-lg-5 mt-5">
        <h2>{{ $category->title }}</h2>
    </div>
    <section class="py-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content">
            @foreach($posts as $post)
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="/public/uploads/truyen/{{ $post->slide_url }}" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder"><b>Tên truyện: </b>{{ $post->title }}</h5>
                            <!-- Product details-->
                            <ul class="list-unstyled">
                                <li>Tên tác giả: <b>{{ $post->tatgia }}</b></li>
                                <!-- Nếu các thuộc tính khác của bài viết cần hiển thị, thêm vào đây -->
                            </ul>
                            <div class="text-center">
                                <a class="btn btn-outline-dark mt-auto" href="{{ route('product.show', ['product' => $post->id ]) }}">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>

@endsection
