<!DOCTYPE html>

<?php

    include "..\\PHP\\conexao_banco.php";
    
    session_start();
    if(!isset($_SESSION['nome_usuario']) || !isset($_SESSION['senha_usuario'])){
        header("Location: ..\\index.html");
        exit;
    }
?>

<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Projeto FPIN</title>
		<link rel="stylesheet" type="text/css" href="..\_css\login_usuario.css"/>
	</head>
    <body>
		<div id="interface">    
			<header id="cabecalho">
				
				<nav id="menu">
					<h1>Menu Principal</h1>
					<ul>
						<li><a href="..\index.html">INÍCIO</a></li>
						<li><a href="..\lavejatonaweb\servicos.html">SERVIÇOS</a></li>
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
									<img class="uusuario" src="..\_imagens\uusuario.png"/>
									<h3>Bem Vindo(a)! <?php echo $_SESSION['nome_usuario'];echo " <a class='sessao' href='..\\PHP\\logout.php'>Finalizar Sessão</a>"?></h3>
									<hr class="primeira">
									
									<div id="noticias_02">
									<h3>DESTAQUE</h3>
									<div id="destaque">
											<img class="destaque"src="..\_imagens\LJNW_app.png"/>
											<p>LaveJatoNaWeb app: baixe nosso aplicativo e acompanhe seus pedidos em qualquer lugar</p>
									</div>
									</div>
									<div id="noticias_01">
									<h3>ÚLTIMAS NOTICIAS</h3>
									
									<div id="noticias">
									<hr>
									<div id="not_1">
									<!--NOTICIA 1-->
									
									<h4>25 Abril</h4>
									<div id="not_2">
									<p>Estar com as 10 paginas prontas</p>
									</div>
									</div>
									<hr>
									<div id="not_1">
									<!--NOTICIA 2-->
									<h4>29 Abril</h4>
									<div id="not_2">
									<p>Entregar as 10 paginas</p>
									</div>
									
									</div>
									<hr>
									</div>
									</div>
								</div>
					<div id="op_serv">
					
					<nav id="menu_op" >
					<ul>
						<a href="pagina_usuario.php"><li style="background-color: #6699FF">Pagina inicial</li></a>
						<a href="solicitar_serviço.html"><li>Solicitar Serviços</li></a>
						<a href="Acomp_pedidos.php"><li>Acompanhamento de Pedidos</li></a>
						<a href="op_pagamento.html"><li>Opçoes de Pagamento</li></a>
						<a href="alterar_dados.html"><li>Alterar Dados</li></a>
						
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