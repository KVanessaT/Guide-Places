<?php
class Detalles
{
   public $idDetalle;
   public $descripcion;

   function __construct(int $idDetalle,string $descripcion){
      $this->idDetalle = $idDetalle;
      $this->descripcion = $descripcion;
   }
}
?>