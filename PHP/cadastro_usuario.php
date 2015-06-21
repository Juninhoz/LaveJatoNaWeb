<title>Cadastro</title>
<link rel="stylesheet" type="text/css" href="..\_css\confirma.css"/>
<?php
    
    $nome_usuario = $_POST["Nome_usuario"];
    $senha_usuario = $_POST["Senha_usuario"];
    $senha_confirm = $_POST["Senha_confirm"];
    $usuario_email = $_POST["Email_usuario"];
    $email_confirm = $_POST["Email_confirm"];
    $usuario_sexo = $_POST["sexo"];
    $erro = 0;
    
    /*Removendo espaços do nome*/
    $nome_usuario = rtrim($nome_usuario);
    $nome_usuario = ltrim($nome_usuario);
    /*Adicionando a primeira letra maiscula e as demais minusculas*/
    $nome_usuario = (ucfirst(strtolower($nome_usuario)));

    if(isset($usuario_sexo)){
        if($usuario_sexo == 'masculino'){
            $usuario_sexo = 'M';
        }
        else{
            $usuario_sexo = 'F';
        }
    }

    include "conexao_banco.php";
    
    $sql = mysql_query("INSERT INTO T_USUARIOS(nome_usuario,senha,email,sexo)VALUES('$nome_usuario','$senha_usuario','$usuario_email','$usuario_sexo')");
    
?>

<html>
	<head>
		<meta charset="UTF-8"/>
	</head>
    <body>
		<div id="interface">    
			<header id="cabecalho">
				<img class="icone" src="..\_imagens\laundry.png"/>
			</header>
			<hr class="linha">
			<section id="corpo">
				<div id="meio">
								<div id="info_usuario">
									
									<div id="confirmacao"> 
                                    
                                    <img id="sucesso" src="..\_imagens\sucesso.png"> <?php
                                                                                        if($sql){

                                                                                            echo "<span class='sucess'>Cadastro Realizado com sucesso</span>";
                                                                                            echo "<meta http-equiv=refresh content='5;url=..\\index.php'>";
                                                                                            }else{
                                                                                            echo "Falha ao realizar o cadastro";
                                                                                            }
                                                                                        ?>   
                                        
                                    </div>
									
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