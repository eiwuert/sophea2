<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Workstation
class WorkStations extends Securities {
	
	// Define Index of Unit Fucntion
	public function index() {
	    
	    // Check Session
	    $this->checkSession();
             
        $data = array();
            
        // Get Item Per Page 
	    $data['item_per_page'] = $this->getSysConfig();

	    // Get Count All Workstation
	    $data['totals'] = $this->WorkstationModel->getCountWorkstation();

            // Get Translate Word to View 
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('wordstation/list');
            $this->LoadView('template/footer');
        }
        
        function save_workstation(){
	    
	    // Check Session
	    $this->checkSession();
			
	    $this->WorkstationModel->setId($this->getPost('workstation_id'));
	    $this->WorkstationModel->setName($this->getPost('workstation_name'));
	    $this->WorkstationModel->setDesc($this->getPost('workstation_desc'));
            
        if($this->getPost('workstation_id') == NULL || $this->getPost('workstation_id') == ""){
		    $this->WorkstationModel->add();
	    }else{
		    $this->WorkstationModel->update();
	    }
        // Write Log
        //$this->logs('3', 'Try to access application with user: '.$this->getPost('unit_name').' / '.$this->getPost('unit_desc'));
            
	}
        
    function get_workstation_list(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->WorkstationModel->setSearch($this->getPost('search_data'));
	    $this->WorkstationModel->setStart($this->getPost('page_start'));
	    $this->WorkstationModel->setLimit($this->getPost('page_limit'));
            
            $datas = $this->WorkstationModel->getAllWorkstation();
            $this->restData($datas);
	}

	function get_workstation_info_by_id_json(){ 
	    
	    // Check Session
	    $this->checkSession();	    
            $this->WorkstationModel->setId($this->getUrlSegment3());
            $datas = $this->WorkstationModel->getWorkstationById();
            $this->restData($datas);
	}

	// Delete Limit 
    function delete_workstation(){
    
        // Check Session
        $this->checkSession();
        
        $this->WorkstationModel->setId($this->getUrlSegment3());
        $this->WorkstationModel->delete();
        
        // Write Log in to log file
        $this->logs('3', 'Delete '.$this->getUrlSegment1().' Workstation From List');
        $this->logs('4', 'Delete '.$this->getUrlSegment1().' Workstation From List');
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
        $data['workstation'] = $this->Lang('workstation');
        $data['list'] = $this->Lang('list');
        $data['create'] = $this->Lang('create');
        $data['desc'] = $this->Lang('desc');
        $data['c_total'] = $this->Lang('total');
        
        // Menu Active
        $data['ac_workstation'] = 'active';
        
        return $data;
    }
        
}
?>