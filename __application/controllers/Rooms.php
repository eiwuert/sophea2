<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Type
class Rooms extends Securities {
	
	// Define Index of Unit Fucntion
	public function index() {
	    
	    // Check Session
	    $this->checkSession();
             
            $data = array();
            
            // Get Item Per Page 
	    $data['item_per_page'] = $this->getSysConfig();

	    // Get Count All Type
	    $data['totals'] = $this->RoomModel->getCountRoom();

            // Get Translate Word to View 
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('room/list');
            $this->LoadView('template/footer');
        }
        
        function save_room(){
	    
	    // Check Session
	    $this->checkSession();
			
        $this->RoomModel->setId($this->getPost('room_id'));
	    $this->RoomModel->setCode($this->RoomModel->genPatientNo($this->getPost('room_code')));
	    $this->RoomModel->setName($this->getPost('room_name'));
	    $this->RoomModel->setDesc($this->getPost('room_desc'));
            
        if($this->getPost('room_id') == NULL || $this->getPost('room_id') == ""){
		    $this->RoomModel->add();
	    }else{
		    $this->RoomModel->update();
	    }
            // Write Log
            //$this->logs('3', 'Try to access application with user: '.$this->getPost('unit_name').' / '.$this->getPost('unit_desc'));
            
	}
        
    function get_room_list(){
	    
	    // Check Session
	    $this->checkSession();
	    
	    $this->RoomModel->setSearch($this->getPost('search_data'));
	    $this->RoomModel->setStart($this->getPost('page_start'));
	    $this->RoomModel->setLimit($this->getPost('page_limit'));
            
        $datas = $this->RoomModel->getAllRoom();
        $this->restData($datas);
	}

	function get_room_info_by_id_json(){ 
	    
	    // Check Session
	    $this->checkSession();
	    
            $this->RoomModel->setId($this->getUrlSegment3());
            $datas = $this->RoomModel->getRoomById();
            $this->restData($datas);
	}

	// Delete Limit 
        function delete_room(){
	    
	    // Check Session
	    $this->checkSession();
            
            $this->RoomModel->setId($this->getUrlSegment3());
            $this->RoomModel->delete();
            
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
            $data['room'] = $this->Lang('room');
            $data['code'] = $this->Lang('code');
            $data['edit'] = $this->Lang('update');
            $data['delete'] = $this->Lang('delete');
            $data['disactive'] = $this->Lang('disactive');
            $data['title'] = $this->Lang('unit');
            $data['name'] = $this->Lang('name');
            $data['list'] = $this->Lang('list');
            $data['create'] = $this->Lang('create');
            $data['desc'] = $this->Lang('desc');
            $data['c_total'] = $this->Lang('total');
            
            // Menu Active
            $data['ac_room'] = 'active';
            
            return $data;
        }
        
}
?>