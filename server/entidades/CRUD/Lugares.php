<?php
class Lugares
{
   public $idLugar;
   public $nombreLugar;

   function __construct(int $idLugar,string $nombreLugar){
      $this->idLugar = $idLugar;
      $this->nombreLugar = $nombreLugar;
   }
}
?>