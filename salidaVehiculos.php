<?php
$nombrePagina = "Salida Vehículo";
include 'plantilla.php';
include 'header.php';
include 'conexionbasedatos.php';

// Escapa el texto de la placa para prevenir inyección SQL
$placa = $conexion->real_escape_string($_POST['placa']);

// Consulta SQL para obtener la información del vehículo
$consulta = "SELECT * FROM vehiculos WHERE placa = '$placa' AND estado = 'parqueado'";
$resultado = $conexion->query($consulta);
?>


<div class="contenedor-salida-vehiculo">
    <h3>Salida del vehículo</h3>

    <div class="buscador">
        <form action="" method="post">
            <label style="margin-top: 15px;">Placa:</label>
            <input name="placa" type="text" placeholder="Ingresa la placa del vehículo sin espacios">
            <button>Buscar</button>
        </form>
    </div>

    <?php

    $tarifaCarro = 3000;
    $tafifaMoto = 2000;

    if ($resultado->num_rows > 0) {
        // Mostrar la información del vehículo
    
        $vehiculo = $resultado->fetch_assoc();

        echo '<div class="informacion">
            <div class="izquierda">Vehículo</div>
            <div class="derecha disenoPlaca">' . $vehiculo['placa'] . '</div>
            <div class="izquierda">Fecha y Hora de Ingreso</div>
            <div class="derecha">' . $vehiculo['fechaHoraIngreso'] . '</div>
            <div class="izquierda">Tiempo consumido</div>
            <div class="derecha">0 Hora, 23 min, 09 seg</div>
            <div class="izquierda">Total a Pagar</div>
            <div class="derecha">$1500 COP</div>
        </div>';
    } else {
        echo "No se encontró ningún vehículo con esa placa.";
    }
    $conexion->close();

    ?>


    <div class="botones-acciones">
        <button class="btnAccion btnCobrar">Cobrar</button>
        <button class="btnAccion btnCancelar">Cancelar</button>
    </div>
</div>

<?php include 'footer.php'; ?>