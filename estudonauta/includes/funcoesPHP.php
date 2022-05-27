<?php
    function thumb($arq){
        $caminho = "fotos/$arq";
        if(is_null($arq) || !file_exists($caminho)){
            return "fotos/indisponivel.png";
        }else{

            return $caminho;   
        }
    }


    function voltar(){
        return "<a href='index.php'>
        <i class='material-icons'>arrow_back</i></a>";
    
    } 

    function msg_sucesso($m){
        $resp = "<div class='sucesso'>$m</div>";

    }

    function msg_aviso($m){

    }
    function msg_erro($m){

    }
