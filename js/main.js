//Inicializadores do Materialize
$(document).ready(function(){
    $('.modal').modal();
  });

$(document).ready(function(){
    $('.sidenav').sidenav();
  });

  $(document).ready(function(){
    $('.collapsible').collapsible();
  });



  //Ajax
function sair(){
		$.ajax({
		url:"salvarTema.php"
		})
	}

function mudarTema(){
	
	if ($("#tema").attr("href") == "css/light.css"){
		$("#tema").attr("href","css/dark.css");
	} else {
		$("#tema").attr("href","css/light.css");
	}
	
	//faz uma requisicao para a pagina salvarTema.php via ajax
	$.ajax({
		url:"salvarTema.php",
		data:{"css":$("#tema").attr("href")}
	});

}
