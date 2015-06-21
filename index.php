<?php

    include "\\PHP\\conexao_banco.php";
    
    session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Projeto FPIN</title>
		<link rel="stylesheet" type="text/css" href="_css/estilo.css"/>
	</head>
    <body>
		<div id="interface">    
			<header id="cabecalho">
				
				<nav id="menu">
					<h1>Menu Principal</h1>
					<ul>
						<li><a href="index.php">INÍCIO</a></li>
						<li><a href="lavejatonaweb\servicos.php">SERVIÇOS</a></li>
						<li><a href="lavejatonaweb\equipe.html">EQUIPE</a></li>
						<li><a href="lavejatonaweb\duvidas.html">DUVIDAS?</a></li>        
					</ul>        
				</nav>
                
				<img class="icone" src="_imagens/laundry.png"/>
			</header>
			<hr class="linha">
			<section id="corpo">
				<h2>Bem Vindo Ao <span>LaveJatoNaWeb</span></h2>
				<p>Desenvolvido a 10 dias com a proposta de solucionar e simplificar a rotina do dia a dia, aliando qualidade e preço justo para todos os clientes.</p>
				<p>A <span><b>laveJatoNaWeb</b></span> disponibiliza de um acervo de maquinas de lavar de ultima geraçao interadas a um processo computadorizado que limpa a fibra das roupas com profundidade, sem danificalas, é uma novidade na rede,  outra exclusividade de nossos serviços é o atendimento personalizado com varias opções de serviço e preço;</p>
				<p>Para usufruir desses recursos basta cadastrar-se gratuitamente <span><a href="lavejatonaweb\cadastro.html"><b>clicando aqui</b></a></span> ou entrando em contato com nossa central de atendimento ao cliente atraves desse contato <b>(82) 9699-9455.</b></p>
				
			</section>
			<aside id="lateral">
				<div class="tabela_lado" name="cadastro">
					
                     <?php
            
            if(!isset($_SESSION['nome_usuario'])){   
                    echo "<fieldset>
						<legend>Conectar-se</legend>";
						
						echo "<form action='PHP\login.php' method='POST' enctype='multipart/form-data'>";
							
						echo "<label><img src='_imagens/usuario.png'>Usuario:</img></label>";
						echo "<input type='text' name='nome' size='23'><br>";
						echo "<label class=senha><img src='_imagens/senha.png'>Senha:</img></label>";
				        echo "<input class=senha type='password' name='senha' size='23'>";
							
							
				        echo "<button  type='submit' value='submit'>Conectar-se</button>";
						echo "<button  type='reset' value='reset'>Limpar</button>";
							
						echo "</form>        
						<br>
						<p>Nao possui cadastro?<b><a href='lavejatonaweb\cadastro.html'> Cadastre-se aqui!</a></b></p>
						<p>Esqueceu sua senha? <b>Recupere aqui!</b></p>
					</fieldset>";
            }
            else{
                 echo "<fieldset id='conec'>   
                        
                        <legend>Conectado:</legend>"; 
                
                $nome = $_SESSION['nome_usuario'];
                $nome = ucfirst(strtolower($nome));
                                                                       
                        
                echo "<label class='conecc'>Usuario:</label>" . "<label id='nome_conec' class='nome_conec'>" . $nome . "</label>"; 
                echo "<br><a class='ir' href='pagina_usuario\\pagina_usuario.php'><label class='ir_pag'>Pagina inicial</label></a><br>";
                echo "<a href='PHP\\logout.php'><label class='desconect'>Desconectar</label></a>";
                        
                echo  "</fieldset>";
                }
                        ?>
				</div>
				
			</aside>

			<footer id="rodape">
			<hr class="linha">
				<p>Copyright © <span>Junior</span> | <span>Alexandre</span> | <span>Matteus</span> | <span>Marcelo</span> | FPIN</p> 
			</footer>
        </div>
		
            </body>
</html>
