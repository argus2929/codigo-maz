<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="cucu3.css"> <!-- Enlaza tu archivo de estilos CSS aquí -->
</head>
<body>
    <div class="container">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "membresias";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $codigo = $_POST['codigo'];
        $contrasena = $_POST['contrasena'];

        $fechaRegistro = date("Y-m-d");
        $fechaVencimiento = date("Y-m-d", strtotime("+30 days"));

        $sql = "INSERT INTO miembros (nombre, correo, codigo_personal, numero, fecha_vencimiento) 
                VALUES ('$nombre', '$email', '$codigo', '$contrasena', '$fechaVencimiento')";

        if ($conn->query($sql) === TRUE) {
            // Muestra el mensaje de éxito con estilos CSS
            echo "<div class='success-message'>
                    <h2>Registro Exitoso</h2>
                    <p><strong>Nombre:</strong> " . htmlspecialchars($nombre) . "</p>
                    <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
                    <p><strong>Código Personal:</strong> " . htmlspecialchars($codigo) . "</p>
                    <p><strong>Fecha de Registro:</strong> " . htmlspecialchars($fechaRegistro) . "</p>
                    <p><strong>Fecha de Vencimiento:</strong> " . htmlspecialchars($fechaVencimiento) . "</p>
                  </div>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        
        ?>
    </div>
</body>
</html>
