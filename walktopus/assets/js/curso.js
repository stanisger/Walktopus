var calendar_options = {
		locale: 'es',
		header: {
			left: 'prev',
			center: ',title',
			right: 'next'
		},
		footer: {
			left: '',
			center: 'month,agendaDay,listMonth',
			right: ''
		},
		navLinks: true,
		height: 500,
		editable: true,
		fixedWeekCount: false,
		eventLimit: true,
		eventClick: function(calEvent, jsEvent, view) {
			console.log(calEvent.id);
		}
	}

$(document).ready(function() {
	geo_init();

	//console.log(moment({hour:15, minute:10}))

	var curso_id = window.location.pathname.split('/')[2];
	getCoursebyId(curso_id);
});

function getCoursebyId(id_curso){
	$.ajax({
		url: 'https://walktopus.com/walktopusapi_18/api/Miembros/'+id_curso,
		type: 'GET',
		dataType: 'json',
		beforeSend: function(){
			$(".loader").show();
			$(".c_information").hide();
		},
		success: function(data){
			console.log(data);
			if(data.length > 0){
				$(".CursoNombre").html(data[0].CursoNombre);
				$(".CursoDescripcion").html(data[0].CursoDescripcion);
				$(".NombreCompleto").html(data[0].NombreCompleto);
				$(".resenia").html(data[0].resenia);
				$(".CursoCapacidad").html(data[0].CursoCapacidad);


				$(".CursoRequisitosTomarlo").html(data[0].CursoRequisitosTomarlo);
				$(".MaterialNecesario").html(data[0].MaterialNecesario);
				
				var CursoAdomicilio = "";
				if(data[0].CursoAdomicilio == false){
					CursoAdomicilio = data[0].CursoColonia+', '+data[0].CursoCiudad;
					$(".CursoAdomicilioDireccion").hide();
				}
				else
					CursoAdomicilio = 'A Domicilio';
				
				$(".CursoAdomicilio").html(CursoAdomicilio);
				
				$(".CursoNivel").html(getCursoNivel(data[0].CursoNivel));

				$(".IdNivelEvaluacionCurso").html(ranking(data[0].IdNivelEvaluacionCurso));
				$(".IdNivelEvaluacionProfesor").html(ranking(data[0].IdNivelEvaluacionProfesor));
				
				$(".CursoQueVoyAprender").html(data[0].CursoQueVoyAprender);
				
				$(".TipoDeCurso").html(getTipoCurso(data[0].TipoDeCurso));
				$(".CursoPrecio").html(formatNumber(data[0].CursoPrecio,"$"));

				$.ajax({
					url: 'https://walktopus.com/WalktopusAPI_39/api/AlumnosCurso',
					type: 'GET',
					dataType: 'json',
					data: {Curso: id_curso},
					success: function(dataComments){
						if(dataComments.length > 0){
							for (var i = 0; i < dataComments.length; i++) {
								var item = '<div class="comment_item">'+
												'<div class="row">'+
													'<div class="col-xs-12 col-sm-2 text-center">'+
														//'<img src="'+dataComments[i].Foto+'" alt="Professor">'+
													'</div>'+
													'<div class="col-xs-12 col-sm-10">'+
														'<div class="comment_title">'+
															'<h3>'+dataComments[i].NombreCompleto+'</h3>'+
															'<h4>'+getFormatDate(dataComments[i].FechaComentario)+'</h4>'+
														'</div>'+
														'<div class="comment_content">'+
															'<p>'+dataComments[i].Comentarios+'</p>'+
															'<div class="ranking">'+ranking(dataComments[i].IdNivelEvaluacionCurso)+'</div>'+
														'</div>'+
													'</div>'+
												'</div>'+
											'</div>';
								$(".comments").append(item);
							};
						}
						else{
							$(".comments").hide();
						}
					}
				});

				$.ajax({
					url: 'https://walktopus.pel/return-json.php',
					//url: 'https://walktopus.com/walktopusapi_34/api/Horarios/'+id_curso,
					type: 'GET',
					dataType: 'json',
					success: function(dataHorarios){
						if(dataHorarios.length > 0){
							console.log("Resultado: ",dataHorarios);
							var grupos = [];

							$.each(dataHorarios, function(index, val) {
								grupos[val.IdGrupo] = [];
								grupos[val.IdGrupo]['IdGrupo'] = val.IdGrupo;
								grupos[val.IdGrupo]['CursoFechaInicio'] = val.CursoFechaInicio;
								grupos[val.IdGrupo]['CursoFechaFin'] = val.CursoFechaFin;
								grupos[val.IdGrupo]['LugaresDisponibles'] = val.LugaresDisponibles;
								grupos[val.IdGrupo]['Horarios'] = [];
							});

							$.each(dataHorarios, function(index, val) {
								grupos[val.IdGrupo]['Horarios'][val.IdHorario] = {};
								
								var horasDe = val.HoraDe.split(":");
								fstart = moment(val.IdDiaCurso);
								fstart.add(horasDe[0], 'h');
								fstart.add(horasDe[1], 'm');

								var horasA = val.HoraA.split(":");
								fend = moment(val.IdDiaCurso);
								fend.add(horasA[0], 'h');
								fend.add(horasA[1], 'm');

								var dateString = getFormatDate(fend, "dddd ")+getFormatDate(fend, "LLL ")+val.HoraDe+" - "+val.HoraA;

								grupos[val.IdGrupo]['Horarios'][val.IdHorario]['id'] = val.IdHorario;
								grupos[val.IdGrupo]['Horarios'][val.IdHorario]['title'] = data[0].CursoNombre+' - Grupo '+val.IdGrupo;
								grupos[val.IdGrupo]['Horarios'][val.IdHorario]['start'] = fstart.format('YYYY-MM-DDTHH:mm');
								grupos[val.IdGrupo]['Horarios'][val.IdHorario]['end'] = fend.format('YYYY-MM-DDTHH:mm');
								grupos[val.IdGrupo]['Horarios'][val.IdHorario]['dateString'] = dateString;

							});

							$.each(grupos, function(index, val) {
								if(val !== undefined){
									var dates = [];
									$.each(val.Horarios, function(index_h, val_h) {
										if(val_h !== undefined){
											dates.push(val_h);
										}
									});

									var CursoFechaInicio = val.CursoFechaInicio;
									var CursoFechaFin = CursoFechaFin;


									$(".groups").append('<li>'+
										'<input type="radio" name="group" id="radio-grupo-'+val.IdGrupo+'" value="'+val.IdGrupo+'" class="css-checkbox" data-horarios=\''+JSON.stringify(dates)+'\' data-inicio="'+val.CursoFechaInicio+'" data-fin="'+val.CursoFechaFin+'" data-tipodecurso="'+data[0].IdTipoDeCurso+'" data-cursoadomicilio="'+data[0].CursoAdomicilio+'" data-capacidad="'+val.LugaresDisponibles+'" onchange="changeGroup(this);">'+
										'<label for="radio-grupo-'+val.IdGrupo+'" class="css-label">'+
											'GRUPO '+val.IdGrupo+
										'</label>'+
										'<span class="availability">'+val.LugaresDisponibles+' disponibles</span>'+
									'</li>');
								}
							});
						}
						else{
							$(".body").html("<h1>No hay horarios disponibles</h1>");
							$(".resume").hide();
						}
					}
				});

				//Get Comments
				$(".loader").hide();
				$(".c_information").show();
				
				var calendar = $('#calendar').fullCalendar(calendar_options);
			}
			else{
				$(".loader").show();
				$(".c_information").hide();
				$(".result-message").html('Ocurrió un problema, intenta más tarde');
			}
		}
	});
}

function changeGroup(element){
	if($(element).data('horarios').length > 0){
		//Borrar todos los eventos disponibles del calendario e incluir los nuevos horarios
		$('#calendar').fullCalendar( 'removeEvents' );
		$('#calendar').fullCalendar( 'addEventSource', $(element).data('horarios') );
		
		//Cambiar la información de fecha de inicio y fin del curso:
		$('.CursoFechaInicio').html( getFormatDate($(element).data('inicio'), 'LL') );
		$('.CursoFechaFin').html( getFormatDate($(element).data('fin'), 'LL') );

		//var horarios = JSON.parse($(element).data('horarios'));
		$('.selected-days').html('');
		$.each($(element).data('horarios'), function(index, val) {
			$('.selected-days').append('<li>'+val.dateString+'</li> ');
		});


		if( $(element).data('tipodecurso') == 2 ) {
			if( $(element).data('cursoadomicilio') == true ) {
				$('.notes').html('<p>Puedes invitar hasta '+data[0].CursoCapacidad+'</p>');
			}
			else{
				$('.notes').html('<p>Lugares:  <input type="number" name="lugares" value="1" min="1" max="'+$(element).data('capacidad')+'"></p>');
			}
		}

	}
}
