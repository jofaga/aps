@extends('layouts.web')

@section('title')
	APS Servicios
@endsection

@section('title-banner')
	Servicios
@endsection

@section('seo')


@endsection

@section('content')
@include('layouts.navbar')


<div class="customers">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					@foreach($services as $service)
					<div class="col-md-3 aps-logos-customers">
						<img src="{{ 'images/servicios/'.$service->foto }}" alt="{{ $service->nombre }}" class="img-thumbnail img-fluid">
					</div>
					
					<div class="col-md-3 servicios aps-txt-servicios">
						<h2>{!!$service->nombre_servicio!!}</h2>
						{!! $service->descripcion_servicio!!}	
					</div>			
					@endforeach
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row justify-content-center">
			{!!$services->links()!!}
		</div>
		<br>	
	</div>
</div>
@endsection