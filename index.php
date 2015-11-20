<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php //
include('database/Database.php');
include('database/Select.php');

if(isset($_GET['submit'])) {
	    $getAlpha = new Select;
		$details = array();
		$details = $getAlpha->getColoumnNamesFromTable($_GET['databasetable']);
		$tablevalue=$_GET['databasetable'];
		$valuearr="";
		$tablearr="";
	if(count($details)>0){
		for($x=0;$x<count($details);$x++){
			if($x+1 != count($details)){
$valuearr .= "\$_GET['".$details[$x]."']".",";
			}else{
				$valuearr .= "\$_GET['".$details[$x]."']";
			}
}
		for($x=0;$x<count($details);$x++){
			
$tablearr .= "<tr><td>".$details[$x]."</td>\n<td><input name='".$details[$x]."'/></td></tr>\n";
			
}
//echo $valuearr;
		$myfile = fopen("".$_GET['databasetable']."InsertForm.php","w");
		$txt = "<!DOCTYPE html>\n<head>\n<title></title>\n
		
		<?php 
include('database/Insert.php');\n
if(isset(\$_GET['submit'])){\n
		\$valuearry = array(".$valuearr.");\n
		Insertrow(\"".$tablevalue."\",\$valuearry);}?></head>\n<body>\n
		<form action=\"".$_GET['databasetable']."InsertForm.php\" method=\"get\" >

<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"00\">
 ".$tablearr."\n<tr><td colspan=\"2\"><input type=\"submit\" value=\"submit\" name=\"submit\"/></td></tr>
</table>
                </form>
		
		</body>\n</html>\n";
		fwrite($myfile, $txt);
}
	}
?>
<form action="index.php" method="get">

<table width="100%" border="0" cellspacing="0" cellpadding="00">

    <td>Name of table</td>
    <td><input class="input-style" name="databasetable" type="text" ></td>
  </tr>
   <tr>
    
    <td colspan="2"><input class="input-style" type="submit" name="submit"></td>
  </tr>
</table>
</form>
</body>
</html>