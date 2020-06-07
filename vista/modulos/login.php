<?php 
session_start();
session_destroy();

  $in = new mvcControlador();
  $in -> in_medico_controlador();
  $in -> in_deportes_controlador();
  $in -> in_difusion_controlador();
  $in->in_pase_lista_controlador();
  $in->in_roto_controlador();
 ?>
<style type="text/css"> body { background-image: url("img/3.jpg"); }</style>
    <div class="card mt-3">
<?php 
if (isset($_GET["accion"])) {

  
if($_GET["accion"]=="error_ingreso_medico"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ ERROR AL INGRESAR AL ÁREA DEL MEDICO VERIFICA TUS DATOS E INTENTA NUEVAMENTE ! </strong></div>
';
 }

if($_GET["accion"]=="error_ingreso_deportes"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ ERROR AL INGRESAR A A. D. Y C. VERIFICA TUS DATOS E INTENTA NUEVAMENTE ! </strong></div>
';
 }
if($_GET["accion"]=="error_ingreso_difusion"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ ERROR AL INGRESAR A DIFUSIÓN VERIFICA TUS DATOS E INTENTA NUEVAMENTE ! </strong></div>
';
 }

if($_GET["accion"]=="error_pase_lista"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ ERROR AL INGRESAR AL PASE DE LISTA VERIFICA TUS DATOS E INTENTA NUEVAMENTE ! </strong></div>
';
 }
if($_GET["accion"]=="error_admin"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ ERROR AL INGRESAR COMO ADMINISTRADOR VERIFICA TUS DATOS E INTENTA NUEVAMENTE ! </strong></div>
';
 }

if($_GET["accion"]=="ban_ban"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  ¡ ACABAS DE SER BANEADO POR EL SISTEMA, TAL VEZ NO TE LO EXPLICARON O ES MUY DIFICIL DE ENTENDER PERO NO DEBES MODIFICAR EL HTML DE LA PAGINA, TU USUARIO FUE CANCELADO Y SE LE AVISARA AL ADMINISTRADOR EL MAL USO QUE HICISTE DEL MISMO! </strong></div>
';
 }
if($_GET["accion"]=="intentos_superados"){ 
         echo '
<div class="card-header bg-danger text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong>  FALLASTE EN INRESAR 5 VECES Y ESO ES SOSPECHOSO, AHORA ESTAS BLOQUEADO Y TENDRAS QUE SOLICITAR DESBLOQUEO AL ADMINISTRADOR </strong></div>
';
 }
if($_GET["accion"]=="intentos_superados_admin"){ 
         echo '
<div class="card-header bg-info text-center shadow-sm p-3 text-white animated bounceInLeft" role="alert">
<strong><h3> 😱 ¡¡ BLOQUEADO !! 😟</h3>  <br> ERES EL ADMINISTRADOR DEL SISTEMA Y <h5> TE EQUIVOCASTE  MÁS DE 5 VECES AL INTENTAR  INGRESAR </h5> LO QUE PUEDES HACER ES DECIRLE AL INGENIERO EN TURNO QUE REVISE LA BASE DE DATOS Y EN LA TABLA DEL ADMINISTRADOR  MODIFIQUE TUS DATOS PARA ASI DESBLOQUEARTE, EL DESBLOQUEO ES MUY INTUITIVO SOLO TENDRA QUE CAMBIAR UN VALOR DE LA TABLA CORRESPONDIENTE AL ADMINISTRADOR.<h3>😎😎😎</h3> </strong></div>
';
 }

 
}
 ?>
      <div class="card-body">
    <div class="row  ">
      <div class="col-lg-6 col-md-12 ">
        <img src="img/logo.png" width="350px" height="100px" alt="">
      </div>
      <div class="col-lg-6 col-md-12 mt-3">
        <strong><h2 class="text-center"><strong>ZONA DE AUTENTICACIÓN</strong> </h2></strong>
      </div>
    </div> 
      </div>
    </div>


