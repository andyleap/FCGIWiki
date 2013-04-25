<?php
include 'Framework/Framework.php';

$framework = new Framework(array('DBConnections' => array('development' => 'mysql://root:root@localhost/test')));

$framework->Router->AddRoute('/user/:action', array('controller' => 'User', 'action' => 'index'));

$framework->Router->AddRoute('/:slug/:action', array('controller' => 'Wiki'));
$framework->Router->AddRoute('/:slug', array('controller' => 'Wiki', 'action' => 'view', 'slug' => 'index'));


$server = new FCGI_Server();
while ($req = $server->Accept()) {
	$framework->Router->Route($req);
}