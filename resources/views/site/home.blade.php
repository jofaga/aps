@extends('layouts.web')

@section('title')
	APS
@endsection


@section('seo')

@endsection

@section('content')

<!--navbar home -->	
<!--APS home -->	


<div class="video-aps">
			<div class="video-container">
				<div class="color-overlay">
					<video autobuffer autoloop loop muted autoplay>
					<source src="{!! asset('videos/Water - 6570.mp4')!!}">
					</video>		
				</div>
			</div>

			<div class="aps">
				<div class="row align-items-center">
				<div class="col-lg-12 col-sm-12">
				<img class="img-responsive aps-home-txt" src="{!! asset('images/site/APS_S2.gif')!!}" alt="Aqua Productos y Servicios">			
				</div>
				</div>			
			</div>		
	
		
<!--links home -->		
<div class="row">
	<div class="col-md-12">
	<div class="navbar-home">
				<div class="row align-items-center">
					<div class="col-lg-12 col-12">
						<a href="{{ route('/equipo')}}">Staff</a>
					</div>
				</div>
				<div class="row justify-content-around">
					<div class="col-lg-4  col-6">
						<a href="{{ route('/acerca')}}">Acerca</a>
					</div>
					<div class="col-lg-4 col-6">
						<a href="{{ route('/proyectos')}}">Proyectos</a>
					</div>
				</div>
				<div class="row align-items-center">
					<div class="col-lg-4 col-4">
						<a href="{{ route('/productos')}}">Productos</a>
					</div>
					<div class="col-lg-4 col-4">
						<img class="img-responsive drop" src="{!! asset('images/site/drop.png')!!}" alt="Aqua Productos y Servicios">	
					</div>	
					<div class="col-lg-4 col-4">
						<a href="{{ route('/laboratorio')}}">Laboratorio</a>
					</div>
				</div>
				<div class="row justify-content-around">
					<div class="col-lg-4 col-6">
						<a href="{{ route('/servicios')}}">Servicios</a>
					</div>
					<div class="col-lg-4 col-6">
						<a href="{{ route('/contacto')}}">Contacto</a>
					</div>
				</div>
				<div class="row align-items-center">
					<div class="col-lg-12 col-12">
						<a href="{{ route('/clientes')}}">Clientes</a>
					</div>
				</div>
			</div>
	</div>
</div>
	
	
</div>	
<!--Slogan -->
<div class="container-fluid">
	<div class="row">
		<div class="slogan-img">
		<div class="col-md-12">
			
				<div class=" col-lg-12 slogan">	
					<p>{!! $info->slogan !!}</p>
				</div>		
		</div>	
		</div>
	</div>
</div>
<!--links (Consultores, Taller, Laboratorio, Representaciones y Medio ambiente ) -->	

<div class="container-fluid links-background">
		<div class="row justify-content-center">
			<!-- Enlace 1 consultores-->
			<div class="col-md-2 col-12">
				<div class="links">
					<img  class="links-image img-responsive" src="{!! asset('images/site/consultores.jpg')!!}">
					<div class="links-middle">
						<a class="links-text" target="_blank" href="http://consultores.aquaproductos.com/">Consultores</a>					
					</div>
				</div>			
			</div>
			<!-- Enlace 2 taller-->
			<div class="col-md-2 col-12">
				<div class="links">
					<img  class=" links links-image img-responsive" src="{!! asset('images/site/taller.jpg')!!}">
					<div class="links-middle">
						<a class="links-text links-res" target="_blank" href="http://taller.aquaproductos.com/">Taller</a>						
					</div>
				</div>
			</div>
			<!-- Enlace 3 Laboratorio-->
			<div class="col-md-2 col-12">
				<div class="links">
					<img  class=" links links-image img-responsive" src="{!! asset('images/site/laboratorio.jpg')!!}">
					<div class="links-middle">
						<a class="links-text" target="_blank" href="http://laboratorio.aquaproductos.com/">Laboratorio</a>					
					</div>
				</div>
			</div>
			<!-- Enlace 4 representaciones-->
			<div class="col-md-2 col-12">
				<div class="links">
					<img  class=" links links-image img-responsive" src="{!! asset('images/site/representaciones.jpg')!!}">
					<div class="links-middle">
						<a class="links-text" target="_blank" href="http://www.aquaproductos.com/repre/">Representaciones</a>					
					</div>
				</div>
			</div>

			<!-- Enlace 5 medio ambiente-->
			<div class="col-md-2 col-12">
				<div class="links">
					<img  class=" links links-image img-responsive" src="{!! asset('images/site/medio ambiente.jpg')!!}">
					<div class="links-middle">
						<a class="links-text" target="_blank" href="http://medioambiente.aquaproductos.com/">Medio</a>					
					</div>
				</div>
			</div>
		</div>

<!--links responsivos-->
<div class="aps-responsive-links">
		<div class="row justify-content-center">
		<p>
		  <a class="btn btn-primary aps-ext-links" data-toggle="collapse" href="#aps-external-links" role="button" aria-expanded="false" aria-controls="aps-external-links">
		    <span class="oi oi-external-link"></span> Sitios Externos de APS
		  </a>
		</p>
		</div>
		<div class="collapse" id="aps-external-links">
		  <div class="card card-body">
		    <a href="http://consultores.aquaproductos.com/" target="_blank" ><span class="oi oi-monitor"></span> Consultores</a>
		    <a href="http://taller.aquaproductos.com/" target="_blank" ><span class="oi oi-wrench"></span> Taller</a>
		    <a href="http://laboratorio.aquaproductos.com/" target="_blank" ><span class="oi oi-beaker"></span> Laboratorio</a>
		    <a href="http://www.aquaproductos.com/repre/" target="_blank" ><span class="oi oi-people"></span> Representaciones</a>
		    <a href="http://medioambiente.aquaproductos.com/" target="_blank" ><span class="oi oi-globe"></span> Medio Ambiente</a>
		  </div>
		</div>
</div>
	
</div>





@endsection