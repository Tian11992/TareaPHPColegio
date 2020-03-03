<?php  

	class Tblestudiantes_model
	{
		private $bd;
		private $tblestudiantes;
		private $listarDocumentos;

		public function __construct()
		{
			$this->bd = conexion::getConexion();
			$this->tblestudiantes = array();
			$this->listarDocumentos = array();
		}

		public function consultar($sql)
		{
			$consulta = $this->bd->query($sql);

			while($fila = $consulta->fetch_assoc())
			{
				$this->tblestudiantes[] = $fila;
			}

			return $this->tblestudiantes;
		}

		public function consultarPorNumero($sql)
		{
			$consulta = $this->bd->query($sql);

			$fila = $consulta->fetch_assoc();
			
			$this->tblestudiantes[] = $fila;

			return $this->tblestudiantes;
		}

		public function actualizarEstudiantes($dato)
		{
			$tipodoc = $dato['tipodoc'];
			$numero = $dato['numero'];
			$nombre = $dato['nombre'];
			$f_nacimiento = $dato['f_nacimiento'];

			$consulta = "UPDATE tblestudiante SET nombre = '$nombre', tipodoc = $tipodoc, f_nacimiento = '$f_nacimiento' WHERE numero = $numero";

			mysqli_query($this->bd, $consulta) or die("Fallo al actualizar.");
		}

		public function eliminarEstudiantes($numero)
		{
			$consulta = "DELETE FROM tblestudiante WHERE numero = $numero";

			mysqli_query($this->bd, $consulta) or die("Fallo al eliminar.");
		}

		public function insertarEstudiantes($dato)
		{
			$tipodoc = $dato['tipodoc'];
			$numero = $dato['numero'];
			$nombre = $dato['nombre'];
			$f_nacimiento = $dato['f_nacimiento'];

			$consulta = "INSERT INTO tblestudiante VALUES($tipodoc, $numero, '$nombre', '$f_nacimiento')";

			mysqli_query($this->bd, $consulta) or die("Fallo al insertar registro.");
		}

		public function listarDocumentos($sql)
		{
			$documentos = $this->bd->query($sql);

			while($fila = $documentos->fetch_assoc())
			{
				$this->listarDocumentos[] = $fila;
			}

			return $this->listarDocumentos;
		}
	}

?>