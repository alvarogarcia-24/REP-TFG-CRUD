<?php
include('db.php');
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $sql = "UPDATE tareas SET titulo='$titulo', descripcion='$descripcion' WHERE id=$id";
    $conn->query($sql);
    header("Location: index.php");
    exit();
}

$resultado = $conn->query("SELECT * FROM tareas WHERE id=$id");
$tarea = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarea</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <button id="modo-oscuro-btn" class="modo-btn">Modo oscuro</button>
    <h1 class="btn-title">Editar Tarea</h1>

    <form method="POST" class="formulario">
        <input type="text" name="titulo" value="<?= $tarea['titulo'] ?>" required><br>
        <textarea name="descripcion" rows="4"><?= $tarea['descripcion'] ?></textarea><br>
        <button type="submit" class="btn-crear">Guardar Cambios</button>
    </form>

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
