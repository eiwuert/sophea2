<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Visitor
class Visitors extends Securities {
	
	// Define Index of Unit Fucntion
	public function index() {
	    
	    // Check Session
	    $this->checkSession();
             
            $data = array();
            
            // Get Item Per Page 
	    $data['item_per_page'] = $this->getSysConfig();

	    // Get Count All Visitor
	    $data['totals'] = $this->VisitorModel->getCountVisitor();
            
            // Get Translate Word to View 
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('visitors/list');
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
	
	// Set Visitor Status For Leave
	function visitor_leave_status(){
	    // Status 0= Not Yet, 1= Cure, 2= Not Cure, 3= Refer Out, 4= Death
	    $strStatus = explode('_', $this->getUrlSegment3());
	    $this->VisitorModel->setPatientStatus($strStatus[0]);
	    $this->VisitorModel->setId($strStatus[1]);
	    
	    $this->VisitorModel->updateLeaveStatus();
	}


	// Set Visitor Leave
	function visitor_leave(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->VisitorModel->setId($this->getUrlSegment3());
	    $this->VisitorModel->setVisitorLeave();
	    $this->VisitorModel->setVisitorLeaveDate($this->getCurrentDatetime());
	    $this->VisitorModel->update();
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
	
        // #################### JSON DATA ####################### //
	function get_visitor_list_by_patient_id(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->VisitorModel->setPatientId($this->getUrlSegment3());
	    $datas = $this->VisitorModel->getPatientVisit();
	    $this->restData($datas);
	}
	
	function get_visitor_list(){  
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    /*$this->VisitorModel->setStart($this->getPost('page_start'));
	    $this->VisitorModel->setLimit($this->getPost('page_limit'));*/
            $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
            $datas = $this->VisitorModel->getAllVisitor();
            $this->restData($datas);
	}

	function get_count_patient_opd(){  
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->VisitorModel->setVisitorEnrol();
            $datas = $this->VisitorModel->getCountAllVisitor();
            $this->restData($datas);
	}
	
	function get_count_patient_ipd(){  
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->VisitorModel->setVisitorStay();
            $datas = $this->VisitorModel->getCountAllVisitor();
            $this->restData($datas);
	}
	
	function pharmacy_get_visitor_list(){  
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->VisitorModel->setSearch($this->getPost('search_data'));
            $datas = $this->VisitorModel->getAllVisitorPay();
            $this->restData($datas);
	}

	function get_visitor_id_by_patient_json(){ 
	    
	    // Check Session
	    $this->checkSession();
	    
            $this->VisitorModel->setPatientId($this->getUrlSegment3());
            $datas = $this->VisitorModel->getVisitorByPatient();
            $this->restData($datas);
	}	
	
	function get_visitor_info_by_id_json(){ 
	    
	    // Check Session
	    $this->checkSession();
	    
            $this->PatientModel->setId($this->getUrlSegment3());
            $datas = $this->PatientModel->getPatientById();
            $this->restData($datas);
	}
        
        function get_visitor_history_by_id_json(){ 
	    
	    // Check Session
	    $this->checkSession();
	    
            $this->PatientModel->setId($this->getUrlSegment3());
            $datas = $this->PatientModel->getPatientHistoryById();
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
            $data['price'] = $this->Lang('pro_price');
            $data['qty'] = $this->Lang('pro_qty');
            $data['code'] = $this->Lang('code');
            $data['cost'] = $this->Lang('pro_cost');
            $data['desc'] = $this->Lang('desc');
            $data['enrolDate'] = $this->Lang('enrol_date');
            $data['visitorStatus'] = $this->Lang('v_status');
            $data['c_total'] = $this->Lang('total');
            $data['leave'] = $this->Lang('b_leave');
            $data['view'] = $this->Lang('view');
            
            $data['date'] = $this->Lang('date');
            $data['gender'] = $this->Lang('gender');
            $data['phone'] = $this->Lang('phone');
            $data['address'] = $this->Lang('address');
            $data['khName'] = $this->Lang('kh_name');
            $data['enName'] = $this->Lang('en_name');
            $data['dob'] = $this->Lang('dob');
            $data['contact'] = $this->Lang('contact');
            $data['emergencyPhone'] = $this->Lang('em_phone');
            $data['c_total'] = $this->Lang('total');
            $data['idCard'] = $this->Lang('id_card');
            $data['assuranceCard'] = $this->Lang('assurance_card');
            $data['assuranceCompany'] = $this->Lang('assurance_company');
            $data['motorCard'] = $this->Lang('motor_card');
            $data['carCard'] = $this->Lang('car_card');
            $data['bankCard1'] = $this->Lang('bank_card1');
            $data['bankCard2'] = $this->Lang('bank_card2');
            $data['studentCard'] = $this->Lang('student_card');
            $data['general'] = $this->Lang('general');
            $data['status'] = $this->Lang('status');
            $data['disease'] = $this->Lang('disease');
            $data['heart'] = $this->Lang('heart');
            $data['respiratory'] = $this->Lang('respiratory');
            $data['diabetes'] = $this->Lang('diabetes');
            $data['digestive'] = $this->Lang('digestive');
            $data['kidney'] = $this->Lang('kidney');
            $data['endocrine'] = $this->Lang('endocrine');
            $data['neuro_sys'] = $this->Lang('neuro_sys');
            $data['occupation'] = $this->Lang('occupation');
            $data['b_ipd'] = $this->Lang('b_ipd');
            $data['b_opd'] = $this->Lang('b_opd');
            $data['ipd'] = $this->Lang('ipd');
            $data['opd'] = $this->Lang('opd');
            
            
            // Menu Active
            $data['ac_visitors'] = 'active';
            
            return $data;
        }
        
        
}
?>