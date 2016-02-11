<?php

class DB_Functions {

    private $db;

    //put your code here
    // constructor
    function __construct() {
        include_once './db_connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    // destructor
    function __destruct() {
        
    }

    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($gcm_user_mobile_id, $gcm_regid) {
        // insert user into database
        $result = mysql_query("INSERT INTO gcm_users(gcm_user_mobile_id, gcm_regid, created_at) VALUES('".$gcm_user_mobile_id."', '".$gcm_regid."', NOW())");
        // check for successful store
        if ($result) {
            // get user details
            $id = mysql_insert_id(); // last inserted id
            $result = mysql_query("SELECT * FROM gcm_users WHERE id = $id") or die(mysql_error());
            // return user details
            if (mysql_num_rows($result) > 0) {
                return mysql_fetch_array($result);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Get user by email and password
     */
    public function getUserByMobileId($gcm_user_mobile_id) {
    	$row_arr = array(); 
        $query= mysql_query("SELECT gcm_regid FROM gcm_users WHERE gcm_user_mobile_id= '".$gcm_user_mobile_id."'");
        if (mysql_num_rows($query) > 0) {
        	 while ($row = mysql_fetch_array($query)) {
        	 	array_push($row_arr,$row["gcm_regid"]);
        	 }
        }
        return $row_arr;
    }
    
     /*public function getUserByMobileId($gcm_user_mobile_id) {
        $result = mysql_query("SELECT * FROM gcm_users WHERE gcm_user_mobile_id= '".$gcm_user_mobile_id."' LIMIT 1");
        return $result;
    }*/

    /**
     * Getting all users
     */
    public function getAllUsers() {
        $result = mysql_query("select * FROM gcm_users");
        return $result;
    }
    

    
    
    public function getAllUsersregid() {
        $result = mysql_query("select gcm_regid FROM gcm_users");
        if (mysql_num_rows($result) > 0) {
        	$row_arr = array(); 
        	
        	 while ($row = mysql_fetch_array($result)) {
        	 	array_push($row_arr,$row["gcm_regid"]);
        	 }
        }
        return $row_arr;
    }
    
    
     public function getAllregid($gcm_user_mobile_id) {
       $result = mysql_query("select gcm_regid FROM gcm_users where gcm_user_mobile_id NOT IN('".$gcm_user_mobile_id."')");
        if (mysql_num_rows($result) > 0) {
        	$row_arr = array(); 
        	
        	 while ($row = mysql_fetch_array($result)) {
        	 	array_push($row_arr,$row["gcm_regid"]);
        	 }
        }
        return $row_arr;
    }
    

    /**
     * Check user is existed or not
     */
    public function isUserExisted($gcm_user_mobile_id) {
        $result = mysql_query("SELECT email from gcm_users WHERE gcm_user_mobile_id= '$gcm_user_mobile_id'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed
            return true;
        } else {
            // user not existed
            return false;
        }
    }

}

?>