@extends('layout')

@section('content')
		
	<ul>
	
	@foreach( $orders as $order )
		@foreach( $order->items() as $item )
			
		@endforeach
	@endforeach

	</ul>

@stop