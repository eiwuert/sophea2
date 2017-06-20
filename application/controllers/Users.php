<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Categories
class Users extends Securities {
	
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
            $this->LoadView('users/user_list');
            $this->LoadView('template/footer');
        }

        function get_user_count(){
            // Check Session
            $this->checkSession();            
            $datas = $this->UserModel->getCountAllUser();
            $this->restData($datas);
        }
        
        function save_user(){
	    // Check Session
	    $this->checkSession();
			
	    $this->UserModel->setId($this->getUrlSegment3());
            $this->UserModel->setUsername($this->getPost('uname'));
            $this->UserModel->setPasswd($this->defaultEncrypt($this->getPost('upass')));
            $this->UserModel->setName($this->getPost('fname'));
            $this->UserModel->setUnitId($this->getPost('role'));
            $this->UserModel->setSex($this->getPost('sex'));
            $this->UserModel->setBackground($this->getPost('bg'));
            $this->UserModel->setPhone($this->getPost('phone'));
            $this->UserModel->setEmail($this->getPost('email'));
            $this->UserModel->setAddress($this->getPost('address'));
            $this->UserModel->setDesc($this->getPost('note'));
            $this->UserModel->setStatus($this->getPost('status'));
            $this->UserModel->setWorkplace($this->getPost('workplace'));

            if($this->getUrlSegment3() == NULL || $this->getUrlSegment3() == "0" || $this->getUrlSegment3() == ""){
		    $this->UserModel->add();
            }else{
                    $this->UserModel->update();
            }
            // Write Log
            //$this->logs('3', 'Try to access application with user: '.$this->getPost('unit_name').' / '.$this->getPost('unit_desc'));
            
	}
	
		// Delete Unit 
        function delete_user(){
            
	    // Check Session
	    $this->checkSession();
	    
            $this->UserModel->setId($this->getUrlSegment3());
            $this->UserModel->deleteUser();
            
            // Write Log in to log file
            $this->logs('3', 'Delete '.$this->getUrlSegment1().' Unit From List');
            $this->logs('4', 'Delete '.$this->getUrlSegment1().' Unit From List');
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
		
		// Delete Category 
        function delete_category(){
            // Check Session
	    $this->checkSession();
	    
            $this->CategoryModel->setId($this->getUrlSegment3());
            $this->CategoryModel->delete();
            
            // Write Log in to log file
            $this->logs('3', 'Delete '.$this->getUrlSegment1().' Category From List');
            $this->logs('4', 'Delete '.$this->getUrlSegment1().' Category From List');
        }
        // #################### JSON ############################ //
        function get_user_list_json(){
            
            $this->checkSession();
            $datas = $this->UserModel->getUserList();
            
            $this->restData($datas);
        }
        
        function get_user_info_json(){
            
            $this->checkSession();
            $this->UserModel->setId($this->getUrlSegment3());
            $datas = $this->UserModel->getUserInfoById();
            
            $this->restData($datas);
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
            $data['ac_users'] = 'active';
            
            return $data;
        }

        function get_doctor_by_name_json(){
            // Check Session
            $this->checkSession();
            $this->UserModel->setUsername($this->getUrlSegment3());
            $datas = $this->UserModel->getUsersInfoByName();
            $this->restData($datas);
        }

        function get_doctor_json(){
            // Check Session
            $this->checkSession();
            $this->UserModel->setSearch(urldecode($this->getUrlSegment3()));
            $datas = $this->UserModel->getUsersInfo();
            $this->restData($datas);
        }
        
}
?>
