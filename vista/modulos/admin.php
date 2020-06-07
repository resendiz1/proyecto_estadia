<div class="card mt-3 mb-3">
<?php 
session_start();
if(!$_SESSION["validate_admin"] ){
  header("location:index.php?action=login");
 exit(); 
}
if(isset($_GET["accion"])){ 
      if($_GET["accion"]=="ok_godinez_add"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ REGISTRO DE ELEMENTO EXITOSO ! </strong></div>
';
 }
    if($_GET["accion"]=="no_godinez_add"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ REGISTRO DE ELEMENTO FALLIDO ! </strong></div>
';
 }

      if($_GET["accion"]=="ok_update_godinez"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ EDICIÓN DE ELEMENTO EXITOSA ! </strong></div>
';
 }
    if($_GET["accion"]=="no_update_godinez"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ EDICIÓN DE ELEMENTO FALLIDA ! </strong></div>
';
 }

      if($_GET["accion"]=="ok_delete_godinez"){ 
         echo '
<div class="card-header bg-warning text-center shadow-sm p-3 text-white animated zoomInRight" role="alert">
<strong>  ¡ BORRADO DE ELEMENTO EXITOSO ! </strong></div>
';
 }
    if($_GET["accion"]=="no_delete_godinez"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ EL DOCENTE NO FUE BORRADO, INTENTA NUEVAMENTE ! </strong></div>
';
 }

    if($_GET["accion"]=="duplicate_trabajador"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ ERROR, EL NÚMERO DE TRABAJADOR YA EXISTE, VERIFICA E INTENTALO NUEVAMENTE! </strong></div>
';
 }

    if($_GET["accion"]=="no_desbloqueo_godinez"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ ERROR AL DESBLOQUEAR USUARIO, INTENTALO NUEVAMENTE! </strong></div>
';
 }

    if($_GET["accion"]=="si_desbloqueo_godinez"){ 
         echo '
<div class="card-header bg-success text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ USUARIO DESBLOQUEADO ! </strong></div>
';
 }




 
}


  $r = new mvcControlador(); 
  $r ->agregar_usuario_adyc_controlador();
  $r->desbloqueo_godinez();
  $r->update_godinez_controlador();
  $r->delete_godinez_controlador();

 
   ?>
  <div class="card-body">
     <!-- ROW DEL TITULO -->
   <div class="row mt-3 rounded  bg-white bordered">
    <div class="col-6 mt-1">
      <img src="img/logo.png" height="90px" width="320px" alt="">
    </div>
    <div class="col-auto mt-4">
  <h1><strong>ADMINISTRADOR</strong></h1>
    <a href="index.php?accion=login" target="_top">CERRAR SESIÓN </a> 
    </div>
    </div>
  </div>
</div>


<div class="card">
  <div class="card-body">
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-homewww" role="tab"
      aria-controls="pills-home" aria-selected="true">ACTIVIDADES DEPORTIVAS Y CULTURALES</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profilewww" role="tab"
      aria-controls="pills-profile" aria-selected="false">ÁREA DEL MEDICO</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contactwww" role="tab"
      aria-controls="pills-contact" aria-selected="false">ÁREA DE DIFUSIÓN</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-taba" data-toggle="pill" href="#pills-baneados" role="tab"
      aria-controls="pills-bloqueados" aria-selected="false"><strong>USUARIOS BLOQUEADOS</strong></a>
  </li>

</ul>

  </div>
</div>


<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-homewww" role="tabpanel" aria-labelledby="pills-home-tab">
<div class="card mt-1 mb-1 ">
  <div class="card-header bg-dark text-white"><strong>ACTIVIDADES DEPORTIVAS Y CULTURALES</strong></div>
  <div class="card-body">
<div class="tab-content" id="pills-tabContent2">


  <!-- INICIA SECCIÓN DE EVENTOS--------------------------------------------------- -->
 <div class="tab-pane fade show active" id="add-deportes" role="tabpanel" aria-labelledby="pills-home-tab">

<!--FORMULARIO REGISTRAR NUEVO EVENTO-->
<div class="card ">    
  <!-- Card content -->
  <div class="card-body">
<form class="text-center border border-light p-5" method="post">
  <p class="h4 mb-4">AGREGAR USUARIO A. D. y C.</p>
    <div class="form-row mb-2"> 
      <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">
            <!-- RH -->
        <input type="tex"   name="numero_trab" class="form-control" placeholder="#Trabajador" required>
      </div>
        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
            <input type="text" i name="nombre" class="form-control" placeholder="Nombre completo" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
          <input type="phone" pattern="\d{3}[\-]\d{3}[\-]\d{4}"  name="telefono" class="form-control" placeholder="#Tel.: 249-122-1212" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-5 mb-3">
          <input type="email"  name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
          <input type="text"  name="password" class="form-control" placeholder="Contraseña" required>
        </div>        
