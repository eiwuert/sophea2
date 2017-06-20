<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Type
class Patient_rooms extends Securities {
	
	// Define Index of Unit Fucntion
	public function index() {
	    // Check Session
	    $this->checkSession();
             
            $data = array();
            
        // Get Item Per Page 
	    $data['item_per_page'] = $this->getSysConfig();
	    // Get Count All Type
	    $data['totals'] = $this->PatientRoomModel->getCountptr();

        $this->PatientRoomModel->setStart(0);
        $this->PatientRoomModel->setLimit(0);
        $query_patient = $this->PatientModel->getAllPatient();
        $data['drop_patient'] = $this->queryDropDownMenu($query_patient,$label_id='0',$label_name='-- --',$id='patient_id',$value='patient_kh_name',$value2=''); 

        $this->RoomModel->setStart(0);
        $this->RoomModel->setLimit(0);
        $query_room = $this->RoomModel->getAllRoom();
        $data['drop_room'] = $this->queryDropDownMenu($query_room,$label_id='0',$label_name='-- --',$id='room_id',$value='room_name',$value2='');          

        // Get Translate Word to View 
        $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ptr_room/list');
            $this->LoadView('template/footer');
        }
        
        function save_ptr(){

	    // Check Session
	    $this->checkSession();

	    $this->PatientRoomModel->setId($this->getPost('ptr_id'));
	    $this->PatientRoomModel->setPatientId($this->getPost('ptr_patient_id'));
        $this->PatientRoomModel->setRoomId($this->getPost('ptr_room_id'));
        $this->PatientRoomModel->setChartStorageRoom($this->getPost('ptr_chart_storage_room'));
	    $this->PatientRoomModel->setDate($this->getPost('ptr_date'));

        if($this->getPost('ptr_id') == NULL || $this->getPost('ptr_id') == ""){
		    $this->PatientRoomModel->add();
	    }else{
		    $this->PatientRoomModel->update();
	    }
            // Write Log
            //$this->logs('3', 'Try to access application with user: '.$this->getPost('unit_name').' / '.$this->getPost('unit_desc'));
            
	}
        
    function get_ptr_list(){
	    // Check Session
	    $this->checkSession();
	    
	    $this->PatientRoomModel->setSearch($this->getPost('search_data'));
	    $this->PatientRoomModel->setStart($this->getPost('page_start'));
	    $this->PatientRoomModel->setLimit($this->getPost('page_limit'));
            
            $datas = $this->PatientRoomModel->getAllPtr();
            $this->restData($datas);
	}

	function get_ptr_info_by_id_json(){ 
	    
	    // Check Session
	    $this->checkSession();	    
            $this->PatientRoomModel->setId($this->getUrlSegment3());
            $datas = $this->PatientRoomModel->getPtrById();
            $this->restData($datas);
	}

	// Delete Limit 
        function delete_ptr(){
	    
	    // Check Session
	    $this->checkSession();
            
            $this->PatientRoomModel->setId($this->getUrlSegment3());
            $this->PatientRoomModel->delete();
            
            // Write Log in to log file
            $this->logs('3', 'Delete '.$this->getUrlSegment1().' Type From List');
            $this->logs('4', 'Delete '.$this->getUrlSegment1().' Type From List');
        }
        
        // #################### Translate ####################### //
        // Translate to View
        function getTranslate($data = null){
            
            // Define Default Language from Security to view
            @$data = $this->defTranslation($data);
            
            // Translate
                $data['h_patient_room'] = $this->Lang('patient_room');
                $data['list'] = $this->Lang('list');
                $data['create'] = $this->Lang('create');
                $data['edit'] = $this->Lang('update');
                $data['delete'] = $this->Lang('delete');
                $data['check_out'] = $this->Lang('check_out');
                $data['visitor'] = $this->Lang('visitor');
                $data['chart_stroage'] = $this->Lang('chart_stroage');
                $data['room'] = $this->Lang('room');
                $data['code'] = $this->Lang('code');
                $data['date'] = $this->Lang('date');


                
                $data['name'] = $this->Lang('name');
                $data['gender'] = $this->Lang('gender');
                $data['old'] = $this->Lang('old');
                $data['examination'] = $this->Lang('examination');
                $data['date'] = $this->Lang('date');
                $data['print'] = $this->Lang('print');
            
            // Menu Active
            $data['ac_patient_rooms'] = 'active';
            
            return $data;
        }        
}
?>