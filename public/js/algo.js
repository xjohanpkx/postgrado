$(document).ready(function(){
			// for Insert Ajax

//scroll infinito de noticias resumidas
			var _token=$('input[name="_token"]').val();
			load_data('',_token);
			function load_data(id="",_token){
				ruta="http://127.0.0.1:8000/loadata";

				$.ajax({
					url:ruta,
					method:"post",
					data:{id:id,_token:_token},
					success:function(data){

						$("#load_more_boton").remove();
						$("#post_data").append(data);
					}


				})
			}
			//scroll infinito de noticias resumidas
$(document).on('click',"#load_more_boton",function(){
var id=$(this).data("id");
$('load_more_boton').html('<b>loading...</b>');

	load_data(id, _token);
});
});

//reload tesis

function reload(val){

var query=val.name;
if(query=="tesisr"){
$('#contenidoa').load('mirar');
$('#Searchnoti').attr("id","Searchtesis");
$('#buscarnoti').attr("id","buscartesis");

}else{
	$('#contenidoa').load('mirarnot');
	$('#buscartesis').attr("id","buscarnoti");
	$('#Searchtesis').attr("id","Searchnoti");
}


}




//modal para actualizar tesis

function mostrar(btn){
var route="http://127.0.0.1:8000/tesis/"+btn.name+"/edit";

$.get(route,function(res){
$("#documentoup").empty();
$("#tituloup").val(res.titulo);
$("#autoresup").val(res.autores);
$("#fechaup").val(res.fecha);
$("#gradoup").val(res.grado);
$("#Institutoup").val(res.instituto);
$("#resumenup").val(res.resumen);
$("#idup").val(res.id);

});
}

//VER Información DETALLADA TESIS
function infotesi(btn){

var route="http://127.0.0.1:8000/tesis/"+btn.name+"";

$.get(route,function(res){

$("#tituloview").empty();
$("#autoresview").empty();
$("#fechaview").empty();
$("#instiutoview").empty();
$("#resumenview").empty();
$("#gradoview").empty();

$("#tituloview").append(res.titulo);
$("#autoresview").append(res.autores);
$("#fechaview").append(res.fecha);
$("#instiutoview").append(res.instituto);
$("#resumenview").append(res.resumen);
$("#gradoview").append(res.grado);
});

}

//cargar la consulta general de tesis
			function carga(){

				$('#contenidoa').load('mirar');

			}

