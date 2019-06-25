@extends('layouts.web')

@section('title')
	APS Servicios
@endsection

@section('title-banner')
	Contacto
@endsection

@section('seo')


@endsection

@section('content')
@include('layouts.navbar')



<div class="container">
	<div class="aps-contact">
		<div class="row align-items-center aps-txt-cto">
					<div class="col-md-3">
						<span class="oi oi-location aps-icon-contact"></span>	
					</div>
					<div class="col-md-3">
						@foreach($edificios as $edificio)
	  						@if($edificio->contacto)
	  						<?php $mapa=$edificio->nombre; ?>
	    					<h5>{{ $edificio->calle}}</h5>
	    					<h5>{{ $edificio->colonia}},
	    					C.P. {{ $edificio->cp}}</h5>
	    					<h5>{{ $edificio->ciudad}},
	        					@foreach($estados as $estado)
	          						@if($edificio->estado==$estado->id)
	            					{{ $estado->nombre}}
	          						@endif
	        					@endforeach
	          
						        @foreach($paises as $pais)
							        @if($edificio->pais==$pais->id)
							          {{ $pais->nombre}}</h5>
							        @endif
						      	@endforeach
						      	<h5>{{ $edificio->horario}}</h5>
							  @endif
						@endforeach
					</div>
				<div class="col-md-3">
					<span class="oi oi-phone aps-icon-contact"></span>
				</div>
				<div class="col-md-3 aps-tels-cto">
				@foreach($edificios as $edificio)
	  				@if($edificio->contacto)
	      				@foreach($telefonos as $telefono)
		        			@if($edificio->id==$telefono->id_edificio)
		          				<h5>{{ $telefono->telefono}}</h5>
		        			@endif
	      				@endforeach

	  				@endif
				@endforeach
				</div>
			</div>
		</div>
		<hr>


	<div class="aps-contact">
		<div class="row align-items-center aps-txt-cto">

						<div class="col-md-12">
						@foreach($edificios as $edificio)
	  						@if($edificio->nombre=="Laboratorio APS 2000")
	    						<div class="txt-titulo">
	    							<h3>{{ $edificio->nombre}}</h3>
	    						</div>
	    					@endif
	    				@endforeach
	    				</div>

					<div class="col-md-3">
						<span class="oi oi-location aps-icon-contact"></span>	
					</div>
					<div class="col-md-3">
						@foreach($edificios as $edificio)
	  						@if($edificio->nombre=="Laboratorio APS 2000")
	    					<h5>{{ $edificio->calle}}</h5>
	    					<h5>{{ $edificio->colonia}},
	    					C.P. {{ $edificio->cp}}</h5>
	    					<h5>{{ $edificio->ciudad}},
	        					@foreach($estados as $estado)
	          						@if($edificio->estado==$estado->id)
	            					{{ $estado->nombre}}
	          						@endif
	        					@endforeach
	          
						        @foreach($paises as $pais)
							        @if($edificio->pais==$pais->id)
							          {{ $pais->nombre}}</h5>
							        @endif
						      	@endforeach
						      	<h5>{{ $edificio->horario}}</h5>
							  @endif
						@endforeach
					</div>
				<div class="col-md-3">
					<span class="oi oi-phone aps-icon-contact"></span>
				</div>
				<div class="col-md-3 aps-tels-cto">
				@foreach($edificios as $edificio)
	  				@if($edificio->nombre=="Laboratorio APS 2000")
	      				@foreach($telefonos as $telefono)
		        			@if($edificio->id==$telefono->id_edificio)
		          				<h5>{{ $telefono->telefono}}</h5>
		        			@endif
	      				@endforeach

	  				@endif
				@endforeach
				</div>
			</div>
		</div>







		<div class="row">
			<div class="col-md-12">
				{!!Form::open(['url'=>'/contacto', 'method'=>'POST'])!!}
					 @csrf
						<div class="form-group">
							<label for="nombre" class="bmd-label-floating"> <span class="oi oi-person"></span> Nombre:</label>
							<input type="text" class="form-control" id="nombre" name="nombre">
							<span class="bmd-help">Tu nombre no será compartido con nadie</span>
						</div>

						<div class="form-group">
						    <label for="email" class="bmd-label-floating"><span class="oi oi-envelope-closed"></span> Correo:</label>
						    <input type="email" class="form-control" id="email" name="email">
						    <span class="bmd-help">Tu correo no será compartido con nadie</span>
						</div>

						<div class="form-group">
							<label for="telefono" class="bmd-label-floating"> <span class="oi oi-phone"></span> Teléfono:</label>
							<input type="phone" class="form-control" id="telefono" name="telefono">
							<span class="bmd-help">Tu telefono no será compartido con nadie</span>
						</div>
						 <div class="form-group">
						    <label for="comentario" class="bmd-label-floating"><span class="oi oi-chat"></span> Comentarios:</label>
						    <textarea class="form-control" id="comentario" name="comentario" rows="3"></textarea>
						  </div>

						<div class="form-group">
							{!! Form::submit('Enviar', ['class' => 'btn btn-primary btn-raised', 'id'=>'aps-btn-submit']) !!}
							<button id='aps-btn-reset' type="reset" class="btn btn-default">Borrar</button>
						</div>
			</div>	
		</div>	
</div>

@if( $mapa=="Aqua Productos y Servicios SA de CV")
	<div class="aps-canvas">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.1783602230294!2d-103.40650548457197!3d20.662321405561297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428ae7fe5de374b%3A0xe8e6fbfcedb97702!2sAv.+Tepeyac+987%2C+Chapalita+Sur%2C+45046+Zapopan%2C+Jal.!5e0!3m2!1ses-419!2smx!4v1535120476682" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>

@elseif($mapa=="Laboratorio APS 2000")
	<div class="aps-canvas">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.1620493826763!2d-103.2725521853926!3d20.662985205540945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b3f90a08ada1%3A0xc5c57ee58fed2099!2sAv.+Malec%C3%B3n+205%2C+Tetl%C3%A1n%2C+44820+Guadalajara%2C+Jal.!5e0!3m2!1ses!2smx!4v1535359851444" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>

@elseif($mapa=="Obra Electromecanica")
	<div class="aps-canvas">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.5271172684656!2d-103.45419618539277!3d20.648123206039948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428abf865173f15%3A0x2b1d46e065636eae!2sCalle+Mango+1785%2C+Para%C3%ADsos+del+Colli%2C+45069+Zapopan%2C+Jal.!5e0!3m2!1ses!2smx!4v1535360230948" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
@endif

@endsection