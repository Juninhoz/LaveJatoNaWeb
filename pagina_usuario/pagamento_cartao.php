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
		<link rel="stylesheet" type="text/css" href="..\_css\pagamento.css"/>
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
								<img class="imgpagamento" src="..\_imagens\pagamento.png"/>
								<h3>Opçoes de Pagamento</h3>
								<hr class="primeira">
                                    
                                <h4>Selecione uma forma de pagamento a seguir</h4>
								
                                <div id="op_cartao" style="border: 3px solid #6699FF">
								<img src="..\_imagens\pag_cartao.png"/>
								<div id="text" class="um"><p>Cartão de Credito</p></div>
								</div>
								
								<a class="teste" href="pagamento_boleto.php"><div id="op_boleto">
								<img src="..\_imagens\pag_boleto.png"/>
								<div id="text" class="um"><p>Boleto </p></div>
								</div></a>
								
								<div id="teste">
								<form action="..\PHP\pagamento.php" method="post" id="pgt_cartao" class="pgt_cartao" name="pgto_cartao">
								<br>
								<h5>Selecione o serviço a ser pago: </h5>
                                
                                <?php                                        
                                        mostrarUsuariosDebitos($id);       
                                
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