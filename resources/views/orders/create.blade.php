<!DOCTYPE html>
<html>
<head>
    <title>Create Orders</title>
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

<h1>Create a Order</h1>

{{ Form::open(array('url' => 'orders')) }}

	 <div class="form-group">
        {{ Form::label('cust_id', 'Cust_id') }}
        {{ Form::text('cust_id', Input::old('cust_id'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('address', 'Address') }}
        {{ Form::text('address', Input::old('address'), array('class' => 'form-control')) }}
    </div>
	
	<div class="form-group">
        {{ Form::label('city', 'City') }}
        {{ Form::text('city', Input::old('city'), array('class' => 'form-control')) }}
    </div>
	
	<div class="form-group">
        {{ Form::label('phn_no', 'Phn_no') }}
        {{ Form::text('phn_no', Input::old('phn_no'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('items', 'Items') }}
        {{ Form::text('items', Input::old('items'), array('class' => 'form-control')) }}
    </div>
	
    {{ Form::submit('Create the Order!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>