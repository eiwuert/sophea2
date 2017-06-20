<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include DAO Class
include_once 'Datastructure.php';

// Define Sys Config Class
class SysConfig extends Datastructure{
	
	// Get All Config
	function getAllConfig() {
            $select = '';
            $from = $this->getTblHospital();
            $where = " hospital_status = 1";
 
            return $this->executeQuery($select, $from, $where);
	}

}
?>
