<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include DAO Class
include_once 'Datastructure.php';

// Define Type Class
class Room extends Datastructure{
	
	// Get All Type
	function getAllRoom() {
            $select = '';
            $from = $this->getTblRooms();
            $where = '';
            if($this->getSearch() <> '' || $this->getSearch() != ''){
                $where .= " room_name LIKE '%".$this->getSearch()."%' AND";
            }
            $where .= " room_deleted = 0";
            
            // Check If Limit
            if($this->getLimit() != '0' || $this->getStart() != '0'){
				if($this->getStart() == '1' || $this->getStart() == ''){
                    $this->setStart('0');
				}
				$where .= " LIMIT ".$this->getStart().", ".$this->getLimit();
            }
            
            return $this->executeQuery($select, $from, $where);
	}
	
	function allRoom(){
		return $this->executeQuery("", $this->getTblRooms()," room_deleted = 0");
	}
	
	// Get Count All Room
	function getCountRoom(){
		return $this->getCountWhere($this->getTblRooms(), ' room_deleted = 0');
	}
	
	// Add or Insert Room
	function add(){
		$this->insertData($this->getTblRooms(),$this->getArrayDatas());
	}
	
	// Update Type
	function update(){
		$this->updateData($this->getTblRooms(),$this->getArrayDatas(), 'room_id', $this->getId());
	}
	
    // Delete room go to trash
	function delete(){
		$this->updateData($this->getTblRooms(), array('room_deleted' => "1"), 'room_id', $this->getId());
	}
	// Get room Info by ID
	function getRoomById(){
		return $this->executeQuery('', $this->getTblRooms(), ' room_id = '.$this->getId().' AND room_deleted = 0');
	}
	
	//Array data for Insert and Update
        function getArrayDatas(){
			$this->setArrayData('room_code',$this->getCode());
			$this->setArrayData('room_name',$this->getName());
			$this->setArrayData('room_desc',$this->getDesc());
		
			return $this->getArrayData();
			
        }
	
    // New Patient Code
	function genPatientNo($roomCode){
        return $this->genRef('R','0',$roomCode);
	}

	function genRef($pre_char,$auto_no,$current_ref){
	    
		// In Detail  H0000001P0000001 H0000001P0000002 H0000001P0000003
		
		if($pre_char == 'R'){
			$no = str_pad($current_ref, 8, "0", STR_PAD_LEFT);
			//$ref_no = $pre_char.$no.'-'.($auto_no+1);
			$ref_no = $pre_char.$no;
		}else{
			return 'nothing';
		}
		
		$this->setPatientNo($current_ref+1);
		$this->setAutoNo($auto_no+1);
		return @$ref_no;
	}


	// Get Type Combo
	// function getTypeCombo(){
	// 	$arr = array();
	// 	$inifo = $this->allType();
	// 	foreach ($inifo as $rows){
	// 		$arr[$rows->types_id]=$rows->types_name;
	// 	}
		
	// 	return $arr;
	// }
}
?>
