<?php include_once 'cheakSession.php';
?>
<?php
include_once 'logout.php';

include_once '../Classes/class_supervisor.php';
$_SESSION['ID'] = 1;//this well be uploder or user session ID
echo '
  <body>
  <table style="width:100%">';
if(isset($_SESSION['ID']))
{
 $id= $_SESSION['ID'] ;  
   echo $id; 
echo '<tr>
    <th>News ID </th>
    <th>title</th>
    <th>catogery</th>
    <th>retouch State</th>
    <th>views Number</th>
    <th></th>
    <th></th>
  </tr>';
 $re = new class_supervisor();
 $result = $re->showAllNews();
 $c= 0 ;
 $flag = TRUE;
 while ( $flag )
 {
   
     
     if( isset( $result[$c] ['title']))
        {
         //echo $result[$c]['content'];
         
           echo '<tr>
            <td>'.$result[$c]['ID'].'</td>   
            <td>'.$result [$c]['title'].'</td>
            <td>'.$result[$c]['category'].'</td>
            <td>'.$result[$c]['retouchState'].'</td>
            <td>'.$result[$c]['viewsNumber'].'</td> 
            <td>  
           <form method="POST" action="updateDesign.php" >
           <input type ="hidden" name="newsID" value='.$result[$c]['ID'].' >
           <input type ="hidden" name="content" value='.$result[$c]['content'].' >
           <input type="submit" name="action" value="update">
           </form> </td>
           <td>  
           <form method="POST" action="deleteDesign.php" >
           <input type ="hidden" name="newsID" value='.$result[$c]['ID'].' >
            <input type ="hidden" name="content" value='.$result[$c]['content'].' >
           <input type="submit" name="action" value="Delete">
           </form> </td> 
            </tr>' ;
            /*echo $result[$c] ['title'];
            echo $result[$c] ['title']."<a href='".$result[$c]['path']."'>show</a>'";
            echo ' 
            <form method="POST" action="showNews.php" >
            <input type ="hidden" name="newsID" value="1" >
            <input type="submit" name="action" value="delete">
            </form> ';*/
            $flag = TRUE;
            $c++; // l2 Java! HAHAHAHAHAHAH peace TAHA
        }
     else 
        {
          $flag = FALSE;
        }
    
 }//end while
}// end if isset session 
 
 
?>
        </table>
        
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
</head> 
</body>
<html>