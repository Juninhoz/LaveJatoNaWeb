<?php

    include "..\\PHP\\conexao_banco.php";

    function consultaMensagem($var){    
    
        if(!isset($var)){
            echo "<h3>Selecione uma mensagem.</h3>";
            echo "<a href='mensagens.php'>Voltar</a>";
        }
        else{   
    $sql = mysql_query("SELECT * FROM t_mensagens");    
            
            if(!(mysql_data_seek($sql,$var))){
                 die('A consulta falhou: ' . mysql_error());
            }
            if(!($row = mysql_fetch_assoc($sql))){
             continue;   
            }
            
            echo "<fieldset>";
            echo "<legend>Mensagens</legend>";
            echo "<table>";
            echo "<tr><th>Nome:</th>";
            echo "<td>" . $row['nome'] . "</td></tr>";
            echo "<tr><th>Email:</th>";
            echo "<td>" . $row['email'] . "</td></tr>";
            echo "<tr><th>Telefone:</th>";
            echo "<td>" . $row['telefone'] . "</td></tr>";
            echo "<tr><th>Assunto:</th>";
            echo "<td>" . $row['assunto'] . "</td></tr>";
            echo "<tr><th>Duvida:</th>";
            echo "</table>";
            echo "<textarea class='text'>" . $row['duvida'] . "</textarea></tr><br><br>";
            echo "<a href='mensagens.php'>Voltar</a>";
            echo "</fieldset>";
        }
    
    }

    function apagarMensagem($var){
        
        if(!isset($var)){
            echo "Selecione uma mensagem para remover.";
        }
        
        $sql = mysql_query("SELECT * FROM t_mensagens");    
            
        if(!(mysql_data_seek($sql,$var))){
                 die('A consulta falhou: ' . mysql_error());
            }
            if(!($row = mysql_fetch_assoc($sql))){
             continue;   
            }
        
        $teste = $row['nome'];
        
        $delete = mysql_query("DELETE FROM t_mensagens WHERE nome = '$teste'");
        
        if($delete){
            echo "<h3>Mensagem Removida</h3>";
            echo "<a href='mensagens.php'>Voltar</a>";
            echo "<meta http-equiv=refresh content='3;url=..\\pagina_funcionario\\mensagens.php'>";
        }
    }

    function queryMensagem(){
        $sql = mysql_query("SELECT * FROM t_mensagens");
        $linhas = mysql_num_rows($sql);
        return $linhas;
    }
    
    function queryServico(){
        $consulta = mysql_query("SELECT * FROM t_servico WHERE status_pedido = 'Em analise'");
        $teste = mysql_num_rows($consulta);
        return $teste;
    }


function exibirPedidos(){
        $consulta = mysql_query("SELECT id_usuario,nome_usuario,id_pedido,data,valor,status_pagamento FROM t_servico,t_usuarios where id_usuario = cod_usuario and status_pedido = 'Em analise'");
   
    $pedidos = mysql_num_rows($consulta);
    
        echo "<form action='pedidos.php' method='get'>";                             
        echo "<table name='table_msg' class='exibirPed'>";    
        echo "<tr><th>Id usuario</th><th>Nome Usuario</th><th>Id Pedido</th><th>Data</th><th>Valor</th><th>Status</th><th>Aceitar</th><th>Rejeitar</th></tr>";
        $reg = array();
            for($i=0;$i<$pedidos;$i++){
                $registro = mysql_fetch_row($consulta);
                    echo "<tr><td>" . $registro[0]. "</td>";
                    echo "<td>" . $registro[1]. "</td>";
                    echo "<td>" . $registro[2]. "</td>";
                    $reg[$i] = $registro[2];
                    echo "<td>" . $registro[3]. "</td>";
                    echo "<td>" . $registro[4]. "</td>";
                    echo "<td>" . $registro[5]. "</td>";
                    echo "<td><input type='checkbox' name='aceitar' value='$reg[$i]'></td>";
                    echo "<td><input type='checkbox' name='rejeitar' value='$reg[$i]'></td></tr>";
            }
        echo "</table>";
        echo "<input class='exibir_enviar'type='submit' value='Atualizar dados'>";
        echo "</form>";
}

