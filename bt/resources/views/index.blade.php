@extends('homePage')


@section('content')
{{-- {{ Session::forget('cart') }} --}}

<a href="{{ route('allCart') }}" class="btn btn-primary back">Giỏ hàng</a>

<div id="contennt">
  @forelse ($product as $item)
  <div class="card">
    
    <h5 class="card-header">Tên sản phẩm : {{ $item->name }}</h5>
    <div class="card-body"  data-id={{$item->id}}>
      
      <p class="card-text">Mô tả : {{ $item->description }}</p>
      <h5 class="card-title">Giá : {{ $item->price }}</h5>
      <p class="card-text">View : {{ $item->view_count }}</p>
      <a href="{{route('cart', $item->id) }}" class="btn btn-primary">Mua ngay</a>
      <a href="{{route('show', $item->id) }}" class="btn btn-primary">Xem chi tiết</a>
    </div>
  </div><br>
  @empty
  <div class="card">
    <p>Không có sản phẩm nào .</p>
  </div>
  @endforelse
</div>

@endsection