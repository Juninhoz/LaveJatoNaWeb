<?php
    
    include "..\\PHP\\conexao_banco.php";
    require_once "funcoes_func.php";
    require_once "sessao_func.php";
    
    @$nome = $_GET['nome'];
    @$select = $_GET['busca'];
    $ativa = false;
    $ativando = false;
if($nome != ''){
    @$ativa = true;
}

if($select != ''){
    $ativando = true;
}
    
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
									<img class="func" src="..\_imagens\rel_cli.png"/>
									<h3>Relatorio de Clientes</h3>
									<hr class="primeira">
                                    
									<?php
                                    
if($ativa){
    mostrarUsuariosSelecionado($nome);
    echo "<a class='back' href=relatorio_clientes.php><span class='back'>Voltar</span></a>";
}
else if($ativando){
    mostrarUsuariosPorOrdenacao($select);
    echo "<a class='back' href=relatorio_clientes.php><span class='back'>Voltar</span></a>";
}
else{
                                    echo $nome;
                                    echo "<form action='relatorio_clientes.php' method='get'>";
                                    echo "<label class='research'>Pesquisar: </label><input class='research' type='text' name='nome' size='15'>";
                                    echo "<label class='research'>Ordenar Busca: </label>";
                                    echo "<select class='research' name='busca'>";
                                    echo "<option class='research' value='nome'>Nome</option><br>";
                                    echo "<option class='research' value='id'>Id</option><br>";
                                    echo "</select><br>";
                                    echo "<input class='env'type='submit' value='Enviar'>";    
                                    echo "</form>"; 

                                    //Chamada da funçao para exibir a lista de usuarios cadastrados.
                                    mostrarUsuarios();
    }
                                    ?>
										
								</div>
					<div id="op_serv">
					
					<nav id="menu_op" >
					<ul>
						<a href="pagina_funcionario.php"><li >Pagina inicial - Funcionario</li></a>
						<a href="relatorio_clientes.php"><li style="background-color: #66FF33">Relatorio de clientes</li></a>
						<a href="gerenciar_pedidos.php"><li>Gerenciar Pedidos</li></a>
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