<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Usuario</title>
    <link rel="stylesheet" href="cucu1.css">
</head>
<body>
    <!-- Aquí va tu código PHP para mostrar los detalles del usuario -->
</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "membresias";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$codigo = $_GET['codigo'];
$sql = "SELECT * FROM miembros WHERE codigo_personal = '$codigo'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fechaVencimiento = $row['fecha_vencimiento'];
    $fecha_actual = date("Y-m-d");
    $vigente = ($fecha_actual <= $fechaVencimiento);

    // Botón para regresar en la esquina superior izquierda
    echo "<button onclick='goBack()' class='btn' style='position: fixed; top: 10px; left: 10px; z-index: 1000;'>Regresar</button>";

    // Mostrar detalles del usuario
    echo "<div class='container " . ($vigente ? 'vigente' : 'no-vigente') . "'>
            <h2>Detalles del Usuario</h2>
            <p><strong>Nombre:</strong> " . htmlspecialchars($row['nombre']) . "</p>
            <p><strong>Email:</strong> " . htmlspecialchars($row['correo']) . "</p>";

    // Verificar y mostrar la fecha de registro si existe
    if (isset($row['fecha_registro'])) {
        echo "<p><strong>Fecha de Registro:</strong> " . htmlspecialchars($row['fecha_registro']) . "</p>";
    }

    echo "<p><strong>Fecha de Vencimiento:</strong> " . htmlspecialchars($row['fecha_vencimiento']) . "</p>";

    // Mostrar mensaje si el pago está vigente y se ha realizado
    if ($vigente && isset($row['pago_realizado']) && $row['pago_realizado'] == 1) {
        echo "<p><strong>Estado de Pago:</strong> Pagado</p>";
    }

    echo "</div>";
} else {
    echo "<div class='error'>Usuario no encontrado.</div>";
}

$conn->close();
?>

<script>
function goBack() {
  window.history.back();
}
</script>
