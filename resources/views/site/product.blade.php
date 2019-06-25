@extends('layouts.web')

@section('title')
	APS Servicios
@endsection

@section('title-banner')
	Producto: {{ $producto->nombre_producto}}
@endsection

@section('seo')


@endsection


@section('content')
@include('layouts.navbar')

<div class="proyecto">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	  				<div class="carousel-inner">
	  					@foreach($fotos as $foto)
	  						<div class="carousel-item <?php if($foto->thumb==true){ echo('active');} ?>">
	      					<img class="d-block w-100 aps-carrousel-proy" src="../images/productos/{!!$foto->path_foto!!}" alt="{{$producto->nombre_producto}}">
	    					</div>
	    				@endforeach
	  
	  				</div>
				  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
			</div>
			</div>
			<br>
			<div class="row">
			<div class="col-md-12">
				<h1>{{$producto->nombre_producto}}</h1>
				<hr>
				<h4>Descripción:</h4>
				{!! $producto->descripcion_producto!!}
			</div>
				<div class="clearfix"></div>
		</div>
	</div>				
</div>
@endsection