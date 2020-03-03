<?php  

	class Tbltipodocumento_model
	{
		private $bd;
		private $tbltipodocumento;

		public function __construct()
		{
			$this->bd = conexion::getConexion();
			$this->tbltipodocumento = array();
		}

		public function consultar($sql)
		{
			$consulta = $this->bd->query($sql);

			while($fila = $consulta->fetch_assoc())
			{
				$this->tbltipodocumento[] = $fila;
			}

			return $this->tbltipodocumento;
		}

		public function consultarPorId($sql)
		{
			$consulta = $this->bd->query($sql);

			$fila = $consulta->fetch_assoc();
			
			$this->tbltipodocumento[] = $fila;

			return $this->tbltipodocumento;
		}

		public function actualizarTipoDocumento($dato)
		{
			$id = $dato['id'];
			$nombre = $dato['nombre'];

			$consulta = "UPDATE tbltipodocumento SET nombre = '$nombre' WHERE idtipo = $id";

			mysqli_query($this->bd, $consulta) or die("Fallo al actualizar.");
		}

		public function eliminarTipoDocumento($id)
		{
			$consulta = "DELETE FROM tbltipodocumento WHERE idtipo = $id";

			mysqli_query($this->bd, $consulta) or die("Fallo al eliminar.");
		}

		public function insertarTipoDocumento($dato)
		{
			$nombre = $dato['nombre'];

			$consulta = "INSERT INTO tbltipodocumento(nombre) VALUES('$nombre')";

			mysqli_query($this->bd, $consulta) or die("Fallo al insertar registro.");
		}
	}

?>