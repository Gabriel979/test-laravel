
$(document).ready(function(){
	Carga();
});


function Carga(){

	$("#datos").empty();

	var tablaDatos= $('#datos');
	var route= "genero"

	$.get(route, function(resp){
		$(resp).each(function(key,element){
			//var cp=element.current_page;
			var per_page=Number(element.per_page);  
			var i=0;

			for(i=0; i<per_page ;i++){
				tablaDatos.append('<tr><td>'+element.data[i].genre+'</td><td><button value='+element.data[i].id+' OnClick="Mostrar(this);" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Editar</button>'+"&nbsp;"+'<button class="btn btn-danger"  value='+element.data[i].id+' OnClick="Eliminar(this);" >Eliminar</button></td></tr>');
			}
		});
	});
}


function Mostrar(btn){
	var route='genero/'+btn.value+'/edit';

	$.get(route, function(res){
		$("#genre").val(res.genre);
		$("#id").val(res.id);
	});
}


$("#actualizar").click(function(){

	var value=$("#id").val();
	var dato= $("#genre").val();
	var route= "genero/"+value+"";
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

	var route= "genero/"+btn.value+"";
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




