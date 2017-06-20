<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include DAO Class
include_once 'Datastructure.php';

// Define Patient Class
class Patient extends Datastructure{
	
	// Get All Patient
	function getAllPatient() {
            $select = '';
            $from = $this->getTblPatient();
            $where = ' patient_deleted = 0 AND patient_ready = 0';
            if($this->getSearch() <> '' || $this->getSearch() != ''){
                $where .= " AND (patient_kh_name LIKE '%".$this->getSearch()."%' OR patient_en_name LIKE '%".$this->getSearch()."%' OR patient_code LIKE '%".$this->getSearch()."%'  OR patient_serial LIKE '%".$this->getSearch()."%' OR patient_phone LIKE '%".$this->getSearch()."%')";
            }
            $where .= " ORDER BY register_date DESC";
            
            // Check If Limit
            /*if($this->getLimit() != '0' || $this->getStart() != '0'){
		if($this->getStart() == '1' || $this->getStart() == ''){
                    $this->setStart('0');
		}
		$where .= " LIMIT ".$this->getStart().", ".$this->getLimit();
            }*/
	    
            return $this->executeQuery($select, $from, $where);
	}
	
	function getSearchByName(){
	    $select = " DISTINCT patient_occupation AS value";
            $from = $this->getTblPatient();
            $where = " patient_deleted = 0";
            if($this->getSearch() <> '' || $this->getSearch() != ''){
                $where .= " AND patient_occupation LIKE '%".$this->getSearch()."%'";
            }
            
            return $this->executeQuery($select, $from, $where);
	}
	
	function getSearchDistrict(){
	    $select = " districts_name AS value";
            $from = $this->getTblDisctrict();
            $where = " districts_deleted = 0";
            if($this->getSearch() <> "" || $this->getSearch() != ""){
                $where .= " AND districts_name LIKE '%".$this->getSearch()."%'";
            }
	    
	    if($this->getId() <> "0" || $this->getId() != "0"){
		$where .= " AND provinces_id = ".$this->getId()."";
	    }
            
            return $this->executeQuery($select, $from, $where);
	}
	
	function getSearchProvince(){
	    $select = " provinces_name AS value";
            $from = $this->getTblProvince();
            $where = " provinces_deleted = 0";
            if($this->getSearch() <> '' || $this->getSearch() != ''){
                $where .= " AND provinces_name LIKE '%".$this->getSearch()."%'";
            }
            
            return $this->executeQuery($select, $from, $where);
	}
	
	// Function Get Count Patient
	function getCountAllPatient(){
	    return $this->getCountWhere($this->getTblPatient(), " patient_deleted = 0 AND patient_ready = 0");
	}
	// Function Get Count Patient viewed
	function getCountAllPatientView(){
	    return $this->getCountWhere($this->getTblPatient(), " patient_deleted = 0");
	}
        
        // Function Get Count Patient
	function getCountPatients(){
	    return $this->getCountWhere($this->getTblPatient(), " patient_deleted = 0");
	}
	
	// Get All Product REST Data By Name
	function getPatientInfoByName() {
            $select = " CONCAT( `patient_code` , '=', `patient_kh_name`, '=', `patient_en_name`,'=',`patient_phone`) AS value";
            $from = $this->getTblPatient();
            $where = " patient_deleted = 0";
            if($this->getName() <> '' || $this->getName() != ''){
                $where .= " AND (patient_code LIKE '%".$this->getName()."%' OR patient_kh_name LIKE '%".$this->getName()."%' OR patient_en_name LIKE '%".$this->getName()."%' OR patient_phone LIKE '%".$this->getName()."%')";
            }
            
            return $this->executeQuery($select, $from, $where);
	}
	
	// Get Patient Id
	function getPatientIdByCode(){
	    $this->customQueryLog("PatientId :".$this->getPatientCode());
            $select = '';
            $from = $this->getTblPatient();
            $where = " patient_code ='".$this->getPatientCode()."'";
            
	    $info = $this->executeQuery($select, $from, $where);
	    foreach ($info as $row){
		    //$this->customQueryLog("Data Return :".$row->patient_id);
		    return $row->patient_id;
	    }
	}
	
	// Get Province
	function getProvinceInfo(){
            $select = '';
            $from = $this->getTblProvince();
            $where = " provinces_name ='".$this->getSearch()."'";
            
	    return $this->executeQuery($select, $from, $where);
	}
	
	// Get Province
	function getDistrictInfo(){
            $select = '';
            $from = $this->getTblDisctrict();
            $where = " districts_name ='".$this->getSearch()."'";
            
	    return $this->executeQuery($select, $from, $where);
	}
	
