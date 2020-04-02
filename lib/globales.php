<?php 
    session_start();
    $logged = FALSE;
    if(isset($_SESSION["logged"])){
        $logged = $_SESSION["logged"];
    }

    if(isset($_COOKIE["email"])){
        $logged = $_SESSION["logged"];
        
    }

    // Operacion ternaria
    // $logged = isset($_SESSION["logged"]) ? $_SESSION["logged"] : FALSE;

    //$links = ["login","usuarios","pedidos","contacto"];

    $links = ($logged)  ? ["logout","usuarios","pedidos","contacto"] : ["login","contacto"];
    
    define("DSN","mysql:host=localhost;dbname=aplicacion");
    define("USER","root");
    define("PSWD","");
?>