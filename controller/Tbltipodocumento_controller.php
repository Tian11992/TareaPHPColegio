<?php  

	require_once('model/Tbltipodocumento_model.php');


	class Tbltipodocumento_controller
	{
		private $model_tipodocumento;

		public function __construct()
		{
			$this->model_tipodocumento = new Tbltipodocumento_model();
		}

		public function index()
		{
			$consulta = $this->model_tipodocumento->consultar("SELECT * FROM tbltipodocumento");

			require_once('vista/tbltipodocumento.view.php');
		}

		public function modificar()
		{
			$id = $_REQUEST['id'];
			$consulta = $this->model_tipodocumento->consultarPorId("SELECT * FROM tbltipodocumento WHERE idtipo = $id");
			require_once('vista/tbltipodocumento_modificar.php');
		}

		public function guardarCambiosTipoDocumento()
		{
			$dato['id'] = $_POST['txtid'];
			$dato['nombre'] = $_POST['txtnombre'];

			$this->model_tipodocumento->actualizarTipoDocumento($dato);

			$this->index();
		}

		public function eliminar()
		{
			$id = $_REQUEST['id'];
			$this->model_tipodocumento->eliminarTipoDocumento($id);
			$this->index();
		}

		public function guardarDocumento()
		{
			$dato['nombre'] = $_POST['txtnombredocumento'];
			$this->model_tipodocumento->insertarTipoDocumento($dato);
			$this->index();
		}
	}

?>