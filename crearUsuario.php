<?php
    
    $metodo = $_SERVER["REQUEST_METHOD"];

    if($metodo == "POST"){
        include("./lib/globales.php"); 
        include("./lib/pdo.php"); 

        $nombre = $_POST["nombre"]; // validar por not null o empty
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $edad = $_POST["edad"]; // validar is_numeric
        $telefono = $_POST["telefono"];
        $password = password_hash($_POST["password"],PASSWORD_BCRYPT);

        $sql = "INSERT INTO usuarios (nombre,apellido,edad,email,telefono,password) values (:nombre,:apellido,:edad,:email,:telefono,:password)";

            $consulta = $con->prepare($sql);
            $consulta->bindParam(":nombre",$nombre);
            $consulta->bindParam(":apellido",$apellido);
            $consulta->bindParam(":email",$email);
            $consulta->bindParam(":edad",$edad);
            $consulta->bindParam(":telefono",$telefono);
            $consulta->bindParam(":password",$password);
            $consulta->execute();
    }
    
    $resultado = $consulta->rowCount();
    $id = $con->lastInsertId();

            if ($resultado>0){
               //header("Location: ./perfil.php?id=".$id);
               header("Location: ./login.php");
               //echo ("se ejecuto".$id);
            }else {
                print_r($consulta->errorInfo()); //Si Try&Catch no esta capturando el error se puede usar esta sentencia, seguramente no esta bien configurado PHP/XAMPP
            }
    ?>
