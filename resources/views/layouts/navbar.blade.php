<!-- Rescatar la Ruta actual -->
	<?php
		$actual= Route::currentRouteName();
	?>
<!-- Navbar -->
<div class="header-aps">
	<div class="aps-dot">
		<nav class="navbar navbar-expand-lg navbar-dark nav-aps">
		  <a class="navbar-brand" href="/">
		  <img src="{{asset('images/site/logo_2.png')}}" width="75" height="75" alt="Auqua Productos y Servicios">
		  </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    	<ul class="nav nav-tabs">
				  <li class="nav-item">
				     <a class="nav-item nav-link<?php if ($actual=='/') {echo(" active");}?>" href="{{ route('/')}}">Inicio</a>
				  </li>
				  <li class="nav-item">
				     <a class="nav-item nav-link<?php if ($actual=='/acerca') {echo(" active");}?>" href="{{ route('/acerca')}}">Acerca</a>
				  </li>
				  <li class="nav-item">
				     <a class="nav-item nav-link<?php if ($actual=='/equipo') {echo(" active");}?>" href="{{ route('/equipo')}}">Staff</a>
				  </li>
				  <li class="nav-item">
				   	<a class="nav-item nav-link<?php if ($actual=='/clientes') {echo(" active");}?>" href="{{ route('/clientes')}}">Clientes</a>	
				  </li>
				  <li class="nav-item">
				    <a class="nav-item nav-link<?php if ($actual=='/servicios') {echo(" active");}?>" href="{{ route('/servicios')}}">Servicios</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-item nav-link<?php if ($actual=='/proyectos') {echo(" active");}?>" href="{{ route('/proyectos')}}">Proyectos</a>
				  </li>
				  <li class="nav-item">
		      		<a class="nav-item nav-link<?php if ($actual=='/productos') {echo(" active");}?>" href="{{ route('/productos')}}">Productos</a>
		     	</li> 
		    	<li class="nav-item">
		      		<a class="nav-item nav-link<?php if ($actual=='/laboratorio') {echo(" active");}?>" href="{{ route('/laboratorio')}}">Laboratorio</a>
				</li>
				<li class="nav-item">
		      		<a class="nav-item nav-link<?php if ($actual=='/contacto') {echo(" active");}?>" href="{{ route('/contacto')}}">Contacto</a>
		    	</li>
		    	<li class="nav-item">
		      		<a class="nav-item nav-link" href="http://www.brizzionunezabogados.com/" target="_blank">BNA</a>
		    	</li>
				</ul>
		  </div>
		</nav>
		<h2>@yield('title-banner')</h2>
		<div class="clearfix"></div>
	</div>
</div>
