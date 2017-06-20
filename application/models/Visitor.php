<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include DAO Class
include_once 'Datastructure.php';

// Define Visitor Class
class Visitor extends Datastructure{
	
	// Get All Visitor
	function getAllVisitor() {
            $select = '';
            $from = $this->getTblVisitor()." AS vs";
            $from .= " JOIN ". $this->getTblPatient()." AS pt ON vs.patient_id = pt.patient_id";
            $where = '';
            if($this->getSearch() <> '' || $this->getSearch() != ''){
                $where .= " waitting_code LIKE '%".$this->getSearch()."%' AND";
            }
            $where .= '	visitors_status < 3';
            // Check If Limit
            if($this->getLimit() != '0' || $this->getStart() != '0'){
		if($this->getStart() == '1' || $this->getStart() == ''){
		    $this->setStart('0');
		}
		$where .= " LIMIT ".$this->getStart().", ".$this->getLimit();
            }
            
            return $this->executeQuery($select, $from, $where);
	}
	
	// Get All Visitor
	function getAllVisited() {
            $select = '';
            $from = $this->getTblVisitor()." AS vs";
            $from .= " JOIN ". $this->getTblPatient()." AS pt ON vs.patient_id = pt.patient_id";
            $where = ' patient_deleted = 0 AND visitors_status < 5';
            if($this->getSearch() <> '' || $this->getSearch() != ''){
                $where .= " AND (patient_kh_name LIKE '%".$this->getSearch()."%' OR patient_en_name LIKE '%".$this->getSearch()."%' OR patient_code LIKE '%".$this->getSearch()."%'  OR patient_phone LIKE '%".$this->getSearch()."%')";
            }
            
            if($this->getVisitorStatusSearch() != '0,0,0'){
                $where .= " AND visitors_leave_status in (".$this->getVisitorStatusSearch().")";
            }
            
            $where .= " GROUP BY pt.patient_id";
            
            return $this->executeQuery($select, $from, $where);
	}
	
	// Get Count Visitor Status
	function getCountAllVisitor(){
	    
	    if($this->getVisitorStatus() == '1'){
		$where = " visitors_status = 1";
	    }elseif ($this->getVisitorStatus() == '2') {
		$where = " visitors_status = 2";
	    }else{
		$where = " visitors_status = 1 || visitors_status = 2 || visitors_status = 3";
	    }
	    
	    return $this->getCountWhere($this->getTblVisitor(), $where);
	}
	
	// Get Visitor ID By Patient
	function getVisitorByPatient() {
            $select = ' visitors_id';
            $from = $this->getTblVisitor()." AS vs";
            $from .= " JOIN ". $this->getTblPatient()." AS pt ON vs.patient_id = pt.patient_id";
            $where = ' vs.patient_id = '. $this->getPatientId().' ORDER BY visitors_id DESC';
            $reult = $this->executeQuery($select, $from, $where);
	    foreach ($reult as $row) {
		return $row->visitors_id;
	    }
	}
	
	// Get All Visitor
	function getAllVisitorPay() {
	    
	    $sub = " SELECT visitors_id, SUM(IFNULL(payments_amount,0)) AS paid, SUM(IFNULL(payments_discount,0)) AS discount FROM ".$this->getTblServicePayment()." GROUP BY visitors_id";
	    
        $select = ' vs.visitors_id, accept_by_uid, patient_code, patient_kh_name, visitors_in_date AS register_date, visitors_status, SUM((IFNULL(items_qty,0) * IFNULL(items_prices,0)) - IFNULL(items_discount,0)) AS total, IFNULL(paid,0) AS paid, IFNULL(discount,0) AS discount';
        $from = $this->getTblVisitor()." AS vs";
        $from .= " JOIN ". $this->getTblPatient()." AS pt ON vs.patient_id = pt.patient_id";
	    $from .= " LEFT JOIN ". $this->getTblServiceItem()." AS si ON vs.visitors_id = si.visitors_id";
	    $from .= " LEFT JOIN (". $sub .") AS sp ON vs.visitors_id = sp.visitors_id";
            //$where = '(visitors_status < 3 AND visitors_status > 0 AND items_deleted = 0) GROUP BY vs.visitors_id HAVING (total > (paid - discount)) AND total > 0';
	    $where = ' accept_by_uid > 0 AND items_deleted = 0 GROUP BY vs.visitors_id HAVING (total > (paid + discount)) AND total > 0';

            return $this->executeQuery($select, $from, $where);
	}
	
