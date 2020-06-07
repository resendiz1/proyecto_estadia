<div class="card mt-3 mb-3">
<?php 
session_start();
if(!$_SESSION["validate_medico"] ){
  header("location:index.php?action=login");
 exit(); 
}

if (isset($_GET["accion"])) {
if($_GET["accion"]=="ok_new_item"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert" >
<strong>  ¡ REGISTRO DE ARTICULO EXITOSO ! </strong></div>
';
 }
if($_GET["accion"]=="no_new_item"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ REGISTRO DE ARTICULO FALLIDO ! </strong></div>
';
 }

 if($_GET["accion"]=="ok_new_paciente"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ REGISTRO DEL PACIENTE EXITOSO ! </strong></div>
';
 }
if($_GET["accion"]=="no_new_paciente"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ REGISTRO DEL PACIENTE FALLIDO ! </strong></div>
';
 }

 if($_GET["accion"]=="ok_nuevo_evento"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ NUEVO EVENTO PROGRAMADO ! </strong></div>
';
 }
if($_GET["accion"]=="no_nuevo_evento"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ OCURRIO UN ERROR AL PROGRAMAR EL EVENTO, INTENTA NUEVAMENTE ! </strong></div>
';
 }

 if($_GET["accion"]=="ok_consulta_medica"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ CONSULTA MEDICA REGISTRADA ! </strong></div>
';
 }
if($_GET["accion"]=="no_consulta_medica"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ OCURRIO UN ERROR AL REGISTRAR LA CONSULTA MEDICA, INTENTA NUEVAMENTE ! </strong></div>
';
 }

 if($_GET["accion"]=="ok_update_paciente"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ DATOS DEL PACIENTE ACTUALIZADOS ! </strong></div>
';
 }
if($_GET["accion"]=="no_update_paciente"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ OCURRIO UN ERROR AL ACTUALIZAR LOS DATOS DEL PACIENTE, INTENTA NUEVAMENTE ! </strong></div>
';
 }

 if($_GET["accion"]=="ok_mas_medicamentos"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ CANTIDAD DE MEDICAMENTOS ACTUALIZADA ! </strong></div>
';
 }
if($_GET["accion"]=="no_mas_medicamentos"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ OCURRIO UN ERROR AL ACTUALIZAR LA CANTIDAD DE MEDICAMENTOS, INTENTA NUEVAMENTE ! </strong></div>
';
 }

 if($_GET["accion"]=="ok_menos_medicamentos"){ 
         echo '
<div class="card-header bg-warning text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ CANTIDAD DE MEDICAMENTOS ACTUALIZADA ! </strong></div>
';
 }
if($_GET["accion"]=="no_menos_medicamentos"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ OCURRIO UN ERROR AL ACTUALIZAR LA CANTIDAD DE MEDICAMENTOS, INTENTA NUEVAMENTE ! </strong></div>
';
 }

 if($_GET["accion"]=="ok_unrealizado_eventoXD"){ 
         echo '
<div class="card-header bg-warning text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ SE REGISTRO COMO EVENTO NO REALIZADO CON EXITO ! </strong></div>
';
 }
if($_GET["accion"]=="no_unrealizado_eventoXD"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ OCURRIO UN ERROR AL REGISTRAR EL EVENTO NO REALIZADO, INTENTA NUEVAMENTE ! </strong></div>
';
 }

 if($_GET["accion"]=="ok_evento_madeXDD"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ SE REGISTRO EL EVENTO REALIZADO EXITOSAMENTE ! </strong></div>
';
 }
if($_GET["accion"]=="no_evento_madeXDD"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ OCURRIO UN ERROR AL REGISTRAR EL EVENTO REALIZADO, INTENTA NUEVAMENTE ! </strong></div>
';
 }
if($_GET["accion"]=="ditem_medico"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ERROR, YA HAY UN MEDICAMENTO CON ESA CLAVE EN EL INVENTARIO, VERIFICA E INTENTALO NUEVAMENTE ! </strong></div>
';
 }
if($_GET["accion"]=="duplicate_paciente"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ERROR, YA EXISTE UN PACIENTE CON ESA MATRÍCULA O NÚMERO DE EMPLEADO, VERIFICA E INTENTALO NUEVAMENTE ! </strong></div>
';
 }

if($_GET["accion"]=="no_menos_cero_items_medico"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ERROR, NO PUEDES QUITAR MÁS ARTÍCULOS DE LOS QUE EXISTEN! </strong></div>
';
 }


 
}
    $r = new mvcControlador();
    $r -> registro_articulo_medico_controlador();
    $r-> add_paciente_medico_controlador();
    $r->prog_evento_medico_controlador();
    $r->new_consulta_medica_medico_controlador();
    $r->update_matricula_paciente_controlador();
    $r->add_more_articulos_medico_controlador();
    $r->elimina_medicamentos_controlador();
    $r->evento_norealizado_medico_controlador();
    $r->evento_realizado_medico_controlador();
     ?>

  <div class="card-body">
   <div class="row mt-3 mb-2 rounded mb-4 bg-white bordered">
    <div class="col-6 mt-1">
      <img src="img/logo.png" height="90px" width="320px" alt="">
    </div>
    <div class="col-auto mt-4 text-center">
  <h1><strong>SERVICIO MEDICO</strong>
  </h1>

  <a href="index.php?accion=login" target="_top">CERRAR SESIÓN </a> 


  </div>
