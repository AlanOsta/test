<tr>
    <td><?php echo $usuario->id; ?></td>
    <td><?php echo $usuario->nombre; ?></td>
    <td><?php echo $usuario->apellido; ?></td>
    <td><a href="mailto:<?php echo $usuario->email;?> "><?php echo $usuario->email; ?> </a></td>
    <td>  
        
        <a href=<?php echo "./perfil.php?id=".$usuario->id ?>>
            <span class="material-icons">account_circle</span>
        </a>
        <a href=<?php echo "./editar.php?id=".$usuario->id ?>>
            <span class="material-icons">create</span>
        </a>
        <a href=<?php echo "./borrar.php?id=".$usuario->id ?>>
            <span class="material-icons">delete</span>
        </a>
            
    </td>
        
</tr>

