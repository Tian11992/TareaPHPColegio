<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="content-type" content="text/html"; charset="UTF-8" />
		<title>Trabajo PHP</title>
	</head>
	<body>

		<h1>Nuevo registro de estudiante</h1>

		<form name="formestudiante" method="post" action="index.php?accionEstudiante=guardarEstudiante">
			<p>Tipo Documento:
				<select name="txttipodoc">
					<?php foreach($listarDocumentos as $documento): ?>
						<option value="<?php echo $documento['idtipo'] ?>"><?php echo $documento['nombre'] ?></option>
					<?php endforeach; ?>
				</select>
			</p>

			<p>Numero: <input type="text" name="txtnumero"></p>				

			<p>Nombre: <input type="text" name="txtnombre"></p>

			<p>Fecha de Nacimiento: <input type="text" name="txtf_nacimiento"></p>

			<p><input type="submit" name="btnguardarestudiante" value="Guardar Estudiante"></p>
		</form>

		<br>

		<table border="1">
			<thead>
				<tr>
					<th>Tipo Documento</th>
					<th>Número</th>
					<th>Nombre</th>
					<th>Fecha Nacimiento</th>
					<th>Modificar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($consulta as $datos): ?>
					<tr>
						<td><?= $datos['documento']; ?></td>
						<td><?= $datos['numero']; ?></td>
						<td><?= $datos['nombre']; ?></td>
						<td><?= $datos['f_nacimiento']; ?></td>
						<td><a href="index.php?accionEstudiante=modificar&numero=<?php echo $datos['numero']; ?>">Modificar</a></td>
						<td><a href="index.php?accionEstudiante=eliminar&numero=<?php echo $datos['numero']; ?>">Eliminar</a></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</body>
</html>
