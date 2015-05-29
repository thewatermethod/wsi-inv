@extends('layout')

@section('content')
		
	<ul>
	
	@foreach( $orders as $order )

		<li> {{ $order->getShippingName() }} - {{ $order->getGrandTotal() }} </li>

	@endforeach

	</ul>

@stop