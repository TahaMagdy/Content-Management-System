<?php
include_once 'class_stuff.php';
include_once 'class_database.php';
class class_uploader extends class_stuff
{
    public  function __construct()
        {
 
        
        } // End of constructor
        
    public function searchNews ( $key )
    {
       $db = new class_database();
       $database_query = "SELECT * , Links.path FROM news JOIN Links on Links.linksID = news.linkID WHERE news.content LIKE '%$key%' or news.title LIKE '%$key%'";
       $result_query = $db->database_query($database_query);
       while($line = mysql_fetch_array($result_query, MYSQL_ASSOC))
                {
                 $results[] = $line;
                }
            if(isset($results))                            
            {
                return $results;
        
            } 
    }// end of searchNews () , Abdulrahman 

    public function showAttachment( $id )
    {
        $columns =  array ("attachmentName" , "content" ,"attachmentType");
        $tableName = "NewsAttachment";
        $condition = "id =".$id;
        $db = new class_database();
        $result_query=$db->select_query($columns, $tableName,$condition);
        while($line = mysql_fetch_array($result_query, MYSQL_ASSOC))
                                        {
                                         $results[] = $line;
                                        }
            if(isset($results))                            
            {
                return $results;
        
            } // end of if
    }// end of showAttachment

    public function showAllRetouchedNews ( )
    {        
            $query = 'SELECT news.appearState, news.ID ,news.title , news.content, news.category  ,news.viewsNumber,news.retouchState FROM news  WHERE news.retouchState = 1';
            $db = new class_database();
            $result_query= $db->database_query( $query );
             while($line = mysql_fetch_array($result_query, MYSQL_ASSOC))
                                        {
                                         $results[] = $line;
                                        }
            if(isset($results))                            
            {
                return $results;
        
            }  
            
    }//end of showAllNews(),Abdulrahman
    
    public function showNews( $id )
    {
            $columns =array ( "content","ID","title");
            $condition  = 'ID='.$id;
            $tableName = 'news';
            $db = new class_database();
            $result_query = $db->select_query($columns, $tableName, $condition);
            while($line = mysql_fetch_array($result_query, MYSQL_ASSOC))
                                        {
                                         $results[] = $line;
                                        } 
            if(isset($results))                            
            {
                return $results;
        
            }
    }//end of showNews (),Abdulrahman
    
    public function removeNews ( $id )
    {       // change apeare state to be 0 
            $tableName = 'news';
            $data_array_assoc = array("appearState" => "0" , "reomveDate" => "CURRENT_TIMESTAMP ()");
            $condition = 'ID ='.$id;
            $db= new class_database();
            $db->update_query($tableName, $data_array_assoc, $condition);
     
    }//end of removeNews,,Abdulrahman

    public function addAttachment($newsID,$fileName,$content,$fileType,$size)
    {
              
            $tableName = 'NewsAttachment';
            $fileName = "'".$fileName."'";
            $content = "'".$content."'";
            $fileType= "'".$fileType."'";
            $data_aray_assoc = array ('id' =>$newsID, 'attachmentName'=>$fileName, 'attachmentType'=>$fileType, 'attachmentSize'=>$size, 'content'=>$content);
          $db= new class_database();
            $db->insert_query($tableName, $data_aray_assoc);
        
    }// end of addAttachment,,Abdulrahman

    public function publish( $NewsId , $uploderID ) //
    {
            //first insert into  UploaderPublishNews the news ID and uploader ID
            $tableName = 'UploaderPublishNews';
            $data_array_assoc = array ("uploaderID"=> $uploderID , "uploadedNewsID" => $NewsId );
            $db= new class_database();
            $db->insert_query($tableName, $data_array_assoc);
            // second chenge the appeareState to be 1
            $tableName2 = 'news';
            $data_array_assoc2 = array ("appearState" => 1 , "publishDate" => "CURRENT_TIMESTAMP ()" );
            $condition2 = 'ID='.$NewsId;
            $db->update_query($tableName2, $data_array_assoc2, $condition2);
            
        
    } // end of publish(),,Abdulrahman
    
   
} // End of class 

