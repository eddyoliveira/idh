<?php


use \idh\PageAdmin;
use \idh\Model\User;


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


?>