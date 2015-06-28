<?php

    include "..\\PHP\\conexao_banco.php";
    
    session_start();
    if(!isset($_SESSION['nome_usuario']) || !isset($_SESSION['senha_usuario'])){
        header("Location: ..\\index.html");
        exit;
    }else{
        $id = $_SESSION['id'];
    }
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
								<img class="imgacompanhamento" src="..\_imagens\acompanhamento.png"/>
								<h3>Acompanhamento de Pedidos</h3>
								<hr class="primeira">
								
                                <?php
                                  
                                $resultado = mysql_query("SELECT * FROM t_servico WHERE id_usuario = '$id'");
                                $linhas = mysql_num_rows($resultado);
                                $pagto;
                                
                                echo "<table style='Border: 1px solid;'>";
                                echo "<tr><th>Id usuario</th><th>Id pedido</th><th>Data</th><th>Valor</th><th>Pagamento</th><th>Status</th><tr>";
	                           
                    for($i = 0 ; $i < $linhas ; $i++)
	                       {
                                $registro = mysql_fetch_row($resultado);   
                                echo "<tr><td>$registro[0]</td>";
                                echo "<td> $registro[1] </td>";
                                echo "<td> $registro[2]</td>";
                                echo "<td> $registro[3] R$</td>";
                                echo "<td id='situacao'> $registro[4]</td>";
                        if($registro[5]=="Em analise"){
                                echo "<td id='cor'><img id='$i' src='js\\fail.png'></td>"; 
                        }else{
                            echo "<td id='cor'><img id='$i' src='js\\ok.png'></td>"; 
                        }
                           }
                                echo "</table>";   
                                ?>    
                                    <br><br>
                                    <h4>Legendas</h4>
                                    <img style="margin-left: 130px;"src="js/fail.png"/> Pedido em analise.
                                    <img src="js/ok.png"/> Pedido aceito.
								</div>
								
					<div id="op_serv">
						
					<nav id="menu_op" >
					<ul>
						<a href="pagina_usuario.php"><li>Pagina inicial</li></a>
						<a href="solicitar_servico.html"><li>Solicitar Serviços</li></a>
						<li style="background-color: #6699FF">Acompanhamento de Pedidos</li>
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