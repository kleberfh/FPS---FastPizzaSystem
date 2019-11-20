<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<?php
	if (isset($this->session->userdata['logado'])) {
		header("location: http://localhost/index.php/usuario/logar_usuario");
	} else {
		header("location: http://localhost/index.php/usuario/logar");
	}
?>
