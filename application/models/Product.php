<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include DAO Class
include_once 'Datastructure.php';

// Define Product Class
class Product extends Datastructure{
	
	// Get All Product
	function getAllProduct() {
            $select = '';
            $from = $this->getTblProduct()." AS po";
            $from .= " JOIN ". $this->getTblCategory()." AS ct ON po.categories_id = ct.categories_id";
            $from .= " JOIN ". $this->getTblUnit()." AS un ON po.units_id = un.units_id";
            $where = ' products_deleted = 0';
            if($this->getSearch() <> '' || $this->getSearch() != ''){
                $where .= " AND (products_name LIKE '%".$this->getSearch()."%' OR products_code LIKE '%".$this->getSearch()."%') ";
            }
            $where .= " ORDER BY products_name";
            
            // Check If Limit
            /*if($this->getLimit() != '0' || $this->getStart() != '0'){
				if($this->getStart() == '1' || $this->getStart() == ''){
                    $this->setStart('0');
				}
				$where .= " LIMIT ".$this->getStart().", ".$this->getLimit();
            }*/
            
            return $this->executeQuery($select, $from, $where);
            
	}
	
	// Get All Product REST Data By Name
	function getProductInfoByName() {
            $select = " CONCAT( `products_name` , '-', `products_code`, '-', `units_name`,'-', `products_price`,'-', `products_desc` ) AS value";
            $from = $this->getTblProduct()." AS pr";
	    $from .= " JOIN ". $this->getTblCategory() ." AS ca ON ca.categories_id = pr.categories_id";
	    $from .= " JOIN ". $this->getTblUnit() ." AS un ON un.units_id = pr.units_id";
	    $from .= " JOIN ". $this->getTblType() ." AS ty ON ty.types_id = ca.types_id";
            $where = " products_deleted = 0 ";
            if($this->getName() <> '' || $this->getName() != ''){
                $where .= " AND (products_name LIKE '%".$this->getName()."%' OR products_code LIKE '%".$this->getName()."%') AND ty.types_id = ".$this->getTypeId();
            }
            
            return $this->executeQuery($select, $from, $where);
	}
	
	function getPruductIdByName(){
	    $result = $this->executeQuery(' products_id', $this->getTblProduct()," products_name = '".$this->getProductCode()."'");
	    foreach ($result as $row){
		return $row->products_id;
	    }
	}
	
	// Get Count All Product
	function getCountProduct() {
	    
		$where = " products_deleted = 0";
		if($this->getTypeId() == '7'){
		   $where .= " AND categories_id IN (7,8)";
		}else{
		    $where .= " AND categories_id NOT IN (7,8)";
		}
		return $this->getCountWhere($this->getTblProduct(), $where);
	}
	
	// Add or Insert Product
	function add(){
			$this->insertData($this->getTblProduct(),$this->getArrayDatas());
	}
	
	// Update Product
	function update(){
		$this->updateData($this->getTblProduct(),$this->getArrayDatas(), 'products_id', $this->getId());
	}
	
    // Delete Product go to trash
	function delete(){
		$this->updateData($this->getTblProduct(), array('products_deleted' => "1"), 'products_id', $this->getId());
	}
	// Get Product Info by ID
	function getProductById(){
		return $this->executeQuery('', $this->getTblProduct(), ' products_id = '.$this->getId().' AND products_deleted = 0');
	}
	
	//Array data for Insert and Update
        function getArrayDatas(){
			
			$this->setArrayData('units_id',$this->getUnitId());
			$this->setArrayData('categories_id',$this->getCategoryId());
			$this->setArrayData('products_code',$this->getProductCode());
			$this->setArrayData('products_name',$this->getName());
			$this->setArrayData('products_desc',$this->getDesc());
			$this->setArrayData('products_qty',$this->getProductQty());
			$this->setArrayData('products_cost',$this->getProductCost());
			$this->setArrayData('products_price',$this->getProductPrice());
		
			return $this->getArrayData();
			
        }

}
?>
