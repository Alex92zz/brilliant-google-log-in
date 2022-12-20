<?php
  include '../db.php';
require_once('core/controller.Class.php');

  $contact_number = mysqli_real_escape_string($conn, $_POST["contact_number"]);
  $email = mysqli_real_escape_string($conn,$_POST["email"]);

  $sql = "UPDATE users SET contact_number='$contact_number' WHERE email='$email'";
  $conn->query($sql);

  $conn->close();
  header("Location: log-in.php");
?>
