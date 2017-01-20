//Para registrar un nuevo genero
$("#registro").click(function(e){

	e.preventDefault();


	var dato=$("#genre").val();
	var route= "../genero";
	var token=$("#token").val();

	$.ajax({
		url:route,
		headers:{'X-CSRF-TOKEN':token},
		type:'POST',
		dataType:'json',
		data:{genre:dato},
		success:function(){
			$("#msj-success").fadeIn();
		},
		error:function(msj){
			//$("#msj").html(msj.responseJSON.genre);
			$("#msj-error").html("Error al crear genero!");
			$("#msj-error").fadeIn();
		}
	});
});