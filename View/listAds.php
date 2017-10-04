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
        //echo 'ahla beek'; 
        $id= $_SESSION['ID'] ;
        $type= $_SESSION['type'];
        $firstName= $_SESSION['firstName'];
        $secondName=$_SESSION['secondName'] ;
        $email= $_SESSION['email'];
        $userName= $_SESSION['userName'];
        echo "hello  ".$userName;
        //include '../Classes/class_admin.php';
                $re = new class_admin();
                if(isset($_POST['action']))
                {   
                    $advID = $_POST['advID'];
                    $userID = $_SESSION['ID'];
                    echo $userID;
                    $re->approve_Ads($userID, $advID);
                }

                //$_SESSION['id'] = ;//this well be uploder or user session ID
                echo'</head>

                    <body>
                      <table style="width:100%">';
                if(isset($_SESSION['ID']))
                {

                    echo '<tr>
                    <th>Ads ID </th>
                    <th>Content</th>
                    <th>catogery</th>
                    <th>Attchment</th>
                    <th>Published State</th>
                    <th>Period </th>
                    <th>Re news number </th>
                    <th>Priorty </th>
                    <th></th>
                  </tr>';

                 $result = $re->listAds();
                 $c= 0 ;
                 $flag = TRUE;
                 while ( $flag )
                 {


                     if( isset( $result[$c] ['advID']))
                        {

                           echo '<tr>
                            <td>'.$result[$c]['advID'].'</td>   
                            <td>'.$result [$c]['content'].'</td>
                            <td>'.$result[$c]['category'].'</td>
                            <td>'.$result[$c]['attachment'].'</td>
                            <td>'.$result[$c]['state'].'</td>
                            <td>'.$result[$c]['period'].'</td>
                            <td>'.$result[$c]['renewsNumber'].'</td>
                            <td>'.$result[$c]['priority'].'</td>
                            <td>  
                           <form method="POST" action="listAds.php" >
                           <input type ="hidden" name="advID" value='.$result[$c]['advID'].' >
                           <input type="submit" name="action" value="publish">
                           </form> </td> 
                            </tr>' ;

                            $flag = TRUE;
                            $c++;
                        }
                     else 
                        {
                          $flag = FALSE;
                        }//end else 

                 }//end while

                }// end if isset session 
    }//end  if page premtted per
    
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
?>


<html>
    <head>
        <style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}

        </style>
        </table>
</body>
<html>

