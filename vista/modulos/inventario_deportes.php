<?php 
session_start();
if(!$_SESSION["validate_deportes"] ){
  header("location:index.php?action=login");
 exit(); 
}
?>
<style type="text/css"> body { background-color: #FFFFFF; }</style>
<div class="card  mb-2 mt-3 bordered">
  <div class="card-header bg-info"><strong class="text-white">FECHA: <?php $r = new mvcControlador(); $r-> fecha_to_all(); ?></strong></div>
  <div class="card-body">
     <!-- ROW DEL TITULO -->
        <div class="row mt-3 rounded mb-4 bg-white bordered">
    <div class="col-3 ">
      <img src="img/logo.png" class="img img-fluid" height="90px" width="320px" alt="">
    </div>
    <div class="col-6 text-center mt-3 ">
  <h3><strong>REPORTE DE INVENTARIO</strong></h3>
     <form ><button type="button" class="btn btn-info btn-sm" name="imprimir" value="Imprimir" onclick="window.print();"><i class="fas fa-print">  IMPRIMIR</i></button></input>
<button type="button" class="btn btn-danger btn-sm" name="back" value="back" onclick="location.href='index.php?accion=deportes'"><i class="fas fa-arrow-circle-left fa-1x"> VOLVER</i></button></input>
   </form>
    </div>
        <div class="col-2 mt-3"><h5>
        <select class="browser-default custom-select" name="disciplina_inv" id="disciplina_inv">
          <option selected>DISCIPLINA</option> 
         <strong>   <?php $r = new mvcControlador(); $r -> query_disciplina_controlador(); ?></strong>
        </select></h5>
        </div>  
  </div></div>
</div>
<!-- TERMINA CARD QUE ENVUELVE AL TITULO -->


  <!-- VISUALIZANDO DATOS ANTES DE AGREGAR PRE-REGISTRO -->




<div class="card bordered">
  <div class="card-body">

      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-homefear" role="tab"
      aria-controls="pills-home" aria-selected="true"><strong><h4>EXISTENCIA</h4></strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profilefear" role="tab"
      aria-controls="pills-profile" aria-selected="false"><strong><h4>ELIMINADOS</h4></strong></a>
  </li>
</ul>

  </div>
</div>


<div class="card bordered mt-3"> <div class="card-body">
  


<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-homefear" role="tabpanel" aria-labelledby="pills-home-tab">
<div id="result_invent_deportes_alta">
</div>

  </div>


  <div class="tab-pane fade" id="pills-profilefear" role="tabpanel" aria-labelledby="pills-profile-tab">.
   <div id="r_inv_del_dep"></div>
 </div>   



</div>
</div>


</div> </div>