	// Get Patient Visit
	function getPatientVisit() {
            $select = " vs.visitors_id, visitors_in_date, types_id, products_name, IFNULL(icd10_code, '') AS icd10_code, IFNULL(icd10_desc,'') AS icd10_desc, IFNULL(diagnostics_level,'') AS diagnostics_level, IFNULL(diagnostics_detail,'') AS diagnostics_detail, items_qty, items_discount, items_prices";
            $from = $this->getTblVisitor()." AS vs";
            $from .= " JOIN ". $this->getTblPatient()." AS pt ON vs.patient_id = pt.patient_id";
	    $from .= " LEFT JOIN ". $this->getTblServiceItem() ." AS si ON si.visitors_id = vs.visitors_id";
	    $from .= " LEFT JOIN ". $this->getTblProduct() . " AS pr ON pr.products_id = si.products_id";
            $from .= " LEFT JOIN ". $this->getTblCategory() . " AS ca ON ca.categories_id = pr.categories_id";
            $from .= " LEFT JOIN ". $this->getTblDiagnostic() . " AS dia ON dia.visitors_id = vs.visitors_id";
            $from .= " LEFT JOIN ". $this->getTblIcd10() . " AS icd ON icd.icd10_id = dia.icd10_id";
            //$where = "	pt.patient_id = ". $this->getPatientId() ." AND visitors_status = 3 ORDER BY visitors_in_date ASC";
	    $where = " products_name IS NOT NULL AND pt.patient_id = ". $this->getPatientId() ." GROUP BY si.service_items_id ORDER BY visitors_in_date ASC";
            
            return $this->executeQuery($select, $from, $where);
	}
	
	// Get Visitor Info
	function getVisitorInfo() {
            $select = '';
            $from = $this->getTblVisitor()." AS vs";
            $from .= " JOIN ". $this->getTblPatient()." AS pt ON vs.patient_id = pt.patient_id";
            $where = " visitors_id =".$this->getId();
	    
            return $this->executeQuery($select, $from, $where);
	}
	
	// Get Diagnostic Info
	function getDiaByVisitorId() {
            $select = '';
            $from = $this->getTblDiagnostic()." AS ds";
            $from .= " JOIN ". $this->getTblVisitor()." AS vs ON vs.visitors_id = ds.visitors_id";
            $from .= " JOIN ". $this->getTblIcd10()." AS id ON ds.icd10_id = id.icd10_id";
            $where = ' diagnostics_deleted = 0 AND ds.visitors_id = '.$this->getId();
            
            return $this->executeQuery($select, $from, $where);
	}
	
	// Get All Visitor Ipd
	function getAllVisitorIpd() {
            $select = '';
            $from = $this->getTblVisitor()." AS vs";
            $from .= " JOIN ". $this->getTblPatient()." AS pt ON vs.patient_id = pt.patient_id";
            $where = '';
            if($this->getSearch() <> '' || $this->getSearch() != ''){
                $where .= " waitting_code LIKE '%".$this->getSearch()."%' AND";
            }
            $where .= '	visitors_status = 2';
            // Check If Limit
            if($this->getLimit() != '0' || $this->getStart() != '0'){
		if($this->getStart() == '1' || $this->getStart() == ''){
		    $this->setStart('0');
		}
		$where .= " LIMIT ".$this->getStart().", ".$this->getLimit();
            }
            
            return $this->executeQuery($select, $from, $where);
	}
	
