<!--

	This is a project based on PHP. Using mysql database,
	back end module is created dynamically, which will give give 
	you all the pages for crud operations Insert/Update/Delete a part
	from that we will get a view page in which all the data is displayed.
    Copyright (C) <?php echo date("Y"); ?> Tribhuvan Reddy Ramidi,India

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License along
    with this program; if not, write to the Free Software Foundation, Inc.,
    51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
-->

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
	
	public  $dbhost = "mysql:dbname=apt;host=localhost";
	public  $dbuser = "tribhuvan";
	public  $dbpass = "123456";
	public  $dbname = "apt";
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

