<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Registrar Persona</title>
    
        
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
<div class="container-sm" style="margin-top:1%">
    <form method="POST" action="registrar.php">
        <p>Por favor, diligencie todos los campos de este formulario.</p>
        <div class="form-group">
            <select name="txtTD" class="form-control" required>
                <option value="CC">Cédula de ciudadanía</option>
                <option value="TI">Tarjeta de identidad </option>
                <option value="CE">Cédula de extranjería</option>
            </select>
        </div>
        <div class="form-group">
            <label for="txtDoc">Identificación</label>
            <input type="text" class="form-control" name="txtDoc" placeholder="Ingrese el documento de identidad" required>
        </div>
        <div class="form-group">
            <label for="txtNombres">Nombres</label>
            <input type="text" class="form-control" name="txtNombres" placeholder="Ingrese Nombres" required>
        </div>
        <div class="form-group">
            <label for="txtApellidos">Apellidos</label>
            <input type="text" class="form-control" name="txtApellidos" placeholder="Ingrese Apellidos" required>
        </div>
        <div class="form-group">
            <label for="txt Telefono">Teléfono</label>
            <input type="number" class="form-control" name="txtTelefono" placeholder="Ingrese Teléfono o celular" required>
        </div>
        <div class="form-group">
            <label for="txtDir">Dirección</label>
            <input type="text" class="form-control" name="txtDir" placeholder="Ingrese la dirección" required>
        </div>
        <div class="form-group">
            <label for="txtFecha">Fecha</label>
            <input type="date" class="form-control" name="txtFecha" placeholder="Ingrese la fecha de ingreso" required>
        </div>
        <div class="form-group">
            <label for="txtHora">Hora</label>
            <input type="time" class="form-control" name="txtHora" placeholder="Ingrese la fecha de ingreso" required>
        </div>
        <div class="form-group">
            <label for="txtMotivo">Motivo</label>
            <input type="text" class="form-control" name="txtMotivo" placeholder="Ingrese el motivo de ingreso" required>
        </div>
        <input type="submit" class="btn btn-primary" value="Registrar">
    </form>
    <?php
if ($_POST) {
    $td = $_POST['txtTD'];
    $id = $_POST['txtDoc'];
    $nom = $_POST['txtNombres'];
    $ape = $_POST['txtApellidos'];
    $tel = $_POST['txtTelefono'];
    $dir = $_POST['txtDir'];
    $fech = $_POST['txtFecha'];
    $hora = $_POST['txtHora'];
    $mot = $_POST['txtMotivo'];

    require_once('conexion.php');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'INSERT INTO personas (td, identificacion, nombre, apellido, telefono, direccion, fecha_ing, hora_ing, motivo) VALUES (:td, :i, :n, :a, :t, :d, :f, :h, :m)';
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(":td", $td);
    $stmt->bindParam(":i", $id);
    $stmt->bindParam(":n", $nom);
    $stmt->bindParam(":a", $ape);
    $stmt->bindParam(":t", $tel);
    $stmt->bindParam(":d", $dir);
    $stmt->bindParam(":f", $fech);
    $stmt->bindParam(":h", $hora);
    $stmt->bindParam(":m", $mot);
    $stmt->execute();

    print("<script> alert('Registro guardado con éxito'); </script>");
}
?>
</div>
<style>
        /* Estilos para el contenedor principal */
        body {
            background-color: #f8f9fa; /* Cambia el color de fondo según tus preferencias */
        }

        .container-sm {
            max-width: 800px; /* Ajusta el ancho máximo del contenedor según tus necesidades */
            margin: 0 auto; /* Centra el contenedor horizontalmente */
            padding: 20px; /* Añade relleno alrededor del contenido */
            margin-top: 50px; /* Añade margen superior según tus necesidades */
        }
    </style>
</body>

</html>