	// Get Medicin
	function getMedicinListByVisitorId(){
	    $select = "service_items_id, si.uid, si.visitors_id, forms_name, si.products_id, products_name, products_code, units_name, items_qty, items_discount, items_prices, items_modified, items_form, items_time, items_detail, invoice_item_desc, fitzpatrik, fluence, pulse_length, frequency, mode, no_of_treal, lens, spot_size, cut_off_filter, pulse_train, pause_length, pulse_with_us, energy_mj, medication, mediacines_am, mediacines_af, mediacines_pm, mediacines_nt, times, us.name, IFNULL(ass.name, '') AS assign_to, IFNULL(acc.name,'') AS accept_by, IFNULL(us.name,'') AS assign_from";
	    $from = $this->getTblServiceItem()." AS si";
	    $from .= " JOIN ". $this->getTblProduct()." AS pr ON si.products_id = pr.products_id";
	    $from .= " JOIN ". $this->getTblCategory()." AS ca ON ca.categories_id = pr.categories_id";
	    $from .= " JOIN ". $this->getTblType()." AS ty ON ty.types_id = ca.types_id";
	    $from .= " JOIN ". $this->getTblUnit()." AS un ON un.units_id = pr.units_id";
	    $from .= " JOIN ". $this->getTblUser()." AS us ON si.uid = us.uid";
            $from .= " LEFT JOIN ". $this->getTblUser()." AS ass ON si.assign_to_uid = ass.uid";
            $from .= " LEFT JOIN ". $this->getTblUser()." AS acc ON si.accept_by_uid = acc.uid";
	    $from .= " LEFT JOIN ". $this->getTblForm()." AS fr ON si.items_form = fr.forms_id";
	    
	    $where = " si.visitors_id = ".$this->getVisitorId() ." AND ty.types_id = ".$this->getTypeId()." ORDER BY items_modified";
	    
	    return $this->executeQuery($select, $from, $where);
	}
        
        // Get Medicin Info by service id
	function getMedicinInfoByServiceId(){
	    $select = "service_items_id, si.visitors_id, ordernant_no, IFNULL(forms_name,'') AS forms_name, si.products_id, products_name, products_code, units_name, items_qty, items_discount, items_prices, items_modified, items_form, items_time, items_detail, invoice_item_desc, fitzpatrik, fluence, pulse_length, frequency, mode, no_of_treal, lens, spot_size, cut_off_filter, pulse_train, pause_length, pulse_with_us, energy_mj, medication, mediacines_am, mediacines_af, mediacines_pm, mediacines_nt, times, us.name, ass.name AS assign_by, ass.phone AS assign_by_phone, acc.name AS accept_by, acc.phone AS accept_by_phone, us.name AS assign_from, us.phone AS assign_from_phone";
	    $from = $this->getTblServiceItem()." AS si";
	    $from .= " JOIN ". $this->getTblProduct()." AS pr ON si.products_id = pr.products_id";
	    $from .= " JOIN ". $this->getTblCategory()." AS ca ON ca.categories_id = pr.categories_id";
	    $from .= " JOIN ". $this->getTblType()." AS ty ON ty.types_id = ca.types_id";
	    $from .= " JOIN ". $this->getTblUnit()." AS un ON un.units_id = pr.units_id";
	    $from .= " JOIN ". $this->getTblUser()." AS us ON si.uid = us.uid";
            $from .= " LEFT JOIN ". $this->getTblUser()." AS ass ON si.assign_to_uid = ass.uid";
            $from .= " LEFT JOIN ". $this->getTblUser()." AS acc ON si.accept_by_uid = acc.uid";
	    $from .= " LEFT JOIN ". $this->getTblForm()." AS fr ON si.items_form = fr.forms_id";
	    
	    $where = " 	service_items_id = '".$this->getVisitorId()."' AND ty.types_id = ".$this->getTypeId()." ORDER BY items_modified";
	    
	    return $this->executeQuery($select, $from, $where);
	}
	
