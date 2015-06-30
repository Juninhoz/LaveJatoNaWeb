var nome = false;
var senha = false;
var camposenha = false;

function validaNome(id){
            if(document.getElementById(id).value.length < 4 || document.getElementById(id).value.length >20){
                 document.getElementById("img00").src = "..\\lavejatonaweb\\js\\nomeinvalido.png";
                    nome = false;
            }else{
                document.getElementById("img00").src = "..\\lavejatonaweb\\js\\nomevalido.png";
                    nome = true;
            }
  
        }    
            
function validaSenha(id){
            if(document.getElementById(id).value.length<5) {
                    
                document.getElementById("img01").src = "..\\lavejatonaweb\\js\\senhainvalida.png";  
                senha = false;
            }
            else {
                    document.getElementById("img01").src = "..\\lavejatonaweb\\js\\senhavalida.png";
                    senha = true;
            }
        }
            
function confirmaSenha(id){
        
        if(document.getElementById(id).value == document.getElementById("change_password").value){
                document.getElementById("img02").src = "..\\lavejatonaweb\\js\\correto.png";
                camposenha = true;
            }
            else{
                document.getElementById("img02").src = "..\\lavejatonaweb\\js\\senhaincorreta.png";
                camposenha = false;
            }
        
} 

function limparReg(){
    document.getElementById("img00").src = '';
    document.getElementById("img01").src = '';
    document.getElementById("img02").src = '';
}

function ativarEnvio(){
    
    if(nome==true && senha == true && camposenha==true){
        document.getElementById("subi").disabled = false;
    }else{
        document.getElementById("subi").disabled = true;
    }
}