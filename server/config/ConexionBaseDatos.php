<?php
include_once("../persistencia/DatosConexion.php");
class ConexionBaseDatos {
    private static $array = array();
    public static function DatosConexiones(){
        $array = array();
        // $array[] = new DatosConexion("pruebasITSY","172.16.0.9","ignug","prueba","12345678");
        // $array[] = new DatosConexion("local","localhost","ignug","prueba","12345678");
        $array[] = new DatosConexion("local","sql201.byethost7.com","b7_21146743_GuidePlaces","b7_21146743","ILOVEKOREA25");
        
        return $array;
    }
}