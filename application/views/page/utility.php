<?php

defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

$dbRole = $this->session->userdata ( "dbRole" );
$userID = $this->session->userdata ( "userID" );

$term = get_current_term ();
$year = get_current_year ();
$user_buttons [] = array (
		"selection" => "teacher",
		"class" => "link",
		"text" => "Perfil",
		"href" => site_url ( "teacher/view/$userID" ) 
);
$user_buttons [] = array (
		"selection" => "admin",
		"class" => "link",
		"text" => "Configuración",
		"href" => site_url ( "admin" ),
		"userID" => ROOT_USER 
);
$user_buttons [] = array (
		"selection" => "feedback",
		"text" => "Retroalimentación",
		"type" => "span",
		"class" => "link create_feedback" ,
		"dbRole"=> "not-superuser",
);
$user_buttons [] = array (
		"selection" => "config",
		"text" => "Propiedades",
		"title" => "Propiedades de fin de cursos, etc.",
		"href" => site_url ( "config" ),
		"class" => "link",
		"dbRole" => 1 
);
$user_buttons [] = array (
		"selection" => "auth",
		"class" => "link",
		"text" => "Salir",
		"href" => site_url ( "auth/logout" ),
		"title" => $this->session->userdata ( "username" ) 
);

print create_button_bar ( $user_buttons );