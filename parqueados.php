<?php
$nombrePagina = "Ingreso Correcto";
include 'plantilla.php';
include 'header.php';

//Realizar la coneccion a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$basedatos = "parking_plus_db";

//Crear una conexion
$conexion = new mysqli($servername, $username, $password, $basedatos);

//Verificar la conexion
if ($conexion->connect_error) {
    die("La conexión a la base de datos tuvo un error: " . $conexion->connect_error);
  }

    //Cosultar los vehiculos parquados
    $vehiculosParqueados = "SELECT * FROM vehiculos WHERE estado ='parqueado' ";
    $resultado = $conexion->query($vehiculosParqueados);
    //Obtener los datos como el array multidimencional
    $vehiculos = $resultado->fetch_all(MYSQLI_ASSOC);

?>
<div class="contenedor-listado-paqueados">
    <h3>Vehículo Parqueados</h3>
    <table class="tabla">
        <thead>
            <tr>
                <th>Placa</th>
                <th>Ingreso</th>
            </tr>
        </thead>
        <?php
            if(!empty($vehiculos)) {
                foreach($vehiculos as $vehiculo) {
                    echo"<tr>";
                    echo"<td>";
                    if($vehiculo["tipoVehiculo"] == "carro") {
                        echo "<i class ='fa-solid fa-car'></i>";
                    }
                    elseif($vehiculo["tipoVehiculo"] == "moto") {
                        echo "<i class='fa-solid fa-motorcycle'></i>";
                    }
                    else {
                        echo "<i class='fa-solid fa-bus-simple'></i>";
                    }
                    echo $vehiculo["placa"] . "</td>";
                    echo"<td>". $vehiculo["fechaHoraIngreso"] ."</td>";
                    echo"</tr>";
                }
            } else {
                echo "<tr><td cosplan='5'>NO Hay Vehiculos Parqueados</td></tr> ";
            }
        ?>
    </table>
</div>
<?php include'footer.php'; ?>