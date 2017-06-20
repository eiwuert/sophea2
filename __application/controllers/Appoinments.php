<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Appoinments
class Appoinments extends Securities {
	
	// Define Index of Unit Fucntion
	public function index() {
	    
	     // Check Session
	      $this->checkSession();
             
            $data = array();
            // Get Item Per Page 
	      $data['item_per_page'] = $this->getSysConfig();
	      // Get Count All Visitor
	      $data['totals'] = $this->AppoinmentModel->getCountAppoinment();

            // Get Translate Word to View 
            $data = $this->getTranslate($data);

           
            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('appoinments/list');
            $this->LoadView('template/footer');
        }
	
      function getappoinmentall(){

            // Check Session
          $this->checkSession();
          
          $this->AppoinmentModel->setDoctor($this->getPost('idDoctor'));
          $this->AppoinmentModel->setSearch($this->getPost('search_data'));
          $this->AppoinmentModel->setStart($this->getPost('page_start'));
          $this->AppoinmentModel->setLimit($this->getPost('page_limit'));
          $datas = $this->AppoinmentModel->getAllAppoinment2();
          $this->restData($datas);

           // // Check Session
           //  $this->checkSession();                
           //  $datas = $this->AppoinmentModel->getAllAppoinment2();
           //  $this->restData($datas);	
      }
	
        // #################### Translate ####################### //
        // Translate to View
        function getTranslate($data = null){
            
            // Define Default Language from Security to view
            @$data = $this->defTranslation($data);
            $data['list'] = $this->Lang('list');
            $data['c_total'] = $this->Lang('total');
            // Menu Active
            $data['ac_appoinment'] = 'active';
            
            return $data;
        }

        function get_appoinment_by_name_json(){
            // Check Session
            $this->checkSession();
            $this->AppoinmentModel->setUsername($this->getUrlSegment3());
            $datas = $this->AppoinmentModel->getAppointmentInfoByName();
            $this->restData($datas);
        }

        function get_appoinment_json(){
            // Check Session
            $this->checkSession();
            $this->AppoinmentModel->setSearch(urldecode($this->getUrlSegment3()));
            $datas = $this->AppoinmentModel->getAppoinmentInfo();
            $this->restData($datas);
        }

        function leaveAppo(){
            $this->checkSession();
            $this->AppoinmentModel->setId($this->getUrlSegment3());
            $this->AppoinmentModel->leaveAppoById();
        }
      
      function appIpd(){
            redirect(site_url('site/eo_page'));
      }
        
}
?>