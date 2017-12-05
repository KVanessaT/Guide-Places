<?php
class Registro
{
   public $idRegistro;
   public $idUsuario;
   public $clave;

   function __construct(int $idRegistro,int $idUsuario,string $clave){
      $this->idRegistro = $idRegistro;
      $this->idUsuario = $idUsuario;
      $this->clave = $clave;
   }
}
?>