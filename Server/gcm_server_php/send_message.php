<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'db_functions.php';
$db = new DB_Functions();

if (isset($_GET["message"])) {

    if(isset($_GET["gcm_user_mobile_id"]) && $_GET["gcm_user_mobile_id"] !="")
    {
    
        if(isset($_GET["onlydevice"])){
    		$registatoin_ids = $db->getUserByMobileId($_GET["gcm_user_mobile_id"]);
    	}else{
    		$registatoin_ids = $db->getAllregid($_GET["gcm_user_mobile_id"]);
    	}
    }
    else  
    	$registatoin_ids = $db->getAllUsersregid();
    
   // $regId = $_GET["regId"];
    $message = $_GET["message"];
    
    include_once './GCM.php';
    
    $gcm = new GCM();

   // $registatoin_ids = array($regId);
    $message = array("price" => $message.",".$_GET["gcm_user_mobile_id"]);

    $result = $gcm->send_notification($registatoin_ids, $message);

    echo $result;
}
?>