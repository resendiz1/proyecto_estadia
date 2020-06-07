<?php 
session_start();
if(!$_SESSION["validate_deportes"] ){
  header("location:index.php?action=login");
 exit(); 
}
?>
<!-- INICIA CARD QUE ENVUELVE AL TITULO -->
<div class="card  mb-2">
      <?php
if(isset($_GET["accion"])){ 
      if($_GET["accion"]=="ok_registro_docente"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ REGISTRO DE DOCENTE EXITOSO ! </strong></div>
';
 }
    if($_GET["accion"]=="no_registro_docente"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ REGISTRO DE DOCENTE FALLIDO ! </strong></div>
';
 }

      if($_GET["accion"]=="ok_alumno_registrado"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ REGISTRO DE ALUMNO EXITOSO ! </strong></div>
';
 }
    if($_GET["accion"]=="no_alumno_registrado"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft"  role="alert">
<strong>  ¡ REGISTRO DE ALUMNO  FALLIDO ! </strong></div>
';
 }

       if($_GET["accion"]=="ok_evento_deportes"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ REGISTRO DE EVENTO EXITOSO ! </strong></div>
';
 }
    if($_GET["accion"]=="no_evento_deportes"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ REGISTRO DE EVENTO FALLIDO ! </strong></div>
';
 }

       if($_GET["accion"]=="ok_disciplina"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ REGISTRO DE DISCIPLINA EXITOSO ! </strong></div>
';
 }
    if($_GET["accion"]=="no_disciplina"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ REGISTRO DE DISCIPLINA FALLIDO ! </strong></div>
';
 }

       if($_GET["accion"]=="ok_item_deportes"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ REGISTRO DE ARTICULO EXITOSO ! </strong></div>
';
 }
    if($_GET["accion"]=="no_item_deportes"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ REGISTRO DE ARTICULO FALLIDO ! </strong></div>
';
 }

       if($_GET["accion"]=="ok_confirmed_seleccion"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ ALUMNO AGREGADO A SELECCION CORRECTAMENTE ! </strong></div>
';
 }
    if($_GET["accion"]=="no_confirmed_seleccion"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ ERROR, NO SE PUDO AGREGAR A LA SELECCION ! </strong></div>
';
 }

       if($_GET["accion"]=="ok_update_alumno"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ ALUMNO EDITADO CORRECTAMENTE ! </strong></div>
';
 }
    if($_GET["accion"]=="no_update_alumno"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ ERROR, NO SE PUDO EDITAR AL ALUMNO ! </strong></div>
';
 }

       if($_GET["accion"]=="ok_update_count_item"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ ARTICULO AGREGADO CORRECTAMENTE ! </strong></div>
';
 }
    if($_GET["accion"]=="no_update_count_item"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ ERROR, NO SE PUDO AGREGAR EL ARTICULO ! </strong></div>
';
 }

       if($_GET["accion"]=="ok_deleted_item_deportes"){ 
         echo '
<div class="card-header bg-warning text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ ARTICULO BORRADO  CORRECTAMENTE ! </strong></div>
';
 }
    if($_GET["accion"]=="no_deleted_item_deportes"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ ERROR, NO SE PUDO BORRAR EL ARTICULO ! </strong></div>
';
 }
    if($_GET["accion"]=="duplicate_docente"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡NO SE ADMITEN # DE TRABAJADOR DUPLICADOS, INTENTA NUEVAMENTE ! </strong></div>
';
 }

    if($_GET["accion"]=="duplicate_alumno"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡NO SE ADMITEN MATRÍCULAS DUPLICADAS, VERIFICA LOS DATOS E INTENTA NUEVAMENTE ! </strong></div>
';
 }

    if($_GET["accion"]=="dupli_item_deportes"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ERROR, YA HAY UN ITEM CON ESA CLAVE EN EL INVENTARIO, VERIFICA E INTENTALO NUEVAMENTE ! </strong></div>
';
 }

     if($_GET["accion"]=="dupli_dis_deportes"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ERROR, YA EXISTE ESA DISCIPLINA, VERIFICA E INTENTALO NUEVAMENTE ! </strong></div>
';
 }

         if($_GET["accion"]=="no_es_una_imagen_¬¬"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ERROR, SOLO SE ADMITEN FORMATOS DE IMAGEN! </strong></div>
';
 } 

         if($_GET["accion"]=="sobre_peso_detectado"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ERROR, SOLO SE ADMITEN IMAGENES CON MENOS DE 1 MB DE PESO! </strong></div>
';
 } 

         if($_GET["accion"]=="no_menos_cero_items_deportes"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ERROR, NO PUEDES QUITAR MÁS ARTÍCULOS DE LOS QUE EXISTEN! </strong></div>
';
 }  



$r = new mvcControlador();
$r->menos_inventario_deportes_controlador(); 
 
}
   ?>
  <div class="card-body">
     <!-- ROW DEL TITULO -->
   <div class="row mt-3 rounded mb-4 bg-white bordered">
    <div class="col-6 ">
      <img src="img/logo.png" height="90px" width="320px" alt="">
    </div>
    <div class="col-auto mt-4">
  <h1><strong>ACTIVIDADES D. Y C.</strong></h1>
    <a href="index.php?accion=login" target="_top">CERRAR SESIÓN </a> 
