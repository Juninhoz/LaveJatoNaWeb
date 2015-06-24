<?php

    include "..\\PHP\\conexao_banco.php";

    function consultaMensagem($var){    
    
        if(!isset($var)){
            echo "Selecione uma mensagem.";
        }
        else{   
    $sql = mysql_query("SELECT * FROM t_mensagens");    
            
            if(!(mysql_data_seek($sql,$var))){
                 die('A consulta falhou: ' . mysql_error());
            }
            if(!($row = mysql_fetch_assoc($sql))){
             continue;   
            }
            
            echo "<table>";
            echo "<tr><th>Nome:</th><tr>";
            echo "<tr><td style='border:1px solid'>" . $row['nome'] . "</tr></td>";
            echo "<tr><th>Email:</th><tr>";
            echo "<tr><td style='border:1px solid'>" . $row['email'] . "</tr></td>";
            echo "<tr><th>Telefone:</th><tr>";
            echo "<tr><td style='border:1px solid'>" . $row['telefone'] . "</tr></td>";
            echo "<tr><th>Assunto:</th><tr>";
            echo "<tr><td style='border:1px solid'>" . $row['assunto'] . "</tr></td>";
            echo "<tr><th>Duvida:</th><tr>";
            echo "<tr><td style='border:1px solid'>" . $row['duvida'] . "</tr></td>";
            echo "</table>";
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
        
        echo $teste;
        
        $delete = mysql_query("DELETE FROM t_mensagens WHERE nome = '$teste'");
        
        if($delete){
            echo "Tudo certo";
        }
    }

    function queryMensagem(){
        $sql = mysql_query("SELECT * FROM t_mensagens");
        $linhas = mysql_num_rows($sql);
        return $linhas;
    }
    
    function queryServico(){
        $consulta = mysql_query("SELECT * FROM t_servico");
        $teste = mysql_num_rows($consulta);
        return $teste;
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
    echo "<input class='remove' type='submit' value='Remover'>";
    echo "</form>";
    echo "</table>";   
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
    
?>