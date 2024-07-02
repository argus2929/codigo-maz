<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Usuarios</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap">
    <link rel="stylesheet" href="cucu.css">
</head>
<body>
    <button class="back-button" onclick="window.history.back()">Volver</button>

    <div class="container">
        <h1>Buscar Usuario por Código</h1>
        <form action="buscar.php" method="GET" id="buscarForm">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="codigo" placeholder="Código" required>
            <button type="submit">Buscar</button>
        </form>
        <div id="usuarioInfo" class="usuario-info"></div>

        <h1>Registro de Usuarios</h1>
        <form action="registrar.php" method="POST" id="registroForm">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="codigo" placeholder="Código" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>
