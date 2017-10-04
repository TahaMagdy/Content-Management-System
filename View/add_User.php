<?php 
//include_once 'cheakSession.php';
 //include_once 'logout.php';
?>
<?php
echo '';
include_once '../Classes/class_admin.php';
include_once '../Classes/class_person.php';
//include_once 'connect.php';

echo '<center><h3><u>Register New User Page</u> </h3></center><br><br><br>';
$user = new class_person();
if(isset($_SESSION['massge']))
{
    $message = $_SESSION['massge'];
    echo "<script type='text/javascript'>alert('$message');</script>";
    unset($_SESSION['massge']);
}
if(isset($_POST['submit'])){
    

$user->setPasswd($_POST['password']);
$user->setPersonTypeID(1);
$user->setSSN($_POST['ssn']);
$user->setAge($_POST['age']);
$user->setEmail($_POST['email']);
$user->setFirstName($_POST['firstname']);
$user->setSecondName($_POST['secondname']);
$user->setLastName($_POST['lastname']);
$user->setGender($_POST['gender']);
//$user->setJoinDate($_POST['joindate']);
$user->setBirthDay($_POST['birthday']);
$user->setBirthMonth($_POST['birthmonth']);
$user->setBirthYear($_POST['birthyear']);
if(!$user->isUserNameExixt($_POST['username']))
{
    header("location:add_User.php");
    $_SESSION['massge'] = "Please enter onther username ";
}
 else 
     {
     $obj=new class_admin();
     $r=$obj ->add_User ($user);
		if ($r) {

            echo "tmam";
}
    
}


     
// end of if 



    
}  //end of if 
?>
<html>
    <body>
        
        <form  action="add_User.php" method="post" name="add_User.php">
            <table>
                <tr>
                    <td>
                        User Type
                    </td>
                
                    <td>
                        <select name="type" >
                            
                            <?php
                            $admin = new class_admin();
                            $res= $admin->listPersonType();
                            
                              $c=0;
                                while (isset($res[$c]['personTypeID']))
                                {
                                    echo'<option name ="type" value="'.$res[$c]['personTypeID'].'">'.$res [$c]['personTypeString'].'</option>';
                                    $c++;
                                }   
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Username
                    </td>
                    <td>
                        <input type="text" name="username" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
                        Password
                    </td>
                    <td>
                        <input type="text" name="password" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        <input type="email" name="email" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
			age
                    </td>
                    <td>
                        <input type="number" name="age" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
                        gender
                    </td>
                    <td>
                        <input type="text" name="gender" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
                        First Name
                    </td>
                    <td>
                        <input type="text" name="firstname" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
                        Second Name
                    </td>
                    <td>
                        <input type="text" name="secondname" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
                        Last Name
                    </td>
                    <td>
                        <input type="text" name="lastname" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
                        SSN
                    </td>
                    <td>
                        <input type="number" name="ssn" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
                        BirthDay
                    </td>
                    <td>
                        <input type="number" name="birthday" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
                        BirthMonth
                    </td>
                    <td>
                        <input type="number" name="birthmonth" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
                       BirthYear
                    </td>
                    <td>
                        <input type="number" name="birthyear" required="required">
                    </td>
                </tr>
                 <tr>
                 <tr>
                     <td colspan="2">
                         <input type="submit" name="submit" value="Add">
                    </td>
                    
                </tr>
            </table>
            
            
        </form>
        
    </body>
</html>	

