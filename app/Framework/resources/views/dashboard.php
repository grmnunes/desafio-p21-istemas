<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>All Blacks | Listagem dos torcedores</title>
        <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="assets/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand ps-3" href="index.html">All Blacks</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="/">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Torcedores
                            </a>
                            <a class="nav-link" href="/torcedores/novo">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                                Adicionar torcedor
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Você está logado como:</div>
                        <?php echo $_SESSION['user']['name']; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Torcedores</h1>
                        <?php if($_SESSION['message']) : ?>
                        <div class="alert alert-info" role="alert">
                            <?php echo $_SESSION['message']; ?>
                        </div>
                        <?php endif; ?>
                        <div class="card mb-4">
                            <div class="card-header d-flex d-flex justify-content-between">
                                <div>
                                    <i class="fas fa-table me-1"></i>
                                    Listagem dos torcedores
                                </div>
                                <div>
                                    Importar arquivo XML
                                    <form
                                        action="/torcedores/atualizar-lista"
                                        method="post"
                                        enctype="multipart/form-data"
                                        class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"
                                        >
                                        <div class="input-group">
                                            <input
                                                class="form-control"
                                                type="file"
                                                name="xml-file"
                                                />
                                            <button class="btn btn-success" id="btnNavbarSearch" type="submit"><i class="fas fa-file-excel"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="fans-table" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Endereço</th>
                                            <th>Cidade</th>
                                            <th>UF</th>
                                            <th>Telefone</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Endereço</th>
                                            <th>Cidade</th>
                                            <th>UF</th>
                                            <th>Telefone</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Opções</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($fans as $torcedor) : ?>
                                        <tr>
                                            <td><?php echo $torcedor->nome; ?></td>
                                            <td><?php echo $torcedor->endereco; ?></td>
                                            <td><?php echo $torcedor->cidade; ?></td>
                                            <td><?php echo $torcedor->uf; ?></td>
                                            <td><?php echo $torcedor->telefone; ?></td>
                                            <td><?php echo $torcedor->email; ?></td>
                                            <td>
                                                <?php echo boolval($torcedor->ativo) ? 'Ativo' : 'Inativo'; ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-outline-info" href="<?php echo "/torcedores/editar/?id={$torcedor->id}"; ?>">
                                                    <i class="fas fa-edit"></i>
                                                    Editar
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/datatables.js"></script>
    </body>
</html>
