<?php
include_once  'Classes/class_person.php';
        $ob = new class_person();
    session_start();
if (isset($_POST['username'])&& isset($_POST['password']))
{
    //echo $_POST['username'];
    // take a user name from user to object
    $ob->setUserName($_POST['username']);
    echo $_POST['username'];
    //echo $ob->getUserName();
    // take a password from user to object
    $ob->setPasswd($_POST['password']);
    echo $_POST['password'];
       // echo $ob->getPasswd();
    // set coikie
    if(isset($_POST['remember']))
    {
        setcookie('username', $_POST['username']);
        setcookie('password', $_POST['password']);
        
    }// end if set cookie
    $result = $ob->login();
    if($result)
    {
        echo 'hi'; 
        echo '</br>';
        echo $ob->getAge();
        $ID = $ob->getID();
        $type= $ob->getPersonTypeID();
        $firstName = $ob->getFirstName();
        $secondName = $ob->getSecondName();
        $ssn = $ob->getSSN(); 
        $email = $ob->getEmail();
        $userName = $ob->getUserName();
        ///////set sission /////
        $_SESSION['ID'] = $ID;
        $_SESSION['type']= $type;
        $_SESSION['firstName']= $firstName;
        $_SESSION['secondName'] = $secondName;
        $_SESSION['email']= $email;
        $_SESSION['userName']= $userName;

        header('Location:View/home.php');
        
    }// end if there is result
    else
    {
       
        header('Location:index.php'); 

        $_SESSION['rr']= "invalid username and password";
    }// else if there is invalid username and pass

    
}
	

?>
