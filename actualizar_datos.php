<?php
if ($_POST) {
    $id = $_POST['txtCodigo'];
    $td = $_POST['txtTDoc'];
    $identificacion = $_POST['txtDoc'];
    $nombres = $_POST['txtNombres'];
    $apellidos = $_POST['txtApellidos'];
    $telefono = $_POST['txtTelefono'];
    $direccion = $_POST['txtDir'];
    $fecha_ingreso = $_POST['txtFecha'];
    $hora_ingreso = $_POST['txtHora'];
    $motivo = $_POST['txtMotivo'];

    require_once('conexion.php');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $SQL = 'UPDATE personas 
            SET td=:td, identificacion=:identificacion, nombre=:nombres, apellido=:apellidos, 
                telefono=:telefono, direccion=:direccion, fecha_ing=:fecha_ingreso, 
                hora_ing=:hora_ingreso, motivo=:motivo 
            WHERE id=:id';

    $stmt = $conexion->prepare($SQL);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':td', $td);
    $stmt->bindParam(':identificacion', $identificacion);
    $stmt->bindParam(':nombres', $nombres);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':fecha_ingreso', $fecha_ingreso);
    $stmt->bindParam(':hora_ingreso', $hora_ingreso);
    $stmt->bindParam(':motivo', $motivo);

    try {
        $stmt->execute();
        echo "<script>alert('Registro actualizado exitosamente!');</script>";
        echo "<script>window.location.href='actualizar.php';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header('Location: actualizar.php'); 
    exit();
}
?>
