@extends('homePage')

@section('title', 'chi tiết')

@section('content')
<div class="card detail" style="width: 18rem;">
  <img class="card-img-top" src="{{ $product['image'] }}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Tên sản phẩm : {{ $product['name'] }}</h5>
    <p class="card-text">Mô tả : {{ $product['description'] }}</p>
    <h5 class="card-title">Giá : {{ $product['price'] }} $</h5>
    <p class="card-text">View : {{ $product['view_count'] }}</p>
    <a href="{{route('cart', $product['id']) }}" class="btn btn-primary">Mua ngay</a>
    <a href="{{ route('home') }}" class="btn btn-primary">Quay lại</a>
  </div>
</div>

@endsection

