<?php #login.inc
		foreach($errors as $msg){
			$error_text =  " -$msg<br/>\n";
		}
	}else{
		$error_text =  "$errors";
	}