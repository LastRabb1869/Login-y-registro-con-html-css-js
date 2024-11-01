<?php

    session_start();

    if (!isset($_SESSION['usuario'])) {
        echo'
            <script>
                alert("Es necesario iniciar sesión.");
                window.location = "index.php";
            </script>
        
        ';
        session_destroy();
        die();
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de bienvenida</title>
</head>
<body>
    <h1>HELLO WORLD</h1>

    <a href="php/cerrar_sesion.php">Cerrar sesión.</a>
</body>
</html>