<?php
  include '../db.php';
require_once('core/controller.Class.php');


    
  $section_title = mysqli_real_escape_string($conn, $_POST["section_title"]);
  $section_text = mysqli_real_escape_string($conn, $_POST["section_text"]);
  $f_name = mysqli_real_escape_string($conn, $_POST["f_name"]);
  $l_name = mysqli_real_escape_string($conn, $_POST["l_name"]);
  $email = mysqli_real_escape_string($conn,$_POST["email"]);

  $sql = "INSERT INTO content (f_name, l_name, email, section_title, section_text) values ('$f_name', '$l_name','$email','$section_title', '$section_text')";
  $conn->query($sql);

  $conn->close();
  header("Location: website-content.php");
?>
