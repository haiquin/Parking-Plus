<?php
$nombrePagina = "Ingreso Correcto";
include 'plantilla.php';
include ' header.php';
?>

<div class="mensaje-exitoso">
    <h3>Ingreso OK del Vehículo</h3>
    <p>El nuevo vehículo ha sido ingresado correctamente</p>
</div>

<?php include 'footer.php'; ?>

<script>
    //Redirigir automaicamente despues de dos seg
    setTimeout (function(){
        window.location.href="nuevoIngreso.php";
    }, 2000);
</script>