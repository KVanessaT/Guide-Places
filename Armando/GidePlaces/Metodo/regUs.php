<?php
include '../Conexion/Datos.php';
include '../Conexion/Consultas.php';

sleep(3);
$IdUsuarios= $_POST['IdUs'];
$Nombres= $_POST['nombres'];
$Apellidos= $_POST['apellidos'];
$Edad= $_POST['edad'];
$Correo= $_POST['correo'];
$Clave= md5($_POST['clave']);

$phoneCliente= $_POST['clien-phone'];
$emailCliente= $_POST['clien-email'];

if(!$IdUsuarios=="" && !$Nombres=="" && !$Edad=="" && !$Correo=="" && !$Clave==""){
    $verificar=  ejecutarSQL::consultar("select * from Usuarios where idUsuarios='".$IdUsuarios."'");
    $verificaltotal = mysql_num_rows($verificar);
    if($verificaltotal<=0){
        if(consultasSQL::InsertSQL("Usuarios", "idUsuarios, Nombres, Cedula, Correo, idCargo", "'$IdUsuarios','$Nombres','$Edad','$Correo', '$Clave'")){
            echo '<br>El registro se completo con éxito <br><button type="button" class="btn btn-primary" href="../index.html">Volver</button>';
        }else{
           echo '<br>Ha ocurrido un error.<br>Por favor intente nuevamente'; 
        }
    }else{
        echo '<br>El Id de Usuario que ha ingresado ya esta registrado.<br>Por favor ingrese otro número de Id';
    }
}else {
    echo '<br>Error los campos no deben de estar vacíos';
}