//insertar una nueva tesis
		$(document).on('click','#insertarb',function(e){
				e.preventDefault();
			alertify.confirm("Esta seguro de registrar una nueva Tesis?",function(){
				var doc= new FormData($("#insertar")[0]);
				var token=$('input[name=_token]').val(),
	remove_url ='/tesis';
		var fileexiste = $('#documento')[0].files.length;
		if(fileexiste>0){
				$.ajax({
					type:'post',
					cache:false,
					contentType: false,
					processData: false,
					headers:{'X-CSRF-TOKEN':token},
					url: remove_url,
					data:doc,
					success:function(data){
						if($.isEmptyObject(data.error)){
								$("#createmodal").modal('toggle');
											$('#contenidoa').load('mirar');
											$("#insertar").trigger('reset');
			                alertify.success(data.success);
			                }else{
							                	alertify.error(data.error);
																			                }
					},
				});
			}else{
				alertify.error("El Documento es obligatorio");
			}
});
			});



						$(document).on('click','#modificar',function(e){
	//modifica el documento solamente de la tesis
						  e.preventDefault();

					alertify.confirm("Esta seguro de Modificar esta Tesis?",function(){

						  var doc= new FormData($("#modificarb")[0]);
						  doc.append('_method','put');
						  var value = $("#idup").val();
						  var dato = $("#tituloup").val();
						  var route = "http://127.0.0.1:8000/file/"+value+"";
							var route2 = "http://127.0.0.1:8000/tesis/"+value+"";
						  var token = $("#token").val();
							var files = $('#documentoup')[0].files.length;

					if(files>0){

						//ajax solo documento con FormData
								$.ajax({
									url: route,
									headers: {'X-CSRF-TOKEN': token},
									type: 'POST',
									cache:false,
									contentType: false,
									processData: false,
									dataType: 'json',
									data:doc,
									success: function(data){
										if($.isEmptyObject(data.error)){
													}else{
															alertify.error(data.error);

															}
									}
								});
//para enviar el form de la actualizacion tesis
								//ajax string del fomrulrio actualizar
									var file = $('#documentoup')[0].files[0].name
									var carpeta="img/repositorio/"+file+"";
var pdffile=file.slice(-3);
	if(pdffile=="pdf"){
												$.ajax({
													url: route2,
													headers: {'X-CSRF-TOKEN': token},
													type: 'PUT',
													dataType: 'json',
													data: {
														'titulo':$('input[name=tituloup').val(),
														'autores':$('input[name=autoresup').val(),
														'instituto':$('input[name=institutoup').val(),
														'fecha':$('input[name=fechaup').val(),
														'resumen':$('#resumenup').val(),
														'grado':$('#gradoup').val(),
														'documento':file,
														'directorio':carpeta,
													},
													success: function(data){
														if($.isEmptyObject(data.error)){
																$("#updatemodal").modal('toggle');
																			carga();
																			alertify.success(data.success);
																			}else{

																			alertify.error(data.error);
																			}

													}
												});
}
							}else{

//ajax actualizacion de formulario string sin documento
											$.ajax({
												url: route2,
												headers: {'X-CSRF-TOKEN': token},
												type: 'PUT',
												dataType: 'json',
												data: {
													'titulo':$('input[name=tituloup').val(),
													'autores':$('input[name=autoresup').val(),
													'instituto':$('input[name=institutoup').val(),
													'fecha':$('input[name=fechaup').val(),
													'resumen':$('#resumenup').val(),
													'grado':$('#gradoup').val(),
													'documentopv':"nulo",
												},
												success: function(data){
													if($.isEmptyObject(data.error)){
															$("#updatemodal").modal('toggle');
																		carga();
																		alertify.success(data.success);
																		}else{

																		alertify.error(data.error);
																		}

												}
											});
							}
});
					});


//eliminar una tesis


$(document).on('click','#eliminartes',function(){
	var id=$(this).attr('name');
	alertify.confirm("Esta seguro de Eliminar esta Tesis?",function(){
	var route = "http://127.0.0.1:8000/tesis/"+id+"";
	var token = $("#token2").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'DELETE',
		dataType: 'json',
		success: function(data){
carga();
alertify.success(data.success);
		}
	});
});
});




