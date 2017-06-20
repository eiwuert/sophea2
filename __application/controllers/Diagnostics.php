<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Opd
class Diagnostics extends Securities {
	
	// Define Index of Ipd Fucntion
	public function index() {
	    // Check Session
	    $this->checkSession();
		$this->permissionSection('mDiagnostic');
		$this->checkPermission();
            
	    $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();
            
            // Get Item Per Page 
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();
            
            // Get Translate Word to View 
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
        }
        
	public function add() {
	    // Check Session
	    $this->checkSession();
		$this->permissionSection('mDiagnostic');
		$this->checkPermission();
            
            $data = array();

            //Get visitor Info
            $this->VisitorModel->setId($this->getUrlSegment3());
		    $data['visitor_info'] = $this->VisitorModel->getVisitorInfo();
		    $data['dia_info'] = $this->VisitorModel->getDiaByVisitorId();

		    $this->WardModel->setStart(0);
	        $this->WardModel->setLimit(0);
	        $query_ward = $this->WardModel->getAllWard();
	        $data['drop_wards'] = $this->queryDropDownMenu($query_ward,$label_id='0',$label_name='-- --',$id='wards_id',$value='wards_desc',$value2='');

                   
            // Get Translate Word to View 
            $data = $this->getTranslate($data);            
            // Load View
            $this->LoadView('diagnostics/prescription',$data);
        }
	
	public function view_pres() {
	    
	    // Check Session
	    $this->checkSession();
		$this->permissionSection('mPrescription');
		$this->checkPermission();
             
            $data = array();
            
            //Get visitor Info
            $this->VisitorModel->setId($this->getUrlSegment3());
	    $data['visitor_info'] = $this->VisitorModel->getVisitorInfo();
	    $data['dia_info'] = $this->VisitorModel->getDiaByVisitorId();
                   
            // Get Translate Word to View 
            $data = $this->getTranslate($data);            

            // Load View
            $this->LoadView('diagnostics/view_prescription',$data);
        }
    
        function add_note(){
            // Check Session
	    $this->checkSession();
            $this->permissionSection('mAddClinicalNote');
            $this->checkPermission();
            
            $this->DiagnosticModel->setId($this->getUrlSegment3());
	    $this->DiagnosticModel->setDesc($this->getPost('clinical'));	    
	    $this->DiagnosticModel->save_note();
	}
        
