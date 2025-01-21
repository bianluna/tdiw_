<?php

$accion = $_GET['accion']??NULL;
$filesAbsolutePath= '/home/TDIW/tdiw-g6/public_html/uploadedFiles/'; 
session_start();

if (!isset($_SESSION['user_id'])) {
	$_SESSION['user_id'] = 0;
}

switch( $accion ) {	
	case 'listar_categorias':
		include __DIR__.'/home.php';
		break;
	default:
		include __DIR__.'/home.php';
		break;
}

?>