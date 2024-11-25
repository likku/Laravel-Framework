<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
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

<h1>All the Orders</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Customer ID</td>
            <td>Address</td>
            <td>City</td>
            <td>Phone no.</td>
            <td>Items</td>
        </tr>
    </thead>
    <tbody>
    @foreach($orders as $key => $value)
        <tr>
            <td>{{ $value->cust_id }}</td>
            <td>{{ $value->address }}</td>
            <td>{{ $value->city }}</td>
            <td>{{ $value->phn_no }}</td>
            <td>{{ $value->items }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- show the order (uses the show method found at GET /orders/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('api/orders/' . $value->id) }}">Show this Order</a>

                <!-- edit this order (uses the edit method found at GET /orders/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('api/orders/' . $value->id . '/edit') }}">Edit this Order</a>
				 
            </td>
			<td>
			{{ Form::open(array('url' => 'api/orders/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this Order', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
			</td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>