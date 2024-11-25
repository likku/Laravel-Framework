<!DOCTYPE html>
<html>
<head>
    <title>Show Orders</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('api/orders') }}">Order Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('api/orders') }}">View All Orders</a></li>
        <li><a href="{{ URL::to('api/orders/create') }}">Create a Order</a>
    </ul>
</nav>

<h1>Showing Order</h1>

    <div class="jumbotron text-center">
        <p>
            <strong>Customer Id:</strong> {{ $order->cust_id }}<br>
            <strong>Address:</strong> {{ $order->address }}<br>
            <strong>City:</strong> {{ $order->city }}<br>
            <strong>Phn_no:</strong> {{ $order->phn_no }}<br>
            <strong>Items:</strong> {{ $order->items }}
        </p>
    </div>

</div>
</body>
</html>