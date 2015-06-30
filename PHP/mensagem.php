<link rel="stylesheet" type="text/css" href="..\_css\confirma.css"/>
<title>Mensagem</title>
<?php
    
    include "conexao_banco.php";

    $nome = $_POST['Nome'];
    $email = $_POST['Email'];
    $telefone = $_POST['Fone'];
    $assunto = $_POST['Assunto'];
    $duvida = $_POST['Duvida'];

    if(isset($nome)||isset($email)||isset($telefone)||isset($assunto)||isset($duvida)){ 
        
        $sql = mysql_query("INSERT INTO t_mensagens(nome,email,telefone,assunto,duvida)VALUES('$nome','$email','$telefone','$assunto','$duvida')");
        
        
    }
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

                                                                                            echo "<span class='sucess'>Mensagem Enviada</span>";
                                                                                            echo "<meta http-equiv=refresh content='3;url=..\\pagina_usuario\\pagina_usuario.php'>";
                                                                                            }else{
                                                                                            echo "Erro ao Enviar a mensagem";
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