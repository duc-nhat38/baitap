@extends('homePage')

@section('title', 'chi tiết')

@section('content')
<div class="card">
    <h5 class="card-header">Tên sản phẩm : {{ $product['name'] }}</h5>
    <div class="card-body">
      <p class="card-text">Mô tả : {{ $product['description'] }}</p>
      <h5 class="card-title">Giá : {{ $product['price'] }}</h5>
      <p class="card-text">View : {{ $product['view_count'] }}</p>
      <a href="/cart/{{ $product['id'] }}" class="btn btn-primary">Mua ngay</a>
    </div>
  </div>
  <a href="{{ route('home') }}" class="btn btn-primary back">Quay lại</a>
@endsection