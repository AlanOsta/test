<?php

    try{
        $con = new PDO(DSN,USER,PSWD);
    }catch(PDOException $e){
        die($e->getMessage());
        header('Location: ./error_conexion.php');

    }

?>