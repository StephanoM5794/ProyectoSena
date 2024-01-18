<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Document</title>
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

    <div class="alert alert-danger" role="alert">
        <b>Aviso: </b> La persona será eliminada permanentemente
    </div>
    <form action="eliminar.php" method="POST">
        <div class="form-group">
            <label for="txtTD">Tipo Documento</label>
            <select name="txtTD" class="form-control">
                <option value="CC">Cédula de ciudadanía</option>
                <option value="TI">Tarjeta de Identidad </option>
                <option value="CE">Cédula de Extranjería</option>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label for="txtID">Ingrese una Identificación</label>
        <input type="text" class="form-control" name="txtID" placeholder="Indentificación" required>
    </div>
    <input type="submit" class="btn btn-danger" value="Eliminar">
    </form>
<?php
if($_POST) {
    $td = $_POST['txtTD'];
    $id = $_POST['txtID'];
    require_once('conexion.php');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $SQL = "DELETE FROM personas WHERE td=:td AND identificacion=:id";
    $stmt = $conexion->prepare($SQL);
    $stmt->bindParam('td', $td);
    $stmt->bindParam('id', $id);
    $stmt->execute();
    print("<script> alert('Registro eliminado con éxito'); </script>");
}
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </div>
</body>
</html>