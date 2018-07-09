<?php 
session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;
use \idh\Page;
use \idh\PageAdmin;
use \idh\Model\User;
use \idh\Model\Documentos;

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$page = new Page();
    
    $page->setTpl("index");

});

$app->get('/admin', function() {
    
    User::verifyLogin();
    
	$page = new PageAdmin();
    
    $page->setTpl("index");

});

$app->get('/admin/login', function() {
    
	$page = new PageAdmin([
        "header"=>false,
        "footer"=>false
    ]);
    
    $page->setTpl("login");

});

$app->post('/admin/login', function() {
    
    User::login($_POST["login"], $_POST["password"]);
    
    header("Location: /admin");
    exit;
});

$app->get('/admin/logout', function() {
    
    User::Logout();
    
    header("Location: admin/login");
    exit;
});




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
    
    $documentos->setData($_POST);
    
    $documentos->save();
    
	header("Location: /admin/documentos");

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


$app->run();

 ?>