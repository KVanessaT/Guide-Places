<?php
include 'Conexion/Datos.php';
include 'Conexion/Consultas.php';
$consulta= ejecutarSQL::consultar("select * from Usuarios");
$totalproductos = mysql_num_rows($consulta);
if($totalproductos>0){
    while($fila=mysql_fetch_array($consulta)){
 echo '
 <div class="container-fluid">
 <div class="row">
     <div class="col-md-12">
         <div class="row">
             <div class="col-md-4">
             </div>
             <div class="col-md-4">
             <h3>'.$fila['idUsuarios'].'</h3>
<h3>'.$fila['Nombres'].'</h3>
<h3>'.$fila['Apellidos'].'</h3>
<p>'.$fila['Cedula'].'</p>
<p>'.$fila['Correo'].'</p>
             </div>
             <div class="col-md-4">
             </div>
         </div>
     </div>
 </div>
</div>    
';
 }   
 }else{
 echo '<h2>No hay productos registrados en la tienda</h2>';
 }  
 ?>  
 