<?php include "./layout/main.php"; 
    if ($logged == FALSE) {
        header("Location: ./login.php");
    }


?>

<body>
    <?php require "./layout/header.php"; ?>

    <main>
        <h2>Dashboard</h2>
        <?php var_dump($logged);  ?>
    </main>

    <?php require "./layout/footer.php"; ?>
    
</body>
</html>