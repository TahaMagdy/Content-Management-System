<?php

include_once 'class_stuff.php';
include_once 'class_database.php';
class class_supervisor extends class_stuff {

public function updateText($textID,$content)
	{
            
            $x = new class_database();
            $arr = array ( "content" => " '$content' " );
            $query = $x->update_query( "news" , $arr, "ID = $textID" );
            $x->database_query($query);
            if($x){
                return true;
            }
            else {
                return FALSE;
            }
        }//end updateText
	

public function removeText ($textID)
	{
           
            $x = new class_database();
            $arr = array ( "appearState" => "0" );
            $query = $x->update_query( "news" , $arr, "ID = $textID" );
            $x->database_query($query);
            if($x){
                return true;
            }
            else {
                return FALSE;
            }
	} // end removeText()	

public function addCategory ( $category )
    {   
    
        $database = new class_database();

// Inserting new category in `Category`
        $array = array ( "name" => "'" . $category->getName() . "'" );
        $database->insert_query ( "Category", $array );



    } // end addCategory()  
     
     public function  showAllNews()
     {
         $coulumnsName = array ("news.appearState", "news.ID" ,"news.title" , "news.content", "news.category"  ,"news.viewsNumber","news.retouchState");
         $tableName= "news";
         $db = new class_database();
         $result_query=$db->select_query($coulumnsName, $tableName,"1");
         while($line = mysql_fetch_array($result_query, MYSQL_ASSOC))
                                        {
                                         $results[] = $line;
                                        }
            if(isset($results))                            
            {
                return $results;
        
            }
         
     }//  end of show All News 
     
    public function  listCategory()
    {
        $columnsName = array ("ID","name" );
        $db = new class_database();
        $result_query=$db->select_query($columnsName, "Category", "1");
         while($line = mysql_fetch_array($result_query, MYSQL_ASSOC))
                                        {
                                         $results[] = $line;
                                        }
            if(isset($results))                            
            {
                return $results;
        
            }
        
    }// end of list Category,Abdulrahman

//////////////////////////
} // end class_supervisor
//////////////////////////


// This is just for testing;
/*

include_once 'class_news_category.php';
$obj = new class_news_category();
$obj->setName ( "Sport" );

$sup = new class_supervisor();
$sup->addCategory( $obj );
*/


/*
$obj = new class_supervisor();

$obj->setUserName ( "taha" );
$obj->setPasswd   ( "passwd");*/
