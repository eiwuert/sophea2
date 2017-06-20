<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Ward
class Wards extends Securities {
	
	// Define Index of Unit Fucntion
	public function index() {
	    
	    // Check Session
	    $this->checkSession();
             
            $data = array();
            
            // Get Item Per Page 
	    $data['item_per_page'] = $this->getSysConfig();

	    // Get Count All Ward
	    $data['totals'] = $this->WardModel->getCountWard();
            
            // Get Translate Word to View 
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('wards/list');
            $this->LoadView('template/footer');
        }
        
        function save_ward(){
	    
	    // Check Session
	    $this->checkSession();
			
	    $this->WardModel->setId($this->getPost('ward_id'));
	    $this->WardModel->setWardCode($this->getPost('ward_code'));
	    $this->WardModel->setDesc($this->getPost('ward_desc'));
            
            if($this->getPost('ward_id') == NULL || $this->getPost('ward_id') == ""){
		    $this->WardModel->add();
	    }else{
		    $this->WardModel->update();
	    }
            // Write Log
            //$this->logs('3', 'Try to access application with user: '.$this->getPost('unit_name').' / '.$this->getPost('unit_desc'));
            
	}
        
        function get_ward_list(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->WardModel->setSearch($this->getPost('search_data'));
	    $this->WardModel->setStart($this->getPost('page_start'));
	    $this->WardModel->setLimit($this->getPost('page_limit'));
            $datas = $this->WardModel->getAllWard();
            $this->restData($datas);
	}
		
	function get_ward_info_by_id_json(){ 
	    
	    // Check Session
	    $this->checkSession();
	    
            $this->WardModel->setId($this->getUrlSegment3());
            $datas = $this->WardModel->getUnitById();
            $this->restData($datas);
	}

	// Delete Ward 
        function delete_ward(){
            
	    // Check Session
	    $this->checkSession();
	    
            $this->WardModel->setId($this->getUrlSegment3());
            $this->WardModel->delete();
            
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
            $data['code'] = $this->Lang('code');
            $data['c_total'] = $this->Lang('total');
            
            // Menu Active
            $data['ac_wards'] = 'active';
            
            return $data;
        }
        
        
}
?>