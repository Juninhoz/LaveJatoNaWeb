<?php
    
    include "..\\PHP\\conexao_banco.php";
    require_once "funcoes_func.php";

    @$indice = $_POST['mens'];
    @$opcao = $_POST['del'];
?>

<html>
	<head>
		<meta charset="UTF-8"/>
        <link href="..\_css\confirma.css" rel="stylesheet" type="text/css">
        <title>Mensagens</title>
	</head>
    <body>
		<div id="interface">    
			<header id="cabecalho">
				<img class="icone" src="..\_imagens\laundry.png"/>
			</header>
			<hr class="linha">
			<section id="corpo">
				<div id="meio">
								<div id="info_usuario">
									
									<?php
                                        if(isset($indice) || !(isset($opcao))){     
                                        consultaMensagem($indice);
                                        }
                                        else if(!isset($indice) || isset($opcao)){
                                        apagarMensagem($opcao);
                                        }
else{
    echo "Selecione uma opcao.";
}
                                    ?>
								</div>
				</div>
			</section>
			<aside id="lateral">
				
			</aside>
			<footer id="rodape">
			<hr class="linha">
				<p>Copyright © <span>Junior</span> | <span>Alexandre</span> | <span>Matteus</span> | <span>Marcelo</span> | FPIN</p> 
			</footer>
        </div>
    </body>
</html>
    