function aceitarPedido($id){
    $sql = mysql_query("UPDATE t_servico SET status_pedido = 'Aceito' WHERE id_pedido = '$id'");
}

function rejeitarPedido($id){
    
    $sql = mysql_query("UPDATE t_servico SET status_pedido = 'Rejeitado' WHERE id_pedido = '$id'");
}

function mostrarUsuarios(){
    
    $sql = mysql_query("SELECT * FROM t_usuarios");
    $linhas = mysql_num_rows($sql);
    
    echo "<table id='op'>";
    echo "<form action='remover_usuario.php' method='post'>";
    echo "<tr><th>Id usuario</th><th>Nome</th><th>Email</th><th>Remover</th></tr>";
    $reg = array();
    for($i=0;$i<$linhas;$i++){
         $registro = mysql_fetch_row($sql);   
         echo "<tr><td>$registro[0]</td>";
         $reg[$i] = $registro[0];
         echo "<td> $registro[1] </td>";
         echo "<td> $registro[4]</td>";
         echo "<td><input class='op' type='checkbox' name='valor' value='$reg[$i]'></td></tr>";      
    }
    echo "</table>";
    echo "<br><input class='remove' type='submit' value='Remover'>";
    echo "</form>";
       
}

function mostrarUsuariosSelecionado($var){
 
     $sql = mysql_query("SELECT * FROM t_usuarios WHERE nome_usuario = '$var'");
     $linhas = mysql_num_rows($sql);
    
    if($linhas){
      echo "<table>";
    echo "<tr><th>Id usuario</th><th>Nome</th><th>Email</th></tr>";
    for($i=0;$i<$linhas;$i++){
         $registro = mysql_fetch_row($sql);   
         echo "<tr><td>$registro[0]</td>";
         echo "<td> $registro[1] </td>";
         echo "<td> $registro[4]</td></tr>";
    }
    echo "</table>"; 
    }else{
        echo "<h3 style='margin-top: 20px;'>Nao foram encontrados registros</h3>";
    }
}

function mostrarUsuariosPorOrdenacao($var){
    
    if($var == 'nome'){
        echo "<h4>Ordenados por Nome</h4>";
        $sql = mysql_query("SELECT * FROM t_usuarios ORDER BY nome_usuario");
    }else{
        echo "<h4>Ordenados por id</h4>";
        $sql = mysql_query("SELECT * FROM t_usuarios ORDER BY cod_usuario");
    }
    $linhas = mysql_num_rows($sql);
    
    if($linhas){
      echo "<table>";
    echo "<tr><th>Id usuario</th><th>Nome</th><th>Email</th></tr>";
    for($i=0;$i<$linhas;$i++){
         $registro = mysql_fetch_row($sql);   
         echo "<tr><td>$registro[0]</td>";
         echo "<td> $registro[1] </td>";
         echo "<td> $registro[4]</td></tr>";
    }
    echo "</table>"; 
}
}
function removerUsuario($id){
        echo $id;
        $sql = mysql_query("DELETE FROM t_usuarios WHERE cod_usuario = '$id'");
    if($sql){
        echo "usuario removido com sucesso";
    }else{
     echo "falha ao remover";   
    }
}
 
function consultaPedidos(){
    $sql = mysql_query("SELECT * FROM t_servico");
    $linhas = mysql_num_rows($sql);
    
    if(!$linhas){
        echo "<h3 style='Margin-top:20px;'>Nenhum resultado para busca.</h3>";
    }else{
    echo "<table class='ger'>";
    echo "<tr><th>Id usuario</th><th>Id pedido</th><th class='ger'>Data</th><th>Valor</th><th>Status pgto</th><th>Status Pedido</th></tr>";
    for($i=0;$i<$linhas;$i++){
         $registro = mysql_fetch_row($sql);   
         echo "<tr><td>$registro[0]</td>";
         echo "<td> $registro[1] </td>";
         echo "<td> $registro[2]</td>";
         echo "<td> $registro[3]</td>";
         echo "<td> $registro[4]</td>";
        if($registro[5]=='Aceito'){
         echo "<td style='background-color: #66FF33;'> $registro[5] </td></tr>";
        }else{
            echo "<td> $registro[5] </td></tr>";
        }
            
    }
    echo "</table>"; 
    }
}