<?php
  $r = new mvcControlador();
  $r -> registro_docente_deporte_controlador();
  $r->registro_alumno_deportes_controlador();
  $r->agregar_evento_deportes_controlador();
  $r->add_disciplina_deportes_controlador();
  $r->registro_articulo_deportes_controlador();
  $r->confirma_seleccion_controlador();
  $r->edita_alumno_deportes_controlador();
  $r->actualiza_inventario_deportes_controlador();

 ?>
    </div>
    </div>
  </div>
</div>
<!-- TERMINA CARD QUE ENVUELVE AL TITULO -->

<div class="card">
  <div class="card-body">
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
  <!-- Card-header -->
  <div class="card-header bg-dark text-white"><strong>NUEVOS REGISTROS</strong></div>
  <!-- Card content -->
  <div class="card-body">
 <!-- ROW DEL TITULO -->
<div class="col-auto mb-5">
<!--NAV PARA AGREGAR PACIENTE, AGREGAR CONSULTAS -->
<ul class="nav nav-pills mb-3 bg-white" id="pills-tab-add" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#aspirante" role="tab"
      aria-controls="pills-home" aria-selected="true"><strong>Agregar Alumno</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#iems" role="tab"
      aria-controls="pills-profile" aria-selected="false"><strong>Agregar Docente</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#evento" role="tab"
      aria-controls="pills-profile" aria-selected="false"><strong>Agregar Evento</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#add-articulo" role="tab"
      aria-controls="pills-profile" aria-selected="false"><strong>Nuevo articulo para inventario</strong></a>
  </li>
    <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#add-disciplina" role="tab"
      aria-controls="pills-profile" aria-selected="false"><strong>Agregar Disciplina</strong></a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">

  <div class="tab-pane fade show active" id="aspirante" role="tabpanel" aria-labelledby="pills-home-tab">


<!--FORMULARIO REGISTRAR NUEVO ALUMNO-->
<!--FORMULARIO REGISTRA NUEVO IEMS------------ -->
<div class="card mt-3">    
  <!-- Card content -->
  <div class="card-body">
<form class="text-center border border-light p-5" method="post" enctype="multipart/form-data">
  <p class="h4 mb-4">AGREGAR ALUMNO</p>
    <div class="form-row mb-2">
       
        <div class="col-sm-12 col-md-6 col-lg-2 mb-3">
            <input type="text"  minlength="8" name="matricula"   pattern="^[0-9]+"  class="form-control"  placeholder="Matrícula" required>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <input type="text"  name="nombre" class="form-control" placeholder="Nombre(s)" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-3 ">
            <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" required>
        </div>
        
        <div class="col-sm-12 col-md-6 col-lg-3 mb-2">
          <input type="text" pattern=".{18,18}" name="curp"  class="form-control"  placeholder="CURP" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-2 mb-2">
        <select class="browser-default custom-select" name="cuatrimestre" required>
            <option selected>CUATRIMESTRE</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-2 mb-2">
        <select class="browser-default custom-select" name="genero" required>
            <option selected>GÉNERO</option>
            <option value="MASCULINO">M</option>
            <option value="FEMENINO">F</option>
        </select>
        </div>

    

      <div class="col-sm-12 col-md-6 col-lg-2 mb-3 ">
            <!-- RH -->
        <input type="text" name="sangre" class="form-control" placeholder="Tipo de sangre" required>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 mb-3 ">
        <input type="text"  pattern="^[0-9]+" minlength="11"  name="nss" class="form-control"   placeholder="Num. seguro social" required>
      </div>

      <div class="col-sm-12 col-md-6 col-lg-2 mb-3">
        <select class="browser-default custom-select" name="carrera" required>
            <option selected>CARRERA</option>
            <?php $r = new mvcControlador(); $r -> query_carrera_controlador(); ?>
        </select>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-2 mb-3">
        <select class="browser-default custom-select" name="disciplina" required>
            <option selected>DISCIPLINA</option>
            <?php $r = new mvcControlador(); $r->query_disciplina_controlador();?>
        </select>
      </div>  

      <div class="col-md-12 col-lg-8 mb-3 ">
        <input type="text" name="observaciones" class="form-control" placeholder="Observaciones" required>
      </div>          