</div>

</div>
</div>
<!-- TERMINA CARD QUE ENVUELVE AL TITULO -->
   
 <div class="card mt-1 ">
<div class="card-body">
  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
   
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#nuevos_registros" role="tab"
      aria-controls="pills-home" aria-selected="true"><strong><h5>NUEVOS REGISTROS</h5></strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#consultar_informacion" role="tab"
      aria-controls="pills-profile" aria-selected="false"><strong><h5>CONSULTAR INFORMACIÓN </h5></strong></a>
  </li>
</ul>
</div>
</div>
<div class="tab-content" id="pills-tabContent">

  <div class="tab-pane fade show active" id="nuevos_registros" role="tabpanel" aria-labelledby="pills-home-tab">  
  <div class="card mt-1 ">
  <div class="card-header bg-dark text-white"><strong>NUEVOS REGISTROS</strong></div>
  <div class="card-body">
<div class="col-auto mb-5">
<ul class="nav nav-pills mb-3 bg-white" id="pills-tab-add" role="tablist">
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#paciente" role="tab"
      aria-controls="pills-profile" aria-selected="false"><strong>Nuevo paciente</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#consulta" role="tab"
      aria-controls="pills-home" aria-selected="true"><strong>Nueva Consulta Medica</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#evento" role="tab"
      aria-controls="pills-profile" aria-selected="false"><strong>Nuevo Evento</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#inventario" role="tab"
      aria-controls="pills-profile" aria-selected="false"><strong>Nuevo Artículo Para Inventario</strong></a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="consulta" role="tabpanel" aria-labelledby="pills-home-tab">
    <!-- SECCION 1 -->
<div class="card mt-3 ">
<div class="card-body bg-success">
  <label class="text-white"><strong>BUSQUEDA POR: Matricula/#Empleado</strong></label>
      <input type="text" class="form-control" placeholder="BUSQUEDA POR: Matricula/#Empleado" id="query_medica_pac" name="query_medica_pac">
</div>
</div>
<div id="query_consulta"></div>




  



</div>
  <div class="tab-pane fade" id="paciente" role="tabpanel" aria-labelledby="pills-profile-tab">

<div class="card mt-3">    
  <div class="card-body">
<form class="text-center border border-light p-5" method="post">
  <p class="h4 mb-4">AGREGAR PACIENTE</p>
    <div class="form-row mb-2">
       
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <input type="text" min="1" pattern="^[0-9]+"  name="numero_paciente" class="form-control" placeholder="Matricula / #Empleado" required>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <input type="text"  name="nombre" class="form-control" placeholder="Nombre(s)" >
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-3 ">
            <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" required>
        </div>
        
        <div class="col-sm-12 col-md-6 col-lg-2">
        <select class="browser-default custom-select" name="carrera" required>
            <option selected>CARRERA</option>
            <?php $r = new mvcControlador(); $r->query_carrera_controlador(); ?>
        </select>
        </div>
    </div>

    <div class="form-row mb-2">
      <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">
        <input type="text" name="rh" class="form-control" placeholder="Factor RH" required>
      </div>

      <div class="col-sm-12 col-md-6 col-lg-2 mb-3 ">
        <select class="browser-default custom-select" name="genero" required>
            <option selected>GÉNERO</option>
            <option value="M">MASCULINO</option>
            <option value="F">FEMENINO</option>
        </select>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
        <input type="text"  name="primer" class="form-control" placeholder="Primer Vez" required>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
        <input type="text"  name="alergias" class="form-control" placeholder="Alergias" required>
      </div>

    </div>

    <div class="form-row mb-2">
      <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
            <!-- PADECIMIENTO CRONICO -->
        <input type="text"  name="padecimiento" class="form-control" placeholder="Padecimiento Cronico o Degenerativo" required>
      </div>

      <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">
            
        <input type="date"  name="fecha_nacimiento"  class="form-control" data-toggle="tooltip" data-placement="top"
  title="Fecha de Nacimiento" required>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">
            
        <input type="text" name="sangre"  class="form-control" placeholder="Tipo De Sangre" required>
      </div>      

      <div class="col-sm-12 col-md-6 col-lg-12 ">
        <input type="text"  name="observaciones" class="form-control" placeholder="Observaciones" required>
      </div>

    </div>
