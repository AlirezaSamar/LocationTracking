<?php
include_once("BusTrackerClass.php");

$bustrakerobj = new BusTrackerClass();

switch($_REQUEST["op"])
{
	case "buslist" :
                echo $bustrakerobj->getBusList();
		break;

}
 ?>