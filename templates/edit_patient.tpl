<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="jquery-ui.min.css">
<title>{$title}</title>
{include file="js_include.tpl"}
<script type="text/javascript">
/*
$(function() {
   
    var availableDoctorTags = [
                               {$doctorNames}
                         ];
    $( "#doctor" ).autocomplete({
        source: availableDoctorTags
      });
    var availableHospitalTags = [
                               {$hospitalNames}
                         ];
    $( "#hospital" ).autocomplete({
        source: availableHospitalTags
      });
    
  });
  */
  </script>
</head>
<body>


<div id="wrap">{include file="header.tpl"}



<div id="content">
<div id="wrap">{include file="panel.tpl"}
<div class="center_title">Пациент</div>

<form method="post" action="edit.php" onsubmit="return checkform(this)">
<input type="hidden" name="do" value="save" /> <input type="hidden"
	name="entity" value="{$entity}" />

<table class="form">
	{if $edit}
	<tr>
		<td><input type="submit" value="Сохранить"
			style="width: 120px; height: 20px"></td>
		<td class="req_input">Обязательные поля выделены этим цветом, <br />
		без их заполнения данные не сохранятся!</td>
	</tr>
	{else}
	<tr>
		<td><a href="edit.php?entity={$entity}&id={$object->id}&do=edit"> <img
			width="20" height="20" alt="Править" src="images/edit.jpg" /></a></td>
		<td></td>
	</tr>
	{/if}
	<tr style="display: none;">
		<td>ID записи</td>
		<td>{if $object->id} {$object->id} {else}
		<div style="background-color: #d14836">Новый</div>
		{/if}</td>
		<input type="hidden" name="investigation_id" value="1" />
		<input type="hidden" name="id" value="{$object->id}" />
	</tr>
	<tr>
		<td>Номер пациента</td>
		<td><input {$class_req_input} type="text"
			{$readonly} name="patient_number" size="50"
			value="{$object->patient_number}" /></td>
	</tr>
	<tr>
		<td>Медицинский центр</td>
		<td><select {$class_req_input} {$disabled} name="hospital_id">
			<option></option>
			{foreach $hospital_vals as $item}
			<option {if $item->id == $object->hospital_id} selected="selected"
			{/if} value="{$item->id}">{$item->value}</option>
			{/foreach}
		</select></td>
	</tr>
	<tr>
		<td>Пол</td>
		<td><select {$class_req_input} {$disabled} name="sex_id">
			<option></option>
			{foreach $sex_vals as $item}
			<option {if $item->id == $object->sex_id} selected="selected" {/if}
			value="{$item->id}">{$item->value}</option>
			{/foreach}
		</select></td>
	</tr>
	<tr>
		<td>Дата рождения (дд/мм/гггг)</td>
		<td><input {$class_req_input} type="text"
			{$readonly} name="date_birth" id="date_birth" size="50"
			value="{if $object->date_birth}{date('d/m/Y',strtotime($object->date_birth))}{/if}"
			onblur="IsObjDate(this);" onkeyup="TempDt(event,this);" /></td>
	</tr>
	<tr>
		<td>Место жительства</td>
		<td><select {$class_req_input} {$disabled} name="place_living_id">
			<option></option>
			{foreach $place_living_vals as $item}
			<option {if $item->id == $object->place_living_id}
			selected="selected" {/if} value="{$item->id}">{$item->value}</option>
			{/foreach}
		</select></td>
	</tr>
	<tr>
		<td>Социальный статус</td>
		<td><select {$class_req_input} {$disabled} name="social_status_id">
			<option></option>
			{foreach $social_status_vals as $item}
			<option {if $item->id == $object->social_status_id}
			selected="selected" {/if} value="{$item->id}">{$item->value}</option>
			{/foreach}
		</select></td>
	</tr>
	<tr>
		<td>ФИО врача</td>
		<td><input id="doctor" {$class_req_input} type="text"
			{$readonly} name="doctor" size="50" value="{$object->doctor}" /></td>
	</tr>
	<tr>
		<td>Локализация опухоли</td>
		<td><select
			{$class_req_input} {$disabled} name="diag_cancer_localization_id">
			<option></option>
			{foreach $diag_cancer_localization_vals as $item}
			<option {if $item->id == $object->diag_cancer_localization_id}
			selected="selected" {/if} value="{$item->id}">{$item->value}</option>
			{/foreach}
		</select></td>
	</tr>
	<tr>
		<td>Дата постановки диагноза рак (дд/мм/гггг)</td>
		<td><input {$class_req_input} type="text"
			{$readonly} name="diag_cancer_estab_date" id="diag_cancer_estab_date"
			size="50"
			value="{if $object->diag_cancer_estab_date}{date('d/m/Y',strtotime($object->diag_cancer_estab_date))}{/if}"
			onblur="IsObjDate(this);" onkeyup="TempDt(event,this);" /></td>
	</tr>

	<tr>
		<td>Гистологический тип опухоли</td>
		<td><input id="diag_cancer_histotype" {$class_req_input} type="text"
			{$readonly} name="diag_cancer_histotype" size="50"
			value="{$object->diag_cancer_histotype}" /></td>
	</tr>
	<tr>
		<td>Степень злокачественности</td>
		<td><select
			{$class_req_input} {$disabled} name="diag_cancer_degree_malignancy_id">
			<option></option>
			{foreach $diag_cancer_degree_malignancy_vals as $item}
			<option {if $item->id == $object->diag_cancer_degree_malignancy_id}
			selected="selected" {/if} value="{$item->id}">{$item->value}</option>
			{/foreach}
		</select></td>
	</tr>
	<tr>
	
	
	
		<td>Стадия заболевания по системе TNM </td>
		<td>
		
		<table><tr>
		
		<td>
	    T - <select
			{$class_req_input} {$disabled} name="diag_cancer_tnm_stage_t_id">
			<option></option>
			{foreach $diag_cancer_tnm_stage_t_vals as $item}
			<option {if $item->id == $object->diag_cancer_tnm_stage_t_id}
			selected="selected" {/if} value="{$item->id}">{$item->value}</option>
			{/foreach}
		</select>
	    </td>
	    <td>
	    N - <select
			{$class_req_input} {$disabled} name="diag_cancer_tnm_stage_n_id">
			<option></option>
			{foreach $diag_cancer_tnm_stage_n_vals as $item}
			<option {if $item->id == $object->diag_cancer_tnm_stage_n_id}
			selected="selected" {/if} value="{$item->id}">{$item->value}</option>
			{/foreach}
		</select></td>
		<td>
		M - <select
			{$class_req_input} {$disabled} name="diag_cancer_tnm_stage_m_id">
			<option></option>
			{foreach $diag_cancer_tnm_stage_m_vals as $item}
			<option {if $item->id == $object->diag_cancer_tnm_stage_m_id}
			selected="selected" {/if} value="{$item->id}">{$item->value}</option>
			{/foreach}
		</select></td>
	    </tr></table>
		</td>
	</tr>
	<tr>
		<td>Клиническая стадия заболевания</td>
		<td><select
			{$class_req_input} {$disabled} name="diag_cancer_clin_stage_id">
			<option></option>
			{foreach $diag_cancer_clin_stage_vals as $item}
			<option {if $item->id == $object->diag_cancer_clin_stage_id}
			selected="selected" {/if} value="{$item->id}">{$item->value}</option>
			{/foreach}
		</select></td>
	</tr>
	<tr>
		<td>ECOG статус</td>
		<td><select
			{$class_req_input} {$disabled} name="diag_cancer_ecog_status_id">
			<option></option>
			{foreach $diag_cancer_ecog_status_vals as $item}
			<option {if $item->id == $object->diag_cancer_ecog_status_id}
			selected="selected" {/if} value="{$item->id}">{$item->value}</option>
			{/foreach}
		</select></td>
	</tr>
	<tr>
		<td>Гемоглобин</td>
		<td><input {$class_req_input} type="text" {$readonly} name="lab_hb"
			id="lab_hb" size="10" value="{$object->lab_hb}" />Дата провед. <input {$class_req_input} type="text"
			{$readonly} name="lab_hb_date" id="lab_hb_date" size="10"
			value="{if $object->lab_hb_date}{date('d/m/Y',strtotime($object->lab_hb_date))}{/if}"
			onblur="IsObjDate(this);" onkeyup="TempDt(event,this);" /></td>
	</tr>
	<tr>
		<td>Эритроциты</td>
		<td><input {$class_req_input} type="text"
			{$readonly} name="lab_erythrocytes" id="lab_erythrocytes" size="10"
			value="{$object->lab_erythrocytes}" />Дата провед. <input {$class_req_input} type="text"
			{$readonly} name="lab_erythrocytes_date" id="lab_erythrocytes_date"
			size="10"
			value="{if $object->lab_erythrocytes_date}{date('d/m/Y',strtotime($object->lab_erythrocytes_date))}{/if}"
			onblur="IsObjDate(this);" onkeyup="TempDt(event,this);" /></td>
	</tr>
	{if $edit}
	<tr>
		<td><input type="submit" value="Сохранить"
			style="width: 120px; height: 20px"></td>
		<td><input type="reset" value="Сброс"
			style="width: 120px; height: 20px"></td>
	</tr>
	{else} {/if}

</table>

</form>

</div>

{include file="footer.tpl"}</div>

</body>
</html>
