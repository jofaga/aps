@extends('layouts.web')

@section('title')
	APS Servicios
@endsection

@section('title-banner')
	Productos
@endsection

@section('seo')


@endsection

@section('content')
@include('layouts.navbar')

<div>
	<div class="container">

<div class="row justify-content-center">
	<div class="col-12 aps-filtro-tipos">
		<h2>{{ $current }}</h2>
	</div>
</div>

		<div class="row justify-content-center">						
			<div class="col-12 aps-boton-tipo">
				<div class="btn-group pull-xs-right">
				  <button class="btn dropdown-toggle" type="button" id="buttonMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Tipo de producto
				  </button>
				  <div class="dropdown-menu" aria-labelledby="buttonMenu1">
				    <a class="dropdown-item" href="{{ route('/productos')}}">Todos</a>
				    @foreach($tipos as $tipo)
				    	<a class="dropdown-item" href="{{ route('/productos/tipo',$tipo->id)}}">{{$tipo->tipo_producto}}</a>
				  
				    @endforeach
				  </div>
				</div>
			</div>



		<div class="row justify-content-center">
			

			@foreach($productos as $producto)
				@foreach($producto->fotos_prod as $foto)
					@if ($foto->thumb==true)
					   	<?php $thumb = $foto->path_foto	?>
					 @endif
				@endforeach

				<div class="col-md-4 aps-logos-customers">
					<div class="card-deck">
					  <div class="card text-white bg-dark mb-3">
					   <a href="{{ route('/producto',$producto->id )}} "> 
					   	<img class="card-img-top" src="{{ asset('images/productos/'.$thumb)}}" alt="{{ $producto->nombre_producto }}">
					    <div class="card-body">
					      <h5 class="card-title">{{ $producto->nombre_producto }}</h5></a>
					    </div>
					  </div>
					</div>




				</div>

			@endforeach
		</div>
		<div class="clearfix"></div>
		<div class="row justify-content-center">
			{!!$productos->links()!!}
		</div>
		<br>	
	</div>
</div>
@endsection