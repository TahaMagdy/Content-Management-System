 
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}

</style>
<table style="width : 100%"> 
<?php
include '../Classes/class_admin.php';
$admin = new class_admin();


$admin = new class_admin();
if (isset($_REQUEST['key']))
{
    
$result=$admin->search_User($_REQUEST['key']);

if ((isset($result[0]['ID'])))
{
echo '<tr>
    <th> ID </th>
    <th>user name</th>
    <th>email</th>
    <th>age</th>
    <th>SSN</th>
    <th>first Name</th>
    <th>second Name</th>
    <th>last Name</th>
    <th>birh day</th>
    <th> birth month</th>
    <th>birth year</th>
    <th>join Date</th>
    <th>person Type </th>
    </tr>';
$c= 0 ;
 $flag = TRUE;
 while ( $flag )
 {
   
     
     if( isset( $result[$c] ['ID']))
        {
         
           echo '<tr>
            <td>'.$result[$c]['ID'].'</td>  
            <td>'.$result [$c]['userName'].'</td>
            <td>'.$result[$c]['email'].'</td>
            <td>'.$result[$c]['age'].'</td>
            <td>'.$result[$c]['SSN'].'</td>
            <td>'.$result[$c]['firstName'].'</td>
            <td>'.$result[$c]['secondName'].'</td>
            <td>'.$result[$c]['lastName'].'</td>
            <td>'.$result[$c]['birthDay'].'</td>  
            <td>'.$result[$c]['birthMonth'].'</td>  
            <td>'.$result[$c]['birthYear'].'</td>  
            <td>'.$result[$c]['joinDate'].'</td>  
            <td>'.$result[$c]['personTypeString'].'</td>  
            </tr>' ;
            /*echo $result[$c] ['title'];
            echo $result[$c] ['title']."<a href='".$result[$c]['path']."'>show</a>'";
            echo ' 
            <form method="POST" action="showNews.php" >
            <input type ="hidden" name="newsID" value="1" >
            <input type="submit" name="action" value="show">
            </form> ';*/
            $flag = TRUE;
            $c++;
        }
     else 
        {
          $flag = FALSE;
        }
    
 }//end while
 
 
 }// end if issest result
 else echo 'no result';
}// end if issset request
 
       

?>
     </table>

