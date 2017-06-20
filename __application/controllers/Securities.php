<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

class Securities extends CI_Controller {

/*
 * @@@@@@@@@@@@@@@@@@@@@@@
 * @created: Geany       @
 * @author: Sopheak SENG @
 * @modified: 19/01/2016 @
 * @@@@@@@@@@@@@@@@@@@@@@@
 * */

	// Define Construction
	function __construct() {
            parent::__construct ();
            // Load Model
            $this->load->model("Unit","UnitModel");
            $this->load->model("Type","TypeModel");
            $this->load->model("Category","CategoryModel");
            $this->load->model("Product","ProductModel");
            $this->load->model("User","UserModel");
            //$this->load->model("Role","RoleModel");
            $this->load->model("Ward","WardModel");
            $this->load->model("SysConfig","SysConfigModel");
            $this->load->model("Icd10","Icd10Model");
            $this->load->model("Patient","PatientModel");
            $this->load->model("Visitor","VisitorModel");
            $this->load->model("Diagnostic","DiagnosticModel");
            $this->load->model("Sessionsecurity","SessionsecurityModel");
            $this->load->model("Payment","PaymentModel");
            $this->load->model("Appoinment","AppoinmentModel");
            $this->load->model("Workstation","WorkstationModel");
            $this->load->model("Room","RoomModel");
            $this->load->model("Waitting","WaittingModel");
            $this->load->model("Patient_room","PatientRoomModel");
            $this->load->model("Neonatal","NeonatalModel");

            // Load Helper
            $this->load->helper ( "url" );
            $this->load->helper ( "form" );
            $this->load->helper ( "file" );
            $this->load->helper ( "date" );

            // Load Library
            $this->load->library ( "session" );
            $this->load->library ( "pagination" );
            $this->load->library ( "form_validation" );
            $this->load->library ( "javascript" );
            $this->load->library ( "upload" );

            // Load Language
            $this->load->language('common','english');
            $this->load->language('accounttype','english');
         
	}

        // Define Theme
        private $theme = "defualt";
        private $project = "longthai";
        private $data = array();
		private $sessionMinute = "12";
        
        // Define Log
        private $writeLog = "true";
        private $debugLog = "true";
        private $errorLog = "true";
        private $warningLog = "true";
        private $userLog = "true";
        
        // Define Custom
        private $medicalPer = '1';
        private $serviceAssignPer = '2';
        private $serviceAcceptPer = '8';
        
        // Other Var
        private $fileSize = 10240;
        
        // Set Write Log
        private function getWriteLog(){
            return $this->writeLog;
        }
        private function enWriteLog(){
            $this->writeLog = "true";
        }
        private function disWriteLog(){
            $this->writeLog = "false";
        }        
        // Debug Log
        private function getDebugLog(){
            return $this->debugLog;
        }
        private function enDebugLog(){
            $this->debugLog = "true";
        }
        private function disDebugLog(){
            $this->debugLog = "false";
        }
        
        // Error Log
        private function getErrorLog(){
            return $this->errorLog;
        }
        private function enErrorLog(){
            $this->errorLog = "true";
        }
        private function disErrorLog(){
            $this->errorLog = "false";
        }
        
        // Warning Log
        private function getWarningLog(){
            return $this->warningLog;
        }
        private function enWarningLog(){
            $this->warningLog = "true";
        }
        private function disWarningLog(){
            $this->warningLog = "false";
        }
        
        // User Log
        private function getUserLog(){
            return $this->userLog;
        }
        private function enUserLog(){
            $this->userLog = "true";
        }
        private function disUserLog(){
            $this->userLog = "false";
        }
        
        // Custom Define
        function getMedicalPer(){
            return $this->medicalPer;
        }
        function getServiceAcceptPer(){
            return $this->serviceAcceptPer;
        }
        function getServiceAssignPer(){
            return $this->serviceAssignPer;
        }

        // Other Var Set & Get
        function setFileSize($value){
            $this->fileSize = $value;
        }
        function getFileSize(){
            return $this->fileSize;
        }

        // Session Minute
	function getSessionMinute(){
	    return $this->sessionMinute;
	}
	
	// Logo
	function getHospitalLogo(){
	    return $this->getResources().'uploads/'.$this->getSession('hospitalId').'/logo/logo.png';
	}

