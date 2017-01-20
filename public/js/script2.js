
$(document).ready(function(){
	Carga();
});


function Carga(){

	var page=$("#current-page").val();
	var route= "genero";

	//alert("current-page de la funcion Carga:"+page);
	$.ajax({
		url:route,
		data: {page:page},
		type:'GET',
		dataType: 'json',
		success: function(respuesta){
			
			$("#datos").empty();
			//$(".genres").html(data);

			$(respuesta).each(function(key,element){
				var per_page =Number(element.to )-Number(element.from)+1;  
				var i=0;

				for(i=0; i<per_page  ;i++){
					$("#datos").append('<tr><td>'+element.data[i].genre+'</td><td><button value='+element.data[i].id+' OnClick="Mostrar(this);" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Editar</button>'+"&nbsp;"+'<button class="btn btn-danger"  value='+element.data[i].id+' OnClick="Eliminar(this);" >Eliminar</button></td></tr>');
				}

			});

		}
	});
}



/*
function Carga(){
//function Carga(pag){
	$("#datos").empty();

	//var page=pag;
	var tablaDatos= $('#datos');
	//var route= "genero?page="+pag;
	var route= "genero";

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
}*/


function Mostrar(btn){
	var route='genero/'+btn.value+'/edit';

	$.get(route, function(res){
		$("#genre").val(res.genre);
		$("#id").val(res.id);
	});
}


$("#actualizar").click(function(){

	//var page=$("#current-page").val();
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
			//Carga(page);
			//alert("success de funcion actualizar");
			$("#myModal").modal('toggle');
			$("#msj-success").fadeIn();
			Carga();
		}
	});
	
});


function Eliminar(btn){

	var route= "genero/"+btn.value+"";
	var token= $("#token").val();
	//var page=$(this).attr('href').split('page=')[1];

	$.ajax({
		url:route,
		headers:{'X-CSRF-TOKEN':token},
		type:'DELETE',
		dataType:'json',
		success: function(){
			$("#msj-del-success").fadeIn();
			//Carga(page);
			Carga();
		},
		error: function(){
			$("#msj-error").fadeIn();
			//Carga(page);
			Carga();
		}
	});

	

}




