
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