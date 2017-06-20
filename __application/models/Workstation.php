<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include DAO Class
include_once 'Datastructure.php';

// Define workstation Class
class Workstation extends Datastructure{
	
	// Get All Workstation
	function getAllWorkstation() {
            $select = '';
            $from = $this->getTblWorkstation();
            $where = '';
            if($this->getSearch() <> '' || $this->getSearch() != ''){
                $where .= " workstation_name LIKE '%".$this->getSearch()."%' AND";
            }
            $where .= " workstation_deleted = 0";
            
            // Check If Limit
            if($this->getLimit() != '0' || $this->getStart() != '0' ){
				if($this->getStart() == '1' || $this->getStart() == ''){
                    $this->setStart('0');
				}
				$where .= " LIMIT ".$this->getStart().", ".$this->getLimit();
            }
           	return $this->executeQuery($select, $from, $where);
	}
	
	function allWorkstation(){
		return $this->executeQuery("", $this->getTblWorkstation()," workstation_deleted = 0");
	}
	
	// Get Count All workstation
	function getCountWorkstation(){
		return $this->getCountWhere($this->getTblWorkstation(), ' workstation_deleted = 0');
	}
	
	// Add or Insert Workstation
	function add(){
		$this->insertData($this->getTblWorkstation(),$this->getArrayDatas());
	}
	
	// Update workstation
	function update(){
		$this->updateData($this->getTblWorkstation(),$this->getArrayDatas(), 'workstation_id', $this->getId());
	}
	
    // Delete Unit go to trash
	function delete(){
		$this->updateData($this->getTblWorkstation(), array('workstation_deleted' => "1"), 'workstation_id', $this->getId());
	}
	// Get Workstation Info by ID
	function getWorkstationById(){
		return $this->executeQuery('', $this->getTblWorkstation(), ' workstation_id = '.$this->getId().' AND workstation_deleted = 0');
	}
	
	//Array data for Insert and Update
    function getArrayDatas(){
		
		$this->setArrayData('workstation_name',$this->getName());
		$this->setArrayData('workstation_desc',$this->getDesc());
	
		return $this->getArrayData();
		
    }
}
?>
