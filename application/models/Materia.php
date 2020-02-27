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
	public function eliminarMateria($id){
		$this->db->where('id',$id);
		if($this->db->delete('materias')){
			return true;
		}else{
			return false;
		}
	}

	public function agregarMateria(){
		

		$alumno = array(
			'nombre_alumno' => $this->input->post('nombre'),
			'apellidos_alumno' => $this->input->post('apellido'),
			'matricula_alumno' => $this->input->post('matricula')
		);

		return $this->db->insert("materias",$alumno);
	}

	public function actualizarMateria($id = null){
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

