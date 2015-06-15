function mudarImagemColetar(id) {                
                document.getElementById(id).src = "js\\coletar_azul.png";             
}
function mudarColetar(id) {                
                document.getElementById(id).src = "js\\coletar.png";             
}

function mudarImagemEntregar(id) {                
                document.getElementById(id).src = "js\\entregarr.png";             
}
function mudarEntregar(id) {                
                document.getElementById(id).src = "js\\entregar.png";             
}

function mudarImagemLavar(id) {                
                document.getElementById(id).src = "js\\lavarr.png";             
}
function mudarLavar(id) {                
                document.getElementById(id).src = "js\\lavar.png";             
}

function mudarImagemPassar(id) {                
                document.getElementById(id).src = "js\\passarr.png";             
}
function mudarPassar(id) {                
                document.getElementById(id).src = "js\\passar.png";             
}

function calculaValor(){
    var a,b,c,d;
    if(document.getElementById("buscar").checked){
      a = 1;  
    }else{
        a = 0;
    }
    
    if(document.getElementById("entregar_roup").checked){
      b = 2;  
    }else{
        b = 0;
    }
    
    if(document.getElementById("lavar_roup").checked){
      c = 3;  
    }else{
        c = 0;
    }
    
    if(document.getElementById("passar_roup").checked){
      d = 7;  
    }else{
        d = 0;
    }
    
    document.getElementById("teste").value = (document.getElementById("quant_kg").value * a) + (document.getElementById("quant_kg").value * b) + (document.getElementById("quant_kg").value * c) + (document.getElementById("quant_kg").value * d);
    
    if(document.getElementById("teste").value>0){
        document.getElementById("enviar").disabled = false;
    }
    else{
         document.getElementById("enviar").disabled = true;
    }
    
}

function exibeValor(id,id2,id3,id4){
    if(document.getElementById(id).style.display == "none"){
        
        document.getElementById(id).style.display = "inline";
        document.getElementById(id2).style.display = "inline";
        document.getElementById(id3).style.display = "inline";
        
        document.getElementById(id4).style.display = "inline";
    }
    else{
        if(document.getElementById(id).value != 0){
        document.getElementById(id).style.display = "inline";
        }
    
    }
}

function resetar(id,id2,id3,id4,id5,id6,id7,id8){
    document.getElementById(id).src = "js\\coletar.png";
    document.getElementById(id2).src = "js\\entregar.png";
    document.getElementById(id3).src = "js\\lavar.png";
    document.getElementById(id4).src = "js\\passar.png";
    
    document.getElementById(id5).style.display = "none";
    document.getElementById(id6).style.display = "none";
    document.getElementById(id7).style.display = "none";
    document.getElementById(id8).style.display = "none";
    
}

