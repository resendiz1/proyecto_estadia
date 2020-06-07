<?php 
require_once "conexion.php";


class Datos extends Conexion{



	/*==========================================================================================
	=            CONSULTAS DE CARRERA Y DISCIPLINA PARA EL LIST DE ALGUNOS FORMULARIOS          =
	==========================================================================================*/

	static public function query_disciplina_modelo($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT nombre_actividad FROM $tabla");

		$stmt->execute();
		return $stmt->fetchAll();
	}

	static public function query_carrera_modelo($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT nombre_carrera FROM $tabla");

		$stmt->execute();
		return $stmt->fetchAll();
	}

	static public function  query_iems_modelo($tabla){
		$stmt=Conexion::conectar()->prepare("SELECT nom_iems, distancia_iems FROM $tabla");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	static public function query_pase_lista_modelo($query, $tabla){
		$stmt=Conexion::conectar()->prepare("SELECT id_prof, nombre_profesor, disciplina_docente FROM $tabla WHERE num_trabajador = :query");
		$stmt->bindParam(":query", $query, PDO::PARAM_STR);

		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	static public function query_bloq_inten_modelo($tabla){
		$stmt=Conexion::conectar()->prepare("SELECT id_user, num_trabajador, nombre_user, tel_user, email_user, baneo, area_intento FROM $tabla WHERE area_sys_user = 'intentos'");

		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	/*==========================================================================================
	=            TERMINAN CONSULTAS DE CARRERA Y DISCIPLINA PARA EL LIST DE ALGUNOS FORMULARIOS          =
	==========================================================================================*/

	/*==========================================================================================
	=            COMPROBANDO DUPLICADOS DE LOS REGISTROS POR QUE LA GENTE PARECE 
			     QUE NO PUEDE VERIFICAR POR SU CUENTA 
	         =
	==========================================================================================*/

static public function check_duplucate_iems($clave, $nombre, $tabla){
	$stmt=Conexion::conectar()->prepare("SELECT clave_iems, nom_iems FROM $tabla WHERE clave_iems = :clave OR nom_iems = :nombre");
	$stmt->bindParam(":clave", $clave, PDO::PARAM_STR);
	$stmt->bindParam(":nombre", $nombre,PDO::PARAM_STR);
	$stmt->execute();
	return $stmt ->fetch();
	$stmt->close();
}
static public function check_duplucate_iems2($nombre, $tabla){
	$stmt=Conexion::conectar()->prepare("SELECT  nom_iems FROM $tabla WHERE  nom_iems = :nombre");
	$stmt->bindParam(":nombre", $nombre,PDO::PARAM_STR);
	$stmt->execute();
	return $stmt ->fetch();
	$stmt->close();
}
static public function check_duplicate_docente($clave,$tabla){
	$stmt=Conexion::conectar()->prepare("SELECT num_trabajador FROM $tabla WHERE num_trabajador = :clave");
	$stmt->bindParam(":clave", $clave, PDO::PARAM_STR);
	$stmt->execute();
	return $stmt ->fetch();
	$stmt->close();	
}

static public function check_duplicate_alumno($clave, $tabla){
	$stmt=Conexion::conectar()->prepare("SELECT matricula_alumno FROM $tabla WHERE matricula_alumno = :clave");
	$stmt->bindParam(":clave", $clave, PDO::PARAM_STR);
	$stmt->execute();
	return $stmt ->fetch();
	$stmt->close();
}

static public function check_duplicate_item_difu($clave,$tabla){
	$stmt=Conexion::conectar()->prepare("SELECT codigo FROM $tabla WHERE codigo = :clave");
	$stmt->bindParam(":clave", $clave, PDO::PARAM_STR);
	$stmt->execute();
	return $stmt ->fetch();
	$stmt->close();

}

static public  function check_duplicate_item_med($clave, $tabla){
	$stmt=Conexion::conectar()->prepare("SELECT codigo_medica FROM $tabla WHERE codigo_medica = :clave");
	$stmt->bindParam(":clave", $clave, PDO::PARAM_STR);
	$stmt->execute();
	return $stmt ->fetch();
	$stmt->close();
}

static public function check_duplicate_item_deport($clave, $tabla){
	$stmt=Conexion::conectar()->prepare("SELECT codigo_inv FROM $tabla WHERE codigo_inv = :clave");
	$stmt->bindParam(":clave", $clave, PDO::PARAM_STR);
	$stmt->execute();
	return $stmt ->fetch();
	$stmt->close();
}

static public function check_duplicate_dis_deport($clave,$tabla){
	$stmt=Conexion::conectar()->prepare("SELECT nombre_actividad FROM $tabla WHERE nombre_actividad = :clave");
	$stmt->bindParam(":clave", $clave, PDO::PARAM_STR);
	$stmt->execute();
	return $stmt ->fetch();
	$stmt->close();	
}

static public function check_duplicate_paciente($clave,$tabla){
	$stmt=Conexion::conectar()->prepare("SELECT matricula_paciente FROM $tabla WHERE matricula_paciente = :clave");
	$stmt->bindParam(":clave", $clave, PDO::PARAM_STR);
	$stmt->execute();
	return $stmt ->fetch();
	$stmt->close();	
}


static public function check_duplicate_trabajador($clave,$tabla){
	$stmt=Conexion::conectar()->prepare("SELECT num_trabajador FROM $tabla WHERE num_trabajador = :clave");
	$stmt->bindParam(":clave", $clave, PDO::PARAM_STR);
	$stmt->execute();
	return $stmt ->fetch();
	$stmt->close();		
}

static public function check_duplucate_alumno($clave,$tabla){
	$stmt=Conexion::conectar()->prepare("SELECT matricula_alumno FROM $tabla WHERE matricula_alumno = :clave");
	$stmt->bindParam(":clave", $clave, PDO::PARAM_STR);
	$stmt->execute();
	return $stmt ->fetch();
	$stmt->close();	
}
	/*==========================================================================================
	=          TERMINA  COMPROBANDO DUPLICADOS DE LOS REGISTROS POR QUE LA GENTE PARECE 
			   QUE NO PUEDE VERIFICAR POR SU CUENTA 
	         =
	==========================================================================================*/

static public function in_medico_modelo($datos, $tabla){
	$stmt = Conexion::conectar()->prepare("SELECT id_user, num_trabajador, pass_user FROM $tabla WHERE num_trabajador = :usuario AND area_sys_user = :area");

	$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
	$stmt->bindParam(":area", $datos["area"], PDO::PARAM_STR);
	$stmt -> execute();
	return $stmt -> fetch();
	$stmt -> close();
}

static public function in_deportes_modelo($datos, $tabla){

	$stmt = Conexion::conectar()->prepare("SELECT id_user, num_trabajador, pass_user, intentos FROM $tabla WHERE num_trabajador = :usuario AND area_sys_user = :area");

	$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
	$stmt->bindParam(":area", $datos["area"], PDO::PARAM_STR);
	$stmt -> execute();
	return $stmt -> fetch();
	$stmt -> close();
}

static public function in_difusion_modelo($datos, $tabla){

	$stmt = Conexion::conectar()->prepare("SELECT id_user, num_trabajador, pass_user FROM $tabla WHERE num_trabajador = :usuario AND area_sys_user = :area");

	$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
	$stmt->bindParam(":area", $datos["area"], PDO::PARAM_STR);
	$stmt -> execute();
	return $stmt -> fetch();
	$stmt -> close();

}

static  public function in_pase_lista_modelo($datos, $tabla){
	$stmt=Conexion::conectar()->prepare("SELECT id_prof, num_trabajador, pass_profesor FROM $tabla WHERE num_trabajador = :usuario");
	$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
	$stmt->execute();
	return $stmt->fetch();
	$stmt->close();


}

static public function in_roto_modelo($datos, $tabla){
	$stmt=Conexion::conectar()->prepare("SELECT id_rooto, nom_rooto, pass_rooto, intentos_root, bloqueo FROM $tabla WHERE nom_rooto = :usuario");
	$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
	$stmt->execute();
	return $stmt->fetch();
	$stmt->close();
}

		/*==========================================================================================
	=            EMPIEZAN LAS FUNCIONES DE REGISTRO DE DATOS EN LA BD DEL SISTEMA          =
	==========================================================================================*/

	static public function registro_iems_modelo($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (clave_iems, nom_iems, cp_iems, municipio_iems, localidad_iems, zona_influencia, direccion_iems, tel1_iems, tel2_iems, email_iems, coordinador_iems, ruta_iems, distancia_iems, servicio_educativo, observ_iems)
		 VALUES (:clave,:nombre,:cp,:municipio,:localidad,:zona,:direccion,:tel1,:tel2,:email,:coordinador,:ruta,:distancia,:servicio,:observaciones)") ;


		$stmt -> bindParam(":clave", $datos["clave"], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":cp", $datos["codigo_postal"], PDO::PARAM_STR);
		$stmt -> bindParam(":municipio", $datos["municipio"], PDO::PARAM_STR);
		$stmt -> bindParam(":localidad", $datos["localidad"], PDO::PARAM_STR);
		$stmt -> bindParam(":zona", $datos["zona"], PDO::PARAM_STR);
		$stmt -> bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":tel1", $datos["telefono1"], PDO::PARAM_STR);
		$stmt -> bindParam(":tel2", $datos["telefono2"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["mail"], PDO::PARAM_STR);
		$stmt -> bindParam(":coordinador", $datos["nom_coor"], PDO::PARAM_STR);
		$stmt -> bindParam(":ruta", $datos["ruta"], PDO::PARAM_LOB);
		$stmt -> bindParam(":distancia", $datos["distancia"], PDO::PARAM_STR);
		$stmt -> bindParam(":servicio", $datos["servicio"], PDO::PARAM_STR);
		$stmt -> bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		
		}
	}





	static public function registro_articulo_iems_modelo($datosModelo, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (codigo, nombre_invent, cantidad_invent, fecha_alta, descrip_invent) VALUES (:codigo,:nombre,:cantidad,:fecha,:descripcion)");

		$stmt->bindParam(":codigo", $datosModelo["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModelo["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datosModelo["cantidad"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datosModelo["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModelo["descripcion"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "success";
		}
		else{
			return "error";
		}
$stmt -> close();
	}















	static public function prog_new_ev_dif_modelo($datos, $tabla){
		$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla (fecha_prog, actividad_prog, tipo_prog, turno_iems, realizado, carrera_ev, id_ev_id_iems) VALUES (:fecha,:actividad,:tipo,:turno, :realizado,:carrera, :iems)");

		$stmt->bindParam(":fecha",$datos["fecha"],PDO::PARAM_STR);
		$stmt->bindParam(":actividad",$datos["actividad"],PDO::PARAM_STR);
		$stmt->bindParam(":tipo",$datos["tipo"],PDO::PARAM_STR);
		$stmt->bindParam(":turno",$datos["turno"],PDO::PARAM_STR);
		$stmt->bindParam(":carrera",$datos["area"],PDO::PARAM_STR);
		$stmt->bindParam(":iems",$datos["iems"],PDO::PARAM_STR);
		$stmt->bindParam(":realizado",$datos["realizado"],PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "success";
		}
		else{
			return "error";
		}
	}








	static public function pre_registro_modelo($datos, $tabla){
		$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_pre, apellidos_pre, fecha_pre, observ_pre,ingreso, carrera_pre, iems_difu_id_iems) VALUES (:nombre,:apellidos,:fecha,:observaciones, :estado, :carrera, :iems)");

		$stmt->bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
		$stmt->bindParam(":apellidos",$datos["apellidos"],PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones",$datos["observaciones"],PDO::PARAM_STR);
		$stmt->bindParam(":carrera",$datos["carrera"],PDO::PARAM_STR);
		$stmt->bindParam(":iems", $datos["id_iems"],PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "success";
		}
		else{
			return "error";
	}

}

	static public function registro_articulo_medico_modelo($datos, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo_medica, nombre_medica, activo_medica, grupo_medica, presentacion, cantidad_medica, observaciones_medica, fecha_alta_medica) VALUES (:codigo, :nombre, :activo, :grupo, :presentacion, :cantidad, :observaciones, :fecha)");

		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":activo", $datos["activo"], PDO::PARAM_STR);
		$stmt->bindParam(":grupo", $datos["grupo"], PDO::PARAM_STR);
		$stmt->bindParam(":presentacion", $datos["presentacion"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}
		$stmt -> close();
	}


	static public function registro_articulo_deportes_modelo($datos, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo_inv, nombre_invent, cantidad_invent, fecha_alta, disciplina_inv, descrp_inv) VALUES (:codigo, :nombre, :cantidad, :fecha, :disciplina, :descripcion)");


		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":disciplina", $datos["disciplina"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}
	}


	static public function add_disciplina_deportes_modelo($datos, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_actividad, tipo_actividad) VALUES (:nombre, :tipo)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "success";
		}
		else{
			return "error";
		}
	}


	static public function registro_alumno_deportes_modelo($datos, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (matricula_alumno, nombre_alumno, apellidos_alumno, curp_alumno, cuatri_alumno, foto_alumno, genero_alumno, tipo_sangre, nss_alumno, observ_alumno, disciplina_alum, carrera_alum) VALUES (:matricula, :nombre, :apellidos, :curp, :cuatri, :foto, :genero, :sangre, :nss, :observaciones, :disciplina, :carrera)");

		$stmt->bindParam(":matricula", $datos["matricula"],PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datos["apellidos"],PDO::PARAM_STR);
		$stmt->bindParam(":curp", $datos["curp"],PDO::PARAM_STR);
		$stmt->bindParam(":cuatri", $datos["cuatrimestre"], PDO::PARAM_STR);
		$stmt->bindParam(":genero", $datos["genero"], PDO::PARAM_STR);
		$stmt->bindParam(":sangre",$datos["sangre"], PDO::PARAM_STR);
		$stmt->bindParam(":nss",$datos["nss"],PDO::PARAM_STR);
		$stmt->bindParam(":disciplina", $datos["disciplina"],PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datos["carrera"],PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"],PDO::PARAM_LOB);
		$stmt->bindParam(":observaciones",$datos["observaciones"],PDO::PARAM_STR);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}
	}

	static public function registro_docente_deporte_modelo($datos, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (num_trabajador, nombre_profesor, foto_profesor, perfil_prof, fecha_ingreso, horas_profesor, tel_profesor, observ_profesor, pass_profesor, disciplina_docente) VALUES (:numero_trabajador, :nombre, :foto, :perfil, :fecha_ingreso, :horas, :telefono, :observaciones, :password, :disciplina)");

		$stmt->bindParam(":numero_trabajador", $datos["num_trabajador"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_LOB);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_ingreso", $datos["fecha_ingreso"], PDO::PARAM_STR);
		$stmt->bindParam(":horas", $datos["horas"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones",$datos["observaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":disciplina", $datos["disciplina"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}
	}

  

    static public function agregar_evento_deportes_modelo($datos,$tabla){
    	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipo_actividad, fecha_evento, lugar_evento, num_part_m, num_part_h, num_asis_h, num_asis_m, observ_evento) VALUES (:tipo,:fecha,:lugar,:part_m,:part_h,:asis_h,:asis_m,:observ)");

    	$stmt->bindParam(":tipo",$datos["actividad"],PDO::PARAM_STR);
    	$stmt->bindParam(":fecha",$datos["fecha"],PDO::PARAM_STR);
    	$stmt->bindParam(":lugar",$datos["lugar"],PDO::PARAM_STR);
    	$stmt->bindParam(":part_m", $datos["mujeres_p"],PDO::PARAM_STR);
    	$stmt->bindParam(":part_h",$datos["hombres_p"],PDO::PARAM_STR);
    	$stmt->bindParam(":asis_h",$datos["hombres_a"],PDO::PARAM_STR);
		$stmt->bindParam(":asis_m",$datos["mujeres_a"],PDO::PARAM_STR);
		$stmt->bindParam(":observ",$datos["descripcion"],PDO::PARAM_STR);
		if ($stmt->execute()) {
			return "success";
		}
		else{
			return "error";
		}

    }


    static public function  add_paciente_medico_modelo($datos, $tabla){
    	$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(matricula_paciente, nombre_paciente, apellidos_paciente, factor_rh, genero_paciente, primer_vez, alergias_paciente, padecimientos_paciente, fecha_nacimiento_paciente, tipo_sangre, observaciones_paciente, fecha_add_paciente, carrera_paciente) VALUES (:matricula,:nombre,:apellidos,:rh,:genero,:primer,:alergias,:padecimiento,:fecha_nacimiento,:sangre,:observaciones,:fecha_add,:carrera)");

    	$stmt->bindParam(":matricula",$datos["numero_paciente"],PDO::PARAM_STR);
    	$stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
    	$stmt->bindParam(":apellidos",$datos["apellidos"],PDO::PARAM_STR);
    	$stmt->bindParam(":rh",$datos["rh"],PDO::PARAM_STR);
    	$stmt->bindParam(":genero",$datos["genero"],PDO::PARAM_STR);
    	$stmt->bindParam(":primer",$datos["primer"],PDO::PARAM_STR);
    	$stmt->bindParam(":alergias",$datos["alergias"],PDO::PARAM_STR);
    	$stmt->bindParam(":padecimiento",$datos["padecimiento"],PDO::PARAM_STR);
    	$stmt->bindParam(":fecha_nacimiento",$datos["fecha_nacimiento"],PDO::PARAM_STR);
    	$stmt->bindParam(":sangre",$datos["sangre"],PDO::PARAM_STR);
    	$stmt->bindParam(":fecha_add",$datos["fecha_add"],PDO::PARAM_STR);
    	$stmt->bindParam(":carrera",$datos["carrera"],PDO::PARAM_STR);
    	$stmt->bindParam(":observaciones",$datos["observaciones"],PDO::PARAM_STR);
    	if ($stmt->execute()) {
    		return "success";
    	}
    	else{
    		return "error";
    	}
    }













    static public function prog_evento_medico_medelo($datos, $tabla){
    	$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(tema_evento, fecha_evento, descripcion_evento, tipo_evento, carrera, realizado) VALUES (:tema,:fecha,:descripcion,:tipo,:carrera, :realizado)");

    	$stmt->bindParam(":tema",$datos["tema"],PDO::PARAM_STR);
    	$stmt->bindParam(":fecha",$datos["fecha"],PDO::PARAM_STR);
    	$stmt->bindParam(":tipo",$datos["tipo"],PDO::PARAM_STR);
    	$stmt->bindParam(":carrera",$datos["carrera"],PDO::PARAM_STR);
    	$stmt->bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);
    	$stmt->bindParam(":realizado",$datos["realizado"],PDO::PARAM_STR);
    	if ($stmt->execute()) {
    		return "success";
    	}
    	else{
    		return "error";
    	}
    }



    static public function agregar_usuario_admin_modelo($datos,$tabla){
    	$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla( num_trabajador, nombre_user, tel_user, email_user, pass_user, area_sys_user) VALUES (:numero,:nombre,:telefono,:email,:password,:area)");

    	$stmt->bindParam(":numero",$datos["numero"],PDO::PARAM_STR);
    	$stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
    	$stmt->bindParam(":telefono",$datos["telefono"],PDO::PARAM_STR);
    	$stmt->bindParam(":email",$datos["email"],PDO::PARAM_STR);
    	$stmt->bindParam(":password",$datos["password"],PDO::PARAM_STR);
    	$stmt->bindParam(":area",$datos["area"],PDO::PARAM_STR);
    	if($stmt->execute()){
    		return "success";
    	}
    	else{
    		return "error";
    	}

    }


    static public function new_consulta_medica_medico_modelo($datos, $tabla){
    	$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla (fecha_consulta, presion_arterial, temperatura_consulta, peso_consulta, sintomas, curaciones, diagnostico, medicamento_receta, paraclinico_receta, observ_consulta, paci_med_id_paci) VALUES (:fecha,:presion,:temperatura,:peso,:sintomas,:curaciones, :diagnostico,:medicamento,:paraclinicos,:observaciones,:id)");

    	$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
    	$stmt->bindParam(":presion", $datos["presion"], PDO::PARAM_STR);
    	$stmt->bindParam(":temperatura", $datos["temperatura"], PDO::PARAM_STR);
    	$stmt->bindParam(":peso", $datos["peso"], PDO::PARAM_STR);
    	$stmt->bindParam(":sintomas", $datos["sintomas"], PDO::PARAM_STR);
    	$stmt->bindParam(":curaciones", $datos["curaciones"], PDO::PARAM_STR);
    	$stmt->bindParam(":diagnostico", $datos["diagnostico"], PDO::PARAM_STR);
    	$stmt->bindParam(":medicamento", $datos["medicamentos"], PDO::PARAM_STR);
    	$stmt->bindParam(":paraclinicos", $datos["paraclinicos"], PDO::PARAM_STR);
    	$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
    	$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

    	if ($stmt->execute()) {
    		return "success";
    	}
    	else{
    		return "error";
    	}
    	$stmt->close();
    }

	/*==========================================================================================
	=        		EL BLOQUEO DE LOS INTENTOS A LOS QUE SE PORTAN MAL          =
	==========================================================================================*/

static public function desbloqueo_godinez_modelo($datos, $tabla){
	$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET area_sys_user = :area WHERE id_user = :id");
	$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
	$stmt->bindParam(":area", $datos["area"], PDO::PARAM_STR);
	if ($stmt->execute()) {
		return "success";
	}
	else{
		return "error";
	}
}

static public function bloqueo_intentos_admin($datosB, $tabla){
	$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET intentos_root = :intentos, bloqueo = :bloqueo WHERE nom_rooto = :id");
	$stmt->bindParam(":intentos", $datosB["intentos"], PDO::PARAM_INT);
	$stmt->bindParam(":bloqueo", $datosB["bloqueo"], PDO::PARAM_STR);
	$stmt->bindParam(":id", $datosB["usuario"], PDO::PARAM_STR);

	if ($stmt->execute()) {
		return "success";
	}
	else{
		return "error";
	}



}



static public function bloqueo_intentos($datosIntentos, $tabla){
	$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET area_sys_user = :bloqueo, intentos = :intentos, baneo = :fecha, area_intento = :area  WHERE num_trabajador = :usuario");
	$stmt->bindParam(":bloqueo", $datosIntentos["bloqueo"], PDO::PARAM_STR);
	$stmt->bindParam(":intentos", $datosIntentos["intentos"], PDO::PARAM_INT);
	$stmt->bindParam(":fecha", $datosIntentos["fecha"], PDO::PARAM_STR);
	$stmt->bindParam(":area", $datosIntentos["area"], PDO::PARAM_STR);
	$stmt->bindParam(":usuario", $datosIntentos["usuario"], PDO::PARAM_STR);

	if ($stmt->execute()) {
		return "success";
	}
	else{
		return "error";
	}

	$stmt->close();
}
 static public function control_intentos_admin($datosIntentos, $tabla){
 	$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET intentos_root= :intentos WHERE nom_rooto = :usuario");
 	$stmt->bindParam(":usuario", $datosIntentos["usuario"], PDO::PARAM_STR);
 	$stmt->bindParam("intentos", $datosIntentos["intentos"], PDO::PARAM_INT);

 	if ($stmt->execute()) {
 		return "success";
 	}
 	else{
 		return "no_pos_no";
 	}
 	$stmt->close();

 }





	/*==========================================================================================
	=        		EL BLOQUEO DE LOS INTENTOS A LOS QUE SE PORTAN MAL          =
	==========================================================================================*/		/*==========================================================================================
	=            TERMINAN LAS FUNCIONES DE REGISTRO DE DATOS EN LA BD DEL SISTEMA          =
	==========================================================================================*/
static public function baneo_usuarios($baneado, $fecha, $tabla){
	$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET baneo = :fecha, 	area_sys_user = 'ban' WHERE num_trabajador = :ban");
	$stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
	$stmt->bindParam(":ban", $baneado, PDO::PARAM_STR);
	if ($stmt->execute()) {
		return "ok";
	}
	else{
		return "error";
	}
}

static public function control_intetos($datosIntentos, $tabla){
	$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET intentos = :intentos WHERE num_trabajador = :usuario");
	$stmt->bindParam(":intentos", $datosIntentos["intentos"], PDO::PARAM_INT);
	$stmt->bindParam(":usuario", $datosIntentos["usuario"], PDO::PARAM_STR);
	if ($stmt->execute()) {
		return "ok";
	}
	else{
		return "hay pedos";
	}
}




		/*==========================================================================================
	=           EMPIEZAN LAS FUNCIONES DE ACTUALIZADO DE DATOS         =
	==========================================================================================*/

static public function pase_lista_modelo($datos, $tabla){
	$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET horas_alum = :horas WHERE id_al = :id");
	$stmt->bindParam(":horas", $datos["horas"], PDO::PARAM_STR);
	$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

	if ($stmt->execute()) {
		return "success";
	}
	else{
		return "error";
	}
}




	static public function confirma_seleccion_modelo($dato, $tabla){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla  SET seleccionado = 'si' WHERE id_al = :foraneo");

		$stmt->bindParam(":foraneo", $dato, PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "success";
		}
		else{
			return "error";
		}

	}


	static public function edita_alumno_deportes_modelo($datos, $tabla){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET matricula_alumno=:matricula, cuatri_alumno=:cuatrimestre WHERE id_al = :id");

		$stmt->bindParam(":matricula", $datos["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":cuatrimestre", $datos["cuatrimestre"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "success";
		}
		else{
			return "error";
		}
	}



	static public function actualiza_inventario_deportes_modelo($datos, $tabla){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET cantidad_invent= :cantidad ,fecha_alta= :fecha WHERE id_in = :id");

		$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "success";
		}
		else{
			return "error";
		}
	}

	static public function update_iems_modelo($datos, $tabla){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET nom_iems = :nombre, tel1_iems= :tel1, tel2_iems =:tel2, email_iems =:email, coordinador_iems =:coordinador, observ_iems = :observaciones WHERE id_iems = :id");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":tel1", $datos["tel1"], PDO::PARAM_STR);
		$stmt->bindParam(":tel2", $datos["tel2"], PDO::PARAM_STR);
		$stmt->bindParam(":coordinador", $datos["coordinador"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "success";
		}
		else{
			return "error";
		}

	}


	static public function confirma_ingreso_difusion_controlador($datos, $tabla){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET ingreso= :confirma WHERE id_reg = :id");

		$stmt->bindParam(":confirma", $datos["confirma"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "success";
		}
		else{
			return "error";
		}
	}


	static public function update_matricula_paciente_modelo($datos, $tabla){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET matricula_paciente = :matricula WHERE id_paci = :id");

		$stmt->bindParam(":matricula", $datos["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

		if ($stmt->execute()) {
		 return "success";
		}
		else{
			return "error";
		}
	}


	static public function add_more_articulos_medico_modelo($datos, $tabla){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET cantidad_medica = :cantidad, fecha_alta_medica= :fecha WHERE id_med = :id");

		$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "success";

		}
		else{
			return "error";
		}
	}




	static public function mas_articulos_difusion_modelo($datos,$tabla){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET cantidad_invent = :cantidad, fecha_alta = :fecha WHERE id_invent = :id");

		$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "success";
		}
		else{
			return "error";
		}
	}


	static public function menos_articulos_difusion_modelo($datos, $tabla, $tabla2){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET cantidad_invent = :cantidad where id_invent = :id");
		$stmt2 = Conexion::conectar()->prepare("INSERT INTO $tabla2 (nombre_delete, cantidad_delete, fecha_delete, motivo_delete) VALUES (:nombre, :cantidad_del, :fecha, :motivo)");




		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad",$datos["cantidad_actual"], PDO::PARAM_STR);
		$stmt2->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt2->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt2->bindParam(":cantidad_del", $datos["cantidad_delete"], PDO::PARAM_STR);
		$stmt2->bindParam(":motivo", $datos["motivo"], PDO::PARAM_STR);

		if ($stmt->execute() AND $stmt2->execute()) {
			return "success";
		}
		else{
			return "error";
		}

		
	}



	static public function menos_inventario_deportes_modelo($datos, $tabla, $tabla2){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla2 SET  cantidad_invent = :cantidad_actual WHERE id_in = :id");
		$stmt2=Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_delete, can_del_invent, motivo_del_inv, fecha_delete, discip_del) VALUES (:nombre, :cantidad, :motivo, :fecha, :disciplina)");

		$stmt->bindParam(":cantidad_actual", $datos["cantidad_actual"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

		$stmt2->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt2->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
		$stmt2->bindParam(":motivo", $datos["motivo"], PDO::PARAM_STR);
		$stmt2->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt2->bindParam(":disciplina", $datos["disciplina"], PDO::PARAM_STR);

		if ($stmt->execute() AND $stmt2->execute()) {
			return "success";
		}
		else{
			return "error";
		}


	}


	static public function elimina_medicamentos_modelo($datos, $tabla, $tabla2){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET cantidad_medica= :cantidad_actual WHERE id_med= :id");
		$stmt2=Conexion::conectar()->prepare("INSERT INTO $tabla2 (codigo_del, nom_del, sus_del, presentacion_del, grupo, cantidad_medic, motivo_medica, fecha_baja_medica) VALUES (:codigo, :nombre, :activo, :presentacion, :grupo, :cantidad, :motivo, :fecha)");

		$stmt->bindParam(":cantidad_actual", $datos["canti_up"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

		$stmt2->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt2->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt2->bindParam(":activo", $datos["sustancia"], PDO::PARAM_STR);
		$stmt2->bindParam(":presentacion", $datos["presentacion"], PDO::PARAM_STR);
		$stmt2->bindParam(":grupo", $datos["grupo"], PDO::PARAM_STR);
		$stmt2->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
		$stmt2->bindParam("motivo", $datos["motivo"], PDO::PARAM_STR);
		$stmt2->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);

		if ($stmt->execute() AND $stmt2->execute()) {
			return "success";
		}
		else{
			return "error";
		}
	}


	static public function evento_no_difusion_modelo($datos, $tabla, $tabla2){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET realizado= :realizado WHERE  id_prog = :idd");
		$stmt2=Conexion::conectar()->prepare("INSERT INTO $tabla2( motivo_no_event, ev_prog_iems_id_prog) VALUES (:motivo, :id)");

	

		$stmt2->bindParam(":id", $datos["id"], PDO::PARAM_STR);
		$stmt2->bindParam(":motivo", $datos["motivo"], PDO::PARAM_STR);
		$stmt->bindParam(":idd", $datos["id"], PDO::PARAM_STR);
		$stmt->bindParam(":realizado", $datos["realizado"], PDO::PARAM_STR);

		if ($stmt2->execute() AND $stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}
	}



static public function evento_realizado_difusion_moddelo($datos, $tabla,$tabla1){
	$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET realizado= 'si' WHERE id_prog = :id");
	$stmt2=Conexion::conectar()->prepare("INSERT INTO $tabla1(fecha_realizado, num_hombres, num_mujeres, total_atendidos, acti_realizada, observ_realizado, num_viajes, evid_1, evid_2, evid_3,  ev_prog_iems_id_prog) VALUES (:fecha,:hombres,:mujeres,:total,:actividad,:observaciones,:viajes,:foto,:foto1,:foto2, :ido)");

	$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

    $stmt2->bindParam(":ido", $datos["id"], PDO::PARAM_STR);
	$stmt2->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
	$stmt2->bindParam(":hombres", $datos["hombres"], PDO::PARAM_STR);
	$stmt2->bindParam(":mujeres", $datos["mujeres"], PDO::PARAM_STR);
	$stmt2->bindParam(":total", $datos["total"], PDO::PARAM_STR);
	$stmt2->bindParam(":actividad", $datos["actividad"], PDO::PARAM_STR);
	$stmt2->bindParam(":observaciones",$datos["observaciones"], PDO::PARAM_STR);
	$stmt2->bindParam(":viajes", $datos["viajes"], PDO::PARAM_STR);
	$stmt2->bindParam(":foto", $datos["foto"], PDO::PARAM_LOB);
	$stmt2->bindParam(":foto1", $datos["foto1"], PDO::PARAM_LOB);
	$stmt2->bindParam(":foto2", $datos["foto2"],PDO::PARAM_LOB);


	if ( $stmt2->execute() AND $stmt->execute()) {
		return "success";
	}
	else{
		"error";
	}



}




static public function evento_norealizado_medico_modelo($datos, $tabla, $tabla1){
	$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET realizado ='no' WHERE id_evp = :id");
	$stmt2=Conexion::conectar()->prepare("INSERT INTO $tabla1 (motivo_evento, ev_prog_med_id_evp) VALUES (:motivo,:ido)");

	$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

	$stmt2->bindParam(":ido", $datos["id"], PDO::PARAM_STR);
	$stmt2->bindParam(":motivo", $datos["motivo"], PDO::PARAM_STR);

	if($stmt->execute() AND $stmt2->execute()){
		return "success";

	}
	else{
		return "error";
	}
}


static public function evento_realizado_medico_modelo($datos, $tabla, $tabla1){
	$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET realizado ='si' WHERE id_evp = :id");
	$stmt2=Conexion::conectar()->prepare("INSERT INTO $tabla1 (fecha_r_evento, descripcion_r_evento, tipo_r_evento, num_mujeres, num_hombres, total_ate, ev_prog_med_id_evp) VALUES (:fecha,:descripcion,:tipo,:mujeres,:hombres,:total,:ido)");

	$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

	$stmt2->bindParam(":ido", $datos["id"],PDO::PARAM_STR);
	$stmt2->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
	$stmt2->bindParam(":descripcion",$datos["observaciones"], PDO::PARAM_STR);
	$stmt2->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
	$stmt2->bindParam(":mujeres", $datos["mujeres"], PDO::PARAM_STR);
	$stmt2->bindParam(":hombres", $datos["hombres"],PDO::PARAM_STR);
	$stmt2->bindParam("total",$datos["total"],PDO::PARAM_STR);

	if ($stmt->execute() AND $stmt2->execute()) {
		return "success";
	}
	else{
		return "error";
	}
}




static public function update_godinez_modelo($datos, $tabla){
	$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET num_trabajador=:matricula, nombre_user=:nombre, tel_user=:telefono ,email_user= :email, 
		pass_user=:pass  WHERE id_user = :id");

	$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);
	$stmt->bindParam(":matricula", $datos["matricula"], PDO::PARAM_STR);
	$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
	$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
	$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
	$stmt->bindParam(":pass", $datos["pass"], PDO::PARAM_STR);

	if ($stmt->execute()) {
		return "success";
	}
	else{
		return "error";
	}

}


static public function delete_godinez_modelo($tabla, $id){
	$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_user = :id");

	$stmt->bindParam(":id", $id, PDO::PARAM_STR);

	if ($stmt->execute()) {
		return "success";
	}
	else{
		return "error";
	}
}


static public function reporte_alumno_modelo($tabla, $query){

   	$stmt=Conexion::conectar()->prepare("SELECT id_al, matricula_alumno, nombre_alumno, apellidos_alumno, curp_alumno, cuatri_alumno, foto_alumno, genero_alumno, tipo_sangre, nss_alumno, seleccionado, observ_alumno, disciplina_alum, carrera_alum FROM $tabla WHERE matricula_alumno LIKE :query OR nombre_alumno LIKE :query OR curp_alumno LIKE :query OR nss_alumno LIKE :query ");

    	$stmt->bindParam(":query", $query, PDO::PARAM_STR);
    	$stmt->execute();
    	return $stmt->fetchAll();
}



			/*==========================================================================================
	=           TERMINAN LAS FUNCIONES DE ACTUALIZADO DE DATOS         =
	==========================================================================================*/







		/*==========================================================================================
	=            EMPIEZAN LAS FUNCIONES DE CONSULTA DE DATOS EN LA BD DEL SISTEMA          =
	==========================================================================================*/

	static public function query_ban($donde, $tabla){
		$stmt=Conexion::conectar()->prepare("SELECT id_user, num_trabajador, nombre_user, tel_user, email_user, pass_user, area_sys_user, baneo FROM user_sys WHERE area_sys_user = :area");

		$stmt->bindParam(":area", $donde, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll();

	}

	static public function usuarios_deportes_modelo($user, $tabla){
		$stmt=Conexion::conectar()->prepare("SELECT id_user, num_trabajador, nombre_user, tel_user, email_user, pass_user, area_sys_user FROM user_sys WHERE area_sys_user = :area");

		$stmt->bindParam(":area", $user, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll();

	}



	static public function usuarios_medico_modelo($user, $tabla){
		$stmt=Conexion::conectar()->prepare("SELECT id_user, num_trabajador, nombre_user, tel_user, email_user, pass_user, area_sys_user FROM user_sys WHERE area_sys_user = :area");

		$stmt->bindParam(":area", $user, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll();

	}

	static public function usuarios_difusion_modelo($user, $tabla){
		$stmt=Conexion::conectar()->prepare("SELECT id_user, num_trabajador, nombre_user, tel_user, email_user, pass_user, area_sys_user FROM user_sys WHERE area_sys_user = :area");

		$stmt->bindParam(":area", $user, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll();

	}	


	static public function query_eventos_difusion_modelo($tabla1,$tabla2){
		
		$stmt=Conexion::conectar()->prepare("SELECT id_prog, fecha_prog, actividad_prog, tipo_prog, turno_iems, carrera_ev, nom_iems, zona_influencia FROM $tabla1 INNER JOIN $tabla2 ON (id_ev_id_iems = id_iems) WHERE realizado = 'pendiente' ORDER BY fecha_prog ASC  ");

		

		$stmt->execute();
		return $stmt->fetchAll();


	}

static public function query_eventos_medico_modelo($tabla){
	$stmt=Conexion::conectar()->prepare("SELECT id_evp, tema_evento, fecha_evento, descripcion_evento, tipo_evento, carrera FROM $tabla WHERE realizado LIKE 'pendiente' ORDER BY fecha_evento ASC");
	$stmt->execute();
	return $stmt->fetchAll();
}



    static public function consulta_alumno_deportes_modelo(){
		if (isset($_POST["consulta"])) {
			$consulta = $_POST["consulta"];
			$tabla ="alu_depor";

	    	$stmt=Conexion::conectar()->prepare("SELECT id_al, matricula_alumno, nombre_alumno, apellidos_alumno, curp_alumno, cuatri_alumno, foto_alumno, genero_alumno, tipo_sangre, nss_alumno, seleccionado, observ_alumno, disciplina_alum, carrera_alum, horas_alum FROM $tabla WHERE matricula_alumno LIKE :query OR nombre_alumno LIKE :query OR curp_alumno LIKE :query OR nss_alumno LIKE :query OR disciplina_alum LIKE :query OR tipo_sangre LIKE :query");

    	$stmt->bindParam(":query", $consulta, PDO::PARAM_STR);
    $stmt->execute();
    	
	foreach ($stmt as $row => $item) {
	echo'
<div class="card mt-3 mb-3 animated bounceInUp">
<div class="card-header btn-green text-white">
      <strong>'.$item["nombre_alumno"].' '.$item["apellidos_alumno"].' -- CURP: '.$item["curp_alumno"].'</strong>
 </div>
          <!-- EMPIEZA TARJETA QUE MUESTRA LOS DATOS DEL ALUMNO -->
  <div class="card-body border">
        <!-- COULUMBS -->
    <div class="form-row"> 
         <div class="col-sm-12 col-md-6 col-lg-3 mb-1 ">       
          <img  src="data:image/jpg;base64,'.base64_encode($item["foto_alumno"]).'" class="img-fluid" style="width:100%;max-width:150px" data-toggle="modal" data-target="#image'.$item["id_al"].'">
         </div>
         <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">  
         <label for=""><h6><strong>Tipo de sangre: </strong>'.$item["tipo_sangre"].'</h6></label>      
         </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">
          <label for=""><h6><strong>NSS: </strong>'.$item["nss_alumno"].'</h6></label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">
           <label for=""><h6><strong>Carrera: </strong>'.$item["carrera_alum"].'</h6></label>
        </div>
         <div class="col-md-12 col-lg-1 mb-1 border">
           <label for=""><strong>Genero: </strong>'.$item["genero_alumno"].'</label>
        </div>
        <div class="col-md-12 col-lg-2 mb-1 border">
           <label for=""><strong>Conteo de horas: </strong>'.$item["horas_alum"].'</label>
        </div>
        <div class="col-md-12 col-lg-4 mb-1 border">
           <label for=""><strong>Disciplina: </strong>'.$item["disciplina_alum"].'</label>
        </div>
        <div class="col-md-12 col-lg-2 mb-1 border">
           <label for=""><strong>Cuatrimestre: </strong>'.$item["cuatri_alumno"].'</label>
        </div>
        <div class="col-md-12 col-lg-3 mb-1 border">
           <label for=""><strong>Matricula: </strong>'.$item["matricula_alumno"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-8 mb-1 border">
           <label for=""><strong>Observaciones: </strong>'.$item["observ_alumno"].'</label>
        </div> 
        <div class="col-md-12 col-lg-2 mb-1 ">
          <button class="btn  btn-deep-orange btn-block btn-sm" data-toggle="modal" data-target="#update'.$item["id_al"].'"><strong>Editar</strong></button>
        </div>
        <div class="col-md-12 col-lg-2 mb-1 ">
          <button class="btn btn-success btn-block btn-sm"  data-toggle="modal" data-target="#seleccion'.$item["id_al"].'"><strong>Seleccionar</strong></button>
        </div>           
    </div>
  </div>
</div>




<div class="modal fade" id="image'.$item["id_al"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content align-items-center modal-fluid">
      <div class="modal-body">
<img src="data:image/jpg;base64,'.base64_encode($item["foto_alumno"]).'" class="img-fluid"> 
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="seleccion'.$item["id_al"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
   
  <div class="modal-dialog modal-lg modal-dialog-centered modal-notify modal-info role="document" >
    <div class="modal-content">
    <div class="modal-header">
        <p class="heading lead"><H3 class="text-white">CONFIRMAR SELECCIÓN</H3></p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
     </div>
      <div class="modal-body">
<form class="text-center border border-light p-5 mt-2" method="post">
    <p class="h5 mb-3 btn-block ">¿ESTA SEGURO QUE DESEA AGREGAR A <strong>'.$item["nombre_alumno"].' '.$item["apellidos_alumno"].'</strong> AL SELECCIONADO DE LA DISCIPLINA DE <strong>'.$item["disciplina_alum"].'</strong>? </p>
    <input type="hidden" name="id_foraneo" value="'.$item["id_al"].'">
      <div class="form-row mb-2"> 
        <div class="col-md-6 col-lg-4 mb-2 mt-3 ">
            <button type="submit" class="btn btn-primary btn-block " name="confirma_seleccion">Confirmar</button>
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



<div class="modal fade" id="update'.$item["id_al"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-notify modal-info role="document" >
    <div class="modal-content">
    <div class="modal-header">
        <p class="heading lead"><H3 class="text-white">CONFIRMAR ACTUALIZACIÓN DE MATRÍCULA</H3></p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
     </div>
      <div class="modal-body">
<form class="text-center border border-light p-5 mt-2" method="post">
    <p class="h4 mb-3 btn-block ">Actualizar Matricula De: </p>
        <div class="form-row mb-2"> 
        <div class="col-sm-12 col-md-6 col-lg-4 mb-2 border ">
            <label for=""><strong>'.$item["nombre_alumno"].' '.$item["apellidos_alumno"].'</strong></label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-2 border ">
            <label for=""><strong>Carrera: '.$item["carrera_alum"].' </strong></label>
            <input type="hidden" name="id_fora_edit" value="'.$item["id_al"].'">
        </div> 
        <div class="col-sm-12 col-md-6 col-lg-4 mb-2 border ">
            <label for=""><strong>Tipo de Sangre: '.$item["tipo_sangre"].'</strong></label>
        </div> 
        <div class="col-12 mt-2">
            <label for=""><strong>Introduzca nuevo cutrimestre y matricula</strong></label>
        </div>                  
        <div class="col-lg-6 col-md-12 mb-2 ">
            <input type="text" minlength="8" pattern="^[0-9]+"  name="new_matricula" value="'.$item["matricula_alumno"].'" class="form-control" placeholder="Matricula nueva" required>
        </div>
        <div class="col-lg-6 col-md-12 mb-2 ">
            <input type="number" min="1" max="5" name="new_cuatrimestre" value="'.$item["cuatri_alumno"].'" class="form-control" placeholder="Cuatrimestre nuevo" required>
        </div>                    
    </div>
      <div class="form-row mb-2"> 
        <div class="col-md-6 col-lg-6 mb-2">
     <button type="submit" class="btn btn-primary btn-block" name="edit_alumno_deportes">Guardar</button>           
        </div>
        <div class="col-md-6 col-lg-4 mb-2">
 	<button type="button" class="btn btn-secondary btn-block " data-dismiss="modal">Cancelar</button>
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

static public function consulta_docente_deportes(){
	if (isset($_POST["trabajador"])) {
		$consulta = $_POST["trabajador"];
		$tabla="prof_dep";

	$stmt=Conexion::conectar()->prepare("SELECT  num_trabajador, nombre_profesor, foto_profesor, perfil_prof, fecha_ingreso, horas_profesor, tel_profesor, observ_profesor, disciplina_docente FROM $tabla WHERE num_trabajador LIKE :query OR nombre_profesor LIKE :query");
	$stmt->bindParam(":query", $consulta, PDO::PARAM_STR);
	$stmt->execute();
	foreach ($stmt as $row => $item) {
	echo'
<div class="card mt-3 mb-3 animated zoomInDown">
  <div class="card-header btn-green text-white">
      <strong>'.$item["nombre_profesor"].'</strong>
    </div>
  <div class="card-body border">
    <div class="form-row"> 
         <div class="col-sm-12 col-md-6 col-lg-3 mb-1 ">       

          <img  src="data:image/jpg;base64,'.base64_encode($item["foto_profesor"]).'" class="img-fluid" style="width:100%;max-width:150px">

         </div>
         <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">  
         <label for=""><h6><strong>#Empleado: </strong>'.$item["num_trabajador"].'</h6></label>      
         </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">
          <label for=""><h6><strong>Disciplina: </strong>'.$item["disciplina_docente"].'</h6></label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">
           <label for=""><h6><strong>Perfil: </strong>'.$item["perfil_prof"].' </h6></label>
        </div>

         <div class="col-md-12 col-lg-4 mb-1 border">
           <label for=""><strong>Horas semanales: </strong>'.$item["horas_profesor"].'</label>
        </div>
        <div class="col-md-12 col-lg-4 mb-1 border">
           <label for=""><strong>#Telefono: </strong>'.$item["tel_profesor"].'</label>
        </div>
        <div class="col-md-12 col-lg-4 mb-1 border">
           <label for=""><strong>Fecha de ingreso: </strong>'.$item["fecha_ingreso"].'</label>
        </div>
        <div class="col-12 mb-1 border">
           <label for=""><strong>Observaciones: </strong>'.$item["observ_profesor"].'</label>
        </div>         
    </div>
  </div>
</div>

';
		
		}

	}
}

static public function horas_cumplidas_alumno(){
	if(isset($_POST["horas_cumplidas"])){
		$consulta = $_POST["horas_cumplidas"];
		$tabla="alu_depor";
		$horas="79";

	$stmt=Conexion::conectar()->prepare("SELECT id_al, matricula_alumno, nombre_alumno, apellidos_alumno, curp_alumno, cuatri_alumno, foto_alumno, genero_alumno, tipo_sangre, nss_alumno, seleccionado, observ_alumno, disciplina_alum, carrera_alum, horas_alum FROM $tabla WHERE( matricula_alumno LIKE :query  OR curp_alumno LIKE :query OR disciplina_alum LIKE :query OR tipo_sangre LIKE :query OR nss_alumno LIKE :query OR nombre_alumno LIKE :query) AND  horas_alum > :horas");
	$stmt->bindParam(":query", $consulta, PDO::PARAM_STR);
	$stmt->bindParam(":horas", $horas, PDO::PARAM_INT);
	$stmt->execute();

	foreach ($stmt as $row => $item) {
	echo'
<div class="card mt-3 mb-3">
  <div class="card-header btn-green text-white">
      <strong>'.$item["nombre_alumno"].' '.$item["apellidos_alumno"].' DE '.$item["cuatri_alumno"].'° CUATRIMESTRE </strong> - CUMPLIO SUS HORAS EN LA DISCIPLINA DE '.$item["disciplina_alum"].' Y AHORA ES LIBRE
  </div>
  <div class="card-body border">
    <div class="form-row"> 
         <div class="col-sm-12 col-md-4 col-lg-3 mb-1 ">       
          <img  src="data:image/jpg;base64,'.base64_encode($item["foto_alumno"]).'" class="img-fluid" style="width:100%;max-width:220px" data-toggle="modal" data-target="#cump'.$item["id_al"].'">
         </div>
        <div class="col-sm-12 col-md-5 mb-3 ">
          <label for=""><h5><strong>CURP: </strong>'.$item["curp_alumno"].'</h5></label>
        </div>
        <div class="col-md-3 col-lg-2 mb-1">
           <label for=""><h5><strong>TOTAL HORAS: </strong>'.$item["horas_alum"].'</h5></label>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 mb-3 ">
           <label for=""><h5><strong>CARRERA: </strong>'.$item["carrera_alum"].'</h5></label>
        </div>
        <div class="col-12 text-center">
           <label for=""><h5><strong>NOMBRE Y FIRMA DE QUIEN IMPRIME </strong></h5></label>
        </div>         
    </div>
  </div>
</div>



<div class="modal fade" id="cump'.$item["id_al"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content align-items-center">
      <div class="modal-body">
<img src="data:image/jpg;base64,'.base64_encode($item["foto_alumno"]).'"  class="img-fluid"> 
      </div>
    </div>
  </div>
</div>
';
  }
 }
}


static public function permiso_alumno_seleccionado(){
	if (isset($_POST["query_permiso"])) {
		$consulta = $_POST["query_permiso"];
		$tabla="alu_depor";
		$stmt=Conexion::conectar()->prepare("SELECT id_al, matricula_alumno, nombre_alumno, apellidos_alumno, curp_alumno, cuatri_alumno, foto_alumno, genero_alumno, tipo_sangre, nss_alumno, seleccionado, observ_alumno, disciplina_alum, carrera_alum FROM $tabla WHERE (nombre_alumno LIKE :query OR matricula_alumno LIKE :query OR disciplina_alum LIKE :query OR curp_alumno LIKE :query OR tipo_sangre LIKE :query) AND seleccionado LIKE 'SI' ");
		$stmt->bindParam(":query", $consulta, PDO::PARAM_STR);
		$stmt->execute();
foreach ($stmt as $row => $item) {
	echo'
<div class="card mt-3 mb-3">
  <div class="card-header btn-green text-white">
      <strong>PERMISOS PARA SELECCIONADOS</strong>
    </div>
  <div class="card-body border">
    <div class="form-row"> 
         <div class="col-sm-12 col-md-3 col-lg-3 mb-3 ">       
          <img  src="data:image/jpg;base64,'.base64_encode($item["foto_alumno"]).'" class="img-fluid" style="width:100%;max-width:250px" data-toggle="modal" data-target="#imsel'.$item["id_al"].'">
         </div>
         <div class="col-lg-9 col-md-9 mb-3 border text-justify">  
         <label for=""><h7>POR MEDIO DE LA PRESENTE YO,  ________________________________________________________  TITULAR DE LA DISCIPLINA DE <strong>'.$item["disciplina_alum"].'</strong> SOLICITO SU CONSENTIMIENTO PARA TRASLADAR A SU HIJO(A) <strong>'.$item["nombre_alumno"].' '.$item["apellidos_alumno"].' </strong> DE LA CARRERA <strong>'.$item["carrera_alum"].' </strong> DESDE NUESTRO PLANTEL EDUCATIVO HACIA  ____________________________________DONDE SE LLEVARA A CABO EL EVENTO DE COMPETENCIAS CULTURALES Y/O DEPORTIVAS PARA LA QUE SU HIJO(A) FUE SELECCIONADO. 
          EL EVENTO SE LLEVARA A CABO DE _____________________________A _________________________.</h7></label>      
         </div>
        <div class="col-sm-12 col-md-4 col-lg-4 mb-3  ">
          <label for=""><h6><strong>CURP: </strong>'.$item["curp_alumno"].'</h6></label>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 mb-3 ">
           <label for=""><h6><strong>NSS: </strong>'.$item["nss_alumno"].'</h6></label>
        </div>
        <div class="col-md-4 col-lg-4 mb-3 ">
           <label for=""><h6><strong>Tipo de sangre: </strong>'.$item["tipo_sangre"].'</h6></label>
        </div>
        <div class="col-md-12 mt-3  text-center">
           <label for=""><h5><strong>Nombre y firma del tutor:</strong></h5></label>
        </div>         
    </div>
  </div>
</div>



<div class="modal fade" id="imsel'.$item["id_al"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content align-items-center">
      <div class="modal-body">
<img src="data:image/jpg;base64,'.base64_encode($item["foto_alumno"]).'" class="img-fluid"> 
      </div>
    </div>
  </div>
</div>

';
		

		}
	}
}


static public function inventario_deportes_existencia(){
	if (isset($_POST["disciplina_inv"])) {
		$consulta = $_POST["disciplina_inv"];
		$tabla ="inv_deport";

		$stmt=Conexion::conectar()->prepare("SELECT id_in, codigo_inv, nombre_invent, cantidad_invent, fecha_alta, disciplina_inv, descrp_inv FROM $tabla WHERE disciplina_inv LIKE :query");

		$stmt->bindParam(":query", $consulta, PDO::PARAM_STR);
		$stmt->execute();
foreach ($stmt as $row => $item) {
	echo'
<div class="card mt-4 mb-3 bordered">
  <div class="card-header text-white bg-info bordered">
      <strong>CANTIDAD: '.$item["cantidad_invent"].' || '.$item["nombre_invent"].' </strong>
    </div>
  <div class="card-body">
    <div class="form-row"> 
        <div class="col-sm-12 col-md-4 col-lg-4 mb-1 border">       
        <label for=""><strong>Fecha de actualización:</strong> '.$item["fecha_alta"].'</label> 
        </div>
        <div class="col-sm-12 col-md-8 col-lg-8 mb-1 border">
           <label for=""><strong>Decripción: </strong>'.$item["descrp_inv"].' </label>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-2 mb-1">
           <button class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#add_deportes_'.$item["id_in"].'"><i class="fas fa-plus"></i><strong> Agregar</strong></button>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-2">
           <button class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#el'.$item["id_in"].'"><i class="fas fa-eraser"></i><strong> Borrar</strong></button>
        </div>
    </div>
  </div>
</div>



<div class="modal fade" id="add_deportes_'.$item["id_in"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-notify modal-info role="document" >
    <div class="modal-content">
    <div class="modal-header">
        <p class="heading lead"><H3 class="text-white">AGREGAR MÁS ARTICULOS</H3></p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
     </div>
      <div class="modal-body">
<form class="text-center border border-light p-5 " method="post">
    
        <div class="form-row mb-2"> 
        <div class="col-sm-12 col-md-6 col-lg-6 mb-2 ">
            <input type="date" name="fecha_add"   class="form-control validate" required>
            <input type="hidden" name="cantidad_actual" value="'.$item["cantidad_invent"].'"   class="form-control">
            <input type="hidden" name="id_foraneo" value="'.$item["id_in"].'"   class="form-control">
        </div>   
        <div class="col-sm-12 col-md-6 col-lg-6 mb-2">
            <input type="number" min="1" name="cantidad_add"   class="form-control validate" placeholder="Cantidad" required>
        </div>        
    </div>
      <div class="form-row mb-2"> 
        <div class="col-md-6 col-lg-4 mb-2 ">
            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Cancelar</button>
        </div>
        <div class="col-md-6 col-lg-4 mb-2 ">
          <button type="submit" class="btn btn-primary btn-block" name="add_more_articles">Guardar</button>
        </div>
    </div> 
</form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="el'.$item["id_in"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-notify modal-danger role="document" >
    <div class="modal-content">
    <div class="modal-header">
        <p class="heading lead"><H3 class="text-white">BORRAR ARTICULOS</H3></p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
     </div>
      <div class="modal-body">
<form class="text-center border border-light p-5" method="post">

        <div class="form-row mb-2"> 
            <input type="hidden" name="nombre" value="'.$item["nombre_invent"].'" class="form-control">
            <input type="hidden" name="disciplina" value="'.$item["disciplina_inv"].'" class="form-control">
            <input type="hidden" name="cantidad_actual" value="'.$item["cantidad_invent"].'"   class="form-control">
            <input type="hidden" name="id_" value="'.$item["id_in"].'"   class="form-control">
         
        <div class="col-sm-12 col-md-6 col-lg-4
        5 mb-2 ">
            <input type="number" min="1" name="cantidad" class="form-control validate" placeholder="Cantidad" required>
        </div>        
        <div class="col-md-12 col-lg-7 mb-2 ">
            <input type="text" name="motivo_del" class="form-control validate" placeholder="Motivo" required>
        </div>
    </div>
      <div class="form-row mb-2"> 
        <div class="col-md-6 col-lg-4 mb-2 ">
            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Cancelar</button>
        </div>
        <div class="col-md-6 col-lg-4 mb-2 ">
          <button type="submit" name="del_deport" class="btn btn-primary btn-block">Guardar</button>
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

static function inventario_deportes_borrado(){
	if (isset($_POST["del_disciplina_inv"])) {
		$consulta =$_POST["del_disciplina_inv"];
		$tabla2="del_inv_dep";

		$stmt=Conexion::conectar()->prepare("SELECT  nombre_delete, can_del_invent, motivo_del_inv, fecha_delete, discip_del  FROM $tabla2  WHERE discip_del LIKE :query ORDER BY fecha_delete DESC");

		$stmt->bindParam(":query", $consulta, PDO::PARAM_STR);
		$stmt->execute();
		foreach ($stmt as $row => $item) {
			echo '
	
<div class="card mt-1 mb-2 bordered">
  <div class="card-header text-white bg-secondary">
      <strong>CANTIDAD: '.$item["can_del_invent"].' || '.$item["nombre_delete"].' </strong>
    </div>
  <div class="card-body">
    <div class="form-row"> 
        <div class="col-md-6 col-lg-4 border">       
        <label for=""><strong>Fecha:</strong> '.$item["fecha_delete"].'</label> 
        </div>

        <div class="col-md-6 col-lg-8 border">
           <label for=""><strong>Motivo: </strong>'.$item["motivo_del_inv"].' </label>
        </div>
    </div>
  </div>
</div>
			';
		}



	}
}

static public function query_iems_add(){
	if (isset($_POST["iems_query"])) {
		$consulta=$_POST["iems_query"];
		$tabla="iems_difu";

		$stmt=Conexion::conectar()->prepare("SELECT id_iems, clave_iems, nom_iems, cp_iems, municipio_iems, localidad_iems, zona_influencia, direccion_iems, tel1_iems, tel2_iems, email_iems, coordinador_iems, ruta_iems, distancia_iems, servicio_educativo, observ_iems FROM $tabla WHERE nom_iems LIKE :query OR clave_iems LIKE :query OR municipio_iems LIKE :query OR email_iems LIKE :query OR localidad_iems LIKE :query");
		$stmt->bindParam(":query", $consulta, PDO::PARAM_STR);
		$stmt->execute();
		foreach ($stmt as $row => $item) {
			echo '
<div class="card mt-3 mb-3">
  <div class="card-header btn-green text-white">
      <strong>'.$item["nom_iems"].'  </strong>
    </div>
  <div class="card-body border">
    <div class="form-row"> 
         <div class="col-sm-12 col-md-6 col-lg-3 mb-1 ">       
          <img id="myImg" src="data:image/jpg;base64,'.base64_encode($item["ruta_iems"]).'" class="img-fluid" alt="RUTA" style="width:100%;max-width:200px" data-toggle="modal" data-target="#pic'.$item["id_iems"].'">
            <div id="myModal" class="modals">
            <span class="close">&times;</span>
              <img class="modals-content" id="img01">
              <div id="caption"></div>
            </div>
         </div>
         <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">  
         <label for=""><h5><strong>Clave: </strong>'.$item["clave_iems"].'</h5></label>      
         </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">
          <label for=""><h5><strong>#1 Teléfono: </strong>'.$item["tel1_iems"].'</h5></label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">
           <label for=""><h5><strong>#2 Teléfono: </strong>'.$item["tel2_iems"].'</h5></label>
        </div>
         <div class="col-md-12 col-lg-5 mb-1 border">
           <label for=""><strong>Email: </strong>'.$item["email_iems"].'</label>
        </div>
        <div class="col-md-12 col-lg-7 mb-1 border">
           <label for=""><strong>Nombre del coordinador: </strong>'.$item["coordinador_iems"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">
           <label for=""><strong>Zona de influencia: </strong>'.$item["zona_influencia"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">
           <label for=""><strong>Municipio: </strong>'.$item["municipio_iems"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">
           <label for=""><strong>Localidad: </strong>'.$item["localidad_iems"].'</label>
        </div>     
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">
           <label for=""><strong>Servicio educativo: </strong>'.$item["servicio_educativo"].'</label>
        </div>   
        <div class="col-sm-12 col-md-6 col-lg-8 mb-1 border">
           <label for=""><strong>Dirección: </strong>'.$item["direccion_iems"].'</label>
        </div>          
        <div class="col-lg-9 col-md-12 mb-1 border">
           <label for=""><strong>Observaciones: </strong>'.$item["observ_iems"].'</label>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 border mb-1">
            <button class="btn btn-dark-green btn-sm btn-block" data-toggle="modal" data-target="#udp_iems'.$item["id_iems"].'"><strong>Editar IEMS</strong></button>
        </div>          
    </div>
  </div>
</div>




<div class="modal fade" id="pic'.$item["id_iems"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="alert">
    <div class="modal-content align-items-center">
      <div class="modal-body">
<img src="data:image/jpg;base64,'.base64_encode($item["ruta_iems"]).'" class="img-fluid"> 
      </div>
    </div>
  </div>
</div>





<div class="modal fade" id="udp_iems'.$item["id_iems"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered modal-notify modal-info role="document" >
    <div class="modal-content">
    <div class="modal-header">
        <p class="heading lead"><H3 class="text-white">EDICIÓN DE IEMS</H3></p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
     </div>
      <div class="modal-body">
<form class="text-center border border-light p-5" method="post">
    <div class="form-row mb-2">
        <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
            <input type="text" name="udp_nombre" value="'.$item["nom_iems"].'" class="form-control" placeholder="Nombre de IEMS" required>
            <input type="hidden" name="id_iem" value="'.$item["id_iems"].'" class="form-control" placeholder="Nombre de IEMS" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
          <input type="text"name="udp_tel1" pattern="\d{3}[\-]\d{3}[\-]\d{4}" class="form-control" value="'.$item["tel1_iems"].'" placeholder="#1Tel(249-112-1212)" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
          <input type="text"name="udp_tel2" pattern="\d{3}[\-]\d{3}[\-]\d{4}" class="form-control" value="'.$item["tel2_iems"].'" placeholder="#2Tel(249-112-1212)" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
          <input type="text"name="udp_coordinador" class="form-control" value="'.$item["coordinador_iems"].'" placeholder="Nombre completo del coordinador" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
          <input type="email"name="udp_email" class="form-control" value="'.$item["email_iems"].'" placeholder="Correo: email@email.com" required>
        </div>
    </div>
    <div class="form-row mb-2">
      <div class="col-12 mt-3">
        <input type="text" name="udp_observaciones" class="form-control" value="'.$item["observ_iems"].'" placeholder="Observaciones">
      </div>
    </div>
<div class="form-row mb-2"> 
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-info my-4 btn-block" type="submit" name="update_iems"><strong>Agregar </strong></button>
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



			';
		}
	}
}





static public function query_eventos_deportes(){
	if (isset($_POST["fecha1"]) AND isset($_POST["fecha2"])) {
		$query_1 = $_POST["fecha1"];
		$query_2 = $_POST["fecha2"];
		$tabla="ev_deport";
		$stmt= Conexion::conectar()->prepare("SELECT id_ev, tipo_actividad, fecha_evento, lugar_evento, num_part_m, num_part_h, num_asis_h, num_asis_m, observ_evento FROM $tabla WHERE  fecha_evento BETWEEN :query_1 AND :query_2 ORDER BY fecha_evento DESC");
		$stmt->bindParam(":query_1", $query_1, PDO::PARAM_STR);
		$stmt->bindParam(":query_2", $query_2, PDO::PARAM_STR);
		$stmt->execute();
		foreach ($stmt as $row => $item) {
			echo '
<div class="card mt-3 mb-3">
  <div class="card-header  btn-brown text-white">
      <strong> EVENTO # '.$item["id_ev"].'  |  LUGAR: '.$item["lugar_evento"].' | '.$item["fecha_evento"].'</strong>
    </div>
  <div class="card-body">
    <div class="form-row"> 
         <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">       
        <label for=""><strong>Tipo: </strong> '.$item["tipo_actividad"].'</label> 
         </div>
         <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">       
        <label for=""><strong># Mujeres asistentes: </strong> '.$item["num_asis_m"].'</label> 
         </div>
          <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">       
        <label for=""><strong># Hombres asistentes: </strong> '.$item["num_asis_h"].'</label> 
         </div>
         <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">       
        <label for=""><strong># Mujeres participantes: </strong>'.$item["num_part_m"].'</label> 
         </div>
          <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">       
        <label for=""><strong># Hombres participantes: </strong> '.$item["num_part_h"].'</label> 
         </div>
        <div class="col-md-12 col-lg-9 mb-1 border">
           <label for=""><strong>Descripción: </strong>'.$item["observ_evento"].'</label>
        </div>
    </div>
    <!-- COULUMBS -->
  </div>
</div>
			';
		}
	}
}

static public function query_ingresados_pre(){
	if (isset($_POST["fecha1_pres"]) AND isset($_POST["fecha2_pres"])) {
		$fecha1=$_POST["fecha1_pres"];
		$fecha2=$_POST["fecha2_pres"];

		$stmt=Conexion::conectar()->prepare("SELECT nombre_pre, fecha_pre, apellidos_pre, carrera_pre, nom_iems, clave_iems, tel1_iems, tel2_iems, email_iems, coordinador_iems FROM pre_r INNER JOIN iems_difu ON (id_iems = iems_difu_id_iems) WHERE fecha_pre BETWEEN :query1 AND :query2 AND  ingreso = 'si' ORDER BY fecha_pre DESC");

		$stmt->bindParam(":query1", $fecha1, PDO::PARAM_STR);
		$stmt->bindParam(":query2", $fecha2, PDO::PARAM_STR);
		$stmt->execute();

		foreach ($stmt as $row => $item) {
			echo '
<div class="card mt-4 mb-3 bordered">
  <div class="card-header text-white btn-green">
      <strong>'.$item["nombre_pre"].' '.$item["apellidos_pre"].' -- '.$item["nom_iems"].'</strong>
    </div>
  <div class="card-body">
    <form action="">
    <div class="form-row"> 
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">       
        <label for=""><strong>Fecha de pre-registro:</strong> '.$item["fecha_pre"].'</label> 
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">
          <label for=""><strong>Carrera de interes:</strong>'.$item["carrera_pre"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">
          <label for=""><strong>Clave IEMS:</strong>'.$item["clave_iems"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">
          <label for=""><strong>Email IEMS:</strong>'.$item["email_iems"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">
          <label for=""><strong>#1 Teléfono IEMS: </strong>'.$item["tel1_iems"].'</label>
        </div> 
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">
          <label for=""><strong>#2 Teléfono IEMS: </strong>'.$item["tel2_iems"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-8 mb-1 border">
          <label for=""><strong>Nombre coordinador IEMS: </strong>'.$item["coordinador_iems"].'</label>
        </div>                              
    </div>
    </form>
  </div>
</div>
			';
		}
	}
}


static public function query_pre_registros_difu(){
	if (isset($_POST["fecha1_pre"]) AND isset($_POST["fecha2_pre"])) {
		$fecha1=$_POST["fecha1_pre"];
		$fecha2=$_POST["fecha2_pre"];

		$stmt=Conexion::conectar()->prepare("SELECT id_reg, nombre_pre, fecha_pre, apellidos_pre, carrera_pre,  nom_iems, clave_iems, tel1_iems, tel2_iems, email_iems, coordinador_iems FROM pre_r INNER JOIN iems_difu ON (id_iems = iems_difu_id_iems) WHERE fecha_pre BETWEEN :query_1 AND :query_2 AND  ingreso = 'no' ORDER BY fecha_pre DESC");

		$stmt->bindParam(":query_1",$fecha1,PDO::PARAM_STR);
		$stmt->bindParam(":query_2",$fecha2,PDO::PARAM_STR);
		$stmt->execute();

		foreach ($stmt as $row => $item) {
			# code...
		
			echo '
<div class="card mt-4 mb-3 bordered">
  <div class="card-header text-white btn-green">
      <strong>'.$item["nombre_pre"].' '.$item["apellidos_pre"].' -- '.$item["nom_iems"].'</strong>
    </div>
  <div class="card-body">
    <div class="form-row"> 
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">       
        <label for=""><strong>Fecha de pre-registro:</strong> '.$item["fecha_pre"].'</label> 
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">
          <label for=""><strong>Carrera de interes:</strong> '.$item["carrera_pre"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">
          <label for=""><strong>Clave IEMS:</strong> '.$item["clave_iems"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">
          <label for=""><strong>Email IEMS:</strong>'.$item["clave_iems"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">
          <label for=""><strong>#1 Teléfono IEMS: </strong> '.$item["tel1_iems"].'</label>
        </div> 
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">
          <label for=""><strong>#2 Teléfono IEMS: </strong> '.$item["tel2_iems"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-8 mb-1 border">
          <label for=""><strong>Nombre coordinador IEMS: </strong> '.$item["coordinador_iems"].'</label>
        </div>                              
        <div class="col-sm-6 col-md-3 col-lg-4 mb-1">
           <button class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#conf'.$item["id_reg"].'"><strong>Confirmar ingreso</strong></button>
        </div>
    </div>
  </div>
</div>



<div class="modal fade" id="conf'.$item["id_reg"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered modal-notify modal-info role="document" >
    <div class="modal-content">
    <div class="modal-header">
        <p class="heading lead"><H3 class="text-white">CONFIRMAR INGRESO A LA UNIVERSIDAD</H3></p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
     </div>
      <div class="modal-body">
<form class="text-center border border-light p-5 mt-2" method="post">
    <p class="h4 mb-3 btn-block ">¿DESEA CONFIRMAR EL INGRESO DE: <strong> '.$item["nombre_pre"].' '.$item["apellidos_pre"].' </strong> A LA UNIVERSIDAD? </p>
    <input type="hidden" name="id_foraneo" value="'.$item["id_reg"].'">
      <div class="form-row mb-2"> 
        <div class="col-md-6 col-lg-4 mb-2 ">
            <button type="submit" name="confirma_ingreso" class="btn btn-primary btn-block ">CONFIRMAR</button>
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



static public function query_consultas_medicas(){
	if (isset($_POST["fecha1_con"]) AND isset($_POST["fecha2_con"])) {
		$query_1=$_POST["fecha1_con"];
		$query_2=$_POST["fecha2_con"];
		$tabla2="consu_med";
		$tabla1="paci_med";

		$stmt=Conexion::conectar()->prepare("SELECT id_con,fecha_consulta, presion_arterial, temperatura_consulta, peso_consulta, sintomas, medicamento_receta, paraclinico_receta, curaciones, diagnostico, observ_consulta, nombre_paciente, apellidos_paciente, carrera_paciente, fecha_add_paciente, fecha_nacimiento_paciente  FROM $tabla1 INNER JOIN $tabla2
		ON (id_paci=paci_med_id_paci) WHERE fecha_consulta BETWEEN :query_1 AND :query_2 ORDER BY fecha_consulta DESC");

		$stmt->bindParam(":query_1",$query_1,PDO::PARAM_STR);
		$stmt->bindParam(":query_2",$query_2,PDO::PARAM_STR);
		$stmt->execute();
		foreach ($stmt as $row => $item) {
			echo '
<div class="card mt-1 mb-3 bordered">
    <div class="card-header btn-primary text-white">
      <strong> '.$item["fecha_nacimiento_paciente"].' | '.$item["nombre_paciente"].' '.$item["apellidos_paciente"].' | TICS </strong>
    </div>
  <div class="card-body">
    <div class="form-row"> 
         <div class="col-sm-12 col-md-3 col-lg-3 mb-1 border">       
        <label for=""><strong>Presión Arterial: </strong>'.$item["presion_arterial"].'</label> 
         </div>
         <div class="col-sm-12 col-md-3 col-lg-3 mb-1 border">       
        <label for=""><strong>Temperatura: </strong> '.$item["temperatura_consulta"].'°</label> 
         </div>
        <div class="col-sm-12 col-md-3 col-lg-3 mb-1 border">
           <label for=""><strong>Peso: </strong>'.$item["peso_consulta"].' kg</label>
        </div>
        <div class="col-md-3 col-lg-3 mb-1 border">
           <label for=""><strong>Fecha: </strong>'.$item["fecha_consulta"].'</label>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-5 mb-1 border">
           <label for=""><strong>Curaciones: </strong>'.$item["curaciones"].'</label>
        </div>
         <div class="col-md-12 col-lg-7 mb-1 border">
           <label for=""><strong>Sintomas: </strong>'.$item["sintomas"].'</label>
        </div>
        <div class="col-12 mb-1 border">
           <label for=""><strong>Diagnostico: </strong>'.$item["diagnostico"].'</label>
        </div>
        <div class="col-sm-12 col-md-9 col-lg-12 mb-1 border">
           <label for=""><strong>Observaciones: </strong>'.$item["observ_consulta"].'</label>
        </div>       
    </div>
  </div>
</div>';
		}
	}


}




static public function query_pacientes_medico(){
	if (isset($_POST["fecha1_pacientes"]) AND isset($_POST["fecha2_pacientes"])) {
		$query_1 = $_POST["fecha1_pacientes"];
		$query_2 =$_POST["fecha2_pacientes"];
		$tabla="paci_med";

		$stmt=Conexion::conectar()->prepare("SELECT  id_paci, matricula_paciente, nombre_paciente, apellidos_paciente, factor_rh, genero_paciente, primer_vez, alergias_paciente, padecimientos_paciente, fecha_nacimiento_paciente,  tipo_sangre, observaciones_paciente, fecha_add_paciente, carrera_paciente FROM $tabla WHERE fecha_add_paciente BETWEEN :query_1 AND :query_2 ORDER BY fecha_add_paciente DESC");

		$stmt->bindParam(":query_1",$query_1,PDO::PARAM_STR);
		$stmt->bindParam(":query_2",$query_2,PDO::PARAM_STR);
		$stmt->execute();

		foreach ($stmt as $row => $item) {
			echo '
<div class="card mt-3 ">
  <h9 class="card-header btn-default"><strong> '.$item["carrera_paciente"].'  | '.$item["nombre_paciente"].' '.$item["apellidos_paciente"].' | '.$item["matricula_paciente"].' | FECHA ALTA: '.$item["fecha_add_paciente"].' </strong></h9>
  <div class="card-body">
    <div class="form-row"> 
        <div class=" col-lg-2 col-sm-12 col-md-3 mb-1 border">
          <label for=""><strong>Tipo de Sangre: </strong> '.$item["tipo_sangre"].'</label>
        </div> 
        <div class="col-sm-12 col-md-2 col-lg-2 mb-1 border">
          <label for=""><strong>Genero:</strong> '.$item["genero_paciente"].'</label>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-2 mb-1 border">
            <label for=""><strong>Factor RH:</strong> '.$item["factor_rh"].'</label>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-3 mb-1 border">
          <label for=""><strong>Primer Vez:</strong> '.$item["primer_vez"].'</label>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-3 mb-1 border">
            <label for=""><strong>Fecha de nacimiento:</strong> '.$item["fecha_nacimiento_paciente"].'</label>
        </div>
        <div class=" col-md-8 col-lg-6 mb-1 border">
            <label for=""><strong>Alergias: </strong> '.$item["alergias_paciente"].'</label>
        </div>
        <div class=" col-md-12 col-lg-6 mb-1 border">
            <label for=""><strong>Padec. Cronico o Deg.: </strong> '.$item["padecimientos_paciente"].' </label>
        </div>       
        <div class=" col-lg-9 col-md-12 mb-1  border">
            <label for=""><strong>Observaciones: </strong>'.$item["observaciones_paciente"].'</label>
        </div>
        <div class=" col-lg-3 col-md-12 ">
            <button class="btn  btn-dark-green btn-block btn-sm" data-toggle="modal" data-target="#upda'.$item["id_paci"].'"><strong> Actualizar Matricula</strong></button>
        </div>         
    </div>
  </div>
</div>




<div class="modal fade" id="upda'.$item["id_paci"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered modal-notify modal-info role="document" >
    <div class="modal-content">
    <div class="modal-header">
        <p class="heading lead"><H3 class="text-white">ACTUALIZACIÓN DE MATRÍCULA</H3></p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
     </div>
      <div class="modal-body">
<form class="text-center border border-light p-5 mt-2" method="post">

        <div class="form-row mb-2"> 
        <div class="col-sm-12 col-md-6 col-lg-4 mb-2 border ">
            <label for=""><strong>'.$item["nombre_paciente"].' '.$item["apellidos_paciente"].'</strong></label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-2 border ">
            <label for=""><strong>Carrera: TICS </strong></label>
        </div> 
        <div class="col-sm-12 col-md-6 col-lg-4 mb-2 border ">
            <label for=""><strong>Tipo de Sangre: '.$item["tipo_sangre"].'</strong></label>
        </div> 
        <div class="col-12 mt-2">
            <label for=""><strong>Introduzca Matricula Nueva</strong></label>
        </div>                  
        <div class="col-12 mb-2 ">
            <input type="text" minlength="8" pattern="^[0-9]+" name="new_matricula" class="form-control validate" placeholder="Matricula Nueva" required>
            <input type="hidden" name="id_id" value="'.$item["id_paci"].'" class="form-control">
        </div>                  
    </div>
      <div class="form-row mb-2"> 
        <div class="col-md-6 col-lg-4 mb-2 ">
            
            <button type="submit" name="update_paciente" class="btn btn-primary btn-block ">Guardar</button>
        </div>
        <div class="col-md-6 col-lg-4 mb-2 ">
          <button type="button" class="btn btn-secondary btn-block " data-dismiss="modal">Cancelar</button>
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

static public function query_iems_pre(){
	if (isset($_POST["iems_pre"])) {
		$consulta=$_POST["iems_pre"];
		$tabla="iems_difu";

		$stmt=Conexion::conectar()->prepare("SELECT  id_iems, clave_iems, nom_iems, cp_iems, municipio_iems, localidad_iems, zona_influencia, direccion_iems, tel1_iems, tel2_iems, email_iems, coordinador_iems, distancia_iems, servicio_educativo, observ_iems FROM $tabla WHERE nom_iems LIKE :query");
		$stmt->bindParam(":query",$consulta,PDO::PARAM_STR);
		$stmt->execute();


		foreach ($stmt as $row => $item) {
			echo '
<div class="card mt-3 ">
  <h9 class="card-header btn-default"><strong>'.$item["nom_iems"].' || '.$item["clave_iems"].'</strong></h9>
  <div class="card-body ">
    <div class="form-row"> 
        <div class="col-sm-12 col-md-6 col-lg-6 mb-1 border">       
        <label for=""><strong>Nombre coordinador:</strong> '.$item["coordinador_iems"].'</label> 
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
          <label for=""><strong># Teléfono 1: </strong> '.$item["tel1_iems"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
          <label for=""><strong># Teléfono 2: </strong> '.$item["tel2_iems"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
            <label for=""><strong>Email: </strong> '.$item["email_iems"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-2 mb-1 border">
            <label for=""><strong>Distancia KM:</strong> '.$item["distancia_iems"].'</label>
        </div>
        <div class=" col-md-6 col-lg-3 col-md-6 mb-1 border">
            <label for=""><strong>Zona de influencia: </strong>Zona '.$item["zona_influencia"].'</label>
        </div>

        <div class=" col-md-12 col-lg-4 col-md-6 mb-1 border">
            <label for=""><strong>Servicio educativo: </strong>'.$item["servicio_educativo"].' </label>
        </div>
    </div>
    <!-- COULUMBS -->
  </div>
</div>
<!-- Card-ASPIRANTE -->
<!-- TERMINA VISUALIZANDO DATOS ANTES PRE-REGISTRO ---------------------------------------->

<!-- INICIA FORMULARIO PARA PRE-REGISTRO ---------------------------------------->
<div class="card mt-3">    
  <div class="card-body">
<form class="text-center border border-light p-5" method="post">
  <p class="h4 mb-4">Nuevo pre-registro</p>
    <div class="form-row mb-2">
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <input type="text"  name="nombre_pre" class="form-control" placeholder="Nombre (s)" required>
             <input type="hidden"  name="id_iems" value="'.$item["id_iems"].'" class="form-control" placeholder="Nombre (s)">
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
            <input type="text"  name="apellidos_pre" class="form-control" placeholder="Apellidos" required>
        </div>
        <div class=" col-md-12 col-lg-3">
        <select class="browser-default custom-select" name="carrera_pre" required>
            <option selected>CARRERA DE INTERES</option>
            <option value="Tecnologías de la Información">Tecnologías de la Información</option>
            <option value="Ingeniería Industrial">Ingeniería Industrial</option>
            <option value="Mantenimiento Industrial">Mantenimiento Industrial</option>
            <option value="Mecatrónica">Mecatrónica</option>
            <option value="Finanzas y Fiscal Contador Público">Finanzas y Fiscal Contador Público</option>
            <option value="Procesos Bioalimentarios">Procesos Bioalimentarios</option>
            <option value="Innovación de Negocios y Mercadotecnia">Innovación de Negocios y Mercadotecnia</option>
            <option value="Gestión de Negocios y Proyectos">Gestión de Negocios y Proyectos</option>
            <option value="Agricultura Sustentable y Protegida">Agricultura Sustentable y Protegida</option>
            <option value="Gestión del Capital Humano">Gestión del Capital Humano</option>
        </select>
        </div>

    </div>
    <div class="form-row mb-2">
      <div class="col-12 mb-3">
        <input type="text" name="observaciones_pre"  class="form-control" placeholder="Observaciones">
      </div>
    </div>
<div class="form-row mb-2"> 
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-info my-4 btn-block" type="submit" name="add_new_pre"><strong>Agregar </strong></button>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-danger my-4 btn-block" type="reset"><strong>Cancelar</strong></button>
    </div>
</div>
</form>
</div>
</div><!-- TERMINA CARD DEL FORMULARIO -->



			';
		}
	}
}






static public function query_add_evento_iems(){
	if (isset($_POST["iems_event"])) {
		$consulta=$_POST["iems_event"];
		$tabla="iems_difu";

		$stmt=Conexion::conectar()->prepare("SELECT   id_iems, clave_iems, nom_iems, cp_iems, municipio_iems, localidad_iems, zona_influencia, direccion_iems, tel1_iems, tel2_iems, email_iems, coordinador_iems, distancia_iems, servicio_educativo, observ_iems FROM $tabla WHERE nom_iems LIKE :query ");
		$stmt->bindParam(":query", $consulta, PDO::PARAM_STR);
		$stmt->execute();
		foreach ($stmt as $row => $item) {
			echo '
<div class="card mt-3 ">
  <h9 class="card-header btn-default"><strong>'.$item["nom_iems"].' || '.$item["clave_iems"].'</strong></h9>
  <div class="card-body ">
    <div class="form-row"> 
        <div class="col-sm-12 col-md-6 col-lg-6 mb-1 border">       
        <label for=""><strong>Nombre coordinador:</strong> '.$item["coordinador_iems"].'</label> 
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
          <label for=""><strong># Teléfono 1: </strong> '.$item["tel1_iems"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
          <label for=""><strong># Teléfono 2: </strong> '.$item["tel2_iems"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
            <label for=""><strong>Email: </strong> '.$item["email_iems"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-2 mb-1 border">
            <label for=""><strong>Distancia KM:</strong> '.$item["distancia_iems"].'</label>
        </div>
        <div class=" col-md-6 col-lg-3 col-md-6 mb-1 border">
            <label for=""><strong>Zona de influencia: </strong>Zona '.$item["zona_influencia"].'</label>
        </div>

        <div class=" col-md-12 col-lg-4 col-md-6 mb-1 border">
            <label for=""><strong>Servicio educativo: </strong>'.$item["servicio_educativo"].' </label>
        </div>
    </div>
    <!-- COULUMBS -->
  </div>
</div>
<!-- Card-ASPIRANTE -->
<!-- TERMINA VISUALIZANDO DATOS ANTES PRE-REGISTRO ---------------------------------------->

<!-- INICIA FORMULARIO PARA PRE-REGISTRO ---------------------------------------->
<div class="card mt-3">    
  <div class="card-body">
<form class="text-center border border-light p-5" method="post">
  <p class="h4 mb-4">Programar evento</p>
    <div class="form-row mb-2">
       
        <div class="col-sm-12 col-md-6 col-lg-4 mb-2">
        <select class="browser-default custom-select" name="turno" required>
            <option selected>Turno</option>
            <option value="MATUTINO">Matutino</option>
            <option value="VESPERTINO">Vespertino</option>
        </select>
        </div>
        <input type="hidden" name="id_esto" value="'.$item["id_iems"].'" required>

        <div class=" col-sm-12 col-md-6 col-lg-4 mb-2">
        <select class="browser-default custom-select" name="area">
            <option selected>Área que atendera</option>
            <option value="Tecnologías de la Información">Tecnologías de la Información</option>
            <option value="Ingeniería Industrial">Ingeniería Industrial</option>
            <option value="Mantenimiento Industrial">Mantenimiento Industrial</option>
            <option value="Mecatrónica">Mecatrónica</option>
            <option value="Finanzas y Fiscal Contador Público">Finanzas y Fiscal Contador Público</option>
            <option value="Procesos Bioalimentarios">Procesos Bioalimentarios</option>
            <option value="Innovación de Negocios y Mercadotecnia">Innovación de Negocios y Mercadotecnia</option>
            <option value="Gestión de Negocios y Proyectos">Gestión de Negocios y Proyectos</option>
            <option value="Agricultura Sustentable y Protegida">Agricultura Sustentable y Protegida</option>
            <option value="Gestión del Capital Humano">Gestión del Capital Humano</option>
        </select>
        </div>
        <div class="col-md-6 col-lg-4 col-sm-12 mb-3 ">
          <input type="date" name="fecha_ev"  class="form-control" data-toggle="tooltip" data-placement="top"
  title="Fecha Programada" required>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-12 mb-3 ">
          <input type="text" name="actividad_ev"  class="form-control" placeholder="Actividad programada" required>
        </div>
   
        <div class="col-md-6 col-lg-6 col-sm-12 mb-3 ">
          <input type="text" name="tipo_ev"  class="form-control" placeholder="Tipo de evento" required>
        </div> </div>
<div class="form-row mb-2"> 
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-info my-4 btn-block" type="submit" name="add_new_event_difu"><strong>Agregar </strong></button>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
    <button class="btn btn-danger my-4 btn-block" type="reset"><strong>Cancelar</strong></button>
    </div>
</div>
</form>
        </div>
</div><!-- TERMINA CARD DEL FORMULARIO -->
			';
		}


	}
}

static public function inv_exist_difusion(){
	if (isset($_POST["date_1_difu"]) AND isset($_POST["date_2_difu"])) {
		$fecha1= $_POST["date_1_difu"];
		$fecha2=$_POST["date_2_difu"];
		$tabla="inv_dif";

		$stmt=Conexion::conectar()->prepare("SELECT id_invent, codigo, nombre_invent, cantidad_invent, fecha_alta, descrip_invent FROM $tabla WHERE fecha_alta BETWEEN :query1 AND :query2");

		$stmt->bindParam(":query1", $fecha1,PDO::PARAM_STR);
		$stmt->bindParam(":query2", $fecha2,PDO::PARAM_STR);
		$stmt->execute();

		foreach ($stmt as $row => $item) {
			echo '
<div class="card mt-1 mb-3">
  <div class="card-header text-white bg-success">
      <strong>CANTIDAD: '.$item["cantidad_invent"].' || '.$item["nombre_invent"].' </strong>
    </div>
  <div class="card-body">
    <div class="form-row"> 
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">       
        <label for=""><strong>Fecha de actualización:</strong> '.$item["fecha_alta"].'</label> 
        </div>
        <div class="col-sm-12 col-md-6 col-lg-8 mb-1 border">
           <label for=""><strong>Decripción: </strong>'.$item["descrip_invent"].'</label>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-2 mb-1">
           <button class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#ag'.$item["id_invent"].'"><i class="fas fa-plus"></i><strong> Agregar</strong></button>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-2">
           <button class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#elim'.$item["id_invent"].'"><i class="fas fa-eraser"></i><strong> Borrar</strong></button>
        </div>
    </div>
  </div>
</div>



<div class="modal fade" id="ag'.$item["id_invent"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered modal-notify modal-info role="document" >
    <div class="modal-content">
    <div class="modal-header">
        <p class="heading lead"><H3 class="text-white">AGREGAR ALGUNOS(AS) '.$item["nombre_invent"].'</H3></p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
     </div>
      <div class="modal-body">
<form class="text-center border border-light p-5 mt-2" method="post">
    <p class="h4 mb-3 btn-block ">Agregar articulos</p>
        <div class="form-row mb-2"> 
    
            <input type="hidden" name="id" value="'.$item["id_invent"].'" class="form-control">
            <input type="hidden" name="cant_actual" value="'.$item["cantidad_invent"].'" class="form-control">
          
        <div class="col-12 mb-2 ">
            <input type="number" min="1" name="cantidad" class="form-control" placeholder="Cantidad" required>
        </div>        
    </div>
      <div class="form-row mb-2"> 
        <div class="col-md-6 col-lg-4 mb-2 ">
            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Cancelar</button>
        </div>
        <div class="col-md-6 col-lg-4 mb-2 ">
          <button type="submit" name="mas_articulos_difusion" class="btn btn-primary btn-block">Guardar</button>
        </div>
    </div> 
</form>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="elim'.$item["id_invent"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered modal-notify modal-warning role="document" >
    <div class="modal-content">
    <div class="modal-header">
        <p class="heading lead"><H3 class="text-white">ELIMINAR ALGUNOS(AS) '.$item["nombre_invent"].'</H3></p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
     </div>
      <div class="modal-body">
<form class="text-center border border-light p-5 mt-2" method="post">
    <p class="h4 mb-3 btn-block ">ELIMINAR ARTICULOS</p>
        <div class="form-row mb-2"> 
        <div class="col-sm-12 col-md-6 col-lg-2 mb-2 ">
            <input type="number" min="1" name="cantidad" class="form-control" placeholder="Cantidad" required>
            <input type="hidden"  value="'.$item["cantidad_invent"].'" name="cantidad_actual" class="form-control">
            <input type="hidden" value="'.$item["id_invent"].'" name="id_articulo" class="form-control">
            <input type="hidden" value="'.$item["nombre_invent"].'" name="nombre" class="form-control">
        </div>        
        <div class="col-md-12 col-lg-10 mb-2 ">
            <input type="text" name="motivo" class="form-control" placeholder="Motivo" required>
        </div>
    </div>
      <div class="form-row mb-2"> 
        <div class="col-md-6 col-lg-4 mb-2 ">
            <button type="submit" name="del_art_difusion" class="btn btn-primary btn-block">Guardar</button>
        </div>
        <div class="col-md-6 col-lg-4 mb-2 ">
           <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Cancelar</button>
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

static public function eventos_no_realizados_difusion(){
	if (isset($_POST["f_evno_1"]) AND $_POST["f_evno_2"]) {
		$date1=$_POST["f_evno_1"];
		$date2=$_POST["f_evno_2"];

		$stmt=Conexion::conectar()->prepare("SELECT DISTINCT nom_iems, clave_iems, coordinador_iems, tel1_iems, tel2_iems, email_iems, fecha_prog, motivo_no_event FROM event_no_iems INNER JOIN ev_prog_iems ON (ev_prog_iems_id_prog=id_prog) INNER JOIN iems_difu  ON (id_ev_id_iems=id_iems) WHERE fecha_prog BETWEEN :query1 AND :query2 AND realizado LIKE 'no' ORDER BY fecha_prog DESC");
		$stmt->bindParam(":query1",$date1,PDO::PARAM_STR);
		$stmt->bindParam(":query2", $date2, PDO::PARAM_STR);

		$stmt->execute();

		foreach ($stmt as $row => $item) {
			echo '
<div class="card mt-1 mb-3 bordered">
  <div class="card-header text-white bg-danger">
      <strong>'.$item["nom_iems"].' || CLAVE: '.$item["clave_iems"].' </strong>
    </div>
  <div class="card-body">
    <div class="form-row"> 
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">       
        <label for=""><strong>#1 Telefono:</strong> '.$item["tel1_iems"].'</label> 
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">
           <label for=""><strong>#2 Telefono: </strong> '.$item["tel2_iems"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-5 mb-1 border">
           <label for=""><strong>Nombre del coordinador: </strong> '.$item["coordinador_iems"].'</label>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
           <label for=""><strong>Fecha Programada: </strong> '.$item["fecha_prog"].'</label>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-9 mb-1 border">
           <label for=""><strong>Motivo: </strong> '.$item["motivo_no_event"].'</label>
        </div>
    </div>
  </div>
</div>
			';
		}


	}
}


static public function inv_del_difu(){
	if (isset($_POST["date_1_del"]) AND isset($_POST["date_2_del"])) {
		$date1=$_POST["date_1_del"]; 
		$date2=$_POST["date_2_del"];
		$tabla="inv_del";


		$stmt=Conexion::conectar()->prepare("SELECT nombre_delete, cantidad_delete, fecha_delete, motivo_delete FROM $tabla  WHERE fecha_delete BETWEEN :query1 AND :query2 ORDER BY fecha_delete DESC");

		$stmt->bindParam(":query1", $date1, PDO::PARAM_STR);
		$stmt->bindParam(":query2", $date2, PDO::PARAM_STR);

		$stmt->execute();
		foreach ($stmt as $row => $item) {
			echo '
<div class="card mt-1 mb-3">
  <div class="card-header text-white bg-danger">
      <strong>CANTIDAD: '.$item["cantidad_delete"].' || '.$item["nombre_delete"].' </strong>
    </div>
  <div class="card-body">
    <div class="form-row"> 
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">       
        <label for=""><strong>Fecha baja:</strong> '.$item["fecha_delete"].'</label> 
        </div>
        <div class="col-sm-12 col-md-6 col-lg-8 mb-1 border">
           <label for=""><strong>Motivo: </strong>'.$item["motivo_delete"].' </label>
        </div>
    </div>
  </div>
</div>
			';
		}


	}
}

static public function ev_realizados_difusion(){
	if (isset($_POST["f_evsi_1"]) AND isset($_POST["f_evsi_2"])) {
		$date=$_POST["f_evsi_1"];
		$date2=$_POST["f_evsi_2"];
		$tabla="evid_ev";
		$tabla2="event_si_iems";
		$tabla3="iems_difu";

		$stmt=Conexion::conectar()->prepare("SELECT  id_si,fecha_realizado, num_hombres,num_mujeres, total_atendidos, acti_realizada, observ_realizado, num_viajes, evid_1, evid_2, evid_3, actividad_prog, turno_iems, carrera_ev, tipo_prog, distancia_iems,  clave_iems, nom_iems, ruta_iems, municipio_iems, localidad_iems, coordinador_iems, zona_influencia, tel1_iems, tel2_iems, email_iems, servicio_educativo FROM event_si_iems INNER JOIN  ev_prog_iems ON (ev_prog_iems_id_prog = id_prog) INNER JOIN iems_difu  ON (id_ev_id_iems=id_iems) WHERE fecha_realizado BETWEEN :query1 AND :query2 AND realizado LIKE 'si'  ORDER BY fecha_realizado DESC");

		$stmt->bindParam(":query1", $date, PDO::PARAM_STR);
		$stmt->bindParam(":query2", $date2, PDO::PARAM_STR);

		$stmt->execute();

		foreach ($stmt as $row => $item) {
			echo '
<div class="card mt-1 mb-3 bordered">
  <div class="card-header btn-green text-white">
  <div class="row">
  <div class="col-9  mt-2 ">
      <strong>'.$item["nom_iems"].'</strong>
      </div>
 
        <div class="col-2">
<button type="button" class="btn btn-block btn-outline-success  btn-white  btn-sm" data-toggle="modal" data-target="#q'.$item["id_si"].'">
  <strong><i class="fas fa-camera-retro fa-2x "> </i> </strong>
</button>
        </div>
        </div>
  </div>
  <div class="card-body border">
    <div class="form-row"> 
         <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">  
         <label for=""><strong>Clave: </strong>'.$item["clave_iems"].'</label>      
         </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
          <label for=""><strong>#1 Teléfono: </strong> '.$item["tel1_iems"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
           <label for=""><strong>#2 Teléfono: </strong>'.$item["tel2_iems"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
           <label for=""><strong>Distancia Recorrida: </strong>'.$item["distancia_iems"]*$item["num_viajes"].'km</label>
        </div>
         <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">
           <label for=""><strong>Email: </strong>'.$item["email_iems"].'</label>
        </div>
         <div class="col-sm-12 col-md-6 col-lg-2 mb-1 border">
           <label for=""><strong>Mujeres atendidas: </strong>'.$item["num_mujeres"].'</label>
        </div>
         <div class="col-sm-12 col-md-6 col-lg-2 mb-1 border">
           <label><strong>Hombres atendidos: </strong>'.$item["num_hombres"].'</label>
        </div>
         <div class="col-sm-12 col-md-6 col-lg-2 mb-1 border">
           <label><strong>Total atendidos: </strong>'.$item["total_atendidos"].'</label>
        </div>
         <div class="col-sm-12 col-md-6 col-lg-2 mb-1 border">            
           <label><strong>Fecha: </strong>'.$item["fecha_realizado"].'</label>
        </div>
        <div class="col-md-6 col-lg-6 mb-1 border">
           <label><strong>Nombre del coordinador: </strong>'.$item["coordinador_iems"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
           <label><strong>Zona de influencia: </strong>'.$item["zona_influencia"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
           <label><strong>Municipio: </strong>'.$item["municipio_iems"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
           <label><strong>Localidad: </strong>'.$item["localidad_iems"].'</label>
        </div>     
        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">
           <label><strong>Servicio educativo: </strong>'.$item["servicio_educativo"].'</label>
        </div>  
        <div class="col-sm-12 col-md-6 col-lg-5 mb-1 border">
           <label><strong>Área que atendio: </strong>'.$item["carrera_ev"].'</label>
        </div> 
        <div class=" col-lg-12 col-md-6 mb-1 border">
           <label><strong>Actividad programada: </strong>'.$item["actividad_prog"].'</label>
        </div> 
        <div class=" col-12 mb-1 border">
           <label><strong>Actividad realizada: </strong>'.$item["acti_realizada"].'</label>
        </div>
        <div class=" col-12 mb-1 border">
           <label><strong>Observaciones: </strong>'.$item["observ_realizado"].'</label>
        </div>

    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="q'.$item["id_si"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content align-items-center">
      <div class="modal-body ">

<div class="row ">
  <div class="col-auto">
    <div class="carousel slide" id="prin'.$item["id_si"].'" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="data:image/jpg;base64,'.base64_encode($item["evid_1"]).'"  class="img-fluid" alt="">
        </div>
        <div class="carousel-item">
        <img src="data:image/jpg;base64,'.base64_encode($item["evid_2"]).'"  class="img-fluid" alt="">
        </div>
        <div class="carousel-item">
        <img src="data:image/jpg;base64,'.base64_encode($item["evid_3"]).'"  class="img-fluid" alt="">
        </div>
      </div>      
      <a href="#prin'.$item["id_si"].'" class="carousel-control-prev" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a href="#prin'.$item["id_si"].'" class="carousel-control-next" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
      </a>
    </div>    
  </div>  
</div>

      </div>
    </div>
  </div>
</div>
<!-- Modal -->
			';
		}
	}
}


static public function existencia_inventario_medico(){
	if (isset($_POST["inv_med_date1"]) AND isset($_POST["inv_med_date2"])) {
		$date1=$_POST["inv_med_date1"];
		$date2=$_POST["inv_med_date2"];
		$table="exis_inv_med";

		$stmt=Conexion::conectar()->prepare("SELECT id_med, codigo_medica, nombre_medica, activo_medica, grupo_medica, presentacion, cantidad_medica, observaciones_medica, fecha_alta_medica  FROM $table WHERE fecha_alta_medica BETWEEN :query1 AND :query2");
		$stmt->bindParam(":query1", $date1, PDO::PARAM_STR);
		$stmt->bindParam(":query2", $date2, PDO::PARAM_STR);

		$stmt->execute();

		foreach ($stmt as $row => $item) {
			echo '
<div class="card mt-4 mb-3">
  <div class="card-header text-white bg-info">
      <strong>'.$item["nombre_medica"].' - '.$item["activo_medica"].'</strong>
    </div>
  <div class="card-body">
    <div class="form-row"> 
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">       
        <label for=""><strong>Codigo:</strong> '.$item["codigo_medica"].'</label> 
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
          <label for=""><strong>Presentación:</strong> '.$item["presentacion"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
          <label for=""><strong>Grupo:</strong>'.$item["grupo_medica"].'</label>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3 mb-1 border">
            <label for=""><h7><strong>Cantidad: </strong> '.$item["cantidad_medica"].'</h7></label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-8 mb-1 border">
           <label for=""><strong>Observaciones: </strong> '.$item["observaciones_medica"].' </label>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-2 mb-1">
           <button class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#more'.$item["id_med"].'"><i class="fas fa-plus"></i><strong> Agregar mas</strong></button>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-2">
           <button class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#elimi'.$item["id_med"].'"><i class="fas fa-eraser"></i><strong> Borrar</strong></button>
        </div>
    </div>
  </div>
</div>




<div class="modal fade" id="more'.$item["id_med"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered modal-notify modal-info role="document" >
    <div class="modal-content">
    <div class="modal-header">
        <p class="heading lead"><H3 class="text-white">AGREGAR MÁS <strong>'.$item["nombre_medica"].'</strong></H3></p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
     </div>
      <div class="modal-body">
<form class="text-center border border-light p-5 mt-2" method="post">
        <div class="form-row mb-2"> 
        <div class="col-sm-12 col-md-6 col-lg-6 mb-2 ">
            <input type="hidden" name="id_articulo" value="'.$item["id_med"].'" class="form-control">
            <input type="hidden" name="cant_actual" value="'.$item["cantidad_medica"].'" class="form-control">
        </div>   
        <div class="col-12 mb-2 ">
            <input type="number" min="1" name="cantidad" class="form-control" placeholder="Cantidad" required>
        </div>        
    </div>
      <div class="form-row mb-2"> 
        <div class="col-md-6 col-lg-4 mb-2 ">
            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Cancelar</button>
        </div>
        <div class="col-md-6 col-lg-4 mb-2 ">
          <button type="submit" name="add_mas_articulo_medico" class="btn btn-primary btn-block">Guardar</button>
        </div>
    </div> 
</form>
      </div>
    </div>
  </div>
</div>





<div class="modal fade" id="elimi'.$item["id_med"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered modal-notify modal-danger role="document" >
    <div class="modal-content">
    <div class="modal-header">
        <p class="heading lead"><H3 class="text-white">BORRAR ALGUNOS(AS) <strong>'.$item["nombre_medica"].'</strong></H3></p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
     </div>
      <div class="modal-body">
<form class="text-center border border-light p-5 mt-2" method="post">
    <p class="h4 mb-3 btn-block ">ELIMINAR ARTICULOS</p>
        <div class="form-row mb-2"> 

            <input type="hidden" name="id" value="'.$item["id_med"].'" class="form-control">
            <input type="hidden" name="nombre" value="'.$item["nombre_medica"].'" class="form-control">
            <input type="hidden" name="cant_actual" value="'.$item["cantidad_medica"].'" class="form-control">
            <input type="hidden" name="grupo" value="'.$item["grupo_medica"].'" class="form-control">
            <input type="hidden" name="presentacion" value="'.$item["presentacion"].'" class="form-control">
            <input type="hidden" name="codigo" value="'.$item["codigo_medica"].'" class="form-control">
            <input type="hidden" name="sustancia" value="'.$item["activo_medica"].'" class="form-control">
       
        <div class="col-sm-12 col-md-6 col-lg-4 mb-2 ">
            <input type="number" min="1" name="cantidad" class="form-control" placeholder="Cantidad" required>
        </div>        
        <div class="col-md-12 col-lg-8 mb-2 ">
            <input type="text" name="motivo" class="form-control" placeholder="Motivo" required>
        </div>
    </div>
      <div class="form-row mb-2"> 
        <div class="col-md-6 col-lg-4 mb-2 ">
            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Cancelar</button>
        </div>
        <div class="col-md-6 col-lg-4 mb-2 ">
          <button type="submit" name="delete_medicinas" class="btn btn-primary btn-block">Guardar</button>
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


static public function del_medicamento_medico(){
	if (isset($_POST["del_med_date1"]) AND isset($_POST["del_med_date2"])) {
		$date1=$_POST["del_med_date1"];
		$date2=$_POST["del_med_date2"];
		$table="del_inv_med";
		
		$stmt=Conexion::conectar()->prepare("SELECT  codigo_del, nom_del, sus_del, presentacion_del, grupo, cantidad_medic, motivo_medica, fecha_baja_medica FROM $table  WHERE fecha_baja_medica BETWEEN :query1 AND :query2 ORDER BY fecha_baja_medica DESC");

		$stmt->bindParam(":query1", $date1, PDO::PARAM_STR);
		$stmt->bindParam(":query2", $date2, PDO::PARAM_STR);

		$stmt->execute();

		foreach ($stmt as $row => $item) {
			echo '
<div class="card mt-4 mb-3">
  <div class="card-header text-white bg-info">
      <strong>'.$item["fecha_baja_medica"].' | '.$item["nom_del"].' | '.$item["codigo_del"].'</strong>
    </div>
  <div class="card-body">
    <div class="form-row"> 
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">       
        <label for=""><strong>Activo: </strong> '.$item["sus_del"].'</label> 
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
          <label for=""><strong>Presentación:</strong>'.$item["presentacion_del"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
          <label for=""><strong>Grupo:</strong>'.$item["grupo"].'</label>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3 mb-1 border">
            <label for=""><h7><strong>Cantidad de eliminados: </strong> '.$item["cantidad_medic"].'</h7></label>
        </div>
        <div class="col-12 mb-1 border">
           <label for=""><strong>Motivo: </strong>'.$item["motivo_medica"].' </label>
        </div>
    </div>
  </div>
</div>
			';
		}
	}
}


static public function dame_eventos_realizados_del_medico(){
	if (isset($_POST["date_eve_m1"]) AND isset($_POST["date_eve_m2"])) {
		$date=$_POST["date_eve_m1"]; $date2=$_POST["date_eve_m2"];

		$stmt=Conexion::conectar()->prepare("SELECT  fecha_r_evento, descripcion_r_evento, tipo_r_evento, num_mujeres, num_hombres, total_ate, tema_evento, carrera FROM si_eve_med INNER JOIN ev_prog_med ON (ev_prog_med_id_evp=id_evp) WHERE fecha_r_evento BETWEEN :query1 AND :query2");

		$stmt->bindParam(":query1", $date, PDO::PARAM_STR);
		$stmt->bindParam(":query2", $date2, PDO::PARAM_STR);
		$stmt->execute();

		foreach ($stmt as $row => $item) {
			echo '
<div class="card mt-3 mb-3">
  <div class="card-header  bg-success text-white">
      <strong> '.$item["fecha_r_evento"].'  | '.$item["tema_evento"].' | '.$item["carrera"].'</strong>
    </div>
  <div class="card-body">
    <div class="form-row"> 
         <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">       
        <label for=""><strong>Tipo: </strong> '.$item["tipo_r_evento"].'</label> 
         </div>
         <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">       
        <label for=""><strong># Mujeres: </strong> '.$item["num_mujeres"].'</label> 
         </div>
          <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">       
        <label for=""><strong># Hombres: </strong> '.$item["num_hombres"].'</label> 
         </div>
         <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">       
        <label for=""><strong>Total Atendidos: </strong> '. $item["total_ate"].'</label> 
         </div>
        <div class="col-12 mb-1 border">
           <label for=""><strong>Descripción: </strong>'.$item["descripcion_r_evento"].'</label>
        </div>
    </div>
  </div>
</div>
			';
		}

	}
}


static public function no_party_medico(){
	if (isset($_POST["d_no_eve_m1"]) AND isset($_POST["d_no_eve_m2"])) {
		$date1=$_POST["d_no_eve_m1"];
		$date2=$_POST["d_no_eve_m2"];	

		$stmt=Conexion::conectar()->prepare("SELECT motivo_evento, tema_evento, fecha_evento, carrera, tipo_evento FROM no_ev_med
INNER JOIN ev_prog_med ON (ev_prog_med_id_evp=id_evp) WHERE fecha_evento BETWEEN :query1 AND :query2  AND realizado LIKE 'no'");

		$stmt->bindParam(":query1", $date1, PDO::PARAM_STR);
		$stmt->bindParam(":query2", $date2, PDO::PARAM_STR);

		$stmt->execute();

		foreach ($stmt as $row => $item) {
			echo '
<div class="card mt-3 mb-3">
  <div class="card-header bg-danger text-white">
      <strong> '.$item["fecha_evento"].'  | '.$item["carrera"].' | '.$item["tema_evento"].' </strong>
    </div>
  <div class="card-body">
    <div class="form-row"> 
         <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border">       
        <label for=""><strong>Tipo: </strong> '.$item["tipo_evento"].'</label> 
         </div>
        <div class="col-sm-12 col-md-6 col-lg-8 mb-1 border">
           <label for=""><strong>Motivo: </strong>'.$item["motivo_evento"].'</label>
        </div>
    </div>
  </div>
</div>
			';
		}
	}
}


static public function query_para_query_medica(){
	if (isset($_POST["query_medica_pac"])) {
		$query=$_POST["query_medica_pac"];

		$stmt=Conexion::conectar()->prepare("SELECT id_paci, matricula_paciente, nombre_paciente, apellidos_paciente, factor_rh, genero_paciente, primer_vez, alergias_paciente, padecimientos_paciente, fecha_nacimiento_paciente, tipo_sangre, observaciones_paciente, fecha_add_paciente, carrera_paciente FROM paci_med WHERE matricula_paciente LIKE :query");
		$stmt->bindParam(":query", $query, PDO::PARAM_STR);
		$stmt->execute();

		foreach ($stmt as $row => $item) {
			echo '
<div class="card mt-3 ">
  <h9 class="card-header btn-default"><strong>'.$item["nombre_paciente"].' '.$item["apellidos_paciente"].' || '.$item["matricula_paciente"].'</strong></h9>
  <div class="card-body">
    <div class="form-row"> 
        <div class="col-sm-12 col-md-6 col-lg-2 mb-1 border">       
        <label for=""><strong>Carrera:</strong> '.$item["carrera_paciente"].'</label> 
        </div>
        <div class="col-sm-12 col-md-6 col-lg-2 mb-1 border">
          <label for=""><strong>Genero:</strong>'.$item["genero_paciente"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
          <label for=""><strong>Primer Vez:</strong>'.$item["primer_vez"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-1 border">
            <label for=""><strong>Fecha de nacimiento:</strong> '.$item["fecha_nacimiento_paciente"].'</label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-2 mb-1 border">
            <label for=""><strong>Factor RH:</strong> '.$item["factor_rh"].'</label>
        </div>
        <div class=" col-md-6 col-lg-6 mb-1 border">
            <label for=""><strong>Alergias: </strong>'.$item["alergias_paciente"].'</label>
        </div>
        <div class=" col-md-12 col-lg-6 mb-1 border">
            <label for=""><strong>Padec. Cronico o Deg.: </strong>'.$item["padecimientos_paciente"].' </label>
        </div>
        <div class=" col-lg-3 col-sm-12 mb-1 border">
            <label for=""><strong>Tipo de Sangre: </strong>'.$item["tipo_sangre"].'</label>
        </div>        
        <div class=" col-lg-9 col-md-12 mb-1  border">
            <label for=""><strong>Observaciones: </strong>'.$item["observaciones_paciente"].'</label>
        </div>
    </div>
  </div>
</div>




<div class="card mt-3">
  <div class="card-body">
<form class="text-center border border-light p-5 mt-2" method="post">
    <p class="h4 mb-3 btn-block ">CONSULTA MEDICA</p>
    <div class="form-row mb-2"> 
        <input type="hidden" value="'.$item["id_paci"].'"  class="form-control" data-toggle="tooltip" name="id_paciente" data-placement="top"
        title="Fecha de Consulta">

        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
        <input type="date"  class="form-control" data-toggle="tooltip" name="date_consulta" data-placement="top"
        title="Fecha de Consulta" required>        
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <input type="text"  class="form-control" placeholder="Presión Arterial" name="presion" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">
            <input type="number" min="1" class="form-control" placeholder="Temperatura °C" name="temperatura" required>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3 ">
            <input type="number" min="1"  class="form-control" placeholder="Peso kg" name="peso" required>
        </div>
    </div>
    <div class="form-row mb-2">
      <div class="col-12 mb-3 mt-2">
        <input type="text" class="form-control" placeholder="Síntomas" name="sintomas" required>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
        <input type="text" class="form-control" placeholder="Curaciones" name="curaciones" required>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
        <input type="text" class="form-control" placeholder="Diagnóstico" name="diagnostico" required>
      </div>
      <div class="col-12  mb-3">
            <input type="text" class="form-control" placeholder="Ingresar nombre, dosis y presentación del medicamento(s) recetado" name="medicamentos" required>
        </div>
        <div class="col-12 col-md-12 mb-3">
            <input type="text" class="form-control" placeholder="Ingresar paraclinicos a realizar" name="paraclinicos" required>
        </div>      
      <div class="col-12 mb-3">
        <input type="text" i class="form-control" placeholder="Observaciones" name="observaciones" required>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="col-sm-12 col-md-6 col-lg-4 ">
         <button class="btn btn-primary my-2 btn-block" type="submit" name="consulta_new_query"><strong>Guardar </strong></button>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-4 ">
         <button class="btn btn-danger my-2 btn-block" type="reset"><strong>Cancelar</strong></button>
      </div>
    </div>
</form>
      </div>
  </div>
			';
		}
	}
}


static public function pase_lista(){
	if (isset($_POST["disciplina"]) AND isset($_POST["searching"])) {
		$stmt=Conexion::conectar()->prepare("SELECT id_al, matricula_alumno, nombre_alumno, apellidos_alumno, cuatri_alumno, foto_alumno, genero_alumno, tipo_sangre  ,observ_alumno, disciplina_alum, carrera_alum, horas_alum FROM `alu_depor` WHERE  (nombre_alumno LIKE :query OR tipo_sangre LIKE :query OR matricula_alumno LIKE  :query) AND disciplina_alum LIKE :query2");

		$stmt->bindParam(":query", $_POST["searching"], PDO::PARAM_STR);
		$stmt->bindParam(":query2", $_POST["disciplina"], PDO::PARAM_STR);
		$stmt->execute();

		foreach ($stmt as $row => $item) {
			echo '
<div class="card mt-2 mb-3">
  <div class="card-header bg-info text-white">
      <strong> '.$item["nombre_alumno"].' '.$item["apellidos_alumno"].'  #'.$item["matricula_alumno"].'  - '.$item["disciplina_alum"].'  -  '.$item["carrera_alum"].'</strong>
    </div>
  <div class="card-body border">
    <div class="form-row"> 
         <div class="col-sm-12 col-md-6 col-lg-1  ">       
<button class="btn btn-outline-info btn-block btn-sm" data-toggle="modal" data-target="#modo'.$item["id_al"].'"><i class="fas fa-portrait fa-2x"></i></button>
         </div>
         <div class="col-sm-12 col-md-6 col-lg-3 mt-2 ">  
         <label for=""><h6><strong>GENERO: </strong>'.$item["genero_alumno"].'</h6></label>      
         </div>
        <div class="col-sm-12 col-md-6 col-lg-3  mt-2 ">
          <label for=""><h6><strong>CUATRIMESTRE: </strong>'.$item["cuatri_alumno"].'</h6></label>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-5 mb-1 ">
           <label for=""><strong>Observaciones: </strong>'.$item["observ_alumno"].'</label>
        </div>  
        <div class="col-md-12 col-lg-2 mb-1">
           <label for=""><h4><span class="badge badge-danger">HORAS: '.$item["horas_alum"].'</span></h4></label>
        </div>
        <div class="col-md-12 col-lg-10 mb-1">
           <button class="btn btn-block btn-sm btn-info" data-toggle="modal" data-target="#pase'.$item["id_al"].'"><strong>AGREGAR HORAS AL ALUMNO</strong></button>
        </div> 
    </div>
  </div>
</div>
</div>
</div>



<div class="modal fade" id="modo'.$item["id_al"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="alert">
    <div class="modal-content align-items-center">
      <div class="modal-body">
<img src="data:image/jpg;base64,'.base64_encode($item["foto_alumno"]).'" class="img-fluid">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="pase'.$item["id_al"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered modal-notify modal-info role="document" >
    <div class="modal-content">
    <div class="modal-header">
        <p class="heading lead"><H3 class="text-white">REGISTRO DE HORAS</H3></p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
     </div>
      <div class="modal-body">
<form method="post">
  <div class="form-row">
<div class="col-8">
    <input type="number" name="hours" class="form-control" placeholder="Introduce las horas con numeros " required>
       <input type="hidden" name="hours_before" value="'.$item["horas_alum"].'" class="form-control" required>
       <input type="hidden" name="id_al" value="'.$item["id_al"].'" class="form-control" required>
  </div>
<div class="col-4">
    <button class="btn btn-info btn-sm" type="submit" name="add_hours"><strong>AGREGAR HORAS</strong></button>
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

static public function receta_medica(){
	if (isset($_POST["fecha1_receta"]) AND $_POST["fecha2_receta"]) {
		$tabla2="consu_med";
		$tabla1="paci_med";

		$stmt=Conexion::conectar()->prepare("SELECT id_con, fecha_consulta, presion_arterial, temperatura_consulta, peso_consulta, sintomas, medicamento_receta, paraclinico_receta, curaciones, diagnostico, observ_consulta, medicamento_receta, paraclinico_receta, nombre_paciente, apellidos_paciente, carrera_paciente  FROM $tabla1 INNER JOIN $tabla2
		ON (id_paci=paci_med_id_paci) WHERE fecha_consulta BETWEEN :query_1 AND :query_2");


		$stmt->bindParam(":query_1", $_POST["fecha1_receta"], PDO::PARAM_STR);
		$stmt->bindParam(":query_2", $_POST["fecha2_receta"], PDO::PARAM_STR);
		$stmt->execute();
		foreach ($stmt as $row => $item) {
			echo '
<div class="card mt-3 mb-3 bordered">
  <div class="card-header btn-green text-white">
      <strong> RECETA MEDICA UTTECAM  </strong>
    </div>
  <div class="card-body border">
    <div class="form-row"> 
         <div class="col-sm-12 col-md-6 col-lg-3 mb-1 ">       
        <img src="img/logo.png" height="50px" width="170px" alt=""> 
         </div>
         <div class="col-sm-12 col-md-6 col-lg-2 mb-1 ">        
         </div>
        <div class="col-sm-12 col-md-6 col-lg-2 mb-1 ">
        </div>
        <div class="col-sm-12 col-md-6 col-lg-5 mb-2 ">
           <label for=""><h5>FECHA DE CONSULTA MEDICA: <strong>'.$item["fecha_consulta"].'</strong></h5></label>
        </div>
        <div class="col-12 mb-1  mt-4 ">
          <label for=""><strong></strong><h5>*Datos de la receta:</h5></label>
        </div>
         <div class="col-md-12 col-lg-4 mb-1 ">
           <label for=""><strong>Paciente: </strong>'.$item["nombre_paciente"].' '.$item["apellidos_paciente"].'</label>
        </div>
        <div class="col-md-12 col-lg-8 mb-1 ">
           <label for=""><strong>Diagnóstico: </strong>'.$item["diagnostico"].'</label>
        </div>
        <div class="col-12 mb-1 ">
           <label for=""><strong>Curaciones: </strong> '.$item["curaciones"].'</label>
        </div>
        <div class="col-12 mt-4 ">
          <label for=""><strong></strong><h5>*Medicamentos Y Paraclinicos</h5></label>
        </div>
      <div class="col-12 mb-1 ">
           <label for=""><strong>Medicamentos: </strong>'.$item["medicamento_receta"].'</label>
        </div>
        <div class="col-8 mt-4 ">
          <label for=""><strong>Paraclínicos:</strong><h5>'.$item["paraclinico_receta"].'</h5></label>
        </div>   
        <div class="col-4 mt-5 ">
          <label for=""><h5>Nombre y firma de quien receta</h5></label>
        </div>         
    </div>
  </div>
</div>
			';
			
		}
		
	}
}


}

$r = new Datos();  $r->consulta_alumno_deportes_modelo();
				   $r->consulta_docente_deportes();
				   $r->horas_cumplidas_alumno();
				   $r->permiso_alumno_seleccionado();
				   $r->inventario_deportes_existencia();
				   $r->query_eventos_deportes();
				   $r->query_iems_add();
				   $r->query_pacientes_medico();
				   $r->query_consultas_medicas();
				   $r->inventario_deportes_borrado();
				   $r->query_iems_pre();
				   $r->query_add_evento_iems();
				   $r->query_pre_registros_difu();
				   $r->query_ingresados_pre();
				   $r->inv_exist_difusion();
				   $r->inv_del_difu();
				   $r->ev_realizados_difusion();
				   $r->eventos_no_realizados_difusion();
				   $r->existencia_inventario_medico();
				   $r->del_medicamento_medico();
				   $r->dame_eventos_realizados_del_medico();
				   $r->no_party_medico();
				   $r->query_para_query_medica();
				   $r->pase_lista();
				   $r->receta_medica();
 ?>