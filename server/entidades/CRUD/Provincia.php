<?php
class Provincia
{
   public $idProvincia;
   public $nombreProvincia;

   function __construct(int $idProvincia,string $nombreProvincia){
      $this->idProvincia = $idProvincia;
      $this->nombreProvincia = $nombreProvincia;
   }
}
?>