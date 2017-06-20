<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Patient
class Patients extends Securities {

	// Define Index of Patient Fucntion
	public function index() {
	    // Check Session
	    $this->checkSession();
		$data = array();
			// Menu Active
		$data['ac_patients'] = 'active';

            // Get Item Per Page 
	    $data['item_per_page'] = $this->getSysConfig();

	    // Get Count All Product
	    $data['totals'] = $this->PatientModel->getCountPatient();
            
            // Define Gender Cambo 
	    $data['genderCambo'][0] = "Female";
	    $data['genderCambo'][1] = "Male";
            // Define Status Cambo
	    $data['statusCambo'][0] = "Sigle";
	    $data['statusCambo'][1] = "Married";
	// generate for code waitting
    	$data['generate_num_waitting'] = $this->WaittingModel->genNumber();
	// waitting Form
        $this->RoomModel->setStart(0);
        $this->RoomModel->setLimit(0);
        $query_room = $this->RoomModel->getAllRoom();
        $data['drop_room'] = $this->queryDropDownMenu($query_room,$label_id='0',$label_name='-- --',$id='room_id',$value='room_name',$value2='');

        $this->WardModel->setStart(0);
        $this->WardModel->setLimit(0);
        $query_ward = $this->WardModel->getAllWard();
        $data['drop_wards'] = $this->queryDropDownMenu($query_ward,$label_id='0',$label_name='-- --',$id='wards_id',$value='wards_desc',$value2='');

        $this->WardModel->setStart(0);
        $this->WardModel->setLimit(0);
        $query_user = $this->UserModel->getAllUser();
        $data['drop_user'] = $this->queryDropDownMenu($query_user,$label_id='0',$label_name='-- --',$id='uid',$value='username',$value2='');
            
            // Get Translate Word to View 
            $data = $this->getTranslate($data);
            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('patients/list');
            $this->LoadView('template/footer');
        }
        
        // Upload File
	public function photo() {

	    // Check Session
	    $this->checkSession();

            $data = array();

            if(is_dir($this->getBasePath().'/photos/'.$this->getUrlSegment3()) == FALSE){
                mkdir($this->getBasePath().'/photos/'.$this->getUrlSegment3(), 0777, true);
            }
            
            // Menu Active
            $data['ac_patients'] = 'active';
            $data['pid'] = $this->getUrlSegment3();
            $data['photoList'] = scandir($this->getBasePath().'/photos/'.$this->getUrlSegment3());
            $data['photoDir'] = $this->getResources().'/uploads/'.$this->getCompanyId().'/photos/'. $this->getUrlSegment3();
            
            // Get Translate Word to View 
            $data = $this->getTranslate($data);
           
            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('patients/upload');
            $this->LoadView('template/footer');
        }

        public function delphoto(){
            // Check Session
	    $this->checkSession();
            
            $imgs = explode('_', $this->getUrlSegment3());
            unlink($this->getBasePath().'/photos/'.$imgs[0].'/'.$imgs[1]);
            redirect('patients/photo/'.$imgs[0]);
        }
        // Upload File
	public function upload() {

	    // Check Session
	    $this->checkSession();
            $upload_path = $this->getBasePath().'photos/';
            
            move_uploaded_file($_FILES["userfile"]["tmp_name"], $upload_path.$this->getUrlSegment3().'/'.$this->getCurrentDatetimeString().'.png');
            
            redirect('patients/photo/'.$this->getUrlSegment3());
            
        }
	
	// Define Index of Unit Fucntion
	public function visited() {
	    
	    // Check Session
	    $this->checkSession();
             
            $data = array();
            // Menu Active
            $data['ac_viewall'] = 'active';
            
            // Define Gender Cambo 
	    $data['genderCambo'][0] = "Female";
	    $data['genderCambo'][1] = "Male";
            
            // Define Status Cambo 
	    $data['statusCambo'][0] = "Sigle";
	    $data['statusCambo'][1] = "Married";
	    
            // Get Translate Word to View 
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('patients/list_visited');
            $this->LoadView('template/footer');
        }
        
