<?php

    include "..\\PHP\\conexao_banco.php";
    require_once "funcoes_func.php";
    require_once "sessao_func.php";
    
    

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Projeto FPIN</title>
		<link rel="stylesheet" type="text/css" href="..\_css\pag_funcionario.css"/>
	</head>
    <body>
		<div id="interface">    
			<header id="cabecalho">
				
				<nav id="menu">
					<h1>Menu Principal</h1>
					<ul>
						<li><a href="..\index.php">INÍCIO</a></li>
						<li><a href="..\lavejatonaweb\servicos.php">SERVIÇOS</a></li>
						<li><a href="..\lavejatonaweb\equipe.html">EQUIPE</a></li>
						<li><a href="..\lavejatonaweb\duvidas.html">DUVIDAS?</a></li> 							
					</ul>        
				</nav>
				<img class="icone" src="..\_imagens\laundry.png"/>
			</header>
			<hr class="linha">
			<section id="corpo">
				<div id="meio">
				
								<div id="info_usuario">
									<img class="pedi" src="..\_imagens\ped_acomp.png"/>
									<h3>Acompanhamento de Pedidos</h3>
									<hr class="primeira">
									
                                    <?php 
                                            
                                     consultaPedidos();
                                     
                                    
                                     
                                     ?>
									
								</div>
					<div id="op_serv">
					
					<nav id="menu_op" >
					<ul>
						<a href="pagina_funcionario.php"><li >Pagina inicial - Funcionario</li></a>
						<a href="relatorio_clientes.php"><li >Relatorio de clientes</li></a>
						<a href="gerenciar_pedidos.php"><li style="background-color: #66FF33">Gerenciar Pedidos</li></a>
					</ul>
					</nav>
					
					</div>
				
				</div>
			</section>
			
			<footer id="rodape">
			<hr class="linha">
				<p>Copyright © <span>Junior</span> | <span>Alexandre</span> | <span>Matteus</span> | <span>Marcelo</span> | FPIN</p> 
			</footer>
        </div>
    </body>
</html>