	// Check if null
	function checkIfNull($str = ''){
	    if($str == NULL || $str == ''){
		return '';
	    }else{
		return $str;
	    }
	}

        // Check If not Nothing
	function testNothing($data){
		if($data == ''){
			return "true";
		}else{
			return "false";
		}
	}

	// Check if Null
	function testNull($data){
		if($data == null){
			return "true";
		}else{
			return "false";
		}
	}

	// Set Theme
	function setTheme($theme = ""){
		if($this->testNothing($theme) == "false"){
			$this->theme = $theme;
		}
	}
	
	// Get Theme
	private function getTheme(){
		return $this->theme;
	}

	// Get Defualt Base URL
	function getBaseUrl(){
		return $this->config->base_url();
	}
        
        // Get Defualt Base PATH
	function getBasePath(){
		return FCPATH.'resources/theme/'.$this->getTheme().'/uploads/'.$this->getCompanyId().'/';
	}

	// Get Resources
	function getResources(){
		return $this->getBaseUrl()."resources/theme/".$this->getTheme()."/";
	}
	
	// Get Error 404
	function get404Err(){
		$this->LoadView("errors/cli/error_404");
	}
	
        // Set Error Message
        function setErrorMessage($value){
            $this->setSession('errMsg', $value);
        }

        // Get Error Message
        function getErrorMessage(){
            return $this->getSession('errMsg');
        }

        // Load View of CI
	function LoadView($view = null,$data = null){
                $view = "theme/".$this->getTheme()."/".$view;
		if($this->testNull($data) == "true"){
			if($this->testNothing($view) == "true"){
				$this->get404Err();
			}else{
				$this->load->view($view);
			}
		}else{
			if($this->testNull($view) == "true"){
				$this->get404Err();
			}else{
				$this->load->view($view,$data);
			}
		}
	}
	
	// Get Session
	function getSession($key){
		return $this->session->userdata($key);
	}
	
	// Set Session
	function setSession($key,$value){
		$this->session->set_userdata($key,$value);
	}
        
	// Set Session Array
	function setSessionArray($array_data){
		$this->session->set_userdata($array_data);
	}
        
        // Unset Session
        function unSetSession($key){
            $this->session->unset_userdata($key);
        }


        // Destroy a session
	function destroySessioin() {
		$this->session->sess_destroy();
	}
	
	function checkLastLogin(){
	    $this->getSession('username');
	    
	}
	
        // Get Company ID
	function getCompanyId(){
		$com_id = $this->getSession('company_id');
		if($com_id == '' || $com_id == null){
			$com_id = 0;
		}else{
			$com_id = $com_id - 1;
		}
			return $com_id;
	}
        
        // Check if have session
        function checkSession(){
	    @$companies_id = $this->getSession('companies_id');
    	    @$uid = $this->getSession('user_id');
            
            $urls = $this->getUrlSegment1();
	    $this->SessionsecurityModel->setDate1($this->getSessionMinute());
	    $this->SessionsecurityModel->deleteSameData();
            if($companies_id != null || $companies_id != '' || $uid != '' || $uid != null){
                if($urls == 'logins' || $urls == ''){
                    if($this->getUrlSegment2() <> 'reset_password' && $this->getUrlSegment2() <> 'reset'){
                        redirect('homes');
                    }
                }
            }else {
                if($urls <> 'logins' || $urls != 'logins'){
                    redirect('logins');
                }
            }
            
        }
        
        // Check Permission
        function checkPermission(){
            $this->UserModel->setId($this->getSession('role_id'));
            $data = $this->UserModel->getCheckPermissionSection();
            if($data < 1){
                redirect('errors/no_permission');
            }
        }
        
        // Get All Permission
        function getAllPermission($data){
            $this->UserModel->setId($this->getSession('role_id'));
            $permissions = $this->UserModel->getRolePermissionTrue();
            foreach ($permissions as $rows){
                $data['p'.$rows->permissions_section] = $rows->permissions_action;
            }
            return $data;
        }

        // Set Permission Section
        function permissionSection($value){
            $this->UserModel->setPermissionSection($value);
        }

        // Get Current URL
        function getCurrentUrl(){
            return $this->getBaseUrl().'index.php/'.$this->getUrlSegment1();
        }

