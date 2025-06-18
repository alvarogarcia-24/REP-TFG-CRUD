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
            background-color: #ffc107;
            color: black;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background-color: #e0a800;
        }
    </style>
</head>
<body>
    <h1>Editar Tarea</h1>
    <form method="POST">
        <input type="text" name="titulo" value="<?= $tarea['titulo'] ?>" required><br>
        <textarea name="descripcion" rows="4"><?= $tarea['descripcion'] ?></textarea><br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>

