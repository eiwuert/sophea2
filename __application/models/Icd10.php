<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include DAO Class
include_once 'Datastructure.php';

// Define Icd10 Class
class Icd10 extends Datastructure{
	
	// Get All Ward
	function getAllIcd10() {
            $select = '';
            $from = $this->getTblIcd10();
            $where = ' icd10_deleted = 0';
            if($this->getSearch() <> '' || $this->getSearch() != ''){
                $where .= " AND icd10_code LIKE '%".$this->getSearch()."%' OR icd10_desc LIKE '%".$this->getSearch()."%'";
            }
            
            // Check If Limit
            if($this->getLimit() != '0' || $this->getStart() != '0'){
                    if($this->getStart() == '1' || $this->getStart() == ''){
                        $this->setStart('0');
                    }
                    $where .= " LIMIT ".$this->getStart().", ".$this->getLimit();
            }
            
            return $this->executeQuery($select, $from, $where);
	}
	
	// Get All Icd10 REST Data By Name
	function getIcd10InfoByName() {
            $select = " CONCAT( `icd10_code` , '_', `icd10_desc` ) AS value";
            $from = $this->getTblIcd10();
            $where = "";
            if($this->getIcd10Code() <> '' || $this->getIcd10Code() != ''){
                $where .= " (icd10_code LIKE '".$this->getIcd10Code()."%' OR icd10_desc LIKE '".$this->getIcd10Code()."%') AND ";
            }
            $where .= " icd10_deleted = 0";
            
            return $this->executeQuery($select, $from, $where);
	}
	
	// Get Icd10 By Name
	function getIcd10IdByName() {
            $select = "";
            $from = $this->getTblIcd10();
            $where = ' icd10_deleted = 0 AND icd10_desc = "'. $this->getDesc() .'"';
            
            $result = $this->executeQuery($select, $from, $where);
	    
	    $this->setDesc('');
	    
            foreach ($result as $row){
		    return $row->icd10_id;
	    }
	}
	
	// Get Count All Icd10
	function getCountIcd10() {
		return $this->getCountWhere($this->getTblIcd10(), ' icd10_deleted = 0');
	}
	
	// Add or Insert Icd10
	function add(){
			$this->insertData($this->getTblIcd10(),$this->getArrayDatas());
	}
	
	// Update Icd10
	function update(){
		$this->updateData($this->getTblIcd10(),$this->getArrayDatas(), 'icd10_id', $this->getId());
	}
	
    // Delete Icd10 go to trash
	function delete(){
		$this->updateData($this->getTblIcd10(), array('icd10_deleted' => "1"), 'icd10_id', $this->getId());
	}
	// Get Icd10 Info by ID
	function getIcd10ById(){
		return $this->executeQuery('', $this->getTblIcd10(), ' icd10_id = '.$this->getId().' AND icd10_deleted = 0');
	}
	
	//Array data for Insert and Update
	function getArrayDatas(){
		
		$this->setArrayData('icd10_code',$this->getIcd10Code());
		$this->setArrayData('icd10_desc',$this->getDesc());
	
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
