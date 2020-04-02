<?php
    
    $metodo = $_SERVER["REQUEST_METHOD"];

    if($metodo == "POST"){
        include("./lib/globales.php"); 
        include("./lib/pdo.php"); 

        $email = $_POST["email"];
        $password = $_POST["password"];

        //echo ($email);
        //echo ($password);

        $sql = "SELECT count(email) FROM usuarios WHERE email=:email";
        $consulta = $con->prepare($sql);
        $consulta->bindParam(":email",$email);
        $consulta->execute();
        $resultado = $consulta->fetchColumn();
        //echo ($resultado);

        if($resultado==1){
            $sql = "SELECT password FROM usuarios WHERE email=:email";
            $consulta = $con->prepare($sql);
            $consulta->bindParam(":email",$email);
            $consulta->execute();
            $resultado = $consulta->fetchColumn();
            // echo ($resultado);
            if(password_verify($password,$resultado)){
                echo ("estas logueado");
                session_start();
                $_SESSION["email"] = $email;
                $_SESSION["logged"] = TRUE;
                setcookie("email",$email, time() + 180);
                header("Location: ./dashboard.php");
            }else{
                echo ("Usuario o contraseña invalido");
                //Aca mostraria un mensaje de usuario o contraseña invalida
            }
            


        }else {
            echo ("algo salio mal");
            //Aca mostraria un mensaje de usuario o contraseña invalida
        }


    }
?>