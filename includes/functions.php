<?php
//function getDicValues($dic_name){
//	$array = array();
//	$query =  "SELECT * FROM " . DB_PREFIX . $dic_name;
//	$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
//	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
//		$array[] = new Dictionary($row['id'], $row['name']);
//	}
//	mysql_free_result($result);
//	return $array;

// возвращает имя папки хоста со слешом на конце



function folder_host($req_uri){
	$needle   = '/';
	$pos      = strripos($req_uri, $needle);
	//echo "<h1>pos = $pos</h1>";
	return  substr($req_uri, 0, $pos);
}
//}
function mail_utf8($to, $from, $subject, $message)
{
	$subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';

	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=utf-8\r\n";
	$headers .= "From: $from\r\n";

	return mail($to, $subject, $message, $headers);
}

function open_tpl_to_view_patient($id, $smarty, $dao, $do="view"){

	fill_patient_form_by_dic($smarty, $dao);
	$patient = null;
	$patient =$dao->getPatient($id);
	//$investigation =$dao->getInvestigationByPatientId($id);
	$investigation = null;

	if($do == "edit"){
		$smarty->assign('readonly',"");
		$smarty->assign('disabled',"");
		$smarty->assign('class',"");

		$smarty->assign('class_req_input',"class='req_input'");
		$smarty->assign('edit',true);
	}else{
		$smarty->assign('readonly',"readonly='readonly'");
		$smarty->assign('disabled',"disabled='disabled'");
		$smarty->assign('edit',false);
		$smarty->assign('class_req_input',"class='read_only_input'");
		$smarty->assign('class',"class='read_only_input'");
	}
	$smarty->assign('investigation_exist', $investigation != null ? true : false);
	$smarty->assign('patient_exist', $patient != null ? true : false);
	$smarty->assign('object',$patient == null ? new Patient(): $patient);
	$smarty->display('templates/edit_patient.tpl');

}

//deprecated
function open_tpl_to_view_investigation($patient_id, $smarty, $dao, $do="view"){
	$patient = $dao->getPatient($patient_id);
	//var_dump($patient);
	if($patient == null){
		exit("Исследование добавляется только имеющемуся пациенту");
	}
	fill_investigation_form_by_dic($smarty, $dao);
	$investigation = null;
	$investigation =$dao->getInvestigationByPatientId($patient_id);
	//echo "patient_id=$patient_id<p>";

	//var_dump($dao->getPatient((int) $_REQUEST["patient_id"]));
	if($investigation == null){
		$do = 'edit';
		$investigation = new Investigation();
		$investigation->patient_id = $patient_id;
	}
	if($do == "edit"){
		$smarty->assign('readonly',"");
		$smarty->assign('disabled',"");
		$smarty->assign('class',"");

		$smarty->assign('class_req_input',"class='req_input'");
		$smarty->assign('edit',true);
	}else{
		$smarty->assign('readonly',"readonly='readonly'");
		$smarty->assign('disabled',"disabled='disabled'");
		$smarty->assign('edit',false);
		$smarty->assign('class_req_input',"class='read_only_input'");
		$smarty->assign('class',"class='read_only_input'");
	}
	$smarty->assign('object',$investigation);
	$smarty->assign('patient',$patient);
	$smarty->assign('patient_exist', true);
	$smarty->display('templates/edit_investigation.tpl');
}

function open_tpl_to_view_therapy($request, $smarty, $dao, $do="view"){
	$therapy = null;
	fill_therapy_form_by_dic($smarty, $dao);
	$exist = false;
	if(isset($request["exist"]) && $request["exist"]){
		$exist = true;
	}else{
		$exist = $dao->isVisitExist($request["patient_id"], $request["visit_id"]);
	}
	
	if($exist){
		$therapy =$dao->getTherapyByPatientAndVisit($request["patient_id"], $request["visit_id"]);
		//var_dump($therapy);
	}else{	
		//echo "<h1>12345</h1>";
		$do = 'edit';
		$therapy = new Therapy();
		$therapy->patient_id = $request["patient_id"];
		$therapy->visit_id = $request["visit_id"];
	}
	//	$therapy =$dao->getTherapy($id);
	$patient = $dao->getPatient($request["patient_id"]);
	if($do == "edit"){
		$smarty->assign('readonly',"");
		$smarty->assign('disabled',"");
		$smarty->assign('class',"");
		$smarty->assign('class_req_input',"class='req_input'");
		$smarty->assign('edit',true);
		//echo "in do edit<br/>";
	}else{
		$smarty->assign('readonly',"readonly='readonly'");
		$smarty->assign('disabled',"disabled='disabled'");
		$smarty->assign('edit',false);
		$smarty->assign('class_req_input',"class='read_only_input'");
		$smarty->assign('class',"class='read_only_input'");
		//echo "in do else<br/>";
	}
	$smarty->assign('object',$therapy);
	$smarty->assign('patient',$patient);
	$smarty->display('templates/edit_therapy.tpl');
}

