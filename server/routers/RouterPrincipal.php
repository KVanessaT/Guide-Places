<?php
include_once('../routers/RouterBase.php');
include_once('../routers/RouterFuncionalidadesEspecificas.php');
function cargarRouters() {
   define("routersPath", "../routers/");
   $files = glob(routersPath."CRUD/*.php");
   foreach ($files as $filename) {
      include_once($filename);
   }
}
cargarRouters();

class RouterPrincipal extends RouterBase
{
   function route(){
      switch(strtolower($this->datosURI->controlador)){
         case "detalles":
            $routerDetalles = new RouterDetalles();
            return json_encode($routerDetalles->route());
            break;
         case "informacioncompleta":
            $routerInformacionCompleta = new RouterInformacionCompleta();
            return json_encode($routerInformacionCompleta->route());
            break;
         case "lugares":
            $routerLugares = new RouterLugares();
            return json_encode($routerLugares->route());
            break;
         case "provincia":
            $routerProvincia = new RouterProvincia();
            return json_encode($routerProvincia->route());
            break;
         case "registro":
            $routerRegistro = new RouterRegistro();
            return json_encode($routerRegistro->route());
            break;
         case "usuarios":
            $routerUsuarios = new RouterUsuarios();
            return json_encode($routerUsuarios->route());
            break;
         default:
            $routerEspeficias = new RouterFuncionalidadesEspecificas();
            return $routerEspeficias->route();
            break;
      }
   }
}
