<?php

include_once 'class_stuff.php';
include_once 'class_news.php';
class class_disk extends class_stuff {

public function retouchNews($text)
	{

		include_once 'class_database.php';
		$database = new class_database();

// making assoc array
	$data = array ( "retouchState" => "1",
					 "content"		=> "'".$text->getContent()."'"
				   );

// updating
	$database->update_query( "news", $data, $text->getTextID() );
			

	
            
            
    } // End of function
    

////////////////////////
}       // End of class
////////////////////////



// Testting
/*
// making a news object to pass into addNews()
// filling the object
$newsobj = new class_news();
$newsobj->setTextID( 1 );
$newsobj->setTitle ( "newTitle" );
$newsobj->setContent ( "newCon" );
$newsobj->setAttachmentID ( 0);
$newsobj->setCatagory ( "CCA" );
$newsobj->setAppearState ( 0 );
$newsobj->setViewsNumber( 919 );
// testint that the data is set in the object.
echo $newsobj->getAppearState() . " " . $newsobj->getCatagory() . "<BR>";

$disk = new class_disk();
$disk->retouchNews( $newsobj );
*/
