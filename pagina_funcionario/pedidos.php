<?php

    include "..\\PHP\\conexao_banco.php";
    require_once "funcoes_func.php";
    require_once "sessao_func.php";

    $mensagens = queryMensagem();
    $pedidos =  queryServico();
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
									<img class="func" src="..\_imagens\func.png"/>
									<h3>Pagina do Funcionario!</h3>
									<hr class="primeira">
									<a href="pedidos.php" id="mensagi">
									<div id="div_pedid"  style="border: 3px solid green">
										<img class="msgg" src="..\_imagens\pedidos.png"/> 
										<div id="msg">
											<p style="color: green"><?php echo $pedidos;?> Pedidos </p>
										</div>
																	
                                        </div></a>
									<a href="mensagens.php" id="mensagi"><div id="div_msg">
										<img class="msgg" src="..\_imagens\msgg.png"/> 
										<div id="msg">
											<p> <?php echo $mensagens;?> mensagens</p>
										</div>
                                        </div></a>                                    
                                     
                                    <div id="notificaçao">
									
                                        
                                    <?php
                                    
                                    if($mensagens == 0){

                                    }else{
                                    echo "<form action='msg.php' method='post'>";                             
                                    echo "<table name='table_msg' class='tabela_msg'>";    
                                    echo "<tr><th>Nome</th><th>Email</th><th>Telefone</th><th>Assunto</th><th>Ler Mensagens</th><th>Apagar</th></tr>";
                                    for($i=0;$i<$linhas;$i++){
                                        $registro = mysql_fetch_row($sql);
                                        
                                        echo "<tr><td>" . $registro[0]. "</td>";
                                        echo "<td>" . $registro[1]. "</td>";
                                        echo "<td>" . $registro[2]. "</td>";
                                        echo "<td>" . $registro[3]. "</td>";
                                        echo "<td><input type='checkbox' name='mens' value='$i'/><input type='submit'/ value='Ler Mensagem'></td>"; 
                                        echo "<td><input type='checkbox' name='del' value='$i'/><input type='submit' value='Apagar'/></td><tr>";
                                    }
                                    echo "</table>";  
                                    echo "</form>";
                                    }
                                    ?>
                                            
									</div>	
                                    
								</div>
					<div id="op_serv">
					
					<nav id="menu_op" >
					<ul>
						<a href="pagina_funcionario.php"><li style="background-color: #66FF33">Pagina inicial - Funcionario</li></a>
						<a href="relatorio_clientes.php"><li>Relatorio de clientes</li></a>
						<a href="gerenciar_pedidos.html"><li>Gerenciar Pedidos</li></a>
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