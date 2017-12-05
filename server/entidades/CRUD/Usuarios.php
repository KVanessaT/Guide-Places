<?php
class Usuarios
{
   public $idUsuario;
   public $nombreUsuario;
   public $apellidoUsuario;
   public $edadUsuario;
   public $emailUsuario;

   function __construct(int $idUsuario,string $nombreUsuario,string $apellidoUsuario,int $edadUsuario,string $emailUsuario){
      $this->idUsuario = $idUsuario;
      $this->nombreUsuario = $nombreUsuario;
      $this->apellidoUsuario = $apellidoUsuario;
      $this->edadUsuario = $edadUsuario;
      $this->emailUsuario = $emailUsuario;
   }
}
?>