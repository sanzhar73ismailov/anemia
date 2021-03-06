<?php
$arrTher = array(
"id",
"patient_id",
"visit_id",
"chmt_karboplatin_id",
"chmt_cisplatin_id",
"chmt_ciklofosfan_id",
"chmt_paklitaksel_id",
"chmt_doksorubicin_id",
"chmt_topotekan_id",
"chmt_gemcitabin_id",
"chmt_vinorelbin_id",
"chmt_irinotekan_id",
"chmt_jetopozid_id",
"chmt_jepirubicin_id",
"chmt_docetaksel_id",
"chmt_oksaliplatin_id",
"chmt_trabektedin_id",
"chmt_other_id",
"chmt_other_descr",
"chmt_date_start",
"chmt_date_finish",
"diaganem_afterchmt_hb",
"diaganem_afterchmt_hb_date",
"diaganem_afterchmt_erythrocytes",
"diaganem_afterchmt_lab_erythrocytes_date",
"epoetin_yes_no_id",
"epoetin_eprex40k_dstart",
"epoetin_eprex40k_dfinish",
"epoetin_eprex40k_trfinish_yes_no_id",
"epoetin_eprex40k_trfinish_cause_id",
"epoetin_eprex2k5ML_dstart",
"epoetin_eprex2k5ML_dfinish",
"epoetin_eprex2k5ML_trfinish_yes_no_id",
"epoetin_eprex2k5ML_trfinish_cause_id",
"epoetin_rekormon_dstart",
"epoetin_rekormon_dfinish",
"epoetin_rekormon_trfinish_yes_no_id",
"epoetin_rekormon_trfinish_cause_id",
"epoetin_other_name",
"epoetin_other_dstart",
"epoetin_other_dfinish",
"epoetin_other_trfinish_yes_no_id",
"epoetin_other_trfinish_cause_id",
"ferrum_yes_no_id",
"ferrum_dstart",
"ferrum_dfinish",
"notepoetin_yes_no_id",
"notepoetin_drug1_name",
"notepoetin_drug1_dstart",
"notepoetin_drug1_dfinish",
"notepoetin_drug1_trfinish_yes_no_id",
"notepoetin_drug1_trfinish_cause_id",
"notepoetin_drug2_name",
"notepoetin_drug2_dstart",
"notepoetin_drug2_dfinish",
"notepoetin_drug2_trfinish_yes_no_id",
"notepoetin_drug2_trfinish_cause_id",
"notepoetin_drug3_name",
"notepoetin_drug3_dstart",
"notepoetin_drug3_dfinish",
"notepoetin_drug3_trfinish_yes_no_id",
"notepoetin_drug3_trfinish_cause_id",
"diaganem_after_correct_hb",
"diaganem_after_correct_hb_date",
"diaganem_after_correct_erythrocytes",
"diaganem_after_correct_lab_erythrocytes_date",
"user",
"insert_date"
);

$arr_pat = array(
"id",
"patient_number",
"hospital_id",
"investigation_id",
"sex_id",
"date_birth",
"place_living_id",
"social_status_id",
"doctor",
"diag_cancer_localization_id",
"diag_cancer_estab_date",
"diag_cancer_histotype",
"diag_cancer_degree_malignancy_id",
"diag_cancer_tnm_stage_t_id",
"diag_cancer_tnm_stage_n_id",
"diag_cancer_tnm_stage_m_id",
"diag_cancer_clin_stage_id",
"diag_cancer_ecog_status_id",
"lab_hb",
"lab_hb_date",
"lab_erythrocytes",
"lab_erythrocytes_date",
"user",
"insert_date"
);

