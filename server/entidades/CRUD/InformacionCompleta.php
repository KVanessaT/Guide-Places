<?php
class InformacionCompleta
{
   public $idInfcom;
   public $idLugar;
   public $idProvincia;
   public $idDetalle;
   public $datosGoogle;

   function __construct(int $idInfcom,int $idLugar,int $idProvincia,int $idDetalle,string $datosGoogle){
      $this->idInfcom = $idInfcom;
      $this->idLugar = $idLugar;
      $this->idProvincia = $idProvincia;
      $this->idDetalle = $idDetalle;
      $this->datosGoogle = $datosGoogle;
   }
}
?>