</div>
    <div class="form-row mb-2">
      <div class="col-12 mb-3">
<!-- INPUT IMAGEN -->
<div class="input-default-wrapper mt-3">
  <span class="input-group-text mb-3" id="input2">Foto</span>
  <input type="file" name="foto" id="file-with-current2" class="input-default-js" required>
  <label class="label-for-default-js rounded-right mb-3" for="file-with-current2"><span class="span-choose-file">Seleccionar 
    imagen</span>
    <div class="float-right span-browse btn-secondary text-white"><strong>Buscar en el dispositivo</strong></div>
  </label>
</div>
<!-- INPUT IMAGEN -->
      </div>
    </div>
<div class="form-row mb-2"> 
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-info my-4 btn-block" type="submit" name="add_alumno_deportes"><strong>Agregar </strong></button>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-danger my-4 btn-block" type="reset"><strong>Cancelar</strong></button>
    </div>
</div>

</form>
<!--TERMINA FORMULARIO REGISTRA NUEVO IEMS------------ -->  
        </div>
    <!-- COULUMBS -->
     </div><!-- TERMINA CARD DEL FORMULARIO -->

<!--FORMULARIO REGISTRAR NUEVO ALUMNO-->



  </div>
  <!-- TERMINA SECCION 1 (TAB-PANE) -->

  <!-- SECCION 2 -->
  <div class="tab-pane fade" id="iems" role="tabpanel" aria-labelledby="pills-profile-tab">


<!--FORMULARIO REGISTRAR NUEVO DOCENTE-->
<div class="card mt-3">    
  <!-- Card content -->
  <div class="card-body">
<form class="text-center border border-light p-5" method="post" enctype="multipart/form-data">
  <p class="h4 mb-4">AGREGAR DOCENTE</p>
    <div class="form-row mb-2">
       
        <div class="col-sm-12 col-md-6 col-lg-2 mb-3">
            <!-- matricula -->
            <input type="text" minlength="7" pattern="^[0-9]+"  name="num_trabajador" class="form-control" placeholder="# Trabajador" required >
        </div>
        <div class="col-sm-12 col-md-6 col-lg-5 mb-3">
            <!-- First name -->
            <input type="text"  name="nombre" class="form-control" placeholder="Nombre completo" required >
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-2">
          <input type="text" name="perfil" class="form-control" placeholder="Perfil de docente" required >
        </div>
      <div class="col-sm-12 col-md-6 col-lg-2 mb-3 ">
            <!-- RH -->
        <input type="text" name="horas" class="form-control" min="1" pattern="^[0-9]+" placeholder="#Horas semana" required >
      </div>
      <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">
            <!-- RH -->
        <input type="date" name="fecha_ingreso" class="form-control" placeholder="Fecha de ingreso" required >
      </div>
      <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">
        <input type="text" pattern="\d{3}[\-]\d{3}[\-]\d{4}" name="telefono" class="form-control" placeholder="#Tel.: 249-112-1212" required >
      </div>

      <div class="col-sm-12 col-md-6 col-lg-2 mb-3">
        <select class="browser-default custom-select" name="disciplina" required >
            <option selected>DISCIPLINA</option>
            <?php $r = new mvcControlador(); $r->query_disciplina_controlador();?>
        </select>
      </div>  
      <div class="col-sm-12 col-md-6 col-lg-4 mb-3 ">
        <input type="text" name="password" class="form-control" placeholder="Contraseña" required >
      </div>
      <div class="col-12 mb-3 ">
        <input type="text" name="observaciones" class="form-control" placeholder="Observaciones" required >
      </div>          
