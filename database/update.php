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

class update{
	public function updateAll($fromtable, $wherecolumn, $columnvalue,$valueArray) {

		$db = new Database(); // $db is an object for Database class
		$con = $db->connection();  // Creating connection $con using $db object
		
		try {
			$se = new Select;
			$count =$se->getColoumnCount($fromtable);
			$ColoumnNames =$se->getColoumnNamesFromTable($fromtable);
			$value="=?,";
			for($x=1;$x<=$count;$x++){
				//echo $count."$$$$$".$x."######".$ColoumnNames[$x-1]."<br/>";
				if($x==1){
					$value="=?";
				$value=$ColoumnNames[$count-$x].$value;
				}else{
				$value=$ColoumnNames[$count-$x]."=?,".$value;
				}
				}
				
			$sql="UPDATE ".$fromtable." SET ".$value." WHERE ".$wherecolumn."=?";
			//echo $sql;
			//$sql = "SELECT * FROM ".$fromtable." WHERE ".$wherecolumn." = ?"; // Using prepated statements for where column value
			$stmt = $con->prepare($sql);
			
			for($r=1;$r<=$count;$r++){
				$stmt->bindValue($r, $valueArray[$r-1]); // Binding ? value with the sql statement
				//echo "<br/>".($r).$valueArray[$r-1];
				if($count==$r){
					$stmt->bindValue($r+1, $columnvalue);
					//echo "<br/>".($r).$columnvalue;
				}else{
					
				}
			}
		   $stmt->execute();
			//echo "true";
		}
		catch(Exception $e) {
			return $e;
		}
		

	}
}
?>