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
		<link rel="stylesheet" type="text/css" href="..\_css\pagamento.css"/>
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
						<li><a href="..lavejatonaweb\servicos.php">SERVIÇOS</a></li>
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
								<img class="imgpagamento" src="..\_imagens\pagamento.png"/>
								<h3>Opçoes de Pagamento</h3>
								<hr class="primeira">
                                    
                                <h4>Selecione uma forma de pagamento a seguir</h4>
								
                                <div id="op_cartao" style="border: 3px solid #6699FF">
								<img src="..\_imagens\pag_cartao.png"/>
								<div id="text" class="um"><p>Cartão de Credito</p></div>
								</div>
								
								<a class="teste" href="pagamento_boleto.html"><div id="op_boleto">
								<img src="..\_imagens\pag_boleto.png"/>
								<div id="text" class="um"><p>Boleto </p></div>
								</div></a>
								
								<div id="teste">
								<form action="..\PHP\pagamento.php" method="post" id="pgt_cartao" class="pgt_cartao" name="pgto_cartao">
								<br>
								<h5>Selecione o serviço a ser pago: </h5>
                                <select name="servicos">
                                <?php                                        
                                        $sql = mysql_query("SELECT id_pedido,valor FROM t_servico WHERE id_usuario = '$id' and status_pagamento = 'Pendente'");  
                                        
                                        $linhas = mysql_num_rows($sql);
                                        
                                        
                                    for($i = 0 ; $i < $linhas ; $i++){  
                                        $registro = mysql_fetch_row($sql);
                                        echo "<option value='$registro[0]'> id Pedido : " . $registro[0] . " " ." Valor : " . $registro[1] .  "</option><br>";
                                    }
	                                       
                                       echo "</select>";         
                                        ?>
                                <legend>Dados do cartão</legend><br>
                                    <label>Numero do Cartão:</label><input id="number_card" name="numero_cartao" type="text" size="25" maxlength="16" onchange="validaNumero('number_card');ativarBotao();"/><img id="valida_card" class="formu" src=""><br>
								<label>Titular do Cartão:</label><input id="dono_card" type="text" size="27" name="titular" onchange="validaNome('dono_card');ativarBotao();"/><img id="valida_noum" class="formu" src=""><br>
								
								<label>Data Validade:</label><input name="data_valid" id="date_valid" type="text" size="10" onchange="validaData('date_valid');ativarBotao();"/><img id="dati" class="formu" src=""><br>
								<label>Cod. Segurança:</label><input id="cod_seg" type="text" size="5" maxlength="3" name="cod_seguranca" onchange="validaSeg('cod_seg');ativarBotao();"/><img id="seg" class="formu" src=""><br>
								<input id="botao_princ" class="submit" type="submit" value="Enviar" disabled="disabled"/>
								<input class="submit" type="reset" value="Limpar" onclick="resetarTudo()"/><br>
                                </form>
								</div>
								
								
								</div>
								
					<div id="op_serv">
						
					<nav id="menu_op" >
					<ul>
						<a href="pagina_usuario.php"><li>Pagina inicial</li></a>
						<a href="solicitar_servico.html"><li>Solicitar Serviços</li></a>
						<a href="Acomp_pedidos.php"><li>Acompanhamento de Pedidos</li></a>
						<li style="background-color: #6699FF">Opçoes de Pagamento</li>
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