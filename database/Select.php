<?php

/**
 *
 * @author tribhuvan
 *        
 */
class Select
{
	
	public function getColoumnCount($tablename){
		$db = new Database;
		$dbh = $db->Connection();
		$stmt = $dbh->prepare("SELECT * FROM ".$tablename."");
		//$result=$stmt->columnCount();
		$stmt->execute();
		$result1=$stmt->columnCount();
		return $result1;
	}
	
	public function getColoumnNamesFromTable($tablename) {
		$db = new Database; // $db is an object for Database class
		$con = $db->connection(); // Creating connection $con using $db object
		try {
			$sql = "DESCRIBE ".$tablename;
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$table_fields = $stmt->fetchAll(PDO::FETCH_COLUMN); // fetches all column names
			return $table_fields;
		}
		catch (Exception $e) {
			return $e;
		}
	}
	public function selectAll($tablename) {
		$db = new Database(); // $db is an object for Database class
		$con = $db->connection(); // Creating connection $con using $db object
		$result = null;
		try {
			$sql = "SELECT * FROM ".$tablename;
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$output = array();
			$output = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetches everything in an array
			return $output;
		}
		catch(Exception $e) {
			return $e;
		}
	}
	
		public function selectAllase_desc($tablename,$coloumnname,$ase_des) {
		$db = new Database(); // $db is an object for Database class
		$con = $db->connection(); // Creating connection $con using $db object
		$result = null;
		try {
			$sql = "SELECT * FROM ".$tablename." Order by ".$coloumnname." ".$ase_des." limit 5";
			
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$output = array();
			$output = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetches everything in an array
			return $output;
		}
		catch(Exception $e) {
			return $e;
		}
	}
	
	public function selectWhere($fromtable, $wherecolumn, $columnvalue) {
		$db = new Database(); // $db is an object for Database class
		$con = $db->connection();  // Creating connection $con using $db object
		try {
			$sql = "SELECT * FROM ".$fromtable." WHERE ".$wherecolumn." = ?"; // Using prepated statements for where column value
			//echo $sql;
			$stmt = $con->prepare($sql);
			$stmt->bindParam('1', $columnvalue, PDO::PARAM_INT); // Binding ? value with the sql statement
			$stmt->execute();
			$output = array();
			$output = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetches a row in an array
			//print_r($output);
			return $output;
		}
		catch(Exception $e) {
			return $e;
		}
	}
	public function selectMetricsWhereQua($columnvalue,$qua,$senario) {
		$db = new Database(); // $db is an object for Database class
		$con = $db->connection();  // Creating connection $con using $db object
		try {
			if($senario=="1"){
			$sql ="select comid,CG_in_senario1 as cg,CI_in_senario1 as ci,Score_in_senario1 as score from metrics where metricsid ='".$columnvalue."' ";
			if($qua=='1'){
			$sql.="and CI_in_senario1>2.5 and CG_in_senario1>2.5";
			}
			if($qua=='2'){
			$sql.="and CI_in_senario1>2.5 and CG_in_senario1<2.5";
			}
			if($qua=='3'){
			$sql.="and CI_in_senario1<2.5 and CG_in_senario1>2.5";
			}
			if($qua=='4'){
			$sql.="and CI_in_senario1<2.5 and CG_in_senario1<2.5";
			}
			}
			if($senario=="2"){
			$sql ="select comid,CG_in_senario2 as cg,CI_in_senario2 as ci,Score_in_senario2 as score from metrics where metricsid ='".$columnvalue."' ";
			if($qua=='1'){
			$sql.="and CI_in_senario2>2.5 and CG_in_senario2>2.5";
			}
			if($qua=='2'){
			$sql.="and CI_in_senario2>2.5 and CG_in_senario2<2.5";
			}
			if($qua=='3'){
			$sql.="and CI_in_senario2<2.5 and CG_in_senario2>2.5";
			}
			if($qua=='4'){
			$sql.="and CI_in_senario2<2.5 and CG_in_senario2<2.5";
			}
			}
			if($senario=="3"){
			$sql ="select comid,CG_in_senario3 as cg,CI_in_senario3 as ci,Score_in_senario3 as score from metrics where metricsid ='".$columnvalue."' ";
			if($qua=='1'){
			$sql.="and CI_in_senario3>2.5 and CG_in_senario3>2.5";
			}
			if($qua=='2'){
			$sql.="and CI_in_senario3>2.5 and CG_in_senario3<2.5";
			}
			if($qua=='3'){
			$sql.="and CI_in_senario3<2.5 and CG_in_senario3>2.5";
			}
			if($qua=='4'){
			$sql.="and CI_in_senario3<2.5 and CG_in_senario3<2.5";
			}
			}
			
			//echo $sql." ####";
			$stmt = $con->prepare($sql);
			//$stmt->bindParam('1', $columnvalue, PDO::PARAM_INT); // Binding ? value with the sql statement
			$stmt->execute();
			$output = array();
			$output = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetches a row in an array
			//print_r($output);
			
			
			return $output;
		}
		catch(Exception $e) {
			return $e;
		}
	}
	
