<?php
  $nombrePagina = "Dashboard";
  include 'plantilla.php';
  include 'header.php';
?>

<div class="cuadricula">
  <div class="boton">
    <div class="boton-menu">
      <i class="fa-solid fa-circle-plus"></i>
    </div>
    <h3>Nuevo Ingreso</h3>
  </div>

  <div class="boton">
    <div class="boton-menu">
      <i class="fa-solid fa-angles-right"></i>
    </div>
    <h3>Salida Vehiculos</h3>
  </div>

  <div class="boton">
    <div class="boton-menu">
      <i class="fa-solid fa-car-side"></i>
    </div>
    <h3>Parqueados</h3>
  </div>

  <div class="boton">
    <div class="boton-menu">
      <i class="fa-solid fa-chart-line"></i>
    </div>
    <h3>Reporte Diario</h3>
  </div>
</div>

<?php include 'footer.php'; ?>