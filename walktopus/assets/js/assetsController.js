/* Javascript Controller */
var longitude = "";
var latitude  = "";
var address   = "";
var key = "AIzaSyByzJfq-0N0NPxqpUjIuBUArLg_REFmPak";

function geo_init(){
	if(getCookie('latitude') == '' || getCookie('longitude') == '' || getCookie('address') == ''){
		getGeoLocalizationFromBrowser();
	}
	else{
		console.log("ya hay información en las cookies", getCookie('latitude'), getCookie('longitude'), getCookie('address'));
	}
}


function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays*24*60*60*1000));
	var expires = "expires="+ d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i = 0; i <ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}

function getGeoLocalizationFromBrowser(){
	var result = "OK";
	if (navigator.geolocation){
		navigator.geolocation.getCurrentPosition(
			function(objPosition){
				console.log("Coordenadas del browser");
				
				latitude = objPosition.coords.latitude;
				longitude = objPosition.coords.longitude;
				
				if(getCookie("address") === ''){
					getAddressFromGoogle(latitude, longitude);
					console.log("Se obtuvo la dirección de Google");
				}

				setCookie("latitude", latitude, 1);
				setCookie("longitude", longitude, 1);
			},
			function(objPositionError){
				switch (objPositionError.code){
					case objPositionError.PERMISSION_DENIED:
					result = "{'error' : 'ser denied the request for Geolocation.'}";
					break;
					case objPositionError.POSITION_UNAVAILABLE:
					result = "{'error' : 'Location information is unavailable.'}";
					break;
					case objPositionError.TIMEOUT:
					result = "{'error' : 'The request to get user location timed out.'}";
					break;
					default:
					result = "{'error' : 'An unknown error occurred.'}";
				}
				
				latitude  = 19.4134306;
				longitude = -99.1679886;
				address   = "Insurgentes Sur, 318, Roma Norte, CDMX";

				setCookie("latitude", latitude, 1);
				setCookie("longitude", longitude, 1);
				setCookie("address", address, 1);
				console.log("Coordenadas por default");

				var location = document.getElementById("location");
				if (typeof location !== "undefined" && location !== null) {
					location.value = getCookie("address");
					location.focus();
				}
			},
			{
				maximumAge: 75000,
				timeout: 15000
			}
			);

}
else{
	result = "{'error', 'error_msg' : 'Geolocation is not supported by this browser.'}";
}
console.log(result);
}

function getLatLngFromGoogle(address){
	if(address !== ""){
		var uri = "https://maps.googleapis.com/maps/api/geocode/json";
		$.ajax({
			url: uri,
			type: 'get',
			dataType: 'json',
			async: false,
			data: {
				address: address,
				key: key
			},
		})
		.done(function(data) {
			if(data.status == 'OK'){
				var address = data.results[0].formatted_address;
				var lat = data.results[0].geometry.location.lat;
				var lng = data.results[0].geometry.location.lng;

				setCookie("address", address, 1);
				setCookie("latitude", lat, 1);
				setCookie("longitude", lng, 1);
			}
		})
		.fail(function() {
			return false;
		});
	}
}

function getAddressFromGoogle(lat, lng){
	var lat = parseFloat(lat);
	var lng = parseFloat(lng);

	if(lat !== "NaN" && lng !== "NaN"){
		var uri = "https://maps.googleapis.com/maps/api/geocode/json";

		$.ajax({
			url: uri,
			type: 'get',
			dataType: 'json',
			data: {
				latlng: lat+','+lng,
				key: key
			},
		})
		.done(function(data) {
			if(data.status == 'OK'){
				setCookie("address", data.results[0].formatted_address, 1);
				var location = document.getElementById("location");
				if (typeof location !== "undefined" && location !== null) {
					location.value = data.results[0].formatted_address;
				}
			}
			else{
				setCookie("address", "", 1);
			}
		})
		.fail(function() {
			setCookie("address", "", 1);
		});
	}
}

function getCategories(def){
	$.ajax({
		url: 'https://walktopus.com/WalktopusAPI_5/api/CategoriasDeCursos',
		type: 'GET',
		dataType: 'json',
		data: {Publicidad: 'yes'},
	})
	.done(function(data) {
		if(data && data !== 'undefined'){
			for (var i = 0; i < data.length; i++) {
				var act = (i==(def-1)) ? 'active' : '';
				var id_cat = data[i].IdCategoriaCurso;
				var name = data[i].DescripcionCategoria;
				var slug_cat = str2slug(name);

				$('#categories_list_a').append('<li class="'+act+'"><a class="element-tab tab-rated" data-name="'+slug_cat+'" data-id="'+id_cat+'" data-toggle="tab" href="#'+slug_cat+'">'+name+'</a></li>');
				$('#categories_list_b').append('<li><a class="element-tab tab-rated" data-name="'+slug_cat+'" data-id="'+id_cat+'" data-toggle="tab" href="#'+slug_cat+'">'+name+'</a></li>');
			};
		}
	});
}

