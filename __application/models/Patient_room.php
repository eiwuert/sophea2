<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include DAO Class
include_once 'Datastructure.php';

// Define Type Class
class Patient_room extends Datastructure{
	
	// Get All Ptr
	function getAllPtr() {
            $select = '';
            $from = $this->getTblPatientRoom();
            $from .= " LEFT JOIN ". $this->getTblPatient() ." ON ".$this->getTblPatient().".patient_id = ".$this->getTblPatientRoom().".ptr_patient_id";
            $from .= " LEFT JOIN ". $this->getTblRooms() ." ON ".$this->getTblRooms().".room_id = ".$this->getTblPatientRoom().".ptr_room_id";

            $where = '';
            if($this->getSearch() <> '' || $this->getSearch() != ''){
                $where .= " patient_kh_name LIKE '%".$this->getSearch()."%' AND";
            }
            $where .= " ptr_deleted = 0 ";

            // Check If Limit
            if($this->getLimit() != '0' || $this->getStart() != '0'){
				if($this->getStart() == '1' || $this->getStart() == ''){
                    $this->setStart('0');
				}
				$where .= " LIMIT ".$this->getStart().", ".$this->getLimit();
            }
            
            return $this->executeQuery($select, $from, $where);
	}
	
	function allptr(){
		return $this->executeQuery("", $this->getTblPatientRoom()," ptr_deleted = 0");
	}
	
	// Get Count All Ptr
	function getCountPtr(){
		return $this->getCountWhere($this->getTblPatientRoom(), ' ptr_deleted = 0');
	}
	
	// Add or Insert Ptr
	function add(){
		$this->insertData($this->getTblPatientRoom(),$this->getArrayDatas());
	}
	
	// Update Ptr
	function update(){
		$this->updateData($this->getTblPatientRoom(),$this->getArrayDatas(), 'ptr_id', $this->getId());
	}
	
    // Delete Unit go to trash
	function delete(){
		$this->updateData($this->getTblPatientRoom(), array('ptr_deleted' => "1"), 'ptr_id', $this->getId());
	}
	// Get Ptr Info by ID
	function getPtrById(){
		return $this->executeQuery('', $this->getTblPatientRoom(), ' ptr_id = '.$this->getId().' AND ptr_deleted = 0');
	}
	
	//Array data for Insert and Update
        function getArrayDatas(){
			$this->setArrayData('ptr_patient_id',$this->getPatientId());
			$this->setArrayData('ptr_room_id',$this->getRoomId());
			$this->setArrayData('ptr_chart_storage',$this->getChartStorageRoom());
			$this->setArrayData('ptr_date',$this->getDate());
		
			return $this->getArrayData();
        }
}
?>
