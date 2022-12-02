
$(buscar_datos());

function buscar_datos(consulta){
	$.ajax({
		url:'ci_consulta_rapida_buscar.php',
		type: 'POST',
		data: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
		})
	.fail(function(){
		console.log("error");
	})
}

$(document).on('keyup', '#input_busqueda', function(){
    var valor = $(this).val();

    if (valor != "") {
    	buscar_datos(valor);
    }else{
    	buscar_datos();
    }
});
