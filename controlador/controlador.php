<?php 
ob_start();
class mvcControlador{
	public function plantilla(){
		include "vista/plantilla.php";
	}
	#Las funciones ¬¬

	public function enlaces_controlador(){
		if(isset($_GET["accion"]))
		{
		$enlace_controlador = $_GET["accion"];
	}
	else{
		$enlace_controlador ="index";
	}
		$reply = enlacesPaginas::enlaces_modelo($enlace_controlador);
		include $reply;	
	}
	/*==========================================================================================
	=            CONSULTAS DE CARRERA Y DISCIPLINA PARA EL SELECTED DE ALGUNOS FORMULARIOS          =
	==========================================================================================*/

	public function query_disciplina_controlador(){
		$reply = Datos::query_disciplina_modelo("acti_dep");


		foreach($reply as $row => $item) {
		echo '<option value="'.$item["nombre_actividad"].'">'.$item["nombre_actividad"].'</option>';
		}
	}

	public function query_carrera_controlador(){
		$reply = Datos::query_carrera_modelo("carrera");

		foreach($reply as $now =>$item){
			echo'<option value"'.$item["nombre_carrera"].'">'.$item["nombre_carrera"].'</option>';
		}


	}

	public function query_iems_controlador(){
		$reply = Datos::query_iems_modelo("iems_difu");
		foreach ($reply as $row => $item) {
			echo'<option value"'.$item["nom_iems"].'">'.$item["nom_iems"].'</option>';
		}
	}

	public function query_bloqueado_intentos(){
		$respuesta = Datos::query_bloq_inten_modelo("user_sys");  

		if ($respuesta==null) {
			echo'<div class="alert alert-info text-center">Sin usuarios bloqueados por exceso de intentos fallidos</div>';
		}
		else{
		foreach ($respuesta as $row => $item) {
			echo'
<div class="card mt-4 mb-3 bordered">
  <div class="card-header text-white btn-green">
      <strong>'.$item["nombre_user"].'  -- '.$item["num_trabajador"].'</strong>
    </div>
  <div class="card-body">
    <div class="form-row"> 
        <div class="col-sm-12 col-md-6 col-lg-6 mb-1 border">
          <label for=""><strong>#1 Teléfono IEMS: </strong> '.$item["tel_user"].'</label>
        </div> 
        <div class="col-sm-12 col-md-6 col-lg-6 mb-1 border">
          <label for=""><strong>#2 Teléfono IEMS: </strong> '.$item["email_user"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-9 mb-1 border">
          <label for=""><strong>Fecha del bloqueo: </strong> '.$item["baneo"].'</label>
        </div>                              
        <div class="col-sm-6 col-md-3 col-lg-3 mb-1">
           <button class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#bloq'.$item["id_user"].'"><strong class="h6">DESBLOQUEAR </strong></button>
        </div>
    </div>
  </div>
</div>



<div class="modal fade" id="bloq'.$item["id_user"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered modal-notify modal-info role="document" >
    <div class="modal-content">
    <div class="modal-header">
        <p class="heading lead"><H3 class="text-white">CONFIRMAR DESBLOQUEO DE USUARIO</H3></p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
     </div>
      <div class="modal-body">
<form class="text-center border border-light p-5 mt-2" method="post">
    <p class="h4 mb-3 btn-block ">¿DESEA CONFIRMAR EL DESBLOQUEO  DE: <strong> '.$item["nombre_user"].' </strong> DEL SISTEMA? </p>
    <input type="hidden" name="id_userSys" value="'.$item["id_user"].'">
    <input type="hidden" name="area_godinez" value="'.$item["area_intento"].'">
      <div class="form-row mb-2"> 
        <div class="col-md-6 col-lg-4 mb-2 ">
            <button type="submit" name="confirma_desbloqueo" class="btn btn-primary btn-block ">CONFIRMAR</button>
        </div>
        <div class="col-md-6 col-lg-4 mb-2 ">
          <button type="button" class="btn btn-secondary btn-block " data-dismiss="modal">CANCELAR</button>
        </div>
    </div> 
</form>
      </div>
    </div>
  </div>
</div>
			';
		}
	}

	}

	public function query_pase_lista_controlador(){
		if (isset($_SESSION["validate_list"])) {
			$query=$_SESSION["validate_list"];

			$reply= Datos::query_pase_lista_modelo($query, "prof_dep");
			echo '
<div class="card">
  <div class="card-body">
   <div class="row mt-3 rounded mb-4 bg-white bordered">
    <div class="col-lg-4 col-md-12 mt-1">
      <img src="img/logo.png" height="90px" width="320px" alt="">
    </div>
     <div class="col-lg-4 col-md-12 text-center ">  
  <a href="index.php?accion=login" class="btn btn-warning btn-block btn-sm" target="_top">CERRAR SESSION </a>
  </div>
    <div class="col-lg-4 col-md-12 mt-4">
  <h1><strong>LISTA DE: '.$reply["disciplina_docente"].' </strong></h1>
  <label class="h4">'.$reply["nombre_profesor"].'</label>
  <input type="hidden" name="disciplina" id="disciplina" value="'.$reply["disciplina_docente"].'">
    </div>
    </div>
  </div>
</div>
			';
			
		}
	}

public function fecha_to_all(){
 date_default_timezone_set('America/Mexico_City');
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');

}

public function fecha_to_ban(){
 date_default_timezone_set('America/Mexico_City');
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
return $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y')." justo a las  ".date ("h:i:s");

}

	/*==========================================================================================
	=            EMPIEZAN LAS FUNCIONES DE INGRESO AL SISTEMA SISTEMA          =
	==========================================================================================*/



public function in_medico_controlador(){
	if (isset($_POST["medico_in"])) {
		$encriptar = crypt($_POST["contra"], 'D10S_messi_CRypt');
		$datos = array('usuario' => $_POST["usuario"],
					  'contra' => $encriptar,
					  'area' => "medico");

		$respuesta=Datos::in_deportes_modelo($datos, "user_sys");



		$intentos=$respuesta["intentos"];
		$maximo = 5;
		$usuarioActual=$_POST["usuario"];
		if ($intentos < $maximo) {


		if($respuesta["num_trabajador"]== $_POST["usuario"] && $respuesta["pass_user"]== $encriptar){
		session_start();
		$_SESSION["validate_medico"] = $respuesta["num_trabajador"];
		$intentos=0;
		$datosIntentos = array("usuario" =>$usuarioActual,
							  "intentos" =>$intentos);
		$repuestaIntentos=Datos::control_intetos($datosIntentos, "user_sys");
		header('location:index.php?accion=medico');
		}
		else{

		$intentos=$intentos+1;
		$datosIntentos = array("usuario" =>$usuarioActual,
							  "intentos" =>$intentos);
		$repuestaIntentos=Datos::control_intetos($datosIntentos, "user_sys");
		header("location:index.php?accion=error_ingreso_medico");
		}
	}


else{
		$intentos=0;
		$fecha= mvcControlador::fecha_to_ban();
		$datosB = array("usuario" =>$usuarioActual,
					 	"intentos" =>$intentos,
					 	"fecha" =>$fecha,
					 	"bloqueo" =>"intentos",
					 	"area" =>"medico",);
		$repuestaIntentos=Datos::bloqueo_intentos($datosB, "user_sys");
		header("location:index.php?accion=intentos_superados");
}
	}
}


public function in_difusion_controlador(){
	if (isset($_POST["in_difusion"])) {
		$encriptar = crypt($_POST["contra"], 'D10S_messi_CRypt');
		$datos = array('usuario' => $_POST["usuario"],
					  'contra' => $encriptar,
					  'area' => "difusion");

		$respuesta=Datos::in_deportes_modelo($datos, "user_sys");



		$intentos=$respuesta["intentos"];
		$maximo = 5;
		$usuarioActual=$_POST["usuario"];
		if ($intentos < $maximo) {


		if($respuesta["num_trabajador"]== $_POST["usuario"] && $respuesta["pass_user"]== $encriptar){
		session_start();
		$_SESSION["validate_difusion"] = $respuesta["num_trabajador"];
		$intentos=0;
		$datosIntentos = array("usuario" =>$usuarioActual,
							  "intentos" =>$intentos);
		$repuestaIntentos=Datos::control_intetos($datosIntentos, "user_sys");
		header('location:index.php?accion=difusion');
		}
		else{

		$intentos=$intentos+1;
		$datosIntentos = array("usuario" =>$usuarioActual,
							  "intentos" =>$intentos);
		$repuestaIntentos=Datos::control_intetos($datosIntentos, "user_sys");
		header("location:index.php?accion=error_ingreso_difusion");
		}
	}


else{
		$intentos=0;
		$fecha= mvcControlador::fecha_to_ban();
		$datosB = array("usuario" =>$usuarioActual,
					 	"intentos" =>$intentos,
					 	"fecha" =>$fecha,
					 	"bloqueo" =>"intentos",
					 	"area" =>"difusion",);
		$repuestaIntentos=Datos::bloqueo_intentos($datosB, "user_sys");
		header("location:index.php?accion=intentos_superados");
}
	}
}




public function in_deportes_controlador(){
	if (isset($_POST["in_deportes"])) {
		$encriptar = crypt($_POST["contra"], 'D10S_messi_CRypt');
		$datos = array('usuario' => $_POST["usuario"],
					  'contra' => $encriptar,
					  'area' => "adyc");

		$respuesta=Datos::in_deportes_modelo($datos, "user_sys");

		$intentos=$respuesta["intentos"];
		$maximo = 5;
		$usuarioActual=$_POST["usuario"];
		if ($intentos < $maximo) {


		if($respuesta["num_trabajador"]== $_POST["usuario"] && $respuesta["pass_user"]== $encriptar){
		session_start();
		$_SESSION["validate_deportes"] = $respuesta["num_trabajador"];
		$intentos=0;
		$datosIntentos = array("usuario" =>$usuarioActual,
							  "intentos" =>$intentos);
		$repuestaIntentos=Datos::control_intetos($datosIntentos, "user_sys");
		header('location:index.php?accion=deportes');
		}
		else{

		$intentos=$intentos+1;
		$datosIntentos = array("usuario" =>$usuarioActual,
							  "intentos" =>$intentos);
		$repuestaIntentos=Datos::control_intetos($datosIntentos, "user_sys");
		header("location:index.php?accion=error_ingreso_deportes");
		}
	}


else{
		$intentos=0;
		$fecha= mvcControlador::fecha_to_ban();
		$datosB = array("usuario" =>$usuarioActual,
					 	"intentos" =>$intentos,
					 	"fecha" =>$fecha,
					 	"bloqueo" =>"intentos",
					 	"area" =>"adyc",);
		$repuestaIntentos=Datos::bloqueo_intentos($datosB, "user_sys");
		header("location:index.php?accion=intentos_superados");
}

	}
}



public function in_roto_controlador(){
	if (isset($_POST["in_root_D10SS"])) {

		$datos = array('usuario' =>$_POST["usuario"],
					   'contra' =>$_POST["contra"]);
		$respuesta=Datos::in_roto_modelo($datos, "root_o");
		$intentos=$respuesta["intentos_root"];
		$maximo = 5;
		$usuarioActual=$_POST["usuario"];
		if ($intentos < $maximo) {

		if ($respuesta["nom_rooto"]==$_POST["usuario"] && $respuesta["pass_rooto"]==$_POST["contra"] && $respuesta["bloqueo"]=="no") {
		    session_start();
		    $_SESSION["validate_admin"]=$_POST["usuario"];

		$intentos=0;
		$datosIntentos = array("usuario" =>$usuarioActual,
							  "intentos" =>$intentos);
		$repuestaIntentos=Datos::control_intentos_admin($datosIntentos, "root_o");
			header("location:index.php?accion=admin");
			ob_end_flush();
		}
		else{

		$intentos=$intentos+1;
		$datosIntentos = array("usuario" =>$usuarioActual,
							  "intentos" =>$intentos);
		$repuestaIntentos=Datos::control_intentos_admin($datosIntentos, "root_o");

			header("location:index.php?accion=error_admin");
			
		}
	   }
else{
		$intentos=0;

		$datosB = array("usuario" =>$usuarioActual,
					 	"intentos" =>$intentos,
					 	"bloqueo" =>"si");
		$repuestaIntentos=Datos::bloqueo_intentos_admin($datosB, "root_o");

		if ($repuestaIntentos=="success") {
			header("location:index.php?accion=intentos_superados_admin");
		}
		else{
			header("location:index.php?accion=login");
		}

		
}
	}
}



public function in_pase_lista_controlador(){
	if (isset($_POST["in_entrenadores"])) {
		$encriptar = crypt($_POST["contra"], 'D10S_messi_CRypt');
		$datos = array('usuario' =>$_POST["usuario"],
					   'contra' =>$encriptar);
		$respuesta=Datos::in_pase_lista_modelo($datos, "prof_dep");
		if ($respuesta["num_trabajador"]==$_POST["usuario"] && $respuesta["pass_profesor"]) {
			session_start();
			$_SESSION["validate_list"]=$_POST["usuario"];
			header("location:index.php?accion=lista");
		}
		else{
			header("location:index.php?accion=error_pase_lista");
		}
	}
}


