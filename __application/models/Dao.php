<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Define Class DAO
class Dao extends CI_Model{

/*
 * @@@@@@@@@@@@@@@@@@@@@@@
 * @created: Geany	     @
 * @author: Sopheak SENG @
 * @modified: 19/01/2016 @
 * @@@@@@@@@@@@@@@@@@@@@@@
 * */
 
	function __construct(){
		parent::__construct();
                
			// Load Database Configure and Connection
			$this->load->database();
			
			// Load File Helper to use file read or write
			$this->load->helper ( "file" );
			$this->load->helper ( "date" );
			
			// Load Library
			$this->load->library ( "session" );
		}
	
        // ########################## Log #################################
        // Define Log
        private $writeLog = "true";
        private $queyrLog = "true";
        private $customQueryLog = "true";
        private $data = array();
        // Setter and Getter Log
        // Write Log
        private function getWriteLog(){
            return $this->writeLog;
        }
        private function enWriteLog(){
            $this->writeLog = "true";
        }
        private function disWriteLog(){
            $this->writeLog = "false";
        }
        
        // Query Log
        private function getQueryLog(){
            return $this->queyrLog;
        }
        private function enQueyrLog(){
            $this->queyrLog = "true";
        }
        private function disQueryLog(){
            $this->queyrLog = "false";
        }
        
        // Custom Query Log
        private function getCustomQueryLog(){
            return $this->customQueryLog;
        }
        private function enCustomQueyrLog(){
            $this->customQueryLog = "true";
        }
        private function disCustomQueyrLog(){
            $this->customQueryLog = "false";
        }


