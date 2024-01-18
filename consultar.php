<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Consultar Personas</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">Proyecto SENA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'registrar.php' ? 'active' : ''; ?>" href="registrar.php">Registrar <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'consultar.php' ? 'active' : ''; ?>" href="consultar.php">Consultar <span class="sr-only">(current) </span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'eliminar.php' ? 'active' : ''; ?>" href="eliminar.php">Eliminar <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'actualizar.php' ? 'active' : ''; ?>" href="actualizar.php">Actualizar <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="container-sm">
        <table class="table caption-top">
            <caption>Lista de personas</caption>
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">TD</th>
                    <th scope="col">Documento</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Motivo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('conexion.php');
                $SQL = 'SELECT id, td, identificacion, nombre, apellido, telefono, direccion, fecha_ing, hora_ing, motivo FROM personas';
                $stmt = $conexion->prepare($SQL);
                $result = $stmt->execute();
                $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td><?php print($row['id']) ?></td>
                        <td><?php print($row['td']) ?></td>
                        <td><?php print($row['identificacion']) ?></td>
                        <td><?php print($row['nombre']) ?></td>
                        <td><?php print($row['apellido']) ?></td>
                        <td><?php print($row['telefono']) ?></td>
                        <td><?php print($row['direccion']) ?></td>
                        <td><?php print($row['fecha_ing']) ?></td>
                        <td><?php print($row['hora_ing']) ?></td>
                        <td><?php print($row['motivo']) ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>          
</body>
</html>