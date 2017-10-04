<?php
include_once 'cheakSession.php';
?>
<?php
include_once '../Classes/class_news.php';
include_once '../Classes/class_editor.php';
include_once '../Classes/class_supervisor.php';
$news = new class_news();
$sup = new class_supervisor();
$edt = new class_editor();
if (isset($_POST['content']) && isset($_POST['title']))
{
    echo $_POST['category'];
    echo $_POST['content'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $news->setTitle($title);
    $news->setTitle($title);
    $news ->setCatagory($category);
    $edt->addNews($news);
    
}
 $res = $sup ->listCategory();
// $c = 0 ;
// echo '<select name="category">';
// while (isset($res[$c]['ID']))
// {
//     echo'<option value="'.$res[$c]['ID'].'">'.$res [$c]['name'].'</option>';
//     $c++;
// }
// echo '</select>';
// echo'</br>'
?>
<html>
    <title>add news</title>
    <body>
        <form action="addNews.php" method="post">
            <?php echo '<select name="category">';
                 $c=0;
                while (isset($res[$c]['ID']))
                {
                    echo'<option name ="ctegory" value="'.$res[$c]['ID'].'">'.$res [$c]['name'].'</option>';
                    $c++;
                }
                echo '</select>';
                echo'</br>'?>
            <input type="text" name="title" placeholder="title">
            </br>
            <textarea name="content" style="width:300px ; height:300px"></textarea>
            <input type="submit" name="submit">
            </body>
        </form>
    
</html>