	// Get Medicin
	function getProductUsedReport(){
	    $select = "si.service_items_id, us.name AS name, us1.name AS assign_name, us2.name AS accept_name, items_modified, products_name, patient_kh_name";
	    $from = $this->getTblServiceItem()." AS si";
	    $from .= " JOIN ". $this->getTblProduct()." AS pr ON si.products_id = pr.products_id";
	    $from .= " JOIN ". $this->getTblCategory()." AS ca ON ca.categories_id = pr.categories_id";
	    $from .= " JOIN ". $this->getTblType()." AS ty ON ty.types_id = ca.types_id";
	    $from .= " JOIN ". $this->getTblUnit()." AS un ON un.units_id = pr.units_id";
	    $from .= " JOIN ". $this->getTblUser()." AS us ON si.uid = us.uid";
            $from .= " JOIN ". $this->getTblUser()." AS us1 ON si.assign_to_uid = us1.uid";
            $from .= " JOIN ". $this->getTblUser()." AS us2 ON si.accept_by_uid = us2.uid";
	    $from .= " LEFT JOIN ". $this->getTblForm()." AS fr ON si.items_form = fr.forms_id";
	    $from .= " LEFT JOIN ". $this->getTblVisitor(). " AS vs ON vs.visitors_id = si.visitors_id";
	    $from .= " LEFT JOIN ". $this->getTblPatient(). " AS pa ON pa.patient_id = vs.patient_id";
	    
	    $where = " items_deleted = 0 AND accept_by_uid > 0";
	    if($this->getName() != "" || $this->getName() <> NULL){
		$where .= " AND name = '".$this->getName()."'";
	    }
	    if($this->getDate1() <> '' || $this->getDate2() != ''){
		$where .= " AND (items_modified BETWEEN '".$this->getDate1()."' AND '".$this->getDate2()."' )";
	    }
	    
	    return $this->executeQuery($select, $from, $where);
	}
	
	// Get All Visitor Opd
	function getAllVisitorOpd() {
            $select = '';
            $from = $this->getTblVisitor()." AS vs";
            $from .= " JOIN ". $this->getTblPatient()." AS pt ON vs.patient_id = pt.patient_id";
            $where = '';
            if($this->getSearch() <> '' || $this->getSearch() != ''){
                $where .= " waitting_code LIKE '%".$this->getSearch()."%' AND";
            }
            $where .= '	visitors_status = 1';
            // Check If Limit
            if($this->getLimit() != '0' || $this->getStart() != '0'){
		if($this->getStart() == '1' || $this->getStart() == ''){
                    $this->setStart('0');
		}
		$where .= " LIMIT ".$this->getStart().", ".$this->getLimit();
            }
            
            return $this->executeQuery($select, $from, $where);
	}
	
	// Get Count All Visitor
	function getCountVisitor() {
		return $this->getCountWhere($this->getTblVisitor(), ' visitors_status < 3');
	}
	
	// Get Count All Visitor Ipd
	function getCountVisitorIpd() {
		return $this->getCountWhere($this->getTblVisitor(), ' visitors_status = 2');
	}
	
	// Get Count All Visitor Opd
	function getCountVisitorOpd() {
		return $this->getCountWhere($this->getTblVisitor(), ' visitors_status = 1');
	}
	
	// Get Count All Visitor Opd
	function getCountVisitorNotLeave() {
		return $this->getCountWhere($this->getTblVisitor(), ' visitors_status < 3 AND patient_id = '.$this->getPatientId());
	}
	
	// Add or Insert Visitor
	function add(){
	    if($this->getCountVisitorNotLeave() == 0){
			$this->insertData($this->getTblVisitor(),$this->getArrayDatas());
	    }
	}
	
