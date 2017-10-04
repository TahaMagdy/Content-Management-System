<?php
include_once 'class_person.php';
include_once 'class_database.php';
include_once 'class_role.php';
class class_admin extends class_person{

    public function show_All_users(){
        
         $db_object=new class_database();
        $ar = array ( "a.ID  ", "a.userName ", "a.password" ," a.email" ,"a.age"," a.gender" , "a.firstName "," a.secondName "," a.lastName "," a.SSN" , "a.birthDay "," a.birthMonth "," a.birthYear "," a.joinDate "," b.personTypeString"  );
		
        $result= $db_object->select_query($ar , "Person a , MappingPersonTypeIDString b" , "a.personTypeID = b.personTypeID");

         $all_data=$db_object->database_all_array($result);
         return  $all_data;
    } // End of function  ........... show all users in person tables

          public function search_User($key){
        $database_query= "SELECT * FROM `Person` JOIN MappingPersonTypeIDString ON MappingPersonTypeIDString.personTypeID = Person.personTypeID WHERE firstName like '%$key%' or secondName LIKE '%$key%' or lastName LIKE '%$key%' OR userName LIKE '%$key%'";
       // echo '</br>';
        //echo $database_query;
        //echo '</br>';
        $db = new class_database();
        $result_query = $db->database_query($database_query);
        
        while($line = mysql_fetch_array($result_query, MYSQL_ASSOC))
                                        {
                                         $results[] = $line;
                                        }
            if(isset($results))                            
            {
                return $results;
        
            }
            
    } // End of function

          public function add_User($user)
  {

          $data = array ( 	 	
						  "userName"       	  => "'" .  $user->getUserName() . "'" ,
                                                  " password"             =>"'" . $user->getPasswd () . "'",
                                          	  "email"                 => "'".$user->getEmail() ."'",
                                                  "age"                   => $user->getAge(),
                                                  "gender"                => "'". $user ->getGender() . "'",
                                                  "firstName"    	  => "'".$user ->getFirstName() ."'",
                                                  "secondName"  	  => "'".$user ->getSecondName(). "'",
                                                 "lastName"              => "'".$user ->getLastName(). "'",
                                                 "SSN"                   =>$user ->getSSN(),
                                                "birthDay"            => $user ->getBirthDay(),
                                                "birthMonth"	  => $user ->getBirthMonth(),
                                                "birthYear" 	  =>$user ->getBirthYear(),
                                                "joinDate"                => " CURRENT_TIMESTAMP () ",
                                                    "personTypeID"        => $user ->getPersonTypeID()
 ) ;
           $db_object=new class_database();
      $test =    $db_object->insert_query("Person", $data);
	if ($test)
{
return 1; 
}
	else 
{
return 0 ;
}

              
      } // End of function




        public function update_User($arr,$id){
            //include_once './class_database.php';
            $x = new class_database();
          $x->update_query("Person", $arr , "ID = $id") ;
            if($x){
                return true;
            }
            else {
                return FALSE;
            }
            
            
    } // End of function
    
    public function delete_User($user_id){

         $db_object=new class_database();
    $delete_result=  $db_object->delete_query ("Person","ID=$user_id");
    if($delete_result){
		return 1 ;
    }	// End of IF 
            
	else {
		return 0;	
} // End of else 
            
    } // End of function


     public function listAds ()
     {
                $tableName = 'Ads';
                $ar = array ( "*");
                $db = new class_database();
                $result_query=$db->select_query($ar, $tableName,"true");

                while($line = mysql_fetch_array($result_query))
                                    {
                                         $results[] = $line;
                                    }
                if(isset($results))                            
                {

                    return $results;
                }     
     }// end of function 

     public function approve_Ads( $userID , $advID){
                $tableName= 'Ads';
                $data_array_assoc= array ('state' => '1');
                $condition = 'advID='.$advID;
                $db = new class_database(); 
                $db ->update_query($tableName, $data_array_assoc, $condition);
                $tableName = 'UserAdvertiseAds';
                $data_aray_assoc = array ("advID"=>$advID ,"userID"=>$userID);
                $db->insert_query ( $tableName, $data_aray_assoc );
    
            
    } // End of function









// Taha
public function addRole ( $role ) // $role is a class_role obj
    {   
                $database = new class_database();

                // Inserting new role in `MappingPersonTypeIDString`
                $insertData = array ( "personTypeString" => "'" . $role->getTypeRole() . "'" );
////////////      $database->insert_query ( "MappingPersonTypeIDString", $insertData ); // new type is set with new id ^_^

// getting the new id - To insert the permissions in `personLinks`
		// testing
		echo " <BR> Selecting the new role id <BR> $role->getTypeRole()";
	$resultSelectID = $database->select_query ( "personTypeID", "MappingPersonTypeIDString", "personTypeString = '$role->getTypeRole()'" );
		// testing
		echo " <BR> Selecting the new role id <BR>";
	$roleIDArray = mysql_fetch_assoc ( $resultSelectID );
	$roleID = $roleIDArray['personTypeID'];
// testing
echo "<BR>5555 roleID =  $roleID ^^<BR> ";


// Inserting the permission in `personLinks`
	$insertLinks;
	foreach ($role->permissions  as $permission )
	{
		$insertLinks = array ( "personTypeID" => "$roleID", "linkID" => "$permission" );
///		$database->insert_query ( "Personlinks", $insertLinks ); // inserting permission row by row
	} // end fillng the array


// #! After making permission, We should assign a role with its permission
    
    } // addRole()  




