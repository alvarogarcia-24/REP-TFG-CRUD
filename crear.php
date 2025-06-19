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
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            text-align: center;
            padding: 40px;
        }
        form {
            background: white;
            padding: 30px;
            border-radius: 10px;
            display: inline-block;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, textarea {
            width: 300px;
            padding: 10px;
            margin: 10px;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Crear Nueva Tarea</h1>
    <form method="POST">
        <input type="text" name="titulo" placeholder="Título" required><br>
        <textarea name="descripcion" placeholder="Descripción" rows="4"></textarea><br>
        <button type="submit">Guardar Tarea</button>
    </form>
</body>
</html>