</div>

<div class="form-row mb-2"> 
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-info my-4 btn-block" type="submit" name="add_user_adyc"><strong>AGREGAR </strong></button>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-danger my-4 btn-block" type="reset"><strong>CANCELAR</strong></button>
    </div>
</div>

</form>
<!--TERMINA FORMULARIO REGISTRA EVENTO------------ -->  
  </div>

     </div>
<?php $r = new mvcControlador(); $r->usuarios_deportes_controlador(); ?>

 </div>

</div>
</div>
</div>
   


  </div>
  <div class="tab-pane fade" id="pills-profilewww" role="tabpanel" aria-labelledby="pills-profile-tab">
    
  <div class="card mt-1 ">
  <div class="card-header bg-dark text-white"><strong>ÁREA DEL MEDICO</strong></div>
  <div class="card-body">

<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active" id="add-medico" role="tabpanel" aria-labelledby="pills-home-tab">
<div class="card mt-3">    
  <div class="card-body">
<form class="text-center border border-light p-5" method="post">
  <p class="h4 mb-4">AGREGAR USUARIO A MEDICO</p>
    <div class="form-row mb-2"> 
      <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">
        <input type="text"  name="numero_trab" class="form-control" placeholder="#Trabajador" required>
      </div>
        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
            <input type="text" i name="nombre" class="form-control" placeholder="Nombre completo" required>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
          <input type="text" pattern="\d{3}[\-]\d{3}[\-]\d{4}"  name="telefono" class="form-control" placeholder="#Tel.: 249-122-1212" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-5 mb-3">
          <input type="email"  name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
          <input type="text"  name="password" class="form-control" placeholder="Contraseña" required>
        </div>        
</div>

<div class="form-row mb-2"> 
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-info my-4 btn-block" type="submit" name="add_user_medico"><strong>AGREGAR </strong></button>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-danger my-4 btn-block" type="reset"><strong>CANCELAR</strong></button>
    </div>
</div>
</form>
  
  </div>
     </div>

<?php $r = new mvcControlador(); $r->usuarios_medico_controlador(); ?>

</div>
</div>

  </div>
</div>



  </div>
  <div class="tab-pane fade" id="pills-contactwww" role="tabpanel" aria-labelledby="pills-contact-tab">
      <div class="card mt-1 mb-5 ">
  <div class="card-header bg-dark text-white"><strong>ÁREA DE DIFUSIÓN</strong></div>
  <div class="card-body">

<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="add-di" role="tabpanel" aria-labelledby="pills-home-tab">

<div class="card mt-3">    
  <div class="card-body">
<form class="text-center border border-light p-5" method="post">
  <p class="h4 mb-4">AGREGAR USUARIO A DIFUSIÓN</p>
    <div class="form-row mb-2"> 
      <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">
        <input type="text"  name="numero_trab" class="form-control" placeholder="#Trabajador" required>
      </div>
        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
            <input type="text" i name="nombre" class="form-control" placeholder="Nombre completo" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
          <input type="text" pattern="\d{3}[\-]\d{3}[\-]\d{4}"  name="telefono" class="form-control" placeholder="#Tel.: 249-122-1212" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-5 mb-3">
          <input type="email"  name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
          <input type="text"  name="password" class="form-control" placeholder="Contraseña" required>
        </div>        
</div>

<div class="form-row mb-2"> 
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-info my-4 btn-block" type="submit" name="add_user_difusion"><strong>AGREGAR </strong></button>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-danger my-4 btn-block" type="reset"><strong>CANCELAR</strong></button>
    </div>
</div>

</form>
  </div>
     </div>


<?php $r = new mvcControlador(); $r->usuarios_difusion_controlador(); ?>


  </div>
</div>
</div>
</div>



  </div>


  <!-- INICIA SECCIÓN DE EVENTOS--------------------------------------------------- -->
  <div class="tab-pane fade" id="pills-baneados" role="tabpanel" aria-labelledby="pills-contact-tab">
<div class="card mt-3">    
  <div class="card-body">  
    <div class=" font-weight-bold h3 text-center h4 bg-warning text-white "> USUARIOS BLOQUEADOS POR NO INGRESAR CORRECTAMENTE SU CONTRASEÑA 5 VECES </div>

<?php $r = new mvcControlador(); $r -> query_bloqueado_intentos(); ?>
</div>
<br><br>
<div class="card">
  <div class="card-body">
   <div class=" text-center h4 bg-danger text-white mt-5"> USUARIOS BLOQUEADOS POR MAL USO DEL SISTEMA </div>
<?php $r = new mvcControlador(); $r->baneados(); ?>
  </div> 
  </div>
</div>


     

  </div>


  </div>
</div>
</div>
</div>
   


  </div>
</div>
</div>
</div>






