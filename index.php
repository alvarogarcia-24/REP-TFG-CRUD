<?php
include('db.php');
$resultado = $conn->query("SELECT * FROM tareas ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tareas</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #e3f2fd;
            text-align: center;
            margin: 0;
            padding: 30px;
        }

        .header-img {
            width: 100px;
            margin-bottom: 20px;
            animation: float 2s infinite ease-in-out;
        }

        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0); }
        }

        .btn-title {
            background-color: #4CAF50;
            color: white;
            font-size: 28px;
            padding: 20px 40px;
            border: none;
            border-radius: 12px;
            cursor: default;
            margin-bottom: 20px;
        }

        .btn-crear {
            background-color: #007BFF;
            color: white;
            font-size: 18px;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            margin-bottom: 50px;
            display: inline-block;
        }

        .btn-crear:hover {
            background-color: #0056b3;
        }

        table {
            margin: 0 auto;
            margin-top: 40px;
            width: 80%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 14px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #bbdefb;
            color: #333;
        }

        td a {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
        }

        td a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Imagen decorativa -->
    <img src="gif/lapiz.gif" alt="Lápiz animado escribiendo" class="header-img">


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

</body>
</html>
