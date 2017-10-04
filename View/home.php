<?php
session_start();
include_once 'logout.php';
    if (isset($_SESSION['userName']))
{
    echo 'ss';
   // header('Location:View/home.php');
}

   include_once '../Classes/class_admin.php';
   $admin = new class_admin();
  // $_SESSION['ID'] = 1;
   if (isset($_SESSION['ID']))
   {
        $id= $_SESSION['ID'] ;
        $type= $_SESSION['type'];
        $firstName= $_SESSION['firstName'];
        $secondName=$_SESSION['secondName'] ;
        $email= $_SESSION['email'];
        $userName= $_SESSION['userName'];
       echo "hello  ".$userName;
       echo '</br>';
       $result= $admin ->listRoleLinks($type);
       $c = 0;
       while (isset( $result[$c]['path'] ))
        {
           echo '</br>';
            echo '<a href="'.$result[$c]['path'].'">'.$result[$c]['title'].'</a>'; 
            $c++; 
        }
               
   }
 else {
  echo 'helo';     
}
 ?>
    
</html>

