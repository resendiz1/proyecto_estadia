<?php 
session_start();
if(!$_SESSION["validate_list"] ){
  header("location:index.php?action=login");
 exit(); 
}
$r = new mvcControlador(); $r-> query_pase_lista_controlador();
$r = new mvcControlador(); $r-> pase_lista_controlador();

if(isset($_GET["accion"])){ 
      if($_GET["accion"]=="ok_lista"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ HORAS AGREGADAS CORRECTAMENTE ! </strong></div>
';
 }
      if($_GET["accion"]=="no_lista"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ OCURRIO UN ERROR, INTENTA NUEVAMENTE ! </strong></div>
';
 } 
}


 ?>




  <div class="card  mb-5 mt-1 ">
  <div class="card-body bg-primary">
    <label class="text-white"> <strong>BUSCAR POR: NOMBRE, MATRICULA O TIPO DE SANGRE</strong></label>
    <input type="text" class="form-control" placeholder="BUSCAR POR: NOMBRE, MATRICULA O TIPO DE SANGRE" name="searching" id="searching">
   </div>
   </div> 
<div id="pase_lista"></div>

