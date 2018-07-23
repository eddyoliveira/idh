<?php 


session_start();

require_once("vendor/autoload.php");



use \Slim\Slim;



/*$app = new \Slim\Slim();*/

$app = new \Slim\App();


// Create and configure Slim app
$config = ['settings' => [
    'addContentLengthHeader' => false,
]];
$app = new \Slim\App($config);



require_once("site.php");
require_once("admin.php");
require_once("admin-documentos.php");












/*
$app->get('/admin/documentos/:id/delete', function($id) {
    
    User::verifyLogin();
    
    $documentos = new Documentos();
    
    $documentos->get((int)$id);
    
    $documentos->delete();
    
    header('Location: /admin/documentos');
    exit;
    
    
    


});
*/






$app->run();

 ?>