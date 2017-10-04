<?php
session_start();
include_once 'logout.php';
include_once '../Classes/class_uploader.php';
$up= new class_uploader();
$upID = $_SESSION['ID']; 

//////////////////////////////////////////
////////////////////publish/////////////////
//////////////////////////////////////////
if (isset($_POST['publish']) &&  isset($_POST['newsID']))
{
 
 echo 'published';
 echo '</br>';
 $id = $_POST['newsID'];
 $up->publish($id, $upID);
}// end of (isset($_POST['publish']) && isset($_POST['newsID']))
////////////////////////////////////////////////////////////////////
///////////////Upload File //////////////////////////////////
////////////////////////////////////////////////////////
if (isset($_POST['upload']) && $_FILES['userfile']['size'] > 0 && isset($_POST['newsID']))
{
    
 echo $_POST['newsID'];
$mysql= mysql_connect('127.0.0.1', 'root', '');
mysql_select_db('fileUplode');
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];
$newsID = $_POST['newsID'];
$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}
$fileName = $fileName;
$content = $content ;
$fileType = $fileType ;
$up->addAttachment($newsID, $fileName, $content, $fileType, $fileSize);

    
} // end if 
//////////////////////////////////////////////////////
/////////////////////////////////////////////////
////////////////////remove news/////////////////////////////
//////////////////////////////////////////////////////////
if (isset($_POST['remove']) && isset($_POST['newsID']))
{
 echo 'removed';
 $id =$_POST['newsID'];
 $up->removeNews($id);   
}// end of if (isset($_POST['remove']) && isset($_POST['newsID']))
////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////// show news///////////////////////////////////////////////
//////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
if (isset($_POST['newsID']))                         
{                                                    
$id = $_POST['newsID'];                            

$result = $up->showNews($id);
$c= 0 ;
 echo '</br>';
 $flag = TRUE;
 
 while ($flag)
 {
     echo '</br>';
     if( isset( $result[$c] ['content']))
        {
         echo '<h1 style="color: red">'.$result[$c]['title'].'</h1>';
         echo $_POST['newsID'];
         echo $result[$c]['content'];
         echo '</br>';
         echo '<form method="POST" action="showNews.php" >
           <input type ="hidden" name="newsID" value="'.$result[$c]['ID'].'" >
           <input type="submit" name="remove" value="remove">
           </form> ';
        
         echo '<form method="POST" action="showNews.php" >
           <input type ="hidden" name="newsID" value="'.$result[$c]['ID'].'" >
           <input type="submit" name="publish" value="publish">
           </form> ';
         
         echo ' <form action="showNews.php" method="post" enctype="multipart/form-data">
                <input type ="hidden" name="newsID" value="'.$result[$c]['ID'].'" >
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000000">
                <input name="userfile" type="file" id="userfile"> 
                <input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
                </form>';
         
        $flag = TRUE;
        $c++;
        }
     else 
        {
          $flag = FALSE;
        }
    
 } 
 ///////////////////////////////////////////
//$up ->showAttachment($id);
if (isset( $up->showAttachment($id)[0]['content']))
{
    //echo $up->showAttachment($id)[0]['content']; 
    $attcontent =$up->showAttachment($id) ;
    $i= 0;
    while (isset($attcontent[$i]['content']))
    {
        echo $attcontent[$i]['attachmentName'];
      echo '<div style="height: 9px width:15px;"><img src="data:image/jpeg;base64,'.base64_encode( $attcontent[$i]['content'] ).'"/>';
       //echo $attcontent[$i]['content'];
      $i++;
    }
}
}//end if isset $post id


?>
<html>   
</html>
