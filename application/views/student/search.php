<?php #student_search.inc$saved_grades = array();if($refine && get_cookie("grades") ){	$saved_grades = explode(",",get_cookie("grades"));}$lower_school = implode("\r", create_grade_checklist(0, 4,"grades", $saved_grades));$middle_school = implode("\r", create_grade_checklist(5,8,"grades", $saved_grades));$needs_checked = "";if($refine && get_cookie("hasNeeds")){	$needs_checked = "checked";}$former_students_checked = "";if($refine && get_cookie("includeFormerStudents")){	$former_students_checked = "checked";}$sorting = "last_first";if($refine && get_cookie("sorting")){	$sorting = get_cookie("sorting");}?><div id="advancedSearch">	<h2>Student Search</h2>	<h6>Search for groups of students by class &amp; year</h6>	<form id="searchForm"		action="<?=site_url("student/search");?>" method="get"		name="searchForm">		<fieldset>			<legend>Grades</legend>			<ul class="search">				<?=$lower_school;?>			</ul>			<ul class="search">				<?=$middle_school;?>			</ul>			<div id="stuGroup-menu">			<label for="stuGroup">Middle School Specialist Group:</label><? echo form_dropdown("stuGroup",array("0"=>"","A"=>"A","B"=>"B"),$refine?get_cookie("stuGroup"):"");?></div><div id="kTeach-menu"><label for="kTeach">Classroom Teacher/Advisor</label><?php echo form_dropdown("kTeach",$teachers,$refine?get_cookie("kTeach"):"");?></div ><div id="humanitiesTeacher-menu"><label for="humanitiesTeacher">Humanities Teacher</label><?php echo form_dropdown("humanitiesTeacher",$humanitiesTeachers,$refine?get_cookie("humanitiesTeacher"):"");?></div>		</fieldset>		<fieldset class='advanced'>			<legend>Advanced</legend>			<div class='advanced'>				<input type="checkbox" name="hasNeeds" id="hasNeeds" value="1" <?=$needs_checked;?> />                                 <label for="hasNeeds">Only Show Students with Learning Support</label>                                <br/>				<input type="checkbox" name="includeFormerStudents" id="includeFormerStudents" value="1" <?=$former_students_checked;?> />                                 <label for="includeFormerStudents">Include Former Students</label>				<br/>								</div>		</fieldset>		<fieldset>			<legend>Sorting</legend>			<label for="sorting">Sorting Order: </label>			<?=form_dropdown("sorting",$student_sort,$sorting,"id='sorting'");?>		</fieldset>		<p id="yearSearch">			School Year<br />			<?=form_dropdown('year', $yearList, $currentYear,"id='year' class='year'"); ?>			- <input type="text" id='yearEnd' name="yearEnd" size="5"				maxlength="4" readonly value="<?=$currentYear + 1?>" />		</p>		<p style="text-align: center;">			<input type="submit" class="button" value="Search" />		</p>	</form></div>