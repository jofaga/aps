@extends('layouts.web')

@section('title')
	APS
@endsection

@section('title-banner')
	Clientes
@endsection

@section('seo')


@endsection


@section('content')
@include('layouts.navbar')

<div class="customers">
	<div class="container">
		<div class="row">
			@foreach($customers as $customer)
			<div class="col-md-4 aps-logos-customers rotate-hor-center">
				<img src="{{ 'images/logos_clientes/'.$customer->logo }}" alt="{{ $customer->nombre_cliente }}" class="img-thumbnail img-fluid">
			</div>
			@endforeach
		</div>
		<div class="clearfix"></div>
		<div class="row justify-content-center">
			
		</div>
		
		<br>	
	</div>
</div>
@endsection