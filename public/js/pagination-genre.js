
$(document).on('click','.pagination a', function(e){

	e.preventDefault();

	var li=$(this).parent();
	li.siblings().removeClass("active");
	li.addClass("active");

	var link=$(".pagination li:nth-child(2)");
	//link.addClass("Hola");
	link.empty();
	link.append('<a href="">1</a>');

	var page=$(this).attr('href').split('page=')[1];
	var route= "genero";

	$.ajax({
		url:route,
		data: {page:page},
		type:'GET',
		dataType: 'json',
		success: function(respuesta){
			
			$("#datos").empty();
			//$(".genres").html(data);

			$(respuesta).each(function(key,element){
				var per_page =Number(element.per_page );  
				var i=0;

				for(i=0; i<per_page  ;i++){
					$("#datos").append('<tr><td>'+element.data[i].genre+'</td><td><button value='+element.data[i].id+' OnClick="Mostrar(this);" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Editar</button>'+"&nbsp;"+'<button class="btn btn-danger"  value='+element.data[i].id+' OnClick="Eliminar(this);" >Eliminar</button></td></tr>');
				}
			});
		}
	});
});

