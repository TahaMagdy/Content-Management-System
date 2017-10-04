<?php

class class_role {

	private $typeRole; 			// This is added to the MappingPersonTypeID table
	private $permissions; 	// Array contains all the permission IDs
	private $id;			// id of the MappingPersonTypeID table;


// SETs & GETs
public function setTypeRole ( $job )
	{
		$this->typeRole = $job;
	} // end setTypeRole()

public function getTypeRole ( )
	{
		return $this->typeRole;
	} // end getTypeRole()


public function setPermissions( $array )
	{
		$this->permissions = $array;
	} // end setPermissions()	

public function getPermission ( )
	{
		return $this->permissions;
	} // end getPermission()	

///////////////////////
} // end class_role	
///////////////////////
