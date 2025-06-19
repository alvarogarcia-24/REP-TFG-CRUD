<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    $sql = "INSERT INTO tareas (titulo, descripcion) VALUES ('$titulo', '$descripcion')";
    $conn->query($sql);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Tarea</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <button id="modo-oscuro-btn" class="modo-btn">🌙 Modo oscuro</button>
    <h1 class="btn-title">Crear Nueva Tarea</h1>

    <form method="POST" class="formulario">
        <input type="text" name="titulo" placeholder="Título" required><br>
        <textarea name="descripcion" placeholder="Descripción" rows="4"></textarea><br>
        <button type="submit" class="btn-crear">Guardar Tarea</button>
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
