<div class="card mt-1 mb-3">
<?php 
session_start();
if(!$_SESSION["validate_difusion"] ){
  header("location:index.php?action=login");
 exit(); 
}

if(isset($_GET["accion"])){ 
      if($_GET["accion"]=="ok_iems"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight"  role="alert">
<strong>  ¡ REGISTRO DE IEMS EXITOSO ! </strong></div>
';
 }
    if($_GET["accion"]=="no_iems"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ REGISTRO DE IEMS FALLIDO ! </strong></div>
';
 }

     if($_GET["accion"]=="no_art_difusion"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ REGISTRO DE ARTICULO PARA INVENTARIO FALLIDO ! </strong></div>
';
 }

      if($_GET["accion"]=="ok_art_difusion"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ REGISTRO DE ARTICULO PARA INVENTARIO EXITOSO ! </strong></div>
';
 }

       if($_GET["accion"]=="ok_pre-registro"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ REGISTRO DE ASPIRANTE EXITOSO ! </strong></div>
';
 }

       if($_GET["accion"]=="no_pre-registro"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ REGISTRO DE ASPIRANTE FALLIDO ! </strong></div>
';
 }

        if($_GET["accion"]=="ok_programa_evento"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>   ¡ EVENTO PROGRAMADO CON EXITO ! </strong></div>
';
 }

        if($_GET["accion"]=="no_programa_evento"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡EL EVENTO EVENTO NO FUE PROGRAMADO  ! </strong></div>
';
 }

         if($_GET["accion"]=="ok_update_iems"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>   ¡ EDICIÓN EXITOSA ! </strong></div>
';
 }

        if($_GET["accion"]=="no_update_iems"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ERROR, LA EDICIÓN NO FUE REALIZADA  ! </strong></div>
';
 }


         if($_GET["accion"]=="ok_confirm_ingreso"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>   ¡ INGRESO CONFIRMADO ! </strong></div>
';
 }

        if($_GET["accion"]=="no_confirm_ingreso"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ERROR, EL INGRESO NO SE PUDO CONFIRMAR  ! </strong></div>
';
 }

          if($_GET["accion"]=="ok_more_item"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>   ¡ AGREGADO DE ARTICULOS EXITOSO! </strong></div>
';
 }

        if($_GET["accion"]=="no_more_item"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ERROR, EL ARTICULO NO SE PUDO AGREGAR  ! </strong></div>
';
 }

           if($_GET["accion"]=="ok_del_item_dif"){ 
         echo '
<div class="card-header bg-warning text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>   ¡ BORRADO DE ARTICULOS REALIZADO! </strong></div>
';
 }

        if($_GET["accion"]=="no_del_item_dif"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ERROR, NO SEPUDO REALIZAR EL BORRADO ! </strong></div>
';
 }

            if($_GET["accion"]=="ok_no_realizado_difusion"){ 
         echo '
<div class="card-header bg-warning text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>   ¡ CONFIRMACIÓN DE NO REALIZACIÓN DEL EVENTO REALIZADA! </strong></div>
';
 }

        if($_GET["accion"]=="no_no_realizado_difusion"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ERROR, NO SE PÚDO CONFIRMAR EVENTO NO REALIZADO ! </strong></div>
';
 }

             if($_GET["accion"]=="okconfirmed_evento_difusion"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>   ¡ CONFIRMACIÓN DE REALIZACIÓN DEL EVENTO HECHA! </strong></div>
';
 }

        if($_GET["accion"]=="noconfirmed_evento_difusion"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ERROR, NO SE PÚDO CONFIRMAR EL EVENTO  REALIZADO ! </strong></div>
';
 }

        if($_GET["accion"]=="duplucate_iems"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ERROR, NO SE ADMITEN CLAVES NI NOMBRES DUPLICADOS . VERIFICA TUS DATOS E INTENTALO NUEVAMENTE ! </strong></div>
';
 }

        if($_GET["accion"]=="dupli_item_difusion"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ERROR, YA HAY UN ITEM CON ESA CLAVE EN EL INVENTARIO, VERIFICA E INTENTALO NUEVAMENTE ! </strong></div>
';
 }  

         if($_GET["accion"]=="eso_no_es_una_imagen_¬¬"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ERROR, SOLO SE ADMITEN FORMATOS DE IMAGEN! </strong></div>
';
 } 

         if($_GET["accion"]=="sobre_peso_detected"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ERROR, SOLO SE ADMITEN IMAGENES CON MENOS DE 1 MB DE PESO! </strong></div>
';
 }  

         if($_GET["accion"]=="no_menos_cero_items_difusion"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ERROR, NO PUEDES QUITAR MÁS ARTÍCULOS DE LOS QUE EXISTEN! </strong></div>
';
 }  


 
  }

