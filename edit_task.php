<?php

include('db.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM users WHERE id = $id";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $phone = $row['phone'];
    $email = $row['email'];
    $personal_doc = $row['personal_doc'];
  }
};

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $first_name = $_POST['firstname'];
  $last_name = $_POST['lastname'];
  $phone = $_POST['phone'];
  $email = $_POST['mail'];
  $personal_doc = $_POST['personaldoc'];

  $query = "UPDATE users set first_name = '$first_name', last_name = '$last_name', phone = '$phone', email = '$email', personal_doc = '$personal_doc' WHERE id = $id";
  mysqli_query($conn, $query);

  $_SESSION['message'] = 'Usuario actualizado';
  $_SESSION['message_type'] = 'info';
  header("Location: index.php");
};

include('includes/header.php');
include('includes/nav.php');
?>
  <!-- Body Start -->
  <div class="container p-4">
    <div class="row">
      <div class="col-md-4 mx-auto">
        <div class="card card-body">
          <form action="edit_task.php?id=<?= $_GET['id']; ?>" method="POST">
            <!-- Nombre -->
            <div class="form-group">
              <input type="text" name="firstname" value="<?php echo $first_name?>" class="form-control" placeholder="Nombre">
            </div>
            <!-- Apellido -->
            <div class="form-group">
              <input type="text" name="lastname" value="<?php echo $last_name?>" class="form-control" placeholder="Apellido">
            </div>
            <!-- Telefono -->
            <div class="form-group">
              <input type="text" name="phone" value="<?php echo $phone?>" class="form-control" placeholder="Num telf">
            </div>
            <!-- Correo -->
            <div class="form-group">
              <input type="email" name="mail" value="<?php echo $email?>" class="form-control" placeholder="Correo electrónico">
            </div>
            <!-- Doc Identidad -->
            <div class="form-group">
              <input type="text" name="personaldoc" value="<?php echo $personal_doc?>" class="form-control" placeholder="Documento de Identidad">
            </div>
            <button type="submit" class="btn btn-block btn-primary" name="update">Editar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php
include('includes/footer.php');
?>