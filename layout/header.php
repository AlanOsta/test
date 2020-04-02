<header>
    <h1> <a href="./index.php">HOME</a> </h1>
    <nav>
        <?php 
            for ($i=0; $i<count($links); $i++){

                //echo "<a href=../".$links[$i].".php>".$links[$i]."</a>";
                include("./layout/link.php");

            }

        ?>       
                
    </nav>
    </header>