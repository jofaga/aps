<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ApsController@index')->name('/');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Site Routes
//Ruta de "Acerca"
Route::get('/acerca', 'ApsController@about')->name('/acerca');
//Ruta de "Productos"
Route::get('/productos', 'ApsController@products')->name('/productos');
//Ruta de "Proyectos"
Route::get('/proyectos', 'ApsController@projects')->name('/proyectos');
//Ruta de "Servicios"
Route::get('/servicios', 'ApsController@services')->name('/servicios');
//Ruta de "Contacto"
Route::get('/contacto', 'ApsController@contact')->name('/contacto');
//Ruta de "Laboratorio"
Route::get('/laboratorio', 'ApsController@laboratory')->name('/laboratorio');
//Ruta de "Clientes"
Route::get('/clientes', 'ApsController@customers')->name('/clientes');
//Ruta de "Crew"
Route::get('/equipo', 'ApsController@crew')->name('/equipo');
//Detalles a proyecto
Route::get('/proyecto/{id}', 'ApsController@project')->name('/proyecto');
//Detalles a producto
Route::get('/producto/{id}', 'ApsController@product')->name('/producto');

//Detalles a tipo de producto
Route::get('/productos/tipo/{id}', 'ApsController@producttype')->name('/productos/tipo');

//Ruta para envío de coreo de la forma de contacto
Route::post('/contacto', 'ApsController@mail')->name('/contacto');



