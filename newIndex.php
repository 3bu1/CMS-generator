<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	
include('database/Database.php');
include('database/Select.php');
include('database/update.php');

if(isset($_GET['submit'])) {
	    $getAlpha = new Select;
		$details = array();
		$details = $getAlpha->getColoumnNamesFromTable($_GET['databasetable']);
		$tablevalue=$_GET['databasetable'];
		$valuearr="";
		$tablearr="";
	    $inputValues="";
        $ajaxString="";
	//print_r($details);
	//echo $details[0];
	if(count($details)>0){
for($x=0;$x<count($details);$x++){
			if($x+1 != count($details)){
$valuearr .= "htmlspecialchars(\$_POST['".$details[$x]."'])".",";
			}else{
				$valuearr .= "htmlspecialchars(\$_POST['".$details[$x]."'])";
			}
}
         $ajaxString .="".$details[0]." : ".$details[0].",\n".$details[1]." : ".$details[1].",";
         $inputValues .="".$details[0]."=$('#".$details[0]."').val();\n".$details[1]."=$('#".$details[1]."').val();\n";
        $tablearr .= "<div class='form-group'>\n
    <label class='control-label col-sm-2 col-md-3' for='".$details[0]."'></label>\n
    <div class='col-sm-10 col-md-5'>\n
      <input type='hidden' class='form-control' id='".$details[0]."' placeholder='".$details[0]."' >\n
    </div>\n
  </div>\n
       <div class='form-group'>\n
    <label class='control-label col-sm-2 col-md-3' for='".$details[1]."'></label>\n
    <div class='col-sm-10 col-md-5'>\n
      <input type='hidden' class='form-control' id='".$details[1]."' placeholder='".$details[1]."'>\n
    </div>\n
  </div>  \n
        ";
		for($x=2;$x<count($details);$x++){
             $ajaxString .="".$details[$x]." : ".$details[$x].",\n";
            $inputValues .="".$details[$x]."=$('#".$details[$x]."').val();\n";
		$tablearr .= 	"  <div class='form-group'>\n
    <label class='control-label col-sm-2 col-md-3 text-capitalize' for='".$details[$x]."'>".$details[$x].":</label>\n
    <div class='col-sm-10 col-md-5'>\n
      <input type='text' class='form-control' id='".$details[$x]."' placeholder='".$details[$x]."'>\n
    </div>\n
  </div>\n
  
  ";
           
        }
//echo $valuearr;
		$myfile1 = fopen("".$_GET['databasetable']."InsertForm.php","w");
		$txt1 = "<!DOCTYPE html>\n<head>\n<title></title>\n
		
		<?php 
        include('externallink.php');\n
include('database/Insert.php');\n
if(isset(\$_POST['submit'])){\n
		\$valuearry = array(".$valuearr.");\n
		Insertrow(\"".$tablevalue."\",\$valuearry);}?></head>\n<body>\n
		<form action=\"".$_GET['databasetable']."InsertForm.php\" method=\"post\" class='form-horizontal'>

<div class='container'>
  <h2 class='text-capitalize'>".$_GET['databasetable']." Form</h2>
 ".$tablearr."\n
 
 <div class='form-group'>      \n  
      <div class='col-sm-offset-2 col-sm-10'>\n
        <button type='submit' class='btn btn-default' id='".$_GET['databasetable']."submit' >Submit</button>\n
      </div>\n
    </div>\n
</div>\n
                </form>\n
		<script>
$(document).ready(function(){
$('#".$_GET['databasetable']."submit').click(function(event){
	  event.preventDefault();
	  
	  ".$inputValues."
	  // alert(address);
	 $.post('".$_GET['databasetable']."InsertForm.php',
	{
		 ".$ajaxString."submit:'submit',
		 
	}
	,function(data,status){
		alert('succsessfully Inserted');
		
		});  }); });

  </script>
		</body>\n</html>\n";
		fwrite($myfile1, $txt1);
        
        
        
        
        $valuearr="";
		$tablearr="";
       $inputValues="";
        $ajaxString="";
     for($x=0;$x<count($details);$x++){
			if($x+1 != count($details)){
				$valuearr .= "htmlspecialchars(\$_POST['".$details[$x]."'])".",";
			}else{
				$valuearr .= "htmlspecialchars(\$_POST['".$details[$x]."'])";
			}
}
        
        $ajaxString .="".$details[0]." : ".$details[0].",\n".$details[1]." : ".$details[1].",";
         $inputValues .="".$details[0]."=$('#".$details[0]."').val();\n".$details[1]."=$('#".$details[1]."').val();\n";
        $tablearr .= "<div class='form-group'>\n
    <label class='control-label col-sm-2 col-md-3' for='".$details[0]."'></label>\n
    <div class='col-sm-10 col-md-5'>\n
      <input type='hidden' class='form-control' id='".$details[0]."' placeholder='".$details[0]."' value='<?php echo \$individualDetails[0]['".$details[0]."'] ?>'>\n
    </div>\n
  </div>\n
       <div class='form-group'>\n
    <label class='control-label col-sm-2 col-md-3' for='".$details[1]."'></label>\n
    <div class='col-sm-10 col-md-5'>\n
      <input type='hidden' class='form-control' id='".$details[1]."' placeholder='".$details[1]."' value='<?php echo \$individualDetails[0]['".$details[1]."'] ?>'>\n
    </div>\n
  </div>  \n
        ";
		for($x=2;$x<count($details);$x++){
  $ajaxString .="".$details[$x]." : ".$details[$x].",\n";
            $inputValues .="".$details[$x]."=$('#".$details[$x]."').val();\n";
		$tablearr .= 	"  <div class='form-group'>\n
    <label class='control-label col-sm-2 col-md-3 text-capitalize' for='".$details[$x]."'>".$details[$x].":</label>\n
    <div class='col-sm-10 col-md-5'>\n
      <input type='text' class='form-control' id='".$details[$x]."' placeholder='".$details[$x]."' value='<?php echo \$individualDetails[0]['".$details[$x]."'] ?>'>\n
    </div>\n
  </div>\n
  
  ";		
}
//echo $valuearr;
		$myfile = fopen("".$_GET['databasetable']."UpdateForm.php","w");
		$txt = "<!DOCTYPE html>\n<head>\n<title></title>\n</head>\n<body>\n
		
		<?php 
        include('externallink.php');\n
include('database/Insert.php');\n
include('database/update.php');\n
  \$individualDetails = array();
  \$getAlpha = new Select;\n
  if(isset(\$_GET['".$details[0]."'])){\n
  \$individualDetails = \$getAlpha->selectWhere(\"".$_GET['databasetable']."\",\"".$details[0]."\", \$_GET['".$details[0]."']);\n
  }
if(isset(\$_POST['submit'])){\n

	
		\$valuearry = array(".$valuearr.");\n
        \$updateobj = new update;\n            
		\$updateobj->updateAll(\"".$_GET['databasetable']."\",\"".$details[0]."\",\$_POST['".$details[0]."'], \$valuearry);}?></head>\n<body>\n
		<form action=\"".$_GET['databasetable']."updateForm.php\" method=\"post\" class='form-horizontal'>\n

<div class='container'>
  <h2 class='text-capitalize'>".$_GET['databasetable']." Update Form</h2>
 ".$tablearr."\n
 
 <div class='form-group'>      \n  
      <div class='col-sm-offset-2 col-sm-10'>\n
        <button type='submit' class='btn btn-default' id='".$_GET['databasetable']."submit' >Submit</button>\n
      </div>\n
    </div>\n
</div>\n
                </form>\n
		<script>
$(document).ready(function(){
$('#".$_GET['databasetable']."submit').click(function(event){
	  event.preventDefault();
	  
	  ".$inputValues."
	  // alert(address);
	 $.post('".$_GET['databasetable']."updateForm.php',
	{
		 ".$ajaxString."submit:'submit',
		 
	}
	,function(data,status){
			alert('succsessfully Updated');
		
		});  }); });

  </script>
		</body>\n</html>\n";
		fwrite($myfile, $txt);
        
        
        $valuearr="";
		$tablearr="";
      
     for($x=0;$x<count($details);$x++){
			if($x+1 != count($details)){
				$valuearr .= "htmlspecialchars(\$_GET['".$details[$x]."'])".",";
			}else{
				$valuearr .= "htmlspecialchars(\$_GET['".$details[$x]."'])";
			}
}
//echo $valuearr;
      $head ="<tr>";
		for($x=0;$x<count($details);$x++){
			
$head .= "<th>".$details[$x]."</th>\n";
			
}
 $head .= "<th>Edit</th>\n<th>Delete</th></tr>";  
        
$tablearr ="<tr>";
		for($x=0;$x<count($details);$x++){
			
$tablearr .= "<td><?php echo \$projects[\$i]['".$details[$x]."'] ?></td>\n";
			
}
 $tablearr .= "<td>
           <a href=\"".$_GET['databasetable']."UpdateForm.php?".$details[0]."=<?php echo \$projects[\$i]['".$details[0]."'] ?>\">
                                                           Edit
                                                        </a>                    
                                                    </td>
                                                   
                               <td> <a href=\"delete".$_GET['databasetable'].".php?id=<?php echo \$projects[\$i]['".$_GET['databasetable']."id'] ?>\">Delete</a></td></tr>";
        $myfile2 = fopen("".$_GET['databasetable']."Listing.php","w");
		$txt2 = "<!DOCTYPE html>\n<head>\n<title></title>\n</head>\n<body>\n
		
		<?php 
        
include('externallink.php');\n
include('database/Insert.php');\n
?>\n
<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class='table table-striped table-bordered table-condensed'>
                                              <thead>
                                               ".$head."
                                              </thead>
							<?php
                                \$projects = array();
                                \$proobj = new Select;
                                \$projects = \$proobj->selectAll(\"".$_GET['databasetable']."\");
                                for(\$i = 0; \$i<count(\$projects); \$i++) {

                            ?>
                             <tr>
                                                   ". $tablearr."
                                                <?php } ?>
                                            </table>\n</body>\n</html>\n";
		fwrite($myfile2, $txt2);
        
        
        
        $myfile3 = fopen("externallink.php","w");
		$txt3 = "<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
  <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
  <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>";
		fwrite($myfile3, $txt3);
        
}
    
    

}
?>
<form action="newindex.php" method="get">

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