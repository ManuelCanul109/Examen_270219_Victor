<?php 

class Materia extends CI_model{

	//FUNCION QUE TRAE TODOS LOS ALUMNOS
	public function obtenerMaterias(){

		$query = $this->db->get('materias',10);

		return $query->result();
	}

	//FUNCION QUE TRAE UN ALUMNO ESPECIFICO POR MEDIO DEL ID
	public function traerMateria($id){
		$this->db->where('id',$id);
		$query = $this->db->get('materias');

		return $query->row();
	}

	//FUNCION QUE ELIMINA UN ALUMNO USANDO EL ID
	public function eliminarMateri($id){
		$this->db->where('id',$id);
		if($this->db->delete('materias')){
			return true;
		}else{
			return false;
		}
	}

	public function agregarMateria(){
		

		$materia = array(
			'nombre' => $this->input->post('nombre'),
			'creditos' => $this->input->post('creditos'),
			'semestre' => $this->input->post('semestre'),
			'folio' => $this->input->post('folio')
		);

		return $this->db->insert("materias",$materia);
	}

	public function actualizarMateri($id = null){
		# code...
		$alumno = array(
			'nombre_alumno' => $this->input->post('nombre_alumno'),
			'apellidos_alumno' => $this->input->post('apellidos_alumno'),
			'matricula_alumno' => $this->input->post('matricula_alumno')
		);
		$this->db->where('id',$this->input->post('id'));
		return $this->db->update('materias',$alumno);
	}

}

?>

