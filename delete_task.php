<?php

include('db.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM public.users WHERE id = $id";
  $result = pg_query($conn, $query);
  if (!$result) {
    die('Query failed');
  }

  $_SESSION['message'] = 'Usuario eliminado';
  $_SESSION['message_type'] = 'danger';
  header("Location: index.php");
}