$noti = new mvcControlador();
$noti->menos_articulos_difusion_controlador();

 ?>
  <div class="card-body">
     <!-- ROW DEL TITULO -->
   <div class="row mt-3 rounded mb-4 bg-white bordered">
    <div class="col-6 mt-1">
      <img src="img/logo.png" height="90px" width="320px" alt="">
    </div>
    <div class="col-auto mt-4 text-center">
  <h1><strong>ÁREA DE DIFUSIÓN</strong><br></h1>
    <a href="index.php?accion=login" target="_top">CERRAR SESIÓN </a> 
<?php
$noti = new mvcControlador();
$noti->registro_iems_controlador();
$noti -> registro_articulo_iems_controlador();
$noti-> pre_registro_controlador();
$noti->prog_new_ev_dif_controlador();
$noti->update_iems_controlador();
$noti->confirma_ingreso_difusion_controlador();
$noti->mas_articulos_difusion_controlador();
$noti->evento_no_difusion_controlador();
$noti->evento_realizado_difusion_controlador();






?>
    </div>
    </div>
  </div>
</div>
<!-- TERMINA CARD QUE ENVUELVE AL TITULO -->
<div class="card mt-3 mb-3">
  <div class="card-body ">

  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
   
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#nuevos_registros" role="tab"
      aria-controls="pills-home" aria-selected="true"><strong><h5>NUEVOS REGISTROS</h5></strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#consultar_informacion" role="tab"
      aria-controls="pills-profile" aria-selected="false"><strong><h5>CONSULTAR INFORMACIÓN</h5></strong></a>
  </li>

</ul>
</div>
</div>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="nuevos_registros" role="tabpanel" aria-labelledby="pills-home-tab">
 <!--EMPIEZA LA TARJETA QUE ENCIERRA TODA LA PRIMERA SECCIÓN -->
  
  <div class="card mt-1 mb-5 ">
  <div class="card-header bg-dark text-white"><strong>NUEVOS REGISTROS</strong></div>
  <div class="card-body">
<div class="col-auto mb-5">
<ul class="nav nav-pills mb-3 bg-white" id="pills-tab-add" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#aspirante" role="tab"
      aria-controls="pills-home" aria-selected="true"><strong>Pre-registro aspirantes</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#iems" role="tab"
      aria-controls="pills-profile" aria-selected="false"><strong>Nuevo IEMS</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#evento" role="tab"
      aria-controls="pills-profile" aria-selected="false"><strong>Nuevo evento</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#add-articulo" role="tab"
      aria-controls="pills-profile" aria-selected="false"><strong>Nuevo articulo para inventario</strong></a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">

  <div class="tab-pane fade show active" id="aspirante" role="tabpanel" aria-labelledby="pills-home-tab">


<!-- SECCION 1 CONSULTAR CLAVE IEMS PARA AGREGAR PRE-REGISTRO-->
<!-- EMPIEZA CONTROLES DE FECHA PARA FILTRAR RESULTADOS -->
<div class="card mt-2 mb-5">
  <!-- Card content -->
  <div class="card-body bg-info">
          <div class="col-auto">
            <label class="text-white"><strong>NOTA: Seleccionar IEMS antes de realizar el registro</strong></label>
        <select class="browser-default custom-select" name="iems_pre" id="iems_pre">
            <option selected>SLECCIONAR IEMS</option>
         <?php $r = new mvcControlador(); $r-> query_iems_controlador(); ?>
        </select>
      </div>
  </div><!-- Card content -->
</div>
  <!-- VISUALIZANDO DATOS ANTES DE AGREGAR PRE-REGISTRO -->
<!-- Card-ASPIRANTE -->
<div id="r_iems_pre"></div>







  </div>
  <!-- TERMINA SECCION 1 (TAB-PANE) -->

  <!-- SECCION 2 -->
  <div class="tab-pane fade" id="iems" role="tabpanel" aria-labelledby="pills-profile-tab">


