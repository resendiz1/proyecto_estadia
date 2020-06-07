//------------------------CONSULTAR LOS MORROS POR DISCIPLINA SEGUN EL PROFEEE--------------------------------------
$(document).ready(function(){
	$('#id_prof').on('mousemove', function(){
		var id_prof = $('#id_prof').val()
		console.log(id_prof);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {id_prof:id_prof},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#pase_lista').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})


//------------------------CONSULTAR IEMS AGREGADOS POR NOMBRE--------------------------------------

$(document).ready(function(){
	$('#iems_query').on('keyup', function(){
		var iems_query = $('#iems_query').val()
		console.log(iems_query);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {iems_query:iems_query},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#r_query_iems').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})


//------------------------CONSULTANDO A LOS DOCENTES ¬¬  --------------------------------------

$(document).ready(function(){
	$('#trabajador').on('keyup', function(){
		var trabajador = $('#trabajador').val()
		console.log(trabajador);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {trabajador:trabajador},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#datos_trabajador').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})


$(document).ready(function(){
	$('#consulta').on('keyup', function(){
		var consulta = $('#consulta').val()
		//console.log(consulta);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {consulta:consulta},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="" width=>')
			}
		})
		.done(function(resultado){
		$('#result').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})

//------------------------LAS HORAS CUMPLIDAS ¬¬  --------------------------------------

$(document).ready(function(){
	$('#horas_cumplidas').on('keyup', function(){
		var horas_cumplidas = $('#horas_cumplidas').val()
		console.log(horas_cumplidas);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {horas_cumplidas:horas_cumplidas},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#datos_horas').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})



//------------------------LOS PERMISOS --------------------------------------

$(document).ready(function(){
	$('#query_permiso').on('keyup', function(){
		var query_permiso = $('#query_permiso').val()
		console.log(query_permiso);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {query_permiso:query_permiso},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#query_result').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})


//------------------------INVENTARIO DE ACT. D. Y C. --------------------------------------

$(document).ready(function(){
	$('#disciplina_inv').on('change', function(){
		var disciplina_inv = $('#disciplina_inv').val()
		console.log(disciplina_inv);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {disciplina_inv:disciplina_inv},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#result_invent_deportes_alta').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})


$(document).ready(function(){
	$('#disciplina_inv').on('change', function(){
		var del_disciplina_inv = $('#disciplina_inv').val()
		console.log(del_disciplina_inv);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {del_disciplina_inv:del_disciplina_inv},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#r_inv_del_dep').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})



//------------------------EVENTOS  DE ACT. D. Y C. --------------------------------------

$(document).ready(function(){
	$('#fecha1_evento_deportes'),$('#fecha2_evento_deportes').on('change',  function(){
		var fecha1 = $('#fecha1_evento_deportes').val()
		var fecha2 = $("#fecha2_evento_deportes").val()
		
		console.log(fecha1,fecha2);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {fecha1:fecha1,fecha2:fecha2},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#result_event_deportes').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})



//------------------------PACIENTES POR FECHA MEDICO --------------------------------------
$(document).ready(function(){
	$('#fecha1_pacientes'),$('#fecha2_pacientes').on('change',  function(){
		var fecha1_pacientes = $('#fecha1_pacientes').val()
		var fecha2_pacientes= $('#fecha2_pacientes').val()
		
		console.log(fecha1_pacientes,fecha2_pacientes);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {fecha1_pacientes:fecha1_pacientes,fecha2_pacientes:fecha2_pacientes},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#res_pac').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})


//------------------------CONSULTAS MEDICAS POR FECHA MEDICO --------------------------------------
$(document).ready(function(){
	$('#fecha1_con'),$('#fecha2_con').on('change',  function(){
		var fecha1_con = $('#fecha1_con').val()
		var fecha2_con= $('#fecha2_con').val()
		
		console.log(fecha1_con,fecha2_con);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {fecha1_con:fecha1_con,fecha2_con:fecha2_con},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#r_con_medica').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})



//------------------------CONSULTA DE PRE-REGISTROS POR FECHA POR FECHA MEDICO --------------------------------------
$(document).ready(function(){
	$('#fecha1_pre'),$('#fecha2_pre').on('change',  function(){
		var fecha1_pre = $('#fecha1_pre').val()
		var fecha2_pre= $('#fecha2_pre').val()
		
		console.log(fecha1_pre,fecha2_pre);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {fecha1_pre:fecha1_pre,fecha2_pre:fecha2_pre},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#r_pre_difu').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})


//------------------------CONSULTA DE LOS INGRESOS POR PRE-REGISTRO POR FECHA POR FECHA MEDICO --------------------------------------
$(document).ready(function(){
	$('#fecha1_pre'),$('#fecha2_pre').on('change',  function(){
		var fecha1_pres = $('#fecha1_pre').val()
		var fecha2_pres= $('#fecha2_pre').val()
		
		console.log(fecha1_pres,fecha2_pres);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {fecha1_pres:fecha1_pres,fecha2_pres:fecha2_pres},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#r_ingresos').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})




//------------------------CONSULTA DE LOS ARTICULOS DE INVENTARIO DE DIFUSION --------------------------------------
$(document).ready(function(){
	$('#date_1_difu'),$('#date_2_difu').on('change',  function(){
		var date_1_difu = $('#date_1_difu').val()
		var date_2_difu= $('#date_2_difu').val()
		
		console.log(date_1_difu,date_2_difu);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {date_1_difu:date_1_difu,date_2_difu:date_2_difu},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#r_inv_difu').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})

//------------------------CONSULTA DE LOS ARTICULOS ELIMINADOS  DEl INVENTARIO DE DIFUSION --------------------------------------
$(document).ready(function(){
	$('#date_1_difu'),$('#date_2_difu').on('change',  function(){
		var date_1_del = $('#date_1_difu').val()
		var date_2_del= $('#date_2_difu').val()
		
		console.log(date_1_del,date_2_del);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {date_1_del:date_1_del,date_2_del:date_2_del},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#del_inv_difu').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})

//------------------------CONSULTA DE LOS EVENTOS REALIZADOS DE DIFUSION --------------------------------------
$(document).ready(function(){
	$('#f_evsi'),$('#f_evsi_2').on('change',  function(){
		var f_evsi_1 = $('#f_evsi_1').val()
		var f_evsi_2 = $('#f_evsi_2').val()
		
		console.log(f_evsi_1,f_evsi_2);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {f_evsi_1:f_evsi_1,f_evsi_2:f_evsi_2},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#r_evsi_difu').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})

//------------------------CONSULTA DE LOS EVENTOS NO REALIZADOS DE DIFUSION --------------------------------------
$(document).ready(function(){
	$('#f_evsi_1'),$('#f_evsi_2').on('change',  function(){
		var f_evno_1 = $('#f_evsi_1').val()
		var f_evno_2 = $('#f_evsi_2').val()
		
		console.log(f_evno_1,f_evno_2);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {f_evno_1:f_evno_1,f_evno_2:f_evno_2},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#r_noeve').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})

//------------------------CONSULTA DEL INVENTARIO DEL MEDICO --------------------------------------
$(document).ready(function(){
	$('#inv_med_date1'),$('#inv_med_date2').on('change',  function(){
		var inv_med_date1 = $('#inv_med_date1').val()
		var inv_med_date2 = $('#inv_med_date2').val()
		
		console.log(inv_med_date1,inv_med_date2);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {inv_med_date1:inv_med_date1,inv_med_date2:inv_med_date2},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#ex_inv_med').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})


//------------------------CONSULTA DE LOSELIMINADOS DEL INVENTARIO DEL MEDICO --------------------------------------
$(document).ready(function(){
	$('#inv_med_date1'),$('#inv_med_date2').on('change',  function(){
		var del_med_date1 = $('#inv_med_date1').val()
		var del_med_date2 = $('#inv_med_date2').val()
		
		console.log(del_med_date1,del_med_date2);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {del_med_date1:del_med_date1,del_med_date2:del_med_date2},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#del_inv_med').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})

//------------------------CONSULTA DE LOSELIMINADOS DEL INVENTARIO DEL MEDICO --------------------------------------
$(document).ready(function(){
	$('#date_eve_m1'),$('#date_eve_m2').on('change',  function(){
		var date_eve_m1 = $('#date_eve_m1').val()
		var date_eve_m2 = $('#date_eve_m2').val()
		
		console.log(date_eve_m1,date_eve_m2);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {date_eve_m1:date_eve_m1,date_eve_m2:date_eve_m2},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#r_eventosm').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})


//------------------------CONSULTA DE LOSELIMINADOS DEL INVENTARIO DEL MEDICO --------------------------------------
$(document).ready(function(){
	$('#date_eve_m1'),$('#date_eve_m2').on('change',  function(){
		var d_no_eve_m1 = $('#date_eve_m1').val()
		var d_no_eve_m2 = $('#date_eve_m2').val()
		
		console.log(d_no_eve_m1,d_no_eve_m2);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {d_no_eve_m1:d_no_eve_m1,d_no_eve_m2:d_no_eve_m2},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#r_no_party').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})


$(document).ready(function(){
	$('#disciplina'),$('#searching').on('keyup',  function(){
		var disciplina = $('#disciplina').val()
		var searching = $('#searching').val()
		
		console.log(disciplina,searching);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {disciplina:disciplina,searching:searching},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#pase_lista').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})


$(document).ready(function(){
	$('#fecha1_receta'),$('#fecha2_receta').on('change',  function(){
		var fecha1_receta = $('#fecha1_receta').val()
		var fecha2_receta = $('#fecha2_receta').val()
		
		console.log(fecha1_receta,fecha2_receta);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {fecha1_receta:fecha1_receta,fecha2_receta:fecha2_receta},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#res_receta').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})









//------------------------CONSULTAR IEMS AGREGADOS POR NOMBRE PARA AGREGAR NUEVO PRE-REGISTRO--------------------------------------

$(document).ready(function(){
	$('#iems_pre').on('change',  function(){
		var iems_pre = $('#iems_pre').val()
		console.log(iems_pre);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {iems_pre:iems_pre},
			beforeSend: function(){
				$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#r_iems_pre').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})

//------------------------CONSULTAR IEMS AGREGADOS POR NOMBRE PARA AGREGAR NUEVO EVENTO--------------------------------------

$(document).ready(function(){
	$('#iems_event').on('change',  function(){
		var iems_event = $('#iems_event').val()
		console.log(iems_event);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {iems_event:iems_event},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#r_iems_ev').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})



//------------------------CONSULTAR INFORMACION DE PACIENTE PARA CONSULTA-------------------------------------

$(document).ready(function(){
	$('#query_medica_pac').on('keyup',  function(){
		var query_medica_pac = $('#query_medica_pac').val()
		console.log(query_medica_pac);
		$.ajax({
			type: 'POST',
			url: 'modelo/operaciones.php',
			dataType:'html',
			data: {query_medica_pac:query_medica_pac},
			beforeSend: function(){
				//$('#result').html('<img src="img/loading.gif" alt="">')
			}
		})
		.done(function(resultado){
		$('#query_consulta').html(resultado)
		})
		.fail(function(){
			alert('ERROR, VERIFICA LA CONEXIÓN A LA BD')
		})
	})
})