        function save_patient(){

		// Check Session
		$this->checkSession();

		$this->PatientModel->setId($this->getPost('patient_id'));
		$this->PatientModel->setPatientKhName($this->getPost('patient_kh_name'));
		$this->PatientModel->setPatientEnName($this->getPost('patient_en_name'));
		$this->PatientModel->setPatientDob(date('Y-m-d',strtotime($this->getPost('patient_dob'))));
		$this->PatientModel->setPhone($this->getPost('patient_phone'));
		$this->PatientModel->setEmergencyPhone($this->getPost('emegency_phone'));
		$this->PatientModel->setPatientOccupation($this->getPost('patient_occupation'));
		$this->PatientModel->setAddress($this->getPost('patient_address'));
		$this->PatientModel->setIdCard($this->getPost('id_card'));
		$this->PatientModel->setAssuranceCard($this->getPost('assurance_card'));
		$this->PatientModel->setAssuranceCompany($this->getPost('assurance_company'));
		$this->PatientModel->setMotorCard($this->getPost('motor_card'));
		$this->PatientModel->setCarCard($this->getPost('car_card'));
		$this->PatientModel->setBankCard1($this->getPost('bank_card1'));
		$this->PatientModel->setBankCard2($this->getPost('bank_card2'));
		$this->PatientModel->setStudentSchool($this->getPost('student_card'));
		$this->PatientModel->setPatientStatus($this->getPost('status_id'));
		$this->PatientModel->setOtherDisease($this->getPost('other_disease'));
		$this->PatientModel->setDesc($this->getPost('history'));
		$this->PatientModel->setDistrict($this->getPost('patient_district'));
		$this->PatientModel->setProvince($this->getPost('patient_province'));
		
		$this->PatientModel->setPulseRate($this->getPost('pulse'));
		$this->PatientModel->setHeartRate($this->getPost('heart'));
		$this->PatientModel->setBloodPressure($this->getPost('blood_pressure'));
		$this->PatientModel->setRespiratoryRate($this->getPost('respiratory'));
		$this->PatientModel->setTemperature($this->getPost('temperature'));
	 
		$this->PatientModel->setPatientStatus($this->getPost('status_id'));
		// waitting
	   	$this->WaittingModel->setId($this->getPost('waitting_id'));
     		$this->WaittingModel->setWaittingOpen($this->getPost('waitting_open'));
	    	$this->WaittingModel->setCode($this->getPost('waitting_code'));
     		$this->WaittingModel->setExamination($this->getPost('waitting_examination'));
	    	$this->WaittingModel->setRoomId($this->getPost('room_id'));
     		$this->WaittingModel->setDoctor($this->getPost('waitting_doctor'));

		// check ipd & opd to end
		if($this->getPost('redi') == 'ipd' || $this->getPost('redi') == 'opd'){
			$this->PatientModel->setReady(1);
		}

		if($this->getPost('pregnancy') == '1'){
			$this->PatientModel->setPregnancy('1');
		}
		
		if($this->getPost('pre_pregnancy') == '1'){
			$this->PatientModel->setPrePregnancy('1');
		}
		
		if($this->getPost('breast_feeding') == '1'){
			$this->PatientModel->setBreastFeeding('1');
		}

		if($this->getPost('gender_id') == '0'){
			$this->PatientModel->setPatientGender('f');
		}else{
			$this->PatientModel->setPatientGender('m');
		}
		
		if($this->getPost('is_heart') == '1'){
			$this->PatientModel->setIsHeart('1');
		}
		
		if($this->getPost('is_diabetes') == '1'){
			$this->PatientModel->setIsDiabetes('1');
		}

		if($this->getPost('is_respiratory') == '1'){
			$this->PatientModel->setIsRespiratory('1');
		}

		if($this->getPost('is_digestive') == '1'){
			$this->PatientModel->setIsDisgestive('1');
		}
		if($this->getPost('is_kidney') == '1'){
			$this->PatientModel->setIsKidney('1');
		}

		if($this->getPost('is_endocrine') == '1'){
			$this->PatientModel->setIsEndocrine('1');
		}
		
		if($this->getPost('is_neuro_sys') == '1'){
			$this->PatientModel->setIsNeuroSys('1');
		}
		
		if($this->getPost('is_lung') == '1'){
			$this->PatientModel->setIsLung('1');
		}
		if($this->getPost('is_aap') == '1'){
			$this->PatientModel->setIsAllergy('1');
		}
		
		if($this->getPost('insurance') == '1'){
			$this->PatientModel->setInsurance($this->getPost('insurance'));
		}
		
		if($this->getPost('id_poor') == '1'){
		        $this->PatientModel->setIdPoor($this->getPost('id_poor'));
		}

		if($this->getPost('patient_id') == NULL || $this->getPost('patient_id') == ""){

			$this->PatientModel->setPatientCode($this->PatientModel->genPatientNo());
			$this->PatientModel->add();

			// Update all Ref No
			$this->PatientModel->updateRef();


			$this->VisitorModel->setPatientId($this->PatientModel->getPatientIdByCode());

			if($this->getPost('redi') == 'ipd'){
				
			    $this->logs('3',$this->PatientModel->getPatientIdByCode());
			    $this->VisitorModel->setVisitorStay();
			    $this->VisitorModel->add();
			    redirect('ipds');
			}elseif($this->getPost('redi') == 'opd'){

			    $this->logs('3',$this->PatientModel->getPatientIdByCode());
                	    $this->VisitorModel->setVisitorEnrol();
			    $this->VisitorModel->add();
			    redirect('diagnostics');
			}
                        
            		//mkdir($this->getBasePath().'photos/', 0777, true);
		}else{
			$this->PatientModel->update();
		}

		if($this->getPost('waitting_id') == NULL || $this->getPost('waitting_id') == ""){
			if(!empty($this->PatientModel->getPatientIdByCode())){
				$wPatientId = $this->PatientModel->getPatientIdByCode();
			}else{
				$wPatientId = $this->getPost('patient_id');
			}
			$this->WaittingModel->setPatientId($wPatientId);
			$this->WaittingModel->setDate(date("Y-m-d"));
		    	$this->WaittingModel->add();
    	}else{
    		$this->WaittingModel->setPatientId($this->getPost('patient_id'));
	    	$this->WaittingModel->update();
    	}


			// Check If While Insert Duplicate Code
			/*if ($count_code > 0) {
				redirect ( 'patients/edit/' . $id );
			}*/
			
            // Write Log
            //$this->logs('3', 'Try to access application with user: '.$this->getPost('unit_name').' / '.$this->getPost('unit_desc'));   
	}

