<title>Pagamento</title>
<link rel="stylesheet" type="text/css" href="..\_css\confirma.css"/>
<?php
    
    include "conexao_banco.php";
    
    $numero_card = $_POST['numero_cartao'];
    $nome_card = $_POST['titular'];
    $data = $_POST['data_valid'];
    $cod_seg = $_POST['cod_seguranca'];
    $op_select = $_POST['servicos'];

    if(isset($numero_card) && isset($nome_card) && isset($data) && isset($cod_seg) && isset($op_select)){
        
        $sql = mysql_query("INSERT INTO t_pagamento(numero_cartao,titular_cartao,data_valid,cod_seg,id_pedido)VALUES('$numero_card','$nome_card','$data','$cod_seg','$op_select')");
       
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
                                                                                         $sql2 = mysql_query("UPDATE t_servico SET status = 'Pago' WHERE id_pedido = '$op_select'");
                                                                                         if($sql2){
                                                                                                 echo "<span class='sucess'>Pagamento Realizado</span>";
                                                                                              echo "<meta http-equiv=refresh
content='5;url=..\\pagina_usuario\\pagina_usuario.php'>";
                                                                                    }else{
                                                                                        echo "erro aqui";
                                                                                    }  
                                                                                }else{
                                                                                    echo "erro";
                                                                                }
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