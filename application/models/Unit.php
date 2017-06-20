<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include DAO Class
include_once 'Datastructure.php';

// Define Unit Class
class Unit extends Datastructure{
	
	// Get All Unit
	function getAllUnit() {
            $select = '';
            $from = $this->getTblUnit();
            $where = '';
            if($this->getSearch() <> '' || $this->getSearch() != ''){
                $where .= " units_name LIKE '%".$this->getSearch()."%' AND";
            }
            $where .= " units_deleted = 0";
            
            // Check If Limit
            if($this->getLimit() != '0' || $this->getStart() != '0'){
				if($this->getStart() == '1' || $this->getStart() == ''){
                    $this->setStart('0');
				}
				$where .= " LIMIT ".$this->getStart().", ".$this->getLimit();
            }
            
            return $this->executeQuery($select, $from, $where);
	}
	
	function allUnit(){
		return $this->executeQuery("", $this->getTblUnit()," units_deleted = 0");
	}
	
	// Get Count All Unit
        function getCountUnit() {
            return $this->getCountWhere($this->getTblUnit(), ' units_deleted = 0');
        }
	
	// Add or Insert Unit
	function add(){
			$this->insertData($this->getTblUnit(),$this->getArrayDatas());
	}
	
	// Update Unit
	function update(){
		$this->updateData($this->getTblUnit(),$this->getArrayDatas(), 'units_id', $this->getId());
	}
	
    // Delete Unit go to trash
	function delete(){
		$this->updateData($this->getTblUnit(), array('units_deleted' => "1"), 'units_id', $this->getId());
	}
	// Get Unit Info by ID
	function getUnitById(){
		return $this->executeQuery('', $this->getTblUnit(), ' units_id = '.$this->getId().' AND units_deleted = 0');
	}
	
	//Array data for Insert and Update
	function getArrayDatas(){
		
		$this->setArrayData('units_name',$this->getName());
		$this->setArrayData('units_desc',$this->getDesc());
	
		return $this->getArrayData();
		
	}
        
    // Get Unit Combo
	function getUnitCombo(){
		$arr = array();
		$inifo = $this->allUnit();
		foreach ($inifo as $rows){
			$arr[$rows->units_id] = $rows->units_name;
		}
		
		return $arr;
	}

}
?>
