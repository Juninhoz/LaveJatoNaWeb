<?php

    include "..\\PHP\\conexao_banco.php";
    
    session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Projeto FPIN</title>
		<link rel="stylesheet" type="text/css" href="..\_css\estilo.css"/>
	</head>
    <body>
		<div id="interface">    
			<header id="cabecalho">
				
				<nav id="menu">
					<h1>Menu Principal</h1>
					<ul>
						<li><a href="..\index.php">INÍCIO</a></li>
						<li><a href="servicos.php">SERVIÇOS</a></li>
						<li><a href="equipe.html">EQUIPE</a></li>
						<li><a href="duvidas.html">DUVIDAS?</a></li>        
					</ul>        
				</nav>
				<img class="icone" src="..\_imagens\laundry.png"/>
			</header>
			<hr class="linha">
			<section id="corpo">
				
				<h2>Serviços</h2>
				<p>A <span><b>laveJatoNaWeb</b></span> disponibiliza serviços especializados em lavagem de roupas em geral com uma equipe qualificada para prestar o melhor serviço com o menor preço,buscamos e entregamos em domicilio. <b>Fone(82)9699-9455</b>.</p>
				<ul><br>
					<li>Lavar Roupas - R$3.00 por KG</li><br>
					<li>Passar Roupas - R$7.00 por KG</li><br>
					<li>Coletar Roupas - R$1.00 por KG</li><br>
					<li>Entregar Roupas - R$2.00 por KG</li>
				</ul>
			</section>
			<aside id="lateral">
				<div class="tabela_lado" name="cadastro">
					<?php
            
            if(!isset($_SESSION['nome_usuario'])){   
                    echo "<fieldset>
						<legend>Conectar-se</legend>";
						
						echo "<form action='PHP\login.php' method='POST' enctype='multipart/form-data'>";
							
						echo "<label><img src='..\\_imagens\\usuario.png'>Usuario:</img></label>";
						echo "<input type='text' name='nome' size='23'><br>";
						echo "<label class=senha><img src='..\\_imagens\\senha.png'>Senha:</img></label>";
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
                
                
                if($nome == 'Admin'){
                    echo "<br><a class='ir' href='..\\pagina_funcionario\\pagina_funcionario.php'><label class='ir_pag'>Pagina inicial</label></a><br>";
                }else{
                
                echo "<br><a class='ir' href='..\\pagina_usuario\\pagina_usuario.php'><label class='ir_pag'>Pagina inicial</label></a><br>";
                }
                    echo "<a href='..\\PHP\\logout.php'><label class='desconect'>Desconectar</label></a>";
                        
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