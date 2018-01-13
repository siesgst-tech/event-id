<?php
/* This is our main database connection class */
class DBClass
{
	/**
	* @var will hold the database connection
	*/
	public $connection;
	/**
	* This will create the connection
	*/
	public function __construct()
	{
		$this->connection = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		if( mysqli_connect_error()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
}