  public function listRoleLinks( $typeID)
  {
      
      $ob = new class_database();
      $result = $ob->database_query("SELECT Links.path ,Links.title ,Personlinks.personTypeID ,Personlinks.linkID FROM Personlinks JOIN Links on Links.linksID = Personlinks.linkID WHERE Personlinks.personTypeID =".$typeID."");
       while($line = mysql_fetch_array($result))
                                    {
                                         $results[] = $line;
                                    }
        if(isset($results))
        {
            return $results; 
        }
        else {
            return FALSE;
        }
       
  }//listRoleLinls
  
  public function  isPagePremmited( $path, $type )
  {
      $db = new class_database();
      $result = $db->database_query("SELECT Links.path ,Personlinks.personTypeID ,Personlinks.linkID FROM Personlinks JOIN Links on Links.linksID = Personlinks.linkID WHERE Personlinks.personTypeID =".$type."");
      while($line = mysql_fetch_array($result))
                                    {
                                         $results[] = $line;
                                    }
                                    $c = 0;
        while (isset( $results[$c]['path'] ))
            {
                    if(strchr($results[$c]['path'],$path) )
                    {
                        return TRUE;
                    }
                    else
                    {
                        $c++;
                    }

            }// end while
            return FALSE;
  }// end of is page premmited
  
    public function  listPersonType()
    {       
            $tableName = "MappingPersonTypeIDString";
            $coulumnsName = array ("personTypeID","personTypeString");
            $db = new class_database();
            $result = $db->select_query($coulumnsName, $tableName, "true");
            while($line = mysql_fetch_array($result))
                                    {
                                         $results[] = $line;
                                    }
            if(isset($results))
            {
                return $results; 
            }
            else {
                return FALSE;
            }// end else
            
    }//end of listPersontype
    public function listAllAdressByParentID ( $ID )
    {
     
        if(strcmp("NULL", $ID))
                echo $condtion = "addressParentID is NULL";
        
        $condtion= "addressParentID = ".$ID;
          echo $condtion;
          
        $coulumnsName = array ("addressChildID" ,"addressName","addressParentID");
        
        $db = new class_database();
        $result = $db->select_query($coulumnsName, "Address",$condtion );
        while($line = mysql_fetch_array($result))
                                    {
                                         $results[] = $line;
                                    }
            if(isset($results))
            {
                return $results; 
            }
            else {
                return FALSE;
            }// end else
    }//end function 
   
    public function  listAllLinks ()
    {
        $db = new class_database();
        $coulumnsName = array ("*");
        $tableName = "Links";
        $result = $db->select_query($coulumnsName, $tableName, "true");
        while($line = mysql_fetch_array($result))
                                    {
                                         $results[] = $line;
                                    }
            if(isset($results))
            {
                return $results; 
            }
            else {
                return FALSE;
            }// end else
    }// end of function 



///////////////////////
}       // End of class
///////////////////////

$admin = new class_admin();

// Testing
$role1 = new class_role();
	$role1->setTypeRole ( "BODA" );
$permissions = array ( 20, 20, 20, 20, 20, 20 );
	$role1->setPermissions ( $permissions );

// testing set and get
echo "<BR> $role1->getTypeRole() -- $role1->getPermission()<BR>";

$admin = new class_admin();
//$admin->addRole( $role1 );

/*$result = $admin ->listRoleLinks(1);
$c = 0 ;
 while (isset( $result[$c]['path'] ))
 {
     echo $result[$c]['path']; 
     $c++; 
 }*/

/*$user  = new class_person();
$user->setAge(33);
$user->setBirthDay(2);
$user->setBirthYear(5);
$user->setBirthMonth(77);
$user->setEmail("a.awad96@hotmail.com");
$user->setFirstName("ahmed");
$user->setGender("male");
$user->setJoinDate(7);
$user->setLastName('mohmod');
$user->setPasswd('passwd');
$user->setPersonTypeID(6);
$user->setSSN(1234455);
$user->setSecondName("user");
$user->setUserName("user");

$admin->add_User($user);*/
