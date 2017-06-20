<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Ipd
class Ipds extends Securities {
	
	// Define Index of Ipd Fucntion
	public function index() {
	    
	    // Check Session
	    $this->checkSession();
            $this->setSession('assign_to', $this->getSession('user_id'));
            
            $data = array();
            
            // Get Item Per Page 
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['totals'] = $this->VisitorModel->getCountVisitorIpd();
            
            // Get Translate Word to View 
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
        }
  	
	// Set Visitor Leave
	function visitor_leave(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->VisitorModel->setId($this->getUrlSegment3());
	    $this->VisitorModel->setVisitorLeave();
	    $this->VisitorModel->setVisitorLeaveDate($this->getCurrentDate());
	    $this->VisitorModel->update();
	}
        
	// ===================== JSON DATA ========================== //
        function get_ipd_list(){  
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    /*$this->VisitorModel->setStart($this->getPost('page_start'));
	    $this->VisitorModel->setLimit($this->getPost('page_limit'));*/
            $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
            $datas = $this->VisitorModel->getAllVisitorIpd();
            $this->restData($datas);
	}
		
	function get_ipd_info_by_id_json(){ 
	    
	    // Check Session
	    $this->checkSession();
	    
            $this->PatientModel->setId($this->getUrlSegment3());
            $datas = $this->PatientModel->getPatientById();
            $this->restData($datas);
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
            $data['ac_ipds'] = 'active';
            
            return $data;
        }
        
        
}
?>