function exibirMensagens(){
                                    
    $sql = mysql_query("SELECT * FROM t_mensagens");
    $linhas = mysql_num_rows($sql);
    echo "<form action='msg.php' method='post'>";                             
    echo "<table name='table_msg' class='tabela_msg'>";    
    echo "<tr><th>Nome</th><th>Email</th><th>Telefone</th><th>Assunto</th><th>Ler Mensagens</th><th>Apagar</th></tr>";
          for($i=0;$i<$linhas;$i++){
                $registro = mysql_fetch_row($sql);
                        echo "<tr><td>" . $registro[0]. "</td>";
                        echo "<td>" . $registro[1]. "</td>";
                        echo "<td>" . $registro[2]. "</td>";
                        echo "<td>" . $registro[3]. "</td>";
                        echo "<td><input type='checkbox' name='mens' value='$i'/><input type='submit' value='Ler Mensagem'></td>"; 
                        echo "<td><input type='checkbox' name='del' value='$i'/><input type='submit' value='Apagar'/></td><tr>";
        }
    echo "</table>";  
    echo "</form>";
}

function pesquisaPedidos(){

    echo "<form action='gerenciar_pedidos.php' method='get'>";
    
    echo "<label class='research'>Pesquisar</label>";
    echo "<select id='select' name='select' class='research' onclick='ativarID()'>";
    echo "<option>";
    echo "<option value='ID'>ID usuario";
    echo "<option value='STATUS_PGTO'>Status Pagamento";
    echo "<option value='STATUS_PED'>Status Pedido";
    echo "</select>";
    echo "<label id='searchIDD' class='research' style='display:none;'>ID Usuario</label><input type='text' id='searchID' name='id_pedido' size='10' style='display: none;'>";
    echo "<label id='searchPGTO' class='research' style='display: none;'>Status:</label><select id='searchPgto' name='stats_pgto'style='display: none;'>";
    echo "<option value='PAGO'>Pago";
    echo "<option value='PENDENTE'>Pendente";    
    echo "</select>";
    echo "<label id='searchSTATUS' class='research' style='display: none;'>Status:</label><select id='searchStatus' name='stats_ped' style='display: none;'>";
    echo "<option value='ACEITO'>Aceito";
    echo "<option value='EM ANALISE'>Em analise";
    echo "<option value='REJEITADO'>Rejeitado"; 
    echo "</select>";
    echo "<input class='research_submit'type='submit' value='Pesquisar'>";
    echo "</form>";   
}
    
