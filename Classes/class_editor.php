<?php
include_once 'class_stuff.php';
include_once 'class_news.php';
include_once 'class_article.php';
class class_editor extends class_stuff {

// Methods
// This Function Take a News Object
public function addNews ( $news )
	{

		$newsData = array ( "title" 			=> "'" . $news->getTitle() . "'",
							"content"			=> "'" . $news->getContent() . "'",
							"firstComingDate" 	=> " CURRENT_TIMESTAMP () ",
							"reomveDate"		=> "0",
							"publishDate"		=> "0",
							"category"              =>  $news->getCatagory(),
							
						  );

// testing
// proving, $news functions is working
//echo "^^ " . "'".$news->getTitle()."'";


// testing
// Ensuring of the 'String' and array data
//foreach ( $newsData as $key => $value )
//	echo " ^^ " . $key . " =>> " . $value ."<BR>";

		include_once 'class_database.php';
		$database = new class_database();
		$database->insert_query ( "news", $newsData ) ;

	} // end addNews()

// This Function Take an Article Object
public function addArticle ( $article )
	{

			
		$articleDate = array ( 	"subject" 		=> "'" . $article->getSubject() . "'",
								"title"				=> "'" . $article->getTitle() . "'",
								"date"				=> " CURRENT_TIMESTAMP ",
								"content"			=> "'" . $article->getContent() . "'"
						  );
		include_once 'class_database.php';
		$database = new class_database();
		$database->insert_query ( "Article", $articleDate ) ;

	} // end addArticle()


//////////////////////
} // end class_editor
//////////////////////





// testing 

/*
// making a news object to pass into addNews()
// filling the object
$newsobj = new class_news();
$newsobj->setTitle ( "newTitle" );
$newsobj->setContent ( "newCon" );
$newsobj->setAttachmentID ( 0);
$newsobj->setCatagory ( "CCA" );
$newsobj->setAppearState ( 3 );
$newsobj->setRetouchState ( 4 );
$newsobj->setViewsNumber( 99 );
// testint that the data is set in the object.
echo $newsobj->getAppearState() . " " . $newsobj->getCatagory() . "<BR>";

// passing the object
$obj = new class_editor();
$obj->addNews ( $newsobj );

*/

/*
// testing addArticle
$obj = new class_article();

$obj->setSubject ( "Sub1" );
$obj->setTitle   ( "Tit1" );
$obj->setContent ( "Con1" );


$edito = new class_editor();

$edito->addArticle ( $obj );
*/