<!--FORMULARIO REGISTRA NUEVO IEMS------------ -->
<div class="card mt-3">    
  <!-- Card content -->
  <div class="card-body">
<form class="text-center border border-light p-5" method="post" enctype="multipart/form-data">
  <p class="h4 mb-4">AGERGAR IEMS</p>
    <div class="form-row mb-2">
       
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <!-- matricula -->
            <input type="text" name="clave_iems" class="form-control" placeholder="Clave IEMS" required>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
            <!-- First name -->
            <input type="text" name="nom_iems" class="form-control" placeholder="Nombre de IEMS" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-5 mb-3 ">
            <!-- Last name -->
            <input type="text"  name="direc_iems" class="form-control" placeholder="Dirección" required>
        </div>
        
        <div class="col-sm-12 col-md-6 col-lg-3">
          <input type="text" min="1" minlength="10" pattern="\d{3}[\-]\d{3}[\-]\d{4}"  name="tel1_iems" class="form-control" placeholder="#Tel.: 249-112-1212" required>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-3">
          <input type="text" min="1" minlength="10" pattern="\d{3}[\-]\d{3}[\-]\d{4}" name="tel2_iems" class="form-control" placeholder="# Tel2.: 249-112-1212" required>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6">
          <input type="text" name="nom_coor_iems" class="form-control" placeholder="Nombre completo del coordinador" required>
        </div>

    </div>

    <div class="form-row mb-2">
      <div class="col-sm-12 col-md-6 col-lg-2 mb-3 ">
            <!-- RH -->
        <input type="text" name="dist_iems" min="1" pattern="^[0-9]+" class="form-control" placeholder="Distancia KM" required>
      </div>

      <div class="col-sm-12 col-md-6 col-lg-2 mb-3 ">
        <input type="text" name="cp_iems" class="form-control" min="1" pattern="^[0-9]+" placeholder="Código postal" required>
      </div>

      <div class="col-sm-12 col-md-12 col-lg-4 mb-2">
          <input type="text" name="mun_iems" class="form-control" placeholder="Municipio" required>
      </div>

      <div class="col-sm-12 col-md-12 col-lg-4 mb-2">
          <input type="text" name="loc_iems" class="form-control" placeholder="Localidad" required>
      </div>

      <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
          <input type="text" name="zona_inf" class="form-control" placeholder="Zona de influencia" required>
      </div>

      <div class="col-sm-12 col-md-6 col-lg-4 mb-2">
          <input type="text" name="serv_iems" class="form-control" placeholder="Servicio educativo" required>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-5 mb-2">
          <input type="mail" name="mail_iems" class="form-control" placeholder="E-mail" required>
      </div>

      <div class="col-12 mb-3 mt-3">
            <!-- PRIMER VEZ -->
        <input type="text" name="observ_iems" class="form-control" placeholder="Observaciones" required>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="col-12 mb-3">

<!-- INPUT IMAGEN -->
<div class="input-default-wrapper mt-3">
  <span class="input-group-text mb-3" id="input1">Imagen de ruta</span>
  <input type="file" name="ruta" id="file-with-current" class="input-default-js" required>
  <label class="label-for-default-js rounded-right mb-3" for="file-with-current"><span class="span-choose-file">Seleccionar 
    imagen</span>
    <div class="float-right span-browse btn-secondary text-white"><strong>Buscar en el dispositivo</strong></div>
  </label>
</div>
<!-- INPUT IMAGEN -->



      </div>
    </div>
<div class="form-row mb-2"> 
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-info my-4 btn-block" type="submit" name="save_iems"><strong>AGREGAR </strong></button>
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

<div class="card mt-2 mb-5">
  <!-- Card content -->
  <div class="card-body bg-info">
          <div class="col-auto">
            <label class="text-white"><strong>NOTA: Seleccionar IEMS antes de programar el evento</strong></label>
        <select class="browser-default custom-select" name="iems_pre" id="iems_event">
            <option selected>SLECCIONAR IEMS</option>
         <?php $r = new mvcControlador(); $r-> query_iems_controlador(); ?>
        </select>
      </div>
  </div><!-- Card content -->
</div>   

<div id="r_iems_ev"></div>


<!-- FORMULARIO PARA PROGRAMAR NUEVO EVENTO -->




  </div>

<!-- SECCIÓN 4 -->
  <div class="tab-pane fade" id="add-articulo" role="tabpanel" aria-labelledby="pills-home-tab">