Route::middleware(['auth'])->group(function(){
//Admin Routes
Route::get('/adminaps', 'ApsController@admin')->name('adminaps');
//Admin usuarios administración de página
Route::get('/adminusuarios', 'ApsController@usuarios')->name('adminusuarios');
//Rutas para administrar clientes
Route::resource('/adminclientes', 'ClientesController')->names([
	'index'=>'adminclientes']);
//Rutas para administrar fotos de los proyectos
Route::resource('/adminfotos', 'FotosController')->names([
	'index'=>'adminfotos']);
//Rutas para administrar fotos productos
Route::resource('/adminfotosproductos', 'Fotos_productosController')->names([
	'index'=>'adminfotosproductos']);
//Rutas para administrar fotos laboratori
Route::resource('/adminfotoslaboratorio', 'Fotos_laboratorioController')->names([
	'index'=>'adminfotoslaboratorio']);
//Rutas para administrar fotos servicios
// Route::resource('/adminfotosservicios', 'Fotos_serviciosController')->names([
// 	'index'=>'adminfotosservicios']);
//Rutas para administrar fotos crew
Route::resource('/adminfotoscrew', 'FotosCrewController')->names([
	'index'=>'adminfotoscrew']);
//Rutas para administrar Proyectos
Route::resource('/adminproyectos', 'ProyectosController')->names([
	'index'=>'adminproyectos']);
//Rutas para administrar tipo de proyectos
Route::resource('/admintipoproyectos', 'Tipo_proyectosController')->names([
	'index'=>'admintipoproyectos']);
//Rutas para administrar tipo de productos
Route::resource('/admintipoproductos', 'Tipo_productosController')->names([
	'index'=>'admintipoproductos']);
//Rutas para administrar subtipo productoctos
Route::resource('/adminsubtipoproductos', 'Subtipo_productosController')->names([
	'index'=>'adminsubtipoproductos']);
//Rutas para administrar productos
Route::resource('/adminproductos', 'ProductosController')->names([
	'index'=>'adminproductos']);
//Rutas para administrar tipo servicios
// Route::resource('/admintiposervicios', 'Tipo_serviciosController')->names([
// 	'index'=>'admintiposervicios']);
//Rutas para administrar servicios
Route::resource('/adminservicios', 'ServiciosController')->names([
	'index'=>'adminservicios']);
//Rutas para administrar tipo de servicios en laboratorio
// Route::resource('/admintiposervicioslaboratorio', 'Tipo_servicios_laboratorioController')->names([
// 	'index'=>'admintiposervicioslaboratorio']);
//Rutas para administrar servicios laboratorio
Route::resource('/adminservicioslaboratorio', 'ServicioslaboratorioController')->names([
	'index'=>'adminservicioslaboratorio']);
//Rutas para administrar datos entidades
Route::resource('/adminedificios', 'EdificiosController')->names([
	'index'=>'adminedificios']);
//Rutas para administrar textos páginas


//Ruta para administrar la página
Route::get('admin/pagina/{id?}', 'PaginaController@edit')->name('admin/pagina');
Route::patch('admin/pagina/{id?}', 'PaginaController@update')->name('admin/pagina');
//Rutas para administrar correos
Route::resource('/admincorreos', 'CorreosController')->names([
	'index'=>'admincorreos']);
//Rutas para administrar telefonos de los usuarios
Route::resource('/admintelefonos', 'TelefonosController')->names([
	'index'=>'admintelefonos']);
//Rutas para administrar usuario contactos
Route::resource('/adminusuarios', 'UsuariosController')->names([
	'index'=>'adminusuarios']);
//Ruta para guardar las fotos del proyecto
Route::post('admin/fotos/proyecto/{id}', 'FotosController@guardar');
//Ruta para mostrar fotos de proyecto
Route::get('admin/fotos/proyecto/{id}', 'FotosController@mostrar')->name('admin/fotos/proyecto');

//Ruta para guardar fotos
Route::post('admin/fotos/proyecto/{id}', 'FotosController@guardar');

//Rutas para administrar usuario contactos
Route::resource('/adminsocial', 'SocialController')->names([
	'index'=>'adminsocial']);

//Ruta para mostrar los datos del edificio en la sección de contacto
Route::get('admin/edificio/contacto/{id}', 'EdificiosController@contacto')->name('admin/edificio/contacto');
//Ruta para administrar los teléfonos de los edificios
Route::resource('admintelefonosedificios', 'TelefonosEdificiosController')->names([ 'index'=>'admintelefonosedificios']);

//Rutas para fotos de servicios
Route::get('admin/fotos/servicios/{id}', 'FotosServiciosController@mostrar')->name('admin/fotos/servicios');
Route::post('admin/fotos/servicios/{id}', 'FotosServiciosController@mguardar');

//Rutas para administrar fotos de productos
Route::get('admin/fotos/productos/{id}', 'Fotos_productosController@mostrar')->name('admin/fotos/productos');
Route::post('admin/fotos/productos/{id}', 'Fotos_productosController@guardar');

//Ruta para seleccionar imagen de producto para thumbanail
Route::get('admin/fotos/productos/{id}/thumb/{foto_id}','Fotos_productosController@thumb')->name('admin/fotos/productos/thumb');

//Rutas para administrar fotos de usuarios
Route::get('admin/fotos/usuarios/{id}', 'FotosCrewController@mostrar')->name('admin/fotos/usuarios');
Route::post('admin/fotos/usuarios/{id}', 'FotosCrewController@guardar');

//Rutas para administrar correos de usuarios
Route::get('admin/correos/usuarios/{id}', 'CorreosController@mostrar')->name('admin/correos/usuarios');
Route::post('admin/correos/usuarios/{id}', 'CorreosController@guardar');
//Ruta para seleccionar imagen de usuario en su tarjeta
Route::get('admin/fotos/usuarios/{id}/thumb/{foto_id}','FotosCrewController@thumb')->name('admin/fotos/usuarios/thumb');

//Rutas para administrar telefonos de usuarios
Route::get('admin/telefonos/usuarios/{id}', 'TelefonosController@mostrar')->name('admin/telefonos/usuarios');
Route::post('admin/telefonos/usuarios/{id}', 'TelefonosController@guardar');

//Ruta para administrar fotos de los proyectos
Route::resource('adminfotosproyecto','FotosProyectosController')->names([
'index'=>'adminfotosproyectos'
]);
//Ruta para seleccionar imagen de proyecto en su portada
Route::get('admin/fotos/proyectos/{id}/thumb/{foto_id}','FotosProyectosController@thumb')->name('admin/fotos/proyectos/thumb');
//Ruta para administrar las características de APS
Route::resource('admincaracteristicas','CaracteristicasController')->names([
'index'=>'admincaracteristicas'
]);
});