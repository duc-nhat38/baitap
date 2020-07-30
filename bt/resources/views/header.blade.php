<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','trang chủ')</title>
    <script src="https://kit.fontawesome.com/284c8b8952.js" crossorigin="anonymous"></script>
    <style>
        body {
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

        tr {
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
            width: 20px;
            height: 20px;
            top: -10px;
            right: -10px;
            background-color: white;
            border-radius: 25px;
            color: red;
            text-align: center;
        }
    </style>

</head>

<body>