<!--FORMULARIO REGISTRAR ARTICULO-->
<div class="card mt-3">
  <div class="card-body">
<form class="text-center border border-light p-5" method="post">
    <p class="h4 mb-4">AGREGAR A INVENTARIO</p>
    <div class="form-row mb-2">
      
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <input type="text" name="codigo" class="form-control" placeholder="Codigo" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-3 ">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-2 mb-3 ">
            <input type="number" name="cantidad" class="form-control" min="1" pattern="^[0-9]+" placeholder="Cantidad" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 ">
        <input type="date" name="fecha"   class="form-control" data-toggle="tooltip" data-placement="top"
        title="Fecha Alta" required>
        </div>

        <div class="col-12 mb-3 ">
            <input type="text" name="descripcion" class="form-control" placeholder="Decripción" required>
        </div>
    </div>
    <!-- Sign up button -->
    <div class="form-row mb-2">
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-info my-4 btn-block" type="submit" name="add_inventario_difusion"><strong>AGREGAR</strong></button>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-danger my-4 btn-block" type="reset"><strong>CANCELAR</strong></button>
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
  </div>

  <div class="tab-pane fade" id="consultar_informacion" role="tabpanel" aria-labelledby="pills-profile-tab">

  <div class="card mt-3 mb-5 ">
  <!-- Card-header -->
  <div class="card-header bg-dark text-white"><strong>CONSULTAR INFORMACIÓN</strong></div>
  <!-- Card content -->
  <div class="card-body">
 <!-- ROW DEL TITULO -->
<ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab2" data-toggle="pill" href="#eventos" role="tab"
      aria-controls="pills-home" aria-selected="true"><strong>Eventos programados</strong></a>
  </li>
    <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab3" data-toggle="pill" href="#eventos-" role="tab"
      aria-controls="pills-contact" aria-selected="false"><strong>Eventos realizados / no realizados</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab2" data-toggle="pill" href="#escuelas" role="tab"
      aria-controls="pills-profile" aria-selected="false"><strong>IEMS registrados</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab2" data-toggle="pill" href="#aspirantes" role="tab"
      aria-controls="pills-contact" aria-selected="false"><strong>Ver pre-registros de aspirantes</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab2" data-toggle="pill" href="#inventarios" role="tab"
      aria-controls="pills-contact" aria-selected="false"><strong>Inventario</strong></a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">


  <!-- INICIA SECCIÓN DE EVENTOS--------------------------------------------------- -->

  <div class="tab-pane fade show active" id="eventos" role="tabpanel" aria-labelledby="pills-home-tab">

<?php $r = new mvcControlador(); $r -> query_eventos_difusion_controlador(); ?>

  </div><!-- TERMINA SECCIÓN DE EVENTOS -->

<!--EVENTOS -->
  <div class="tab-pane fade" id="eventos-" role="tabpanel" aria-labelledby="pills-contact-tab">

<!-- EMPIEZA CONTROLES DE FECHA PARA FILTRAR RESULTADOS -->
<div class="card mt-2 mb-3">
  <!-- Card content -->
  <div class="card-body bg-info">
      <form action="" method="post" class="form-inline">

<div class="col-md-6 col-lg-1 col-sm-3">
   <label><strong class="text-white">DE:</strong></label> 
</div>
<div class="col-sm-12 col-md-6 col-lg-3" >
   <input type="date" class="form-control" id="f_evsi_1">
</div>
<div class="col-md-6 col-lg-1 col-sm-2">
   <label><strong class="text-white">A:</strong></label> 
</div>
<div class="col-sm-12 col-md-6 col-lg-3 mt-1">
  <input type="date" class="form-control" id="f_evsi_2">
</div>
<div class="col-auto ">
    <a href="index.php?accion=eventos_difusion"  class="btn btn-active btn-sm btn-block  text-white"> <i class="fas fa-print fa-2x"> </i> <strong class="h6"> - PREPARAR REPORTE</strong></a>
</div>
       </form>
  </div><!-- Card content -->
</div>
<!-- TERMINA CONTROLES DE FECHA PARA FILTRAR RESULTADOS -->


<div class="card  mb-2">
  <div class="card-body bg-success">
  <h4 class="text-white text-center"><i class="fas fa-calendar-check"></i> <strong> REALIZADOS</strong></h4></div></div>

