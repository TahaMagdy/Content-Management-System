<?php
include_once 'cheakSession.php';
include_once 'logout.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="" method="post" id="delete">
                
            <table><tr> news id:<td> <input type="text" name="ID"  value="<?php if(isset($_POST['newsID']) )echo''.$_POST['newsID'].'';?>"placeholder="ID"/> </td></tr></table>
        <input type='submit' name='submit' value='Delete'>
        </form>
        
        <?php
        //echo $_POST['newsID'];
        
        if (isset($_POST['ID']))
            $textID = $_POST['ID'];
            //echo $textID;
        if (isset($_POST['submit'])){
            include_once '../Classes/class_supervisor.php';
            $x = new class_supervisor();
            if($x->removeText($textID))
                echo 'Delete Done';
            else
                echo 'Failed to Delete';
        }                          
        ?>
    </body>
</html>