@extends('homePage')

@section('title', 'giỏ hàng')

@section('content')
<h3 style="text-align: center">Giỏ hàng của bạn !</h3>
<table id="table-cart">
    <tr>
        <th>Ảnh</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th></th>
    </tr>

    @if (Session::has('cart'))
    @php
    $price = 0;
    @endphp
    @forelse (Session::get('cart') as $item)
    <tr data-id="{{ $item['id'] }}">
        <td><img src="{{ $item['image'] }}" alt=""></td>
        <td>{{ $item['name'] }}</td>
        <td>{{ $item['price'] }} $</td>

        <td>
            <input onchange="myFunction(this)" type="number" value="{{ $item['quantity'] }}">
        </td>
        <td><button class="btn btn-link" onclick="myEvent(this)"><i class="fas fa-trash-alt"></i></button></td>
    </tr>
    @php
    $price += ($item['quantity'] * $item['price'])
    @endphp
    @empty
    <tr>
        <td colspan="5">Không có gì</td>
    </tr>
    @endforelse
    <tr>
        <th>Tổng tiền :</th>
        <td colspan="4" id="total">{{ $price }} $</td>
    </tr>
    @else
    <tr>
        <td colspan="5">Chưa có sản phẩm</td>
    </tr>
    @endif

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function myFunction(data){

    let id = data.closest('tr').dataset.id;
    
    let quantity = data.value;
    


$.ajaxSetup({
headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
type: "POST",
url: '{{ route("addCart") }}',
dataType: 'json',
data: {
  id:id,
  quantity:quantity,
  _token:'{{ csrf_token() }}'
},
success:function(data) {
  
let product = document.querySelector(`tr[data-id='${id}']`).children;
  
  $(product[4]).children().val(data[0]);

  $('#total').text(data[1]+' $');

}
});
}
function myEvent(data){

 let id = data.closest('tr').dataset.id;
 
 $.ajaxSetup({
 headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 $.ajax({
type: "POST",
url: '{{ route("del") }}',
dataType: 'json',
data: {
  id:id,
  _token:'{{ csrf_token() }}'
},
success:function(data) {
    document.querySelector(`tr[data-id='${id}']`).style.display='none';
    $('#total').text(data);
}
});
 
}
</script>

    @endsection
