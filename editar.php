<?php 
    include("./layout/main.php"); 
    include("./lib/pdo.php"); 
?>

<body>
    <?php require "./layout/header.php"; ?>

    <main>
    <?php
        $id = $_GET["id"];
        if (!isset($id) || empty($id) || is_null($id) || !is_numeric($id)){
            header('Location: ./error_conexion.php');
        } 
        $sql = "SELECT * FROM usuarios where id=$id";
        $consulta = $con->prepare($sql);
        $consulta->execute();
        $usuario = $consulta->fetch(PDO::FETCH_OBJ);
        if (!is_object($usuario) || is_null($usuario) || empty($usuario)){
            header('Location: ./error_conexion.php');
        }
    ?>


    <section class="card">
        <div class="izq"></div>
        <form action="./editarUsuario.php" method="POST">
            <div class="der">
                <div class="info">
                    <p><input type="hidden" name="id" value="<?php echo $usuario->id ?>"></
                </div>
                <div class="info">
                    <h2>Nombre</h2>
                    <p><input type="text" name="nombre" value="<?php echo $usuario->nombre ?>" placeholder="Nombre"></p>
                </div>
                <div class="info">
                    <h2>Apellido</h2>
                    <p><input type="text" name="apellido" value="<?php echo $usuario->apellido ?>" placeholder="Apellido"></p>
                </div>
                <div class="info">
                    <h2>Edad</h2>
                    <p><input type="text" name="edad" value="<?php echo $usuario->edad ?>" placeholder="Edad"></p>
                </div>
                <div class="info">
                    <h2>Email</h2>
                    <p><input type="text" name="email" value="<?php echo $usuario->email ?>" placeholder="E-Mail"></p>
                </div>
                <div class="info">
                    <h2>Telefono</h2>
                    <p><input type="text" name="telefono" value="<?php echo $usuario->telefono ?>" placeholder="Telefono"></p>
                </div>
                <div class="info">
                    <h2>Password</h2>
                    <p><input type="text" name="password" value="<?php echo $usuario->password ?>" placeholder="Password"></p>
                </div>
                <div class="pie">
                    <a href=<?php echo "./borrar.php?id=".$usuario->id ?>>
                    <span class="material-icons">delete</span>
                    </a><button>Guardar</button>
                </div>
                
            </form>
        </div>
    </section>
    </main>

    <?php require "./layout/footer.php"; ?>
    
</body>
</html>
