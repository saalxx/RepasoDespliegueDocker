<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Películas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            vertical-align: top;
            text-align: left;
        }

        th {
            font-weight: bold;
            border-bottom: 2px solid #000;
        }

        img {
            max-width: 100px;
        }

        a {
            color: blue;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h1>Listado de Películas</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Director</th>
            <th>Nota</th>
            <th>Año</th>
            <th>Presupuesto</th>
            <th>Imagen (Base64)</th>
            <th>URL del Trailer</th>
        </tr>
    </thead>
    <tbody>

    <?php
    // Conexión a la base de datos
    $conexion = new mysqli("db", "usuario1", "contrasenyaUsuario1", "cine");

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $sql = "SELECT * FROM peliculas";
    $resultado = $conexion->query($sql);

    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$fila['id']}</td>";
        echo "<td>{$fila['titulo']}</td>";
        echo "<td>{$fila['director']}</td>";
        echo "<td>{$fila['nota']}</td>";
        echo "<td>{$fila['anio']}</td>";
        echo "<td>{$fila['presupuesto']}</td>";
        echo "<td>
                <img src='data:image/jpeg;base64,{$fila['imagen_base64']}' alt='Poster'>
              </td>";
        echo "<td>
                <a href='{$fila['trailer_url']}' target='_blank'>Ver Trailer</a>
              </td>";
        echo "</tr>";
    }

    $conexion->close();
    ?>

    </tbody>
</table>

</body>
</html>
