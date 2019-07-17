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
</div>



<div class="flex-container">
  <div class="spinner">
    <p>
    
    <div class="cube1"></div>
    <div class="cube2"></div>
    Loading...
    </p>
  </div>
  <div class="flex-slide home">
    <div class="flex-title flex-title-home">Consultores</div>
    <div class="flex-about flex-about-home">
      <p>Click here to navigate to the home section of the website</p>
    </div>
  </div>
  <div class="flex-slide about">
    <div class="flex-title">Taller</div>
    <div class="flex-about">
      <p>Click here to navigate to the About section of the website</p>
    </div>
  </div>
  <div class="flex-slide work">
    <div class="flex-title">Laboratorio</div>
    <div class="flex-about">
      <p>Listing relevant snippets of work:</p>
    </div>
  </div>
  <div class="flex-slide contact">
    <div class="flex-title">Representaciones</div>
    <div class="flex-about">
      <p>Use the contact form below</p>
      </form>
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
	



<script>
(function(){
		$('.flex-container').waitForImages(function() {
			$('.spinner').fadeOut();
	}, $.noop, true);
	
	$(".flex-slide").each(function(){
		$(this).hover(function(){
			$(this).find('.flex-title').css({
				transform: 'rotate(0deg)',
				top: '10%'
			});
			$(this).find('.flex-about').css({
				opacity: '1'
			});
		}, function(){
			$(this).find('.flex-title').css({
				transform: 'rotate(90deg)',
				top: '15%'
			});
			$(this).find('.flex-about').css({
				opacity: '0'
			});
		})
	});
})();
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


@endsection