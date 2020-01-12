<?php
include('db.php');

include('includes/header.php');
include('includes/nav.php');
?>
<!-- Body Start -->
  <div class="container p-4">
    <div class="row">

    <!-- User form -->
      <div class="col-md-3">

      <!-- Save validation -->
      <?php
      if (isset($_SESSION['message'])) {
      ?>
        <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="close" data-dismiss="alert">
          &times;
        </button>
        </div>
      <?php
        session_unset();
      }
      ?>

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
              <input type="text" name="phone" class="form-control" placeholder="Num telf">
            </div>
            <!-- Correo -->
            <div class="form-group">
              <input type="email" name="mail" class="form-control" placeholder="Correo electrónico">
            </div>
            <!-- Doc Identidad -->
            <div class="form-group">
              <input type="text" name="personaldoc" class="form-control" placeholder="Documento de Identidad">
            </div>
            <input type="submit" class="btn btn-outline-primary btn-block" name="save_task" value="Guardar">
          </form>
        </div>
      </div>

      <!-- Users list -->
      <div class="col-md-9">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Telefono</th>
              <th>Correo</th>
              <th>Doc ID</th>
              <th>Creado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = 'SELECT * FROM users';
            $users = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($users)) {
            ?>
              <tr>
                <td><?php echo $row['first_name'] ?></td>
                <td><?php echo $row['last_name'] ?></td>
                <td><?php echo $row['phone'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['personal_doc'] ?></td>
                <td><?php echo $row['created_at'] ?></td>
                <td>
                  <a href="edit_task.php?id=<?=$row['id']?>" class="btn btn-sm btn-info"><i class="fas fa-pen-square"></i></a>
                  <a href="delete_task.php?id=<?=$row['id']?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<?php
include('includes/footer.php');
?>