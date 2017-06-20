<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Ipd
class Prescriptions extends Securities {
    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    public function view_form(){
	
	// Check Session
	$this->checkSession();
	$numOrdernant = '';
	    
	$rtype = explode('_', $this->getUrlSegment3());
	$this->WardModel->setPrintType($rtype[0]);
	$this->DiagnosticModel->setVisitorId($rtype[1]);
    $this->AppoinmentModel->setVisitorId($rtype[1]);
	$data['uids'] = $this->getSession('name');
    $data['uphones'] = $this->getSession('phone');
	$data['frm'] = $this->form_type();
	if($data['frm'] == 'Ordernant'){
		$numOrdernant = "1";
	}elseif($data['frm'] == 'Ordernant 2'){
		$numOrdernant = 2;
	}elseif($data['frm'] == 'Ordernant 3'){
		$numOrdernant = 3;
	}
	// elseif($data['frm'] == 'Service'){
	// 	$numOrdernant = 4
	// }
	$data['frmData'] = $this->getPrintFrm($numOrdernant);
	
	/*if($rtype[0] == 10){
	   $data['diaData'] = $this->getDiagnostic(); 
	}*/
        
        $data['diaData'] = $this->getDiagnostic(); 
        $data['appData'] = $this->getAppoinment(); 
	
	$data['frmId'] = $rtype[0];
	$data['baseUrl'] = $this->getBaseUrl();
	$data['resources'] = $this->getResources();
	$this->LoadView('diagnostics/frm',$data);
    }
    
    public function receipt_form(){
	
	// Check Session
	$this->checkSession();
	    
	$rtype = explode('_', $this->getUrlSegment3());
	$this->WardModel->setPrintType($rtype[0]);
	$this->DiagnosticModel->setVisitorId($rtype[1]);
        $this->AppoinmentModel->setVisitorId($rtype[1]);
	$data['uids'] = $this->getSession('name');
        $data['uphones'] = $this->getSession('phone');
	$data['frm'] = $this->rc_type();
	$data['frmData'] = $this->getPrintFrm();
        $data['diaData'] = $this->getDiagnostic(); 
        $data['appData'] = $this->getAppoinment(); 
	$data['frmId'] = $rtype[0];
	$data['baseUrl'] = $this->getBaseUrl();
	$data['resources'] = $this->getResources();
	$this->LoadView('diagnostics/frm_rc',$data);
    }
    
    public function get_form_data(){
	// Check Session
	$this->checkSession();
	    
	$rtype = explode('_', $this->getUrlSegment3());
	$this->WardModel->setPrintType($rtype[0]);
	$this->DiagnosticModel->setVisitorId($rtype[1]);
        $this->AppoinmentModel->setVisitorId($rtype[1]);
	$data['uids'] = $this->getSession('name');
        $data['uphones'] = $this->getSession('phone');
	$data['frm'] = $this->rc_type();
	$datas = $this->getPrintFrm();
        $data['diaData'] = $this->getDiagnostic(); 
        $data['appData'] = $this->getAppoinment(); 
	$data['frmId'] = $rtype[0];
	$data['baseUrl'] = $this->getBaseUrl();
	$data['resources'] = $this->getResources();
	
	$this->restData($datas);
    }
    
    public function get_form_pay_data(){
	// Check Session
	$this->checkSession();
	    
	$rtype = explode('_', $this->getUrlSegment3());
	$this->WardModel->setPrintType($rtype[0]);
	$this->DiagnosticModel->setVisitorId($rtype[1]);
        $this->AppoinmentModel->setVisitorId($rtype[1]);
	$this->DiagnosticModel->setUnDeleted();
	$data['uids'] = $this->getSession('name');
        $data['uphones'] = $this->getSession('phone');
	$data['frm'] = $this->rc_type();
	$datas = $this->getPrintFrm();
        $data['diaData'] = $this->getDiagnostic(); 
        $data['appData'] = $this->getAppoinment(); 
	$data['frmId'] = $rtype[0];
	$data['baseUrl'] = $this->getBaseUrl();
	$data['resources'] = $this->getResources();
	
	$this->restData($datas);
    }


