<?php
include_once 'cheakSession.php';
?>
<?php
include_once 'logout.php';
include_once '../Classes/class_admin.php';
echo '<center><h3><u>View All Users  Page</u> </h3></center><br><br><br>';


       $admin_object=new class_admin();
       $data=$admin_object->show_All_users();


 
 echo '<table><tr bgcolor="cyan"><td>User ID</td><td>Username</td><td>Password</td><td>Email</td><td>age</td><td>gender</td><td>First Name</td><td>Second Name</td><td>Last name</td><td>SSN</td><td>Birth Day</td><td>Birth month</td><td>Birth Year</td><td>Join Date</td>
<td>User Type</td>

      </tr>';

 $count=0;
 for($rows=0;$rows<count($data);$rows++)
 {
     $row=$data[$rows];


     echo '<form action="show.php" method="post"';
     echo '<tr><td><input type="text" name="id" value='.$row[0].' readonly ></td>'
             . '<td><input type="text" name="username" value="'.$row[1].'"required="required" ></td>'
             . '<td><input type="text" name="password" value="'.$row[2].'" required="required" >'
             . '</td><td><input type="text" name="email" value="'.$row[3].'"required="required" ></td>'
             . '<td><input type="text" name="age" value="'.$row[4].'"required="required" ></td>'
             . '<td><input type="text" name="gender" value="'.$row[5].'"required="required" ></td>'
             . '<td><input type="text" name="firstname" value="'.$row[6].'"required="required" ></td>'
             . '<td><input type="text" name="secondname" value="'.$row[7].'"required="required" ></td>'
             . '<td><input type="text" name="lastname" value="'.$row[8].'"required="required" ></td>'
             . '<td><input type="text" name="ssn" value="'.$row[9].'"required="required" ></td>'
             . '<td><input type="text" name="birthday" value="'.$row[10].'"required="required" ></td>'
             . '<td><input type="text" name="birthmonth" value="'.$row[11].'"required="required" ></td>'
             . '<td><input type="text" name="birthyear" value="'.$row[12].'"required="required" ></td>'
             . '<td><input type="text" name="joindate" value="'.$row[13].'"required="required" ></td>'
             . '<td><input type="text" name="type" value="'.$row[14].'"required="required" ></td>' 
             . '<td> <select name="type" >';			  
                            $admin = new class_admin();
                            $res= $admin->listPersonType();

            $c=0;
              while (isset($res[$c]['personTypeID']))
              {
                  echo'<option name ="type" value="'.$res[$c]['personTypeID'].'">'.$res [$c]['personTypeString'].'</option>';
                  $c++;
              }  
              echo '</select>';

           echo' </select><td><input type="submit" name="update" value="Update"></form></td>'
             . '<td><form action="show.php" method="post"><input type="hidden" name="id" value='.$row[0].'>'
                            
             . '<br><input type="submit" name="delete" value="Delete"></form></td></tr>';
    $count++;

     } // End of loop


if(isset($_POST['update'])){
    $username=$_POST['username'];
    $id=$_POST['id'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $firstname=$_POST['firstname'];
    $secondname=$_POST['secondname'];
    $lastname=$_POST['lastname'];
    $ssn=$_POST['ssn'];
    $birthday=$_POST['birthday'];
    $birthmonth=$_POST['birthmonth'];
    $birthyear=$_POST['birthyear'];
    $joindate=$_POST['joindate'];
    $type=$_POST['type'];

	$arr =array (

			"userName" 			=> "'" . $username. "'",
			"password" 			=> "'" . $password. "'",
			"email" 			=> "'" . $email. "'",
			"age" 				=>  $age ,
			"gender" 			=> "'" . $gender. "'",
			"firstName" 			=> "'" . $firstname. "'",
			"secondName" 			=> "'" . $secondname. "'",
			"lastName" 			=> "'" . $lastname. "'",
			"SSN" 				=>  $ssn ,
			"birthDay" 				=>  $birthday ,
			"birthMonth" 				=>  $birthmonth ,
			"birthYear" 				=>  $birthyear ,
			"joinDate" 			=> "'" . $joindate. "'",
			"personTypeID" 				=>  $type 

);//end of array
		 
        $result= $admin_object->update_User($arr,$id);
        if($result){

		echo "Updated";
        }// End of if

    else {
		echo "failed";
}// End of else

} // End of if isset




if(isset($_POST['delete'])){
    $user_id=$_POST['id'];
	$r = $admin_object -> delete_User ($user_id);

}
  	
 echo '</table>';



 ?>
