<?php 

class enlacesPaginas{

	static public function enlaces_modelo($enlaces_model){
		if($enlaces_model == "admin" || $enlaces_model == "deportes" || $enlaces_model == "difusion" || $enlaces_model == "login" || $enlaces_model== "medico" || $enlaces_model== "lista"  || $enlaces_model== "eventos_difusion" || $enlaces_model== "inventario_deportes" || $enlaces_model== "inventario_difusion" || $enlaces_model== "inventario_medico"|| $enlaces_model== "reporte_consultas" || $enlaces_model== "reporte_ingresos" || $enlaces_model== "print_permiso" || $enlaces_model== "print_constancia" || $enlaces_model== "print_pacientes" || $enlaces_model== "receta_medico"){

			$modulo = "vista/modulos/".$enlaces_model.".php";

		}
		else if($enlaces_model=="index"){
			$modulo="vista/modulos/login.php";
		}


		else if($enlaces_model=="error_ingreso_medico"){
			$modulo="vista/modulos/login.php";
		}

		else if($enlaces_model=="si_desbloqueo_godinez"){
			$modulo="vista/modulos/admin.php";
		}
		else if($enlaces_model=="no_desbloqueo_godinez"){
			$modulo="vista/modulos/admin.php";
		}

		else if($enlaces_model=="error_ingreso_deportes"){
			$modulo="vista/modulos/login.php";
		}
		else if($enlaces_model=="error_ingreso_difusion"){
			$modulo="vista/modulos/login.php";
		}
		else if($enlaces_model=="error_pase_lista"){
			$modulo="vista/modulos/login.php";
		}
		else if($enlaces_model=="error_admin"){
			$modulo="vista/modulos/login.php";
		}
		else if($enlaces_model=="intentos_superados_admin"){
			$modulo="vista/modulos/login.php";
		}

		else if($enlaces_model=="ban_ban"){
			$modulo="vista/modulos/login.php";
		}
		else if($enlaces_model=="duplucate_alumno"){
			$modulo="vista/modulos/deporte.php";
		}
		else if($enlaces_model=="intentos_superados"){
			$modulo="vista/modulos/login.php";
		}



		else if($enlaces_model=="ok_iems"){
			$modulo="vista/modulos/difusion.php";
		}

		else if($enlaces_model=="no_iems"){
			$modulo="vista/modulos/difusion.php";
		}
		else if($enlaces_model=="ok_art_difusion"){
			$modulo="vista/modulos/difusion.php";
		}
		else if($enlaces_model=="no_art_difusion"){
			$modulo="vista/modulos/difusion.php";
		}
		else if($enlaces_model=="ok_pre-registro"){
			$modulo="vista/modulos/difusion.php";
		}
		else if($enlaces_model=="no_pre-registro"){
			$modulo="vista/modulos/difusion.php";
		}
		else if($enlaces_model=="ok_programa_evento"){
			$modulo="vista/modulos/difusion.php";
		}
		else if($enlaces_model=="no_programa_evento"){
			$modulo="vista/modulos/difusion.php";
		}
		else if($enlaces_model=="ok_update_iems"){
			$modulo="vista/modulos/difusion.php";
		}
		else if($enlaces_model=="no_update_iems"){
			$modulo="vista/modulos/difusion.php";
		}

		else if($enlaces_model=="ok_confirm_ingreso"){
			$modulo="vista/modulos/difusion.php";
		}
		else if($enlaces_model=="no_confirm_ingreso"){
			$modulo="vista/modulos/difusion.php";
		}
		else if($enlaces_model=="ok_more_item"){
			$modulo="vista/modulos/difusion.php";
		}
		else if($enlaces_model=="no_more_item"){
			$modulo="vista/modulos/difusion.php";
		}
		else if($enlaces_model=="ok_del_item_dif"){
			$modulo="vista/modulos/difusion.php";
		}
		else if($enlaces_model=="no_del_item_dif"){
			$modulo="vista/modulos/difusion.php";
		}
		else if($enlaces_model=="ok_no_realizado_difusion"){
			$modulo="vista/modulos/difusion.php";
		}
		else if($enlaces_model=="no_no_realizado_difusion"){
			$modulo="vista/modulos/difusion.php";
		}
		else if($enlaces_model=="okconfirmed_evento_difusion"){
			$modulo="vista/modulos/difusion.php";
		}
		else if($enlaces_model=="noconfirmed_evento_difusion"){
			$modulo="vista/modulos/difusion.php";
		}
		else if($enlaces_model=="ok_registro_docente"){
			$modulo="vista/modulos/deportes.php";
		}
		else if($enlaces_model=="no_registro_docente"){
			$modulo="vista/modulos/deportes.php";
		}
		else if($enlaces_model=="ok_alumno_registrado"){
			$modulo="vista/modulos/deportes.php";
		}
		else if($enlaces_model=="no_alumno_registrado"){
			$modulo="vista/modulos/deportes.php";
		}
		else if($enlaces_model=="ok_evento_deportes"){
			$modulo="vista/modulos/deportes.php";
		}
		else if($enlaces_model=="no_evento_deportes"){
			$modulo="vista/modulos/deportes.php";
		}
		else if($enlaces_model=="ok_disciplina"){
			$modulo="vista/modulos/deportes.php";
		}
		else if($enlaces_model=="no_disciplina"){
			$modulo="vista/modulos/deportes.php";
		}
		else if($enlaces_model=="ok_item_deportes"){
			$modulo="vista/modulos/deportes.php";
		}
		else if($enlaces_model=="no_item_deportes"){
			$modulo="vista/modulos/deportes.php";
		}
		else if($enlaces_model=="ok_confirmed_seleccion"){
			$modulo="vista/modulos/deportes.php";
		}
		else if($enlaces_model=="no_confirmed_seleccion"){
			$modulo="vista/modulos/deportes.php";
		}
		else if($enlaces_model=="ok_update_alumno"){
			$modulo="vista/modulos/deportes.php";
		}
		else if($enlaces_model=="no_update_alumno"){
			$modulo="vista/modulos/deportes.php";
		}
		else if($enlaces_model=="ok_update_count_item"){
			$modulo="vista/modulos/deportes.php";
		}
		else if($enlaces_model=="no_update_count_item"){
			$modulo="vista/modulos/deportes.php";
		}
		else if($enlaces_model=="ok_deleted_item_deportes"){
			$modulo="vista/modulos/deportes.php";
		}
		else if($enlaces_model=="no_deleted_item_deportes"){
			$modulo="vista/modulos/deportes.php";
		}
		else if($enlaces_model=="ok_new_item"){
			$modulo="vista/modulos/medico.php";
		}
		else if($enlaces_model=="no_new_item"){
			$modulo="vista/modulos/medico.php";
		}
		else if($enlaces_model=="ok_new_paciente"){
			$modulo="vista/modulos/medico.php";
		}
		else if($enlaces_model=="no_new_paciente"){
			$modulo="vista/modulos/medico.php";
		}

		else if($enlaces_model=="ok_nuevo_evento"){
			$modulo="vista/modulos/medico.php";
		}
		else if($enlaces_model=="no_nuevo_evento"){
			$modulo="vista/modulos/medico.php";
		}
		else if($enlaces_model=="ok_consulta_medica"){
			$modulo="vista/modulos/medico.php";
		}
		else if($enlaces_model=="no_consulta_medica"){
			$modulo="vista/modulos/medico.php";
		}
		else if($enlaces_model=="ok_update_paciente"){
			$modulo="vista/modulos/medico.php";
		}
		else if($enlaces_model=="no_update_paciente"){
			$modulo="vista/modulos/medico.php";
		}

		else if($enlaces_model=="ok_mas_medicamentos"){
			$modulo="vista/modulos/medico.php";
		}
		else if($enlaces_model=="no_mas_medicamentos"){
			$modulo="vista/modulos/medico.php";
		}
		else if($enlaces_model=="ok_menos_medicamentos"){
			$modulo="vista/modulos/medico.php";
		}
		else if($enlaces_model=="no_menos_medicamentos"){
			$modulo="vista/modulos/medico.php";
		}

		else if($enlaces_model=="ok_unrealizado_eventoXD"){
			$modulo="vista/modulos/medico.php";
		}
		else if($enlaces_model=="no_unrealizado_eventoXD"){
			$modulo="vista/modulos/medico.php";
		}

		else if($enlaces_model=="ok_evento_madeXDD"){
			$modulo="vista/modulos/medico.php";
		}
		else if($enlaces_model=="no_evento_madeXDD"){
			$modulo="vista/modulos/medico.php";
		}
		else if($enlaces_model=="ok_godinez_add"){
			$modulo="vista/modulos/admin.php";
		}
		else if($enlaces_model=="no_godinez_add"){
			$modulo="vista/modulos/admin.php";
		}
		else if($enlaces_model=="ok_update_godinez"){
			$modulo="vista/modulos/admin.php";
		}
		else if($enlaces_model=="no_update_godinez"){
			$modulo="vista/modulos/admin.php";
		}
		else if($enlaces_model=="ok_delete_godinez"){
			$modulo="vista/modulos/admin.php";
		}
		else if($enlaces_model=="no_delete_godinez"){
			$modulo="vista/modulos/admin.php";
		}
		else if($enlaces_model=="ok_lista"){
			$modulo="vista/modulos/lista.php";
		}
		else if($enlaces_model=="no_lista"){
			$modulo="vista/modulos/lista.php";
		}
		else if($enlaces_model=="duplucate_iems"){
			$modulo="vista/modulos/difusion.php";
		}
		else if($enlaces_model=="duplicate_docente"){
			$modulo="vista/modulos/deportes.php";
		}
		else if($enlaces_model=="duplicate_alumno"){
			$modulo="vista/modulos/deportes.php";
		}
		else if($enlaces_model=="dupli_item_difusion"){
			$modulo="vista/modulos/difusion.php";
		}
		else if($enlaces_model=="ditem_medico"){
			$modulo="vista/modulos/medico.php";
		}
		else if($enlaces_model=="dupli_item_deportes"){
			$modulo="vista/modulos/deportes.php";
		}

		else if($enlaces_model=="dupli_dis_deportes"){
			$modulo="vista/modulos/deportes.php";
		}
		else if($enlaces_model=="duplicate_paciente"){
			$modulo="vista/modulos/medico.php";
		}
		else if($enlaces_model=="duplicate_trabajador"){
			$modulo="vista/modulos/admin.php";
		}



		else if($enlaces_model=="eso_no_es_una_imagen_¬¬"){
			$modulo="vista/modulos/difusion.php";
		}
		else if($enlaces_model=="sobre_peso_detected"){
			$modulo="vista/modulos/difusion.php";
		}
		else if($enlaces_model=="no_menos_cero_items_difusion"){
			$modulo="vista/modulos/difusion.php";
		}




		else if($enlaces_model=="no_es_una_imagen_¬¬"){
			$modulo="vista/modulos/deportes.php";
		}

		else if($enlaces_model=="sobre_peso_detectado"){
			$modulo="vista/modulos/deportes.php";
		}

		else if($enlaces_model=="no_menos_cero_items_deportes"){
			$modulo="vista/modulos/deportes.php";
		}



		else if($enlaces_model=="no_menos_cero_items_medico"){
			$modulo="vista/modulos/medico.php";
		}




		else{
			$modulo="vista/modulos/login.php";
		}





		return $modulo;

	}
}


 ?>