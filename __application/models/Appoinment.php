<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include DAO Class
include_once 'Datastructure.php';

// Define Unit Class
class Appoinment extends Datastructure{
	
    // Get All Appoinment
    function getAllAppoinment(){
        
        $select = " DATE_FORMAT(appoitments_time,'%d/%m/%Y %h:%i %p') AS appoitments_time, pt.patient_kh_name, pt.patient_en_name, name";
        $from = $this->getTblAppoinment() ." AS ap";
        $from .= " LEFT JOIN ". $this->getTblVisitor() . " AS vs ON vs.visitors_id = ap.visitors_id";
        $from .= " LEFT JOIN ". $this->getTblPatient() . " AS pt ON vs.patient_id = pt.patient_id ";
        $from .= " LEFT JOIN ". $this->getTblUser() . " AS us ON us.uid = ap.uid ";
        $where = " appionments_deleted = 0 AND appoitments_time >= NOW() ORDER BY appoitments_time ASC";
        
        return $this->executeQuery($select, $from, $where);
    }
    // Get All Appoinment 2
    function getAllAppoinment2(){
        
        $select = " DATE_FORMAT(appoitments_time,'%d/%m/%Y %h:%i %p') AS appoitments_time, appoitments_id, pt.patient_kh_name, pt.patient_en_name, pt.patient_phone, name AS name_user, wards_desc";
        $from = $this->getTblAppoinment() ." AS ap";
        $from .= " LEFT JOIN ". $this->getTblVisitor() . " AS vs ON vs.visitors_id = ap.visitors_id";
        $from .= " LEFT JOIN ". $this->getTblPatient() . " AS pt ON vs.patient_id = pt.patient_id ";
        $from .= " LEFT JOIN ". $this->getTblUser() . " AS us ON us.uid = ap.appoitments_doctor_id ";
        $from .= " LEFT JOIN ". $this->getTblWard() . " AS w ON w.wards_id = ap.appoitments_ward_id ";
        $where = " 1=1 AND";
        if($this->getDoctor() <> '' || $this->getDoctor() != ''){
            $where.= " us.uid = ".$this->getDoctor()." AND";
        }
        $where .= " appionments_deleted = 0 ORDER BY appoitments_time ASC";
        
        return $this->executeQuery($select, $from, $where);
    }

    // count appoinment
    function getCountAppoinment(){
        return $this->getCountWhere($this->getTblAppoinment(), ' appionments_deleted = 0');
    }
    
    // Get Appoinment By Visitor ID
    function getAppoinmentByVisitorId(){
        $from = $this->getTblAppoinment()." AS ap";
        $from.= " LEFT JOIN ".$this->getTblUser()." AS us ON us.uid = ap.appoitments_doctor_id";
        $from.= " LEFT JOIN ".$this->getTblWard()." AS w ON w.wards_id = ap.appoitments_ward_id";
        return $this->executeQuery("", $from, " appionments_deleted = 0 AND visitors_id = ".$this->getVisitorId());
    }

    // Get Count Appoinment By Visitor ID
    function getCountAppoiomentByVisitorId(){
        return $this->getCountWhere($this->getTblAppoinment(), " appionments_deleted = 0 AND visitors_id = ".$this->getVisitorId());
    }
    
    // Set Appoinment
    function setAppoinment(){
        $this->setArrayData("visitors_id", $this->getVisitorId());
        $this->setArrayData("uid", $this->getUserId());
        $this->setArrayData("appoitments_time", $this->getDate1());
        $this->setArrayData("appoitments_doctor_id", $this->getDoctorId());   
        $this->setArrayData("appoitments_ward_id", $this->getWardId());     
        $this->insertData($this->getTblAppoinment(), $this->getArrayData());
    }
    
    // Update Appoinment Status
    function updateAppoinmentTime(){
        $this->setArrayData("appoitments_time", $this->getDate1());
        $this->setArrayData("appoitments_status", $this->getGroup());
        $this->setArrayData("appoitments_doctor_id", $this->getDoctorId());  
        $this->setArrayData("appoitments_ward_id", $this->getWardId());               
        $this->updateDataWhere($this->getTblAppoinment(), $this->getArrayData(), " visitors_id = ".$this->getVisitorId());
    }

    function getAppointmentInfoByName(){
            $select = " name AS value, uid AS id_user";
            $from = $this->getTblUser();
            $where = "";
            if($this->getUsername() <> '' || $this->getUsername() != ''){
                $where .= " (name LIKE '%".$this->getUsername()."%') AND ";
            }
            $where .= " user_deleted = 0";
            
            return $this->executeQuery($select, $from, $where);
    }
    function getAppoinmentInfo(){
        $select = '';
        $from = $this->getTblUser();
        $where = " name ='".$this->getSearch()."'";
        return $this->executeQuery($select, $from, $where);
    }
    function leaveAppoById(){
        $this->setArrayData("appionments_deleted", 1);
        $this->updateDataWhere($this->getTblAppoinment(), $this->getArrayData(), " appoitments_id = ".$this->getId());
    }
}
?>