<br><br><br><br>
<div class="card">
  <div class="card-header text-center btn-green"><strong class="text-white">ENTRADA</strong></div>
  <div class="card-body">
    <div class="row p-3 bg-white">  
      <!-- BOTONES Y MODAL'S PARA LOS LOGINS-->

      <!-- BOTON CON MODAL MEDICO -->
      <div class="col-sm-12 col-md-6 col-lg-3 mb-2 ">
        <button class="btn btn-info btn-block" data-toggle="modal" data-target="#modalLoginMedico">
          <i class="fas fa-key"></i>
          <strong>SECCIÓN DE MEDICO</strong>
        </button>
      </div>

      <div class="col-sm-12 col-md-6 col-lg-3 mb-2">
        <button class="btn btn-success btn-block" data-toggle="modal" data-target="#modalLoginDifusion">
          <i class="fas fa-key"></i>
          <strong>SECCIÓN DE DIFUSIÓN</strong>
        </button>
      </div>


      <div class="col-sm-12 col-md-6 col-lg-3 mb-2 ">
        <button class="btn btn-blue-grey  btn-block" data-toggle="modal" data-target="#modalLoginActividades">
          <i class="fas fa-key"></i>
          <strong> SECCIÓN DE A. D.Y C.</strong>
        </button>
      </div>

      <div class="col-sm-12 col-md-6 col-lg-3 mb-2">
        <button class="btn btn-mdb-color btn-block" data-toggle="modal" data-target="#modalLoginAdmin">
          <i class="fas fa-key"></i>
          <strong>ADMINISTRADOR</strong>
        </button>
      </div>
    </div>
  </div>
</div>
    





      <!-- MODAL MEDICO -->
      <div class="modal fade" id="modalLoginMedico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Autenticación Medico</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text"  name="usuario" placeholder="Usuario"  class="form-control validate">
         
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" name="contra" placeholder="Contraseña" class="form-control validate">
        
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-info btn-block" type="submit" name="medico_in"><strong>Entrar</strong></button>
      </div>
      </form>
    </div>
  </div>
</div>
      <!-- TERMINA BOTON CON MODAL MEDICO -->

 		<!-- BOTON CON MODAL DE DIFUSION -->


      <div class="modal fade" id="modalLoginDifusion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Autenticación Difusión</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form method="post">
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" placeholder="Usuario" name="usuario" class="form-control validate">
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" placeholder="Contraseña" name="contra" class="form-control validate">
        </div>
      </div>

      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-success btn-block" type="submit" name="in_difusion"><strong>Entrar </strong></button>
      </div>
    </form>
    </div>
  </div>
</div>

      <!-- TERMINA BOTON CON MODAL DIFUSION -->


<!-- BOTON CON MODAL DE ACTIVIDADES -->


           <!-- MODAL ACTIVIDADES -->
      <div class="modal fade" id="modalLoginActividades" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Autenticación Act. Dep. y Cult.</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text"  name="usuario" class="form-control validate" placeholder="Usuario">
          
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" name="contra" class="form-control validate" placeholder="Contraseña">
          
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-success btn-block" type="submit" name="in_deportes"><strong>Entrar como Administrativo</strong></button>
      </div>

   	  <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-indigo btn-block" type="submit" name="in_entrenadores"><strong>Entrar como Docente</strong></button>
      </div>
</form>
    </div>
  </div>
</div>

      <!-- TERMINA BOTON CON MODAL ACTIVIDADES -->




<!-- BOTON CON MODAL DE ADMINISTRADOR -->


        <!-- MODAL ADMINISTRADOR -->
<div class="modal fade" id="modalLoginAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Autenticación Admin.</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form method="post">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" name="usuario" placeholder="Usuario" class="form-control validate">
        
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password"name="contra" placeholder="Contraseña" class="form-control validate">
        
        </div>
        
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-mdb-color btn-block" type="submit" name="in_root_D10SS"><strong>Entrar </strong></button>
      </div>
      </form>
    </div>
  </div>
</div>

      <!-- TERMINA BOTON CON MODAL ADMINISTRADOR -->





      </div>
 <!--====  End DESCRIOCIONES DE CADA AREA  ====-->

    </div>

  </div>
