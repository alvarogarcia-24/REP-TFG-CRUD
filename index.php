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

    <button id="modo-oscuro-btn" class="modo-btn">Modo oscuro</button>
    <a href="logout.php" class="logout-btn">Cerrar sesión</a>
    <img src="gif/lapiz.gif" alt="Icono lápiz animado" class="header-img">

    <div>
        <button class="btn-title">Lista de Tareas</button>
    </div>

    <div>
        <a href="crear.php" class="btn-crear">Crear Nueva Tarea</a>
    </div>

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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const btn = document.getElementById('modo-oscuro-btn');
            const body = document.body;

            if (localStorage.getItem("modo") === "oscuro") {
                body.classList.add("dark-mode");
                btn.textContent = "Modo claro";
            }

            btn.addEventListener("click", () => {
                body.classList.toggle("dark-mode");
                const modo = body.classList.contains("dark-mode") ? "oscuro" : "claro";
                localStorage.setItem("modo", modo);
                btn.textContent = modo === "oscuro" ? "Modo claro" : "Modo oscuro";
            });
        });
    </script>
</body>
</html>

