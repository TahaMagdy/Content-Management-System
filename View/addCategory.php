<?php
include_once 'cheakSession.php';
 include_once 'logout.php';
?>  
<?php
include_once '../Classes/class_supervisor.php';
include_once '../Classes/class_news_category.php';
$sp = new class_supervisor();
 $cat= new class_news_category();
    if(isset($_POST['name']))
    {
        $name = $_POST['name'];
        $cat->setName($name);
       // echo $name;
        $sp->addCategory($cat);
       
    }
?>
<html>
    <form method="post" action="addCategory.php">
        <input type="text" placeholder="CategoryName" name="name">
        <input type="submit" value="add">
    </form>
</html>

