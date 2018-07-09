<?php if(!class_exists('Rain\Tpl')){exit;}?>  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cadastrar Documento</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Início</a></li>
              <li class="breadcrumb-item active">Cadastrar Documento</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
 <!-- general form elements disabled -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Informações do documento</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form class="form-horizontal" role="form" action="/admin/documentos/cadastrar" method="post" enctype="multipart/form-data">
                  <!-- text input -->
                  <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite o nome da cidade" value="<?php echo htmlspecialchars( $documentos["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="periodo">Período</label>
                    <input type="date" class="form-control" id="periodo" name="periodo" value="<?php echo htmlspecialchars( $documentos["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="tipo">Tipo de Execução</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Informe o tipo de execução" value="<?php echo htmlspecialchars( $documentos["tipo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="setor">Setor</label>
                    <input type="text" class="form-control" id="setor" name="setor" placeholder="Informe o setor" value="<?php echo htmlspecialchars( $documentos["setor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="file">Arquivo</label>
                    <input type="file" class="form-control-file" id="file" name="file" value="<?php echo htmlspecialchars( $documentos["arquivo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  </div>
                  
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
              
             </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    
    
    
    
    


