@extends('homePage')


@section('content')
{{-- {{ Session::forget('cart') }} --}}


<div class="d-flex flex-wrap">
  @forelse ($product as $item)
  <div class="card" style="width: 18rem;" data-id={{$item->id}}>
    <img class="card-img-top" src="{{ $item->image }}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Tên sản phẩm : {{ $item->name }}</h5>
      <p class="card-text">Mô tả : {{ $item->description }}</p>
      <h5 class="card-title">Giá : {{ $item->price }} $</h5>
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