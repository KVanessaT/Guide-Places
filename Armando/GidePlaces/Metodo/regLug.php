<?php
include '../Conexion/Datos.php';
include '../Conexion/Consultas.php';

sleep(3);
$IdLugar= $_POST['IdLugar'];
$Nombre= $_POST['Nombre'];
$Descripcion= $_POST['Descripcion'];
$Imagen= $_POST['Imagen'];
$IdProvincia= $_POST['idProvincia'];

if(!$IdLugar=="" && !$Nombre=="" && !$Imagen=="" && !$IdProvincia=="" && !$Descripcion==""){
    $verificar=  ejecutarSQL::consultar("select * from Lugares where IdLugares='".$IdLugar."'");
    $verificaltotal = mysql_num_rows($verificar);
    if($verificaltotal<=0){
        if(consultasSQL::InsertSQL("Lugares", "IdLugares, Nombre, Descripcion, Imagen, idProvincia", "'$IdLugar','$Nombre','$Imagen','$IdProvincia', '$Descripcion'")){
            echo '<br>El registro se completo con éxito';
        }else{
           echo '<br>Ha ocurrido un error.<br>Por favor intente nuevamente'; 
        }
    }else{
        echo '<br>El Id de Usuario que ha ingresado ya esta registrado.<br>Por favor ingrese otro número de Id';
    }
}else {
    echo '<br>Error los campos no deben de estar vacíos';
}