	function getRef(){
		$select ='';
		$from = $this->getTblHospital();
		$where = ' hospital_id = '.$this->getSession('hospitalId');
		$this->setHospitalId($this->getSession('hospitalId'));
		
		$info = $this->executeQuery($select, $from, $where);
		
		foreach($info as $rows){
			$arr['visit_no'] = $rows->visitor_no;
			$arr['visit_no'] = $rows->visitor_no;
			$arr['product_no'] = $rows->product_no;
			$arr['dia_no'] = $rows->diagnostic_no;
			$arr['patient_no'] = $rows->patient_no;
			$arr['auto_date'] = $rows->auto_no_date;
			$arr['auto_no'] = $rows->auto_no;
			$arr['amount_user'] = $rows->amount_user;
			$arr['item_per_page'] = $rows->item_per_page;
		}
		return $arr;
	}

	

	// Update Reference No
	function updateRef(){
		
		$this->setArrayDataNothing();
		$this->setArrayData('auto_no',$this->getAutoNo());
		$this->setArrayData('auto_no_date',$this->getCurrentDate());
		$this->setArrayData('patient_no',$this->getPatientNo());
		$this->updateDataWhere($this->getTblHospital(),$this->getArrayData(),' hospital_id = '.$this->getHospitalId());
	}

	function genRef($pre_char,$auto_no,$current_ref){
	    
		// In Detail  H0000001P0000001 H0000001P0000002 H0000001P0000003
		
		if($pre_char == 'P'){
			$no = str_pad($current_ref+1, 8, "0", STR_PAD_LEFT);
			//$ref_no = $pre_char.$no.'-'.($auto_no+1);
			$ref_no = $pre_char.$no;
		}elseif($pre_char == 'V'){
			$no = str_pad($current_ref+1, 3, "0", STR_PAD_LEFT);
			$ref_no = $pre_char.date('Ymd').$no;
		}elseif($pre_char == 'PRO'){
			$no = str_pad($current_ref+1, 3, "0", STR_PAD_LEFT);
			$ref_no = date('md')."P".$no;
		}elseif($pre_char == 'D'){
			$no = str_pad($current_ref+1, 11, "0", STR_PAD_LEFT);
			$ref_no = $pre_char.$no;
		}else{
			return 'nothing';
		}
		
		$this->setPatientNo($current_ref+1);
		$this->setAutoNo($auto_no+1);
		return @$ref_no;
	}
	
	
	// Get Current Current Visitor No
	function getCurrentPatientNo(){
		$ref = $this->getRef();
		return $ref['patient_no'];
	}

	// Get Current Auto No
	function getCurrentAutoNo(){
		$ref = $this->getRef();
		return $ref['auto_no'];
	}

	// Get Current Auto Date
	function getCurrentAutoDate(){
		$ref = $this->getRef();
		return $ref['auto_date'];
	}
	
	// Get Current Date and DateTime
	function getCurrentDate(){
		$datestring = '%Y-%m-%d';
		$time = time();
		$now =  mdate($datestring, $time);
		return $now;
	}
	
	// New Patient Code
	function genPatientNo(){
            
		/*if($this->getCurrentAutoDate() == $this->getCurrentDate()){
			$this->setSession('auto_no',$this->getCurrentAutoNo());
			//return $this->genRef('P',$this->getCurrentAutoNo(),$this->getCurrentPatientNo());
                        //return $this->genRef('P',$this->getCurrentPatientNo());
                        
		}else{
			$this->setSession('auto_no','0');
			return $this->genRef('P','0',$this->getCurrentPatientNo());
		}*/
            
            return $this->genRef('P','0',$this->getCountPatients());
            
	}
	
	// Get Count All Patient
	function getCountPatient() {
		return $this->getCountWhere($this->getTblPatient(), ' patient_deleted = 0');
	}
	
	// Add or Insert Patient
	function add(){
		$this->setArrayData('patient_code',$this->getPatientCode());
		$this->insertData($this->getTblPatient(),$this->getArrayDatas());
	}
	
	// Update Patient
	function update(){
		//$this->updateData($this->getTblPatient(),$this->getArrayDatas(), 'patient_id', $this->getId());
		$this->updateDataWhere($this->getTblPatient(),$this->getArrayDatas(), ' patient_id = ' . $this->getId());
	}
	function updatePatientReady(){
        $this->setArrayData('patient_ready', '1');
		$this->updateDataWhere($this->getTblPatient(),$this->getArrayData(), ' patient_id = ' . $this->getId());
	}
	
        // Delete Patient go to trash
	function delete(){
                $this->setArrayData('patient_deleted', '1');
		$this->updateData($this->getTblPatient(), $this->getArrayData(), 'patient_id', $this->getId());
	}
	
