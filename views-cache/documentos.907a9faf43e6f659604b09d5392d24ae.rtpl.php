<?php if(!class_exists('Rain\Tpl')){exit;}?> <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Documentos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Início</a></li>
              <li class="breadcrumb-item active">Documentos</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


<!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-12">
<div class="card">
            <div class="card-header">
                <div class="box-header">
                  <a href="/admin/documentos/cadastrar" class="btn btn-success">Cadastrar Documento</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Cidade</th>
                  <th>Período</th>
                  <th>Tipo de Execução</th>
                  <th>Setor</th>
                  <th>Arquivo</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php $counter1=-1;  if( isset($documentos) && ( is_array($documentos) || $documentos instanceof Traversable ) && sizeof($documentos) ) foreach( $documentos as $key1 => $value1 ){ $counter1++; ?>

                  <tr>
                    <td><?php echo htmlspecialchars( $value1["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["tipo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["setor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><a href="/res/site/upload/<?php echo htmlspecialchars( $value1["arquivo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" target="_blank" class="btn btn-primary btn-xs">
                        <!--<?php echo htmlspecialchars( $value1["arquivo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-->Baixar PDF</a></td>
                    <td>
                      <a href="/admin/documentos/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                      
                      <a href="/admin/documentos/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                    </td>
                  </tr>
                  <?php } ?>           
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

