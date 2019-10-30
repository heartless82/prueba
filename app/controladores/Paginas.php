<?php

class Paginas extends Controlador{

public function __construct(){

  $this->usuarioModelo = $this->modelo('Usuario');
}

public function index(){

    //obtener los usuarios

    $usuarios = $this->usuarioModelo->obtenerUsuarios();


    $datos =[
    
    'usuarios' => $usuarios
    
    ];

	$this->vista('paginas/inicio',$datos);
}


public function agregar(){

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $datos =[
        'nombre' => trim($_POST['nombre']),
        'email' => trim($_POST['email']),
        'telefono' => trim($_POST['telefono']),
         ];

   if($this->usuarioModelo->agregarUsuario($datos)) {redireccionar('/paginas');  }
   else{ die('Algo Salio Mal');  }

       }
       else{ 
        $datos =[
         
         'nombre' => '',
         'email' => '',
         'telefono' => ''
        ];

        $this->vista('paginas/agregar', $datos);
       }


}




}