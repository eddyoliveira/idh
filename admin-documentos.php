<?php

use \idh\PageAdmin;
use \idh\Model\User;
use \idh\Model\Documentos;



$app->get('/admin/documentos', function() {
    
    User::verifyLogin();
    
    $documentos = Documentos::listAll();
    
	$page = new PageAdmin();
    
    $page->setTpl("documentos", [
        "documentos"=>$documentos
    ]);

});

$app->get('/admin/documentos/cadastrar', function() {
    
    User::verifyLogin();
    
	$page = new PageAdmin();
    
    $page->setTpl("documentos-cadastrar");

});

$app->post('/admin/documentos/cadastrar', function() {
    
    User::verifyLogin();
    
    $documentos = new Documentos(); 
    
    $doc = '';
    
    if($_FILES["file"]["name"] !== ""){
      $doc = $documentos->setPhoto($_FILES['file']);
    } 
    
    
    $dados = array(
        'cidade' => $_POST['cidade'],
        'periodo' => $_POST['periodo'],
        'tipo' => $_POST['tipo'],
        'setor' => $_POST['setor'],
        'arquivo' => $doc,
    );
    
  
    
    $documentos->setData($dados);
    
    $documentos->save();
    
	header("Location: /admin/documentos");
    exit;

});









$app->get('/admin/documentos/:id', function($id) {
    
    User::verifyLogin();
    
    $documentos = new Documentos();
    
    $documentos->get((int)$id);
    
    $page = new PageAdmin();
    
    $page->setTpl("documentos-atualizar", [
        'documentos'=>$documentos->getValues()
    ]);
    


});








$app->post('/admin/documentos/:id', function($id) {
    
    User::verifyLogin();
    
/*     $dados = array(
        'cidade' => $_POST['cidade'],
        'periodo' => $_POST['periodo'],
        'tipo' => $_POST['tipo'],
        'setor' => $_POST['setor'],
        'arquivo' => $_FILES['file']['name'],
    );*/
    
    $documentos = new Documentos();
    
    $documentos->get((int)$id);
    
    $documentos->setData($_POST);
    
    $documentos->save();
    
	$documentos->setPhoto($_FILES["file"]);
    
    header('Location: /admin/documentos');
    exit;

});

$app->get('/admin/documentos/:id/delete', function($id) {
    
    User::verifyLogin();
    
    $documentos = new Documentos();
    
    $documentos->get((int)$id);
    
    $documentos->delete();
      
    
    header('Location: /admin/documentos');
    exit;
    

});





?>