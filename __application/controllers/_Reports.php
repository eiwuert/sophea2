<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Product
class Reports extends Securities {
    function index(){
	
	    // Check Session
	    $this->checkSession();
            
            $data = array();
            
            // Get Item Per Page 
	    $data['item_per_page'] = $this->getSysConfig();

	    // Get Count All Product
	    $data['totals'] = $this->ProductModel->getCountProduct();
            
            // Get Translate Word to View 
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('reports/list');
            $this->LoadView('template/footer');
    }
    
    function service_doctor(){
	    // Check Session
	    $this->checkSession();

	    $data = array();
	    $data = $this->getTranslate($data);
	    
	    // Get Count All Product
	    $this->VisitorModel->setName($this->getPost('doctor'));
	    $this->VisitorModel->setDate1(date('Y-m-d',strtotime($this->getPost('date1'))));
	    $this->VisitorModel->setDate2(date('Y-m-d',strtotime($this->getPost('date2'))));
	    $data['product_report'] = $this->VisitorModel->getProductUsedReport();

            // Load View
            $this->LoadView('reports/service_doctor',$data);
    }
    
    function income_report(){
	    // Check Session
	    $this->checkSession();            
            $this->permissionSection('mIncome');
            $this->checkPermission();

	    $data = array();
	    $data = $this->getTranslate($data);
	    
	    // Get All
            $this->VisitorModel->setDate1($this->getPost('date1'));
            $this->VisitorModel->setDate2($this->getPost('date2'));
            
	    $data['income_report'] = $this->VisitorModel->getIncomeData();;
            
            // Load View
            $this->LoadView('reports/income_list',$data);
    }
    
    function ipd_opd_report(){
	    // Check Session
	    $this->checkSession();

	    $data = array();
	    $data = $this->getTranslate($data);
	    
	    // Get Count All Product
	    $this->VisitorModel->setName($this->getPost('doctor'));
	    $ps = explode('_', $this->getPost('visit_status'));
            
            if($ps[0] != ''){
                $this->VisitorModel->setKey01($ps[0]);
            }
            
            if($ps[1] != ''){
                $this->VisitorModel->setKey02($ps[1]);
            }
            
            if($ps[2] != ''){
                $this->VisitorModel->setKey03($ps[2]);
            }
	    
	    $data['patient_report'] = $this->VisitorModel->getPatientVisitReport();
            //$data['patient_report'] =  $this->getPost('visit_status');
                    
            // Load View
            $this->LoadView('reports/patient_status',$data);
    }
    
    function comission_report(){
	    // Check Session
	    $this->checkSession();

	    $data = array();
	    $data = $this->getTranslate($data);
	    
	    // Get Count All Product
	    //$this->VisitorModel->setName($this->getPost('doctor'));
            
            $this->VisitorModel->setUserId($this->getSession('user_id'));
            $this->VisitorModel->setKey01($this->getSession('user_id'));
	    
            $this->VisitorModel->setDate1($this->getPost('date1'));
            $this->VisitorModel->setDate2($this->getPost('date2'));
            
	    $data['commission_report'] = $this->VisitorModel->getDoctorComission();
            //$data['patient_report'] =  $this->getPost('visit_status');
            
            //$this->restData($data['patient_report']);
            
            // Load View
            $this->LoadView('reports/comission_list',$data);
    }
    
    // #################### Translate ####################### //
    // Translate to View
    function getTranslate($data = null){

	// Define Default Language from Security to view
	@$data = $this->defTranslation($data);

	// Translate
	//$data['edit'] = $this->Lang('update');

	// Menu Active
	$data['ac_reports'] = 'active';

	return $data;
    }
}