</div>
    <div class="form-row mb-2">
      <div class="col-12 mb-3">

<!-- INPUT IMAGEN -->
<div class="input-default-wrapper mt-3">
  <span class="input-group-text mb-3" id="input1">Foto</span>
  <input type="file" name="foto_docente" id="file-with-current" class="input-default-js" required>
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
    <button class="btn btn-info my-4 btn-block" type="submit" name="add_docente_deportes"><strong>AGREGAR </strong></button>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-danger my-4 btn-block" type="reset"><strong>CANCELAR</strong></button>
    </div>
</div>
</form> 
  </div>
     </div>

<div class="card">
  <div class="card-body">
    
  </div>
</div>


  </div><!-- TERMINA TAB-PANEL DE IEMS -->

  <div class="tab-pane fade" id="evento" role="tabpanel" aria-labelledby="pills-profile-tab">

<!--FORMULARIO REGISTRAR NUEVO EVENTO-->
<div class="card mt-3">    
  <!-- Card content -->
  <div class="card-body">
<form class="text-center border border-light p-5" method="post">
  <p class="h4 mb-4">REGISTRAR EVENTO</p>
    <div class="form-row mb-2">

      <div class="col-sm-12 col-md-6 col-lg-2 mb-3">
        <select class="browser-default custom-select" name="actividad" required>
            <option selected>DISCIPLINA</option>
            <?php $r = new mvcControlador(); $r->query_disciplina_controlador();?>
        </select>
      </div>  
      <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">
            <!-- RH -->
        <input type="date"  name="fecha" class="form-control" placeholder="Fecha" required>
      </div>
        <div class="col-sm-12 col-md-6 col-lg-7 mb-3">
            <!-- First name -->
            <input type="text"   name="lugar" class="form-control" placeholder="Lugar" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
          <input type="text" min="1" pattern="^[0-9]+"  name="mujeres_p" class="form-control" placeholder="# Mujeres participantes" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
          <input type="text" min="1" pattern="^[0-9]+"  name="hombres_p" class="form-control" placeholder="# Hombres participantes" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
          <input type="text" min="1" pattern="^[0-9]+"  name="mujeres_a" class="form-control" placeholder="# Mujeres asistentes" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
          <input type="text" min="1" pattern="^[0-9]+"   name="hombres_a" class="form-control" placeholder="# Hombres asistentes" required>
        </div>

      <div class="col-12 mb-3 ">
        <input type="text" name="descripcion" class="form-control" placeholder="Descripción" required>
      </div>          
</div>

<div class="form-row mb-2"> 
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-info my-4 btn-block" type="submit" name="evento_deportes"><strong>AGREGAR </strong></button>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-danger my-4 btn-block" type="reset"><strong>CANCELAR</strong></button>
    </div>
</div>

</form>
  </div>
     </div>





  </div>

<!-- SECCIÓN 4 -->
  <div class="tab-pane fade" id="add-articulo" role="tabpanel" aria-labelledby="pills-home-tab">
<!-- CARD-FORMULARIO ARTICULO -->
<div class="card mt-3">
  <div class="card-body">
<form class="text-center border border-light p-5" method="post">
    <p class="h4 mb-4">AGREGAR A INVENTARIO</p>
    <div class="form-row mb-2">      
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <!-- matricula -->
            <input type="text"  name="codigo" class="form-control" placeholder="Código" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-3 ">
            <!-- Last name -->
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-2 mb-3 ">
            <!-- Last name -->
            <input type="number" min="1" name="cantidad" class="form-control" placeholder="Cantidad" required>
        </div>
      <div class="col-sm-12 col-md-6 col-lg-3 mb-3 text-success">
        <select class="browser-default custom-select" name="disciplina" required>
            <option selected>DISCIPLINA</option>
            <?php $r = new mvcControlador(); 
                  $r -> query_disciplina_controlador(); ?>
        </select>
      </div>
        <div class="col-9 mt-2  ">
        <input type="text" name="descripcion"  class="form-control" placeholder="Descripción" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mt-2">
        <input type="date" name="fecha"   class="form-control" data-toggle="tooltip" data-placement="top"
        title="Fecha Alta" required>
        </div>
    </div>
    <!-- Sign up button -->
    <div class="form-row mb-2">
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-info my-4 btn-block" type="submit" name="add_articulo_deportes"><strong>AGREGAR</strong></button>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-danger my-4 btn-block" type="reset"><strong>CANCELAR</strong></button>
    </div>
    </div>