$arr_ther_kv = array(
'patient_id'=>'Пациент',
'visit_id'=>'Номер визита',
'chmt_karboplatin_id'=>'Химиотерапия: Карбоплатин (да, нет)',
'chmt_cisplatin_id'=>'Химиотерапия: Цисплатин (да, нет)',
'chmt_ciklofosfan_id'=>'Химиотерапия: Циклофосфан (да, нет)',
'chmt_paklitaksel_id'=>'Химиотерапия: Паклитаксел (да, нет)',
'chmt_doksorubicin_id'=>'Химиотерапия: Доксорубицин (да, нет)',
'chmt_topotekan_id'=>'Химиотерапия: Топотекан (да, нет)',
'chmt_gemcitabin_id'=>'Химиотерапия: Гемцитабин (да, нет)',
'chmt_vinorelbin_id'=>'Химиотерапия: Винорельбин (да, нет)',
'chmt_irinotekan_id'=>'Химиотерапия: Иринотекан (да, нет)',
'chmt_jetopozid_id'=>'Химиотерапия: Этопозид (да, нет)',
'chmt_jepirubicin_id'=>'Химиотерапия: Эпирубицин (да, нет)',
'chmt_docetaksel_id'=>'Химиотерапия: Доцетаксел (да, нет)',
'chmt_oksaliplatin_id'=>'Химиотерапия: Оксалиплатин (да, нет)',
'chmt_trabektedin_id'=>'Химиотерапия: Трабектедин (да, нет)',
'chmt_other_id'=>'Химиотерапия: Другое (да, нет)',
'chmt_other_descr'=>'Химиотерапия: Другое (описание)',
'chmt_date_start'=>'Химиотерапия: Дата начала лечения',
'chmt_date_finish'=>'Химиотерапия: Дата окончания лечения',
'diaganem_afterchmt_hb'=>'Лабораторные исследования после химиотерапии: Гемоглобин',
'diaganem_afterchmt_hb_date'=>'Лабораторные исследования после химиотерапии: Дата проведения гемоглобина',
'diaganem_afterchmt_erythrocytes'=>'Лабораторные исследования после химиотерапии: Эритроциты',
'diaganem_afterchmt_lab_erythrocytes_date'=>'Лабораторные исследования после химиотерапии: Дата проведения Эритроциты',
'epoetin_yes_no_id'=>'Эпоэтины: да, нет',
'epoetin_eprex40k_dstart'=>'Эпоэтины: Эпрекс 40K (дата начала)',
'epoetin_eprex40k_dfinish'=>'Эпоэтины: Эпрекс 40K (дата завершения)',
'epoetin_eprex40k_trfinish_yes_no_id'=>'Эпоэтины: Эпрекс 40K  лечение прекращено (да, нет)',
'epoetin_eprex40k_trfinish_cause_id'=>'Эпоэтины: Эпрекс 40K лечение - причина прекращения',
'epoetin_eprex2k5ML_dstart'=>'Эпоэтины: Эпрекс 2K 5ML (дата начала)',
'epoetin_eprex2k5ML_dfinish'=>'Эпоэтины: Эпрекс 2K 5ML (дата завершения)',
'epoetin_eprex2k5ML_trfinish_yes_no_id'=>'Эпоэтины: Эпрекс 2K 5ML  лечение прекращено (да, нет)',
'epoetin_eprex2k5ML_trfinish_cause_id'=>'Эпоэтины: Эпрекс 2K 5ML  лечение - причина прекращения',
'epoetin_rekormon_dstart'=>'Эпоэтины: Рекормон 2000IU (дата начала)',
'epoetin_rekormon_dfinish'=>'Эпоэтины: Рекормон 2000IU (дата завершения)',
'epoetin_rekormon_trfinish_yes_no_id'=>'Эпоэтины: Рекормон 2000IU  лечение прекращено (да, нет)',
'epoetin_rekormon_trfinish_cause_id'=>'Эпоэтины: Рекормон 2000IU  лечение - причина прекращения',
'epoetin_other_name'=>'Эпоэтины: Другой препарат наименование',
'epoetin_other_dstart'=>'Эпоэтины: Другой препарат (дата начала)',
'epoetin_other_dfinish'=>'Эпоэтины: Другой препарат (дата завершения)',
'epoetin_other_trfinish_yes_no_id'=>'Эпоэтины: Другой препарат  лечение прекращено (да, нет)',
'epoetin_other_trfinish_cause_id'=>'Эпоэтины: Другой препарат  лечение - причина прекращения',
'ferrum_yes_no_id'=>'Терапия препаратами железа: да, нет',
'ferrum_dstart'=>'Терапия препаратами железа: дата начала',
'ferrum_dfinish'=>'Терапия препаратами железа: дата завершения',
'notepoetin_yes_no_id'=>'Не эпоэтины: да, нет',
'notepoetin_drug1_name'=>'Не эпоэтины: Препарат 1 - наименование',
'notepoetin_drug1_dstart'=>'Не эпоэтины: Препарат 1 (дата начала)',
'notepoetin_drug1_dfinish'=>'Не эпоэтины: Препарат 1 (дата завершения)',
'notepoetin_drug1_trfinish_yes_no_id'=>'Не эпоэтины: Препарат 1 лечение прекращено (да, нет)',
'notepoetin_drug1_trfinish_cause_id'=>'Не эпоэтины: Препарат 1 лечение - причина прекращения',
'notepoetin_drug2_name'=>'Не эпоэтины: Препарат 2 - наименование',
'notepoetin_drug2_dstart'=>'Не эпоэтины: Препарат 2 (дата начала)',
'notepoetin_drug2_dfinish'=>'Не эпоэтины: Препарат 2 (дата завершения)',
'notepoetin_drug2_trfinish_yes_no_id'=>'Не эпоэтины: Препарат 2 лечение прекращено (да, нет)',
'notepoetin_drug2_trfinish_cause_id'=>'Не эпоэтины: Препарат 2 лечение - причина прекращения',
'notepoetin_drug3_name'=>'Не эпоэтины: Препарат 2 - наименование',
'notepoetin_drug3_dstart'=>'Не эпоэтины: Препарат 2 (дата начала)',
'notepoetin_drug3_dfinish'=>'Не эпоэтины: Препарат 2 (дата завершения)',
'notepoetin_drug3_trfinish_yes_no_id'=>'Не эпоэтины: Препарат 2 лечение прекращено (да, нет)',
'notepoetin_drug3_trfinish_cause_id'=>'Не эпоэтины: Препарат 2 лечение - причина прекращения',
'diaganem_after_correct_hb'=>'Лабораторные исследования после коррекции: Гемоглобин',
'diaganem_after_correct_hb_date'=>'Лабораторные исследования после коррекции: Дата проведения гемоглобина',
'diaganem_after_correct_erythrocytes'=>'Лабораторные исследования после коррекции: Эритроциты',
'diaganem_after_correct_lab_erythrocytes_date'=>'Лабораторные исследования после коррекции: Дата проведения Эритроциты'
); 

?>