	function add_medicine(){
            
            // Check Session
	    $this->checkSession();
            $this->permissionSection('mAddMedicine');
            $this->checkPermission();
            
	    $pInfo = explode('-', $this->getPost('medicines'));
	    $this->ProductModel->setProductCode($pInfo[0]);	    
	    $this->DiagnosticModel->setId($this->getPost('service_item_id'));
	    $this->DiagnosticModel->setVisitorId($this->getUrlSegment3());
	    $this->DiagnosticModel->setProductQty($this->getPost('qty'));
	    $this->DiagnosticModel->setProductPrice($this->getPost('price'));
	    $this->DiagnosticModel->setProductId($this->ProductModel->getPruductIdByName());
	    $this->DiagnosticModel->setDiscount($this->checkIfNull($this->getPost('discount')));
	    $this->DiagnosticModel->setUserId($this->getSession('user_id'));
            
	    // Medicine
	    $this->DiagnosticModel->setUseTime($this->checkIfNull($this->getPost('usetime')));
	    $this->DiagnosticModel->setUseDetail($this->checkIfNull($this->getPost('usedetail')));
	    $this->DiagnosticModel->setAm($this->getPost('amm'));
	    $this->DiagnosticModel->setAf($this->getPost('afm'));
	    $this->DiagnosticModel->setPm($this->getPost('pmm'));
	    $this->DiagnosticModel->setNt($this->getPost('ntm'));
	    
	    // Service
	    $this->DiagnosticModel->setFitzpatrik($this->checkIfNull($this->getPost('fitzpatrik')));
	    $this->DiagnosticModel->setFluence($this->checkIfNull($this->getPost('fluence')));
	    $this->DiagnosticModel->setPulseLength($this->checkIfNull($this->getPost('pulse_length')));
	    $this->DiagnosticModel->setFrequency($this->checkIfNull($this->getPost('frequency')));
	    $this->DiagnosticModel->setMode($this->checkIfNull($this->getPost('mode')));
	    $this->DiagnosticModel->setNoOfTreal($this->checkIfNull($this->getPost('no_of_treal')));
	    $this->DiagnosticModel->setLens($this->checkIfNull($this->getPost('lens')));
	    $this->DiagnosticModel->setSpotSize($this->checkIfNull($this->getPost('spot_size')));
	    $this->DiagnosticModel->setCutOffFilter($this->checkIfNull($this->getPost('cut_off_filter')));
	    $this->DiagnosticModel->setPulseTrain($this->checkIfNull($this->getPost('pulse_train')));
	    $this->DiagnosticModel->setPauseLength($this->checkIfNull($this->getPost('pause_length')));
	    $this->DiagnosticModel->setPulseWithUs($this->checkIfNull($this->getPost('pulse_with_us')));
	    $this->DiagnosticModel->setEnergyMj($this->checkIfNull($this->getPost('energy_mj')));
	    
            //	ordernant_no
            $this->DiagnosticModel->setAmount($this->getPost('order_no'));
            
	    // Set Form
	    $this->DiagnosticModel->setName($this->getPost('frm'));	    
            
	    if($this->getPost('doctor') == "" && ($this->getSession('assign_to') == '' || $this->getSession('assign_to') == NULL)){
                    $this->DiagnosticModel->setUserId($this->getSession('user_id'));
                    $this->DiagnosticModel->setAssignUid($this->getSession('user_id'));
                    $this->setSession('assign_to', $this->getSession('user_id'));
	    }else{
                    if($this->getPost('doctor') <> ''){
                        $doc = explode('-', $this->getPost('doctor'));
                        $this->UserModel->setName($doc[0]);
                        $this->UserModel->setPhone($doc[1]);
                        $this->setSession('assign_to', $this->UserModel->getUserIdByNameAndPhone());
                        $this->DiagnosticModel->setAssignUid($this->UserModel->getUserIdByNameAndPhone());
                    }else{
                        $this->DiagnosticModel->setAssignUid($this->getSession('assign_to'));
                    }
                    //$this->DiagnosticModel->setUserId($this->UserModel->getUserIdByNameAndPhone());
	    }
            
            if($this->DiagnosticModel->getAm() > '0' || $this->DiagnosticModel->getAf() > '0' || $this->DiagnosticModel->getPm() > '0' || $this->DiagnosticModel->getNt() > '0'){
                // Add Accept Madicine next time
                $this->DiagnosticModel->setAssignPer($this->getMedicalPer());
                $this->DiagnosticModel->setAcceptUid($this->getSession('assign_to'));
                $this->DiagnosticModel->setDate1($this->getCurrentDatetime());
            }else{
                $this->DiagnosticModel->setAssignPer($this->getServiceAssignPer());
                $this->DiagnosticModel->setAcceptUid('0');
            }
            
	    
	    if($this->getPost('service_item_id') <> "" || $this->getPost('service_item_id') <> NULL){
                    $this->DiagnosticModel->setUserId($this->getSession('user_id'));
                    $this->DiagnosticModel->updateProduct();
            }else{
                    $this->DiagnosticModel->saveProduct();
            }
	}
        
        function update_medicine(){
            // Check Session
	    $this->checkSession();
            $this->permissionSection('mAddMedicine');
            $this->checkPermission();
            
            $this->DiagnosticModel->setId($this->getPost('service_item_id'));
	    $this->DiagnosticModel->setProductQty($this->getPost('qty'));
	    $this->DiagnosticModel->setProductPrice($this->getPost('price'));
	    $this->DiagnosticModel->setDiscount($this->getPost('discount'));
            
            $this->DiagnosticModel->updateMedicine();
        }
	
        function accept_service(){
                $this->checkSession();
                
                $this->DiagnosticModel->setId($this->getUrlSegment3());
                $this->DiagnosticModel->setAcceptPer($this->getServiceAcceptPer());
                $this->DiagnosticModel->setAcceptUid($this->getSession('user_id'));
                $this->DiagnosticModel->setDate1($this->getCurrentDatetime());
                $this->DiagnosticModel->acceptService();
        }
        
        function cancel_medicine(){
            
                $this->checkSession();
                
                $this->DiagnosticModel->setId($this->getUrlSegment3());
                $this->DiagnosticModel->setAcceptUid('0');
                $this->DiagnosticModel->acceptService();
        }
        
