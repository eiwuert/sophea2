<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Categories
class Categories extends Securities {
	
	// Define Index of Unit Fucntion
	public function index() {
	    // Check Session
	    $this->checkSession();
            $this->permissionSection('mCategory');
            $this->checkPermission();
             
            $data = array();
            
            // Get Item Per Page 
	    $data['item_per_page'] = $this->getSysConfig();

	    // Get Count All Category
	    $data['totals'] = $this->CategoryModel->getCountCategory();
            
            // Get Translate Word to View 
            $data = $this->getTranslate($data);
            
            $data['typeCombo'] = $this->TypeModel->getTypeCombo();

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('categories/list');
            $this->LoadView('template/footer');
        }
        
        function save_category(){
	    // Check Session
	    $this->checkSession();
			
	    $this->CategoryModel->setId($this->getPost('category_id'));
	    $this->CategoryModel->setName($this->getPost('category_name'));
	    $this->CategoryModel->setTypeId($this->getPost('type_id'));
	    $this->CategoryModel->setDesc($this->getPost('category_desc'));

            if($this->getPost('category_id') == NULL || $this->getPost('category_id') == ""){
                    $this->permissionSection('mAddCategory');
                    $this->checkPermission();
		    $this->CategoryModel->add();
	    }else{
                    $this->permissionSection('mEditCategory');
                    $this->checkPermission();
		    $this->CategoryModel->update();
	    }
            // Write Log
            //$this->logs('3', 'Try to access application with user: '.$this->getPost('unit_name').' / '.$this->getPost('unit_desc'));
            
	}
        
        function get_category_list(){ 
	    // Check Session
	    $this->checkSession();
            $this->permissionSection('mCategory');
            $this->checkPermission();
	    
	    $this->CategoryModel->setSearch($this->getPost('search_data'));
	    $this->CategoryModel->setStart($this->getPost('page_start'));
	    $this->CategoryModel->setLimit($this->getPost('page_limit'));
			
            $datas = $this->CategoryModel->getAllCategory();
            $this->restData($datas);
	}

	function get_category_info_by_id_json(){ 
	    // Check Session
	    $this->checkSession();
            $this->permissionSection('mAddCategory');
            $this->checkPermission();
	    
            $this->CategoryModel->setId($this->getUrlSegment3());
            $datas = $this->CategoryModel->getCategoryById();
            $this->restData($datas);
	}
		
        // Delete Category 
        function delete_category(){
            // Check Session
	    $this->checkSession();
            $this->permissionSection('mDeleteCategory');
            $this->checkPermission();
	    
            $this->CategoryModel->setId($this->getUrlSegment3());
            $this->CategoryModel->delete();
            
            // Write Log in to log file
            $this->logs('3', 'Delete '.$this->getUrlSegment1().' Category From List');
            $this->logs('4', 'Delete '.$this->getUrlSegment1().' Category From List');
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
            $data['ac_categories'] = 'active';
            
            return $data;
        }
        
}
?>