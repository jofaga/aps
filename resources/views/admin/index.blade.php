@extends('layouts.admin')

@section ('content')
<div class="container text-center">
	<div class="admin">
	<h1>Panel de Administración sitio Aqua Productos y Servicios</h1>
	</div>


	<div class="mt-4">
		<div class="row">
			<div class="col-md-4 col-sm-6">
				<a href="admintipoproyectos">
					<img class="krieg-transform-image" src="images/tipoproyectos.png">
				</a>
				<p class="font-admin">Tipos de proyectos</p>
			</div>
			<div class="col-md-4 col-sm-6">
				<a href="adminclientes">
					<img class="krieg-transform-image" src="images/clientes.png">
				</a>
				<p class="font-admin">Clientes</p>	
			</div>
			<div class="col-md-4 col-sm-6">
				<a href="adminproyectos">
					<img class="krieg-transform-image" src="images/proyectos.png">
				</a>
				<p class="font-admin">Proyectos</p>
			</div>
			<div class="col-md-4 col-sm-6">
				<a href="admin/pagina">
					<img class="krieg-transform-image" src="images/pagina.png">
				</a>
				<p class="font-admin">Contenidos de página</p>
			</div>
			<div class="col-md-4 col-sm-6">
				<a href="adminusuarios">
					<img class="krieg-transform-image" src="images/usuarios.png">
				</a>
				<p class="font-admin">Equipo APS</p>
			</div>
			
			<div class="col-md-4 col-sm-6">
				<a href="adminedificios">
					<img class="krieg-transform-image" src="images/datosentidades.png">
				</a>
				<p class="font-admin">Edificios</p>
			</div>
			<div class="col-md-4 col-sm-6">
				<a href="adminfotoslaboratorio">
					<img class="krieg-transform-image" src="images/pictures.png">
				</a>
				<p class="font-admin">Fotos Laboratorio</p>
			</div>
			<div class="col-md-4 col-sm-6">
				<a href="adminproductos">
					<img class="krieg-transform-image" src="images/productos.png">
				</a>
				<p class="font-admin">Productos</p>
			</div>
			<div class="col-md-4 col-sm-6">
				<a href="admintipoproductos">
					<img class="krieg-transform-image" src="images/tipoproductos.png">
				</a>
				<p class="font-admin">Tipo de productos</p>
			</div>
			<div class="col-md-4 col-sm-6">
				<a href="adminservicios">
					<img class="krieg-transform-image" src="images/servicios.png">
				</a>
				<p class="font-admin">Servicios</p>
			</div>
			
			<div class="col-md-4 col-sm-6">
				<a href="adminservicioslaboratorio">
					<img class="krieg-transform-image" src="images/servicioslaboratorio.png">
				</a>
				<p class="font-admin">Servicios Laboratorio</p>
			</div>
			<div class="col-md-4 col-sm-6">
				<a href="adminsocial">
					<img class="krieg-transform-image" src="images/social.png">
				</a>
				<p class="font-admin">Redes Sociales</p>
			</div>
			<div class="col-md-4 col-sm-6">
				<a href="admincaracteristicas">
					<img class="krieg-transform-image" src="images/caracteristicas.png">
				</a>
				<p class="font-admin">Características APS</p>
			</div>
		</div>
	</div>
</div>
@stop