</form>
</div>
</div>
<!-- CARD-FORMULARIO ARTICULO -->
</div>

<!-- SECCIÓN 5 -->
  <div class="tab-pane fade" id="add-disciplina" role="tabpanel" aria-labelledby="pills-home-tab">
<!-- CARD-FORMULARIO DISCIPLINA -->
<div class="card mt-3">
  <div class="card-body">
<form class="text-center border border-light p-5" method="post">
    <p class="h4 mb-4">AGREGAR DISCIPLINA</p>
    <div class="form-row mb-2">      
        <div class="col-sm-12 col-md-6 col-lg-4 mb-3 ">
            <input type="text" name="nombre"  class="form-control" placeholder="Nombre" required>
        </div>
      <div class="col-sm-12 col-md-6 col-lg-2 mb-3">
        <select class="browser-default custom-select"  name="tipo" required>
            <option selected>TIPO</option>
            <option value="1">DEPORTIVA</option>
            <option value="2">CULTURAL</option>
        </select>
      </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-info  btn-block" type="submit" name="add_disciplina_deportes"><strong>AGREGAR</strong></button>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-danger  btn-block" type="reset"><strong>CANCELAR</strong></button>
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


<!--******************************************SEGUNDA SECCIÓN**************************************************************************************** -->

  <!--EMPIEZA LA TARJETA QUE ENCIERRA TODA LA SEGUNDA SECCIÓN -->
<!-- INICIA SEGUNDO NAVBAR ¿QUE ES PARA LOS REPORTES? -->
  <div class="card mt-3 mb-5 ">
  <!-- Card-header -->
  <div class="card-header bg-dark text-white"><strong>CONSULTAR INFORMACIÓN ALMACENADA</strong></div>
  <!-- Card content -->
  <div class="card-body">
 <!-- ROW DEL TITULO -->
<ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab2" data-toggle="pill" href="#alumno" role="tab"
      aria-controls="pills-home" aria-selected="true"><strong>Alumnos</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab2" data-toggle="pill" href="#escuelas" role="tab"
      aria-controls="pills-profile" aria-selected="false"><strong>Docentes</strong></a>
  </li>
    <li class="nav-item">
    <a class="nav-link " id="pills-home-tab2" data-toggle="pill" href="#horas" role="tab"
      aria-controls="pills-home" aria-selected="true"><strong>Constancia de horas cumplidas</strong></a>
  </li>
    <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab2" data-toggle="pill" href="#permiso" role="tab"
      aria-controls="pills-contact" aria-selected="false"><strong>Imprimir permiso</strong></a>
  </li>
    <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab2" data-toggle="pill" href="#eventos" role="tab"
      aria-controls="pills-contact" aria-selected="false"><strong>Eventos realizados</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab2" data-toggle="pill" href="#inventarios" role="tab"
      aria-controls="pills-contact" aria-selected="false"><strong>Inventario</strong></a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">


  <!-- INICIA SECCIÓN DE EVENTOS--------------------------------------------------- -->

  <div class="tab-pane fade show active" id="alumno" role="tabpanel" aria-labelledby="pills-home-tab">
<!-- SECCION 1 CONSULTAR CLAVE IEMS PARA AGREGAR PRE-REGISTRO-->
   
<div class="card mt-3 mb-5 bg-success rounded sm ">
 <div class="card-body">
    <div class="col-12">
      <input type="text" class="form-control "  placeholder="BUSQUEDA POR: Nombre, Matricula, Disciplina, Tipo de Sangre, NSS y CURP --" name="consulta" id="consulta">
    </div>
</div>
 </div>


<div id="result">






</div>

 <!-- TERMINA TARJETA QUE MUESTRA LOS DATOS DEL ALUMNO ------------------------------------------------------------>

  </div><!-- TERMINA SECCIÓN DE EVENTOS -->
  

  <div class="tab-pane fade" id="escuelas" role="tabpanel" aria-labelledby="pills-profile-tab"> <!-- EMPIEZA VER PACIENTES REGISTRADOS -->