<div class="form-row mb-2"> 
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-info my-4 btn-block" type="submit" name="nuevo_paciente"><strong>AGREGAR</strong></button>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-danger my-4 btn-block" type="reset"><strong>CANCELAR</strong></button>
    </div>
</div>
</form>
 
        </div>
     </div>
</div>

  <div class="tab-pane fade" id="evento" role="tabpanel" aria-labelledby="pills-profile-tab">
<div class="card mt-3">
  <div class="card-body">
<form class="text-center border border-light p-5 " method="post">
    <p class="h4 mb-4">PROGRAMAR EVENTO</p>
    <div class="form-row mb-2">
       
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <input type="text"  name="tema" class="form-control" placeholder="Tema">
        </div>

        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
        <input type="date" name="fecha"  class="form-control" data-toggle="tooltip" data-placement="top"
        title="Fecha programada" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-3 ">
            <input type="text" name="tipo" class="form-control" placeholder="Tipo de Evento" required>
        </div>
        
        <div class="col-sm-12 col-md-6 col-lg-2">
        <select class="browser-default custom-select" name="carrera" required>
            <option selected>CARRERA</option>
            <?php $r = new mvcControlador(); $r->query_carrera_controlador(); ?>
        </select>
        </div>

    </div>

    <div class="form-row mb-2">
      <div class="col-12">
        <input type="text" name="descripcion" class="form-control" placeholder="Descripción del Evento" required>
      </div>
    </div>

    <div class="form-row mb-2">
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-info my-4 btn-block" type="submit" name="prog_evento_medico"><strong>AGREGAR EVENTO</strong></button>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-danger my-4 btn-block" type="reset"><strong>CANCELAR</strong></button>
    </div>
    </div>
</form>
 </div>
</div>
<!-- FORMULARIO REGISTRAR EVENTO -->
</div>
<!-- SECCIÓN 4 -->
<div class="tab-pane fade" id="inventario" role="tabpanel" aria-labelledby="pills-home-tab">
<!-- CONTROLES PARA EL FORMULARIO -->
<!--FORMULARIO REGISTRA ARTICULO-->
<div class="card mt-3">
  <div class="card-body">
<form class="text-center border border-light p-5" method="post">
    <p class="h4 mb-4">AGREGAR ARTICULO</p>
    <div class="form-row mb-2">
      
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <input type="text" name="codigo" class="form-control" placeholder="Codigo" required>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4 mb-3 ">
            <input type="text" name="activo" class="form-control" placeholder="Activo" required>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-2 mb-3">
        <select class="browser-default custom-select" name="grupo" required>
            <option selected>GRUPO</option>
            <option value="GRUPO I">GRUPO I</option>
            <option value="GRUPO II">GRUPO II</option>
            <option value="GRUPO III">GRUPO III</option>
            <option value="GRUPO IV">GRUPO IV</option>
            <option value="GRUPO V">GRUPO V</option>
            <option value="GRUPO VI">GRUPO VI</option>
        </select>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-5 mb-3 ">
            <!-- Last name -->
            <input type="text" name="presentacion" class="form-control" placeholder="Presentación" required>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-2 mb-3 ">
            <!-- Last name -->
            <input type="number" name="cantidad" min="1" pattern="^[0-9]+" class="form-control" placeholder="Cantidad" required>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-5 mb-3">
        <input type="date" name="fecha"  class="form-control" data-toggle="tooltip" data-placement="top"
        title="Fecha Alta" required>        
        </div>
        
        <div class="col-12">
         <input type="text" name="observaciones" class="form-control" placeholder="Observaciones" required>

        </div>
    </div>
    <!-- Sign up button -->
    <div class="form-row mb-2">
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-info my-4 btn-block" type="submit" name="add_articulo_medico"><strong>AGERGAR</strong></button>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-danger my-4 btn-block" type="submit"><strong>CANCELAR</strong></button>
    </div>
    </div>
</form>
</div>
</div>
  </div>
  </div>
</div>
</div>
</div>











 <!--******************************************SEGUNDA SECCIÓN**************************************************************************************** -->

  </div>


  <div class="tab-pane fade" id="consultar_informacion" role="tabpanel" aria-labelledby="pills-profile-tab">


