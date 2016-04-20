<?php
$dbRole = $this->session->userdata ( "dbRole" );
$userID = $this->session->userdata ( "userID" );
// $gradeStart = $this->session->userdata("gradeStart");
$gradeStart = $this->input->cookie ( "gradeStart" );
// $gradeEnd = $this->session->userdata("gradeEnd");
$gradeEnd = $this->input->cookie ( "gradeEnd" );
// $isAdvisor = $this->session->userdata("isAdvisor");
$isAdvisor = $this->input->cookie ( "isAdvisor" );
$unread_reports = $this->input->cookie ( "unread_reports" ); // $this->session->userdata("unread_reports");
$count = "";
$count_text = "";
if ($unread_reports > 0) {
	$count = sprintf ( "<span class='unread'>%s</span>", $unread_reports );
	$plural = "";
	if ($unread_reports > 1) {
		$plural = "s";
	}
	$count_text = sprintf ( "(Tienes %s  reporte%s sin leer.)", $unread_reports, $plural );
}
$term = get_current_term ();
$year = get_current_year ();
$buttons [] = array (
		"selection" => "home",
		"text" => "Inicio",
		"href" => site_url () 
);
$buttons [] = array (
		"selection" => "search",
		"text" => '<input type="text" id="stuSearch" name="stuSearch" class="mobile" size="20" value="Buscar Estudiante" />',
		"type" => "pass-through" 
);
$buttons [] = array (
		"selection" => "attendance",
		"text" => "Revisar Asistencia",
		"class" => "search button dialog mobile",
		"href" => site_url ( "attendance/check?search=1" ) 
);
$buttons [] = array (
		"selection" => "attendance",
		"text" => "Buscar Asistencias",
		"class" => array (
				"button",
				"dialog" 
		),
		"href" => site_url ( "attendance/show_search" ),
		"title" => "Search attendance records",
		"dbRole" => 1 
);
$buttons [] = array (
		"selection" => "student",
		"text" => "Nuevo Estudiante",
		"class" => array (
				"button",
				"new",
				"dialog" 
		),
		"href" => site_url ( "student/create" ),
		"title" => "Agregar un nuevo Estudiante a la Base de Datos",
		"dbRole" => 1 
);
$buttons [] = array (
		"selection" => "teacher",
		"text" => "Listar Guias Montessori",
		"href" => site_url ( "teacher?gradeStart=0&gradeEnd=8" ),
		"title" => "List all the teachers &amp; other users in the database",
		"dbRole" => 1 
);
$buttons [] = array (
		"selection" => "narrative",
		"text" => "Buscar Records &amp; Actualizar",
		"href" => site_url ( "narrative/search" ),
		"title" => "Busqueda &amp; Actualización de Records",
		"dbRole"=>1,
);
$buttons [] = array (
		"selection" => "support",
		"text" => "Apoyo al Aprendizaje",
		"href" => site_url ( "student/search?hasNeeds=1&year=" . get_current_year () ),
		"dbRole" => 3 
);
$buttons [] = array (
		"selection" => "template",
		"text" => "Plantillas de Temas",
		"href" => site_url ( "template/list_templates/?kTeach=$userID&term=$term&year=$year" ),
		"dbRole" => 2 
);
$buttons [] = array (
		"selection" => "benchmark",
		"text" => "Evaluaciones",
		"class" => array (
				"button",
				"dialog" 
		),
		"href" => site_url ( "benchmark/search" ),
		"dbRole" => 3 
);
$buttons [] = array (
		"selection" => "narrative/teacher_list",
		"text" => "Records Actuales",
		"class" => array (
				"button",
				"dialog" 
		),
		"href" => site_url ( "narrative/search_teacher_narratives/$userID" ),
		"title" => "Muestra todos los Records Actuales",
		"dbRole" => 2 
);
$buttons [] = array (
		"selection" => "narrative/show_missing",
		"text" => "Records Pendientes",
		"class" => array (
				"button",
				"dialog" 
		),
		"href" => site_url ( "narrative/search_missing/$userID" ),
		"title" => "Muestra los Estudiantes que aun tienen Records pendientes",
		"dbRole" => 2 
);
if ($dbRole == 2) {
	if ($isAdvisor) {
		$buttons [] = array (
				"selection" => "report/get_list",
				"text" => sprintf ( "%ss%s", STUDENT_REPORT, $count ),
				"href" => site_url ( "report/get_list/advisor/$userID" ),
				"title" => sprintf ( "Mostrar los %ss %s", strtolower ( STUDENT_REPORT ), $count_text ) 
		);
	}
	if ($gradeEnd > 4) {
		$buttons [] = array (
				"selection" => "assignment",
				"text" => "Grados",
				"class" => array (
						"button",
						"dialog" 
				),
				"id" => "sa_$userID",
				"title" => "Buscar por graficas actuales de Grados",
				"href" => site_url ( "assignment/search/$userID" ) 
		);
	}
	
	$buttons [] = array (
			"selection" => "student",
			"text" => "Listar Estudiantes",
			"href" => site_url ( "student/search?kTeach=$userID&year=" . get_current_year () ) 
	);
}
print create_button_bar ( $buttons );

?>





