
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="" method="post" id="update">
            
        <table>
        <table><tr> news id<td> <input type="text" name="ID"   value="<?php if (isset($_POST['newsID']))echo''.$_POST['newsID'].'';?>" placeholder="ID"/> </td></tr></table>
        content
        </br>
        <tr><td><textarea style="width: 500px ; height: 400px"   name="content" 
                          placeholder="content" value="" > <?php if (isset($_POST['newsID']))echo''.$_POST['content'].'';?> </textarea></td></tr>
        </table>
            </br>
        <input type='submit' name='submit' value='Update'>
        </form>
        
        <?php
      include_once 'logout.php';
        
        if ( isset($_POST['ID'])   )
        {
            $textID = $_POST['ID'];
        if (isset($_POST['content']))
            $content = $_POST['content'];
        if (isset($_POST['submit']))
            {
            include_once '../Classes/class_supervisor.php';
            $x = new class_supervisor();
            $x->updateText($textID,$content);
            
            }// end of if 
           
        }   
                           
        ?>
    </body>
</html>
         