function fill_patient_form_by_dic($smarty, $dao){
	$smarty->assign('hospital_vals', $dao->getDicValues("hospital_id"));
	$smarty->assign('investigation_vals', $dao->getDicValues("investigation_id"));
	$smarty->assign('sex_vals', $dao->getDicValues("sex_id"));
	$smarty->assign('place_living_vals', $dao->getDicValues("place_living_id"));
	$smarty->assign('social_status_vals', $dao->getDicValues("social_status_id"));
	$smarty->assign('diag_cancer_localization_vals', $dao->getDicValues("diag_cancer_localization_id"));
	$smarty->assign('diag_cancer_degree_malignancy_vals', $dao->getDicValues("diag_cancer_degree_malignancy_id"));
	$smarty->assign('diag_cancer_tnm_stage_t_vals', $dao->getDicValues("diag_cancer_tnm_stage_t_id"));
	$smarty->assign('diag_cancer_tnm_stage_n_vals', $dao->getDicValues("diag_cancer_tnm_stage_n_id"));
	$smarty->assign('diag_cancer_tnm_stage_m_vals', $dao->getDicValues("diag_cancer_tnm_stage_m_id"));
	$smarty->assign('diag_cancer_clin_stage_vals', $dao->getDicValues("diag_cancer_clin_stage_id"));
	$smarty->assign('diag_cancer_ecog_status_vals', $dao->getDicValues("diag_cancer_ecog_status_id"));
}


function fill_investigation_form_by_dic($smarty, $dao){
	$yes_no_vars = $dao->getDicValues("yes_no");
	$smarty->assign('yesnovals',$yes_no_vars);
	$smarty->assign('intestinum_crassum_part_vals',$dao->getDicValues("intestinum_crassum_part"));
	$smarty->assign('colon_part_vals',$dao->getDicValues("colon_part"));
	$smarty->assign('rectum_part_vals',$dao->getDicValues("rectum_part"));

	$smarty->assign('status_gene_kras_vals',$dao->getDicValues("status_gene_kras"));
	$smarty->assign('status_gene_kras3_vals',$dao->getDicValues("status_gene_kras3"));
	$smarty->assign('status_gene_kras4_vals',$dao->getDicValues("status_gene_kras4"));
	$smarty->assign('status_gene_nras2_vals',$dao->getDicValues("status_gene_nras2"));
	$smarty->assign('status_gene_nras3_vals',$dao->getDicValues("status_gene_nras3"));
	$smarty->assign('status_gene_nras4_vals',$dao->getDicValues("status_gene_nras4"));

	$smarty->assign('depth_of_invasion_vals',$dao->getDicValues("depth_of_invasion"));
	$smarty->assign('stage_vals',$dao->getDicValues("stage"));
	$smarty->assign('tumor_histological_type_vals',$dao->getDicValues("tumor_histological_type"));
	$smarty->assign('tumor_differentiation_degree_vals',$dao->getDicValues("tumor_differentiation_degree"));
}

