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


function find($table = null, $id = null){

    $database = open_database();
    $found = null;

    try{
        if($id){
            $sql = "SELECT * FROM " . $table . "WHERE id = " . $id;
            $result = $database->query($sql);

            if($result->num_rows > 0){
                $found = $result->fetch_assoc();
            }
        }else{
            $sql = "SELECT * FROM " . $table;
            $result = $database->query($sql);

            if($result->num_rows > 0){
                $found = $result->fetch_all(MYSQLI_ASSOC);
                
                /*Metodo alternativo
                $fount = array();

                while ($row = $result->fetch_assoc()){
                    array_push($found, $row);
                }*/
            }
        }
    }catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['type'] = 'danger';
    }
    close_database($database);
    return $found;
}

/**
 * Pesquisa todos os registros de uma tabela
 */

 function find_all(){
     return find($table);
 }