@extends('layouts.web')

@section('title')
	APS
@endsection

@section('title-banner')
	Staff
@endsection

@section('seo')


@endsection
@section('content')
@include('layouts.navbar')


<div class="customers">
	<div class="container">
		<div class="row justify-content-center">
			@foreach($members as $member)
				@foreach($fotos as $foto)
					@if($foto->id_usuario==$member->id && $foto->thumb==true )
						<?php $ruta = $foto->path_foto; ?>
					@endif
				@endforeach
				<div class="col-md-4 aps-logos-customers">
				<a href="#" data-toggle="modal" data-target="#{!!$member->nombre!!}" >
					<div class="aps-container-crew">
						<img src="{{ 'images/crew/'.$ruta }}" alt="{{ $member->nombre }}" class="img-thumbnail img-fluid aps-image-crew">
					</div>
					<div class="aps-txt-overlay">
    					<div class="aps-crew-text">{!!$member->nombre!!}</div>
  					</div>
				</a>
			</div>

				
			<div class="aps-modal-crew-txt">
				<div class="modal fade" id="{!!$member->nombre!!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLongTitle">Miembro: {!!$member->nombre!!}</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <div class="row">
					        	<div class="col-12 col-sm-12 col-md-6">
					        		<img src="{{ asset('images/crew/'.$ruta)}}" class="img-responsive mx-auto d-block aps-img-crew"   alt="Aqua Productos y Servicios">		
					        	</div>
					        	
					        {{-- </div>
					        <div class="row"> --}}
					        	<div class="col-12 col-sm-12 col-md-6">
					        		<div class="aps-data">
					        		<h5 class="oi oi-phone"> Teléfonos:</h5>
					        		
					        		@foreach($telefonos as $telefono)
					        			@if($member->id==$telefono->id_entus)
					        				{!! $telefono->telefono!!}|
					        			@endif
					        		@endforeach
					        		<br>
					        		</div>
					        		<div class="aps-data">
					        		<h5 class="oi oi-envelope-closed"> Correos:</h5>
					        		@foreach($correos as $correo)
					        			@if($member->id==$correo->id_entus)
					        				<a href="mailto:{!! $correo->correo!!}?subject=contacto" "Sitio APS">{!! $correo->correo!!}</a>
					        			@endif
					        		@endforeach
					        		<br>
					        		</div>
					        		<div class="aps-data">
					        	<h4 class="oi oi-person"> Cargo:</h4>{!!$member->cargo!!}
					        	</div>
					        	</div>
					      {{--   	<div class="col-12">
					        		
					        	</div> --}}
					        	<!-- <div class="col-12">
					        		<div class="aps-abstract">
					        			{!!$member->descripcion!!}
					        		</div>
					        	</div> -->
					        </div>
					        
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					      </div>
					    </div>
					  </div>
					</div>
				</div>






			@endforeach
		</div>
		<div class="clearfix"></div>
		<div class="row justify-content-center">
			{!!$members->links()!!}
		</div>
		
		<br>	
	</div>
</div>
@endsection