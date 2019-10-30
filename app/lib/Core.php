<?php

/* Mapear Url ingresada en el navegador
1-controlador
2-metodo o funcion
3-parametro
ejemplo : /articulo/actualizar/4
*/

class Core{

	protected $controladorActual ='paginas';
	protected $metodoActual = 'index';
	protected $parametros = [];

	
    //constructor
 	public function __construct(){
    
    $url = $this->getUrl();
    //print_r($this->getUrl());

    //buscar en controladores si el controlador existe
    if (file_exists('../app/controladores/' .ucwords($url[0]).'.php')) {
    	//si existe se configura como controlador por defecto
    	$this->controladorActual = ucwords($url[0]);

    	//unset del indice 0
    	unset($url[0]);

    	//echo '0k';
    }

    //requerir el nuevo controlador
   require_once '../app/controladores/' . $this->controladorActual .'.php';
   $this->controladorActual = new $this->controladorActual;

 //verificar la segunda parte de la url o metodo
  if (isset($url[1])) {
  	 if (method_exists($this->controladorActual, $url[1])) {
   	 //checar metodo
   	$this->metodoActual = $url[1];
    //unset del indice 1 
   	unset($url[1]);

   }
  }
//echo $this->metodoActual;

  //obtener parametros
  $this->parametros = $url ? array_values($url) : [];
  //llamar callback con parametros array
  call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);

	}

    public function getUrl(){

      //echo $_GET['url'];
      if(isset($_GET['url'])){

      	$url = rtrim($_GET['url'],'/');
      	$url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;  
      }
    
    }

}
