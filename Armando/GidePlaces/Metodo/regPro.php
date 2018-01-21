<?php
include '../Conexion/Datos.php';
include '../Conexion/Consultas.php';

sleep(3);
$IdProvincia= $_POST['IdProvincia'];
$Provincia= $_POST['Provincia'];

if(!$IdProvincia=="" && !$Provincia==""){
    $verificar=  ejecutarSQL::consultar("select * from Provincia where idProvincia='".$IdProvincia."'");
    $verificaltotal = mysql_num_rows($verificar);
    if($verificaltotal<=0){
        if(consultasSQL::InsertSQL("Provincia", "idProvincia, Nombre", "'$IdProvincia','$Provincia'")){
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
