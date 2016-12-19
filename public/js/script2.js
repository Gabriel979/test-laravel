
$(document).ready(function(){
	Carga();
});


function Carga(){

	$("#datos").empty();

	var tablaDatos= $('#datos');
	var route= "http://localhost/test-laravel/public/generos"

	$.get(route, function(res){
		$(res).each(function(key,value){
			tablaDatos.append('<tr><td>'+value.genre+'</td><td><button value='+value.id+' OnClick="Mostrar(this);" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Editar</button>'+"&nbsp;"+'<button class="btn btn-danger"  value='+value.id+' OnClick="Eliminar(this);" >Eliminar</button></td></tr>');
		});
	});
}


function Mostrar(btn){
	var route='http://localhost/test-laravel/public/genero/'+btn.value+'/edit';

	$.get(route, function(res){
		$("#genre").val(res.genre);
		$("#id").val(res.id);
	});
}


$("#actualizar").click(function(){

	var value=$("#id").val();
	var dato= $("#genre").val();
	var route= "http://localhost/test-laravel/public/genero/"+value+"";
	var token= $("#token").val();

	$.ajax({
		url:route,
		headers:{'X-CSRF-TOKEN':token},
		type:'PUT',
		dataType:'json',
		data: {genre:dato},
		success: function(){
			Carga();
			$("#myModal").modal('toggle');
			$("#msj-success").fadeIn();

		}
	});
});


function Eliminar(btn){

	var route= "http://localhost/test-laravel/public/genero/"+btn.value+"";
	var token= $("#token").val();

	$.ajax({
		url:route,
		headers:{'X-CSRF-TOKEN':token},
		type:'DELETE',
		dataType:'json',
		success: function(){
			Carga();
			$("#msj-success").fadeIn();

		}
	});

}




