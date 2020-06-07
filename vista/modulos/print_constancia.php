<?php 
session_start();
if(!$_SESSION["validate_deportes"] ){
  header("location:index.php?action=login");
 exit(); 
}
?>
<style type="text/css"> body { background-color: #FFFFFF; }</style>
<div class="card  mb-2 mt-3 bordered">
  <div class="card-header bg-info"><strong class="text-white"> FECHA: <?php $r = new mvcControlador(); $r-> fecha_to_all(); ?> </strong></div>
  <div class="card-body">
     <!-- ROW DEL TITULO -->
        <div class="row mt-3 rounded mb-4 bg-white bordered">
    <div class="col-3 ">
      <img src="img/logo.png" class="img img-fluid" height="90px" width="320px" alt="">
    </div>
    <div class="col-5 text-center mt-3">
  <h3><strong>CONSTANCIAS DE A.D.Y C.</strong></h3>
     <form ><button type="button" class="btn btn-info btn-sm" name="imprimir" value="Imprimir" onclick="window.print();"><i class="fas fa-print">  IMPRIMIR</i></button></input>
<button type="button" class="btn btn-danger btn-sm" name="back" value="back" onclick="location.href='index.php?accion=deportes'"><i class="fas fa-arrow-circle-left fa-1x"> VOLVER</i></button></input>
   </form>
    </div>
        <div class="col-4">
          <label class="text-center"><strong>BUSCAR: Matricula, Nombre, Disciplina, Tipo de sangre o CURP</strong></label>
           <input type="text" class="form-control" placeholder="Buscar..." id="horas_cumplidas">
        </div>  
    
  </div></div>
</div>

<div id="datos_horas">
  



</div>
<!-- TERMINA CARD QUE ENVUELVE AL TITULO -->