@extends('homePage')
@section('title', 'giỏ hàng')

@section('content')
@if (Session::has('cart'))
<table>
    @php
    $price = 0;
    @endphp
    <tr>
        <th>Tên sản phẩm </th>
        <th>Giá </th>
        <th>Số lượng </th>
        <th></th>
    </tr>
    @foreach (Session::get('cart') as $item)
    <tr>
        <td>{{ $item['name'] }}</td>
        <td>{{ $item['price'] }} $</td>

        <td>
            <form>
                <input type="hidden" value="{{ $item['id'] }}" id="id">
                <input onchange="myFunction()" type="number" value="{{ $item['quantity'] }}" id="input">
            </form>
        </td>
        <td><a href="{{ route('del', $item['id']) }}">X</a></td>
    </tr>
    @php
    $price += ($item['quantity'] * $item['price'])
    @endphp

    @endforeach
    <tr>
        <th>Tổng tiền :</th>
        <td colspan="3" id="total">{{ $price }} $</td>
    </tr>
</table>
<a href="{{ route('home') }}" class="btn btn-primary back">Quay lại</a>
@else
<p>không có gì</p>
@endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function myFunction(){
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
      id: $('#id').val(),
      quantity:$('#input').val(),
      _token:'{{ csrf_token() }}'
    },
    success:function(data) {
      
      $("#input").text(data[0]);
      $('#total').text(data[1]);
      
    }
});
 
    
     
    }
</script>
@endsection