        // Set Previous URL
        function setPreviousUrl(){
            $this->setSession('prev_url', $this->getBaseUrl().'index.php/'.$this->getUrlSegment1());
        }
        
        // Get Previous URL
        function getPreviousUrl(){
            return $this->getSession('prev_url');
        }
        
	// Destroy Session
	function destroySession(){
		$this->session->sess_destroy();
	}
	
	// Get Post
	function getPost($key){
		return $this->input->post($key);
	}
	
	// Get Url Segment 3
	function getUrlSegment3(){
            if($this->uri->segment(3) == '' || $this->uri->segment(3) == null){
                return '0';
            }else{
                return $this->uri->segment(3);
            }
		
	}
	
	// Get Url Segment 2
	function getUrlSegment2(){
		return $this->uri->segment(2);
	}
	
	// Get Url Segment 1
	function getUrlSegment1(){
		return $this->uri->segment(1);
	}
	
	// Translatation
	function Lang($key){
		return $this->lang->line($key);
	}
	
	// Pagination Function for All
	function getPagination($controller, $total, $item_per_page, $page_id) {
		// Config Pagination
		$configs ['base_url'] = $this->getBaseUrl () . 'index.php/' . $controller;
		$configs ['total_rows'] = $total;
		$configs ['per_page'] = $item_per_page;
		$configs ['first_link'] = $this->lang ( 'first_link' );
		$configs ['last_link'] = $this->lang ( 'last_link' );
		$configs ['next_link'] = '»';
		$configs ['prev_link'] = '«';
		
		// Initialize Config Pagination
		$this->pagination->initialize ( $configs );
		
		// Return Pagination
		return $this->pagination->create_links ();
	}
        
        function fileUpload()
        {
                $config['upload_path']          = $this->getBasePath().'photos/';
                $config['allowed_types']        = 'jpg|png';
                $config['max_size']             = $this->getFileSize();

                if ( ! $this->upload->do_upload('userfile'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    return 'fail';
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());
                    return 'sucess';
                }
        }

        // ################################## Defualt Translation ################ //
        // Define the Defualt Translate Field
        function defTranslation($data = null){
            
            /*$this->RoleModel->setRoleId($this->getSession('role_id'));
            $data['permissions'] = $this->RoleModel->getAllRolePermissionTrue();*/
            
            // Define Base Url to View 
            $data['base_url'] = $this->getBaseUrl();
                
            // Define Resource Url to View 
            $data['resources'] = $this->getResources();
            
            // Translate
            $data['search'] = $this->Lang('search');
            $data['h_home'] = $this->Lang('home');
	    $data['h_patient'] = $this->Lang('patient');
	    $data['h_clinical'] = $this->Lang('clinical');
	    $data['h_product_and_service'] = $this->Lang('product_and_service');
	    $data['h_report'] = $this->Lang('report');
	    $data['h_search'] = $this->Lang('search');
	    $data['h_trash'] = $this->Lang('trash');
	    $data['h_visitor'] = $this->Lang('visitor');
	    $data['h_payment'] = $this->Lang('payment');
	    $data['h_waitting'] = $this->Lang('waitting_number');
	    $data['h_waitting_list'] = $this->Lang('waitting_list');
	    $data['h_waitting_history'] = $this->Lang('waitting_history');
    	    $data['h_workstation'] = $this->Lang('workstation');
        $data['h_receptionist'] = $this->Lang('receptionist');
	    $data['h_appoinment'] = $this->Lang('appoinment');

	    // Admin Module
	    $data['h_admin'] = $this->Lang('admin');
	    $data['h_user'] = $this->Lang('user');
	    $data['h_role'] = $this->Lang('role');
	    $data['h_hospital_config'] = $this->Lang('hospital_config');

	    // Product and Service Module
	    $data['h_category'] = $this->Lang('category');
	    $data['h_type'] = $this->Lang('type');
	    $data['h_product'] = $this->Lang('product');
	    $data['h_unit'] = $this->Lang('unit');
	    $data['h_icd10'] = $this->Lang('icd10');
	    $data['h_ward'] = $this->Lang('ward');

	    // Clinical Clinical
	    $data['h_diagnostic'] = $this->Lang('diagnostic');
	    $data['h_ipd'] = $this->Lang('ipd');
	    $data['h_opd'] = $this->Lang('opd');
	    $data['b_ipd'] = $this->Lang('b_ipd');
	    $data['b_opd'] = $this->Lang('b_opd');

	    // Translate Login Page
	    $data ['uname'] = $this->lang ( 'username' );
	    $data ['pwd'] = $this->lang ( 'password' );
	    $data ['hos_code'] = $this->lang ( 'hospital_code' );
	    $data ['login'] = $this->lang ( 'login' );
	    $data ['logout'] = $this->lang ( 'logout' );
	    $data ['reset_pwd'] = $this->lang ( 'reset_password' );
            
            // Techincal
            $data['loading'] = $this->Lang('loading');
            
            //$data[''] = $this->Lang($key);
            
            // Top Menu
            $data['resetPassword'] = $this->Lang('reset_password');
            $data['logout'] = $this->Lang('logout');
            
            // Session
            $data['userName'] = $this->getSession('name');
	    $data['hospitalName'] = $this->getSession('hospitalName');
            
            if($this->getUrlSegment1() <> 'logins' || $this->getUrlSegment1() != 'logins'){
                //$data = $this->getAllPermission($data);
		$data['hospitalLogo'] = $this->getHospitalLogo();
            }
            
            return $data;
        }
        
