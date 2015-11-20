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


/**
 *
 * @author tribhuvan
 *        
 */
include('Database.php');
include('Select.php');

function Insertrow($tableName,$valuearry){
	//print_r($valuearry);
	$se = new Select;
	$count =$se->getColoumnCount($tableName);
	//echo $count;
	$value="?";
	for($x=1;$x<$count;$x++){
		$value=$value.",?";
	}
	//echo $count;
	$db = new \Database();
	$dbh = $db->Connection();
	$sql="INSERT INTO ".$tableName." VALUES (".$value.")";
    //echo $sql;
	//print_r($valuearry);
	$stmt = $dbh->prepare($sql);
	for($i=1;$i<=$count;$i++){
			$stmt->bindValue($i, $valuearry[$i-1]);
	}

	
	$stmt->execute();
}



?>