<?php
	require_once("functions.php");
	
	switch ($_POST['c']) {
		case 'userCreate':
			echo json_encode(userCreate());
			break;

		case 'userConfirm':
			userConfirm();
			break;
			
		case 'userSignIn':
			echo json_encode(userSignIn());
			break;
			
		case 'userSignOut':
			echo json_encode(userSignOut());
			break;
			
		case 'getLastAccesses':
			echo json_encode(sess_getLastAccesses());
			break;

		case 'sendContact':
			echo json_encode(contactMe());
			break;
			
		default:
			break;
	}
?>