        // ############################### JSON DATA ############################ //
        function restData($datas){
            // Check If no  Session
            $this->checkSession();
            
            $this->output->set_header('HTTP/1.0 200 OK');
            $this->output->set_header('HTTP/1.1 200 OK');
            $this->output->set_content_type ( 'application/json' )
                         ->set_output ( json_encode ( $datas ) );
        }


        // ############################### Encryption ########################### //
        // Encryption
	private function encryptSha256($data){
		return hash("sha256", $data);
	}
	private function encryptSha384($data){
		return hash("sha256", $data);
	}
	private function encryptSha512($data){
		return hash("sha512", $data);
	}
	private function encryptRipemd128($data){
		return md5('ripemd128',$data);
	}
	private function encryptRipemd160($data){
		return md5('ripemd160',$data);
	}
	private function encryptRipemd256($data){
		return md5('ripemd256',$data);
	}
	private function encryptRipemd320($data){
		return md5('ripemd320',$data);
	}
	private function encryptWhirlpool($data){
		return md5('whirlpool',$data);
	}
	
	// Default Encrypt
	function defaultEncrypt($data){
		//$this->encrypt_sha256($data)
		return $this->encryptSha512($this->encryptSha384($this->encryptSha256($data)));
	}
        
        // ################################### Custom Function ################## //
        function getSysConfig(){
            $configInfo = $this->SysConfigModel->getAllConfig();
            foreach ($configInfo as $rows){
                $data = $rows->item_per_page;
            }
            return $data;
        }
        
        // Get Item Per Page
        function getItemPerPage(){
            $info = $this->getSysConfig();
            return $info['item_per_page'];
        }


        // ################################### LOGS ############################# //
	
	// Write Log by level 1=error, 2=warning, 3=debug, 4=user
	function logs($log_level, $log_data) {
		if ($log_level == 1) {
                        if($this->getErrorLog() == "true"){
                            $this->writeLog ( 'error', $log_data );
                        }
		} elseif ($log_level == 2) {
                    if($this->getWarningLog() == "true"){
			$this->writeLog ( 'warning', $log_data );
                    }    
		} elseif ($log_level == 3) {
                    if($this->getDebugLog() == "true"){
			$this->writeLog ( 'debug', $this->getSession('username').':'.$this->getSession('user_id').'==>'.$log_data );
                    } 
		} elseif ($log_level == 4) {
                    if($this->getUserLog() == "true"){
			$this->writeLog ( $this->getSession('username'), $this->getSession('name').':'.$this->getSession('user_id').'==>'.$log_data );
                    }
		}else {
			echo '===================================== This log level not yet aviliable option to write! ===============================';
		}
	}
	
