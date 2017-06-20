<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Pharmacy
class Pharmacies extends Securities {
	
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
            $this->LoadView('pharmacies/list');
            $this->LoadView('template/footer');
        }
	
	function paid_service(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->PaymentModel->setVisitorId($this->getUrlSegment3());
	    $this->PaymentModel->setAmount($this->getPost('amount'));
            $this->PaymentModel->setDiscount($this->getPost('discount'));
	    $this->PaymentModel->setDesc($this->getPost('desc'));
	    
	    $this->PaymentModel->add();	
	    
	}
	
        // #################### JSON DATA ####################### //
	function get_visitor_list_by_patient_id(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->VisitorModel->setPatientId($this->getUrlSegment3());
	    $datas = $this->VisitorModel->getPatientVisit();
	    $this->restData($datas);
	}
	
	function get_visitor_payment_history(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->PaymentModel->setVisitorId($this->getUrlSegment3());
	    $datas = $this->PaymentModel->getVisitorPayHistory();
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
            $data['ac_payments'] = 'active';
            
            return $data;
        }
        
        
}
?>