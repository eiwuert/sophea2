<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Categories
class Roles extends Securities {
	
	// Define Index of Unit Fucntion
	public function index() {
	    // Check Session
	    $this->checkSession();

            $data = array();
            
            // Get Translate Word to View 
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('users/role_list');
            $this->LoadView('template/footer');
        }
        
        function save_role(){
            
	    // Check Session
	    $this->checkSession();
			
            $this->UserModel->setHospitalId($this->getSession('hospitalId'));
	    $this->UserModel->setName($this->getPost('role_name'));
	    $this->UserModel->setDesc($this->getPost('role_desc'));

            if($this->getUrlSegment3() == '0'){
                $this->UserModel->addRole();
	    }else{
                $this->UserModel->setId($this->getUrlSegment3());
                $this->UserModel->updateRole();
	    }
            // Write Log
            //$this->logs('3', 'Try to access application with user: '.$this->getPost('unit_name').' / '.$this->getPost('unit_desc'));
            
	}
        
        function save_permission(){
            $this->UserModel->setId($this->getUrlSegment3());
            $this->UserModel->setPermissionSection($this->getPost('section'));
            $this->UserModel->setSubject($this->getPost('right'));
            
            if($this->UserModel->getCountPermissionSection() > 0){
                $this->UserModel->updateRolePermission();
            }else{
                $this->UserModel->addRolePermission();
            }
        }
        
        function get_category_list(){ 
	    // Check Session
	    $this->checkSession();
	    
	    $this->CategoryModel->setSearch($this->getPost('search_data'));
	    $this->CategoryModel->setStart($this->getPost('page_start'));
	    $this->CategoryModel->setLimit($this->getPost('page_limit'));
			
            $datas = $this->CategoryModel->getAllCategory();
            $this->restData($datas);
	}

	function get_category_info_by_id_json(){ 
	    // Check Session
	    $this->checkSession();
	    
            $this->CategoryModel->setId($this->getUrlSegment3());
            $datas = $this->CategoryModel->getCategoryById();
            $this->restData($datas);
	}
		
		
        // #################### JSON ############################ //
        function get_role_list_json(){
            
            $this->checkSession();
            $datas = $this->UserModel->getRoleList();
            
            
            $this->restData($datas);
        }
        
        function get_role_info_by_id_json(){ 
	    
	    // Check Session
	    $this->checkSession();
	    
            $this->UserModel->setId($this->getUrlSegment3());
            $datas = $this->UserModel->getRoleById();
            $this->restData($datas);
        }
		
		// Delete Role
        function delete_role(){
            
	    // Check Session
	    $this->checkSession();
	    
            $this->UserModel->setId($this->getUrlSegment3());
            $this->UserModel->deleteRole();
            
            // Write Log in to log file
            $this->logs('3', 'Delete '.$this->getUrlSegment1().' Role From List');
            $this->logs('4', 'Delete '.$this->getUrlSegment1().' Role From List');
        }
        
        function get_role_permission_by_id_json(){
            // Check Session
	    $this->checkSession();
	    
            $this->UserModel->setId($this->getUrlSegment3());
            $datas = $this->UserModel->getRolePermission();
            return $this->restData($datas);
            
            // Write Log in to log file
            $this->logs('3', 'Get '.$this->getUrlSegment1().' Permission Role#'.$this->getUrlSegment3());
            $this->logs('4', 'Get '.$this->getUrlSegment1().' Permission Role#'.$this->getUrlSegment3());
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
            $data['ac_roles'] = 'active';
            
            return $data;
        }
        
}
?>
