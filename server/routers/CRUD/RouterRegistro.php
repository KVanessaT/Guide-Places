<?php
include_once('../routers/RouterBase.php');
include_once('../controladores/CRUD/ControladorRegistro.php');
class RouterRegistro extends RouterBase
{
   public $controlador;

   function __construct(){
      parent::__construct();
      $this->controlador = new ControladorRegistro();
   }
   function route()
   {
      switch (strtolower($this->datosURI->accion)){
         case "borrar":
            return $this->controlador->borrar($this->datosURI->argumentos["id"]);
            break;
         case "leer":
            return $this->controlador->leer($this->datosURI->argumentos["id"]);
            break;
         case "leer_paginado":
            return $this->controlador->leer_paginado($this->datosURI->argumentos["pagina"],$this->datosURI->argumentos["registros_por_pagina"]);
            break;
         case "numero_paginas":
            return $this->controlador->numero_paginas($this->datosURI->argumentos["registros_por_pagina"]);
            break;
         case "leer_filtrado":
            return $this->controlador->leer_filtrado($this->datosURI->argumentos["columna"],$this->datosURI->argumentos["tipo_filtro"],$this->datosURI->argumentos["filtro"]);
            break;
         case "crear":
            return $this->controlador->crear(new Registro($this->datosURI->mensaje_body["idRegistro"],$this->datosURI->mensaje_body["idUsuario"],$this->datosURI->mensaje_body["clave"]));
            break;
         case "actualizar":
            return $this->controlador->actualizar(new Registro($this->datosURI->mensaje_body["idRegistro"],$this->datosURI->mensaje_body["idUsuario"],$this->datosURI->mensaje_body["clave"]));
            break;
      }
   }
}