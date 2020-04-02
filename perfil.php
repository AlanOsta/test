<?php 
    include "./layout/main.php"; 
    include "./lib/pdo.php"; 
?>

<body>
    <?php require "./layout/header.php"; ?>

        <main>
            <?php
            
            //echo "el id es $id";

            // hacer toda la maquetacion, 
            // traer PDO
            // hacer una consulta SOLO para ese id
            // mostrar la info del usuario

            //validar $id con isset - empty - is_null - is_numeric

            

            $id = $_GET["id"];
            if (!isset($id) || empty($id) || is_null($id) || !is_numeric($id)){
                
                header('Location: ./error_conexion.php');
                
            } 



            $sql = "SELECT * FROM usuarios where id = :id";
            $consulta = $con->prepare($sql);
            $consulta->bindParam(":id",$id); // esto se usa para evitar la inyeccion de codigo SQL
            $consulta->execute();

            // validar $resultado con is_objetc - is_null - empty
            $usuario = $consulta->fetch(PDO::FETCH_OBJ);

            if (!is_object($usuario) || is_null($usuario) || empty($usuario)){
                header('Location: ./error_conexion.php');
            }
          

                                 
            ?>

        <section class="card">
            <div class="izq"></div>
            <div class="der">
                <div class="info">
                    <h2>ID</h2>
                    <p><?php echo $usuario->id ?></p>
                </div>
                <div class="info">
                    <h2>Nombre</h2>
                    <p><?php echo $usuario->nombre ?></p>
                </div>
                <div class="info">
                    <h2>Apellido</h2>
                    <p><?php echo $usuario->apellido ?></p>
                </div>
                <div class="info">
                    <h2>Edad</h2>
                    <p><?php echo $usuario->edad ?></p>
                </div>
                <div class="info">
                    <h2>Email</h2>
                    <p><?php echo $usuario->email ?></p>
                </div>
                <div class="info">
                    <h2>Telefono</h2>
                    <p><?php echo $usuario->telefono ?></p>
                </div>
                <div class="pie">
                    <a href=<?php echo "./editar.php?id=".$usuario->id ?>>
                    <span class="material-icons">create</span>
                    </a>
                    <a href=<?php echo "./borrar.php?id=".$usuario->id ?>>
                    <span class="material-icons">delete</span>
                    </a>
                </div>
            </div>
        </section>
        </main>

    <?php require "./layout/footer.php"; ?>
    
</body>
</html>