	// Set Visitor Opd
	function patient_opd(){
	    
	    // Check Session
	    $this->checkSession();
	    // update patient opd checked
	    $this->PatientModel->setId($this->getUrlSegment3());
		$this->PatientModel->updatePatientReady();
	    
	    $this->VisitorModel->setPatientId($this->getUrlSegment3());
	    $this->VisitorModel->setVisitorEnrol();
	    $this->VisitorModel->getVisitorStayDate($this->getCurrentDatetime());
	    $this->VisitorModel->add();
	}
        
        // Set Visitor Opd
	function patient_pharm(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->VisitorModel->setPatientId($this->getUrlSegment3());
	    $this->VisitorModel->setVisitorPharmacy();
	    $this->VisitorModel->getVisitorStayDate($this->getCurrentDatetime());
	    $this->VisitorModel->add();
	}

	// Set Visitor Ipd
	function patient_ipd(){
	    
	    // Check Session
	    $this->checkSession();
	    // update patient ipd checked
	    $this->PatientModel->setId($this->getUrlSegment3());
	    $this->PatientModel->updatePatientReady();
	    
	    $this->VisitorModel->setPatientId($this->getUrlSegment3());
	    $this->VisitorModel->setVisitorStayDate($this->getCurrentDatetime());
	    $this->VisitorModel->setVisitorStay();
	    $this->VisitorModel->add();
	}
        
        function get_patient_list(){  
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->PatientModel->setSearch($this->getPost('search_data'));
	    /*$this->PatientModel->setStart($this->getPost('page_start'));
	    $this->PatientModel->setLimit($this->getPost('page_limit'));*/
            $datas = $this->PatientModel->getAllPatient();
	    
            $this->restData($datas);
	}
	
	function get_patient_visited_list(){  
	    
	    // Check Session
	    $this->checkSession();
            
	    $this->VisitorModel->setSearch($this->getPost('search_data'));
            $this->VisitorModel->setVisitorStatusSearch($this->getPost('ipd').','.$this->getPost('opd').','.$this->getPost('pharm'));
            $datas = $this->VisitorModel->getAllVisited();
	    
            $this->restData($datas);
	}
		