	public function selectLike($fromtable, $wherecolumn, $likevalue) {
		$db = new Database(); // $db is an object for Database class
		$con = $db->connection();  // Creating connection $con using $db object
		try {
			$sql = "SELECT * FROM ".$fromtable." WHERE ".$wherecolumn." LIKE '".$likevalue."'"; // Using prepated statements for where column value
			$stmt = $con->prepare($sql);
			//$stmt->bindParam('1', $likevalue, PDO::PARAM_INT); // Binding ? value with the sql statement
			$stmt->execute();
			$output = array();
			$output = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetches a row in an array
			//print_r($output);
			return $output;
		}
		catch(Exception $e) {
			return $e;
		}
	}
	
	
	Public function selectAutoIncrement($tablename){
	
		$db = new Database(); // $db is an object for Database class
		$con = $db->connection(); // Creating connection $con using $db object
		$result = null;
		try {

			$sql = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA ='a_t' AND TABLE_NAME = '".$tablename."'";
			//echo $sql;
			$stmt = $con->prepare($sql);
			$stmt->execute();
			//$output = array();
			$output = $stmt->fetch(PDO::FETCH_ASSOC); // fetches everything in an array
			
			return $output;
		}
		catch(Exception $e) {
			return $e;
		}
	}
	Public function selectRandom($tablename){
	
$db = new Database(); // $db is an object for Database class
		$con = $db->connection(); // Creating connection $con using $db object
		$result = null;
		try {

			$sql = "SELECT * FROM ".$tablename." ORDER BY RAND() LIMIT 6";
			//echo $sql;
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$output = array();
			$output = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetches everything in an array
			
			return $output;
		}
		catch(Exception $e) {
			return $e;
		}
	}
	

