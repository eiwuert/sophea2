<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Unit
class Units extends Securities {
	
	// Define Index of Unit Fucntion
	public function index() {
	    
	    // Check Session
	    $this->checkSession();
             
            $data = array();
            
	    // Get Item Per Page 
	    $data['item_per_page'] = $this->getSysConfig();

	    // Get Count All Unit
	    $data['totals'] = $this->UnitModel->getCountUnit();
			
            // Get Translate Word to View 
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('units/list');
            $this->LoadView('template/footer');
        }
        
        function save_unit(){
	    
	    // Check Session
	    $this->checkSession();
			
	    $this->UnitModel->setId($this->getPost('unit_id'));
	    $this->UnitModel->setName($this->getPost('unit_name'));
	    $this->UnitModel->setDesc($this->getPost('unit_desc'));
            
            if($this->getPost('unit_id') == NULL || $this->getPost('unit_id') == ""){
		    $this->UnitModel->add();
	    }else{
		    $this->UnitModel->update();
	    }
            // Write Log
            //$this->logs('3', 'Try to access application with user: '.$this->getPost('unit_name').' / '.$this->getPost('unit_desc'));
            
	}
        
        function get_unit_list(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->UnitModel->setLimit($this->getPost('page_limit'));
	    $this->UnitModel->setStart($this->getPost('page_start'));
            $this->UnitModel->setSearch($this->getPost('search_data'));
            $datas = $this->UnitModel->getAllUnit();
            $this->restData($datas);
	}

	function get_unit_info_by_id_json(){ 
	    
	    // Check Session
	    $this->checkSession();
	    
            $this->UnitModel->setId($this->getUrlSegment3());
            $datas = $this->UnitModel->getUnitById();
            $this->restData($datas);
	}
		
	// Delete Unit 
        function delete_unit(){
            
	    // Check Session
	    $this->checkSession();
	    
            $this->UnitModel->setId($this->getUrlSegment3());
            $this->UnitModel->delete();
            
            // Write Log in to log file
            $this->logs('3', 'Delete '.$this->getUrlSegment1().' Unit From List');
            $this->logs('4', 'Delete '.$this->getUrlSegment1().' Unit From List');
        }
        
        // #################### Translate ####################### //
        // Translate to View
        function getTranslate($data = null){
            
            // Define Default Language from Security to view
            @$data = $this->defTranslation($data);
            
            // Translate
            $data['edit'] = $this->Lang('update');
            $data['delete'] = $this->Lang('delete');
            $data['disactive'] = $this->Lang('disactive');
            $data['title'] = $this->Lang('unit');
            $data['name'] = $this->Lang('name');
            $data['list'] = $this->Lang('list');
            $data['create'] = $this->Lang('create');
            $data['desc'] = $this->Lang('desc');
            $data['c_total'] = $this->Lang('total');
            
            // Menu Active
            $data['ac_units'] = 'active';
            
            return $data;
        }
        
        
}
?>