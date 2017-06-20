<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include DAO Class
include_once 'Datastructure.php';

// Define Ward Class
class Ward extends Datastructure{
	
	// Get All Ward
	function getAllWard() {
            $select = '';
            $from = $this->getTblWard();
            $where = '';
            if($this->getSearch() <> '' || $this->getSearch() != ''){
                $where .= " wards_code LIKE '%".$this->getSearch()."%' AND";
            }
            $where .= " wards_deleted = 0";
            
            // Check If Limit
            if($this->getLimit() != '0' || $this->getStart() != '0'){
				if($this->getStart() == '1' || $this->getStart() == ''){
                    $this->setStart('0');
				}
				$where .= " LIMIT ".$this->getStart().", ".$this->getLimit();
            }
            
            return $this->executeQuery($select, $from, $where);
	}
	
	// Get Count All Ward
	function getCountWard() {
		return $this->getCountWhere($this->getTblWard(), ' wards_deleted = 0');
	}
	
	// Add or Insert Ward
	function add(){
			$this->insertData($this->getTblWard(),$this->getArrayDatas());
	}
	
	// Update Ward
	function update(){
		$this->updateData($this->getTblWard(),$this->getArrayDatas(), 'wards_id', $this->getId());
	}
	
    // Delete Ward go to trash
	function delete(){
		$this->updateData($this->getTblWard(), array('wards_deleted' => "1"), 'wards_id', $this->getId());
	}
	// Get Unit Info by ID
	function getUnitById(){
		return $this->executeQuery('', $this->getTblWard(), ' wards_id = '.$this->getId().' AND wards_deleted = 0');
	}
	
	//Array data for Insert and Update
	function getArrayDatas(){
		
		$this->setArrayData('wards_code',$this->getWardCode());
		$this->setArrayData('wards_desc',$this->getDesc());
	
		return $this->getArrayData();
		
	}
        
    // Get Ward Combo
	function getWardCombo(){
		$arr = array();
		$inifo = $this->getAllWard();
		foreach ($inifo as $rows){
			$arr[$rows->wards_id] = $rows->wards_code;
		}
		
		return $arr;
	}

}
?>