	// Delete Patients 
        function delete_patient(){
	    
	    // Check Session
	    $this->checkSession();
            
            $this->PatientModel->setId($this->getUrlSegment3());
            $this->PatientModel->delete();
            
            // Write Log in to log file
            $this->logs('3', 'Delete '.$this->getUrlSegment1().' Patient From List');
            $this->logs('4', 'Delete '.$this->getUrlSegment1().' Patient From List');
        }
	
	// #################### JSON DATA ####################### //
	
	function get_count_patient(){
	    // Check Session
	    $this->checkSession();
	    
	    $datas = $this->PatientModel->getCountAllPatient();
	    $this->restData($datas);
	}

	function get_count_patient_view(){
	    // Check Session
	    $this->checkSession();
	    $datas = $this->PatientModel->getCountAllPatientView();
	    $this->restData($datas);
	}
		
	function get_patient_info_by_id_json(){ 
	    
	    // Check Session
	    $this->checkSession();
	    
            $this->PatientModel->setId($this->getUrlSegment3());
            $datas = $this->PatientModel->getEditPatientById();
            $this->restData($datas);
	}
	
	function get_patient_watting_byid(){
	    // Check Session
	    $this->checkSession();
	    $this->PatientModel->setId($this->getUrlSegment3());
        $datas = $this->PatientModel->getWaittingPatientById();
        $this->restData($datas);
	}
	
	function get_patient_id_by_code(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->PatientModel->setPatientCode(urldecode($this->getUrlSegment3()));
	    $datas = $this->PatientModel->getPatientIdByCode();
            $this->restData($datas);
	}
	
	function occupation_auto_complete(){
	    // Check Session
	    $this->checkSession();
	    
	    $this->PatientModel->setSearch(urldecode($this->getUrlSegment3()));
	    $datas = $this->PatientModel->getSearchByName();
            $this->restData($datas);
	}
		
	function patient_auto_complete(){
	    // Check Session
	    $this->checkSession();
	    
	    $this->PatientModel->setName(urldecode($this->getUrlSegment3()));
	    $datas = $this->PatientModel->getPatientInfoByName();
            $this->restData($datas);
	}
	
	function district_auto_complete(){
	    // Check Session
	    $this->checkSession();
	    
	    $arr = explode("_", urldecode($this->getUrlSegment3()));
	    
	    $this->PatientModel->setSearch($arr[0]);
	    $this->PatientModel->setId($arr[1]);
	    $datas = $this->PatientModel->getSearchDistrict();
            $this->restData($datas);
	    
	    $this->logs('3', 'Province ID '.$arr[1]);
	}
	
	function province_auto_complete(){
	    // Check Session
	    $this->checkSession();
	    
	    $this->PatientModel->setSearch(urldecode($this->getUrlSegment3()));
	    $datas = $this->PatientModel->getSearchProvince();
            $this->restData($datas);
	}
	
	function get_district_json(){
	    // Check Session
	    $this->checkSession();
	    
	    $this->PatientModel->setSearch(urldecode($this->getUrlSegment3()));
	    $datas = $this->PatientModel->getDistrictInfo();
            $this->restData($datas);
	}
	
	function get_province_json(){
	    // Check Session
	    $this->checkSession();
	    
	    $this->PatientModel->setSearch(urldecode($this->getUrlSegment3()));
	    $datas = $this->PatientModel->getProvinceInfo();
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
	    $data['lung'] = $this->Lang('lung');
	    $data['allergyAndPenicillin'] = $this->Lang('allergy_and_penicillin');
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
	    $data['age'] = $this->Lang('age');
	    $data['province'] = $this->Lang('province');
	    $data['district'] = $this->Lang('district');
	    $data['vitalSign'] = $this->Lang('vital_sign');
	    $data['pulseRate'] = $this->Lang('pulse_rate');
	    $data['bloodPressure'] = $this->Lang('blood_pressure');
	    $data['heartRate'] = $this->Lang('heart_rate');
	    $data['respiratoryRate'] = $this->Lang('respiratory_rate');
	    $data['temperature'] = $this->Lang('temperature');
	    // waitting
	    $data['watiitingForm'] = $this->Lang('waitting_form');
	    $data['h_waitting_number'] = $this->Lang('waitting_number');
	    $data['purpose'] = $this->Lang('purpose');
	    $data['doctor'] = $this->Lang('doctor');
	    $data['room'] = $this->Lang('room');
	    $data['neonatal'] = $this->Lang('neonatal');

            return $data;
        }
        
        
}
?>