$(document).on('click','.pagination a',function(e){

e.preventDefault();
var mira=$(this).attr('href').split('page=')[0];
var page=$(this).attr('href').split('page=')[1];
var ruta="http://127.0.0.1:8000/tesis";
var ruta2="http://127.0.0.1:8000/indexb";
var ruta59="http://127.0.0.1:8000/info";

if(mira=="http://127.0.0.1:8000/buscar/tesis?"|mira=="http://127.0.0.1:8000/indexb?"){
	var valor=$("#Searchtesis").val();
	var cate=$("#contecat").val()
var ruta3="http://127.0.0.1:8000/indexb?query="+valor+"";

	$.ajax({
	url:ruta3,
	data:{page:page,cate:cate},
	type:'GET',
	dataType:'json',
	success:function(data){
		$('#contenidoa').html(data);

	}

	});

}else if(mira=="http://127.0.0.1:8000/buscar/tesis/categoria?"){
var valor=$("#Searchtesis").val();
var cate=$("#contecat").val()
var ruta4="http://127.0.0.1:8000/indexb?query="+valor+"";
$.ajax({
url:ruta4,
data:{page:page,cate:cate},
type:'GET',
dataType:'json',
success:function(data){
	$('#contenidoa').html(data);

}

});


}else if(mira=="http://127.0.0.1:8000/mirarnot?"|mira=="http://127.0.0.1:8000/noticia?"){
		var rutae="http://127.0.0.1:8000/noticia"
	$.ajax({
	url:rutae,
	data:{page:page},
	type:'GET',
	dataType:'json',
	success:function(data){
		$('#contenidoa').html(data);
	}

	});


}else if(mira=="http://127.0.0.1:8000/buscar/noticia?"|mira=="http://127.0.0.1:8000/indexbnoti?"){
		var valor=$("#Searchnoti").val();
	var rutae2="http://127.0.0.1:8000/indexbnoti?query="+valor+"";

		$.ajax({
		url:rutae2,
		data:{page:page},
		type:'GET',
		dataType:'json',
		success:function(data){
	$('#contenidonot').html(data);
$('#contenidoa').html(data);
		}

		});

	}else if(mira=="http://127.0.0.1:8000/?"){
id=0;
id=id++;
var ruta70="http://127.0.0.1:8000/";
var siguiente=$("#con").attr("id","con"+id+"");
			$.ajax({
			url:ruta59,
			data:{page:page},
			type:'GET',
			dataType:'json',
			success:function(data){

		siguiente.html(data);
			}

			});

		}else if(mira=="http://127.0.0.1:8000/info?"){
			var valor=$("#Searchtesisinicio").val();
		var fun=$("#guardanoti").val();
			$.ajax({
			url:ruta59,
			data:{page:page,fun:fun},
			type:'GET',
			dataType:'json',
			success:function(data){
		$('#contenidoinicio').html(data);
			}

			});

		}else if(mira=="http://127.0.0.1:8000/buscar/noticia/inicio?"|mira=="http://127.0.0.1:8000/indexc?"){
				var valor=$("#Searchnotiinicio").val();
			var ruta61="http://127.0.0.1:8000/indexc?query="+valor+"";

				$.ajax({
				url:ruta61,
				data:{page:page},
				type:'GET',
				dataType:'json',
				success:function(data){
			$('#contenidoinicio').html(data);
				}

				});

			}else if(mira=="http://127.0.0.1:8000/buscar/tesis/inicio?"|mira=="http://127.0.0.1:8000/indexbinicio?"){
				var valor=$("#Searchtesisinicio").val();
				var cate=$("#catecontenedor").val()
			var ruta60="http://127.0.0.1:8000/indexbinicio?query="+valor+"";

				$.ajax({
				url:ruta60,
				data:{page:page,cate:cate},
				type:'GET',
				dataType:'json',
				success:function(data){
			$('#contenidoinicio').html(data);
				}

				});

			}else if(mira=="http://127.0.0.1:8000/buscar/tesis/inicio/categoria?"){
			var valor=$("#Searchtesisinicio").val();
			var cate=$("#catecontenedor").val()
			var ruta44="http://127.0.0.1:8000/indexbinicio?query="+valor+"";

			$.ajax({
			url:ruta44,
			data:{page:page,cate:cate},
			type:'GET',
			dataType:'json',
			success:function(data){
				$('#contenidoinicio').html(data);

			}

			});


			}else{
	$.ajax({
	url:ruta,
	data:{page:page},
	type:'GET',
	dataType:'json',
	success:function(data){
		$('#contenidoa').html(data);

	}

	});
}
});

//buscar por campo titulo
function buscar_continuos(query = '')
 { var cate=$("#contecat").val();
	 var url="/buscar/tesis";
  $.ajax({
   url:url,
   method:'GET',
   data:{query:query,cate:cate},
   dataType:'json',
   success:function(data)
   {
		 		 if(data.table_data=="none"){
			 alertify.error("No se encontro la busqueda");
		 }else{
    $('#contenidoa').html(data.table_data);
	}}
  })
 }
