<title>Login</title>
<link rel="stylesheet" type="text/css" href="..\_css\confirma.css"/>

<?php
    
    include "conexao_banco.php";

    $nome_usuario = $_POST['nome'];
    $senha_usuario = $_POST['senha'];
    
    $resultado = mysql_query("SELECT * FROM T_USUARIOS WHERE nome_usuario = '$nome_usuario'");
    $id = mysql_query("SELECT cod_usuario FROM T_USUARIOS WHERE nome_usuario = '$nome_usuario'");
    
    @$identificador = mysql_result($id,0,"cod_usuario");

    $linhas = mysql_num_rows($resultado);
    
    if((empty($nome_usuario) || empty($senha_usuario)) || $linhas==0){
        
    echo "<html>
	<head>
		<meta charset='UTF-8'/>
	</head>
    <body>
		<div id='interface'>    
			<header id='cabecalho'>
				<img class='icone' src='..\\_imagens\\laundry.png'/>
			</header>
			<hr class='linha'>
			<section id='corpo'>
				<div id='meio'>
								<div id='info_usuario'>
									
									<div id='falha'> 
                                    
                                    <span class='falhaa'>Formulario em branco</span>
                                                                                        
                                    <img id='falhar' src='..\\_imagens\\falha.png'>
                                    
                                    </div>
									
								</div>
				</div>
			</section>
			<aside id='lateral'>
				
			</aside>
			<footer id='rodape'>
			<hr class='linha'>
				<p>Copyright © <span>Junior</span> | <span>Alexandre</span> | <span>Matteus</span> | <span>Marcelo</span> | FPIN</p> 
			</footer>
        </div>
    </body>
</html>";
       echo "<meta http-equiv=refresh
content='2;url=..\\index.php'>"; 
       
    }
    
    else{
        
        if($senha_usuario != mysql_result($resultado,0,"senha")){
             echo "<html>
	<head>
		<meta charset='UTF-8'/>
	</head>
    <body>
		<div id='interface'>    
			<header id='cabecalho'>
				<img class='icone' src='..\\_imagens\\laundry.png'/>
			</header>
			<hr class='linha'>
			<section id='corpo'>
				<div id='meio'>
								<div id='info_usuario'>
									
									<div id='falha'> 
                                    
                                    <span class='falhaa'>Usuario/Senha invalidos</span>
                                                                                        
                                    <img id='falhar' src='..\\_imagens\\falha.png'>
                                    
                                    </div>
									
								</div>
				</div>
			</section>
			<aside id='lateral'>
				
			</aside>
			<footer id='rodape'>
			<hr class='linha'>
				<p>Copyright © <span>Junior</span> | <span>Alexandre</span> | <span>Matteus</span> | <span>Marcelo</span> | FPIN</p> 
			</footer>
        </div>
    </body>
</html>";
            echo "<meta http-equiv=refresh
content='2;url=..\\index.php'>";
            
        }
        else{
            session_start();
            $_SESSION['nome_usuario']=$nome_usuario;
            $_SESSION['senha_usuario']=$senha_usuario;
            $_SESSION['id']=$identificador;
            header("Location: ..\\pagina_usuario\\pagina_usuario.php");
        }
    }
?>