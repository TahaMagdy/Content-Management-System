<?php

class class_database {

// i) Attributes
	private $host			= "localhost";
	private $userName		= "taha"; 			// This is default value, You can overwrite is 
	private $password		= "estama";			// This is default value, You can overwrite is 	
	private $databaseName		= "db1"; 		// Content Managemnet System database														// This name can be changed!
	private $databaseConnection;




// ii) Methods

// Constructor
// As soon as you object is made -> Database connection is established and database is selected.
public function __construct () 	// 1) Open mysql connection 
				// 2) Select the database whose name is filled in the $databaseName Attribute
	{

		$this->databaseConnection = $this->database_connect ( $this->host, $this->userName, $this->password );
// ********
		$this->database_selectDB ( $this->databaseName );
// ********
	} // end __construct	



// Retruns connection!
private function database_connect ( $host, $userName, $password )
	{
	
		if (
				$connectionReturned = mysql_connect ( $host, $userName, $password )
		   ) // end if connection is established
			return $connectionReturned;

		else
			die("Database connection error!");

	} // end database_connect()	


// returns ture or die
private function database_selectDB ( $databaseName )
	{

		if (
				$select = mysql_select_db  ( $databaseName, $this->databaseConnection  )
		   )  // end if database is selected
			return $select; // boolean
		else
			die ( "No Database is selected!" );

	} // end database_selectDB()	



public function database_close ()
	{

		if ( !mysql_close ( $this->connection ) )
			die ( "Connection Close Error!" );

	} // end database_close()	


// Pre:  Non cleaned string is passed. { Queries, Passwords, ... }
// Post: Clean string is returned.
public function clean ( $string )
	{

		$string = trim         ( $string ); // Remove whitespaces form both sides.
		$string = stripslashes ( $string ); // Removes scaping backslashes.
		$string = strip_tags   ( $string ); // removes any tag  { < > }
		$string = mysql_real_escape_string ( $string );
 
		return $string;

	} // end clean()


// It's public temporary !
// return tables; need to be fetched ;
public function database_query ( $database_query )
	{
      
		$result_query 	= mysql_query ( $database_query ); // querying 
                   //echo $database_query;
		if ( !$result_query ) 
					die( 'database_query() => Invalid query: ' . mysql_error() );
		else
					return $result_query;

	} // end database_query()


	

//INSERT INTO table_name (column1,column2,column3,...)
//VALUES (value1,value2,value3,...);

// $ar = array ( "colName" => "1" .. // inserting a number
// $ar = array ( "colName" =. "'string'" ... // inserting a string 
// returns the query [ testing ]
public function insert_query ( $tableName, $data_aray_assoc )
	{
		$insert  = "INSERT INTO $tableName ";
		$columns = " ( ";
		$values  = " VALUES ( ";

	// (column1, ... ,column n )
		foreach ( $data_aray_assoc as $key => $value )
			$columns .= " $key, ";	

		$columns  = rtrim ( $columns, ", " ); // Removing the last comma.
		$columns .= " )";					  // Closing the parentheses.

	// (value1, ... ,value n )
		foreach ( $data_aray_assoc as $value )
				$values .= "$value, ";	

		$values  = rtrim ( $values, ", " );
		$values .= " )";

	// building query
		$insert .= $columns . $values . ";"; 

echo "<BR>Generated insert  :: " . $insert . "<BR>";

// Executing query
$this->database_query( $insert );

	} // end insert_query()



//  function of yaser
    public function database_all_array($database_result) {
        $array_return=array();
        while ($row = mysql_fetch_array($database_result)) {
            $array_return[] = $row;
        }
//        if(count($array_return)>0)
        return $array_return;


	    }

// returns the query [ testing ]
public function update_query ( $tableName, $data_array_assoc, $condition)
	{
		$updateQuery = "UPDATE $tableName SET ";

		foreach ( $data_array_assoc as $key => $value )
			$updateQuery .= " $key = $value, ";			

		$updateQuery  = rtrim ( $updateQuery, ", " );
		$updateQuery .= " WHERE $condition;";

// testing
echo "<BR>updateQuery() :: " . $updateQuery . "<BR>";

// Executing query
$this->database_query ( $updateQuery );


	} // end update_query()


public function delete_query ( $tableName, $codition )
	{
		$deleteQuery = " delete from $tableName where $codition ;";
$this->database_query( $deleteQuery );
//testing
//echo "delete_query() :: $deleteQuery <BR>";

// Executing query

	} // end delete_query()	


// $coulumnsName:  >> $ar = array ( "col1", "col2" )
public function select_query ( $coulumnsName, $tableName, $condition  )
	{
		$selectQuery = "SELECT ";

		foreach ( $coulumnsName as $col )
                $selectQuery .= " $col, ";

		$selectQuery  = rtrim ( $selectQuery, ", " );
		$selectQuery .= " FROM $tableName WHERE $condition ;";


// Testing
echo "<BR>select_query() :: $selectQuery <BR>";

// Executing query
$result = $this->database_query ( $selectQuery );


		return ( $result );
	} // end select_query()	


// returns associative array.
public function getRow ( $selectQuery )
	{
		//$selectQuery = strtoupper ( $selectQuery ); // To make the strstr() easy!
		/*if ( !strstr( $selectQuery, "LIMIT" ) )
			{
			$selectQuery = rtrim ( $selectQuery, ";" );
			$selectQuery  .= " LIMIT 0,1;"; // Ensuring to get one row
			} // end if
*/
		$result =  $this->database_query ( $selectQuery ) ;

// testing
//echo "getRow()   => ".$selectQuery . "<br>";

		if ( !$result )
			die ( "Database error in function getRow()" );


		else
			return mysql_fetch_assoc ( $result );

	} // end getRow()	





public function result_row_number ( $result )
	{
	 	return mysql_num_rows ( $result );	
	} // end result_row_number()	





///////////////////////
} // end class_database	
///////////////////////





// This is just for testing;
////////////// ////////////// ////////////// //////////////

		//$obj = new class_database();

// testing getRow()
//$ar = $obj->getRow( "select * from ads;" );
//echo $ar['advID'];
//echo $ar['content'];

// testting delete_query()
//$obj->delete_query( "tests", "id = 1" );


//testing select_query()

//$ar = array ( "password", "id", "joindate" );
//$array = $obj->select_query( $ar, "person", "id = 1" );

//foreach ( $array as $key => $value )
//	echo "AFTER +> $key  .. >  $value <BR> ";

// testing update
//$ar = array ( "content" => "'B|'", "priority" => "098765432" );
//echo $obj->update_query( "ads", $ar, "advID = 120"  );


// testing insert
//$asso = array ( "content" => "'content'", "advID" => "2" );
//echo $obj->insert_query( "ads", $asso );

// testing select_qury
//$res = $obj->select_query( "*", "address", "addressChildID < 3" );
//echo $res['addressChildID'] . "<br>";
//echo $res['addressName'] . "<br>";

//}

//$class_methods = get_class_methods('class_database');
//foreach ($class_methods as $method_name) 
 //   echo "$method_name<br>";
