
<link rel="stylesheet" type="text/css" href="..\_css\confirma.css"/>
<title>Pedido</title>
<?php

    include "conexao_banco.php";
    
    session_start();
    
    @$coletar_roupas = $_POST['Buscar_roupa'];
    @$entregar_roupas = $_POST['Entregar_roupa'];
    @$lavar_roupa = $_POST['lavar_roupa'];
    @$passar_roupa = $_POST['Passar_roupa'];
    
    $quant_roupas = $_POST['quant_kg'];
    
    
    if(isset($coletar_roupas)){ 
        $coletar_roupas = 1;
    }else{
        $coletar_roupas = 0;
    }
    
    if(isset($entregar_roupas)){
        $entregar_roupas = 2;
    }
    else{
        $entregar_roupas = 0;
    }

    if(isset($lavar_roupa)){
        $lavar_roupa = 3;
    }else{
        $lavar_roupa = 0;
    }

    if(isset($passar_roupa)){
        $passar_roupa = 7;
    }
    else{
        $passar_roupa = 0;
    }
    
    $valor_total = ($quant_roupas * $coletar_roupas) + ($quant_roupas * $entregar_roupas) + ($quant_roupas * $lavar_roupa) + ($quant_roupas * $passar_roupa);
    
    $data = date('Y/m/d');
    $teste = $_SESSION['nome_usuario'];
    
    $sql = mysql_query("SELECT cod_usuario FROM t_usuarios WHERE nome_usuario = '$teste'");

    $id = mysql_result($sql,0);
    
    $pedido = mysql_query("INSERT into t_servico(id_usuario,data,valor)VALUES('$id','$data','$valor_total')");    
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
                                                                                        if($pedido){

                                                                                            echo "<span class='sucess'>Pedido Realizado com sucesso</span>";
                                                                                            echo "<meta http-equiv=refresh content='5;url=..\\pagina_usuario\\pagina_usuario.php'>";
                                                                                            }else{
                                                                                            echo "Erro ao realizar o pedido";
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