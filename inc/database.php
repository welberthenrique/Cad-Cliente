<?php
//Configuração do SQL para avisar sobre erros graves usando a função mysqli_report
mysqli_report(MYSQLI_REPORT_STRICT);

function open_database(){
    try{
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        return $conn;
    }catch(Exception $e){
        echo $e->getMessage();
        return null;
    }
}

function close_database($conn){
    try{
        mysqli_close($conn);
    }catch(Exception $e){
        echo $e->getMessage();
    }
}
