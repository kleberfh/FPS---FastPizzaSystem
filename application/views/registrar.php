<html>
	<?php
		if (isset($this->session->userdata['logado'])) {
			header("location: http://localhost/index.php/usuario/logar_usuario");
		}
	?>
	<head>
		<title>Cadastrar</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div id="main">
			<div id="login">
				<h2>Cadastrar</h2>
				<hr/>
				<?php
				echo "<div class='error_msg'>";
				echo validation_errors();
				echo "</div>";
				echo form_open('usuario/registrar_usuario');

				echo form_label('Nome: ');
				echo"<br/>";
				echo form_input('nome');
				echo "<div class='error_msg'>";
				if (isset($message_display)) {
					echo $message_display;
				}
				echo "</div>";
				echo"<br/>";
				echo form_label('Email : ');
				echo"<br/>";
				$data = array(
					'type' => 'email',
					'name' => 'email_value'
				);
				echo form_input($data);
				echo"<br/>";
				echo"<br/>";
				echo form_label('Senha : ');
				echo"<br/>";
				echo form_password('senha');
				echo"<br/>";
				echo"<br/>";
				echo form_submit('submit', 'Cadastrar');
				echo form_close();
				?>
				<a href="<?php echo base_url() ?> ">Clique aqui para logar-se</a>
			</div>
		</div>
	</body>
</html>
