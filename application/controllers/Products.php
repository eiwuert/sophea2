<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Product
class Products extends Securities {
	
	// Define Index of Unit Fucntion
	public function index() {
	    
	    // Check Session
	    $this->checkSession();
            $this->permissionSection('mProduct');
            $this->checkPermission();
             
            $data = array();
            
            // Get Item Per Page 
	    $data['item_per_page'] = $this->getSysConfig();

	    // Get Count All Product
	    $data['totals'] = $this->ProductModel->getCountProduct();
            
            // Get Translate Word to View 
            $data = $this->getTranslate($data);
            
            $data['unitCombo'] = $this->UnitModel->getUnitCombo();
            $data['categoryCombo'] = $this->CategoryModel->getCategoryCombo();

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('products/list');
            $this->LoadView('template/footer');
        }
        
        function save_product(){
	    
	    // Check Session
	    $this->checkSession();
			
	    $this->ProductModel->setId($this->getPost('product_id'));
	    $this->ProductModel->setProductCode($this->getPost('product_code'));
	    $this->ProductModel->setName($this->getPost('product_name'));
	    $this->ProductModel->setProductCost($this->getPost('product_cost'));
	    $this->ProductModel->setProductQty($this->getPost('product_qty'));
	    $this->ProductModel->setProductPrice($this->getPost('product_price'));
	    $this->ProductModel->setUnitId($this->getPost('unit_id'));
	    $this->ProductModel->setCategoryId($this->getPost('category_id'));
	    $this->ProductModel->setDesc($this->getPost('product_desc'));
            
            if($this->getPost('product_id') == NULL || $this->getPost('product_id') == ""){
		    $this->ProductModel->add();
	    }else{
		    $this->ProductModel->update();
	    }
            // Write Log
            //$this->logs('3', 'Try to access application with user: '.$this->getPost('unit_name').' / '.$this->getPost('unit_desc'));
            
	}
        
	// Delete Product 
        function delete_product(){
	    
	    // Check Session
	    $this->checkSession();
            
            $this->ProductModel->setId($this->getUrlSegment3());
            $this->ProductModel->delete();
            
            // Write Log in to log file
            $this->logs('3', 'Delete '.$this->getUrlSegment1().' Product From List');
            $this->logs('4', 'Delete '.$this->getUrlSegment1().' Product From List');
        }
	
	// ===================== JSON DATA ========================== //	
        function get_product_list(){  
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->ProductModel->setSearch($this->getPost('search_data'));
	    $this->ProductModel->setStart($this->getPost('page_start'));
	    $this->ProductModel->setLimit($this->getPost('page_limit'));
	    $datas = $this->ProductModel->getAllProduct();
	    $this->restData($datas);
	}

	function get_product_info_by_id_json(){ 
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->ProductModel->setId($this->getUrlSegment3());
	    $datas = $this->ProductModel->getProductById();
	    $this->restData($datas);
	}
	
	// Get Product Json Data By Name
        function get_count_all_product(){
	    
	    // Check Session
	    $this->checkSession();	   
        $datas = $this->ProductModel->getCountProduct();
	    $this->restData($datas);
        }
	
	function get_count_product(){
	    $this->ProductModel->setTypeId('9');
	    $this->get_count_all_product();
	}
	
	function get_count_service(){
	    $this->ProductModel->setTypeId('7');
	    $this->get_count_all_product();
	}
		
	// Get Product Json Data By Name
        function get_product_by_name_json(){
	    
	    // Check Session
	    $this->checkSession();
	    
            $datas = $this->ProductModel->getProductInfoByName();
            $this->restData($datas);
        }
	
	function product_auto_complete(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->ProductModel->setName(urldecode($this->getUrlSegment3()));
	    $this->ProductModel->setTypeId('2');
	    $this->get_product_by_name_json();
	}
	
	function service_auto_complete(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->ProductModel->setName(urldecode($this->getUrlSegment3()));
	    $this->ProductModel->setTypeId('4');
	    $this->get_product_by_name_json();
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
            $data['price'] = $this->Lang('pro_price');
            $data['qty'] = $this->Lang('pro_qty');
            $data['code'] = $this->Lang('code');
            $data['cost'] = $this->Lang('pro_cost');
            $data['desc'] = $this->Lang('desc');
            $data['c_total'] = $this->Lang('total');
            
            // Menu Active
            $data['ac_products'] = 'active';
            
            return $data;
        }
        
        
}
?>