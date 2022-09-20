<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Torcedores | Novo</title>
        <link href="<?php dirname(__DIR__, 2); ?>/assets/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Alpine Plugins -->
        <script defer src="https://unpkg.com/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>
        
        <!-- Alpine Core -->
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="bg-secondary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Cadastrar torcedor</h3></div>
                                    <div class="card-body">
                                        <form action="/torcedores/salvar" method="POST">
                                            <div class="row mb-3">
                                                <div class="col-md-8">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input
                                                            class="form-control"
                                                            id="name"
                                                            name="nome"
                                                            type="text"
                                                            placeholder="Nome"
                                                            required
                                                        />
                                                        <label for="name">Nome</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-select" id="active" name="ativo">
                                                            <option value="0">Não</option>
                                                            <option value="1">Sim</option>
                                                        </select>
                                                        <label for="active">Ativo</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input
                                                            class="form-control"
                                                            id="email"
                                                            name="email"
                                                            type="email"
                                                            placeholder="Digite o email"
                                                        />
                                                        <label for="email">Email</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input
                                                            x-data
                                                            x-mask:dynamic="
                                                                $input.length <= 14
                                                                ? '(99) 9999-9999' : '(99) 9 9999-9999'"
                                                            class="form-control"
                                                            id="phone"
                                                            type="text"
                                                            name="telefone"
                                                            placeholder="Digite o telefone"
                                                            />
                                                        <label for="phone">Telefone</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input
                                                            x-data
                                                            x-mask:dynamic="
                                                                $input.length <= 14
                                                                ? '999.999.999-99' : '99.999.999/9999-99'"
                                                            class="form-control"
                                                            id="cpf"
                                                            type="text"
                                                            name="documento"
                                                            placeholder="Digite o CPF"
                                                            required
                                                            />
                                                        <label for="cpf">CPF/CNPJ</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input
                                                            class="form-control"
                                                            id="address"
                                                            type="text"
                                                            name="endereco"
                                                            placeholder="Digite o endereço"
                                                            required
                                                        />
                                                        <label for="address">Endereço</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input
                                                            class="form-control"
                                                            id="neighborhood"
                                                            type="text"
                                                            name="bairro"
                                                            placeholder="Digite o bairro"
                                                            required
                                                        />
                                                        <label for="neighborhood">Bairro</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input
                                                            class="form-control"
                                                            id="city"
                                                            type="text"
                                                            name="cidade"
                                                            placeholder="Digite o cidade"
                                                            required
                                                            />
                                                        <label for="city">Cidade</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input
                                                            x-data
                                                            x-mask="99999-999"
                                                            class="form-control"
                                                            id="cep"
                                                            type="text"
                                                            name="cep"
                                                            placeholder="Digite o cep"
                                                            required
                                                            />
                                                        <label for="cep">CEP</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input
                                                            class="form-control"
                                                            id="uf"
                                                            type="text"
                                                            name="uf"
                                                            placeholder="Digite o uf"
                                                            maxlength="2"
                                                            required
                                                            />
                                                        <label for="uf">UF</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save"></i>
                                                        Salvar
                                                    </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">
                                            <a href="/">
                                                <i class="fas fa-arrow-left"></i>
                                                Voltar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php dirname(__DIR__, 2); ?>assets/js/scripts.js"></script>
    </body>
</html>
