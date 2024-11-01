<?php

    include 'conexion_be.php';

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];


    if(empty($nombre_completo) || empty($correo) || empty($usuario) || empty($contrasena)) {
        echo '
            <script>
                alert("Por favor, complete todos los campos.");
                window.location = "../registro.php";
            </script>
        ';
        exit();
    }

    if(!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo '
            <script>
                alert("Por favor, ingrese un correo electrónico válido.");
                window.location = "../registro.php";
            </script>
        ';
        exit();
    }

    if(!preg_match('/^[a-zA-Z0-9]+$/', $usuario)) {
        echo '
            <script>
                alert("El nombre de usuario solo puede contener letras y números.");
                window.location = "../registro.php";
            </script>
        ';
        exit();
    }

    $contrasena = hash('sha512', $contrasena);

    $query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena)
              VALUES ('$nombre_completo', '$correo', '$usuario', '$contrasena')";

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
                alert("¡Usuario registrado exitosamente!");
                window.location = "../index.php";
            </script>
        ';
    }

?>