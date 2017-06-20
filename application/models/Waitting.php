<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include DAO Class
include_once 'Datastructure.php';

// Define Type Class
class Waitting extends Datastructure{
	
	// Get All Waitting
	function getAllWaitting() {
            $select = '';
            $from = $this->getTblWaitting();
            $from .= " LEFT JOIN ". $this->getTblPatient() ." ON ".$this->getTblPatient().".patient_id = ".$this->getTblWaitting().".waitting_patient_id";
            $from .= " LEFT JOIN ". $this->getTblRooms() ." ON ".$this->getTblRooms().".room_id = ".$this->getTblWaitting().".waitting_room";
            $from .= " LEFT JOIN ". $this->getTblWard() ." ON ".$this->getTblWard().".wards_id = ".$this->getTblWaitting().".waitting_examination";
            $from .= " LEFT JOIN ". $this->getTblUser() ." ON ".$this->getTblUser().".uid = ".$this->getTblWaitting().".waitting_doctor";

            $where = '';
            if($this->getSearch() <> '' || $this->getSearch() != ''){
                $where .= " waitting_name LIKE '%".$this->getSearch()."%' AND";
            }
            $where .= " waitting_deleted = 0 AND waitting_id_out = 0 ORDER BY waitting_code ASC";

            // Check If Limit
            if($this->getLimit() != '0' || $this->getStart() != '0'){
				if($this->getStart() == '1' || $this->getStart() == ''){
                    $this->setStart('0');
				}
				$where .= " LIMIT ".$this->getStart().", ".$this->getLimit();
            }
            
            return $this->executeQuery($select, $from, $where);
	}
	
	function allType(){
		return $this->executeQuery("", $this->getTblWaitting()," waitting_deleted = 0 AND waitting_id_out = 0");
	}
	
	// Get Count All Waitting
	function getCountWaitting(){
		return $this->getCountWhere($this->getTblWaitting(), ' waitting_deleted = 0 AND waitting_id_out = 0');
	}
	
	// Add or Insert Waitting
	function add(){
		$this->insertData($this->getTblWaitting(),$this->getArrayDatas());
	}
	
	// Update Waitting
	function update(){
		$this->updateData($this->getTblWaitting(),$this->getArrayDatas(), 'waitting_id', $this->getId());
	}
	
    // Delete Unit go to trash
	function delete(){
		$this->updateData($this->getTblWaitting(), array('waitting_deleted' => "1"), 'waitting_id', $this->getId());
	}
	// Get Waitting Info by ID
	function getWaittingById(){
			$from = $this->getTblWaitting();
            $from .= " LEFT JOIN ". $this->getTblPatient() ." ON ".$this->getTblPatient().".patient_id = ".$this->getTblWaitting().".waitting_patient_id";
            $from .= " LEFT JOIN ". $this->getTblRooms() ." ON ".$this->getTblRooms().".room_id = ".$this->getTblWaitting().".waitting_room";
            $from .= " LEFT JOIN ". $this->getTblWard() ." ON ".$this->getTblWard().".wards_id = ".$this->getTblWaitting().".waitting_examination";
            $from .= " LEFT JOIN ". $this->getTblUser() ." ON ".$this->getTblUser().".uid = ".$this->getTblWaitting().".waitting_doctor";
            $where = "";
            if($this->getCheckOut() > 0){
            	$where .= ' waitting_id = '.$this->getId().' AND waitting_deleted = 0 AND waitting_id_out = 1';
            }else{
            	$where .= ' waitting_id = '.$this->getId().' AND waitting_deleted = 0 AND waitting_id_out = 0';
            }
		return $this->executeQuery('', $from, $where);
	}

	//Array data for Insert and Update
        function getArrayDatas(){
			$this->setArrayData('waitting_code',$this->getCode());
			$this->setArrayData('waitting_examination',$this->getExamination());
			$this->setArrayData('waitting_patient_id',$this->getPatientId());
			$this->setArrayData('waitting_date',$this->getDate());
			$this->setArrayData('waitting_open',$this->getWaittingOpen());
			$this->setArrayData('waitting_room',$this->getRoomId());
			$this->setArrayData('waitting_doctor',$this->getDoctor());
			return $this->getArrayData();
        }
	
	// New Number Waitting
	function genNumber(){
		$query = $this->executeLastQueryId($this->getTblWaitting(),$order="waitting_id",$by="DESC");
        if($query->num_rows() > 0){
        	return $query->row()->waitting_code +1;
        }else{
        	return 1;
        }
	}
	function checkIdOut(){
		$this->updateData($this->getTblWaitting(), array('waitting_id_out' => "1"), 'waitting_id', $this->getId());
	}

	// Get All Waitting on screen
	function getAllWaittingOnScreen() {
            $select = '';
            $from = $this->getTblWaitting();
            $from .= " LEFT JOIN ". $this->getTblPatient() ." ON ".$this->getTblPatient().".patient_id = ".$this->getTblWaitting().".waitting_patient_id";
            $from .= " LEFT JOIN ". $this->getTblRooms() ." ON ".$this->getTblRooms().".room_id = ".$this->getTblWaitting().".waitting_room";
            $from .= " LEFT JOIN ". $this->getTblWard() ." ON ".$this->getTblWard().".wards_id = ".$this->getTblWaitting().".waitting_examination";            
            $from .= " LEFT JOIN ". $this->getTblUser() ." ON ".$this->getTblUser().".uid = ".$this->getTblWaitting().".waitting_doctor";

            $where = '';            
            $where .= " waitting_deleted = 0 AND waitting_id_out = 0 AND waitting_open = 1 ORDER BY waitting_code ASC Limit 6";            
            return $this->executeQuery($select, $from, $where);
	}

	
	// Get All Waitting History
	function getAllWaitting_history() {
            $select = '';
            $from = $this->getTblWaitting();
            $from .= " LEFT JOIN ". $this->getTblPatient() ." ON ".$this->getTblPatient().".patient_id = ".$this->getTblWaitting().".waitting_patient_id";
            $from .= " LEFT JOIN ". $this->getTblRooms() ." ON ".$this->getTblRooms().".room_id = ".$this->getTblWaitting().".waitting_room";
            $from .= " LEFT JOIN ". $this->getTblWard() ." ON ".$this->getTblWard().".wards_id = ".$this->getTblWaitting().".waitting_examination";
            $from .= " LEFT JOIN ". $this->getTblUser() ." ON ".$this->getTblUser().".uid = ".$this->getTblWaitting().".waitting_doctor";

            $where = '';
            if($this->getSearch() <> '' || $this->getSearch() != ''){
                $where .= " waitting_name LIKE '%".$this->getSearch()."%' AND";
            }
            $where .= " waitting_deleted = 0 AND waitting_id_out = 1";

            // Check If Limit
            if($this->getLimit() != '0' || $this->getStart() != '0'){
				if($this->getStart() == '1' || $this->getStart() == ''){
                    $this->setStart('0');
				}
				$where .= " LIMIT ".$this->getStart().", ".$this->getLimit();
            }
            
            return $this->executeQuery($select, $from, $where);
	}
	// Get Count All Waitting History
	function getCountWaitting_history(){
		return $this->getCountWhere($this->getTblWaitting(), ' waitting_deleted = 0 AND waitting_id_out = 1');
	}
}
?>
