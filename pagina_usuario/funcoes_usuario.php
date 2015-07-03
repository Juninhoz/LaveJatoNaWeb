<?php
    
function mostrarPedidoUsuario($id){
    $resultado = mysql_query("SELECT * FROM t_servico WHERE id_usuario = '$id'");
                                $linhas = mysql_num_rows($resultado);
                                $pagto;
                                
                                echo "<table style='Border: 1px solid;'>";
                                echo "<tr><th>Id usuario</th><th>Id pedido</th><th>Data</th><th>Valor</th><th>Pagamento</th><th>Status</th><tr>";
	                           
                    for($i = 0 ; $i < $linhas ; $i++)
	                       {
                                $registro = mysql_fetch_row($resultado);   
                                echo "<tr><td>$registro[0]</td>";
                                echo "<td> $registro[1] </td>";
                                echo "<td> $registro[2]</td>";
                                echo "<td> $registro[3] R$</td>";
                                echo "<td id='situacao'> $registro[4]</td>";
                        if($registro[5]=="Em analise"){
                                echo "<td id='cor'><img id='$i' src='js\\analise.png'></td>"; 
                        }else if($registro[5]=='Rejeitado'){
                            echo "<td id='cor'><img id='$i' src='js\\fail.png'></td>"; 
                        }else{
                            echo "<td id='cor'><img id='$i' src='js\\ok.png'></td>"; 
                        }
                           }
                                echo "</table>";   
}


function mostrarUsuariosDebitos($id){
                
                $sql = mysql_query("SELECT id_pedido,valor FROM t_servico WHERE id_usuario = '$id' and status_pagamento = 'Pendente' AND status_pedido = 'Em analise'");  
                                        
                $linhas = mysql_num_rows($sql);
                                        
                echo "<select name='servicos'>";    
                        for($i = 0 ; $i < $linhas ; $i++){  
                                $registro = mysql_fetch_row($sql);
                    echo "<option value='$registro[0]'> id Pedido : " . $registro[0] . " " ." Valor : " . $registro[1] .  "</option><br>";
                        }
	                echo "</select>";  
}


function alterarDados($id,$nome,$senha){
    
    $sql = mysql_query("UPDATE t_usuarios SET nome_usuario = '$nome', senha = '$senha' WHERE cod_usuario = '$id'");
    if($sql){   
    }
}




function nomeUsuarioEemail($id){
    $sql = mysql_query("SELECT nome_usuario,email FROM t_usuarios WHERE cod_usuario = '$id'");
    $linhas = mysql_num_rows($sql);
    for($i = 0 ; $i < $linhas ; $i++){  
        $registro = mysql_fetch_row($sql);
    }
    return $registro;
}


function mostrarValorDebito($id){
                
                $sql = mysql_query("SELECT id_pedido,valor FROM t_servico WHERE id_usuario = '$id' and status_pagamento = 'Pendente' AND status_pedido = 'Em analise'");  
                                        
                $linhas = mysql_num_rows($sql);
                                        
                echo "<select name='servicos'>";    
                        for($i = 0 ; $i < $linhas ; $i++){  
                                $registro = mysql_fetch_row($sql);
                    echo "<option value='$registro[1]'> id Pedido : " . $registro[0] . " " ." Valor : " . $registro[1] .  "</option><br>";
                        }
	                echo "</select>";  
}


?>