@extends('layouts.web')

@section('title')
	APS
@endsection

@section('title-banner')
	Empresa
@endsection

@section('seo')


@endsection


@section('content')
@include('layouts.navbar')
<div class="about">
<div class="container">
	
		<div class="row justify-content-around">
			

				@foreach($caracteristicas as $caracteristica)
				<div class="col-md-3">
					<div>
						
					
					<div class="esfera">
						<div class="links-about">
							<a href="#" data-toggle="modal" data-target="#{!!$caracteristica->nombre!!}">
							<div class="linkcenter">
								{!! $caracteristica->nombre !!}
								<img src="{{ asset('images/site/drop.png')}}" class="img-responsive img-esfera"   alt="">
							</div>
						</div>	
						</a>
					</div>
					</div>
				</div>

				<div class="modal fade" id="{!!$caracteristica->nombre!!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  					<div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title aps-modal-about" id="exampleModalLongTitle">{!!$caracteristica->nombre!!}</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body aps-modal-about">
					        {!!$caracteristica->contenido!!}
					        <div class="row">
					        	<div class="col-12">
					        		<img src="{{ asset('images/site/logo_2.png')}}" class="img-responsive mx-auto d-block"   alt="Aqua Productos y Servicios">		
					        	</div>
					        </div>
					        
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerar</button>
					      </div>
					    </div>
					  </div>
					</div>
			@endforeach	

		</div>
		<div class="row justify-content-center">
		{!!$caracteristicas->links()!!}
		</div>
	</div>
</div>


@endsection

@section('js')
<script>
	$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
@endsection