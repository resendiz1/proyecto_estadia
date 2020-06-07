<?php 
session_start();
if(!$_SESSION["validate_difusion"] ){
  header("location:index.php?action=login");
 exit(); 
}
?>
<style type="text/css"> body { background-color: #FFFFFF; }</style>
<div class="card  mb-2 mt-3 bordered">
  <div class="card-header text-white bg-info"><strong>FECHA: <?php $r = new mvcControlador(); $r-> fecha_to_all(); ?></strong></div>
  <div class="card-body">
     <!-- ROW DEL TITULO -->
        <div class="row mt-3 rounded mb-4 bg-white bordered">
    <div class="col-6 text-center mt-3 ">
  <h3><strong>REPORTE DE EVENTOS</strong></h3>
   <form ><button type="button" class="btn btn-info btn-sm" name="imprimir" value="Imprimir" onclick="window.print();"><i class="fas fa-print">  IMPRIMIR</i></button></input>
<button type="button" class="btn btn-danger btn-sm" name="back" value="back" onclick="location.href='index.php?accion=difusion'"><i class="fas fa-arrow-circle-left fa-1x"> VOLVER</i></button></input>
   </form>
    </div>

    

<div class="col-3">
  
 <strong>DE:</strong> <input type="date" class="form-control" id="f_evsi_1">
</div>
<div class="col-3">

 <strong>A:</strong> <input type="date" class="form-control" id="f_evsi_2">
</div>
         
    
  </div>
</div>
<!-- TERMINA CARD QUE ENVUELVE AL TITULO -->
<div class="card bordered">
  <div class="card-body">

      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-homefear" role="tab"
      aria-controls="pills-home" aria-selected="true"><strong><h4>REALIZADOS</h4></strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profilefear" role="tab"
      aria-controls="pills-profile" aria-selected="false"><strong><h4> NO REALIZADOS</h4></strong></a>
  </li>
</ul>

  </div>
</div>


<div class="card bordered"> <div class="card-body">
  


<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-homefear" role="tabpanel" aria-labelledby="pills-home-tab">

<div id="r_evsi_difu"></div>
  </div>


  <div class="tab-pane fade" id="pills-profilefear" role="tabpanel" aria-labelledby="pills-profile-tab">

  <div id="r_noeve"></div>


</div>
</div>


</div> </div>






