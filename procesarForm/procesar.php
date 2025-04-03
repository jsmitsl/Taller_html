<?php
/**
 * procesar.php
 * Este script procesa los datos enviados desde un formulario HTML.
 * El formulario incluye campos para nombre, email, fecha de nacimiento, género y teléfono.
 * Al enviar el formulario, los datos son validados y se muestra la información ingresada por el usuario.
 */

// Se verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $genero = $_POST["genero"];
    $telefono = $_POST["telefono"];

    // Validar datos
    if (empty($nombre) || empty($email) || empty($fecha_nacimiento) || empty($genero) || empty($telefono)) {
        echo "Por favor, complete todos los campos.";
        //esperar 3 segundos y regresar al formulario 
        header("refresh:3;url=index.html");
        exit;
    }
    // calcular edad
    $fecha_nacimiento = new DateTime($fecha_nacimiento);
    $hoy = new DateTime();
    $edad = $hoy->diff($fecha_nacimiento)->y;
    // Mostrar datos
    echo "<h2>Datos del formulario:</h2>";
    echo "<p><strong>Nombre:</strong> " . $nombre . "</p>";
    echo "<p><strong>Email:</strong> " . $email . "</p>";
    echo "<p><strong>Fecha de nacimiento:</strong> " . $fecha_nacimiento->format('Y-m-d') . "</p>";
    echo "<p><strong>Edad:</strong> " . $edad . " años</p>";
    echo "<p><strong>Género:</strong> " . $genero . "</p>";
    echo "<p><strong>Teléfono:</strong> " . $telefono . "</p>";
} else {
    echo "No existen Datos.";
}
