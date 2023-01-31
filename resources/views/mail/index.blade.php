{{-- @foreach ($order->getDetailOrders as $item )
    <h1>{{ $item->getProduct->name}}</h1>
@endforeach --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr >
            <td>Tên sản phẩm </td>
            <td>Giá sản phẩm </td>
            <td>Số lượng </td>
            <td>Kích Thước</td>
            <td>Total price</td>
        </tr>
        @foreach ($order->getDetailOrders as $item )
        <tr >
            <td>{{ $item->getProduct->name}} </td>
            <td>{{ $item->getProduct->price}} </td>
            <td>{{ $item->quantity}} </td>
            <td>{{ $item->getSize->name}} </td>
            <td>{{ $item->quantity*$item->getProduct->price }}</td>
        </tr>
        @endforeach 
    </table>
</body>
</html>