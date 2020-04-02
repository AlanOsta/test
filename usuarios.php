<?php 
    include("./layout/main.php"); 
    if ($logged == FALSE) {
        header("Location: ./login.php");
    }
    
    include("./lib/pdo.php");
    
    //setcookie("email",$email, time() + 180); esto seria para renovar la cookie cada vez que el usuario recarga la pagina

?>

<body>
    <?php require "./layout/header.php"; ?>

    <main>
    <h2> Usuarios </h2>

    <?php include("./layout/formulario_alta.php") ?>

    <table id="lista">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>E-mail</th>
                <th>Acciones</th>
            </tr>

        </thead>
        <tbody>

        <?php 
        

            $sql = "SELECT * FROM usuarios";
            $consulta = $con->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_OBJ);
                                 
            foreach ($resultado as $usuario){
                include "./layout/usuario.php";

        }
        ?>


        </tbody>

    </table>
    
   
    </main>

    <?php require "./layout/footer.php"; ?>
    
</body>
</html>