	Public function selectDistinct($tablename,$columnname){
	
$db = new Database(); // $db is an object for Database class
		$con = $db->connection(); // Creating connection $con using $db object
		$result = null;
		try {

			$sql = "SELECT DISTINCT ".$columnname." FROM ".$tablename." ORDER BY ".$columnname." ASC";
			//echo $sql;
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$output = array();
			$output = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetches everything in an array
			
			return $output;
		}
		catch(Exception $e) {
			return $e;
		}
	}
	public function selectTopVendors($year1,$year2,$year3){
		$condition="";
		if($year1 !="ALL" || $year2 !="ALL" || $year3 !="ALL"){
			$condition ="WHERE ";
		if($year1 !="ALL"){
			$condition .= "contract_renewal_data.Renewal_Year = '".$year1."'";
			if($year2 !="ALL"){
				$condition .= " or ";
				}
			}if($year2 !="ALL"){
				$condition .= " contract_renewal_data.Renewal_Year = '".$year2."'";
				if($year3 !="ALL"){
				$condition .= " or ";
				}
			}if($year3 !="ALL"){
				$condition .= " contract_renewal_data.Renewal_Year = '".$year3."'";
			}
		}
		$db = new Database(); // $db is an object for Database class
		$con = $db->connection(); // Creating connection $con using $db object
		$result = null;
		try {
			$sql = "select vendor, sum(Total_Contract_Value) as tcv from contract_renewal_data ".$condition." GROUP by vendor ORDER by tcv desc LIMIT 10";
			//echo $sql;
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$output = array();
			$output = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetches everything in an array
			return $output;
		}
		catch(Exception $e) {
			return $e;
		}
	
	}
public function selectTargetLeaugeTable(){
		
		$db = new Database(); // $db is an object for Database class
		$con = $db->connection(); // Creating connection $con using $db object
		$result = null;
		try {
			$sql = "SELECT capgemini_positioning.Incumbent_SBU,companydetails.cg_sector,companydetails.account_industry,companydetails.account_name,metrics.Score_in_senario1 ,companydetails.hq,companydetails.account_status,range_of_years_of_contract.alleviate_test_status,rankings_history.Latest_Rank,rankings_history.Previous_Rank,rankings_history.Ranking_Trend_voltility,rankings_history.Last_Update,rankings_history.Ranking_Movement_Justification from 
			companydetails
			JOIN capgemini_positioning on capgemini_positioning.comid = companydetails.comid
			JOIN rankings_history on rankings_history.comid = companydetails.comid
			JOIN range_of_years_of_contract on range_of_years_of_contract.comid = companydetails.comid
			JOIN metrics on metrics.comid = companydetails.comid
			GROUP by companydetails.comid";
			//echo $sql;
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$output = array();
			$output = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetches everything in an array
			return $output;
		}
		catch(Exception $e) {
			return $e;
		}
	
	}
    public function selectAccountDetails($comid){
		
		$db = new Database(); // $db is an object for Database class
		$con = $db->connection(); // Creating connection $con using $db object
		$result = null;
		try {
			$sql = "		select * from companydetails
			JOIN capgemini_positioning on capgemini_positioning.comid = companydetails.comid
			JOIN cio_cpo on cio_cpo.comid = companydetails.comid
			JOIN contract_renewal_data on contract_renewal_data.comid = companydetails.comid
			JOIN range_of_years_of_contract on range_of_years_of_contract.comid = companydetails.comid
			JOIN sbu_revenue_of_cg on sbu_revenue_of_cg.comid = companydetails.comid
			JOIN metrics on metrics.comid = companydetails.comid
			JOIN rankings_history on rankings_history.comid = companydetails.comid
JOIN data_center on data_center.comid = companydetails.comid
JOIN cost_saving_business_growth_mna on cost_saving_business_growth_mna.comid = companydetails.comid
JOIN recievables_and_payables on recievables_and_payables.comid = companydetails.comid

where companydetails.comid='".$comid."'";
			//echo $sql;
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$output = array();
			$output = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetches everything in an array
			return $output;
		}
		catch(Exception $e) {
			return $e;
		}
	
	}
	    public function selectAccountDetailsByCsuite($comid){
		
		$db = new Database(); // $db is an object for Database class
		$con = $db->connection(); // Creating connection $con using $db object
		$result = null;
		try {
			$sql = "		select * from companydetails
			JOIN capgemini_positioning on capgemini_positioning.comid = companydetails.comid
			JOIN cio_cpo on cio_cpo.comid = companydetails.comid
			JOIN contract_renewal_data on contract_renewal_data.comid = companydetails.comid
			JOIN range_of_years_of_contract on range_of_years_of_contract.comid = companydetails.comid
			JOIN sbu_revenue_of_cg on sbu_revenue_of_cg.comid = companydetails.comid
			JOIN metrics on metrics.comid = companydetails.comid
			JOIN rankings_history on rankings_history.comid = companydetails.comid
JOIN data_center on data_center.comid = companydetails.comid
JOIN cost_saving_business_growth_mna on cost_saving_business_growth_mna.comid = companydetails.comid
JOIN recievables_and_payables on recievables_and_payables.comid = companydetails.comid

where companydetails.comid='".$comid."' GROUP by cio_cpo.csuite_title";
			//echo $sql;
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$output = array();
			$output = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetches everything in an array
			return $output;
		}
		catch(Exception $e) {
			return $e;
		}
	
	}
	public function selectFilter($Accountstatus,$Capgemini_Sector,$SBU,$CIO_Status,$HQ,$Strategic_Accounts,$Vendor_Name,$Alleviate,$Renewals_by_year,$Scenario,$industry,$top,$accountname,$bu,$sbu_global) {
	    $filterNum = array($Accountstatus,$Capgemini_Sector,$SBU,$CIO_Status,$HQ,$Strategic_Accounts,$Vendor_Name,$Alleviate,$Renewals_by_year,$Scenario,$industry,$top,$accountname);
      //  print_r($filterNum);
        $db = new Database(); // $db is an object for Database class
		$con = $db->connection(); // Creating connection $con using $db object
		$result = null;
        $c=0;
   for($x=0;$x<count($filterNum);$x++){
        if($filterNum[$x] != "ALL" && $x != 9 && $x != 11){
         //  echo "hello";
            $c++;
        }
       
   }
 //echo $c."hhhhh";
		try {
			$sql1="SELECT companydetails.comid,companydetails.metricsid,companydetails.cpid,companydetails.account_name ,capgemini_positioning.Incumbent_SBU,capgemini_positioning.Strategic_Account,companydetails.cg_sector,cio_cpo.status_of_change,companydetails.account_status,metrics.CI_in_senario1,metrics.CG_in_senario1,sbu_revenue_of_cg.capgemini_total_revenue_for_the_account,sbu_revenue_of_cg.infra_revenue,companydetails.account_industry,range_of_years_of_contract.alleviate_test_status,range_of_years_of_contract.size_of_contracts_between_6_months_and_3_years+range_of_years_of_contract.size_of_contracts_between_3_and_4_years+range_of_years_of_contract.size_of_contracts_between_4_and_5_years AS rm,companydetails.crdid from 
			companydetails
			JOIN capgemini_positioning on capgemini_positioning.comid = companydetails.comid
			JOIN cio_cpo on cio_cpo.comid = companydetails.comid
			JOIN contract_renewal_data on contract_renewal_data.comid = companydetails.comid
			JOIN range_of_years_of_contract on range_of_years_of_contract.comid = companydetails.comid
			JOIN sbu_revenue_of_cg on sbu_revenue_of_cg.comid = companydetails.comid
			JOIN metrics on metrics.comid = companydetails.comid
			JOIN rankings_history on rankings_history.comid = companydetails.comid
			
			";
			if($Accountstatus != 'ALL' || $Capgemini_Sector !='ALL' || $CIO_Status != 'ALL' || $SBU != 'ALL' || $HQ != 'ALL' || $Strategic_Accounts != 'ALL' || $Vendor_Name != 'ALL' || $Alleviate != 'ALL' || $Renewals_by_year != 'ALL' || $industry != 'ALL' || $accountname != 'ALL' || $bu != null){
				$sql1.=" where companydetails.bu ='".$bu."' and companydetails.global_sbu='".$sbu_global."' and companydetails.parent_or_account='Parent'";
				if($c >1){
				$sql1 .=" and ";
			}
		if($Accountstatus != 'ALL'){
			
			$sql1=$sql1."companydetails.account_status='".$Accountstatus."' ";
			if($c >1){
				$sql1 .=" and ";
			$c--;
            }
			}if($Capgemini_Sector !='ALL'){
				$sql1=$sql1."companydetails.cg_sector='".$Capgemini_Sector."' ";
				if($c >1){
				$sql1 .=" and ";
			$c--;
            }
				}if($CIO_Status != 'ALL'){
					$sql1=$sql1."cio_cpo.status_of_change='".$CIO_Status."'  ";
					if($c >1){
				$sql1 .=" and ";
			$c--;
            }
					}if($SBU != 'ALL'){
						$sql1=$sql1."capgemini_positioning.Incumbent_SBU='".$SBU."'";
							if($c >1){
				$sql1 .=" and ";
			$c--;
            }
						}if($HQ != 'ALL'){
						$sql1=$sql1."companydetails.hq='".$HQ."' ";
							if($c >1){
				$sql1 .=" and ";
			$c--;
            }
						}if($Strategic_Accounts != 'ALL'){
							$sql1=$sql1."capgemini_positioning.Strategic_Account='".$Strategic_Accounts."' ";
							if($c >1){
				$sql1 .=" and ";
			$c--;
            }
							}if($Vendor_Name != 'ALL'){
							$sql1=$sql1."contract_renewal_data.vendor='".$Vendor_Name."'  ";	
							if($c >1){
				$sql1 .=" and ";
			$c--;
            }
							}if($Alleviate != 'ALL'){
							$sql1=$sql1."range_of_years_of_contract.alleviate_test_status='".$Alleviate."'  ";	
							if($c >1){
				$sql1 .=" and ";
			$c--;
            }
							}if($Renewals_by_year != 'ALL'){
							$sql1=$sql1."contract_renewal_data.Renewal_Year='".$Renewals_by_year."'  ";
							if($c >1){
				$sql1 .=" and ";
			$c--;
            }
							}if($industry != 'ALL'){
							$sql1=$sql1."companydetails.account_industry='".$industry."' ";	
							if($c >1){
				$sql1 .=" and ";
			$c--;
            }
							}if($accountname != 'ALL'){
							$sql1=$sql1."companydetails.account_name='".$accountname."' ";
            if($c >1){
				$sql1 .=" and ";
			$c--;
            }
							}
						}
							$sql1=$sql1." GROUP by companydetails.comid";
			if($top=='Revenue'){
				$sql1=$sql1." ORDER by companydetails.revenue_annual desc LIMIT 10";
			}if($top=='Latest Rank'){
				$sql1=$sql1." ORDER by rankings_history.Latest_Rank asc LIMIT 10";
			}if($top=='ITBudget'){
				$sql1=$sql1." ORDER by range_of_years_of_contract.it_budget desc LIMIT 10";
			}if($top=='Renewal Amount'){
				$sql1=$sql1." ORDER by rm desc LIMIT 10";
			}if($top=='CGRevenue'){
				$sql1=$sql1." ORDER by sbu_revenue_of_cg.capgemini_total_revenue_for_the_account desc LIMIT 10";
			}if($top=='CGINFRA'){
				$sql1=$sql1." ORDER by sbu_revenue_of_cg.infra_revenue desc LIMIT 10";
			}
			
			//echo $sql1;
			$stmt = $con->prepare($sql1);
			$stmt->execute();
			$output = array();
			$output = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetches everything in an array
			return $output;
		}
		catch(Exception $e) {
			return $e;
		}
	}


}
?>