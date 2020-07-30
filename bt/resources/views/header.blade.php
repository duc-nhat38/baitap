<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','trang chủ')</title>
    <script src="https://kit.fontawesome.com/284c8b8952.js" crossorigin="anonymous"></script>
    <style>
        body{
            position: relative;
        }
        .card {
            
            margin: 2% 1.8%;
        }
        #table-cart {
            width: 50%;
            margin: auto;
            text-align: center;
        }
        #table-cart img {
            width: 80px;
            height: 80px;
        }
        tr{
            border: 1px solid;
            margin: 2px
        }
        .back {
            margin-left: 60%;
        }
      .detail {
        margin: auto;
      }
      #icon-cart {
          font-size: 25px;
      }
      .cart-quanti {
          position: relative;
      }
      #quanti {
          position: absolute;
          top: 0;
          right: 0;
      }
    </style>
    
</head>
<body>