<?php
    
    $metodo = $_SERVER["REQUEST_METHOD"];

    if($metodo == "POST"){
        include("./lib/globales.php"); 
        include("./lib/pdo.php"); 

        $id = $_POST["id"]; //habria que validar cada una de estas variable que exista que no sea null y que no este vacio
        $nombre = $_POST["nombre"]; // validar por not null o empty
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $edad = $_POST["edad"]; // validar is_numeric
        $telefono = $_POST["telefono"];
        
        //try {
            $sql = "UPDATE usuarios SET 
                nombre=:nombre ,
                apellido=:apellido,
                edad=:edad,
                email=:email,
                telefono=:telefono WHERE id=:id";
            $consulta = $con->prepare($sql);
            $consulta->bindParam(":id",$id);
            $consulta->bindParam(":nombre",$nombre);
            $consulta->bindParam(":apellido",$apellido);
            $consulta->bindParam(":email",$email);
            $consulta->bindParam(":edad",$edad);
            $consulta->bindParam(":telefono",$telefono);
            $consulta->execute();
            // UPDATE - INSERT - DELETE 
            
            $resultado = $consulta->rowCount();

            if ($resultado>0){
                header("Location: ./perfil.php?id=".$id);
            }else {
                print_r($consulta->errorInfo()); //Si Try&Catch no esta capturando el error se puede usar esta sentencia, seguramente no esta bien configurado PHP/XAMPP
            }
        //}catch(PDOException $e){
        //    echo $e->getMessage();
        // }

    }else{
        header('Location: ./error_conexion.php');
    }
?>