//buscar por campo titulo
 $(document).on('click', '#buscartesis', function(e){
	 e.preventDefault();
  var query = $("#Searchtesis").val();
if(query==""){

carga();
}else{
  buscar_continuos(query);

} });

//buscar por link de categoria
function categoriabus (val){
var query=val.name;
$("#contecat").val(query);

if(query=="maestria"){
$("#maestriabus").css("color","green");
$("#doctoradobus").css("color","black");
$("#Searchtesis").val("");

buscar_categoria(query);

}else if(query=="doctorado"){
$("#doctoradobus").css("color","green");
$("#maestriabus").css("color","black");

$("#Searchtesis").val("");

buscar_categoria(query);

}else if(query=="todo"){
$("#doctoradobus").css("color","black");
$("#maestriabus").css("color","black");
$("#Searchtesis").val("");
$("#tesisreload").click();

}



}
function buscar_categoria(query = '')
 {

	 var url="/buscar/tesis/categoria";
  $.ajax({
   url:url,
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('#contenidoa').html(data.table_data);
   }
  })
 }



//NOTICIAS///



//cargar la consulta general de Noticias
			function carganot(){

				$('#contenidonot').load('mirarnot');


			}




//mostar preview de imagen



 $(function() {
  $('#notifileup').change(function(e) {
      addImage(e);
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;

      if (!file.type.match(imageType))
       return;

      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     }

     function fileOnload(e) {
      var result=e.target.result;
      $('#subidon').attr("src",result);
     }
    });




		//insertar una nueva noticia

				$(document).on('click','#insertarnoti',function(e){
						e.preventDefault();
					alertify.confirm("Esta seguro de registrar una nueva noticia?",function(){
						var doc= new FormData($("#insertnoti")[0]);
						var token=$('input[name=_token]').val(),
			remove_url ='/noticia';
						$.ajax({
							type:'post',
							cache:false,
							contentType: false,
							processData: false,
							headers:{'X-CSRF-TOKEN':token},
							url: remove_url,
							data:doc,
							success:function(data){
								if($.isEmptyObject(data.error)){
												$("#cerrar_ac").click();
													$('#contenidonot').load('mirarnot');
														$("#insertnoti").trigger('reset');
														$('#contenidoa').load('mirarnot');
					                alertify.success(data.success);
					                }else{
									                	alertify.error(data.error);
																					                }
							},
						});

		});
					});


					//modal para actualizar tesis

					function mostrarnoti(btn){
					var route="http://127.0.0.1:8000/noticia/"+btn.name+"/edit";

					$.get(route,function(res){

					$("#tituloupnoti").val(res.titulonoti);
					$("#autorupnoti").val(res.autor);
					$("#fechaupnoti").val(res.fechanoti);
					$("#textoupnoti").val(res.texto);
					$("#idupnoti").val(res.id);
					$('#subidonupnoti').attr("src",res.directorio);
					})

					}

//preview imagen actualizar
										 $(function() {
										  $('#imagenup').change(function(e) {
										      addImage(e);
										     });

										     function addImage(e){
										      var file = e.target.files[0],
										      imageType = /image.*/;

										      if (!file.type.match(imageType))
										       return;

										      var reader = new FileReader();
										      reader.onload = fileOnload;
										      reader.readAsDataURL(file);
										     }

										     function fileOnload(e) {
										      var result=e.target.result;
										      $('#subidonupnoti').attr("src",result);
										     }
										    });

					//modificar una nueva noticia

											$(document).on('click','#modifinoti',function(e){
						//modifica el documento solamente de la tesis
											  e.preventDefault();

										alertify.confirm("Esta seguro de Modificar esta Noticia?",function(){

											  var doc= new FormData($("#modifinotib")[0]);
											  doc.append('_method','put');
											  var value = $("#idupnoti").val();
											  var dato = $("#tituloupnoti").val();
											  var route = "http://127.0.0.1:8000/filenoti/"+value+"";
												var route2 = "http://127.0.0.1:8000/noticia/"+value+"";
											  var token = $("#token5").val();
												var files = $('#imagenup')[0].files.length


										if(files>0){

											//ajax solo imagen con FormData
													$.ajax({
														url: route,
														headers: {'X-CSRF-TOKEN': token},
														type: 'POST',
														cache:false,
														contentType: false,
														processData: false,
														dataType: 'json',
														data:doc,
														success: function(data){
															if($.isEmptyObject(data.error)){
																		}else{
																				alertify.error(data.error);

																				}
														}
													});
					//para enviar el form de la actualizacion tesis
													//ajax string del fomrulrio actualizar
														var file = $('#imagenup')[0].files[0].name
														var carpeta="img/noticias/"+file+"";
					var pdffile=file.slice(-3);

						if(pdffile=="jpg"|pdffile=="peg"|pdffile=="png"){
																	$.ajax({
																		url: route2,
																		headers: {'X-CSRF-TOKEN': token},
																		type: 'PUT',
																		dataType: 'json',
																		data: {
																			'titulonoti':$('input[name=tituloupnoti').val(),
																			'autor':$('input[name=autor').val(),
																			'fechanoti':$('input[name=fechaupnoti').val(),
																			'texto':$('#textoupnoti').val(),
																			'imagen':file,
																			'directorio':carpeta,
																		},
																		success: function(data){
																			if($.isEmptyObject(data.error)){
																					$("#updatemodalnoti").modal('toggle');
																								carganot();
																									$('#contenidoa').load('mirarnot');
																								$("#imagenup").empty();
																								alertify.success(data.success);
																								}else{

																								alertify.error(data.error);
																								}

																		}
																	});
					}
												}else{

					//ajax actualizacion de formulario string sin documento
																$.ajax({
																	url: route2,
																	headers: {'X-CSRF-TOKEN': token},
																	type: 'PUT',
																	dataType: 'json',
																	data: {
																		'titulonoti':$('input[name=tituloupnoti').val(),
																		'autor':$('input[name=autor').val(),
																		'fechanoti':$('input[name=fechaupnoti').val(),
																		'texto':$('#textoupnoti').val(),
																		'imagenpv':"nada",
																	},
																	success: function(data){
																		if($.isEmptyObject(data.error)){
																				$("#updatemodalnoti").modal('toggle');
																							carganot();
																							$('#contenidoa').load('mirarnot');
																							alertify.success(data.success);
																							}else{

																							alertify.error(data.error);
																							}

																	}
																});
												}
					});
										});




//ELIMINAR NOTICIAS

					$(document).on('click','#eliminarnoti',function(){
						var id=$(this).attr('name');
						alertify.confirm("Esta seguro de Eliminar esta Noticia?",function(){
						var route = "/noticia/"+id+"";
						var token = $("#token2").val();

						$.ajax({
							url: route,
							headers: {'X-CSRF-TOKEN': token},
							type: 'DELETE',
							dataType: 'json',
							success: function(data){
					carganot();
					$('#contenidoa').load('mirarnot');
					alertify.success(data.success);
							}
						});
					});
					});

//buscar una noticia campo noticia
					function buscar_continuosnoti(query = '')
					 {
						 var url="/buscar/noticia";
					  $.ajax({
					   url:url,
					   method:'GET',
					   data:{query:query},
					   dataType:'json',
					   success:function(data)
					   {
							 		 if(data.table_data=="none"){
								 alertify.error("No se encontro la busqueda");
							 }else{
					    $('#contenidonot').html(data.table_data);
							$('#contenidoa').html(data.table_data);
						}}
					  })
					 }

					 $(document).on('click', '#buscarnoti', function(e){
						 e.preventDefault();
					  var query = $("#Searchnoti").val();
					if(query==""){
						$('#contenidoa').load('mirarnot');
					carganoti();
					}else{
					  buscar_continuosnoti(query);

					} });

//paginacion

			$(document).on('click','.pagination a',function(e){

					e.preventDefault();
					var mira=$(this).attr('href').split('page=')[0];
					var page=$(this).attr('href').split('page=')[1];
					var ruta="http://127.0.0.1:8000/noticia";
					var ruta2="http://127.0.0.1:8000/indexbnoti";
						//paginacion de una busqueda realizada
					if(mira=="http://127.0.0.1:8000/buscar/noticia?"|mira=="http://127.0.0.1:8000/indexbnoti?"){
						var valor=$("#Searchnoti").val();
					var ruta3="http://127.0.0.1:8000/indexbnoti?query="+valor+"";

						$.ajax({
						url:ruta3,
						data:{page:page},
						type:'GET',
						dataType:'json',
						success:function(data){
					$('#contenidonot').html(data);

						}

						});

					}else if(mira=="http://127.0.0.1:8000/buscar/noticia/categoria?"){
					var valor=$("#gradoview").text();

					var ruta4="http://127.0.0.1:8000/indexbnoti?query="+valor+"";
					$.ajax({
					url:ruta4,
					data:{page:page},
					type:'GET',
					dataType:'json',
					success:function(data){
						$('#contenidonot').html(data);

					}

					});


				}else{
						$.ajax({
						url:ruta,
						data:{page:page},
						type:'GET',
						dataType:'json',
						success:function(data){
							$('#contenidonot').html(data);

						}

						});
					}
					});


//funciones del index o vista publica

	$(document).on('click','#postgrado',function(){
ruta="/info"
var fun="mision";

		$.ajax({
		url:ruta,
		data:{fun:fun},
		type:'GET',
		dataType:'json',
		success:function(data){
				$("#contenedora").html(data);
				console.log(data);
		}

		});

	});
	$(document).on('click','#maestrias',function(){
ruta="/info"
var fun="maestrias";

		$.ajax({
		url:ruta,
		data:{fun:fun},
		type:'GET',
		dataType:'json',
		success:function(data){
				$("#contenedora").html(data);
				console.log(data);
		}

		});

	});

	$(document).on('click','#especia',function(){
ruta="/info"
var fun="especia";

		$.ajax({
		url:ruta,
		data:{fun:fun},
		type:'GET',
		dataType:'json',
		success:function(data){
				$("#contenedora").html(data);
				console.log(data);
		}

		});

	});

	$(document).on('click','#admision',function(){
ruta="/info"
var fun="admision";

		$.ajax({
		url:ruta,
		data:{fun:fun},
		type:'GET',
		dataType:'json',
		success:function(data){
				$("#contenedora").html(data);
				console.log(data);
		}

		});

	});

	$(document).on('click','#preinscripcion',function(){
ruta="/info"
var fun="preisncri";

		$.ajax({
		url:ruta,
		data:{fun:fun},
		type:'GET',
		dataType:'json',
		success:function(data){
				$("#contenedora").html(data);
				console.log(data);
		}

		});

	});

	$(document).on('click','#admitidos',function(){
ruta="/info"
var fun="admitidos";

		$.ajax({
		url:ruta,
		data:{fun:fun},
		type:'GET',
		dataType:'json',
		success:function(data){
				$("#contenedora").html(data);
				console.log(data);
		}

		});

	});

	$(document).on('click','#tesisinicio',function(){
ruta="/info"
var fun="tesis";

		$.ajax({
		url:ruta,
		data:{fun:fun},
		type:'GET',
		dataType:'json',
		success:function(data){
				$("#contenedora").html(data);
				$("#guardanoti").val("tesisload");

		}

		});

	});
///FINALIZA FUNCIONES DE CARGAS*************************************************************************************************************************

//buscar por campo titulo

function buscar_continuosinicio(query = '')
 {	var cate=$("#catecontenedor").val();
 if(cate==""){

	 cate="nulo";
 }
	 var url="/buscar/tesis/inicio";
  $.ajax({
   url:url,
   method:'GET',
   data:{query:query,cate:cate},
   dataType:'json',
   success:function(data)
   {
		 		 if(data.table_data=="none"){
			 alertify.error("No se encontro la busqueda");
		 }else{
    $('#contenidoinicio').html(data.table_data);
	}}
  })
 }

	//buscar por campo titulo
	 $(document).on('click', '#buscartesisinicio', function(e){
		 e.preventDefault();
	  var query = $("#Searchtesisinicio").val();

	if(query==""){
$("#tesisinicio").click();

	}else{
	  buscar_continuosinicio(query);

	} });

	//buscar por link de categoria
	function categoriabusinicio (val){
	var query=val.name;
	$("#catecontenedor").val(query);
	if(query=="maestria"){
$("#maestriabusinicio").css("color","green");
$("#doctoradobusinicio").css("color","black");
$("#Searchtesisinicio").val("");
	buscar_categoriainicio(query);

}else if(query=="doctorado"){
	$("#doctoradobusinicio").css("color","green");
$("#maestriabusinicio").css("color","black");

$("#Searchtesisinicio").val("");
	buscar_categoriainicio(query);

}else if(query=="todos"){
$("#doctoradobusinicio").css("color","black");
$("#maestriabusinicio").css("color","black");
$("#Searchtesisinicio").val("");
$("#tesisinicio").click();
}
}
	function buscar_categoriainicio(query = '')
	 {
		 var url="/buscar/tesis/inicio/categoria";
	  $.ajax({
	   url:url,
	   method:'GET',
	   data:{query:query},
	   dataType:'json',
	   success:function(data)
	   {
	    $('#contenidoinicio').html(data.table_data);
	   }
	  })
	 }

//mostrar informacion detalla de las tesis
	 function infotesiinicio(btn){

	 var route="http://127.0.0.1:8000/inicio/"+btn.name+"";

	 $.get(route,function(res){

	 $("#tituloview").empty();
	 $("#autoresview").empty();
	 $("#fechaview").empty();
	 $("#instiutoview").empty();
	 $("#resumenview").empty();
	 $("#gradoview").empty();

	 $("#tituloview").append(res.titulo);
	 $("#autoresview").append(res.autores);
	 $("#fechaview").append(res.fecha);
	 $("#instiutoview").append(res.instituto);
	 $("#resumenview").append(res.resumen);
	 $("#gradoview").append(res.grado);
	 });

	 }

	 $(document).on('click','#noticiasinicio',function(){
 ruta="/info"
 var fun="noticias";
 		$.ajax({
 		url:ruta,
 		data:{fun:fun},
 		type:'GET',
 		dataType:'json',
 		success:function(data){
	 				$("#contenedora").html(data);
$("#guardanoti").val("noticiasload");
 		}

 		});

 	});




	//buscar por campo titulo

	function buscar_continuosnotiinicio(query = '')
	 {
		 var url="/buscar/noticia/inicio";
	  $.ajax({
	   url:url,
	   method:'GET',
	   data:{query:query},
	   dataType:'json',
	   success:function(data)
	   {
			 		 if(data.table_data=="none"){
				 alertify.error("No se encontro la busqueda");
			 }else{
	    $('#contenidoinicio').html(data.table_data);
		}}
	  })
	 }

		//buscar por campo titulo
		 $(document).on('click', '#buscarnotiinicio', function(e){
			 e.preventDefault();
		  var query = $("#Searchnotiinicio").val();

		if(query==""){
	$("#noticiasinicio").click();

		}else{
		  buscar_continuosnotiinicio(query);

		} });

//leer mas las noticias
$(document).on('click', '#morenoticia', function(e){
	//e.preventDefault();
	var id=$(this).data("id");
	ruta="/buscar/noticia/"+id+"";


			$.ajax({
			url:ruta,
			data:{},
			type:'GET',
			dataType:'json',
			success:function(data){
					$("#contenedora").html(data);

			}

			});



 });
