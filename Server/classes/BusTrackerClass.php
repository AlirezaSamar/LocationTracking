<?php

require_once("class.DatabaseWrapper.php");

class BusTrackerClass{
	public $dbObj;
	function __construct(){
		$this->dbObj = new DatabaseWrapper();
	}
	function getBusList(){
		$query = "Select * from ".$this->dbObj->db.".bussystem ORDER BY bus_name ASC";
		$res = $this->dbObj->select($query);
		if($this->dbObj->row_count > 0)
		{
			$jsonarr = '['; 
			while($row = $this->dbObj->getRow($res,'MYSQL_ASSOC'))
			{	
				$jsonarr .= '{"bus_name":"'.$row["bus_name"].'","bus_station":"'.$row["bus_station"].'"},'; 
			}
			$jsonarr = rtrim($jsonarr,",");
			
			$jsonarr .= ']'; 
			
			return $jsonarr ;
		}
		return "0";
	}
	
}