    private function form_type(){
	
	$set_fm = '';
	
	if($this->WardModel->getPrintType() == '1'){
	    $set_fm = 'Medicine and Cerom';
	    $this->DiagnosticModel->setPrintType('13');
	}elseif ($this->WardModel->getPrintType() == '2') {
	    $set_fm = 'Diode Laser';
	    $this->DiagnosticModel->setPrintType('8');
	}elseif ($this->WardModel->getPrintType() == '3') {
	    $set_fm = 'Q-Switch Laser';
	    $this->DiagnosticModel->setPrintType('9');
	}elseif ($this->WardModel->getPrintType() == '4') {
	    $set_fm = 'Oil';
	    $this->DiagnosticModel->setPrintType('12');
	}elseif ($this->WardModel->getPrintType() == '5') {
	    $set_fm = 'CPL Laser';
	    $this->DiagnosticModel->setPrintType('7');
	}elseif ($this->WardModel->getPrintType() == '6') {
	    $set_fm = 'Erbium Vag Laser';
	    $this->DiagnosticModel->setPrintType('10');
	}elseif ($this->WardModel->getPrintType() == '7') {
	    $set_fm = 'Facial Peeling';
	    $this->DiagnosticModel->setPrintType('11');
	}elseif ($this->WardModel->getPrintType() == '8') {
	    $set_fm = 'Anti Aging Treatment';
	    $this->DiagnosticModel->setPrintType('14');
	}elseif ($this->WardModel->getPrintType() == '9') {
	    $set_fm = 'Ordernant';
	    $this->DiagnosticModel->setPrintType('0');
	}elseif ($this->WardModel->getPrintType() == '12') {
	    $set_fm = 'Ordernant 2';
	    $this->DiagnosticModel->setPrintType('0');
	}elseif ($this->WardModel->getPrintType() == '13') {
	    $set_fm = 'Ordernant 3';
	    $this->DiagnosticModel->setPrintType('0');
	}elseif ($this->WardModel->getPrintType() == '10') {
	    $set_fm = 'Invoice';
	    $this->DiagnosticModel->setPrintType('0');    
	}elseif ($this->WardModel->getPrintType() == '14') {
	    $set_fm = 'Service';
	    $this->DiagnosticModel->setPrintType('0');    
	}else{
	    $set_fm = 'Not In List';
	}
	
	return $set_fm;
	
    }
    
    private function rc_type(){
	
	$set_fm = '';
	
	if($this->WardModel->getPrintType() == '1'){
	    $set_fm = 'Medicine';
	    $this->DiagnosticModel->setPrintType('5');
	}elseif ($this->WardModel->getPrintType() == '2') {
	    $set_fm = 'Laser';
	    $this->DiagnosticModel->setPrintType('1');
	}elseif ($this->WardModel->getPrintType() == '3') {
	    $set_fm = 'Skin Care';
	    $this->DiagnosticModel->setPrintType('6');
	}elseif ($this->WardModel->getPrintType() == '4') {
	    $set_fm = 'Modern Facial';
	    $this->DiagnosticModel->setPrintType('4');
	}elseif ($this->WardModel->getPrintType() == '5') {
	    $set_fm = 'Oil';
	    $this->DiagnosticModel->setPrintType('3');
	}elseif ($this->WardModel->getPrintType() == '6') {
	    $set_fm = 'Hydro Impact';
	    $this->DiagnosticModel->setPrintType('2');
	}else{
	    $set_fm = 'Not In List';
	}
	
	return $set_fm;
	
    }
    
    function getPrintFrm($numOrdernant = ''){
	return $this->DiagnosticModel->getFormPrint($numOrdernant);
    }

    function getDiagnostic(){
	return $this->DiagnosticModel->getDiagnosticListByVisitorId();
    }
    
    function getAppoinment(){
	return $this->AppoinmentModel->getAppoinmentByVisitorId();
    }

}
?>