	// Update Visitor
	function update(){
	    $this->setArrayDataNothing();
	    $this->setArrayData('visitors_leave_date', $this->getVisitorLeaveDate());
	    $this->setArrayData('visitors_leave_status', $this->getPatientStatus());
	    $this->setArrayData('visitors_status', $this->getVisitorStatus());
	    
	    $this->updateDataWhere($this->getTblVisitor(), $this->getArrayData(), ' visitors_id = '.$this->getId());
	}
	
	// Update Visitor
	function updateLeaveStatus(){
	    $this->setArrayDataNothing();
	    $this->setArrayData('visitors_leave_status', $this->getPatientStatus());
	    
	    $this->updateDataWhere($this->getTblVisitor(), $this->getArrayData(), ' visitors_id = '.$this->getId());
	}
	
	//Array data for Insert and Update
	function getArrayDatas(){
		$this->setArrayData('patient_id',$this->getPatientId());
		$this->setArrayData('visitors_stay_date',$this->getVisitorStayDate());
                $this->setArrayData('visitors_leave_status',$this->getVisitorStatus());
		$this->setArrayData('visitors_status',$this->getVisitorStatus());
	
		return $this->getArrayData();
		
	}
	
	########################### Report ###################################d
	function getPatientVisitReport(){
	    
	    $select = " DISTINCT vs.visitors_id, ty.types_id, patient_kh_name, visitors_in_date, diagnostics_detail, diagnostics_level, icd10_code, icd10_desc, products_name, types_name, ty.types_id";
	    $from = $this->getTblVisitor(). " AS vs";
	    $from .= " JOIN " . $this->getTblPatient(). " AS pa ON pa.patient_id = vs.patient_id";
	    $from .= " JOIN " . $this->getTblDiagnostic(). " AS di ON di.visitors_id = vs.visitors_id";
            $from .= " JOIN " . $this->getTblIcd10(). " AS ic ON ic.icd10_id = di.icd10_id";
            $from .= " JOIN " . $this->getTblServiceItem() . " AS si ON si.visitors_id = vs.visitors_id";
            $from .= " JOIN " . $this->getTblProduct() . " AS pr ON si.products_id = pr.products_id ";
            $from .= " JOIN " . $this->getTblCategory() . " AS ca ON pr.categories_id = ca.categories_id";
            $from .= " JOIN " . $this->getTblType() . " AS ty ON ca.types_id = ty.types_id";
	    $where = " visitors_status > 0";
            
            if($this->getKey01() != '' || $this->getKey02() != '' || $this->getKey03() != ''){
                $where .= " AND (";
                
                    if($this->getKey01() == 'psOpd'){
                        $where .= " visitors_leave_status =  1 ";
                    }

                    if($this->getKey02() == 'psIpd' && $this->getKey01() == 'psOpd'){
                        $where .= " OR visitors_leave_status =  2 ";
                    }else if($this->getKey02() == 'psIpd' && $this->getKey01() == ''){
                        $where .= " visitors_leave_status =  2 ";
                    }

                    if($this->getKey03() == 'psPharm' && ( $this->getKey02() == 'psIpd' || $this->getKey01() == 'psOpd')){
                        $where .= " OR visitors_leave_status =  4 ";
                    }else if($this->getKey03() == 'psPharm' && ($this->getKey02() == '' || $this->getKey01() == '')){
                        $where .= " visitors_leave_status =  4 ";
                    }
                    
                $where .=  ")";
            }
	    
	    if($this->getRegisterDate() == 'today'){
		$where .= " AND visitors_in_date = CURDATE()";
	    }elseif($this->getDate1() != "" || $this->getDate2() != ""){
		$where .= " AND (visitors_in_date BETWEEN '".date( "Y-m-d", strtotime($this->getDate1()))."' AND '".date( "Y-m-d", strtotime($this->getDate2()))."')";
	    }else{
		$where .= "";
	    }
            
            $where .= " GROUP BY vs.visitors_id,pr.products_id,visitors_in_date ORDER BY vs.visitors_id,visitors_in_date";
	    
	    return $this->executeQuery($select, $from, $where);
	}
        
