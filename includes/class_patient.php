<?php

class Patient extends Entity{
	public $id;
	public $patient_number;
	public $hospital_id;
	public $investigation_id;
	public $sex_id;
	public $date_birth; // дата в формате гггг-мм-дд, как в MySQL
	public $place_living_id;
	public $social_status_id;
	public $doctor;
	public $diag_cancer_localization_id;
	public $diag_cancer_estab_date;
	public $diag_cancer_histotype;
	public $diag_cancer_degree_malignancy_id;
	public $diag_cancer_tnm_stage_t_id;
	public $diag_cancer_tnm_stage_n_id;
	public $diag_cancer_tnm_stage_m_id;
	public $diag_cancer_clin_stage_id;
	public $diag_cancer_ecog_status_id;
	public $lab_hb;
	public $lab_hb_date;
	public $lab_erythrocytes;
	public $lab_erythrocytes_date;
	public $user;
	public $insert_date;
	public $visits = array(1=>false, 2=>false, 3=>false ,4=>false, 5=>false); // массив визитов ключ - номер визита, значение - проводили (true) или нет (false) до этого
 
	public  function set_date_birth($date_birth){
		$this->date_birth = $date_birth;
		$this->date_birth_sql = parent::getSqlDateFromDate($date_birth);
		$this->date_birth_string=parent::getFormatStringFromDate($date_birth);
	}

	public  function get_date_birth(){
		return $this->date_birth;
	}

	public  function setDateFromSqlDate($input_val){
		$this->set_date_birth(parent::getDateFromSqlDate($input_val));
	}

	public  function setDateFromFormatDate($input_val){
		$this->set_date_birth(parent::getDateFromFormatDate($input_val));
	}

	public  function getYearDateFromRussianString($dateRus){
		if(strlen($dateRus) == 0){
			return "null";
		}
		$parts = explode('/', $dateRus);
		return  "'$parts[2]'";
	}
}
?>