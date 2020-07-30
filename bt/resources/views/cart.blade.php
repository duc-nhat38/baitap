@extends('homePage')

@section('title', 'giỏ hàng')

@section('content')

<table>
    <tr>
        <th>Tên sản phẩm </th>
        <th>Giá </th>
        <th>Số lượng </th>
        <th></th>
    </tr>

    @if (Session::has('cart'))
    @php
    $price = 0;
    @endphp
    @foreach (Session::get('cart') as $item)
    <tr data-id="{{ $item['id'] }}">
        <td>{{ $item['name'] }}</td>
        <td>{{ $item['price'] }} $</td>

        <td>
            <input onchange="myFunction(this)" type="number" value="{{ $item['quantity'] }}">
        </td>
        <td><button class="btn btn-link" onclick="myEvent(this)">X</button></td>
    </tr>
    @php
    $price += ($item['quantity'] * $item['price'])
    @endphp

    @endforeach
    <tr>
        <th>Tổng tiền :</th>
        <td colspan="3" id="total">{{ $price }} $</td>
    </tr>
    @else
    <tr>
        <td>Chưa có sản phẩm</td>
    </tr>
    @endif
    <a href="{{ route('home') }}" class="btn btn-primary back">Quay lại</a>

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
      
      $(product[3]).children().val(data[0]);

      $('#total').text(data[1]);
 
    }
    });
}
    function myEvent(data){
     let product = data.closest('tr').children;
     let id = data.closest('tr').dataset.id;
     let quantity = 
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