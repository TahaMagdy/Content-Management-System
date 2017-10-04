<?php
session_start();
include_once '../Classes/class_admin.php';
    $admin = new class_admin();
    if(isset($_SESSION['type']))
    {
    $page = '../View/'.basename($_SERVER['PHP_SELF']);
    $type = $_SESSION['type'];
    //echo $type;
    $per = $admin ->isPagePremmited($page, $type);
    if ($per)
    {
       // echo 'ahla beek'; 
        $id= $_SESSION['ID'] ;
        $type= $_SESSION['type'];
        $firstName= $_SESSION['firstName'];
        $secondName=$_SESSION['secondName'] ;
        $email= $_SESSION['email'];
        $userName= $_SESSION['userName'];
       echo "hello  ".$userName;
    }
    
    else 
  {
      echo "not premmted";
    header("location:../View/home.php");
  }


}// end if 
else 
{
    header("location:../View/home.php");
}

