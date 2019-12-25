$(document).ready(function(){
    $('.sidenav').sidenav();
  });

  
	function mudarTema(){
		
		if ($("#tema").attr("href") == "css/estilo.css"){
			$("#tema").attr("href","css/dark.css");
		} else {
			$("#tema").attr("href","css/estilo.css");
		}
		
		//faz uma requisicao para a pagina salvarTema.php via ajax
		$.ajax({
			url:"salvarTema.php",
			data:{"css":$("#tema").attr("href")}
		});
	
	}




	