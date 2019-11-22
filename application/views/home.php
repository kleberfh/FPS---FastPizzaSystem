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
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-sm-6 mb-4 mb-xl-0">
                        <div class="d-lg-flex align-items-center">
                            <div>
                                <h3 class="text-dark font-weight-bold mb-2">Olá <?php echo($_SESSION['logado']['nome'])?></h3>
                                <h4 class="font-weight-normal mb-2">Esses são os resumos de hoje:</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center justify-content-md-end">
                            <div class="pr-1 mb-3 mb-xl-0">
                                <button type="button" class="btn btn-outline-inverse-info btn-icon-text">
                                    Registrar Pedido
                                    <i class="mdi mdi-message-outline btn-icon-append"></i>
                                </button>
                            </div>
                            <div class="pr-1 mb-3 mb-xl-0">
                                <button type="button" class="btn btn-outline-inverse-info btn-icon-text">
                                    Registrar Cliente
                                    <i class="mdi mdi-help-circle-outline btn-icon-append"></i>
                                </button>
                            </div>
                            <div class="pr-1 mb-3 mb-xl-0">
                                <button type="button" class="btn btn-outline-inverse-info btn-icon-text">
                                    Print
                                    <i class="mdi mdi-printer btn-icon-append"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h2 class="text-danger font-weight-bold">839</h2>
                                    <i class="mdi mdi-file-document-outline mdi-18px text-dark"></i>
                                </div>
                            </div>
                            <canvas id="allProducts"></canvas>
                            <div class="line-chart-row-title">Pedidos</div>
                        </div>
                    </div>
                    <div class="col-lg-2 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h2 class="text-info font-weight-bold">244</h2>
                                    <i class="mdi mdi-account-multiple-outline mdi-18px text-dark"></i>
                                </div>
                            </div>
                            <canvas id="invoices"></canvas>
                            <div class="line-chart-row-title">Clientes</div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex grid-margin stretch-card">
                        <div class="card sale-visit-statistics-border">
                            <div class="card-body">
                                <h2 class="text-dark mb-2 font-weight-bold">R$3479</h2>
                                <h4 class="card-title mb-2">Vendas do dia</h4>
                                <small class="text-muted">22 DE NOVEMBRO 2019</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex grid-margin stretch-card">
                        <div class="card sale-diffrence-border">
                            <div class="card-body">
                                <h2 class="text-dark mb-2 font-weight-bold">R$6475</h2>
                                <h4 class="card-title mb-2">Vendas do mês</h4>
                                <small class="text-muted">NOVEMBRO 2019</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <h4 class="card-title">Clientes com mais pedidos</h4>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <ul class="graphl-legend-rectangle">
                                                    <li><span class="bg-danger"></span>Roberto</li>
                                                    <li><span class="bg-warning"></span>José</li>
                                                    <li><span class="bg-info"></span>Rosivaldo</li>
                                                    <li><span class="bg-success"></span>Carlos</li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-8 grid-margin">
                                                <canvas id="bestSellers"></canvas>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-4 mb-lg-0">Estes são seus clientes com mais pedidos.
                                        </p>
                                    </div>
                                    <div class="col-lg-5">
                                        <h4 class="card-title">Sabores mais pedidos</h4>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="progress progress-lg grouped mb-2">
                                                    <div class="progress-bar  bg-danger" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <ul class="graphl-legend-rectangle">
                                                    <li><span class="bg-danger"></span>Peperoni (15%)</li>
                                                    <li><span class="bg-warning"></span>Frango com catupiry (20%)</li>
                                                    <li><span class="bg-info"></span>Calabresa (25%)</li>
                                                    <li><span class="bg-success"></span>Bacon (40%)</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="mb-0 mt-2">Seus sabores que os clientes mais pedem!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3 mt-4 mb-lg-0">
                        <div class="card congratulation-bg text-center">
                            <div class="card-body pb-0">
                                <h2 class="mt-3 text-white mb-3 font-weight-bold">Seu Melhor cliente
                                    Johnson
                                </h2>
                                <p>Johnson tem 57 pedidos feitos no total.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="footer-wrap">
                    <div class="w-100 clearfix">
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Feito por Kleber, Victor e Cassio <i class="mdi mdi-heart-outline"></i></span>
                    </div>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
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