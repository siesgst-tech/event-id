<?php
/* A demo controller to demonstrate how to write controllers */
class DemoController {
	// Functions to be written inside controller
	/*
	* This is constructor of this class, this will intialize database connection for this class
	*/
	public function __construct() 
	{
		// To initiate and handle database connection for providing it to all functions of this controller
		$db = new DBClass();
		$this->connection = $db->connection;
	}

	/**
	* Mention what this function does
	* @param array of $data, single variable or anything, usually we pass $_POST, $_GET array
	* @return boolean or any value
	* @throws exception of any kind
	*/
	public function hello($name) 
	{
		$variable = "this nigga is ".$name;
		// To access database connection variables we use this keyword
		// mysqli_connect($this->connection, "<QUERY>");
		//throw new Exception(EXCEPTION_NAME); // here exception can be from config/messages directory
		// OR
		return $variable;
	}
}

