<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include DAO Class
include_once 'Datastructure.php';

// Define Category Class
class Sessionsecurity extends Datastructure{
	
	// Find Session ID By Data
	function findSessionById(){
	    $result = $this->executeQuery(" sessions_id", $this->getTblSession(), " data LIKE '%".$this->getName()."%'");
	    foreach($result as $row){
		return $row->sessions_id;
	    }
	}
	
	// Delete Session If Same Data
	function deleteSameData(){
	    $this->deleteDataWhere($this->getTblSession(), " `last_logins` <= DATE_SUB(NOW(), INTERVAL ".$this->getDate1()." MINUTE)");
	}
	
	// Delete Session If Same Data
	function deleteSession(){
	    $this->deleteDataWhere($this->getTblSession(), "  data LIKE '%".$this->getName()."%'");
	}
	
	// Check Session If Already Have
	function getCheckSessionData(){
	    return $this->getCountWhere($this->getTblSession(),  " data LIKE '%".$this->getName()."%' AND DATE_ADD(`last_logins`, INTERVAL ".$this->getDate1()." MINUTE) > NOW()");
	}
	
}
?>