	/*==========================================================================================
	=            EMPIEZAN LAS FUNCIONES DE REGISTRO DE DATOS EN LA BD DEL SISTEMA          =
	==========================================================================================*/
	
	public function registro_iems_controlador(){
		if(isset($_POST["save_iems"]))
		{



//Comprobando que el registro no venhga vacio
if ($_POST["clave_iems"]=="" || $_POST["nom_iems"]=="" || $_POST["cp_iems"]=="" || $_POST["mun_iems"]=="" || $_POST["loc_iems"]=="" || $_POST["zona_inf"]=="" || $_POST["direc_iems"]=="" || $_POST["tel1_iems"]=="" || $_POST["tel2_iems"]=="" || $_POST["mail_iems"]=="" || $_POST["nom_coor_iems"]=="" || $_POST["dist_iems"]=="" || $_POST["serv_iems"]=="" || $_POST["observ_iems"]=="") {
	
	$baneado= $_SESSION["validate_difusion"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");

	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{

//Comprobando que no exista algun articulo con clave identica
		$clave=$_POST["clave_iems"];
		$nombre=$_POST["nom_iems"];	
		$duplicado = Datos::check_duplucate_iems($clave, $nombre,"iems_difu");
		if ($clave==$duplicado["clave_iems"] OR $nombre == $duplicado["nom_iems"]) {			
		header("location:index.php?accion=duplucate_iems");
				}
		else{
if($_FILES['ruta']['type'] != "image/jpg" &&
	$_FILES['ruta']['type'] != "image/png" &&
	$_FILES['ruta']['type'] != "image/gif" &&
	$_FILES['ruta']['type'] != "image/jpeg" &&
	$_FILES['ruta']['type'] != "image/bmp"  ){

	header("location:index.php?accion=eso_no_es_una_imagen_¬¬");

}
else{


		if( $_FILES['ruta']['size'] > 1000000 ) {
header("location:index.php?accion=sobre_peso_detected");
		}
		else{
		$carga_ruta = ($_FILES['ruta']['tmp_name']);
		$ruta = fopen($carga_ruta, 'rb');

		$datos = array("clave" => $_POST["clave_iems"],
						"nombre" => $_POST["nom_iems"],
						"codigo_postal" => $_POST["cp_iems"],
						"municipio" => $_POST["mun_iems"],
						"localidad" => $_POST["loc_iems"],
						"zona" => $_POST["zona_inf"],
						"direccion" => $_POST["direc_iems"],
						"telefono1" => $_POST["tel1_iems"],
						"telefono2" => $_POST["tel2_iems"],
						"mail" => $_POST["mail_iems"],
						"nom_coor" => $_POST["nom_coor_iems"],
						"ruta" => $ruta,
						"distancia" => $_POST["dist_iems"],
						"servicio" => $_POST["serv_iems"],
						"observaciones" => $_POST["observ_iems"]);

		$reply = Datos::registro_iems_modelo($datos, "iems_difu");
		if ($reply=="success") {
			header('location:index.php?accion=ok_iems');
		}
		else{
		header('location:index.php?accion=no_iems');
		}
				}
	}
}
}
}
}
	public function registro_docente_deporte_controlador(){//NO ESTA JALANDO EL FORMULARIO
		if (isset($_POST["add_docente_deportes"])) {

		//Comprobando que el registro no venhga vacio
if ($_POST["num_trabajador"]=="" || $_POST["nombre"]=="" || $_POST["perfil"]=="" || $_POST["horas"]=="" || $_POST["fecha_ingreso"]=="" || $_POST["telefono"]=="" || $_POST["disciplina"]=="" || $_POST["password"]=="" || $_POST["observaciones"]=="") {
	
	$baneado= $_SESSION["validate_deportes"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{
		$clave=$_POST["num_trabajador"];	
		$duplicado = Datos::check_duplicate_docente($clave,"prof_dep");
		if ($clave==$duplicado["num_trabajador"]) {			
		header("location:index.php?accion=duplicate_docente");
				}
		else{
		if( $_FILES['foto_docente']['size'] > 1000000 ) {
header("location:index.php?accion=sobre_peso_detectado");

		}
		else{
if($_FILES['foto_docente']['type'] != "image/jpg" && 
	$_FILES['foto_docente']['type'] != "image/png" && 
	$_FILES['foto_docente']['type'] != "image/gif" &&
	$_FILES['foto_docente']['type'] != "image/jpeg" && 
	$_FILES['foto_docente']['type'] != "image/bmp"){

	header("location:index.php?accion=no_es_una_imagen_¬¬");
}
else{
			$carga_foto = ($_FILES['foto_docente']['tmp_name']);
			$foto = fopen($carga_foto, 'rb');
			$encriptar = crypt($_POST["password"], 'D10S_messi_CRypt');

			$datos = array("num_trabajador"=>$_POST["num_trabajador"],
						   "nombre"=>$_POST["nombre"],
						   "perfil"=>$_POST["perfil"],
						   "horas"=>$_POST["horas"],
						   "fecha_ingreso"=>$_POST["fecha_ingreso"],
						   "telefono"=>$_POST["telefono"],
						   "disciplina"=>$_POST["disciplina"],
						   "password"=>$encriptar,
						   "observaciones"=>$_POST["observaciones"],
						   "foto"=>$foto);
			$reply = Datos::registro_docente_deporte_modelo($datos, "prof_dep");
			if ($reply=="success") {
				header("location:index.php?accion=ok_registro_docente");
			}
			else{
				header("location:index.php?accion=no_registro_docente");
			}
		}
	}
}
}
}
}

	public function agregar_evento_deportes_controlador(){
if (isset($_POST["evento_deportes"])) {
	
	if ($_POST["actividad"]=="" || $_POST["fecha"]=="" || $_POST["lugar"]=="" || $_POST["mujeres_p"]=="" || $_POST["hombres_p"]=="" || $_POST["mujeres_a"]=="" || $_POST["hombres_a"]=="" || $_POST["descripcion"]=="") {
	$baneado= $_SESSION["validate_deportes"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{
		if (isset($_POST["evento_deportes"])) {
			$datos = array("actividad"=>$_POST["actividad"],
						   "fecha"=>$_POST["fecha"],
						   "lugar"=>$_POST["lugar"],
						   "mujeres_p"=>$_POST["mujeres_p"],
						   "hombres_p"=>$_POST["hombres_p"],
						   "mujeres_a"=>$_POST["mujeres_a"],
						   "hombres_a"=>$_POST["hombres_a"],
						   "descripcion"=>$_POST["descripcion"]);

			$reply = Datos::agregar_evento_deportes_modelo($datos,"ev_deport");
			if ($reply=="success") {
				header("location:index.php?accion=ok_evento_deportes");
			}
			else{
				header("location:index.php?accion=no_evento_deportes");
			}
		}
	}
}

}

	public function registro_alumno_deportes_controlador(){
if (isset($_POST["add_alumno_deportes"])) {

	if ($_POST["matricula"]=="" || $_POST["nombre"]=="" || $_POST["apellidos"]=="" || $_POST["curp"]=="" || $_POST["cuatrimestre"]=="" || $_POST["genero"]=="" || $_POST["sangre"]=="" || $_POST["nss"]=="" || $_POST["carrera"]=="" || $_POST["disciplina"]=="" || $_POST["observaciones"]==""
		)  {
	
	$baneado= $_SESSION["validate_deportes"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{
		$clave=$_POST["matricula"];	
		$duplicado = Datos::check_duplicate_alumno($clave,"alu_depor");
		if ($clave==$duplicado["matricula_alumno"]) {			
		header("location:index.php?accion=duplicate_alumno");
				}
		else{
		if( $_FILES['foto']['size'] > 1000000 ) {

		header("location:index.php?accion=sobre_peso_detectado");
		}
		else{
		if($_FILES['foto']['type'] != "image/jpg" &&
		$_FILES['foto']['type'] != "image/png" &&
		$_FILES['foto']['type'] != "image/gif" &&
		$_FILES['foto']['type'] != "image/jpeg" &&
		$_FILES['foto']['type'] != "image/bmp"  ){

		header("location:index.php?accion=no_es_una_imagen_¬¬");

		}
		else{
			$carga_foto = ($_FILES['foto']['tmp_name']);
			$foto = fopen($carga_foto, 'rb');

			$datos = array("matricula" =>$_POST["matricula"],
						   "nombre" =>$_POST["nombre"],
						   "apellidos" =>$_POST["apellidos"],
						   "curp" =>$_POST["curp"],
						   "cuatrimestre" =>$_POST["cuatrimestre"],
						   "genero" =>$_POST["genero"],
						   "sangre" =>$_POST["sangre"],
						   "nss" =>$_POST["nss"],
						   "carrera" =>$_POST["carrera"],
						   "disciplina" =>$_POST["disciplina"],
						   "observaciones" =>$_POST["observaciones"],
						   "foto" =>$foto);

			$reply = Datos::registro_alumno_deportes_modelo($datos, "alu_depor");
			if ($reply=="success") {
				header("location:index.php?accion=ok_alumno_registrado");
			}
			else{
				header("location:index.php?accion=no_alumno_registrado");
			}
		}

		}

	}
}
}
}

	public function registro_articulo_iems_controlador(){
		if(isset($_POST["add_inventario_difusion"])){
	if ($_POST["codigo"]=="" || $_POST["nombre"]=="" || $_POST["cantidad"]=="" || $_POST["fecha"]=="" || $_POST["descripcion"]=="")  {
	
	$baneado= $_SESSION["validate_difusion"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{

		$clave=$_POST["codigo"];	
		$duplicado = Datos::check_duplicate_item_difu($clave,"inv_dif");
		if ($clave==$duplicado["codigo"]) {			
		header("location:index.php?accion=dupli_item_difusion");
				}
		else{
			$datos = array("codigo" => $_POST["codigo"],
						   "nombre" => $_POST["nombre"],
						   "cantidad" => $_POST["cantidad"],
						   "fecha" => $_POST["fecha"],
						   "descripcion" => $_POST["descripcion"]);

			$reply = Datos::registro_articulo_iems_modelo($datos, "inv_dif");
			if($reply=="success"){
header('location:index.php?accion=ok_art_difusion');
			}
			else{
header('location:index.php?accion=no_art_difusion');
			}
		}
	}
}
}
	public function registro_articulo_medico_controlador(){
		if(isset($_POST["add_articulo_medico"])){

	if ($_POST["codigo"]=="" || $_POST["nombre"]=="" || $_POST["cantidad"]=="" || $_POST["activo"]=="" || $_POST["grupo"]=="" || $_POST["presentacion"]=="" || $_POST["cantidad"]=="" || $_POST["observaciones"]=="" || $_POST["fecha"]=="")  {
	
	$baneado= $_SESSION["validate_medico"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{


		$clave=$_POST["codigo"];	
		$duplicado = Datos::check_duplicate_item_med($clave,"exis_inv_med");
		if ($clave==$duplicado["codigo_medica"]) {			
		header("location:index.php?accion=ditem_medico");
				}
		else{
			$datos= array("codigo" =>$_POST["codigo"],
						  "nombre" =>$_POST["nombre"],
						  "activo" =>$_POST["activo"],
						  "grupo" =>$_POST["grupo"],
						  "presentacion" =>$_POST["presentacion"],
						  "cantidad" =>$_POST["cantidad"],
						  "observaciones" =>$_POST["observaciones"],
						  "fecha" =>$_POST["fecha"]);

			$reply = Datos::registro_articulo_medico_modelo($datos, "exis_inv_med");
			if ($reply=="success") {
				header("location:index.php?accion=ok_new_item");
			}
			else{
				header("location:index.php?accion=no_new_item");
			}
		}
	}
}
}
	public function registro_articulo_deportes_controlador(){
		if (isset($_POST["add_articulo_deportes"])){

	if ($_POST["codigo"]=="" || $_POST["nombre"]=="" || $_POST["cantidad"]=="" || $_POST["disciplina"]=="" || $_POST["fecha"]=="" || $_POST["descripcion"]=="")  {
	
	$baneado= $_SESSION["validate_deportes"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{


		$clave=$_POST["codigo"];	
		$duplicado = Datos::check_duplicate_item_deport($clave,"inv_deport");
		if ($clave==$duplicado["codigo_inv"]) {			
		header("location:index.php?accion=dupli_item_deportes");
				}
		else{

			$datos = array("codigo" =>$_POST["codigo"],
						   "nombre" =>$_POST["nombre"],
						   "cantidad" =>$_POST["cantidad"],
						   "disciplina" =>$_POST["disciplina"],
						   "fecha" =>$_POST["fecha"],
						   "descripcion" =>$_POST["descripcion"]);

			$reply = Datos::registro_articulo_deportes_modelo($datos, "inv_deport");
			if ($reply=="success") {
				header("location:index.php?accion=ok_item_deportes");
			}
			else{
				header("location:index.php?accion=no_item_deportes");
			}
		}
	}
}
}
	public function add_disciplina_deportes_controlador(){
		if (isset($_POST["add_disciplina_deportes"])){
	if ($_POST["tipo"]=="" || $_POST["nombre"]=="")  {
	
	$baneado= $_SESSION["validate_deportes"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{
		$clave=$_POST["nombre"];	
		$duplicado = Datos::check_duplicate_dis_deport($clave,"acti_dep");
		if ($clave==$duplicado["nombre_actividad"]) {			
		header("location:index.php?accion=dupli_dis_deportes");
				}
		else{
			$datos = array("nombre" =>$_POST["nombre"],
						   "tipo" =>$_POST["tipo"]);

			$reply = Datos::add_disciplina_deportes_modelo($datos, "acti_dep");
			if ($reply=="success") {
				header("location:index.php?accion=ok_disciplina");
			}
			else{
				header("location:index.php?accion=no_disciplina");
			}
		}
	}
  }
}


	public function add_paciente_medico_controlador(){
		if (isset($_POST["nuevo_paciente"])) {

	if ($_POST["numero_paciente"]=="" || $_POST["nombre"]=="" || $_POST["apellidos"]=="" || $_POST["carrera"]=="" || $_POST["rh"]=="" || $_POST["genero"]=="" || $_POST["primer"]=="" || $_POST["alergias"]=="" || $_POST["padecimiento"]=="" || $_POST["fecha_nacimiento"]=="" || $_POST["sangre"]==""  || $_POST["observaciones"]=="" )  {

	$baneado= $_SESSION["validate_medico"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{
		$clave=$_POST["numero_paciente"];	
		$duplicado = Datos::check_duplicate_paciente($clave,"paci_med");
		if ($clave==$duplicado["matricula_paciente"]) {			
		header("location:index.php?accion=duplicate_paciente");
				}

		else{
			date_default_timezone_set('America/Mexico_City');
			$fecha_add=date('Y-m-d');
			$datos = array("numero_paciente"=>$_POST["numero_paciente"],
						   "nombre"=>$_POST["nombre"],
						   "apellidos"=>$_POST["apellidos"],
						   "carrera"=>$_POST["carrera"],
						   "rh"=>$_POST["rh"],
						   "genero"=>$_POST["genero"],
						   "primer"=>$_POST["primer"],
						   "alergias"=>$_POST["alergias"],
						   "padecimiento"=>$_POST["padecimiento"],
						   "fecha_nacimiento"=>$_POST["fecha_nacimiento"],
						   "sangre"=>$_POST["sangre"],
						   "fecha_add"=>$fecha_add,
						   "observaciones"=>$_POST["observaciones"]);

			$reply=Datos::add_paciente_medico_modelo($datos, "paci_med");
			if ($reply=="success") {
				header("location:index.php?accion=ok_new_paciente");
			}
			else{
				header("location:index.php?accion=no_new_paciente");
			}
		}
	}
}
}

	public function prog_evento_medico_controlador(){
		if (isset($_POST["prog_evento_medico"])) {
	if ($_POST["tema"]=="" || $_POST["fecha"]=="" || $_POST["tipo"]=="" || $_POST["carrera"]=="" || $_POST["descripcion"]==""  )  {

	$baneado= $_SESSION["validate_medico"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{
			$datos=array("tema"=>$_POST["tema"],
						 "fecha"=>$_POST["fecha"],
						 "tipo"=>$_POST["tipo"],
						 "carrera"=>$_POST["carrera"],
						 "realizado"=>"pendiente",
						 "descripcion"=>$_POST["descripcion"]);

			$reply=Datos::prog_evento_medico_medelo($datos, "ev_prog_med");
			if ($reply=="success") {
				header("location:index.php?accion=ok_nuevo_evento");
			}
			else{
				header("location:index.php?accion=no_nuevo_evento");
			}
		}
	}

}
	public function agregar_usuario_adyc_controlador(){
		if (isset($_POST["add_user_adyc"])){
	
		$clave=$_POST["numero_trab"];	
		$duplicado = Datos::check_duplicate_trabajador($clave,"user_sys");
		if ($clave==$duplicado["num_trabajador"]) {			
		header("location:index.php?accion=duplicate_trabajador");
				}

		else{
			$encriptar = crypt($_POST["password"], 'D10S_messi_CRypt');
			$datos = array("numero" =>$_POST["numero_trab"],
						   "nombre" =>$_POST["nombre"],
						   "telefono" =>$_POST["telefono"],
						   "email" =>$_POST["email"],
						   "password" =>$encriptar,
						   "area"=>"adyc");

			$reply=Datos::agregar_usuario_admin_modelo($datos,"user_sys");
			if ($reply=="success") {
				header("location:index.php?accion=ok_godinez_add");
			}
			else{
				header("location:index.php?accion=no_godinez_add");
			}
		}
		}

		if (isset($_POST["add_user_medico"])){

		$clave=$_POST["numero_trab"];	
		$duplicado = Datos::check_duplicate_trabajador($clave,"user_sys");
		if ($clave==$duplicado["num_trabajador"]) {			
		header("location:index.php?accion=duplicate_trabajador");
				}
		else{
			$encriptar = crypt($_POST["password"], 'D10S_messi_CRypt');
			$datos = array("numero" =>$_POST["numero_trab"],
						   "nombre" =>$_POST["nombre"],
						   "telefono" =>$_POST["telefono"],
						   "email" =>$_POST["email"],
						   "password" =>$encriptar,
						   "area"=>"medico");

			$reply=Datos::agregar_usuario_admin_modelo($datos,"user_sys");
			if ($reply=="success") {
				header("location:index.php?accion=ok_godinez_add");
			}
			else{
				header("location:index.php?accion=no_godinez_add");
		}
	}
}

		if (isset($_POST["add_user_difusion"])){

		$clave=$_POST["numero_trab"];	
		$duplicado = Datos::check_duplicate_trabajador($clave,"user_sys");
		if ($clave==$duplicado["num_trabajador"]) {			
		header("location:index.php?accion=duplicate_trabajador");
				}
		else{
			$encriptar = crypt($_POST["password"], 'D10S_messi_CRypt');

			$datos = array("numero" =>$_POST["numero_trab"],
						   "nombre" =>$_POST["nombre"],
						   "telefono" =>$_POST["telefono"],
						   "email" =>$_POST["email"],
						   "password" =>$encriptar,
						   "area"=>"difusion");

			$reply=Datos::agregar_usuario_admin_modelo($datos,"user_sys");
			if ($reply=="success") {
				header("location:index.php?accion=ok_godinez_add");
			}
			else{
				header("location:index.php?accion=no_godinez_add");
			}
		}

	}

}


public function pre_registro_controlador(){
	if (isset($_POST["add_new_pre"])) {
	if ($_POST["nombre_pre"]=="" || $_POST["apellidos_pre"]=="" || $_POST["carrera_pre"]=="" || $_POST["id_iems"]=="" || $_POST["observaciones_pre"]=="")  {

	$baneado= $_SESSION["validate_difusion"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{
		$estado="no";
		date_default_timezone_set('America/Mexico_City');
		$fecha = date('Y-m-d');
		$datos = array("nombre" =>$_POST["nombre_pre"],
				       "apellidos" =>$_POST["apellidos_pre"],
				       "carrera" =>$_POST["carrera_pre"],
				   	   "fecha" =>$fecha,
				   	   "id_iems"=>$_POST["id_iems"],
				   	   "estado" => $estado,
				   	   "observaciones" =>$_POST["observaciones_pre"],);

		$reply=Datos::pre_registro_modelo($datos, "pre_r");
		if ($reply=="success") {
			header("location:index.php?accion=ok_pre-registro");
		}
		else{
			header("location:index.php?accion=no_pre-registro");
		}
	}
}
}
public function prog_new_ev_dif_controlador(){
	if (isset($_POST["add_new_event_difu"])) {

	if ($_POST["tipo_ev"]=="" || $_POST["actividad_ev"]=="" || $_POST["area"]=="" || $_POST["fecha_ev"]=="" || $_POST["id_esto"]=="" || $_POST["turno"]=="")  {

	$baneado= $_SESSION["validate_difusion"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{
		$datos = array("tipo" =>$_POST["tipo_ev"],
					   "actividad" =>$_POST["actividad_ev"],
					   "area" =>$_POST["area"],
					   "fecha" =>$_POST["fecha_ev"],
					   "iems" =>$_POST["id_esto"],
					   "realizado" =>"pendiente",
					   "turno" =>$_POST["turno"]);

		$reply=Datos::prog_new_ev_dif_modelo($datos,"ev_prog_iems");
		if ($reply=="success") {
			header("location:index.php?accion=ok_programa_evento");
		}
		else{
			header("location:index.php?accion=ok_programa_evento");
		}
	}
}
}

public function new_consulta_medica_medico_controlador(){
	if (isset($_POST["consulta_new_query"])) {

	if ($_POST["id_paciente"]=="" || $_POST["date_consulta"]=="" || $_POST["presion"]=="" || $_POST["temperatura"]=="" || $_POST["peso"]=="" || $_POST["sintomas"]=="" || $_POST["curaciones"]=="" || $_POST["diagnostico"]=="" || $_POST["medicamentos"]=="" || $_POST["paraclinicos"]=="" || $_POST["observaciones"]=="" )  {

	$baneado= $_SESSION["validate_medico"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{
		$datos = array("id" => $_POST["id_paciente"],
					   "fecha" => $_POST["date_consulta"],
					   "presion" => $_POST["presion"],
					   "temperatura" => $_POST["temperatura"],
					   "peso" => $_POST["peso"],
					   "sintomas" => $_POST["sintomas"],
					   "curaciones" => $_POST["curaciones"],
					   "diagnostico" => $_POST["diagnostico"],
					   "medicamentos" => $_POST["medicamentos"],
					   "paraclinicos" => $_POST["paraclinicos"],
					   "observaciones" => $_POST["observaciones"]);

		$respuesta=Datos::new_consulta_medica_medico_modelo($datos, "consu_med");
		if ($respuesta=="success") {
			header("location:index.php?accion=ok_consulta_medica");
		}
		else{
			header("location:index.php?accion=no_consulta_medica");
		}
	}
}
}



	/*==========================================================================================
	=            TERMINAN LAS FUNCIONES DE REGISTRO DE DATOS EN LA BD DEL SISTEMA          =
	==========================================================================================*/






	/*==========================================================================================
	=            TEMPIEZAN LAS FUNCIONES DE EACTUALIZACIÓN DE DATOS DEL SISTEMA          =
	==========================================================================================*/

public function desbloqueo_godinez(){
	if (isset($_POST["confirma_desbloqueo"])) {

		$datos = array("id" =>$_POST["id_userSys"],
					   "area"=> $_POST["area_godinez"] );


		$repuesta=Datos::desbloqueo_godinez_modelo($datos, "user_sys");
		if ($repuesta=="success") {
			header("location:index.php?accion=si_desbloqueo_godinez");
		}
		else{
			header("location:index.php?accion=no_desbloqueo_godinez");
		}
	}
}

public function confirma_seleccion_controlador(){
	if (isset($_POST["confirma_seleccion"])) {
	if ($_POST["id_foraneo"]==""  )  {

	$baneado= $_SESSION["validate_deportes"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{
		$dato=  $_POST["id_foraneo"];			   	       
		$reply=Datos::confirma_seleccion_modelo($dato, "alu_depor");
		if ($reply=="success") {
			header("location:index.php?accion=ok_confirmed_seleccion");
		}
		else{
			header("location:index.php?accion=no_confirmed_seleccion");
		}
	}
}
}
public function edita_alumno_deportes_controlador(){
	if (isset($_POST["edit_alumno_deportes"])) {
	if ($_POST["id_fora_edit"]=="" || $_POST["new_matricula"]=="" || $_POST["new_cuatrimestre"]=="")  {

	$baneado= $_SESSION["validate_deportes"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{
		$clave=$_POST["new_matricula"];
		$duplicado = Datos::check_duplucate_alumno($clave,"alu_depor");
		if ($clave==$duplicado["matricula_alumno"]) {			
		header("location:index.php?accion=duplicate_alumno");
				}
		else{
		 $datos = array("id" => $_POST["id_fora_edit"],
		 				"matricula" => $_POST["new_matricula"],
		 				"cuatrimestre" => $_POST["new_cuatrimestre"] );

		 $respuesta=Datos::edita_alumno_deportes_modelo($datos, "alu_depor");
		 if ($respuesta=="success") {
		 	header("location:index.php?accion=ok_update_alumno");
		 }
		 else{
		 	header("location:index.php?accion=no_update_alumno");
		 }
	}
}
}
}
public function actualiza_inventario_deportes_controlador(){
	if (isset($_POST["add_more_articles"])) {
	if ($_POST["fecha_add"]=="" || $_POST["id_foraneo"]=="" )  {

	$baneado= $_SESSION["validate_deportes"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{
		$cantidad= $_POST["cantidad_actual"] + $_POST["cantidad_add"];
		$datos = array('fecha' => $_POST["fecha_add"],
					   'id' => $_POST["id_foraneo"],
					   'cantidad' => $cantidad);

		$reply=Datos::actualiza_inventario_deportes_modelo($datos, "inv_deport");
		if ($reply=="success") {
			header("location:index.php?accion=ok_update_count_item");
		}
		else{
			header("location:index.php?accion=no_update_count_item");
		}
	}
}
}
public function update_iems_controlador(){
	if (isset($_POST["update_iems"])) {
	if ($_POST["udp_nombre"]=="" || $_POST["udp_email"]=="" || $_POST["udp_tel1"]=="" || $_POST["udp_tel2"]=="" || $_POST["udp_coordinador"]=="" || $_POST["id_iem"]=="" || $_POST["udp_observaciones"]=="")  {

	$baneado= $_SESSION["validate_difusion"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{

		$nombre=$_POST["udp_nombre"];	
		$duplicado = Datos::check_duplucate_iems2($nombre,"iems_difu");
		if ( $nombre == $duplicado["nom_iems"]) {			
		header("location:index.php?accion=duplucate_iems");
				}
		else{

		$datos = array("nombre" => $_POST["udp_nombre"],
						"email"=>$_POST["udp_email"],
						"tel1" => $_POST["udp_tel1"],
						"tel2" => $_POST["udp_tel2"],
						"coordinador" => $_POST["udp_coordinador"],
						"id"		=> $_POST["id_iem"],
						"observaciones" => $_POST["udp_observaciones"]);
		

		$respuesta = Datos::update_iems_modelo($datos, "iems_difu");
		if ($respuesta=="success") {
			header("location:index.php?accion=ok_update_iems");
		}
		else{
			header("location:index.php?accion=no_update_iems");
		}
	}
}
}
}

public function confirma_ingreso_difusion_controlador(){
	if(isset($_POST["confirma_ingreso"])){
		if ($_POST["id_foraneo"]=="" )  {

	$baneado= $_SESSION["validate_difusion"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{

		$datos = array("id" => $_POST["id_foraneo"],
						"confirma" => "si" );

		$respuesta=Datos::confirma_ingreso_difusion_controlador($datos, "pre_r");
		if ($respuesta=="success") {
			header("location:index.php?accion=ok_confirm_ingreso");
		}
		else{
			header("location:index.php?accion=no_confirm_ingreso");
		}
	}
}
}




public function update_matricula_paciente_controlador(){
	if (isset($_POST["update_paciente"])) {
	if ($_POST["id_id"]=="" || $_POST["new_matricula"]=="")  {

	$baneado= $_SESSION["validate_medico"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{

		$clave=$_POST["new_matricula"];	
		$duplicado = Datos::check_duplicate_paciente($clave,"paci_med");
		if ($clave==$duplicado["matricula_paciente"]) {			
		header("location:index.php?accion=duplicate_paciente");
				}
		else{
		$datos = array("id" => $_POST["id_id"],
					   "matricula" => $_POST["new_matricula"] );

		$response=Datos::update_matricula_paciente_modelo($datos, "paci_med");
		if ($response=="success") {
			header("location:index.php?accion=ok_update_paciente");
		}
		else{
			header("location:index.php?accion=no_update_paciente");
		}
	}
}
}
}
public function update_godinez_controlador(){
	if (isset($_POST["upd_us_dep"])) {

		$encriptar = crypt($_POST["pass"], 'D10S_messi_CRypt');
		$datos = array("id" =>$_POST["id"],
					   "matricula" =>$_POST["matricula"],
						"nombre" =>$_POST["nombre"],
						"telefono" =>$_POST["telefono"],
						"email" =>$_POST["email"],
						"pass" =>$encriptar);

		$respuesta=Datos::update_godinez_modelo($datos,"user_sys");
		if ($respuesta=="success") {
			header("location:index.php?accion=ok_update_godinez");
		}
		else{
			header("location:index.php?accion=no_update_godinez");
		}
	}
}

public function add_more_articulos_medico_controlador(){
	if (isset($_POST["add_mas_articulo_medico"])) {
	if ($_POST["id_articulo"]=="" || $_POST["cant_actual"]=="" || $_POST["cantidad"]=="")  {

	$baneado= $_SESSION["validate_medico"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{
		$cantidad=$_POST["cant_actual"] + $_POST["cantidad"];
		date_default_timezone_set('America/Mexico_City');
		$fecha= date('Y-m-d');

		$datos = array("id" => $_POST["id_articulo"],
						"cantidad" => $cantidad,
						"fecha" => $fecha);

		$reply=Datos::add_more_articulos_medico_modelo($datos, "exis_inv_med");
		if ($reply=="success") {
			header("location:index.php?accion=ok_mas_medicamentos");
		}
		else{
			header("location:index.php?accion=no_mas_medicamentos");
		}
	}
}
}

public function mas_articulos_difusion_controlador(){
	if (isset($_POST["mas_articulos_difusion"])) {
	if ($_POST["id"]=="" || $_POST["cant_actual"]=="" || $_POST["cantidad"]=="")  {

	$baneado= $_SESSION["validate_medico"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{
		$cantidad=$_POST["cant_actual"] + $_POST["cantidad"];
		//Fecha local
		date_default_timezone_set('America/Mexico_City');
		$fecha=date('Y-m-d');

		$datos = array("id" =>$_POST["id"],
						"fecha"=>$fecha,
						"cantidad" =>$cantidad );

		$reply=Datos::mas_articulos_difusion_modelo($datos,"inv_dif");
		if ($reply=="success") {
			header("location:index.php?accion=ok_more_item");
		}
		else{
			header("location:index.php?accion=no_more_item");
		}
	}
}
}

public function menos_articulos_difusion_controlador(){
	if (isset($_POST["del_art_difusion"])) {

	if ($_POST["id_articulo"]=="" || $_POST["cantidad_actual"]=="" || $_POST["nombre"]=="" || $_POST["cantidad"]=="" || $_POST["motivo"]=="")  {
	$baneado= $_SESSION["validate_difusion"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{

		date_default_timezone_set('America/Mexico_City');
		$fecha=date('Y-m-d');
		$actual = $_POST["cantidad_actual"];
		$delete = $_POST["cantidad"];
		$delete = (int) $delete;
		$actual=(int) $actual;
		$cantidad= $actual - $delete; 

		if ($cantidad < 0) {

		header("location:index.php?accion=no_menos_cero_items_difusion");

		}
else{
		$datos = array("id" =>$_POST["id_articulo"],
					   "fecha" =>$fecha,
					   "cantidad_actual" =>$cantidad,
					   "cantidad_delete" =>$_POST["cantidad"],
					   "nombre" =>$_POST["nombre"],
						"motivo" => $_POST["motivo"]);

		$respuesta=Datos::menos_articulos_difusion_modelo($datos, "inv_dif", "inv_del");
		if ($respuesta=="success") {
			header("location:index.php?accion=ok_del_item_dif");
		}
		else{
			header("location:index.php?accion=no_del_item_dif");	
		}
	}
}
}
}

public function menos_inventario_deportes_controlador(){
	if (isset($_POST["del_deport"])) {
	if ($_POST["nombre"]=="" || $_POST["disciplina"]=="" || $_POST["cantidad"]=="" || $_POST["cantidad_actual"]=="" || $_POST["motivo_del"]=="" || $_POST["id_"]=="")  {
	$baneado= $_SESSION["validate_deportes"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{

		$actual = $_POST["cantidad_actual"];
		$delete = $_POST["cantidad"];
		$delete = (int) $delete;
		$actual=(int) $actual;
		$cantidad= $actual - $delete;
		if ($cantidad < 0) {

		header("location:index.php?accion=no_menos_cero_items_deportes");

		}
else{
		date_default_timezone_set('America/Mexico_City');
		$fecha=date('Y-m-d');

		$datos = array("nombre" =>$_POST["nombre"],
					   "disciplina" =>$_POST["disciplina"],
					   "cantidad" =>$_POST["cantidad"],
					   "cantidad_actual"=>$cantidad,
					   "motivo" =>$_POST["motivo_del"],
					   "id" =>$_POST["id_"],
					   "fecha" =>$fecha);

		$respuesta = Datos::menos_inventario_deportes_modelo($datos, "del_inv_dep", "inv_deport");
		 if ($respuesta=="success") {
		 	header("location:index.php?accion=ok_deleted_item_deportes");
		 }
		 else{
		 	header("location:index.php?accion=no_deleted_item_deportes");
		 }
	}
}
}
}
public function elimina_medicamentos_controlador(){
	if (isset($_POST["delete_medicinas"])) {

	if ($_POST["id"]=="" || $_POST["nombre"]=="" || $_POST["cantidad"]=="" || $_POST["grupo"]=="" || $_POST["presentacion"]=="" || $_POST["codigo"]=="" || $_POST["sustancia"]=="" || $_POST["motivo"]=="" || $_POST["cant_actual"]=="")  {
	$baneado= $_SESSION["validate_medico"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{

		$actual = $_POST["cant_actual"];
		$delete = $_POST["cantidad"];
		$delete = (int) $delete;
		$actual=(int) $actual;
		$cantidad= $actual - $delete;
		if ($cantidad < 0) {

		header("location:index.php?accion=no_menos_cero_items_medico");	

		}
		else{
		date_default_timezone_set('America/Mexico_City');
		$fecha=date('Y-m-d');

		$datos = array("id" =>$_POST["id"],
					   "cantidad" =>$_POST["cantidad"],
					   "nombre" =>$_POST["nombre"],
					   "grupo" =>$_POST["grupo"],
					   "presentacion" =>$_POST["presentacion"],
					   "codigo" =>$_POST["codigo"],
					   "sustancia" =>$_POST["sustancia"],
					   "motivo" =>$_POST["motivo"],
					   "fecha" =>$fecha,
					   "canti_up" =>$cantidad);

		$respuesta=Datos::elimina_medicamentos_modelo($datos, "exis_inv_med", "del_inv_med");
		if ($respuesta=="success") {
			header("location:index.php?accion=ok_menos_medicamentos");
		}
		else{
			header("location:index.php?accion=no_menos_medicamentos");
		}
	}
}
}
}
public function evento_no_difusion_controlador(){
	if (isset($_POST["no_evento_difu"])) {

	if ($_POST["id"]=="" || $_POST["motivo"]=="")  {
	$baneado= $_SESSION["validate_difusion"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{

		$datos = array("id" =>$_POST["id"],
					   "motivo" =>$_POST["motivo"],
					   "realizado" =>"no");

		$respuesta=Datos::evento_no_difusion_modelo($datos, "ev_prog_iems","event_no_iems");
		if ($respuesta=="success") {
			header("location:index.php?accion=ok_no_realizado_difusion");
		}
		else{
			header("location:index.php?accion=no_no_realizado_difusion");
		}
	}
}
}

public function evento_realizado_difusion_controlador(){
	if (isset($_POST["ev_maked_difusion"])) {
	if ($_POST["ido"]=="" || $_POST["#mujeres"]=="" || $_POST["observaciones"]=="" || $_POST["actividad"]=="" || $_POST["date_maked"]=="" || $_POST["#hombres"]=="" || $_POST["#viajes"]=="" )  {
	$baneado= $_SESSION["validate_medico"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{

	if( $_FILES['foto']['size'] > 1000000 || $_FILES['foto1']['size'] > 1000000 || $_FILES['foto2']['size'] > 1000000 ) {

	header("location:index.php?accion=sobre_peso_detected");

		}
else{

		if($_FILES['foto']['type'] != "image/jpg" &&
		$_FILES['foto']['type'] != "image/png" &&
		$_FILES['foto']['type'] != "image/gif" &&
		$_FILES['foto']['type'] != "image/jpeg" &&
		$_FILES['foto']['type'] != "image/bmp" )
		 {

		header("location:index.php?accion=eso_no_es_una_imagen_¬¬");
		}

		else{
		if($_FILES['foto1']['type'] != "image/jpg" &&
		$_FILES['foto1']['type'] != "image/png" &&
		$_FILES['foto1']['type'] != "image/gif" &&
		$_FILES['foto1']['type'] != "image/jpeg" &&
		$_FILES['foto1']['type'] != "image/bmp" )
		 {

		header("location:index.php?accion=eso_no_es_una_imagen_¬¬");
		}
		else{

		if($_FILES['foto2']['type'] != "image/jpg" &&
		$_FILES['foto2']['type'] != "image/png" &&
		$_FILES['foto2']['type'] != "image/gif" &&
		$_FILES['foto2']['type'] != "image/jpeg" &&
		$_FILES['foto2']['type'] != "image/bmp" )
		 {

		 header("location:index.php?accion=eso_no_es_una_imagen_¬¬");
		}
		else{

			$carga_foto = ($_FILES['foto']['tmp_name']);
			$foto = fopen($carga_foto, 'rb');

			$carga_foto1 = ($_FILES['foto1']['tmp_name']);
			$foto1 = fopen($carga_foto1, 'rb1');

			$carga_foto2 = ($_FILES['foto2']['tmp_name']);
			$foto2 = fopen($carga_foto2, 'rb2');

		$datos = array("id" =>$_POST["ido"],
					   "mujeres" =>$_POST["#mujeres"],
					   "observaciones" =>$_POST["observaciones"],
					   "actividad" =>$_POST["actividad"],
					   "fecha" =>$_POST["date_maked"],
					   "hombres" =>$_POST["#hombres"],
					   "total"=>$_POST["#mujeres"]+$_POST["#hombres"],
					   "viajes" =>$_POST["#viajes"],
					   "foto" =>$foto,
					   "foto1" =>$foto1,
					   "foto2" =>$foto2);

		$res=Datos::evento_realizado_difusion_moddelo($datos, "ev_prog_iems","event_si_iems");
		if ($res=="success") {
			header("location:index.php?accion=okconfirmed_evento_difusion");

		}
		else{
			header("location:index.php?accion=noconfirmed_evento_difusion");
		}

	}
 }
}
}
}
}
}
public function evento_norealizado_medico_controlador(){
	if(isset($_POST["ev_medico_no"])){



	if ($_POST["id"]=="" || $_POST["motivo"]=="")  {
	$baneado= $_SESSION["validate_medico"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{


		$datos = array("id" =>$_POST["id"],
					   "motivo" =>$_POST["motivo"]);

		$reply=Datos::evento_norealizado_medico_modelo($datos, "ev_prog_med", "no_ev_med");
		if ($reply=="success") {
			header("location:index.php?accion=ok_unrealizado_eventoXD");
		}
		else{
			header("location:index.php?accion=no_unrealizado_eventoXD");
		}
	}
}
}

public function evento_realizado_medico_controlador(){
	if(isset($_POST["maked_ev_med"])){


	if ($_POST["id"]=="" || $_POST["mujeres"]=="" || $_POST["tipo"]=="" || $_POST["hombres"]=="" || $_POST["fecha"]==""  || $_POST["observaciones"]=="")  {
	$baneado= $_SESSION["validate_medico"];
	$fecha= mvcControlador::fecha_to_ban();
	$rasta=Datos::baneo_usuarios($baneado, $fecha, "user_sys");
	if ($rasta=="ok") {
		header("location:index.php?accion=ban_ban");
	}
	else{
		header("location:index.php?accion=login");
	}
}
else{
$mujeres = $_POST["mujeres"];
$hombres =$_POST["hombres"];


$hombres = (int) $hombres;
$mujeres = (int) $mujeres;

		$total=$hombres + $mujeres;
		$datos = array("id" =>$_POST["id"],
					   "total"=>$total,
					   "mujeres" =>$_POST["mujeres"],
					   "tipo" =>$_POST["tipo"],
					   "hombres" =>$_POST["hombres"], 
					   "fecha" =>$_POST["fecha"],
					   "observaciones" =>$_POST["observaciones"]);

		$reply=Datos::evento_realizado_medico_modelo($datos, "ev_prog_med", "si_eve_med");
		if ($reply=="success") {
			header("location:index.php?accion=ok_evento_madeXDD");
		}
		else{
			header("location:index.php?accion=no_evento_madeXDD");
		}
	}
}
}
public function delete_godinez_controlador(){
	if (isset($_POST["confirm_delete"])) {
		
		$id=$_POST["id_foraneo"];

		$respuesta=Datos::delete_godinez_modelo("user_sys", $id);
		if ($respuesta=="success") {
			header("location:index.php?accion=ok_delete_godinez");

		}
		else{
			header("location:index.php?accion=no_delete_godinez");
		}
	}
}

public function pase_lista_controlador(){
	if (isset($_POST["add_hours"])) {

$h=	$_POST["hours_before"];
$h2=$_POST["hours"];	
$h=(int)$h;
$h2=(int) $h2;

$horas= $h+$h2;

		$datos = array("id" =>$_POST["id_al"],
					   "horas" =>$horas);

		$respuesta=Datos::pase_lista_modelo($datos, "alu_depor");
		if ($respuesta=="success") {
			header("location:index.php?accion=ok_lista");
		}
		else{
			header("location:index.php?accion=no_lista");
		}
	}
}




	/*==========================================================================================
	=         TERMINAN LAS FUNCIONES DE ACTUALIZACIÓN DE DATOS DEL SISTEMA          =
	==========================================================================================*/











	/*==========================================================================================
	=            EMPIEZAN LAS FUNCIONES DE CONSULTAS DE DATOS EN LA BD DEL SISTEMA          =
	==========================================================================================*/
public function baneados(){
	$reply =Datos::query_ban("ban", "user_sys");



		if ($reply==null) {
			echo'<div class="alert alert-info text-center">Sin usuarios bloqueados por mal uso del sistema</div>';
		}
		else{

	foreach ($reply as $row => $item) {
		echo'
<div class="card mt-3 ">
  <h9 class="card-header btn-default"><strong>'.$item["nombre_user"].' -- #'.$item["num_trabajador"].'</strong></h9>
  <div class="card-body">
    <div class="form-row"> 
        <div class="col-sm-12 col-md-6 col-lg-2 mb-1 border">
          <label for=""><strong>#Tel.:</strong> '.$item["tel_user"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
          <label for=""><strong>Email:</strong> '.$item["email_user"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
            <label for=""><strong>Contraseña:</strong> '.$item["pass_user"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">
            <label for=""><strong>Fecha del bloqueo:</strong> '.$item["baneo"].'</label>
        </div>     
    </div>
  </div>
</div>
		';
	}
}
}
public function usuarios_deportes_controlador(){
	$reply=Datos::usuarios_deportes_modelo("adyc", "user_sys");
	foreach ($reply as $row => $item) {
	 echo '
<div class="card mt-3 ">
  <h9 class="card-header btn-default"><strong>'.$item["nombre_user"].' -- #'.$item["num_trabajador"].'</strong></h9>
  <div class="card-body">
    <div class="form-row"> 
        <div class="col-sm-12 col-md-6 col-lg-2 mb-1 border">
          <label for=""><strong>#Tel.:</strong> '.$item["tel_user"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
          <label for=""><strong>Email:</strong> '.$item["email_user"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
            <label for=""><strong>Contraseña (encriptada):</strong> '.$item["pass_user"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-2 mb-1 border">
            <button class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#updat'.$item["id_user"].'" ><strong>Editar</strong></button>
        </div>
        <div class=" col-md-6 col-lg-2 mb-1 border">
        <button class="btn btn-danger btn-sm btn-block"data-toggle="modal" data-target="#borrado'.$item["id_user"].'"><strong>Borrar</strong></button>
        </div>     
    </div>
  </div>
</div>



<div class="modal fade" id="updat'.$item["id_user"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered modal-notify modal-info role="document" >
    <div class="modal-content">
    <div class="modal-header">
        <p class="heading lead"><H3 class="text-white">EDITAR USUARIO</strong></H3></p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
     </div>
  <div class="modal-body">
<form class="text-center border border-light p-5" method="post">
    <div class="form-row mb-2"> 
      <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">
        <input type="hidden" name="id" value="'.$item["id_user"].'" class="form-control">
        <input type="text" pattern="^[0-9]+" minlength="7"  name="matricula" value="'.$item["num_trabajador"].'"  class="form-control" placeholder="#Trabajador" required>
      </div>
        <div class="col-sm-12 col-md-6 col-lg-5 mb-3">
            <input type="text"  name="nombre" value="'.$item["nombre_user"].'" class="form-control" placeholder="Nombre" required>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
          <input type="text" pattern="\d{3}[\-]\d{3}[\-]\d{4}" name="telefono" value="'.$item["tel_user"].'" class="form-control" placeholder="#Tel.:(249-112-1212)" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
          <input type="email" name="email" value="'.$item["email_user"].'" class="form-control" placeholder="Email" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
          <input type="text" name="pass" value="'.$item["pass_user"].'" class="form-control" placeholder="Contraseña" required>
        </div>        
</div>
<div class="form-row mb-2"> 
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-info my-4 btn-block" name="upd_us_dep" type="submit"><strong>Agregar </strong></button>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-danger my-4 btn-block" type="button" data-dismiss="modal"><strong>Cancelar</strong></button>
    </div>
</div>
</form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="borrado'.$item["id_user"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered modal-notify modal-danger role="document" >
    <div class="modal-content">
    <div class="modal-header">
        <p class="heading lead"><H3 class="text-white">BORRAR USUARIO</H3></p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
     </div>
      <div class="modal-body">
<form class="text-center border border-light p-5 mt-2" method="post">
    <p class="h5 mb-3 btn-block ">¿ESTA SEGURO QUE DESEA BORRAR A <strong>'.$item["nombre_user"].'</strong> DEL SISTEMA ? </p>
    <input type="hidden" name="id_foraneo" value="'.$item["id_user"].'">
      <div class="form-row mb-2"> 
        <div class="col-md-6 col-lg-4 mb-2 mt-3 ">
            <button type="submit" class="btn btn-primary btn-block " name="confirm_delete">Confirmar</button>
        </div>
        <div class="col-md-6 col-lg-4 mb-2 mt-3">
          <button type="button" class="btn btn-secondary btn-block  " data-dismiss="modal">Cancelar</button>
        </div>
    </div> 
</form>
      </div>
    </div>
  </div>
</div>

	 ';
	}
}



public function usuarios_medico_controlador(){
	$reply=Datos::usuarios_medico_modelo("medico", "user_sys");
	foreach ($reply as $row => $item) {
	 echo '
<div class="card mt-3 ">
  <h9 class="card-header btn-default"><strong>'.$item["nombre_user"].' -- #'.$item["num_trabajador"].'</strong></h9>
  <div class="card-body">
    <div class="form-row"> 
        <div class="col-sm-12 col-md-6 col-lg-2 mb-1 border">
          <label for=""><strong>#Tel.:</strong> '.$item["tel_user"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
          <label for=""><strong>Email:</strong> '.$item["email_user"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
            <label for=""><strong>Contraseña (encriptada):</strong> '.$item["pass_user"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-2 mb-1 border">
            <button class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#updat'.$item["id_user"].'" ><strong>Editar</strong></button>
        </div>
        <div class=" col-md-6 col-lg-2 mb-1 border">
        <button class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#borrado'.$item["id_user"].'"><strong>Borrar</strong></button>
        </div>     
    </div>
  </div>
</div>


<div class="modal fade" id="updat'.$item["id_user"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered modal-notify modal-info role="document" >
    <div class="modal-content">
    <div class="modal-header">
        <p class="heading lead"><H3 class="text-white">EDITAR USUARIO</H3></p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
     </div>
      <div class="modal-body">
<form class="text-center border border-light p-5" method="post">
    <div class="form-row"> 
      <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">
        <input type="hidden" name="id" value="'.$item["id_user"].'" class="form-control">
        <input type="text" pattern="^[0-9]+" minlength="7" name="matricula" value="'.$item["num_trabajador"].'"  class="form-control" placeholder="#Trabajador" required>
      </div>
        <div class="col-sm-12 col-md-6 col-lg-5 mb-3">
            <input type="text"  name="nombre" value="'.$item["nombre_user"].'" class="form-control" placeholder="Nombre" required>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
          <input type="text" pattern="\d{3}[\-]\d{3}[\-]\d{4}" name="telefono" value="'.$item["tel_user"].'" class="form-control" placeholder="# Telefono" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
          <input type="email" name="email" value="'.$item["email_user"].'" class="form-control" placeholder="Email" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
          <input type="text" name="pass" value="'.$item["pass_user"].'" class="form-control" placeholder="Contraseña" required>
        </div>        
</div>
<div class="form-row mb-2"> 
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-info my-4 btn-block" name="upd_us_dep" type="submit"><strong>Agregar </strong></button>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-danger my-4 btn-block" type="button" data-dismiss="modal"><strong>Cancelar</strong></button>
    </div>
</div>
</form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="borrado'.$item["id_user"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered modal-notify modal-danger role="document" >
    <div class="modal-content">
    <div class="modal-header">
        <p class="heading lead"><H3 class="text-white">BORRAR USUARIO</H3></p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
     </div>
      <div class="modal-body">
<form class="text-center border border-light p-5 mt-2" method="post">
    <p class="h5 mb-3 btn-block ">¿ESTA SEGURO QUE DESEA BORRAR A <strong>'.$item["nombre_user"].'</strong> DEL SISTEMA ? </p>
    <input type="hidden" name="id_foraneo" value="'.$item["id_user"].'">
      <div class="form-row mb-2"> 
        <div class="col-md-6 col-lg-4 mb-2 mt-3 ">
            <button type="submit" class="btn btn-primary btn-block " name="confirm_delete">Confirmar</button>
        </div>
        <div class="col-md-6 col-lg-4 mb-2 mt-3">
          <button type="button" class="btn btn-secondary btn-block  " data-dismiss="modal">Cancelar</button>
        </div>
    </div> 
</form>
      </div>
    </div>
  </div>
</div>
	 ';
	}
}



public function usuarios_difusion_controlador(){
	$reply=Datos::usuarios_difusion_modelo("difusion", "user_sys");
	foreach ($reply as $row => $item) {
	 echo '
<div class="card mt-3 ">
  <h9 class="card-header btn-default"><strong>'.$item["nombre_user"].' -- #'.$item["num_trabajador"].'</strong></h9>
  <div class="card-body">
    <div class="form-row"> 
        <div class="col-sm-12 col-md-6 col-lg-2 mb-1 border">
          <label for=""><strong>#Tel.:</strong> '.$item["tel_user"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
          <label for=""><strong>Email:</strong> '.$item["email_user"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
            <label for=""><strong>Contraseña(encriptada):</strong> '.$item["pass_user"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-2 mb-1 border">
            <button class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#updat'.$item["id_user"].'" ><strong>Editar</strong></button>
        </div>
        <div class=" col-md-6 col-lg-2 mb-1 border">
        <button class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#borrado'.$item["id_user"].'"><strong>Borrar</strong></button>
        </div>     
    </div>
  </div>
</div>



<div class="modal fade" id="updat'.$item["id_user"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered modal-notify modal-info role="document" >
    <div class="modal-content">
    <div class="modal-header">
        <p class="heading lead"><H3 class="text-white">ACTUALIZAR USUARIO</H3></p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
     </div>
      <div class="modal-body">
<form class="text-center border border-light p-5" method="post">
    <div class="form-row mb-2"> 
      <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">
        <input type="hidden" name="id" value="'.$item["id_user"].'" class="form-control">
        <input type="text" pattern="^[0-9]+" minlength="7" name="matricula" value="'.$item["num_trabajador"].'"  class="form-control" placeholder="#Trabajador" required>
      </div>
        <div class="col-sm-12 col-md-6 col-lg-5 mb-3">
            <input type="text"  name="nombre" value="'.$item["nombre_user"].'" class="form-control" placeholder="Nombre" required>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
          <input type="text" pattern="\d{3}[\-]\d{3}[\-]\d{4}" name="telefono" value="'.$item["tel_user"].'" class="form-control" placeholder="# Telefono" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
          <input type="email" name="email" value="'.$item["email_user"].'" class="form-control" placeholder="Email" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
          <input type="text" name="pass" value="'.$item["pass_user"].'" class="form-control" placeholder="Contraseña" required>
        </div>        
</div>
<div class="form-row mb-2"> 
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-info my-4 btn-block" name="upd_us_dep" type="submit"><strong>Agregar </strong></button>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-danger my-4 btn-block" type="button" data-dismiss="modal"><strong>Cancelar</strong></button>
    </div>
</div>
</form>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="borrado'.$item["id_user"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered modal-notify modal-danger role="document" >
    <div class="modal-content">
    <div class="modal-header">
        <p class="heading lead"><H3 class="text-white">BORRAR USUARIO</H3></p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
     </div>
      <div class="modal-body">
<form class="text-center border border-light p-5 mt-2" method="post">
    <p class="h5 mb-3 btn-block ">¿ESTA SEGURO QUE DESEA BORRAR A <strong>'.$item["nombre_user"].'</strong> DEL SISTEMA ? </p>
    <input type="hidden" name="id_foraneo" value="'.$item["id_user"].'">
      <div class="form-row mb-2"> 
        <div class="col-md-6 col-lg-4 mb-2 mt-3 ">
            <button type="submit" class="btn btn-primary btn-block " name="confirm_delete">Confirmar</button>
        </div>
        <div class="col-md-6 col-lg-4 mb-2 mt-3">
          <button type="button" class="btn btn-secondary btn-block  " data-dismiss="modal">Cancelar</button>
        </div>
    </div> 
</form>
      </div>
    </div>
  </div>
</div>
	 ';
	}
}




public function query_eventos_medico_controlador(){

	$reply=Datos::query_eventos_medico_modelo("ev_prog_med");
	if ($reply!=null) {
	foreach ($reply as $row => $item) {
	echo '
<div class="card mt-3 mb-3">
  <div class="card-header bg-secondary text-white">
      <strong>Fecha programada: '.$item["fecha_evento"].'  | Carrera: '.$item["carrera"].'</strong>
    </div>
  <div class="card-body">
    <div class="form-row"> 
         <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">       
        <label for=""><strong>Tipo: </strong> '.$item["tipo_evento"].'</label> 
         </div>
         <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">       
        <label for=""><strong>Tema: </strong> '.$item["tema_evento"].'</label> 
         </div>
        <div class="col-sm-12 col-md-12 col-lg-6 mb-1 border">
           <label for=""><strong>Descripción: </strong>'.$item["descripcion_evento"].'</label>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-2 mb-1">
           <button class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#made'.$item["id_evp"].'"><strong> Realizado</strong></button>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-2">
           <button class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#no-med'.$item["id_evp"].'"><strong> No realizado</strong></button>
        </div>
    </div>
  </div>
</div>


<div class="modal fade" id="no-med'.$item["id_evp"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered modal-notify modal-danger role="document" >
    <div class="modal-content">
    <div class="modal-header">
        <p class="heading lead"><H3 class="text-white">REGISTRO DE EVENTO NO REALIZADO</strong></H3></p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
     </div>
      <div class="modal-body">
<form class="text-center border border-light p-5 mt-2" method="post">
        <div class="form-row mb-2"> 
        <div class="col-12 mb-2 ">
            <input type="text" name="motivo" class="form-control" placeholder="Motivo">
            <input type="hidden" name="id" value="'.$item["id_evp"].'" class="form-control">
        </div>
    </div>
      <div class="form-row mb-2"> 
        <div class="col-md-6 col-lg-4 mb-2 ">
            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Cancelar</button>
        </div>
        <div class="col-md-6 col-lg-4 mb-2 ">
          <button type="submit" name="ev_medico_no" class="btn btn-primary btn-block">Guardar</button>
        </div>
    </div> 
</form>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="made'.$item["id_evp"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered modal-notify modal-info role="document" >
    <div class="modal-content">
    <div class="modal-header">
        <p class="heading lead"><H3 class="text-white">REGISTRO DE EVENTO REALIZADO</strong></H3></p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
     </div>
      <div class="modal-body">
<form class="text-center border border-light p-5 " method="post">
    <div class="form-row mb-2"> 
        <div class=" col-md-12 col-lg-4 mb-3">
        <input type="date" name="fecha"  class="form-control" data-toggle="tooltip" data-placement="top"
        title="Fecha de Realización">
        </div>
        <div class=" col-md-12 col-lg-2 mb-2">
            <input type="number" min="1"  name="mujeres" class="form-control" placeholder="#Mujeres">
            <input type="hidden"  name="id" value="'.$item["id_evp"].'" class="form-control">
        </div>
        <div class=" col-md-12 col-lg-2 mb-2 ">
            <input type="number" min="1" name="hombres" class="form-control" placeholder="#Hombres">
        </div>
        <div class=" col-md-12 col-lg-4 mb-2 ">
            <input type="text" name="tipo" class="form-control" placeholder="Tipo evento">
        </div>        
      </div>
        <div class="form-row mb-2"> 
        <div class="col-12 mb-2 ">
            <input type="text" name="observaciones" class="form-control" placeholder="Observaciones">
        </div>
    </div>
      <div class="form-row mb-2"> 
        <div class="col-md-6 col-lg-4 mb-2 ">
            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">CANCELAR</button>
        </div>
        <div class="col-md-6 col-lg-4 mb-2 ">
          <button type="submit" name="maked_ev_med" class="btn btn-primary btn-block">GUARDAR</button>
        </div>
    </div> 
</form>
      </div>
    </div>
  </div>
</div>
	';
	}
  }
  else{
  		echo'<div class="card">
<div class="card-body text-center"> <h1>NO HAY EVENTOS PROGRAMADOS</h1>
</div>
	</div>';

  }
}




public function query_eventos_difusion_controlador(){
	$tabla1="ev_prog_iems";
	$tabla2="iems_difu";

	$reply=Datos::query_eventos_difusion_modelo($tabla1,$tabla2);
if ($reply!=null) {
foreach ($reply as $row => $item) {
		echo '
<div class="card mt-4 mb-3">
  <div class="card-header text-white bg-secondary">
      <strong>'.$item["nom_iems"].' -- '.$item["turno_iems"].'</strong>
    </div>
  <div class="card-body">
    <div class="form-row"> 
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">       
        <label for=""><strong>Fecha de evento:</strong> '.$item["fecha_prog"].'</label> 
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">
          <label for=""><strong>Zona de influencia:</strong> '.$item["zona_influencia"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">
          <label for=""><strong>Área que atendera:</strong>'.$item["carrera_ev"].'</label>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-2 mb-1">
           <button class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#zado'.$item["id_prog"].'"><strong> Realizado</strong></button>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-2">
           <button class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#ev-no'.$item["id_prog"].'"><strong> No realizado</strong></button>
        </div>
    </div>
  </div>
</div>




<div class="modal fade" id="ev-no'.$item["id_prog"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered modal-notify modal-warning role="document" >
    <div class="modal-content">
    <div class="modal-header">
        <p class="heading lead"><H3 class="text-white">REGISTRAR EVENTO NO REALIZADO</H3></p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
     </div>
      <div class="modal-body">
<form class="text-center border border-light p-5" method="post">
        <div class="form-row mb-2"> 
        <div class="col-12 mb-2 ">
            <input type="text" name="motivo" class="form-control" placeholder="Motivo">
            <input type="hidden" name="id"   value="'.$item["id_prog"].'" class="form-control">
        </div>
    </div>
      <div class="form-row mb-2"> 
        <div class="col-md-6 col-lg-4 mb-2 ">
            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Cancelar</button>
        </div>
        <div class="col-md-6 col-lg-4 mb-2 ">
          <button type="submit" class="btn btn-primary btn-block" name="no_evento_difu">Guardar</button>
        </div>
    </div> 
</form>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="zado'.$item["id_prog"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered modal-notify modal-info role="document" >
    <div class="modal-content">
    <div class="modal-header">
        <p class="heading lead"><H3 class="text-white">REGISTRAR EVENTO  REALIZADO</H3></p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
     </div>
      <div class="modal-body">
<form class="text-center border border-light p-5"  method="post" enctype="multipart/form-data">
    <div class="form-row mb-2"> 
        <div class=" col-md-12 col-lg-4 mb-3">
        <input type="date" name="date_maked"  class="form-control" data-toggle="tooltip" data-placement="top"  title="Fecha de Realización">
        <input type="hidden" name="ido" value="'.$item["id_prog"].'"  class="form-control">
       
        </div>
        <div class=" col-md-12 col-lg-3 mb-2">
            <input type="number" min="1"  name="#mujeres" class="form-control" placeholder="# Mujeres">
        </div>
        <div class=" col-md-12 col-lg-3 mb-2 ">
            <input type="number" min="1" name="#hombres" class="form-control" placeholder="# Hombres">
        </div>
        <div class=" col-md-12 col-lg-2 mb-2 ">
            <input type="number" min="1" name="#viajes" class="form-control" placeholder="# Viajes">
        </div>        
      </div>
        <div class="form-row mb-2"> 
        <div class="col-12 mb-2 ">
            <input type="text" name="descripcion" class="form-control" placeholder="Descripción">
        </div>
        <div class="col-lg-6 col-md-12 mb-2 ">
            <input type="text" name="observaciones" class="form-control" placeholder="Observaciones">
        </div>  
        <div class="col-lg-6 col-md-12 mb-2 ">
            <input type="text" name="actividad" class="form-control" placeholder="Actividad realizada">
        </div>  
        <div class="col-6 mb-2 ">

<div class="input-default-wrapper mt-3">
  <span class="input-group-text mb-3" id="input1'.$item["id_prog"].'">Foto 1</span>
  <input type="file" name="foto" id="file-with-current1'.$item["id_prog"].'" class="input-default-js">
  <label class="label-for-default-js rounded-right mb-3" for="file-with-current1'.$item["id_prog"].'"><span class="span-choose-file">Seleccionar 
    imagen</span>
    <div class="float-right span-browse btn-secondary text-white"><strong>Buscar</strong></div>
  </label>
</div></div>
<div class="col-6 mb-2 ">
<div class="input-default-wrapper mt-3">
  <span class="input-group-text mb-3" id="input2'.$item["id_prog"].'">Foto 2</span>
  <input type="file" name="foto1" id="file-with-current2'.$item["id_prog"].'" class="input-default-js">
  <label class="label-for-default-js rounded-right mb-3" for="file-with-current2'.$item["id_prog"].'"><span class="span-choose-file">Seleccionar 
    imagen</span>
    <div class="float-right span-browse btn-secondary text-white"><strong>Buscar</strong></div>
  </label>
</div>
</div><div class="col-6 mb-2 ">
<div class="input-default-wrapper mt-3">
  <span class="input-group-text mb-3" id="input3'.$item["id_prog"].'">Foto 3</span>
  <input type="file" name="foto2" id="file-with-current3'.$item["id_prog"].'" class="input-default-js">
  <label class="label-for-default-js rounded-right mb-3" for="file-with-current3'.$item["id_prog"].'"><span class="span-choose-file">Seleccionar 
    imagen</span>
    <div class="float-right span-browse btn-secondary text-white"><strong>Buscar</strong></div>
  </label>
</div></div> 


                              
    </div>
      <div class="form-row mb-2"> 
        <div class="col-md-6 col-lg-4 mb-2 ">
            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Cancelar</button>
        </div>

        <div class="col-md-6 col-lg-4 mb-2 ">
          <button type="submit" name="ev_maked_difusion" class="btn btn-primary btn-block">Guardar</button>
        </div>
    </div> 
</form>
      </div>
    </div>
  </div>
</div>';
	}
}

else{

	echo'<div class="card">
<div class="card-body text-center text-white bg-warning"> <h1>NO HAY EVENTOS PROGRAMADOS</h1>
</div>
	</div>';
}
}
}
?>