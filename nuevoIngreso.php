<?php
$nombrePagina = "Nuevo Ingreso";
include 'plantilla.php';
include 'header.php';
include 'conexionbasedatos.php';

//Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //CAPTURA DE DATOS DEL FORMULARIO

  $tipoVehiculo = $_POST["tipoVehiculo"];
  $marca = $_POST["marca"];
  $color = $_POST["color"];
  $placa = $_POST["placa"];
  $observaciones = $_POST["observaciones"];

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

  //Armar la consulta SQL para la insercion
  $insertar = "INSERT INTO vehiculos (tipoVehiculo, marca, color, placa, observaciones)
  VALUES ('$tipoVehiculo', '$marca', '$color', '$placa', '$observaciones')";
  
  //Ejecutar la consulta
  if ($conexion->query($insertar) === TRUE) {
    //Registre al archivo exito .php despues de la incripción en la BD
    header("location:exito.php");
    exit;
  }
 else {
    echo "Error: " . $insertar . "<br>" . $conexion->error;
  }
//Cerrar la conexion
$conexion->close();
}

?>

<div class="contenedor-nuevo-ingreso">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="nuevoIngreso" method="post">
    <h3>Información del Vehículo</h3>

    <div class="control-form">
      <label>Tipo Vehículo</label><br />
      <select name="tipoVehiculo" tipoVehiculo>
        <option value="Carro">Carro</option>
        <option value="Moto">Moto</option>
        <option value="Otro">Otro</option>
      </select>
    </div>
    <div class="control-form">
      <label>Marca:</label>
      <input type="text" id="marca" name="marca" autocomplete="off" />
    </div>
    <div class="control-form">
      <label>Color:</label>
      <input type="text" id="color" name="color" autocomplete="off" />
    </div>
    <div class="control-form">
      <label>Placa:</label>
      <input type="text" id="placa" name="placa" autocomplete="off"/>
    </div>
    <div class="control-form">
      <label>Observaciones:</label>
      <input type="text" id="observaciones" name="observaciones" autocomplete="off"/>
    </div>
    <button class="botonNuevoVehiculo" type="submit">Ingresar vehiculo</button>
  </form>
</div>

<?php include 'footer.php'; ?>