<div id="r_evsi_difu"></div>




<div class="card mt-4 mb-2">
  <div class="card-body bg-danger">
  <h4 class="text-white text-center"><i class="fas fa-times-circle"></i> <strong> NO REALIZADOS</strong></h4></div></div>

  <div id="r_noeve"></div>




  </div>
  

  <div class="tab-pane fade" id="escuelas" role="tabpanel" aria-labelledby="pills-profile-tab"> <!-- EMPIEZA VER PACIENTES REGISTRADOS -->

<!-- EMPIEZA CONTROLES DE FECHA PARA FILTRAR RESULTADOS -->
<div class="card mt-2 mb-5">
  <!-- Card content -->
  <div class="card-body bg-info">
  <div class="col-12">
    <label class=text-white><strong>BUSCAR IEMS POR: NOMBRE, CLAVE, EMAIL, LOCALIDAD O MUNICIPIO</strong></label>
<input type="text" class="form-control" name="iems_query" id="iems_query" placeholder="BUSCAR IEMS POR: NOMBRE, CLAVE, EMAIL, LOCALIDAD O MUNICIPIO">
      </div>
  </div><!-- Card content -->
</div>
<!-- TERMINA CONTROLES DE FECHA PARA FILTRAR RESULTADOS -->

<div id="r_query_iems">
<!-- INICIA CARD PARA IEMS ----------------------------------------------------->
<!-- TERMINA CARD PARA IEMS ----------------------------------------------------------------------------->
</div>





  </div><!-- TERMINA VER PACIENTES REGISTRADOS -->

<!-- VER TODAS LAS CONSULTAS -->

  <div class="tab-pane fade" id="aspirantes" role="tabpanel" aria-labelledby="pills-contact-tab">
<!-- EMPIEZA CONTROLES DE FECHA PARA FILTRAR RESULTADOS -->

<!-- EMPIEZA CONTROLES DE FECHA PARA FILTRAR RESULTADOS -->
<div class="card mt-2 mb-1">
  <!-- Card content -->
  <div class="card-body bg-info">
<form  class="form-inline">
<div class="col-md-6 col-lg-1 col-sm-3">
   <label><strong class="text-white">DE:</strong></label> 
</div>
<div class="col-sm-12 col-md-6 col-lg-3">
   <input type="date" class="form-control" id="fecha1_pre" name="fecha1_pre">
</div>
<div class="col-md-6 col-lg-1 col-sm-2">
   <label><strong class="text-white">A:</strong></label> 
</div>
<div class="col-sm-12 col-md-6 col-lg-3 mt-1">
  <input type="date" class="form-control" id="fecha2_pre" name="fecha2_pre">
</div>
<div class="col-auto ">
    <a href="index.php?accion=reporte_ingresos"  class="btn btn-active btn-sm btn-block  text-white"> <i class="fas fa-print fa-2x"> </i> <strong class="h6"> - PREPARAR REPORTE</strong></a>
</div>
</form>
  </div><!-- Card content -->
</div>
<!-- TERMINA CONTROLES DE FECHA PARA FILTRAR RESULTADOS -->

<!-- CARD DE ASPIRANTES -->
<div class="card mt-1 mb-2">
  <div class="card-body bg-secondary">
  <h4 class="text-white text-center"><i class="fas fa-users"></i> <strong> ASPIRANTES</strong></h4></div></div>
<div id="r_pre_difu"></div>

<!-- Card-Articulo-Inventario -->
<!-- TERMINA CARD ASPIRANTES -->



<!-- CARD DE ASPIRANTES -->
<div class="card mt-5 mb-2">
  <div class="card-body bg-success">
  <h4 class="text-white text-center"><i class="fas fa-school"></i> <strong> INGRESADOS</strong></h4></div></div>
<div id="r_ingresos"></div>


  </div>
<!-- TERMINA VER TODAS LAS CONSULTAS -->

  <div class="tab-pane fade" id="inventarios" role="tabpanel" aria-labelledby="pills-contact-tab">

<!-- EMPIEZA CONTROLES DE FECHA PARA FILTRAR RESULTADOS -->
<div class="card mt-2 mb-1">
  <!-- Card content -->
  <div class="card-body bg-info">
      <form  class="form-inline">

<div class="col-md-6 col-lg-1 col-sm-3">
   <label><strong class="text-white">DE:</strong></label> 
