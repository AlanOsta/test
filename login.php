<?php include "./layout/main.php"; 
if ($logged) {
    header("Location: ./logout.php");
}
?>

<body>
    <?php require "./layout/header.php"; ?>

    <main>
    
        <h2>Login</h2>
        <form action="./loguearUsuario.php" method="POST">
            <div>
                <input type="email" name="email" placeholder="Ingrese su Email">
            </div>
            <div>
                <input type="password" name="password" placeholder="Ingrese su Contraseña" >
            </div>
            <button>Ingresar</button>
        </form>

    </main>

    <?php require "./layout/footer.php"; ?>
    
</body>
</html>