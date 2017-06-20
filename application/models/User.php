<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include DAO Class
include_once 'Datastructure.php';

// Define Unit Class
class User extends Datastructure{
	
	// Get All Unit
	function getAllUser($search = '', $start = '0' , $limit = '0') {
            $select = '';
            $from = $this->getTblUser();
            $where = '';
            if($search <> '' || $search != ''){
                $where .= " username LIKE '%".$search."%' AND";
            }
            $where .= " user_deleted = 0";
            
            // Check If Limit
            if($limit != '0' || $start != '0'){
				if($start == '1'){
                    $start = 0;
				}
				$where .= " LIMIT ".$start.", ".$limit;
            }
            
            return $this->executeQuery($select, $from, $where);
	}
        
        // Get Role List
        function getUserList(){
            $from = $this->getTblUser() ." AS us ";
            $from .= " JOIN ".$this->getTblRole() . " AS rl ON us.roles_id = rl.roles_id"; 
            
            return $this->executeQuery("", $from , " user_deleted = 0");
        }
        
        // Get Role List
        function getUserInfoById(){
            
            return $this->executeQuery("", $this->getTblUser() , " user_deleted = 0 AND uid = ".$this->getId());
        }
        
        // Get Role List
        function getRoleList(){
            return $this->executeQuery("", $this->getTblRole(), " roles_deleted = 0");
        }
        
        // Get Role Info by ID
        function getRoleById(){
                return $this->executeQuery("", $this->getTblRole() , " roles_deleted = 0 AND roles_id = ".$this->getId());
        }
        // Delete Role go to trash
        function deleteRole(){
                $this->updateData($this->getTblRole(), array('roles_deleted' => "1"), 'roles_id', $this->getId());
        }
        // Delete Role go to trash
        function deleteUser(){
                $this->updateData($this->getTblUser(), array('user_deleted' => "1"), 'uid', $this->getId());
        }
	
	// Get User Autor Complete
	function getUserInfoByName(){
	    
	    $select = " CONCAT( `name` , '-', `phone`) AS value";
	    $from = $this->getTblUser();
	    $where = " user_deleted = 0 AND ( name LIKE '".$this->getName()."%' OR phone LIKE '".$this->getName()."%' )";
	    
	    return $this->executeQuery($select, $from, $where);
	}
	
	// Get User ID
	function getUserIdByNameAndPhone(){
	    $result = $this->executeQuery('uid', $this->getTblUser(), " user_deleted = 0 AND name = '". $this->getName() ."' AND phone = '". $this->getPhone() ."'");
	    foreach($result as $row){
		return $row->uid;
	    }
	}
	
	// Check Login
	function checkLogins($username,$password,$hospitalCode){
            $select = "";
            $from = " ".$this->getTblUser()." AS us";
            $from .= " JOIN ".$this->getTblHospital()." AS ht ON ht.hospital_id = us.hospital_id";
            $where = " username = '".$username."' AND hospital_code = '".$hospitalCode."'";
            
            $info = $this->executeQuery($select, $from, $where);
            foreach ($info as $row){
                if($row->password == $password){
                    return $info;
                }
            }
            
            return NULL;
        }
        
        // Add User
        function add(){
            $this->insertData($this->getTblUser(), $this->getArrayUser());
        }
        
        // Update User
        function update(){
            $this->updateDataWhere($this->getTblUser(), $this->getArrayUser()," uid = ".$this->getId());
        }
        
        // User Data
        function getArrayUser(){
            
            $this->setArrayData("uid", $this->getId());
            $this->setArrayData("username", $this->getUsername());
            $this->setArrayData("hospital_id", $this->getSession("hospitalId"));
            if($this->getPasswd() != "" || $this->getPasswd() <> NULL){
                $this->setArrayData("password", $this->getPasswd());
            }
            $this->setArrayData("name", $this->getName());
            $this->setArrayData("roles_id", $this->getUnitId());
            $this->setArrayData("sex", $this->getSex());
            $this->setArrayData("background", $this->getBackground());
            $this->setArrayData("phone", $this->getPhone());
            $this->setArrayData("email", $this->getEmail());
            $this->setArrayData("address", $this->getAddress());
            $this->setArrayData("status", $this->getStatus());
            $this->setArrayData("work_place", $this->getWorkplace());
            $this->setArrayData("note", $this->getDesc());
            
            return $this->getArrayData();
        }
        
        // Get Roler Permission List
        function getRolePermission(){
            return $this->executeQuery("", $this->getTblRolePermission(), " roles_id =".$this->getId());
        }
        
        // Get Roler Permission True
        function getRolePermissionTrue(){
            return $this->executeQuery("", $this->getTblRolePermission(), " permissions_action = 1 AND roles_id =".$this->getId());
        }
        
        // Check Permission Section 
        function getCheckPermissionSection(){
            $info = $this->executeQuery(" permissions_action", $this->getTblRolePermission(), " permissions_section = '".$this->getPermissionSection()."' AND roles_id =".$this->getId());
            foreach ($info as $row) {
                return $row->permissions_action;
            }
        }
        
        // Count Permission Section
        function getCountPermissionSection(){
            return $this->getCountWhere($this->getTblRolePermission(), " roles_id = ".$this->getId()." AND permissions_section = '".$this->getPermissionSection()."'");
        }
        
        // Update Role Permission
        function updateRolePermission(){
            $this->setArrayData('permissions_action', $this->getSubject());
            $this->updateDataWhere($this->getTblRolePermission(), $this->getArrayData(), " roles_id = ".$this->getId()." AND permissions_section = '".$this->getPermissionSection()."'");
        }
        
        // Add Role Permission
        function addRolePermission(){
            $this->setArrayData('permissions_action', $this->getSubject());
            $this->setArrayData('roles_id', $this->getId());
            $this->setArrayData('permissions_section', $this->getPermissionSection());
            $this->insertData($this->getTblRolePermission(), $this->getArrayData());
        }

        // Add Role
        function addRole(){
            $this->setArrayData('hospital_id', $this->getHospitalId());
            $this->setArrayData('roles_name', $this->getName());
            $this->setArrayData('roles_desc', $this->getDesc());
            
            $this->insertData($this->getTblRole(), $this->getArrayData());
        }
        
        // Update Role
        function updateRole(){
            $this->setArrayData('roles_name', $this->getName());
            $this->setArrayData('roles_desc', $this->getDesc());
            
            $this->updateDataWhere($this->getTblRole(), $this->getArrayData(), ' roles_id ='.$this->getId());
        }

        function getCountAllUser(){
            return $this->getCountWhere($this->getTblUser(), " user_deleted = 0");
        }

        function getUsersInfoByName(){
            $select = " name AS value, uid AS id_user";
            $from = $this->getTblUser();
            $where = "";
            if($this->getUsername() <> '' || $this->getUsername() != ''){
                $where .= " (name LIKE '%".$this->getUsername()."%') AND ";
            }
            $where .= " user_deleted = 0";
            
            return $this->executeQuery($select, $from, $where);
        }
        function getUsersInfo(){
            $select = '';
            $from = $this->getTblUser();
            $where = " name ='".$this->getSearch()."'";
            return $this->executeQuery($select, $from, $where);
        }
        
}
?>
