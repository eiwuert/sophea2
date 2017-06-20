<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Class DAO
require_once ('Securities.php');

// Define Login Class
class Homes extends Securities {
	
	// Define Index of Unit Fucntion
	public function index() {
	    
	    // Check Session
	    $this->checkSession();
	    
	    $data = array();
	    
            // Get Translate Word to View 
            $data = $this->getTranslate($data);
           
            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('main');
            $this->LoadView('template/footer');
            
        }
        
        // #################### Translate ####################### //
        // Translate to View
        function getTranslate($data = null){
            
            // Define Default Language from Security to view
            $data = $this->defTranslation($data);
            
            // Translate
       
            $data['create'] = $this->Lang('create');
            
            return $data;
        }
             
}
?>