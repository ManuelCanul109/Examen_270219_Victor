<?php
class Materias extends CI_Controller{

	public function __construct(){
		parent:: __construct();
		$this->load->model('Materia');
	}

	//FUNCION QUE CARGA TODOS LOS ALUMNOS CUANDO ESTEMOS EN EL INDEX
	public function index(){
		$data['datos'] = $this->Materia->obtenerMaterias();

		$data['titulo'] = "Inicio";

		$data['contenido'] = "Inicio";

		$this->load->view('Dato/index',$data);
	}

	public function agregarMateria(){
		# code...
		$this->load->library("form_validation");
		$this->load->helper("form");
		$data["titulo"] = "Agregar Materia";

		$this->form_validation->set_rules("nombre","nombre","required");
		$this->form_validation->set_rules("creditos","creditos","required");
		$this->form_validation->set_rules("semestre","semestre","required");
		$this->form_validation->set_rules("folio","folio","required");

		if($this->form_validation->run() == FALSE){
			$this->load->view("Dato/add",$data);
		}else{
			$this->Materia->agregarMateria();
			redirect('Materias');
		}
	}

	public function actualizarMateria($id = null){
		# code...
		$this->load->library("form_validation");
		$this->load->helper("form");

		if($id != null){
			$data['dato'] = $this->Materia->traerMateria($id);
			$this->form_validation->set_rules("nombre","nombre","required");
			$this->form_validation->set_rules("creditos","creditos","required");
			$this->form_validation->set_rules("semestre","semestre","required");
			$this->form_validation->set_rules("folio","folio","required");
			if($this->form_validation->run() == FALSE){
			$this->load->view("Dato/update",$data);
			}else{
				
				$this->Materia->actualizarMateri($id);
				redirect('Materias');
			}
		}else{
			$this->Materia->actualizarMateri($id);
			redirect("Materias");
		}

	}

	public function eliminarMateria($id = null){
		
		if($id != null){
			if($this->Materia->eliminarMateri($id)){
				redirect('Materias');
			}
		}else{
			//$this->Dato->actualizarDat($id);
			redirect("Materias");
		}
	}

	public function verMateria($id = null){
		# code...
		if($id != null){

			$data['alumno_a_ver'] = $this->Materia->traerMateria($id);
			$this->load->view('Dato/view',$data);

		}else{
			redirect("Materias");
		}
	}
}

?>