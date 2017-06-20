<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Strucgture Class
include_once 'Datastructure.php';

// Define Payment Class
class Payment extends Datastructure{
    
	function getVisitorPayHistory(){
	    return $this->executeQuery('', $this->getTblServicePayment(), " visitors_id = ".$this->getVisitorId());
	}
	
	// Add or Insert Unit
	function add(){
	    $this->setArrayData('visitors_id', $this->getVisitorId());
	    $this->setArrayData('payments_amount', $this->getAmount());
        $this->setArrayData('payments_discount', $this->getDiscount());
	    $this->setArrayData('payments_note', $this->getDesc());
	    
	    $this->insertData($this->getTblServicePayment(),$this->getArrayData());
	}
	
	// Update Unit
	function update(){
		$this->updateData($this->getTblUnit(),$this->getArrayDatas(), 'units_id', $this->getId());
	}
	
	// Delete Unit go to trash
	function delete(){
		$this->updateData($this->getTblUnit(), array('units_deleted' => "1"), 'units_id', $this->getId());
	}

}
?>
