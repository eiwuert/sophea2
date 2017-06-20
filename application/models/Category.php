<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include DAO Class
include_once 'Datastructure.php';

// Define Category Class
class Category extends Datastructure{
	
	// Get All Category
	function getAllCategory() {
            $select = '';
            $from = $this->getTblCategory()." AS ct";
            $from .= " JOIN ". $this->getTblType()." AS ty ON ct.types_id = ty.types_id";
            $where = '';
            if($this->getSearch() <> '' || $this->getSearch() != ''){
                $where .= " categories_name LIKE '%".$this->getSearch()."%' AND";
            }
            $where .= " categories_deleted = 0";
            
            // Check If Limit
            if($this->getLimit() != '0' || $this->getStart() != '0'){
				if($this->getStart() == '1' || $this->getStart() == ''){
                    $this->setStart('0');
				}
				$where .= " LIMIT ".$this->getStart().", ".$this->getLimit();
            }
            
            return $this->executeQuery($select, $from, $where);
	}
	
	function allCategory(){
		return $this->executeQuery("", $this->getTblCategory()," categories_deleted = 0");
	}
	
	// Get Count All Category
	function getCountCategory() {
		return $this->getCountWhere($this->getTblCategory(), ' categories_deleted = 0');
	}
	
	// Add or Insert Category
	function add(){
			$this->insertData($this->getTblCategory(),$this->getArrayDatas());
	}
	
	// Update Category
	function update(){
		$this->updateData($this->getTblCategory(),$this->getArrayDatas(), 'categories_id', $this->getId());
	}
	
    // Delete Category go to trash
	function delete(){
		$this->updateData($this->getTblCategory(), array('categories_deleted' => "1"), 'categories_id', $this->getId());
	}
	// Get Category Info by ID
	function getCategoryById(){
		return $this->executeQuery('', $this->getTblCategory(), ' categories_id = '.$this->getId().' AND categories_deleted = 0');
	}
	
	//Array data for Insert and Update
	function getArrayDatas(){
		
		$this->setArrayData('types_id',$this->getTypeId());
		$this->setArrayData('categories_name',$this->getName());
		$this->setArrayData('categories_desc',$this->getDesc());
	
		return $this->getArrayData();
		
	}
	
	// Get Category Combo
	function getCategoryCombo(){
		$arr = array();
		$inifo = $this->allCategory();
		foreach ($inifo as $rows){
			$arr[$rows->categories_id] = $rows->categories_name;
		}
		
		return $arr;
	}
}
?>
