<?php

    session_start();

    include('conexion_be.php');

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    if(empty($correo) || empty($contrasena)) {
        echo '
            <script>
                alert("Por favor, ingrese tanto usuario como contraseña.");
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

    $contrasena = hash('sha512', $contrasena);

    $validar_login = mysqli_query($conexion,"SELECT * FROM usuarios WHERE correo='$correo'
                    and contrasena='$contrasena'");

    if(mysqli_num_rows($validar_login) > 0) {
        $_SESSION['usuario'] = $correo;
        header("location: ../bienvenido.php");
        exit;
    }else{
        echo '
            <script>
                alert("El usuario NO existe. Verifique los datos introducidos...");
                window.location = "../index.php";
            </script>
        ';
        exit;
    }


?>