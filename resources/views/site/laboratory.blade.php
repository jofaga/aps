@extends('layouts.web')

@section('title')
	APS Servicios
@endsection

@section('title-banner')
	Laboratorio
@endsection

@section('seo')


@endsection

@section('content')
@include('layouts.navbar')


<?php $sel=$fotos[mt_rand(0, count($fotos)-1)];?>




<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="aps-lab-carrousel">
				<div id="aps-carrousel" class="carousel slide" data-ride="carousel">
		  			<div class="carousel-inner">
						@foreach($fotos as $foto)
							<div class="carousel-item <?php if($foto->id==$sel->id){ echo('active');} ?>">
								<img class="d-block w-100 aps-carrousel-proy" src="{!! asset('/images/laboratorio/'.$foto->path_foto)!!}" alt="Laboratorio APS">
							</div>
						@endforeach
		  
		  			</div>
					  <a class="carousel-control-prev" href="#aps-carrousel" role="button" data-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#aps-carrousel" role="button" data-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
				</div>
			</div>
		</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-12 aps-txt-lab">
					{!! $info->textolaboratorio!!}
			</div>
			<div class="col-md-6 col-12 aps-txt-lab">
				<div class="txt-titulo">
					<h2>Servicios de Laboratorio</h2>
				</div>
				@foreach($servicioslab as $serviciolab)
					<h4>{!! $serviciolab->nombre_servicio_lab!!}</h4>
					{!! $serviciolab->descripcion_servicio_lab!!}
				@endforeach
			</div>
	</div>
</div>
@endsection