        function getDoctorComission(){
            
            $select = "service_items_id, us1.name AS assigner, assign_to_uid, IF(assign_to_uid = ".$this->getUserId().",assign_percent,0) AS assignper, us2.name AS accepter, accept_by_uid, IF(accept_by_uid = ".$this->getUserId().",accept_percent,0) AS acceptper, si.visitors_id, si.products_id, items_qty, items_discount, items_prices, items_modified, patient_kh_name, products_name";
            $from = $this->getTblServiceItem()." AS si";
            $from .= " JOIN ". $this->getTblVisitor() ." AS vi ON vi.visitors_id = si.visitors_id";
            $from .= " JOIN ". $this->getTblPatient() ." AS pa ON vi.patient_id = pa.patient_id";
            $from .= " JOIN ". $this->getTblProduct() ." AS pr ON pr.products_id = si.products_id";
            $from .= " JOIN ". $this->getTblUser() ." AS us1 ON us1.uid = si.assign_to_uid";
            $from .= " JOIN ". $this->getTblUser() ." AS us2 ON us2.uid = si.accept_by_uid";
            $where = " items_deleted = 0 ";
            
            if($this->getKey01() == $this->getUserId()){
                $where .= " AND (assign_to_uid = ".$this->getUserId()." OR accept_by_uid =".$this->getUserId().")";
            }
            
            if($this->getDate1() != '' || $this->getDate2() != ''){
                $where .= " AND (items_modified BETWEEN '".date('Y-m-d',strtotime($this->getDate1()))."' AND '".date('Y-m-d',strtotime($this->getDate2()))."')";
            }
            
            return $this->executeQuery($select, $from, $where);
        }
        
        function getIncomeData(){
            
            $select = "";
            $from = $this->getTblServicePayment()." AS sp";
            $from .= " JOIN ". $this->getTblVisitor() ." AS vi ON vi.visitors_id = sp.visitors_id";
            $from .= " JOIN ". $this->getTblPatient() ." AS pa ON vi.patient_id = pa.patient_id";
            $from .= " JOIN ". $this->getTblUser() ." AS us ON us.uid = sp.uid";
            $where = " payments_delete = 0 ";
            
            if($this->getDate1() != '' || $this->getDate2() != ''){
                $where .= " AND (payments_date BETWEEN '".date('Y-m-d',strtotime($this->getDate1()))."' AND '".date('Y-m-d',strtotime($this->getDate2()))."')";
            }
            
            return $this->executeQuery($select, $from, $where);
        }
        function getDrugReport(){
        	$select = " pro.products_name, SUM(si.items_qty) as sumQty, SUM(si.items_prices) as sumPrice, si.items_modified";
            $from = $this->getTblServiceItem()." AS si";    
            $from.= " JOIN emedirec_1_products as pro ON pro.products_id = si.products_id";  
			$from.= " JOIN emedirec_1_product_categories as pro_ca ON pro_ca.categories_id = pro.categories_id";
			$from.= " JOIN emedirec_1_product_types as pro_type ON pro_type.types_id = pro_ca.types_id";
            $where = " si.items_deleted = 0 AND pro_type.types_id NOT IN (4)";            
            if($this->getDate1() != '' || $this->getDate2() != ''){
                $where .= " AND (si.items_modified BETWEEN '".date('Y-m-d',strtotime($this->getDate1()))."' AND '".date('Y-m-d',strtotime($this->getDate2()))."')";
            }
            $where .= " GROUP BY si.products_id";
            
            return $this->executeQuery($select, $from, $where);
        }
}
?>