</div>
<div class="col-sm-12 col-md-6 col-lg-3">
   <input type="date" class="form-control" id="date_1_difu">
</div>
<div class="col-md-6 col-lg-1 col-sm-2">
   <label><strong class="text-white">A:</strong></label> 
</div>
<div class="col-sm-12 col-md-6 col-lg-3 mt-1">
  <input type="date" class="form-control" id="date_2_difu">
</div>
<div class="col-lg-auto col-md-12 mt-1 ">
    <a href="index.php?accion=inventario_difusion"  class="btn btn-active btn-sm btn-block  text-white"> <i class="fas fa-print fa-2x"> </i> <strong class="h6"> - PREPARAR REPORTE</strong></a>
</div>
       </form>
  </div><!-- Card content -->
</div>
<!-- TERMINA CONTROLES DE FECHA PARA FILTRAR RESULTADOS -->
<div class="card mt-2 mb-1">
<div class="card-body bg-success">
<h4 class="text-white text-center"><i class="fas fa-newspaper"></i> <strong> EN EXISTENCIA </strong></h4>
</div></div>
<div id="r_inv_difu"></div>



<br><br>
<div class="card mt-2 mb-1">
<div class="card-body bg-danger">
<h4 class="text-white text-center"> <i class="fas fa-trash-alt fa-x2"> </i> <strong> ELIMINADOS </strong></h4>
</div></div>
<div id="del_inv_difu"></div>



</div><!-- TERMINA TAB-3 -->
</div>
<!--TERMINA LA TARJETA QUE ENCIERRA TODA LA PRIMERA SECCIÓN -->
</div>
</div>


  </div>










<!-- //SECCION INCOMPLETA POR FALTA DE TIEMPO Y MOTIVACIÓN -->




  <div class="tab-pane fade" id="reportes_graficas" role="tabpanel" aria-labelledby="pills-profile-tab">

<!--******************************************TERCERA SECCIÓN**************************************************************************************** -->

  <!--EMPIEZA LA TARJETA QUE ENCIERRA TODA LA SEGUNDA SECCIÓN -->
<!-- INICIA SEGUNDO NAVBAR ¿QUE ES PARA LOS REPORTES? -->
  <div class="card mt-2 ">
  <!-- Card-header -->
  <div class="card-header bg-dark text-white"><strong>VER E IMPRIMIR GRAFICAS Y REPORTES</strong></div>
  <!-- Card content -->
  <div class="card-body">
 <!-- ROW DEL TITULO -->
<ul class="nav nav-pills mb-3" id="pills-tab3" role="tablist">
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab3" data-toggle="pill" href="#grafica-p" role="tab"
      aria-controls="pills-profile" aria-selected="false"><strong>Grafica pre-registros</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab3" data-toggle="pill" href="#grafica-e" role="tab"
      aria-controls="pills-contact" aria-selected="false"><strong>Grafica de eventos</strong></a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">


  

  <div class="tab-pane fade" id="grafica-p" role="tabpanel" aria-labelledby="pills-profile-tab"> <!-- EMPIEZA VER PACIENTES REGISTRADOS -->
GRAFICA PRE REGISTROS
  
<!-- EMPIEZA CONTROLES DE FECHA PARA FILTRAR RESULTADOS -->
<div class="card mt-2 mb-5">
  <!-- Card content -->
  <div class="card-body">
      <form action="" method="post" class="form-inline">

<div class="col-md-6 col-lg-1 col-sm-3">
   <label><strong>DE:</strong></label> 
</div>
<div class="col-sm-12 col-md-6 col-lg-3">
   <input type="date" class="form-control">
</div>
<div class="col-md-6 col-lg-1 col-sm-2">
   <label><strong>A:</strong></label> 
</div>
<div class="col-sm-12 col-md-6 col-lg-3 mt-1">
  <input type="date" class="form-control">
</div>
<div class="col-sm-12 col-md-12 col-lg-3 mt-1">
   <button class="btn btn-success btn-block btn-md"><i class="fas fa-search"></i><h7><strong> CONSULTAR FECHA</strong></h7></button>
</div>
       </form>
  </div>
</div>
</div>

  <div class="tab-pane fade" id="grafica-e" role="tabpanel" aria-labelledby="pills-contact-tab">
GRAFICA EVENTOS
  </div>
</div>
</div>
</div>
  </div>
</div>