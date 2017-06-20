<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Type
class Waittings_list extends Securities {
    
    // Define Index of Unit Fucntion
    public function index() {
        
        // Check Session
        $this->checkSession();
             
            $data = array();
            
            // Get Translate Word to View 
            $data = $this->getTranslate($data);
            $data['logo'] = $this->getBaseUrl().'/resources/theme/defualt/img/clinic.jpg';
            // Load View
            // $this->LoadView('template/header',$data);
            // $this->LoadView('template/topmenu');
            // $this->LoadView('template/sidebar');
            $this->LoadView('waitting/list_waitting',$data);
            // $this->LoadView('template/footer');
        }

        function get_waitting_screen_list(){
            // Check Session
            $this->checkSession();                
            $datas = $this->WaittingModel->getAllWaittingOnScreen();
            $this->restData($datas);
        }

        // #################### Translate ####################### //
        // Translate to View
        function getTranslate($data = null){
            
            // Define Default Language from Security to view
            @$data = $this->defTranslation($data);
            
            // Translate
                $data['h_waitting_number'] = $this->Lang('waitting_number');               
                $data['list'] = $this->Lang('list');             
            // Menu Active
            $data['ac_waitting_list'] = 'active';
            
            return $data;
        }

       
}
?>