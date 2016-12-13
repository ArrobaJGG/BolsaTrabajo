<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Editar Perfil</title>
	<link rel="stylesheet" href="">
</head>
<body>
Nombre: <input type="text" name="nombre" value="">
Apellido: <input type="text" name="apellido" value="">
Telefono: <input type="text" name="telefono" value="">
DNI: <input type="text" name="" value="">
Fecha Nacimiento: <input type="date" name="" value="">
Codigo Postal: <input type="text" name="" value="" placeholder="38587">
Descripcion: <textarea name="Descripcion"></textarea>
Familia: <select name="familia">
             	<option value=informatica>Informatica</option>
	            <option value="quimica">Quimica</option>
	            <option value="administracion">Administracion</option>
	            <option value="electronica">Electronica</option>
        </select>
Idiomas: <select name="Idiomas">
	<option value="Castellano">Castellano</option>
	<option value="Euskera">Euskera</option>
	<option value="Ingles">Ingles</option>
	<option value="Frances">Frances</option>
	<option value="Aleman">Aleman</option>
</select>
Nivel: <select name="nivel">
	<option value="Alto">Alto</option>
	<option value="Medio">Medio</option>
	<option value="Bajo">Bajo</option>
</select>
Curso: <select name="Curso">
	<option value="Desarrollo_web">Desarrollo Web</option>
	<option value="Finanzas">Finanzas</option>
	<option value="Quimica">Quimica</option>
	<option value="Electronica">Electronica</option>
	</select>
Año Inicio: <input type="number" name="ano_inicio" value="" min="1960" max="2016">
Año Fin: <input type="number" name="ano_fin" value="" min="1980" max="2017">
Expiriencia: <textarea name="Expiriencia"></textarea>
Foto: <input type="file" name="" value="">
	
</body>
</html>