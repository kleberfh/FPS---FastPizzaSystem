<html>
	<?php
	if (isset($this->session->userdata['logado'])) {
		header("location: http://localhost/index.php/usuario/logar_usuario");
	}
	?>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Logar</title>
        <!-- base:css -->
        <link rel="stylesheet" href="/assets/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="/assets/vendors/base/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="/assets/css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="/assets/images/favicon.png" />
    </head>
<!--	<body>-->
<!--	--><?php
//		if (isset($logout_message)) {
//			echo "<div class='message'>";
//			echo $logout_message;
//			echo "</div>";
//		}
//	?>
<!--	--><?php
//		if (isset($message_display)) {
//			echo "<div class='message'>";
//			echo $message_display;
//			echo "</div>";
//		}
//	?>
<!--	<div id="main">-->
<!--	<div id="login">-->
<!--	<h2>Login Form</h2>-->
<!--	<hr/>-->
<!--	--><?php //echo form_open('usuario/logar_usuario'); ?>
<!--	--><?php
//		echo "<div class='error_msg'>";
//		if (isset($error_message)) {
//			echo $error_message;
//		}
//		echo validation_errors();
//		echo "</div>";
//	?>
<!--	<label>Nome :</label>-->
<!--	<input type="text" name="nome" id="nome" placeholder="nome"/><br /><br />-->
<!--	<label>Senha :</label>-->
<!--	<input type="password" name="senha" id="senha" placeholder="**********"/><br/><br />-->
<!--	<input type="submit" value=" Logar " name="submit"/><br />-->
<!--	<a href="--><?php //echo base_url() ?><!--index.php/usuario/cadastrar">Clique aqui para se cadastrar</a>-->
<!--	--><?php //echo form_close(); ?>
<!--	</div>-->
<!--	</div>-->
<!--	</body>-->
    <body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <img src="/assets/images/logo.svg" alt="logo">
                            <h4>Bem vindo!</h4>
                            <h6 class="font-weight-light">Entre com sua conta para comerçarmos!</h6>
                            <?php echo form_open('usuario/logar_usuario'); ?>
                            <div class="form-group">
                                <label for="InputEmail">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                      <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-account-outline text-warning"></i>
                                      </span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg border-left-0" id="InputEmail" name="nome" placeholder="exemplo@email.com">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputPassword">Senha</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                      <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-lock-outline text-warning"></i>
                                      </span>
                                    </div>
                                    <input type="password" name="senha" class="form-control form-control-lg border-left-0" id="InputPassword" placeholder="********">
                                </div>
                            </div>
                            <div class="my-3">
                                <button type="submit" class="btn btn-block btn-outline-warning btn-lg font-weight-medium auth-form-btn">ENTRAR</button>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                <a href="<?php echo base_url() ?>index.php/usuario/cadastrar" style="color: #f08400">Cadastrar-se</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 login-half-bg d-flex flex-row">
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end">O Sistema tão bom quanto suas pizzas!</p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="/assets/vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="/assets/js/template.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
    </body>
</html>