	// Write Log File
	function writeLog($log_level, $log_data) {
            
                // Set Remote IP
		$ip_add = $_SERVER ['REMOTE_ADDR'];
		
		// Check If Log file can write on current file or create new file for today Else Write Nothing
                if($this->getWriteLog() == "true"){
                    if (! write_file ( './logs/' . $log_level . '_' . $this->getCurrentDate() . '.log', $this->getCurrentDatetime() . ' --- ' . $ip_add . ' ----> ' . $log_data . PHP_EOL, 'a+' )) {
                            echo '================================================ Unable to write file! ===============================================';
                    } else {
                            echo '';
                    }
                }
	}
        
        // Get Current Date and DateTime
	function getCurrentDate(){
		$datestring = '%Y-%m-%d';
		$time = time();
		$now =  mdate($datestring, $time);
		return $now;
	}

        // Get Current Date Time
	function getCurrentDatetime(){
		$datestring = '%Y-%m-%d %h:%i:%s%a';
		$time = time();
		$now =  mdate($datestring, $time);
		return $now;
	}
        
        // Get Current Date Time
	function getCurrentDatetimeString(){
		$datestring = '%Y%m%d%h%i%s%a';
		$time = time();
		$now =  mdate($datestring, $time);
		return $now;
	}
        
        // Date Value
        function setDates($value){
            $this->dates = $value;
        }
        function getDates(){
            return $this->dates;
        }
        
        // Date Format
        function setFormat($value){
            $this->format = $value;
        }
        function setDMYWithSlash(){
            $this->format = '%d/%m/%Y';
        }
        function setDMYWithMinus(){
            $this->format = '%d-%m-%Y';
        }
        function setMDYWithSlash(){
            $this->format = '%m/%d/%Y';
        }
        function setMDYWithMinus(){
            $this->format = '%m-%d-%Y';
        }
        function setYMDWithSlash(){
            $this->format = '%Y/%m/%d';
        }
        function setYMDWithMinus(){
            $this->format = '%Y-%m-%d';
        }
        function setYMDWithMinusHMS(){
            $this->format = '%Y-%m-%d %h:%i:%a';
        }
        function setYMDWithSlashHMS(){
            $this->format = '%Y/%m/%d %h:%i:%a';
        }
        function setDMYWithSlashHMS(){
            $this->format = '%d/%m/%Y %h:%i:%a';
        }
        function setDMYWithMinusHMS(){
            $this->format = '%d-%m-%Y %h:%i:%a';
        }
        function getFormat(){
            return $this->format;
        }
        
        // Convert Date Time
        // Get Current Date Time
	function getConvertDatetime(){
		return mdate($this->getFormat(),$this->getDates());
	}
        
        // ################### Setter & Getter Array ###################### //
        // Set Array
        function setArrayData($key,$value){
            
            if($value <> '' || $value <> null){
                $this->data[$key] = $value;
            }
            
        }
        function getArrayData(){
            return $this->data;
        }
        function setArrayDataNothing(){
            return $this->data = array();
        }
        
        // Module ussing
        function modules($data){
            
            $this->setArrayData('MstockItem', '1');
            $this->setArrayData('MstockCategory', '1');
            $this->setArrayData('MstockUnit', '1');
            $this->setArrayData('MstockWarehouse', '1');
            $this->setArrayData('Mcustomer', '1');
            $this->setArrayData('McustomerType', '1');
            $this->setArrayData('Msupplier', '1');
            $this->setArrayData('MsaleOw', '1');
            $this->setArrayData('MsaleInvoice', '1');
            $this->setArrayData('MsaleDelivery', '1');
            $this->setArrayData('MsaleCancel', '1');
            $this->setArrayData('Mreport', '1');
            $this->setArrayData('Mtrash', '1');
            $this->setArrayData('MsettingConfig', '1');
            $this->setArrayData('MsettingCurrency', '1');
            $this->setArrayData('MsettingRole', '1');
            $this->setArrayData('MsettingUser', '1');
            
            $data['workingModule'] = $this->getArrayData();
            
            return $data;
        }

        function queryDropDownMenu($query,$label_id,$label_name,$id,$value,$value2){
            if($label_id !== ''){
                $data_temp = array($label_id => $label_name);
            }else{
                $data_temp = array();
            }
            if($value2 !== ""){
                $value2= ' - '.$row->value2;
            }
            foreach($query as $key=>$row){
                $data_temp[$row->$id] = $row->$value.$value2;
            }
            return $data_temp;
        }
}

/* End of file securities.php */
/* Location: ./application/controllers/securities.php */

?>
