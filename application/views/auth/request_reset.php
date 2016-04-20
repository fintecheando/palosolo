<?php #login.inc ?>

<div class="login">
<div class="login-title">Recuperar Clave</div>
<form action="<?=site_url("auth/send_reset"); ?>" method="post" name="login_form" id="login_form">
<? if($errors):
	if(is_array($errors)){
		foreach($errors as $msg){
                    $output=" -$msg <br/> \n";
		}
	}else{
		$output ="$errors";
	}
?>
<div class="error-text"><? print $output; ?></div>
<? endif; ?>

<div class='login-inputs'>
<p><label for="email">Escribe tu dirección de correo a donde enviaremos la nueva Clave</label><br />
<input type="email" name="email" id="email" required placeholder="tu_email@palosolo.org" class="login-text" /></p>
<p><input type="submit" name="submit" class="button" value="Enviar" /></p>
</div>
</form>
</div>