function pesquisaGerencia($select){
    
    if($select == 'ID'){
        @$id_usuario = $_GET['id_pedido'];
        pesquisaPorId($id_usuario);
    }
    if($select == 'STATUS_PGTO'){
        @$status_pgto = $_GET['stats_pgto'];
        pesquisaPorStatusPagamento($status_pgto);
    }
    if($select == 'STATUS_PED'){
        @$status_ped = $_GET['stats_ped'];
        pesquisaPorStatus($status_ped);
    }
}

    function pesquisaPorId($id_usuario){
        
        $sql = mysql_query("SELECT * FROM t_servico WHERE id_usuario = '$id_usuario'");
        $linhas = mysql_num_rows($sql);
        $sql2 = mysql_query("SELECT nome_usuario FROM t_usuarios WHERE cod_usuario = '$id_usuario'");
        $linhas2 = mysql_num_rows($sql);
        if(!$linhas2){
            echo "<h3>Nenhum resultado para a busca.</h3>";
            echo "<a class='return' href='gerenciar_pedidos.php'>Voltar</a>";
        }else{
        $result = mysql_result($sql2,0);
        echo "<label class='research'>Nome usuario: </label>" . "<span class='noum'>$result</span>";        
        echo "<table class='ger'>";
        echo "<tr><th>Id usuario</th><th>Id pedido</th><th class='ger'>Data</th><th>Valor</th><th>Status pgto</th><th>Status Pedido</th></tr>";
        for($i=0;$i<$linhas;$i++){
                $registro = mysql_fetch_row($sql);
                        echo "<tr><td>" . $registro[0]. "</td>";
                        echo "<td>" . $registro[1]. "</td>";
                        echo "<td>" . $registro[2]. "</td>";
                        echo "<td>" . $registro[3]. "</td>";
                        echo "<td>" . $registro[4]. "</td>";
                        echo "<td>" . $registro[5]. "</td></tr>";
         }
         echo "</table><br>";
         echo "<a class='return' href='gerenciar_pedidos.php'>Voltar</a>";
       }   
    }

    function pesquisaPorStatusPagamento($status_pgto){
        $sql = mysql_query("SELECT * FROM t_servico WHERE status_pagamento = '$status_pgto'");
        
        $linhas = mysql_num_rows($sql);
        
        if(!$linhas){
            echo "<h3>Nenhum resultado para a busca.</h3>";
            echo "<a class='return' href='gerenciar_pedidos.php'>Voltar</a>";
        }else{
            if($status_pgto == 'PAGO'){    
        echo "<label class='research'>Pedidos Pagos:</label>";
            }else{
                echo "<label class='research'>Pedidos Pendentes:</label>";
            }
        echo "<table class='ger'>";
        echo "<tr><th>Id usuario</th><th>Id pedido</th><th class='ger'>Data</th><th>Valor</th><th>Status pgto</th><th>Status Pedido</th></tr>";
        for($i=0;$i<$linhas;$i++){
                $registro = mysql_fetch_row($sql);
                        echo "<tr><td>" . $registro[0]. "</td>";
                        echo "<td>" . $registro[1]. "</td>";
                        echo "<td>" . $registro[2]. "</td>";
                        echo "<td>" . $registro[3]. "</td>";
                        echo "<td>" . $registro[4]. "</td>";
                        echo "<td>" . $registro[5]. "</td></tr>";
         }
         echo "</table><br>";
         echo "<a class='return' href='gerenciar_pedidos.php'>Voltar</a>";
       }       
    }

    function pesquisaPorStatus($status_ped){
        
        $sql = mysql_query("SELECT * FROM t_servico WHERE status_pedido = '$status_ped'");
        
        $linhas = mysql_num_rows($sql);
        
        if(!$linhas){
            echo "<h3>Nenhum resultado para a busca.</h3>";
            echo "<a class='return' href='gerenciar_pedidos.php'>Voltar</a>";
        }else{
            if($status_ped == 'ACEITO'){    
        echo "<label class='research'>Pedidos aceitos:</label>";
            }
            else if($status_ped == 'EM ANALISE'){
                echo "<label class='research'>Pedidos em analise:</label>";
            }else{
                echo "<label class='research'>Pedidos Rejeitados:</label>";
            }
        echo "<table class='ger'>";
        echo "<tr><th>Id usuario</th><th>Id pedido</th><th class='ger'>Data</th><th>Valor</th><th>Status pgto</th><th>Status Pedido</th></tr>";
        for($i=0;$i<$linhas;$i++){
                $registro = mysql_fetch_row($sql);
                        echo "<tr><td>" . $registro[0]. "</td>";
                        echo "<td>" . $registro[1]. "</td>";
                        echo "<td>" . $registro[2]. "</td>";
                        echo "<td>" . $registro[3]. "</td>";
                        echo "<td>" . $registro[4]. "</td>";
                        echo "<td>" . $registro[5]. "</td></tr>";
         }
         echo "</table><br>";
         echo "<a class='return' href='gerenciar_pedidos.php'>Voltar</a>";
       }       
    }

function verificaSessao($sessao){
    
    if($sessao != 'admin'){
        header("Location: ..\\index.php");
    }
}


?>