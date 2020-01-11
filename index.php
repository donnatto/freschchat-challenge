<?php
include('db.php');

include('includes/header.php');
include('includes/nav.php');
?>
<!-- Body Start -->
  <div class="container p-4">
    <div class="row">
      <div class="col-md-4">
        <div class="card card-body">
          <form action="save_task.php" method="POST">
            <!-- Nombre -->
            <div class="form-group">
              <input type="text" name="firstname" class="form-control" placeholder="Nombre" autofocus>
            </div>
            <!-- Apellido -->
            <div class="form-group">
              <input type="text" name="lastname" class="form-control" placeholder="Apellido">
            </div>
            <!-- Telefono -->
            <div class="form-group">
              <input type="text" name="phone" class="form-control" placeholder="Numero de teléfono">
            </div>
            <!-- Correo -->
            <div class="form-group">
              <input type="email" name="lastname" class="form-control" placeholder="Correo electrónico">
            </div>
            <!-- Doc Identidad -->
            <div class="form-group">
              <input type="text" name="lastname" class="form-control" placeholder="Documento de Identidad">
            </div>
            <input type="submit" class="btn btn-outline-primary btn-block" name="save_task" value="Guardar">
          </form>
        </div>
      </div>
      <div class="col-md-8"></div>
    </div>
  </div>

<?php
include('includes/footer.php');
?>