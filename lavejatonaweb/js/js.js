var nome = false;
var senha = false;
var camposenha = false;
var email = false;
var campoemail = false;

function ValidaCampoNome(id) {
            if(document.getElementById(id).value.length<4 || document.getElementById(id).value.length>20) {
                    
                document.getElementById("img00").src = "js\\nomeinvalido.png";
                    nome = false;
            }
            else {
                    document.getElementById("img00").src = "js\\nomevalido.png";
                    nome = true;
            }
}

function ValidaCampoSenha(id){
            if(document.getElementById(id).value.length<5) {
                    
                document.getElementById("img01").src = "js\\senhainvalida.png";  
                senha = false;
            }
            else {
                    document.getElementById("img01").src = "js\\senhavalida.png";
                    senha = true;
            }
}


function VerificaCampoSenha(id){
            if(document.getElementById(id).value == document.getElementById("password").value){
                document.getElementById("img02").src = "js\\correto.png";
                camposenha = true;
            }
            else{
                document.getElementById("img02").src = "js\\senhaincorreta.png";
                camposenha = false;
            }
}

function ValidaCampoEmail(id){
                    
            var string = document.getElementById(id).value;
            var Myarray = new Array();
            var arroba = 0;
            var ponto;
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
        }
                
            if(document.getElementById(id).value.length>30 || arroba == 0 ||ponto == false ) {
                    
                document.getElementById("img03").src = "js\\emailinvalido.png";
                email = false
            }
            else {
                    document.getElementById("img03").src = "js\\emailvalido.png";
                    email = true;
            }
} 

function VerificaCampoEmail(id){
            if(document.getElementById(id).value == document.getElementById("email").value) {
                    
                document.getElementById("img04").src = "js\\correto.png";
                campoemail = true;
            }
            else {
                    document.getElementById("img04").src = "js\\emailincorreto.png";  
                campoemail = false;
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
    
    if(nome==true && senha == true && camposenha==true && email==true && campoemail==true){
        document.getElementById("input_envio").disabled = false;
    }else{
        document.getElementById("input_envio").disabled = true;
    }
}