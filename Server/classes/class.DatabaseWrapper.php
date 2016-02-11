<?php
	class DatabaseWrapper
	{
		var $error;         // holds mysql_error()
		var $recent_query;  // holds the last query executed.
		var $row_count;     // holds the last number of rows from a select

		var $host;          // mySQL host to connect to
		var $user;          // mySQL user name
		var $pw;            // mySQL password
		var $db;            // mySQL database to select
		var $db_link;
		var $pConnect;
		var $con;

		var $link;          // current/last database link identifier
		var $auto_slashes;  // the class will add/strip slashes when it can

		function __construct()
		{
			$this->db = "alirezai_bus";
			$this->db_link = mysql_connect("localhost","alirezai_bus","X.#PU^3i!v#k",$this->db);
		}

		function select($sql)
		{
			
			$r = mysql_query($sql, $this->db_link);
			if (!$r) {
			$this->last_error = mysql_error($this->db_link);
			return false;
			}
			$this->row_count = mysql_num_rows($r);
			return $r;
		}

		function getRow($result, $type='MYSQL_BOTH')
		{

			// Returns a row of data from the query result.  You would use this
			// function in place of something like while($row=mysql_fetch_array($r)). 
			// Instead you would have while($row = $db->getRow($r)) The
			// main reason you would want to use this instead is to utilize the
			// auto_slashes feature.

			if (!$result) {
			$this->last_error = "Invalid resource identifier passed to getRow() function.";
			return false;  
			}

			if ($type == 'MYSQL_ASSOC') $row = mysql_fetch_array($result, MYSQL_ASSOC);
			if ($type == 'MYSQL_NUM') $row = mysql_fetch_array($result, MYSQL_NUM);
			if ($type == 'MYSQL_BOTH') $row = mysql_fetch_array($result, MYSQL_BOTH); 

			if (!$row) return false;
			if ($this->auto_slashes) {
			// strip all slashes out of row...
			foreach ($row as $key => $value) {
			$row[$key] = stripslashes($value);
			}
			}
			return $row;
		}

		

		function insertSql($sql)
		{

			// Inserts data in the database via SQL query.
			// Returns the id of the insert or true if there is not auto_increment
			// column in the table.  Returns false if there is an error.      

			$this->last_query = $sql;

			$r = mysql_query($sql, $this->db_link);
			if (!$r) {
			$this->last_error = mysql_error($this->db_link);
			return false;
			}

			$id = mysql_insert_id($this->db_link);
			if ($id == 0) return true;
			else return $id; 
		}

		function updateSql($sql)
		{

			// Updates data in the database via SQL query.
			// Returns the number or row affected or true if no rows needed the update.
			// Returns false if there is an error.

			$this->last_query = $sql;

			$r = mysql_query($sql, $this->db_link);
			if (!$r) {
			$this->last_error = mysql_error($this->db_link);
			return false;
			}

			$rows = mysql_affected_rows($this->db_link);
			if ($rows == 0)
			{
				return true;  // no rows were updated
			}
			else
			{
				return $rows;
			}
		}
   
		

		function deleteSql($table,$condition,$fields="")
		{
			if(empty($fields))
				$sql = "DELETE From ".$table." WHERE ".$condition;
			else
				$sql = "DELETE ".$fields." From $table WHERE ".$condition;
			//echo $sql;
			//exit;
			$this->last_query = $sql;
			$r = mysql_query($sql, $this->db_link);
			if (!$r)
			{
				$this->last_error = mysql_error($this->db_link);
				return false;
			}
			$rows = mysql_affected_rows($this->db_link);
			if ($rows == 0) return true;  // no rows were deleted
			else return $rows;
		}

		
		function __destruct() {
			mysql_close($this->db_link);
		}
	}
?>