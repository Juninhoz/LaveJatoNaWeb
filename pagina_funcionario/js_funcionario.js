function ativarID(){
    
        var x = document.getElementById("select").value;
        
        if(x=="ID"){
            document.getElementById("searchIDD").style.display = "inline";
            document.getElementById("searchID").style.display = "inline";  
        }else{
            document.getElementById("searchID").style.display = "none";
            document.getElementById("searchIDD").style.display = "none";
        }    
        
        if(x=="STATUS_PGTO"){
            document.getElementById("searchPgto").style.display = "inline";
            document.getElementById("searchPGTO").style.display = "inline";
        }else{
            document.getElementById("searchPgto").style.display = "none";
            document.getElementById("searchPGTO").style.display = "none"; 
        }     
         
        if(x=="STATUS_PED"){
            document.getElementById("searchSTATUS").style.display = "inline";
            document.getElementById("searchStatus").style.display = "inline";
        }else{
            document.getElementById("searchSTATUS").style.display = "none";
            document.getElementById("searchStatus").style.display = "none"; 
        }   
}