function getTopRatedByCat(cat_id, cat_slug){
	$('#top-rated-elements').html('');

	$('<div/>', {
		id: cat_slug,
		"class": "tab-pane fade in active"
	}).appendTo('#top-rated-elements');

	$.ajax({
		url: 'https://walktopus.com/walktopusapi_17/api/Miembros',
		type: 'GET',
		dataType: 'json',
		data: {IdCategoria: cat_id},
		success: function(dataTopRated) {
			if( dataTopRated.length > 0){
				$('<div/>', {
					id: cat_slug+"-container",
					"class": "items_container"
				}).appendTo('#'+cat_slug);

				var c_id          = dataTopRated[0].CursoId;
				var c_nombre      = dataTopRated[0].CursoNombre;
				var c_slug        = str2slug(dataTopRated[0].CursoNombre);
				var c_descripcion = dataTopRated[0].CursoDescripcion;
				var c_tipo        = dataTopRated[0].IdTipoCurso;
				var c_tipo_txt    = (dataTopRated[0].IdTipoCurso == 1) ? 'Clase' : 'Curso';
				var c_precio      = formatNumber(dataTopRated[0].CursoPrecio, "$");
				var c_eval        = dataTopRated[0].IdNivelEvaluacionCurso;
				var c_ranking     = ranking(dataTopRated[0].IdNivelEvaluacionCurso);
				var p_id          = dataTopRated[0].MiembroId;
				var p_nombre      = dataTopRated[0].NombreCompleto;
				//var p_img         = dataTopRated[0].foto;
				var p_img         = "assets/images/professor-1.png";
				var p_cert        = dataTopRated[0].ProfesorCertificado;
				var p_cert_txt    = (dataTopRated[0].ProfesorCertificado == false) ? '' : '<i class="wt-walktopus"></i>';
				var c_url         = window.location.protocol+'//'+window.location.host+'/curso/'+c_id+'/'+c_slug;

				items_html = '<div class="item_carrousel">'+
								'<div class="item item_fucsia">'+
									'<div class="item_header">'+
										'<img src="'+p_img+'" alt="'+p_nombre+'">'+p_cert_txt+
									'</div>'+
									'<div class="item_body">'+
										'<h3 class="item_title"><a href="'+c_url+'">'+c_nombre+'</a></h3>'+
										'<h4>'+p_nombre+'</h4>'+
										'<p>'+c_descripcion+'</p>'+
									'</div>'+
									'<div class="item_footer">'+
										'<div class="item_rank">'+c_ranking+'</div>'+
										'<div class="item_fee">'+
											'<span class="item_type">'+c_tipo_txt+'</span>'+
											'<span class="item_price">'+c_precio+'</span>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>';
				items_html += '<div class="row"><div class="col-xs-12 text-center"><a href="/interes/?cId='+cat_id+'&cName='+cat_slug+'" class="btn-fucsia btn btn-large btn-more">VER MÁS CURSOS</a></div></div>';
				$('#'+cat_slug+"-container").html(items_html);
			}
			else{
				$('<div/>', {
					id: cat_slug+"-container",
					"class": "items_not_found"
				}).appendTo('#'+cat_slug);
				$('#'+cat_slug+"-container").html("<h1>No se encontraron resultados</h1>");
			}
		}
	});
}

function str2slug(str) {
	var rep = '-';
	str = str.toLowerCase().replace(/\s+/g, rep);
	var from = "àáäâèéëêìíïîòóöôùúüûñç";
	var to   = "aaaaeeeeiiiioooouuuunc";
	for (var i=0, l=from.length ; i<l ; i++) {
		str = str.replace(
			new RegExp(from.charAt(i), 'g'),
			to.charAt(i)
			);
	}
	str = str.replace(new RegExp('[^a-z0-9'+rep+']',"g"), '').replace(/-+/g, rep);
	return str;
}

function ranking(rank){
	var rtxt = "";
	for (var i = 0; i < 5; i++) {
		if(i < rank){
			rtxt +='<i class="wt-star"></i>';
		}
		else{
			rtxt +='<i class="wt-star2"></i>';
		}
	}
	return rtxt;
}

function formatNumber(n, currency) {
	var qty = parseFloat(n);
	return currency + " " + qty.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}


function getCursoNivel(n){
	switch(n){
		case '1': return "No aplica";
		case '2': return "Básico";
		case '3': return "Intermedio";
		case '4': return "Avanzado";
		default: return "Desconocido";
	}
}

function getTipoCurso(n){
	return (n == 1) ? 'Clase' : 'Curso';
}

function getFormatDate(date_string, format="D MMMM YY"){
	return moment(date_string).locale('es').format(format);
}
















































