<h2><?php echo $title; ?></h2>
<form id='attendance_search' name='attendance_search' action='<?=site_url("attendance/search/$kStudent");?>' method='get'>
<p><label for='startDate'>Fecha inicial: </label><input type='date' id='startDate' name='startDate' value='<?php echo date("Y-m-j");?>'/></p>
<p><label for='startDate'>Fecha final: </label><input type='date' id='endDate' name='endDate' value=''/></p>
<p><label for='attendType'>Tipo (opcional):</label>
<?=form_dropdown("attendType",$attendTypes, NULL, "id='attendType'");?>
</p>
<p>
<label for='attendSubtype'>Subtipo (opcional):</label>
<?=form_dropdown("attendSubtype",$attendSubtypes, NULL, "id='attendSubtype'");?>
</p>
<p>
<input type="submit" value="Buscar" class="button"/>
</p>
</form>