        // ########################### Get TABLE PRE ################################
        // Get Table Prefix
	function getTblPre($prefix,$table_name){
		return $prefix.$table_name;
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

	// ########################## Other Function ###############################
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
	
	// ########################### Query Action #################################
	// Get All Data From a Table
	function getAll($table_name){
                $this->db->cache_on();
		$query = $this->db->get($table_name);
                $this->db->cache_off();
                
                // Write Query Log
		$this->queryLog();
                
		return $query->result();
	}
	
	// Get All Data From a Table Where
	function getAllWhere($table_name,$select,$where_con){
		if($select == '' || $select == null){
			$select = "*";
		}
		$this->db->select($select);
		$this->db->where($where_con);
		$query = $this->db->get($table_name);
                
                // Write Query Log
		$this->queryLog();
		
                return $query->result();
	}

	// Get Rows By ID
	function getById($table_name,$key,$value){
		$this->db->where($key,$value);
		$query = $this->db->get($table_name);
		
                // Write Query Log
		$this->queryLog();
                
		return $query->result();
	}

	// Get an ID from Table
	function findIdByKey($table_name,$key,$param,$value){
		$this->db->select($key);
		$this->db->where($param,$value);
		$query = $this->db->get($table_name);
		
                // Write Query Log
		$this->queryLog();
                
		return $query->result();
	}

	// Insert Data to Table
	function insertData($table_name,$arr_data){
		$this->db->insert($table_name, $arr_data);
		
        // Write Query Log
		$this->queryLog();
	}

	// Update Data to Table
	function updateData($table_name,$arr_data,$key,$value){
		$this->db->where($key,$value);
		$this->db->update($table_name, $arr_data);
		
                // Write Query Log
		$this->queryLog();
	}
        
        // Update Data to Table
	function updateDataWhere($table_name,$arr_data,$where){
		$this->db->where($where);
		$this->db->update($table_name, $arr_data);
		
                // Write Query Log
		$this->queryLog();
	}

	// Delete Data From Table
	function deleteData($table_name,$key,$value){
		$this->db->where($key, $value);
		$this->db->delete($table_name);
		
                // Write Query Log
		$this->queryLog();
	}
        function deleteDataWhere($table_name,$where){
		$query = " DELETE FROM ".$table_name." WHERE ".$where;
                $this->executeScalar($query);
		
                // Write Query Log
		$this->queryLog();
	}

	// Get Count All Data From a Table
	function getCountWhere($table_name,$where_con){
		if($where_con != '' || $where_con != null){
			$this->db->where($where_con);
		}
		$count = $this->db->count_all_results($table_name);
		
                // Write Query Log
		$this->queryLog();
                
		return $count;
	}

	// Manual Select Query
	function executeQuery($select = "",$from = "",$where = ""){
                
            $qr = "";
            if(($from <> '' || $from <> NULL) && ($where <> '' || $where <> NULL)){
                    $qr = " SELECT ";
                    if($select == '' || $select == null){
                            $qr .= " *";
                    }else{
                            $qr .= $select; 
                    }
                    $qr .= " FROM ".$from;
                    if($where == '' || $where == null){
                            $qr .= " ";
                    }else{
                            $qr .= " WHERE ".$where;
                    }
                }else{
                    $qr = $select;
                }

		$query = $this->db->query($qr);
		
                // Write Query Log
		$this->queryLog();
                
		return $query->result();
	}

		// Manual Select Last Query ID
	function executeLastQueryId($from = "",$order= "",$by=""){
                
            $qr = " SELECT * ";            
            $qr .= " FROM ".$from;
            $qr .= " order by ".$order." ".$by;            
                
		$query = $this->db->query($qr);                
		return $query;
	}
        
        // Manual Insert Update
        function executeScalar($query = ''){
            if($this->testNothing($query) == 'false'){
                $this->db->query($query);
                
                $log_data = $this->getSession('user_id').':'.$this->getSession('username').' ====> Execute Query ====> '.$query;
		$this->writeLog($log_data);
            }
        }

	// ########################### Logs and Session #################################
	// General Log Style for Query Logs
	function queryLog(){
            if( $this->getQueryLog() == "true"){
		$query = str_replace(array("\n", "\r"),' ', $this->db->last_query());
		$log_data = $this->getSession('user_id').':'.$this->getSession('username').' ====> Execute Query ====> '.$query;
		$this->writeLog($log_data);
            }
	}

	// Custom Log Style for Query Logs
	function customQueryLog($query){
            if( $this->getCustomQueryLog() == "true"){
		$log_data = ''.$this->getSession('user_id').':'.$this->getSession('username').' ====> Execute Query ====> '.$query;
		$this->writeLog($log_data);
            }
	}

	// Write Log File
	function writeLog($log_data){
		$ip_add = $_SERVER['REMOTE_ADDR'];
                if( $this->getWriteLog() == "true"){
                    if ( !write_file('./logs/query_'.$this->getCurrentDate().'.log', $this->getCurrentDatetime().' --- '.$ip_add.' ----> '.$log_data.PHP_EOL, 'a+'))
                    {
                         echo 'Unable to write the file';
                    }
                    else
                    {
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
		$datestring = '%Y-%m-%d %h:%i:%a';
		$time = time();
		$now =  mdate($datestring, $time);
		return $now;
	}

	// Get Session
	function getSession($key){
		return $this->session->userdata($key);
	}

	// Set Session
	function setSession($key,$value){
		$this->session->set_userdata($key,$value);
	}
        
        // Check if have session
        function checkSession(){
            $companies_id = $this->getSession('companies_id');
            $prev_url = $this->getSession('prev_url');
            if($this->testNull($companies_id) == 'true' || $this->testNothing($companies_id == 'true')){
                redirect('logins');
            }else{
                redirect($prev_url);
            }
        }
        
        // ################### Setter & Getter Array ###################### //
        // Set Array
        function setArrayData($key,$value){

            if($value <> '' || $value <> null || $value <> '-'){
                $this->data[$key] = $value;
            }
            
            //$this->customQueryLog($key.':'.$value);
            
        }
        function getArrayData(){
            return $this->data;
        }
        function setArrayDataNothing(){
            $this->data = array();
        }
 
}

/* End of file dao.php */
/* Location: ./application/models/dao.php */

?>
