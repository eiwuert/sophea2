<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Type
class Types extends Securities {
	
	// Define Index of Unit Fucntion
	public function index() {
	    
	    // Check Session
	    $this->checkSession();
             
            $data = array();
            
            // Get Item Per Page 
	    $data['item_per_page'] = $this->getSysConfig();

	    // Get Count All Type
	    $data['totals'] = $this->TypeModel->getCountType();

            // Get Translate Word to View 
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('types/list');
            $this->LoadView('template/footer');
        }
        
        function save_type(){
	    
	    // Check Session
	    $this->checkSession();
			
	    $this->TypeModel->setId($this->getPost('type_id'));
	    $this->TypeModel->setName($this->getPost('type_name'));
	    $this->TypeModel->setDesc($this->getPost('type_desc'));
            
            if($this->getPost('type_id') == NULL || $this->getPost('type_id') == ""){
		    $this->TypeModel->add();
	    }else{
		    $this->TypeModel->update();
	    }
            // Write Log
            //$this->logs('3', 'Try to access application with user: '.$this->getPost('unit_name').' / '.$this->getPost('unit_desc'));
            
	}
        
        function get_type_list(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->TypeModel->setSearch($this->getPost('search_data'));
	    $this->TypeModel->setStart($this->getPost('page_start'));
	    $this->TypeModel->setLimit($this->getPost('page_limit'));
            
            $datas = $this->TypeModel->getAllType();
            $this->restData($datas);
	}

	function get_type_info_by_id_json(){ 
	    
	    // Check Session
	    $this->checkSession();
	    
            $this->TypeModel->setId($this->getUrlSegment3());
            $datas = $this->TypeModel->getTypeById();
            $this->restData($datas);
	}

	// Delete Limit 
        function delete_type(){
	    
	    // Check Session
	    $this->checkSession();
            
            $this->TypeModel->setId($this->getUrlSegment3());
            $this->TypeModel->delete();
            
            // Write Log in to log file
            $this->logs('3', 'Delete '.$this->getUrlSegment1().' Type From List');
            $this->logs('4', 'Delete '.$this->getUrlSegment1().' Type From List');
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
            $data['ac_types'] = 'active';
            
            return $data;
        }
        
}
?>