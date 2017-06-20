<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include DAO Class
include_once 'Datastructure.php';

// Define Type Class
class Type extends Datastructure{
	
	// Get All Type
	function getAllType() {
            $select = '';
            $from = $this->getTblType();
            $where = '';
            if($this->getSearch() <> '' || $this->getSearch() != ''){
                $where .= " types_name LIKE '%".$this->getSearch()."%' AND";
            }
            $where .= " types_deleted = 0";
            
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
		return $this->executeQuery("", $this->getTblType()," types_deleted = 0");
	}
	
	// Get Count All Type
	function getCountType(){
		return $this->getCountWhere($this->getTblType(), ' types_deleted = 0');
	}
	
	// Add or Insert Type
	function add(){
		$this->insertData($this->getTblType(),$this->getArrayDatas());
	}
	
	// Update Type
	function update(){
		$this->updateData($this->getTblType(),$this->getArrayDatas(), 'types_id', $this->getId());
	}
	
    // Delete Unit go to trash
	function delete(){
		$this->updateData($this->getTblType(), array('types_deleted' => "1"), 'types_id', $this->getId());
	}
	// Get Type Info by ID
	function getTypeById(){
		return $this->executeQuery('', $this->getTblType(), ' types_id = '.$this->getId().' AND types_deleted = 0');
	}
	
	//Array data for Insert and Update
        function getArrayDatas(){
			
			$this->setArrayData('types_name',$this->getName());
			$this->setArrayData('types_desc',$this->getDesc());
		
			return $this->getArrayData();
			
        }
	
	// Get Type Combo
	function getTypeCombo(){
		$arr = array();
		$inifo = $this->allType();
		foreach ($inifo as $rows){
			$arr[$rows->types_id]=$rows->types_name;
		}
		
		return $arr;
	}
}
?>
