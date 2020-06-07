<?php 
session_start();
if(!$_SESSION["validate_medico"] ){
  header("location:index.php?action=login");
 exit(); 
}
?>
<style type="text/css"> body { background-color: #FFFFFF; }</style>
<div class="card  mb-2 mt-3 bordered">
 <div class="card-header bg-info"><strong class="text-white">FECHA: 
<?php $r = new mvcControlador(); $r-> fecha_to_all(); ?>
</strong></div>
  <div class="card-body">
     <!-- ROW DEL TITULO -->
        <div class="row mt-3 rounded mb-4 bg-white bordered">
    <div class="col-6 text-center mt-3 ">
  <h3><strong>REPORTE DE CONSULTAS</strong></h3>
   <form ><button type="button" class="btn btn-info btn-sm" name="imprimir" value="Imprimir" onclick="window.print();"><i class="fas fa-print">  IMPRIMIR</i></button></input>
<button type="button" class="btn btn-danger btn-sm" name="back" value="back" onclick="location.href='index.php?accion=medico'"><i class="fas fa-arrow-circle-left fa-1x"> VOLVER</i></button></input>
<a href="index.php?accion=receta_medico" class="btn btn-default btn-sm"><i class="fas fa-newspaper fa-1x"> VER RECETAS</i></a>
 
   </form>
    </div>

    

<div class="col-3">
  
 <strong>DE:</strong> <input type="date" class="form-control" id="fecha1_con">
</div>
<div class="col-3">

 <strong>A:</strong> <input type="date" class="form-control" id="fecha2_con">
</div>
         
    
  </div>
</div>



<div class="card bordered"> <div class="card-body">
  


<div id="r_con_medica">
  





</div> </div>