<!--EMPIEZA LA TARJETA QUE ENCIERRA TODA LA SEGUNDA SECCIÓN -->
<!-- INICIA SEGUNDO NAVBAR ¿QUE ES PARA LOS REPORTES? -->
  <div class="card mt-1 ">
  <!-- Card-header -->
  <div class="card-header bg-dark text-white"><strong>CONSULTAR INFORMACIÓN </strong></div>
  <!-- Card content -->
  <div class="card-body">
 <!-- ROW DEL TITULO -->
<ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab2" data-toggle="pill" href="#eventos" role="tab"
      aria-controls="pills-home" aria-selected="true"><strong>Eventos Programados</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab2" data-toggle="pill" href="#pacientes" role="tab"
      aria-controls="pills-profile" aria-selected="false"><strong>Pacientes</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab2" data-toggle="pill" href="#consultas" role="tab"
      aria-controls="pills-contact" aria-selected="false"><strong>Consultas</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab2" data-toggle="pill" href="#inventarioss" role="tab"
      aria-controls="pills-contact" aria-selected="false"><strong>Inventario</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab2" data-toggle="pill" href="#realizados" role="tab"
      aria-controls="pills-contact" aria-selected="false"><strong>Eventos realizados / No realizados</strong></a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">


  <!-- INICIA SECCIÓN DE EVENTOS--------------------------------------------------- -->

  <div class="tab-pane fade show active" id="eventos" role="tabpanel" aria-labelledby="pills-home-tab">

    <!-- EMPIEZA CONTROLES DE FECHA PARA FILTRAR RESULTADOS -->
<div class="card mt-2 mb-1 rounded">
  <div class="card-body bg-info">
    <h4 class="text-white text-center"><strong><i class="far  fa-calendar-alt"></i> CALENDARIO DE VENTOS</strong></h4>
</div>
</div>



<?php $r = new mvcControlador(); $r->query_eventos_medico_controlador(); ?>


  </div>
  <div class="tab-pane fade" id="pacientes" role="tabpanel" aria-labelledby="pills-profile-tab"> <!-- EMPIEZA VER PACIENTES REGISTRADOS -->

<div class="card mt-2 mb-5 ">
  <!-- Card content -->
  <!-- Card header -->
  <div class="card-header text-center btn-mdb-color text-white"><strong>FILTRADO POR FECHA AÑADIDOS</strong>  </div>
  <div class="card-body bg-info">
      <form class="form-inline">

<div class="col-md-6 col-lg-1 col-sm-3">
   <label class="text-white"><strong>DE:</strong></label> 
</div>
<div class="col-sm-12 col-md-6 col-lg-3">
   <input type="date" class="form-control" name="fecha1_pacientes" id="fecha1_pacientes">
</div>
<div class="col-md-6 col-lg-1 col-sm-2">
   <label class="text-white"><strong>A:</strong></label> 
</div>
<div class="col-sm-12 col-md-6 col-lg-3 mt-1">
  <input type="date" class="form-control" name="fecha2_pacientes" id="fecha2_pacientes">
</div>
<div class="col-auto">
    <a href="index.php?accion=print_pacientes"  class="btn btn-active btn-sm btn-block  text-white"> <i class="fas fa-print fa-2x"> </i> <strong class="h6"> - PREPARAR REPORTE</strong></a>
</div>
       </form>
  </div><!-- Card content -->
</div>
  <!-- TERMINA CONTROLES DE FECHA PARA FILTRAR RESULTADOS -->
<div id="res_pac"></div>





  </div><!-- TERMINA VER PACIENTES REGISTRADOS -->

<!-- VER TODAS LAS CONSULTAS -->

  <div class="tab-pane fade" id="consultas" role="tabpanel" aria-labelledby="pills-contact-tab">


       <!-- EMPIEZA CONTROLES DE FECHA PARA FILTRAR RESULTADOS -->
<div class="card mt-2 mb-5">
  <!-- Card content -->
  <!-- Card header -->
  <div class="card-header text-center btn-mdb-color text-white"><strong>FILTRADO POR FECHA CONSULTAS MEDICAS</strong> </div>
  <div class="card-body bg-info">
    <form class="form-inline">
<div class="col-md-6 col-lg-1 col-sm-3">
   <label class="text-white"><strong>DE:</strong></label> 
</div>
<div class="col-sm-12 col-md-6 col-lg-3">
   <input type="date" class="form-control" name="fecha1_con" id="fecha1_con">
</div>
<div class="col-md-6 col-lg-1 col-sm-2">
   <label class="text-white"><strong>A:</strong></label> 