<!-- SECCION 1 CONSULTAR CLAVE IEMS PARA AGREGAR PRE-REGISTRO-->
      <div class="card-body bg-success">
        <div class="col ">
      <input type="text" class="form-control " placeholder="BUSCAR POR: Numero de trabajador o nombre del docente" name="trabajador" id="trabajador">
        </div>
      </div>
  <!-- VISUALIZANDO DATOS ANTES DE AGREGAR PRE-REGISTRO -->
<!-- INICIA CARD PARA DOCENTES ----------------------------------------------------->
<div id="datos_trabajador">


</div>
<!-- TERMINA CARD PARA DOCENTES----------------------------------------------------------------------------->
  </div><!-- TERMINA VER PACIENTES REGISTRADOS -->

   <div class="tab-pane fade" id="horas" role="tabpanel" aria-labelledby="pills-profile-tab">

<div class="card-body mt-3 mb-3 bg-info form-row">
        <div class="col-9">
      <input type="text" class="form-control" placeholder="BUSQUEDA POR: Nombre, Matricula, Disciplina, Tipo de Sangre, NSS y CURP" name="horas_cumplidas" id="horas_cumplidas">
        </div>
<div class="col-auto">
    <a href="index.php?accion=print_constancia"  class="btn btn-active btn-sm btn-block  text-white"> <i class="fas fa-print fa-2x"> </i> <strong class="h6"> - PREPARAR REPORTE</strong></a>
</div>
</div>

<div id="datos_horas">
  
</div>

  </div>

  <div class="tab-pane fade" id="permiso" role="tabpanel" aria-labelledby="pills-contact-tab">
      <div class="card-body bg-info form-row">
        <div class="col">
      <input type="text" class="form-control" placeholder="BUSCAR POR: Matricula o CURP" name="query_permiso" id="query_permiso">
        </div>
<div class="col-auto">
    <a href="index.php?accion=print_permiso"  class="btn btn-active btn-sm btn-block  text-white"> <i class="fas fa-print fa-2x"> </i> <strong class="h6"> - PREPARAR REPORTE</strong></a>
</div>
      </div>
<div id="query_result">
  



</div>
  </div>

  <div class="tab-pane fade" id="eventos" role="tabpanel" aria-labelledby="pills-contact-tab">
<div class="card mt-2 mb-5 ">
  <div class="card-body bg-success">
      <form class="form-inline">

<div class="col-md-6 col-lg-1 col-sm-3">
   <label class="text-white"><strong>DE:</strong></label> 
</div>
<div class="col-sm-12 col-md-6 col-lg-3">
   <input type="date" class="form-control" name="fecha1_evento_deportes" id="fecha1_evento_deportes">
</div>
<div class="col-md-6 col-lg-1 col-sm-2">
   <label class="text-white"><strong>A:</strong></label> 
</div>
<div class="col-sm-12 col-md-6 col-lg-3 mt-1">
  <input type="date" class="form-control" name="fecha2_evento_deportes" id="fecha2_evento_deportes">
</div>
       </form>
  </div>
</div>

<div id="result_event_deportes">
  

</div>

  </div>

  <div class="tab-pane fade" id="inventarios" role="tabpanel" aria-labelledby="pills-contact-tab">

<div class="card-body bg-success">
      <div class=" row">
        <div class="col-8">
          <label class="text-white"><strong>AQUI SOLO SE PUEDE CONSULTAR POR DISCIPLINA</strong></label>
        <select class="browser-default custom-select" name="disciplina_inv" id="disciplina_inv">
          <option selected>DISCIPLINA</option>
            <?php $r = new mvcControlador(); $r -> query_disciplina_controlador(); ?>
        </select>
        </div>
<div class="col-auto mt-3">
    <a href="index.php?accion=inventario_deportes"  class="btn btn-active btn-sm btn-block  text-white"> <i class="fas fa-print fa-2x"> </i> <strong class="h6"> - PREPARAR REPORTE</strong></a>
</div>
      </div>
</div>



<div class="row mt-3"><div class="col-12 text-center"><h2>ARTICULOS EN EXISTENCIA</h2></div></div>
<div id="result_invent_deportes_alta">
  




</div>


<div class="row mt-3"><div class="col-12 text-center"><h2>ARTICULOS ELIMINADOS</h2></div></div>
<div id="r_inv_del_dep"></div>





  </div>

</div>

</div>
</div>





  </div>
</div>



