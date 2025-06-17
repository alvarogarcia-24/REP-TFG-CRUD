<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = ""; 
$basededatos = "tfg_crud";

// Crear conexión
$conexion = new mysqli($servidor, $usuario, $contrasena, $basededatos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>

