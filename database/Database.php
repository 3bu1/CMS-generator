<?php

class Database {
/*	
	public  $dbhost = "mysql:dbname=a_t;host=localhost:3306";
	public  $dbuser = "root";
	public  $dbpass = "root";
	public  $dbname = "a_t";
	public  $connection;
	public  $selectdb;
	public  $isConnected;
	public  $dbh;
	
	*/
	
	public  $dbhost = "mysql:dbname=25thcraft;host=localhost";
	public  $dbuser = "tribhuvan";
	public  $dbpass = "123456";
	public  $dbname = "25thcraft";
	public  $connection;
	public  $selectdb;
	public  $isConnected;
	public  $dbh;

	//$user = 'dbuser';
	//$password = 'dbpass';
	
	public function Connection()
	{
		try
		{	
			 $this->dbh = new PDO($this->dbhost, $this->dbuser, $this->dbpass);
			// echo "true";
				return  $this->dbh;
		}
		catch(Exception $e)
		{ 
                $this->isConnected = false;
                throw new Exception($e->getMessage());
        }
	}
	
	public function Disconnect()
	{
		$this->datab = null;
		$this->isConnected = false;
	}
}
?>

