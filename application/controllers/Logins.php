<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Class DAO
require_once ('Securities.php');

// Define Login Class
class Logins extends Securities {
	
	// Define Index of Unit Fucntion
	public function index() {
	
	    // Check Session
	    $this->checkSession();
	    
	    $data = array();
			
            // Get Translate Word to View 
            $data = $this->getTranslate($data);
	    
            // Load View
            $this->LoadView('login',$data);
            
	}
    
	// Function Login and Create Session
	public function login() {
            
		    $data = array();
		    
		    // Get POST Method from Form Login
		    $hospital_code = $this->getPost('hospital');
		    $username = $this->getPost ('username');
		    $password = $this->defaultEncrypt($this->getPost('password'));

		    // Get Translate Word to View 
		    $data = $this->getTranslate($data);

		    // Check If Username, Password or hospital is nothing please redirect to login again
		    if ($this->testNothing($username) == 'true' || $this->testNothing($username) == 'true' || $this->testNothing($username) == 'true') {
			    $data ['msg'] = $this->Lang('blank_username_password');

			    // Write Log
			    $this->logs('3', 'User did not provide some information to login');

			    redirect('logins');
			    // Call view
			    //$this->loadView ( 'login', $data );
		    }
		    
		    $this->SessionsecurityModel->setName(':"'.$username.'";');
		    $this->SessionsecurityModel->setDate1($this->getSessionMinute());
		    $amountLogin = $this->SessionsecurityModel->getCheckSessionData();
		    
		    //$this->session->
		    
		    if($amountLogin > 0){
			 $data ['msg'] = ' Already Logins';
			 $this->loadView ( 'login', $data );
		    }else{
			$arr = $this->UserModel->checkLogins($username, $password, $hospital_code);

			// Check Username, Password and Hospital if wrong information please re-login
			if ($this->testNull($arr) == 'true') {
				$this->destroySessioin ();
				$data ['msg'] = $this->Lang('not_match_username_password');

				// Write Log
				$this->logs('3', 'Try to access application with user: '.$username.' / '.$this->getPost('password'));

				// Call view
				$this->loadView ( 'login', $data );

			// If Login information is correct then set session uid,name,username,hospital ID&Name and language then redirect to home or dashboard
			}else {
			    foreach($arr as $row){
				$this->setSession ( 'user_id', $row->uid );
				$this->setSession ( 'role_id', $row->roles_id );
				$this->setSession ( 'username', $row->username );
				$this->setSession ( 'hospitalId', $row->hospital_id );
				$this->setSession ( 'hospitalCode', $row->hospital_code );
				$this->setSession ( 'hospitalName', $row->hospital_name );
				$this->setSession ( 'lang', $row->lang );
				$this->setSession ( 'name', $row->name );
                                $this->setSession ( 'phone', $row->phone );
			    }	

			    // Write Log
			    $this->logs('3', 'User: '.$username.' logged in');
			    $this->logs('4', 'User logged in');

			    redirect ( 'homes' );
			}
		    }
	}
	
	function logout(){
	    $this->SessionsecurityModel->setName(':"'.$this->getSession('username').'";');
	    $this->SessionsecurityModel->deleteSession();
	    redirect ( 'logins' );
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