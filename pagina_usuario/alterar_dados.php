<?php
    
    include "..\\PHP\\conexao_banco.php";
    require_once "sessao_usuario.php";
    require_once "funcoes_usuario.php";

    $id = $_SESSION['id'];

    @$alterar_nome = $_GET['novo_nome'];
    @$nova_senha = $_GET['nova_senha'];
    
    if(isset($alterar_nome) || isset($nova_senha)){

    alterarDados($id,$alterar_nome,$nova_senha);
    
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Projeto FPIN</title>
		<link rel="stylesheet" type="text/css" href="..\_css\login_usuario.css"/>
        <script type="text/javascript" src="js/alterar_dados.js">    
        </script>
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
								<img class="alterar" src="..\_imagens\change.png"/>
								<h3>Alterar Dados</h3>
								<hr class="primeira">
								
                            <form class="dois" action="alterar_dados.php" method="get">
				
        <label>Nome usuario:</label><input id="change_nome" type=text name="novo_nome" onchange="validaNome('change_nome');ativarEnvio();"/><img class="alter" src="" id="img00"><br>
        <label>Nova senha:</label><input id="change_password" type="password" name="nova_senha" onchange="validaSenha('change_password');ativarEnvio();"/><img class="alter" src="" id="img01"><br>
       <label>Confirmar nova senha:</label><input id="test_password" type="password" name="nova_senha2" onchange="confirmaSenha('test_password');ativarEnvio();"/><img class="alter" src="" id="img02"><br>
								<input id="subi" class="sub" type="submit" value="Alterar Dados" disabled="disabled"/>
								<input class="sub" type="reset" value="Cancelar" onclick="limparReg()"/>
				            </form>
				          </div>
								
					<div id="op_serv">
						
					<nav id="menu_op" >
					<ul>
						<a href="pagina_usuario.php"><li>Pagina inicial</li></a>
						<a href="solicitar_servico.html"><li>Solicitar Serviços</li></a>
						<a href="Acomp_pedidos.php"><li>Acompanhamento de Pedidos</li></a>
						<a href="op_pagamento.html"><li>Opçoes de Pagamento</li></a>
						<li style="background-color: #6699FF">Alterar Dados</li>
						
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