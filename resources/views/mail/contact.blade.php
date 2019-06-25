<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Mail de Contacto</title>
	<link rel="stylesheet" href="">


<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

</head>
<body>
<h1>Contacto del Sitio WEB de Aqua Productos y Servicios *APS*</h1>
<table>
  <tr>
    <td>Nombre</td>
    <td>{{ $data->nombre }}</td>
  </tr>
  <tr>
    <td>Correo</td>
    <td>{{ $data->email }}</td>
  </tr>
  <tr>
    <td>Teléfono</td>
    <td>{{ $data->telefono }}</td>
  </tr>
  <tr>
    <td>Mensaje</td>
    <td>{{ $data->comentario }}</td>
  </tr>
</table>




</body>
</html>