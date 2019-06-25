@extends('layouts.web')

@section('title')
	APS Proyecto-{{$proyecto->nombre_proyecto}}
@endsection

@section('title-banner')
	Proyectos
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
	      					<img class="d-block w-100 aps-carrousel-proy" src="../images/proyectos/{!!$foto->path_foto!!}" alt="{{$proyecto->nombre_proyecto}}">
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
				<h1>{{$proyecto->nombre_proyecto}}</h1>
				<hr>
				<h4>Ubicación del proyecto:</h4>
				{!! $proyecto->ubicacion!!}
				<hr>
				<h4>Fecha de terminación:</h4>
				{!! $proyecto->fecha_terminacion!!}
				<hr>
				<h4>Cliente:</h4>
				<img class="img-thumbnail img-fluid aps-proy-cliente"  src="../images/logos_clientes/{!!$cliente->logo!!}" alt="{{ $cliente->nombre_cliente}}">
				<br>
				{!! $cliente->nombre_cliente!!}
				<hr>
				<h4>Capacidad en lps:</h4>
				{!! $proyecto->capacidad!!}
				<hr>
				<h4>Descripción del proyecto:</h4>
				{!! $proyecto->descripcion!!}			
			</div>
				<div class="clearfix"></div>
		</div>
	</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Otros proyectos</h2>
		</div>
			
				@foreach($projects as $project)
					@foreach($fotosproy as $fotoproy)
							@if($fotoproy->id_proyecto==$project->id && $fotoproy->thumb==true )
								<?php $ruta = $fotoproy->path_foto; ?>
							@endif
						@endforeach

					<div class="col-md-4">
						<a href="{{ route('/proyecto', $project->id)}}"> <img class="img-thumbnail aps-fade" src="{!!asset('/images/proyectos/'.$ruta)!!}" alt="{{ $project->nombre_proyecto }}">
							<div class="aps-fade-middle">
								<div class="aps-fade-text">
									{{ $project->nombre_proyecto }}
								</div>
							</div>
						</a>
					</div>
				@endforeach
	
		<div class="clearfix"></div>
	<div class=" col-md-12">
					<div class="aps-pagination">
						{!!$projects->links()!!}
					</div>
					

				</div>		
	</div>		

				
</div>

</div>
@endsection