<form action="adress.php" method="get">
<select name="coutry">
    <?php
    include_once '../Classes/class_admin.php';
    $ad = new class_admin();
   // "addressParentIDType a message..." ,"addressName","addressParentID"
    $res = $ad->listAllAdressByParentID("3");
    $c = 0;
    while (isset($res[$c]['addressChildID']))
    {
//        echo '_________________';
//        echo '</br>';
//        echo $res[$c]['addressParentID'];
//        echo '</br>';
//        echo $res[$c]['addressName'];
//        echo '</br>';
//        echo $res[$c]['addressChildID'];
//        echo '</br>';
//         echo '_________________';
      echo'  <option name="" value="'.$res[$c]['addressChildID'].'">'.$res[$c]['addressName'].'</option>';
        
        $c++;

      
    }
    ?>
    </select>
    <input type="submit" name="sel" value="select">
</form>