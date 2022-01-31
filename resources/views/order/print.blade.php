<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        span{
            font-size: 12px;
            font-family: "Helvetica Neue";
        }
        table{
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div align="center">
        <img src="https://i.pinimg.com/originals/97/f9/db/97f9db4aac2c75c3bf4374e4dd2bc52b.png" style="width: 50%">
    </div>
    <br>
    <div align="center">
        <span>{{ $setting->name }}</span><br>
        <span>{{ $setting->phone }}</span><br>
        <span>{{ $setting->address }}</span>
    </div>
    <hr style="border-style: dashed">
    <div>
        <table style="width: 100%">
            <?php
                $listcart = product_list($order->cart_id);
                $subtotal = 0; 
                $diskon = 0; 
            ?>
            @foreach($listcart as $row)
            <tr>
                <td>{{ $row->qty }} x Nasi goreng</td>
                <td align="right">@currency($row->price)</td>
            </tr>
            <?php 
                $subtotal += $row->price * $row->qty;
                $diskon += $row->discount * $row->qty;
            ?>
            @endforeach
            <?php
                $a = $subtotal - $diskon;
                $pajak = $a / $tax->value; 
                $jumlah = $a + $pajak;
            ?>
        </table>
    </div>
    <hr style="border-style: dashed">
    <div>
        <table style="width: 100%">
            <tr>
                <td>Subtotal :</td>
                <td align="right">@currency($subtotal)</td>
            </tr>
            <tr>
                <td>Diskon :</td>
                <td align="right">@currency($diskon)</td>
            </tr>
            <tr>
                <td>Pajak :</td>
                <td align="right">@currency($pajak)</td>
            </tr>
        </table>
    </div>
    <hr style="border-style: dashed">
    <div>
        <table style="width: 100%">
            <tr>
                <td>Total :</td>
                <td align="right">@currency($jumlah)</td>
            </tr>
        </table>
    <hr style="border-style: dashed">
    <br>
    <div align="center">
        <span>Terimas Kasih - Silahkan datang lagi!</span>
    </div>
</body>
</html>