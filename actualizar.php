<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>actualizar personas</title>
    
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
<div class="container" style="margin: 0 auto;">
<div class="container-sm" style="margin-top:1%">
    <form action="actualizar.php" method="POST">
        <div class="form-group">
            <label for="txtTD">Tipo Documento</label>
            <select name="txtTD" class="form-control">
                <option value="CC">Cédula de ciudadanía</option>
                <option value="TI">Tarjeta de Identidad</option>
                <option value="CE">Cédula de Extranjería</option>
            </select>
        </div>
        <div class="form-group">
            <label for="txtID">Ingrese una Identificación</label>
            <input type="text" class="form-control" name="txtID" placeholder="Indentificación" required>
        </div>
        <input type="submit" class="btn btn-success" value="Buscar">
    </form>
    </div>
    <?php
if ($_POST) {
    $td = $_POST['txtTD'];
    $id = $_POST['txtID'];

    require_once('conexion.php');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $SQL = 'SELECT * FROM personas WHERE td=:td AND identificacion=:id';
    $stmt = $conexion->prepare($SQL);
    $stmt->bindParam('td', $td);
    $stmt->bindParam('id', $id);
    $result = $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($rows)) {
        foreach ($rows as $row) {
?>
<form method="POST" action="actualizar_datos.php">
                <p>Por favor, diligencie todos los campos de este formulario, para actualizar.</p>
                <input type="hidden" name="txtCodigo" readonly value="<?php print($row['id']) ?>" />
                <div class="form-group" >
                    <select name="txtTDoc" class="form-control" required>
                        <option value="CC">Cédula de ciudadanía</option>
                        <option value="TI">Tarjeta de identidad</option>
                        <option value="CE">Cédula de extranjería</option>
                    </select>
                </div>
                <div class="form-group" >
                    <label for="txtDoc">Identificación</label>
                    <input type="text" class="form-control" name="txtDoc" placeholder="Ingrese el documento de identidad" required value="<?php print($row['identificacion']) ?>">
                </div>
                <div class="form-group">
                    <label for="txtNombres" >Nombres</label>
                    <input type="text" class="form-control" name="txtNombres" placeholder="Ingrese Nombres" required value="<?php print ($row['nombre']) ?>">
                </div>
                <div class="form-group">
                    <label for="txtApellidos">Apellidos</label>
                    <input type="text" class="form-control" name="txtApellidos" placeholder="Ingrese Apellidos" required value="<?php print ($row['apellido']) ?>">
                </div>
                <div class="form-group">
                    <label for="txtTelefono">Teléfono</label>
                    <input type="number" class="form-control" name="txtTelefono" placeholder="Ingrese Teléfono o celular" required value="<?php print($row['telefono']) ?>">
                </div>
                <div class="form-group">
                    <label for="txtDir" >Dirección </label>
                    <input type="text" class="form-control" name="txtDir" placeholder="Ingrese la dirección" required value="<?php print($row['direccion']) ?>">
                </div>
                <div class="form-group">
                    <label for="txtFecha">Fecha</label>
                    <input type="date" class="form-control" name="txtFecha" placeholder="Ingrese la fecha de ingreso" required value="<?php print ($row['fecha_ing']) ?>">
                </div>
                <div class="form-group">
                    <label for="txtHora">Hora</label>
                    <input type="time" class="form-control" name="txtHora" placeholder="Ingrese la fecha de ingreso" required value="<?php print($row['hora_ing']) ?>">
                </div>
                <div class="form-group">
                    <label for="txtMotivo">Motivo</label>
                    <input type="text" class="form-control" name="txtMotivo" placeholder="Ingrese el motivo de ingreso" required value="<?php print($row['motivo']) ?>">
                </div>
                <input type="submit" class="btn btn-success" value="Actualizar persona">
            </form>
        <?php
        }
    }else{
        ?>
<div class="alert alert-danger" role="alert" style="margin-top:1%">
    <b>Aviso:</b> ¡El usuario no existe!.
</div>
<?php
    }
}
?>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>