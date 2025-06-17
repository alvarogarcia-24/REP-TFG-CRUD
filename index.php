<?php include('db.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Tareas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Lista de Tareas</h1>
    <a href="crear.php">Crear nueva tarea</a>
    <ul>
        <?php
        $resultado = $conexion->query("SELECT * FROM tareas ORDER BY id DESC");
        
        while ($tarea = $resultado->fetch_assoc()) {
            echo "<li>
                <strong>{$tarea['titulo']}</strong>: {$tarea['descripcion']}
                <a href='editar.php?id={$tarea['id']}'>Editar</a>
                <a href='eliminar.php?id={$tarea['id']}'>Eliminar</a>
            </li>";
        }
        ?>
    </ul>
</body>
</html>
