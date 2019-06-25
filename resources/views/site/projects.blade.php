@extends('layouts.web')

@section('title')
	APS Proyectos
@endsection

@section('title-banner')
	Proyectos
@endsection

@section('seo')


@endsection

@section('content')
@include('layouts.navbar')


<div class="projects">
	<div class="container">
		<div class="row">
			
				@foreach($projects as $project)
					     <ul>
							<li>
								<a href="{{ route('/proyecto', $project->id)}}"> 
						      		<h5>{!!$project->nombre_proyecto!!}</h5>
						      	</a>
					      	</li>
						</ul>
					    
			
				@endforeach
		</div>
	</div>			
</div>
@endsection