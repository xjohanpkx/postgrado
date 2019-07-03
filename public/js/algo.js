$(document).ready(function(){
			// for Insert Ajax


});

//modal para actualizar tesis

function mostrar(btn){
var route="http://127.0.0.1:8000/tesis/"+btn.name+"/edit";

$.get(route,function(res){
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
	remove_url ='/tesis';
				$.ajax({
					type:'post',
					url: remove_url,
					data:{
						'_token':$('input[name=_token').val(),
						'titulo':$('input[name=titulo').val(),
            'autores':$('input[name=autores').val(),
            'instituto':$('input[name=instituto').val(),
            'fecha':$('input[name=fecha').val(),
            'resumen':$('#resumen').val(),
            'grado':$('#grado').val(),
					},
					success:function(data){
						//	window.location.reload();
						$("#cerrar_ac").click();
							$('#contenidoa').load('mirar');
					},
				});
			});

//para enviar el form de la actualizacion tesis
			$(document).on('click','#modificar',function(){

				var value = $("#idup").val();
				var dato = $("#tituloup").val();
				var route = "http://127.0.0.1:8000/tesis/"+value+"";
				var token = $("#token").val();

				$.ajax({
					url: route,
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
				},
					success: function(){
						carga();
						$("#updatemodal").modal('toggle');

					}
				});
			});


//eliminar una tesis


$(document).on('click','#eliminartes',function(){
	var id=$(this).attr('name');

	var route = "http://127.0.0.1:8000/tesis/"+id+"";
	var token = $("#token2").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'DELETE',
		dataType: 'json',
		success: function(){
carga();

		}
	});
});

$(document).on('click','.pagination a',function(e){

e.preventDefault();
var mira=$(this).attr('href').split('page=')[0];
var page=$(this).attr('href').split('page=')[1];
var ruta="http://127.0.0.1:8000/tesis";
var ruta2="http://127.0.0.1:8000/indexb";

if(mira=="http://127.0.0.1:8000/buscar/tesis?"|mira=="http://127.0.0.1:8000/indexb?"){
	var valor=$("#Searchtesis").val();
var ruta3="http://127.0.0.1:8000/indexb?query="+valor+"";
alert(page);
	$.ajax({
	url:ruta3,
	data:{page:page},
	type:'GET',
	dataType:'json',
	success:function(data){
		$('#contenidoa').html(data);

	}

	});

}else if(mira=="http://127.0.0.1:8000/buscar/tesis/categoria?"){
var valor=$("#gradoview").text();
alert(valor);
var ruta4="http://127.0.0.1:8000/indexb?query="+valor+"";
$.ajax({
url:ruta4,
data:{page:page},
type:'GET',
dataType:'json',
success:function(data){
	$('#contenidoa').html(data);

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

function buscar_continuos(query = '')
 {
	 var url="/buscar/tesis";
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

 $(document).on('click', '#buscartesis', function(e){
	 e.preventDefault();
  var query = $("#Searchtesis").val();
if(query==""){

carga();
}else{
  buscar_continuos(query);

} });

function categoriabus (val){
var query=val.name;
buscar_categoria(query);

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
