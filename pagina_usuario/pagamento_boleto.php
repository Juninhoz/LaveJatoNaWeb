<?php
    
    include "..\\PHP\\conexao_banco.php";
    require_once "sessao_usuario.php";
    include "funcoes_usuario.php";

    $id = $_SESSION['id'];
    
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Projeto FPIN</title>
		<link rel="stylesheet" type="text/css" href="..\_css\pagamento.css"/>
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
								<img class="imgpagamento" src="..\_imagens\pagamento.png"/>
								<h3>Opçoes de Pagamento</h3>
								<hr class="primeira">
								<h4>Selecione uma forma de pagamento a seguir</h4>
								<a class="teste" href="pagamento_cartao.php"><div id="op_cartao">
								<img src="..\_imagens\pag_cartao.png"/>
								<div id="text" class="um"><p>Cartão de Credito</p></div>
								</div></a>
								
								<div id="op_boleto" style="border: 3px solid #6699FF">
								<img src="..\_imagens\pag_boleto.png"/>
								<div id="text" class="um"><p>Boleto</p></div>
								</div>
								
                                    
                                <form action="..\PHP\boletophp\boleto_bradesco.php" method="post" id="pgt_cartao" class="pgt_boleto" name="pgto_boleto">    
                                <br>
								<h5>Selecione o serviço a ser pago: </h5>
                                
                                <?php          
                                        $vetor = array();    
                                        mostrarValorDebito($id);       
                                       
                                       $vetor = nomeUsuarioEemail($id);
                                        echo "<input type='hidden' name='nome_usuario' value='$vetor[0]'>";
                                        echo "<input type='hidden' name='email_usuario' value='$vetor[1]'>";
                                ?>
                                   
                                <input class="pgtoboleto" type="submit" value="Gerar Boleto">    
                                
                                </form>    
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