</div>
<div class="col-sm-12 col-md-6 col-lg-3 ">
  <input type="date" class="form-control" name="fecha2_con" id="fecha2_con">
</div>
<div class="col-auto">
    <a href="index.php?accion=reporte_consultas"  class="btn btn-active btn-sm btn-block  text-white"> <i class="fas fa-print fa-2x"> </i> <strong class="h6"> - PREPARAR REPORTE</strong></a>
</div>
</form>
  </div><!-- Card content -->
</div>

  <!-- TERMINA CONTROLES DE FECHA PARA FILTRAR RESULTADOS -->
<div id="r_con_medica"></div>
<!-- INICIA CARD CONSULTAS REALIZADAS -->



</div>
<!-- TERMINA VER TODAS LAS CONSULTAS -->

  <div class="tab-pane fade" id="inventarioss" role="tabpanel" aria-labelledby="pills-contact-tab">

<div class="card mt-2 mb-5">
  <!-- Card content -->
  <!-- Card header -->
  <div class="card-header text-center btn-mdb-color text-white"><strong>FILTRADO POR FECHA</strong></div>
  <div class="card-body bg-info">
    <form class="form-inline">
<div class="col-md-6 col-lg-1 col-sm-3">
   <label class="text-white"><strong>DE:</strong></label> 
</div>
<div class="col-sm-12 col-md-6 col-lg-3">
   <input type="date" class="form-control" name="fecha1_con" id="inv_med_date1">
</div>
<div class="col-md-6 col-lg-1 col-sm-2">
   <label class="text-white"><strong>A:</strong></label> 
</div>
<div class="col-sm-12 col-md-6 col-lg-3 mt-1">
  <input type="date" class="form-control" name="fecha2_con" id="inv_med_date2">
</div>
<div class="col-auto">
    <a href="index.php?accion=inventario_medico"  class="btn btn-active btn-sm btn-block  text-white"> <i class="fas fa-print fa-2x"> </i> <strong class="h6"> - PREPARAR REPORTE</strong></a>
</div>
</form>
  </div><!-- Card content -->
</div>



<div class="card mt-5 mb-2">
  <div class="card-body bg-success">
  <h4 class="text-white text-center"><i class="fas fa-cash-register"></i> <strong> EXISTENCIA</strong></h4></div></div>

<div id="ex_inv_med"></div>



<br>
<div class="card mt-5 mb-2">
  <div class="card-body bg-danger">
  <h4 class="text-white text-center"><i class="far fa-times-circle"></i> <strong> ELIMINADOS</strong></h4></div></div>

<div id="del_inv_med"></div>




</div><!-- TERMINA TAB-3 -->

<!-- INICIA SECCIÓN DE EVENTOS--------------------------------------------------- -->

  <div class="tab-pane fade" id="realizados" role="tabpanel" aria-labelledby="pills-home-tab">

    <!-- EMPIEZA CONTROLES DE FECHA PARA FILTRAR RESULTADOS -->
<div class="card mt-2 mb-5 ">
  <!-- Card content -->
  <!-- Card header -->
  <div class="card-header text-center btn-mdb-color text-white"><strong>FILTRADO POR FECHA DE EVENTOS</strong></div>
  <div class="card-body">
      <form action="" method="post" class="form-inline">
<div class="col-md-6 col-lg-1 col-sm-3">
   <label><strong>DE:</strong></label> 
</div>
<div class="col-sm-12 col-md-6 col-lg-3">
   <input type="date" class="form-control" id="date_eve_m1">
</div>
<div class="col-md-6 col-lg-1 col-sm-2">
   <label><strong>A:</strong></label> 
</div>
<div class="col-sm-12 col-md-6 col-lg-3 mt-1">
  <input type="date" class="form-control" id="date_eve_m2">
</div>
       </form>
  </div>
</div>
  <!-- TERMINA CONTROLES DE FECHA PARA FILTRAR RESULTADOS -->
<div class="card mt-5 mb-2">
  <div class="card-body bg-success">
  <h4 class="text-white text-center"><i class="fas fa-marker"></i> <strong> REALIZADOS</strong></h4></div></div>

  <div id="r_eventosm"></div>

<!-- Termina CARD EVENTOS -->
<div class="card mt-5 mb-2">
  <div class="card-body bg-danger">
  <h4 class="text-white text-center"><i class="far fa-times-circle"></i> <strong> NO REALIZADOS</strong></h4></div></div>

  <div id="r_no_party"></div>





  </div><!-- TERMINA SECCIÓN DE EVENTOS -->

</div>

  </div>
</div>
  </div>
</div>

