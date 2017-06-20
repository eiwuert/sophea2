<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Type
class Waittings extends Securities {
	
	// Define Index of Unit Fucntion
	public function index() {
	    // Check Session
	    $this->checkSession();
             
            $data = array();
            
        // Get Item Per Page 
	    $data['item_per_page'] = $this->getSysConfig();

	    // Get Count All Type
	    $data['totals'] = $this->WaittingModel->getCountWaitting();

        $this->WaittingModel->setStart(0);
        $this->WaittingModel->setLimit(0);
        $query_patient = $this->PatientModel->getAllPatient();
        $data['drop_patient'] = $this->queryDropDownMenu($query_patient,$label_id='0',$label_name='-- --',$id='patient_id',$value='patient_kh_name',$value2=''); 

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

        $data['generate_num_waitting'] = $this->WaittingModel->genNumber();

            // Get Translate Word to View 
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('waitting/list');
            $this->LoadView('template/footer');
        }
        
        function save_waitting(){

	    // Check Session
	    $this->checkSession();

	    $this->WaittingModel->setId($this->getPost('waitting_id'));
	    $this->WaittingModel->setCode($this->getPost('waitting_code'));
        $this->WaittingModel->setExamination($this->getPost('waitting_examination'));
        $this->WaittingModel->setPatientId($this->getPost('waitting_patient_id'));
        $this->WaittingModel->setDate(date('Y-m-d',strtotime($this->getPost('waitting_date'))));
        $this->WaittingModel->setWaittingOpen($this->getPost('waitting_open'));
        $this->WaittingModel->setDoctor($this->getPost('waitting_doctor'));
	    $this->WaittingModel->setRoomId($this->getPost('waitting_room'));

        if($this->getPost('waitting_id') == NULL || $this->getPost('waitting_id') == ""){
		    $this->WaittingModel->add();
	    }else{
		    $this->WaittingModel->update();
	    }
            // Write Log
            //$this->logs('3', 'Try to access application with user: '.$this->getPost('unit_name').' / '.$this->getPost('unit_desc'));
            
	}
        
    function get_waitting_list(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->WaittingModel->setSearch($this->getPost('search_data'));
	    $this->WaittingModel->setStart($this->getPost('page_start'));
	    $this->WaittingModel->setLimit($this->getPost('page_limit'));
            
            $datas = $this->WaittingModel->getAllWaitting();
            $this->restData($datas);
	}

	function get_waitting_info_by_id_json(){ 
	    
	    // Check Session
	    $this->checkSession();	    
            $this->WaittingModel->setId($this->getUrlSegment3());
            $datas = $this->WaittingModel->getWaittingById();
            $this->restData($datas);
	}

	// Delete Limit 
        function delete_waitting(){
	    
	    // Check Session
	    $this->checkSession();
            
            $this->WaittingModel->setId($this->getUrlSegment3());
            $this->WaittingModel->delete();
            
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
                $data['h_waitting_number'] = $this->Lang('waitting_number');
                $data['edit'] = $this->Lang('update');
                $data['delete'] = $this->Lang('delete');
                $data['check_out'] = $this->Lang('check_out');
                $data['list'] = $this->Lang('list');
                $data['history'] = $this->Lang('history');
                $data['create'] = $this->Lang('create');
                $data['name'] = $this->Lang('name');
                $data['doctor'] = $this->Lang('doctor');
                $data['visitor'] = $this->Lang('visitor');
                $data['purpose'] = $this->Lang('purpose');
                $data['room'] = $this->Lang('room');
                $data['code'] = $this->Lang('code');
                $data['gender'] = $this->Lang('gender');
                $data['old'] = $this->Lang('old');
                $data['age'] = $this->Lang('age');
                $data['examination'] = $this->Lang('examination');
                $data['date'] = $this->Lang('date');
                $data['print'] = $this->Lang('print');
            
            // Menu Active
            $data['ac_waitting'] = 'active';
            
            return $data;
        }

        function update_id_out(){
            // Check Session
            $this->checkSession();
                $this->WaittingModel->setId($this->getUrlSegment3());
                $this->WaittingModel->checkIdOut();
        }
        function view_print(){
            // Check Session
            $this->checkSession();           

            $this->WaittingModel->setId($this->getUrlSegment3());
            $this->WaittingModel->setCheckOut($this->getPost('chw'));
            $datas = $this->WaittingModel->getWaittingById();  

            $data['svipd_info'] = $datas;
            $data['resources'] = $this->getResources();
            $this->LoadView('waitting/form_print',$data);
        }
        // history
        function history(){
            // Check Session
            $this->checkSession();
            $data = array();
            // Get Item Per Page 
            $data['item_per_page'] = $this->getSysConfig();
            // Get Count All Type
            $data['totals'] = $this->WaittingModel->getCountWaitting_history();
            $data['generate_num_waitting'] = $this->WaittingModel->genNumber();

                // Get Translate Word to View 
                $data = $this->getTranslate($data);

                // Load View
                $this->LoadView('template/header',$data);
                $this->LoadView('template/topmenu');
                $this->LoadView('template/sidebar');
                $this->LoadView('waitting/list_history');
                $this->LoadView('template/footer');
        }
        function get_waitting_list_history(){
            // Check Session
            $this->checkSession();
            $this->WaittingModel->setSearch($this->getPost('search_data'));
            $this->WaittingModel->setStart($this->getPost('page_start'));
            $this->WaittingModel->setLimit($this->getPost('page_limit'));
            
            $datas = $this->WaittingModel->getAllWaitting_history();
            $this->restData($datas);
        }
        
}
?>