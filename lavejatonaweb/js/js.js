var global_nome = false;
var global_senha = false;
var global_camposenha = false;
var global_email = false;
var global_campoemail = false;

function trim(string){
    return string.replace(/^\s+|\s+$/g,"");
}

function ValidaCampoNome(id) {
    var nome = trim(document.getElementById(id).value);
    document.getElementById(id).value = nome;
    if(document.getElementById(id).value.length <4 || document.getElementById(id).value.length > 20) {
                    
                document.getElementById("img00").src = "js\\nomeinvalido.png";
                global_nome = false;
            }
            else {
                document.getElementById("img00").src = "js\\nomevalido.png";
                global_nome = true;
            }
}

function ValidaCampoSenha(id){
            var senha = trim(document.getElementById(id).value);
            document.getElementById(id).value = senha;
        
            if(document.getElementById(id).value.length<5) {
                    
                document.getElementById("img01").src = "js\\senhainvalida.png";  
                global_senha = false;
            }
            else {
                    document.getElementById("img01").src = "js\\senhavalida.png";
                global_senha = true;
            }
}


function VerificaCampoSenha(id){
            if(document.getElementById(id).value == document.getElementById("password").value){
                document.getElementById("img02").src = "js\\correto.png";
                global_camposenha = true;
            }
            else{
                document.getElementById("img02").src = "js\\senhaincorreta.png";
                global_camposenha = false;
            }
}

function ValidaCampoEmail(id){
            var email = trim(document.getElementById(id).value); 
            document.getElementById(id).value = email;
            var string = document.getElementById(id).value;
            var Myarray = new Array();
            var arroba = 0;
            var ponto;
            var pontocom = false;
            tam = document.getElementById(id).value.length;
    
            for(var i = 0;i<document.getElementById(id).value.length;i++){
                Myarray.push(string[i]);
            }
            
            for(var j=0;j<document.getElementById(id).value.length;j++){
                if(Myarray[j]=='@'){
                    arroba++;
                }
                if(Myarray[0]=='.' || Myarray[tam-1]=='.'){
                    ponto = false;
                }
                if(Myarray[j]=='.'){
                    if(Myarray[j+1]=='.'){
                        ponto = false;
                    }    
                }
                if(Myarray[tam-4]=='.'){
                   if(Myarray[tam-3]=='c'){
                       if(Myarray[tam-2]=='o'){
                            if(Myarray[tam-1]=='m'){
                                     pontocom = true;
                   }
                    else{
                       pontocom = false;
                    }
                }
            }
        }
}
            if(document.getElementById(id).value.length>30 || arroba == 0 ||ponto == false || pontocom == false) {
                    
                document.getElementById("img03").src = "js\\emailinvalido.png";
                global_email = false
            }
            else {
                    document.getElementById("img03").src = "js\\emailvalido.png";
                    global_email = true;
            }
} 

function VerificaCampoEmail(id){
            var email = trim(document.getElementById(id).value); 
            document.getElementById(id).value = email;
            if(document.getElementById(id).value == document.getElementById("email").value) {
                    
                document.getElementById("img04").src = "js\\correto.png";
                global_campoemail = true;
            }
            else {
                    document.getElementById("img04").src = "js\\emailincorreto.png";  
                global_campoemail = false;
            }
} 

function limparReg(){
    document.getElementById("img00").src = '';
    document.getElementById("img01").src = '';
    document.getElementById("img02").src = '';
    document.getElementById("img03").src = '';
    document.getElementById("img04").src = '';
}

function ativarEnvio(){
    
    if(global_nome==true && global_senha == true && global_camposenha==true && global_email==true && global_campoemail==true){
        document.getElementById("input_envio").disabled = false;
    }else{
        document.getElementById("input_envio").disabled = true;
    }
}


