<?php
include_once 'cheakSession.php';
?>
<?php
include_once '../Classes/class_article.php';
include_once '../Classes/class_editor.php';
include_once '../Classes/class_supervisor.php';
$art = new class_article();
$sup = new class_supervisor();
$edt = new class_editor();
if (isset($_POST['content']) && isset($_POST['title']))
{
    //echo $_POST['category'];
    echo $_POST['content'];
    $subject = $_POST['sub'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $art->setContent($content);
    $art->setTitle($title);
    $art->setSubject($subject);
    $edt->addArticle($art);
    
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
    <title>add article</title>
    <body>
        <form action="addArticle.php" method="post">
            subJect:
            <input type="text" name="sub" placeholder="subject">
            </br>
            title:
            <input type="text" name="title" placeholder="title">
            </br>
            <textarea name="content" style="width:300px ; height:300px"></textarea>
            </br>
            <input type="submit" name="submit">
            </body>
        </form>
    
</html>