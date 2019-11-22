<!DOCTYPE html>
<html lang="en">
<?php
if (!isset($this->session->userdata['logado'])) {
    header("location: http://localhost");
}
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fast Pizza System</title>
    <!-- base:css -->
    <link rel="stylesheet" href="/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/assets/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/vendors/select2/select2.min.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/assets/images/favicon.png" />
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
        <nav class="navbar top-navbar col-lg-12 col-12 p-0">
            <div class="container-fluid">
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
                    <ul class="navbar-nav navbar-nav-left">
                        <li class="nav-item nav-search d-none d-lg-block ml-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="search">
                                    <i class="mdi mdi-magnify"></i>
                                  </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Buscar pedidos ou clientes" aria-label="search" aria-describedby="search">
                            </div>
                        </li>
                    </ul>
                    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                        <a class="brand-logo" href="<?php echo base_url() ?>"><img src="/assets/images/logo.svg" alt="logo"/></a>
                    </div>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                                <span class="nav-profile-name"><?php if(isset($_SESSION['logado'])) echo($_SESSION['logado']['nome']) ?></span>
                                <span class="online-status"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                                <?php
                                if ($_SESSION['logado']['email'] === 'admin@email.com') {
                                    echo('<a class="dropdown-item" href="'.base_url()."index.php/usuario/novo".'">
                                    <i class="mdi mdi-account-plus text-primary"></i>
                                    Novo usuario
                                    </a>');
                                }
                                ?>
                                <a class="dropdown-item" href="<?php echo base_url() ?>index.php/usuario/deslogar">
                                    <i class="mdi mdi-logout text-primary"></i>
                                    Sair
                                </a>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </div>
        </nav>
        <nav class="bottom-navbar">
            <div class="container">
                <ul class="nav page-navigation">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="mdi mdi-file-document menu-icon"></i>
                            <span class="menu-title">Pedidos</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="submenu">
                            <ul>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?>index.php/pedidos/novo">Novo Pedido</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?>index.php/pedidos">Visualizar Pedidos</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="mdi mdi-account-multiple menu-icon"></i>
                            <span class="menu-title">Clientes</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="submenu">
                            <ul>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?>index.php/clientes/novo">Registrar Cliente</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?>index.php/clientes">Visualizar Clientes</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="mdi mdi-food-fork-drink menu-icon"></i>
                            <span class="menu-title">Produtos</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="submenu">
                            <ul>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?>index.php/produtos/novo">Registrar Produto</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?>index.php/produtos">Ver Estoque</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Registrar Pedido</h4>
                    <?php echo form_open('pedidos/registrar_pedido'); ?>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Quantidade Sabores</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="tipo_pizza" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Selecionar sabores</label>
                            <select class="js-example-basic-multiple w-100" multiple="multiple" name="sabores[]">
                                <?php
                                    foreach ($sabores as $sabor) {
                                        echo ('<option value='.$sabor->nome.'>'.$sabor->nome.'</option>');
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Descrição</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Descrição" name="descricao" required>
                        </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Selecionar cliente</label>
                        <select class="form-control" id="exampleFormControlSelect2" name="cliente" required>
                            <?php
                                foreach ($clientes as $cliente) {
                                    echo('<option value='.$cliente->nome.'>'.$cliente->nome.'</option>');
                                }
                            ?>
                        </select>
                    </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Valor</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="valor" name="valor" required>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Cadastrar</button>
                        <a class="btn btn-light" href="<?php echo base_url() ?>index.php/pedidos">Cancelar</a>
                </div>
            </div>
        </div>
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
<script src="/assets/vendors/select2/select2.min.js"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<!-- End plugin js for this page -->
<script src="/assets/vendors/chart.js/Chart.min.js"></script>
<script src="/assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="/assets/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
<script src="/assets/vendors/justgage/raphael-2.1.4.min.js"></script>
<script src="/assets/vendors/justgage/justgage.js"></script>
<!-- Custom js for this page-->
<script src="/assets/js/dashboard.js"></script>
<!-- End custom js for this page-->
</body>
</html>