        function add_dia(){
	    
	    // Check Session
	    $this->checkSession();

	    $this->DiagnosticModel->setVisitorId($this->getUrlSegment3());
	    $this->DiagnosticModel->setUserId($this->getSession('user_id'));

	    $this->logs('3', 'VID#'.$this->getUrlSegment3().' Dia0: '.$this->getPost('dia').' Dia1:'.$this->getPost('dia1').' Dia2:'.$this->getPost('dia2'));
	    $this->logs('3', 'VID#'.$this->getUrlSegment3().'Dia0: '.$this->getPost('dia_de').' Dia1:'.$this->getPost('dia1_de').' Dia2:'.$this->getPost('dia2_de'));
	    
	    // Diagnostic 0
	    if($this->getPost('dia_id') == '0'){
			if($this->getPost('dia') != ''){
				$this->Icd10Model->setDesc(explode('_',$this->getPost('dia'))[1]);
				$dia = $this->Icd10Model->getIcd10IdByName();
				$this->DiagnosticModel->setIcd10Id($dia);
				$this->DiagnosticModel->setDesc($this->getPost('dia_de'));
				$this->DiagnosticModel->setLevel($this->getPost('dia_level'));
				$this->DiagnosticModel->add();
			}
		
	    }else{
			$this->DiagnosticModel->setDiagnosticId($this->getPost('dia_id'));

			$this->Icd10Model->setDesc(explode('_',$this->getPost('dia'))[1]);
			$dia = $this->Icd10Model->getIcd10IdByName();
			$this->DiagnosticModel->setIcd10Id($dia);
			$this->DiagnosticModel->setDesc($this->getPost('dia_de'));
			$this->DiagnosticModel->setLevel($this->getPost('dia_level'));
			$this->DiagnosticModel->update();
	    }

	    // Diagnostic 1
	    if($this->getPost('dia1_id') == '0'){
			if($this->getPost('dia1') != ''){
				$this->Icd10Model->setDesc(explode('_',$this->getPost('dia1'))[1]);
				$dia1 = $this->Icd10Model->getIcd10IdByName();
				$this->DiagnosticModel->setIcd10Id($dia1);
				$this->DiagnosticModel->setDesc($this->getPost('dia1_de'));
				$this->DiagnosticModel->setLevel($this->getPost('dia1_level'));
				$this->DiagnosticModel->add();
			}	
	    }else{
			$this->DiagnosticModel->setDiagnosticId($this->getPost('dia1_id'));

			$this->Icd10Model->setDesc(explode('_',$this->getPost('dia1'))[1]);
			$dia1 = $this->Icd10Model->getIcd10IdByName();
			$this->DiagnosticModel->setIcd10Id($dia1);
			$this->DiagnosticModel->setDesc($this->getPost('dia1_de'));
			$this->DiagnosticModel->setLevel($this->getPost('dia1_level'));
			$this->DiagnosticModel->update();
	    }

	    // Diagnostic 2
	    if($this->getPost('dia2_id') == '0'){
			if($this->getPost('dia2') != ''){
				$this->Icd10Model->setDesc(explode('_',$this->getPost('dia2'))[1]);
				$dia2 = $this->Icd10Model->getIcd10IdByName();
				$this->DiagnosticModel->setIcd10Id($dia2);
				$this->DiagnosticModel->setDesc($this->getPost('dia2_de'));
				$this->DiagnosticModel->setLevel($this->getPost('dia2_level'));
				$this->DiagnosticModel->add();
			}
	    }else{
			$this->DiagnosticModel->setDiagnosticId($this->getPost('dia2_id'));

			$this->Icd10Model->setDesc(explode('_',$this->getPost('dia2'))[1]);
			$dia2 = $this->Icd10Model->getIcd10IdByName();
			$this->DiagnosticModel->setIcd10Id($dia2);
			$this->DiagnosticModel->setDesc($this->getPost('dia2_de'));
			$this->DiagnosticModel->setLevel($this->getPost('dia2_level'));
			$this->DiagnosticModel->update();
	    }

	}
	
	// Delete Service Item
	function delete_service(){
            // Check Session
	    $this->checkSession();
            
	    $this->DiagnosticModel->setDiagnosticId($this->getUrlSegment3());
	    $this->DiagnosticModel->deleteService();
	}
	
