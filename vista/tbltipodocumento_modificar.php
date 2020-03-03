<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="content-type" content="text/html"; charset="UTF-8" />
		<title>Trabajo PHP</title>
	</head>
	<body>
		<?php foreach($consulta as $datos): ?>
		<h1>Modificar información documento</h1>
		<br>

		<form name="form1" method="post" action="index.php?accion=guardarCambiosTipoDocumento">
			<p>ID: <input type="text" name="txtid" readonly value="<?php echo $_REQUEST['id']; ?>"></p>

			<p>Nombre: <input type="text" name="txtnombre" value="<?php echo $datos['nombre'] ?>"></p>

			<p><input type="submit" name="btnguardarcambios" value="Guardar Cambios"></p>
		</form>
	<?php endforeach; ?>
	</body>
</html>