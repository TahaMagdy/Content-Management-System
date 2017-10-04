<?php 
session_start();
if(isset($_SESSION['rr']))
{
    $message = $_SESSION['rr'];
    echo "<script type='text/javascript'>alert('$message');</script>";
}


session_destroy();



 ?>

<html >
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    
        <link rel="stylesheet" href="View/css/style.css">


  </head>
  <body>
      <form action="login.php" method="post">
  <header>Login</header>
  <label>Username *</label>
  <input type="name" name ="username" placeholder="User Name" />
  <label>Password *</label>
  <input type="password" name ="password" placeholder="password"/>
<label>Remember
  <input type="checkbox" name="remember"/> </label>


  <button type="submit" name="sub" >Login</button>

</form>
    
    
    
    
    
  </body>
</html>
