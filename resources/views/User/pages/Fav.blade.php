@extends('User.layouts.master')


@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">
                <i class="fas fa-heart text-danger"></i> {{ __(' Fav') }}
            </h2>

            @if($wishlist->count() > 0)
                <div class="row">
                    @foreach($wishlist as $book)
                    <div class="col-md-4 col-lg-3 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('images/books/' . $book->image) }}"
                                 class="card-img-top"
                                 alt="{{ $book->title }}"
                                 style="height: 250px; object-fit: contain;">

                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('product.single', $book->id) }}" class="text-decoration-none text-dark">
                                        {{ $book->title }}
                                    </a>
                                </h5>

                                <p class="card-text text-dark small">
                                    <i class="fas fa-user"></i> {{ $book->author }}
                                </p>

                                @if($book->category)
                                <p class="card-text">
                                    <small class="text-dark">
                                        <i class="fas fa-tag"></i> {{ $book->category->name }}
                                    </small>
                                </p>
                                @endif

                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="price text-primary fw-bold fs-5">
                                        JOD {{ number_format($book->price, 2) }}
                                    </span>

                                    @if($book->discount > 0)
                                    <span class="badge bg-success">
                                        {{ $book->discount }}% {{ __('خصم') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="card-footer bg-white border-top p-3">
                                <div class="d-flex gap-2">
                                    <!-- زر الإزالة من المفضلة -->
                                    <form action="{{ route('wishlist.remove', $book->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                                            <i class="fas fa-trash"></i> {{ __('إزالة') }}
                                        </button>
                                    </form>

                                    <!-- زر إضافة للسلة -->
                                    <form action="{{ route('cart.add', $book->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm w-100">
                                            <i class="fas fa-cart-plus"></i> {{ __('إضافة للسلة') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info text-center">
                    <i class="fas fa-heart-broken fa-3x mb-3 text-muted"></i>
                    <p class="mb-0">{{ __('قائمتك المفضلة فارغة!') }}</p>
                    <a href="{{ route('home') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-book"></i> {{ __('تصفح الكتب') }}
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection