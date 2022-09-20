<?php require_once(dirname(__FILE__, 1) . '/templates/header.php'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pace</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pace</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
          </div>
        </div>
        <div class="card-body">
          <form action="/torcedores/atualizar-lista" method="post" enctype="multipart/form-data">
            <input type="file" name="xml-file">
            <input type="submit" value="Atualizar a lista">
          </form>
        <div class="card-footer">
          Footer
        </div>
      </div>
    </section>
  </div>

  <?php require_once(dirname(__FILE__, 1) . '/templates/footer.php'); ?>