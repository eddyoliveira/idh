<?php


use \idh\Page;

$app->get('/', function() {
    
	$page = new Page();
    
    $page->setTpl("index");

});





?>