        // Get Patient Info by ID
	function getPatientById(){
	    
	    $select = '';
            $from = $this->getTblVisitor() ." AS vs";
	    $from .= " JOIN ". $this->getTblPatient() ." AS pa ON vs.patient_id = pa.patient_id";
	    $from .= " LEFT JOIN ". $this->getTblDisctrict() ." AS di ON di.districts_id = pa.patient_district";
	    $from .= " LEFT JOIN ". $this->getTblProvince() ." AS pr ON pr.provinces_id = pa.patient_province";
	    $where = ' vs.patient_id = '.$this->getId().' AND patient_deleted = 0';
	    
	    return $this->executeQuery($select, $from, $where);
	}
	    // Get Patient Info by ID 2
	function getEditPatientById(){
	    
	    $select = '';
        $from = $this->getTblPatient() ." AS pa";
	    $from .= " LEFT JOIN ". $this->getTblVisitor() ." AS vs ON vs.patient_id = pa.patient_id";
	    $from .= " LEFT JOIN ". $this->getTblDisctrict() ." AS di ON di.districts_id = pa.patient_district";
	    $from .= " LEFT JOIN ". $this->getTblProvince() ." AS pr ON pr.provinces_id = pa.patient_province";
	    $where = ' pa.patient_id = '.$this->getId().' AND patient_deleted = 0';
	    
	    return $this->executeQuery($select, $from, $where);
	}
	function getWaittingPatientById(){
		$select = '';
        	$from = $this->getTblWaitting()." AS wp";
	    	$where = ' wp.waitting_patient_id = '.$this->getId().' AND waitting_deleted = 0';
	    	$where .= ' ORDER BY waitting_id ASC';
	    	return $this->executeQuery($select, $from, $where);
	}
        
	//Array data for Insert and Update
        function getArrayDatas(){
	    $this->setArrayData('patient_kh_name',$this->getPatientKhName());
	    $this->setArrayData('patient_en_name',$this->getPatientEnName());
	    $this->setArrayData('patient_gender',$this->getPatientGender());
	    //$this->setArrayData('patient_address',$this->getAddress());
	    $this->setArrayData('patient_phone',$this->getPhone());
	    $this->setArrayData('patient_emergency_phone',$this->getEmergencyPhone());
	    $this->setArrayData('patient_dob',$this->getPatientDob());
	    $this->setArrayData('patient_occupation',$this->getPatientOccupation());
	    
	    $this->setArrayData('is_heart',$this->getIsHeart());
	    $this->setArrayData('is_respiratory',$this->getIsRespiratory());
	    $this->setArrayData('is_diabetes',$this->getIsDiabetes());
	    $this->setArrayData('is_digestive',$this->getIsDisgestive());
	    $this->setArrayData('is_kidney',$this->getIsKidney());
	    $this->setArrayData('is_endocrine',$this->getIsEndocrine());
	    $this->setArrayData('is_neuro_sys',$this->getIsNeuroSys());
	    $this->setArrayData('is_lung',$this->getIsLung());
	    $this->setArrayData('is_allergy',$this->getIsAllergy());
	    
	    $this->setArrayData('pulse_mm',$this->getPulseRate());
	    $this->setArrayData('heart_rate_mm',$this->getHeartRate());
	    $this->setArrayData('blood_pressure_mm',$this->getBloodPressure());
	    $this->setArrayData('respirateory_rate_mm',$this->getRespiratoryRate());
	    $this->setArrayData('temperature_mm',$this->getTemperature());

	    $this->setArrayData('patient_id_card',$this->getIdCard());
	    $this->setArrayData('patient_id_poor',$this->getIdPoor());
	    $this->setArrayData('patient_inssurance',$this->getInsurance());
	    $this->setArrayData('patient_assurance_card',$this->getAssuranceCard());
	    $this->setArrayData('patient_assurance_company',$this->getAssuranceCompany());
	    $this->setArrayData('patient_motor_card',$this->getMotorCard());
	    $this->setArrayData('patient_car_card',$this->getCarCard());
	    $this->setArrayData('patient_bank_card1',$this->getBankCard1());
	    $this->setArrayData('patient_bank_card2',$this->getBankCard2());
	    $this->setArrayData('patient_student_card',$this->getStudentSchool());
	    $this->setArrayData('patient_status',$this->getPatientStatus());
	    
	    $this->setArrayData('patient_pregnancy',$this->getPregnancy());
	    $this->setArrayData('patient_pre_pregnancy',$this->getPrePregnancy());
	    $this->setArrayData('patient_breastfeeding',$this->getBreastFeeding());
	    
	    $this->setArrayData('patient_disease',$this->getOtherDisease());
	    $this->setArrayData('patient_desc',$this->getDesc());
	    $this->setArrayData('patient_district',$this->getDistrict());
	    $this->setArrayData('patient_province',$this->getProvince());

	    $this->setArrayData('patient_ready',$this->getReady());

	    return $this->getArrayData();
        }

}
?>