	// Delete Service Item
	function delete_service_pay(){
            // Check Session
	    $this->checkSession();
            
	    $this->DiagnosticModel->setDiagnosticId($this->getUrlSegment3());
	    $this->DiagnosticModel->deleteServicePay();
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
        
        // Set Appoinment
        function setAppoinmentDate(){
            $this->AppoinmentModel->setVisitorId($this->getUrlSegment3());
            $this->AppoinmentModel->setUserId($this->getSession('user_id'));
            $this->AppoinmentModel->setDate1($this->getPost("dateTime"));
            $this->AppoinmentModel->setDoctorId($this->getPost("doctorId"));
            $this->AppoinmentModel->setWardId($this->getPost("wardId"));
            if($this->AppoinmentModel->getCountAppoiomentByVisitorId() > 0){
                $this->AppoinmentModel->updateAppoinmentTime(); 
            }else{
                $this->AppoinmentModel->setAppoinment();
            }
            
        }
        
        // Update Appoinment
        /*function updateAppoinment(){
            $this->AppoinmentModel->setVisitorId($this->getUrlSegment3());
            $this->AppoinmentModel->setDate1($this->getPost("dateTime"));
            
            $this->AppoinmentModel->updateAppoinmentTime();
        }*/
	
        // =================== REST DATA ========================= //
	// Get Visitor Info
	function visitor_info(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->VisitorModel->setId($this->getUrlSegment3());
	    $datas = $this->VisitorModel->getDiaByVisitorId();
	    $this->restData($datas);
	}
	
	function get_diagnostic_list(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->DiagnosticModel->setVisitorId($this->getUrlSegment3());
	    $datas = $this->DiagnosticModel->getDiagnosticListByVisitorId();
	    
	    $this->restData($datas);
	}
	
	function get_medicine_list(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->VisitorModel->setVisitorId($this->getUrlSegment3());
	    $this->VisitorModel->setTypeId('2');
	    $datas = $this->VisitorModel->getMedicinListByVisitorId();
	    
	    $this->restData($datas);
	}
	
	function get_medicine_info_by_id(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->VisitorModel->setVisitorId($this->getUrlSegment3());
	    $this->VisitorModel->setTypeId('2');
	    $datas = $this->VisitorModel->getMedicinInfoByServiceId();
	    
	    $this->restData($datas);
	}
        
        function get_service_info_by_id(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->VisitorModel->setVisitorId($this->getUrlSegment3());
	    $this->VisitorModel->setTypeId('4');
	    $datas = $this->VisitorModel->getMedicinInfoByServiceId();
	    
	    $this->restData($datas);
	}
	
	function get_note_list(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->DiagnosticModel->setVisitorId($this->getUrlSegment3());
	    $datas = $this->DiagnosticModel->getNoteByVisitorId();
	    
	    $this->restData($datas);
	}
	
	function get_service_list(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->VisitorModel->setVisitorId($this->getUrlSegment3());
	    $this->VisitorModel->setTypeId('4');
	    $datas = $this->VisitorModel->getMedicinListByVisitorId();
	    
	    $this->restData($datas);
	}
	
        function get_opd_list(){ 
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    /*$this->VisitorModel->setStart($this->getPost('page_start'));
	    $this->VisitorModel->setLimit($this->getPost('page_limit'));*/
            $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
            $datas = $this->VisitorModel->getAllVisitorOpd();
            $this->restData($datas);
	}

	function get_ipd_info_by_id_json(){ 
	    
	    // Check Session
	    $this->checkSession();
	    
            $this->PatientModel->setId($this->getUrlSegment3());
            $datas = $this->PatientModel->getPatientById();
            $this->restData($datas);
	}
	
	// Auto Form
	function form_auto_complete(){
	    // Check Session
	    $this->checkSession();
	    
	    $this->DiagnosticModel->setName(urldecode($this->getUrlSegment3()));
	    $datas = $this->DiagnosticModel->getFormByName();
            $this->restData($datas);
	}
	
	// Auto Doctor
	function doctor_auto_complete(){
	    // Check Session
	    $this->checkSession();
	    
	    $this->UserModel->setName(urldecode($this->getUrlSegment3()));
	    $datas = $this->UserModel->getUserInfoByName();
            $this->restData($datas);
	}
        
        // Get Appoinment
        function getAppoinmentByVisitorId(){
            // Check Session
	    $this->checkSession();
            
            $this->AppoinmentModel->setVisitorId($this->getUrlSegment3());
            $datas = $this->AppoinmentModel->getAppoinmentByVisitorId();
            
            $this->restData($datas);
        }
        
        // Get Appoinment
        function getAppoinmentAll(){
            // Check Session
	    	$this->checkSession();            
            $datas = $this->AppoinmentModel->getAllAppoinment();            
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
	    $data['discount'] = $this->Lang('pro_discount');
	    $data['am'] = $this->Lang('pro_am');
	    $data['af'] = $this->Lang('pro_af');
	    $data['pm'] = $this->Lang('pro_pm');
	    $data['nt'] = $this->Lang('pro_nt');
	    $data['doctor'] = $this->Lang('doctor');
            $data['qty'] = $this->Lang('pro_qty');
            $data['code'] = $this->Lang('code');
            $data['cost'] = $this->Lang('pro_cost');
            $data['desc'] = $this->Lang('desc');
            $data['enrolDate'] = $this->Lang('enrol_date');
	    $data['leaveDate'] = $this->Lang('v_leave_date');
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
            $data['medicine'] = $this->Lang('medicine');
            $data['service'] = $this->Lang('service');
            $data['age'] = $this->Lang('age');
	    $data['no'] = $this->Lang('c_no');
	    
	    // Result Out
	    $data['cure'] = $this->Lang('cure');
	    $data['notCure'] = $this->Lang('not_cure');
	    $data['referOut'] = $this->Lang('refer_out');
	    $data['death'] = $this->Lang('death');
	    
	    $data['no'] = $this->Lang('c_no');
            
            
            // Menu Active
            $data['ac_diagnostics'] = 'active';
            
            return $data;
        }
        
        
}
?>
