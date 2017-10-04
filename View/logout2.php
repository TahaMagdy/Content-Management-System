<?php
session_start();
if(isset($_POST['logout']))
{
session_start();
include_once '../Classes/class_person.php';
$per = new class_person();
$per->logout();
  header("Location: ..");
}// logout 
?>
