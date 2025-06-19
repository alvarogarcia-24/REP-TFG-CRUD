<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include('db.php');
$resultado = $conn->query("SELECT * FROM tareas ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tareas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Imagen decorativa -->
    <img src="gif/lapiz.gif" alt="Icono lápiz animado" class="header-img">

    <!-- Botón de cerrar sesión -->
    <a href="logout.php" class="logout-btn">Cerrar sesión</a>

    <!-- Título -->
    <div>
        <button class="btn-title">Lista de Tareas</button>
    </div>

    <!-- Botón crear -->
    <div>
        <a href="crear.php" class="btn-crear">Crear Nueva Tarea</a>
    </div>

    <!-- Tabla de tareas -->
    <table>
        <tr>
            <th>Título</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
        <?php while ($tarea = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?= $tarea['titulo']; ?></td>
                <td><?= $tarea['descripcion']; ?></td>
                <td>
                    <a href="editar.php?id=<?= $tarea['id']; ?>">Editar</a> |
                    <a href="eliminar.php?id=<?= $tarea['id']; ?>" onclick="return confirm('¿Eliminar esta tarea?')">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
    </table>

<a href="logout.php" style="position: absolute; top: 20px; right: 30px; font-weight: bold; color: red;">Cerrar sesión</a>

</body>
</html>

