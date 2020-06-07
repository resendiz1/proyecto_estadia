<?php 
session_start();
if(!$_SESSION["validate_deportes"] ){
  header("location:index.php?action=login");
 exit(); 
}
?>
<style type="text/css"> body { background-color: #FFFFFF; }</style>
<div class="card  mb-2 mt-3 bordered">
  <div class="card-header bg-info"><strong class="text-white">FECHA: <?php $r = new mvcControlador(); $r-> fecha_to_all();?></strong></div>
  <div class="card-body">
     <!-- ROW DEL TITULO -->
        <div class="row mt-3 rounded mb-4 bg-white bordered">

    <div class="col-6 text-center mt-3">
  <h4><strong>PERMISOS</strong></h4>
     <form ><button type="button" class="btn btn-info btn-sm" name="imprimir" value="Imprimir" onclick="window.print();"><i class="fas fa-print">  IMPRIMIR</i></button></input>
<button type="button" class="btn btn-danger btn-sm" name="back" value="back" onclick="location.href='index.php?accion=deportes'"><i class="fas fa-arrow-circle-left fa-1x"> VOLVER</i></button></input>
   </form>
    </div>
        <div class="col-6">
          <label class="text-center"><strong>BUSCAR: Matricula, Nombre, Disciplina, Tipo de sangre o CURP</strong></label>
           <input type="text" class="form-control" placeholder="Buscar..." name="query_permiso" id="query_permiso">
        </div>  
    
  </div></div>
</div>

<div id="query_result">
  



</div>
<!-- TERMINA CARD QUE ENVUELVE AL TITULO -->