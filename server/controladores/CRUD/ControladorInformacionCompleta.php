<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/InformacionCompleta.php');
class ControladorInformacionCompleta extends ControladorBase
{
   function crear(InformacionCompleta $informacioncompleta)
   {
      $sql = "INSERT INTO InformacionCompleta (idInfcom,idLugar,idProvincia,idDetalle,datosGoogle) VALUES (?,?,?,?,?);";
      $parametros = array($informacioncompleta->idInfcom,$informacioncompleta->idLugar,$informacioncompleta->idProvincia,$informacioncompleta->idDetalle,$informacioncompleta->datosGoogle);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(InformacionCompleta $informacioncompleta)
   {
      $parametros = array($informacioncompleta->idInfcom,$informacioncompleta->idLugar,$informacioncompleta->idProvincia,$informacioncompleta->idDetalle,$informacioncompleta->datosGoogle,$informacioncompleta->id);
      $sql = "UPDATE InformacionCompleta SET idInfcom = ?,idLugar = ?,idProvincia = ?,idDetalle = ?,datosGoogle = ? WHERE id = ?;";
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
      $sql = "DELETE FROM InformacionCompleta WHERE id = ?;";
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
         $sql = "SELECT * FROM InformacionCompleta;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM InformacionCompleta WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM InformacionCompleta LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM InformacionCompleta;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM InformacionCompleta WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM InformacionCompleta WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM InformacionCompleta WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM InformacionCompleta WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}