function fill_therapy_form_by_dic($smarty, $dao){
	$smarty->assign('visit_vals', $dao->getDicValues("visit_id"));
	$smarty->assign('chmt_karboplatin_vals', $dao->getDicValues("chmt_karboplatin_id"));
	$smarty->assign('chmt_cisplatin_vals', $dao->getDicValues("chmt_cisplatin_id"));
	$smarty->assign('chmt_ciklofosfan_vals', $dao->getDicValues("chmt_ciklofosfan_id"));
	$smarty->assign('chmt_paklitaksel_vals', $dao->getDicValues("chmt_paklitaksel_id"));
	$smarty->assign('chmt_doksorubicin_vals', $dao->getDicValues("chmt_doksorubicin_id"));
	$smarty->assign('chmt_topotekan_vals', $dao->getDicValues("chmt_topotekan_id"));
	$smarty->assign('chmt_gemcitabin_vals', $dao->getDicValues("chmt_gemcitabin_id"));
	$smarty->assign('chmt_vinorelbin_vals', $dao->getDicValues("chmt_vinorelbin_id"));
	$smarty->assign('chmt_irinotekan_vals', $dao->getDicValues("chmt_irinotekan_id"));
	$smarty->assign('chmt_jetopozid_vals', $dao->getDicValues("chmt_jetopozid_id"));
	$smarty->assign('chmt_jepirubicin_vals', $dao->getDicValues("chmt_jepirubicin_id"));
	$smarty->assign('chmt_docetaksel_vals', $dao->getDicValues("chmt_docetaksel_id"));
	$smarty->assign('chmt_oksaliplatin_vals', $dao->getDicValues("chmt_oksaliplatin_id"));
	$smarty->assign('chmt_trabektedin_vals', $dao->getDicValues("chmt_trabektedin_id"));
	$smarty->assign('chmt_other_vals', $dao->getDicValues("chmt_other_id"));
	$smarty->assign('epoetin_yes_no_vals', $dao->getDicValues("epoetin_yes_no_id"));
	$smarty->assign('epoetin_eprex40k_trfinish_yes_no_vals', $dao->getDicValues("epoetin_eprex40k_trfinish_yes_no_id"));
	$smarty->assign('epoetin_eprex40k_trfinish_cause_vals', $dao->getDicValues("epoetin_eprex40k_trfinish_cause_id"));
	$smarty->assign('epoetin_eprex2k5ML_trfinish_yes_no_vals', $dao->getDicValues("epoetin_eprex2k5ML_trfinish_yes_no_id"));
	$smarty->assign('epoetin_eprex2k5ML_trfinish_cause_vals', $dao->getDicValues("epoetin_eprex2k5ML_trfinish_cause_id"));
	$smarty->assign('epoetin_rekormon_trfinish_yes_no_vals', $dao->getDicValues("epoetin_rekormon_trfinish_yes_no_id"));
	$smarty->assign('epoetin_rekormon_trfinish_cause_vals', $dao->getDicValues("epoetin_rekormon_trfinish_cause_id"));
	$smarty->assign('epoetin_other_trfinish_yes_no_vals', $dao->getDicValues("epoetin_other_trfinish_yes_no_id"));
	$smarty->assign('epoetin_other_trfinish_cause_vals', $dao->getDicValues("epoetin_other_trfinish_cause_id"));
	$smarty->assign('ferrum_yes_no_vals', $dao->getDicValues("ferrum_yes_no_id"));
	$smarty->assign('notepoetin_yes_no_vals', $dao->getDicValues("notepoetin_yes_no_id"));
	$smarty->assign('notepoetin_drug1_trfinish_yes_no_vals', $dao->getDicValues("notepoetin_drug1_trfinish_yes_no_id"));
	$smarty->assign('notepoetin_drug1_trfinish_cause_vals', $dao->getDicValues("notepoetin_drug1_trfinish_cause_id"));
	$smarty->assign('notepoetin_drug2_trfinish_yes_no_vals', $dao->getDicValues("notepoetin_drug2_trfinish_yes_no_id"));
	$smarty->assign('notepoetin_drug2_trfinish_cause_vals', $dao->getDicValues("notepoetin_drug2_trfinish_cause_id"));
	$smarty->assign('notepoetin_drug3_trfinish_yes_no_vals', $dao->getDicValues("notepoetin_drug3_trfinish_yes_no_id"));
	$smarty->assign('notepoetin_drug3_trfinish_cause_vals', $dao->getDicValues("notepoetin_drug3_trfinish_cause_id"));
}

function russianDateToMysqlDate($param){
	$date = str_replace('/', '-', $param);
	return date('Y-m-d', strtotime($date));
}
