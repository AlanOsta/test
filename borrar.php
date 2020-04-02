<?php 
    include("./lib/globales.php"); 
    include("./lib/pdo.php"); 
?>

<body>
    <main>
    <?php 
    // Consulta SQL:  DELETE FROM usuarios WHERE id=:id

        $id = $_GET["id"];
        if (!isset($id) || empty($id) || is_null($id) || !is_numeric($id)){
            header('Location: ./error_conexion.php');
        } 
        $sql = "DELETE FROM usuarios WHERE id=:id";
        $consulta = $con->prepare($sql);
        $consulta->bindParam(":id",$id);
        $consulta->execute();

        $resultado = $consulta->rowCount();

            if ($resultado>0){
                header("Location: ./usuarios.php");
            }else {
                print_r($consulta->errorInfo()); 
            }

    ?>
    </main>
    <?php require "./layout/footer.php"; ?>
    
</body>
</html>