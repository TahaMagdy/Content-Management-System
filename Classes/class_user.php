<?php

include_once 'class_person.php';
include_once  'class_database.php';

class class_user extends class_person{
    
    private $userID ;
    
     public  function __construct() {
        
        } // End of constructor
    
public function set_UserID($userID)
{
 if (is_numeric($userID)) {     
$this -> userID = $userID;
return TRUE;
 } // end of if 
 else  {
     return FALSE;
     
 } // end of else
 } // End of function

public function get_UserID()
{
return $this -> userID;
} // End of function

public function comment_Article(){
    
    if(isset($_POST['do_comment']))
     {
         $user_ID = "'".$_POST['userid']."'";
         
         $comment_Date = "'".$_POST['commentdate']."'";
         
         $comment = "'".$_POST['content']."'";
         
         $state = "'".$_POST['state']."'";
         
         $article_ID = "'".$_POST['articleid']."'";
         
         //geting data from user and put it variables
         
         $array1 = array('userID'=>$user_ID,'commnetDate'=>$comment_Date,'content'=>$comment,'state'=>$state,'articleID'=>$article_ID);

            $database = new class_database();
         
          
      
          $database->insert_query("usercommentarticle",$array1 );
         
         //getting data from database
                 
          echo "<font color='red'> INSERTED HAS DONE</font>";
          
         //showing confirmation message
          
     } //inset elements to data base
     
     else {
         
          echo "<font color='red'> ERROR OCCURED IN INSERTING COMMENT</font>";
       }//sowing error message
    
    } // End of function
        public function reguest_Ads(){
      
     if(isset($_POST['submit']))
    {
    $adv_ID ="'".$_POST['advid']."'";
    
    $ads = "'".$_POST['content']."'";
    
    $attachment ="'". $_POST['attachment']."'";
    
    $category = "'".$_POST['category']."'";
    
    $state = "'".$_POST['state']."'";
    
    $period = "'".$_POST['period']."'";
    
    $renewnumber = "'".$_POST['renewnumber']."'";
    
    $priority = "'".$_POST['priority']."'";
    
    //geting data from user and put it variables
    
    
       $dataBase = new class_database();
         
       $query = "select * from ads where advID = $adv_ID ";
       
        $result = $dataBase->database_query($query);
        //select data from table
         
         if(@mysqli_num_rows($result)==0)
         {
           $array2 = array('advID'=>$adv_ID,'content'=>$ads,'attachment'=>$attachment,'category'=>$category,'state'=>$state,'period'=>$period,'renewsNumber'=>$renewnumber,'priority'=>$priority);
            
           $dataBase->insert_query("ads", $array2);
            
          //insert data to database
          
            echo '<font color="red"> ADVERTISEMENT INSERTED SUCCEFULLY</font>';
            //showing confirmation message
            
            
         } // checking and inserting user
         
         else {
             echo '<font color="red"> ADVERTISEMENT FOR OTHER USER</font>';
         }//showing error message
         
     } // checking and inserting advertisement
    } // End of function
        public function download_Article(){

   if(isset($_POST['submit']))
   {
    $user_ID = "'".$_POST['userid']."'";

    $article_ID = "'".$_POST['articleid']."'";
    
    $date = "'".$_POST['date']."'";
    
      //geting data from user and put it variables

    
    $database1 =  new class_database();
    
      echo "<a href ='' download ='file.txt'> download </a> ";
      
      //link for download file from dataase
    
 
      $array3 = array('userID'=>$user_ID,'articleID'=>$article_ID,'downloadDate'=>$date);
      
      $database1->insert_query("userdownloadarticle", $array3);

    
    //inserting data to database
    
}//download article and inserting its data to download_article table..... 

else {
    echo '<font color="red">ERROR OCURRED</font>';
}//showing error message
    } // End of function
    
    
        public function register(){

          if(isset($_POST['submit']))
     {
         $ID = "'".$_POST['id']."'";
         
         $username = "'".$_POST['username']."'";
         
         $typeID = "'".$_POST['typeid']."'";
         
         $password = "'".$_POST['password']."'";
         
         $first_Name = "'".$_POST['firstname']."'";
         
         $second_Name = "'".$_POST['secondname']."'";
         
         $last_Name = "'".$_POST['lastname']."'";

         $email = "'".$_POST['email']."'";

         $age = "'".$_POST['age']."'";

         $gender = "'".$_POST['gender']."'";
         
         $ssn = "'".$_POST['ssn']."'";
         
         $birth_Day = "'".$_POST['birthday']."'";
         
         $birth_Month = "'".$_POST['birthmonth']."'";
         
         $birth_Year = "'".$_POST['birthyear']."'";
         
         $join_Date = "'".$_POST['joindate']."'";
                
        $database2 = new class_database();
        
        
        $query = "select * from Person where ID = $ID";
        
        $result = $database2->database_query($query);
        
         if(@mysqli_num_rows($result1)==0)
         {
           
              $array4 = array('ID'=>$ID,'userName'=>$username,'password'=>$password,'firstName'=>$first_Name,'secondName'=>$second_Name,'lastName'=>$last_Name,'email'=>$email,'age'=>$age,'gender'=>$gender,'SSN'=>$ssn,'birthDay'=>$birth_Day ,'birthMonth'=>$birth_Month,'birthYear'=>$birth_Year,'joinDate'=>$join_Date,'personTypeID'=>$typeID);
                  
              $database2->insert_query("person", $array4);
            
            echo '<font color="red"> USER INSERTED SUCCEFULLY</font>';
         } // checking and inserting user
         
         else {
             echo '<font color="red"> THIS IS EXCITING USER</font>';
         } //showing error message
     }
    } // End of function
        public function pay(){

            
    } // End of function
} // End of class

