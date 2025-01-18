<?php

$accion = $_GET['accion']??NULL;

session_start();

if (!isset($_SESSION['user_id'])) {
	$_SESSION['user_id'] = 0;
}

switch( $accion ) {	
	case 'listar_categorias':
		//include __DIR__.'/categoryPage.php';
		include __DIR__.'/home.php';
		break;
	case 'register':
		include __DIR__ .'/views/v_test.php';
		break;
	default:
		include __DIR__.'/home.php';
		break;
}

?>