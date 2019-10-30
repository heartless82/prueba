<?php

class Usuario{
	private $db;

	public function __construct(){

		$this->db = new Db;
	}


	public function obtenerUsuarios(){

		$this->db->query('SELECT * FROM usuarios');

		$resultados = $this->db->registros();

		return $resultados;
	}


	public function agregarUsuario($datos){

  $this->db->query('INSERT INTO usuarios (nombre, email, telefono) VALUES (:nombre, :email, :telefono)');

  //vincular los valores
  $this->db->bind(':nombre', $datos['nombre']);
  $this->db->bind(':email', $datos['email']);
  $this->db->bind(':telefono', $datos['telefono']);

  //ejecutar
  if($this->db->execute()){
  	return true;
  }
  else{
    return false;
  }


	}
	
}