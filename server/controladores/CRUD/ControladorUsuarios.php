<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/Usuarios.php');
class ControladorUsuarios extends ControladorBase
{
   function crear(Usuarios $usuarios)
   {
      $sql = "INSERT INTO Usuarios (idUsuario,nombreUsuario,apellidoUsuario,edadUsuario,emailUsuario) VALUES (?,?,?,?,?);";
      $parametros = array($usuarios->idUsuario,$usuarios->nombreUsuario,$usuarios->apellidoUsuario,$usuarios->edadUsuario,$usuarios->emailUsuario);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(Usuarios $usuarios)
   {
      $parametros = array($usuarios->idUsuario,$usuarios->nombreUsuario,$usuarios->apellidoUsuario,$usuarios->edadUsuario,$usuarios->emailUsuario,$usuarios->id);
      $sql = "UPDATE Usuarios SET idUsuario = ?,nombreUsuario = ?,apellidoUsuario = ?,edadUsuario = ?,emailUsuario = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM Usuarios WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM Usuarios;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Usuarios WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM Usuarios LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM Usuarios;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Usuarios WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Usuarios WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Usuarios WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Usuarios WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}