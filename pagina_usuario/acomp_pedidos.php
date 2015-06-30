<?php

    include "..\\PHP\\conexao_banco.php";
    require_once "sessao_usuario.php";
    require_once "funcoes_usuario.php";

    $id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Projeto FPIN</title>
		<link rel="stylesheet" type="text/css" href="..\_css\login_usuario.css"/>
        <script type="text/javascript" src="js/js.js">
        </script>
	</head>
    <body>
		<div id="interface">    
			<?php
                include "header.php";
            ?>             
			<hr class="linha">
			<section id="corpo">
				<div id="meio">
								<div id="info_usuario">
								<img class="imgacompanhamento" src="..\_imagens\acompanhamento.png"/>
								<h3>Acompanhamento de Pedidos</h3>
								<hr class="primeira">
								
                                <?php
                                  mostrarPedidoUsuario($id);
                                ?>    
                                    <br><br>
                                    <h4>Legendas</h4>
                                    <img style="margin-left: 100px;"src="js/analise.png"/> Pedido em analise.
                                    <img src="js/fail.png"/> Pedido Rejeitado.
                                    <img src="js/ok.png"/> Pedido aceito.
								</div>
								
					<div id="op_serv">
						
					<nav id="menu_op" >
					<ul>
						<a href="pagina_usuario.php"><li>Pagina inicial</li></a>
						<a href="solicitar_servico.html"><li>Solicitar Serviços</li></a>
						<li style="background-color: #6699FF">Acompanhamento de Pedidos</li>
						<a href="op_pagamento.html"><li>Opçoes de Pagamento</li></a>
						<a href="alterar_dados.php"><li>Alterar Dados</li></a>
						
					</ul>
					</nav>
					
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