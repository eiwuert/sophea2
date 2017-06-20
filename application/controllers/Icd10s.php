<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Icd10
class Icd10s extends Securities {
	
	// Define Index of Unit Fucntion
	public function index() {
	    
	    // Check Session
	    $this->checkSession();
            $this->permissionSection('mDiagnostic');
            $this->checkPermission();
             
            $data = array();
            
            // Get Item Per Page 
	    $data['item_per_page'] = $this->getSysConfig();

	    // Get Count All Ward
	    $data['totals'] = $this->Icd10Model->getCountIcd10();
            
            // Get Translate Word to View 
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('icd10s/list');
            $this->LoadView('template/footer');
        }
        
        function save_icd10(){

	    // Check Session
	    $this->checkSession();
	    
	    $this->Icd10Model->setId($this->getPost('icd10_id'));
	    $this->Icd10Model->setIcd10Code($this->getPost('icd10_code'));
	    $this->Icd10Model->setDesc($this->getPost('icd10_desc'));
            
            if($this->getPost('icd10_id') == NULL || $this->getPost('icd10_id') == ""){
		    $this->Icd10Model->add();
	    }else{
		    $this->Icd10Model->update();
	    }
            // Write Log
            //$this->logs('3', 'Try to access application with user: '.$this->getPost('unit_name').' / '.$this->getPost('unit_desc'));
            
	}
        
        function get_icd10_list(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->Icd10Model->setSearch($this->getPost('search_data'));
	    $this->Icd10Model->setStart($this->getPost('page_start'));
	    $this->Icd10Model->setLimit($this->getPost('page_limit'));
            $datas = $this->Icd10Model->getAllIcd10();
            $this->restData($datas);
	}

	function get_icd10_info_by_id_json(){ 
	    
	    // Check Session
	    $this->checkSession();
	    
            $this->Icd10Model->setId($this->getUrlSegment3());
            $datas = $this->Icd10Model->getIcd10ById();
            $this->restData($datas);
	}
		
	// Get Icd10 Json Data By Name
        function get_icd10_by_name_json(){
	    
	    // Check Session
	    $this->checkSession();
	    
            $this->Icd10Model->setIcd10Code(urldecode($this->getUrlSegment3()));
            $datas = $this->Icd10Model->getIcd10InfoByName();
            $this->restData($datas);
        }
        
        // ICD10 Count
        function get_count_icd10(){
	    // Check Session
	    $this->checkSession();
	    
	    $datas = $this->Icd10Model->getCountIcd10();
	    $this->restData($datas);
	}
		
	// Delete ICD10 
        function delete_icd10(){
            
	    // Check Session
	    $this->checkSession();
	    
            $this->Icd10Model->setId($this->getUrlSegment3());
            $this->Icd10Model->delete();
            
            // Write Log in to log file
            $this->logs('3', 'Delete '.$this->getUrlSegment1().' Icd10 From List');
            $this->logs('4', 'Delete '.$this->getUrlSegment1().' Icd10 From List');
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
            $data['ac_icd10s'] = 'active';
            
            return $data;
        }
        
        
}
?>