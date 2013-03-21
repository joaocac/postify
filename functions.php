<?php
	set_include_path(get_include_path() . PATH_SEPARATOR . "./pear");
	session_start();
	if (!isset($_SESSION['auth'])) {
		$_SESSION['auth'] = array(
			"tries" => 0,
		);
	}

	require "config.php";

	$username = $mysql_config["username"];
	$password = $mysql_config["password"];
	$hostname = $mysql_config["hostname"];
	$port = $mysql_config["port"];
	$db = $mysql_config["name"];
	$link = mysqli_connect($hostname, $username, $password, $db, $port );
	if (!$link) {
    	die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
	}
	
	require 'Mail.php';
	require 'Mail/mime.php' ;

	
	$sql = "CREATE TABLE IF NOT EXISTS `users` (
  			`id` int(10) NOT NULL AUTO_INCREMENT,
  			`email` varchar(255) NOT NULL,
  			`pass` varchar(50) NOT NULL,
  			`hash` varchar(32) NOT NULL,
  			`confirmed` int(10) NOT NULL DEFAULT 0,
  			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
	mysqli_query($link, $sql); 

	$sql = "CREATE TABLE IF NOT EXISTS `access` (
  			`id` int(10) NOT NULL,
  			`date` datetime NOT NULL,
  			PRIMARY KEY (`id`,`date`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
	mysqli_query($link, $sql); 
	
	
	
	/**
	 * Creates a new user into the database if it doesn't exists
	 * @global string $_POST['user']
	 * @global string $_POST['pass']
	 * @return array 
	 */
	function userCreate() {
		global $link, $smtpinfo;
		
		$information = array(
			'status'	=> 'Failed',
			'code'		=> 'Error',
			'message'	=> 'Something bad happened, please try later.',
		);

		$email = mysqli_real_escape_string($link, $_POST['email']);
		$user_hash = md5(strtolower(trim($_POST['email'])));
		$password = mysqli_real_escape_string($link, $_POST['password']);
		$SQL = "SELECT count(`email`) AS records FROM `users` WHERE `email` = '$email'";
		try {
			$data = mysqli_fetch_assoc(mysqli_query($link, $SQL));
			
			if ($data['records'] > 0) {
				// User already exists - prepare array with problem information
				$information['message'] = 'User already exists';
				return $information;
			}
			
			$SQL = "INSERT INTO `users` (`email`,`pass`,`hash`) VALUES ('$email', '$password', '$user_hash')";
			mysqli_query($link, $SQL);

			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= "From: webmaster@example.com\r\nReply-To: webmaster@example.com\r\n";
			$headers .= "Content-Type: multipart/alternative; boundary=\"PHP-alt-".$user_hash."\"\r\n";

			$confirmUrl = "http://$_SERVER[SERVER_NAME]/index.php?c=userConfirm&t=$user_hash";

			$txtMessage = <<<EOL
Hi, 

thank you for register in our site, please confirm your email by going to this address:
	 $confirmUrl

Best regards.
EOL;

			$htmlMessage = <<<EOL
Hi, 

thank you for register in our site, please <a href="$confirmUrl">click here</a> to confirm your email or 
copy & paste the following address in your browser
	 $confirmUrl

Best regards.
EOL;
			$crlf = "\n";
			$hdrs = array(
              'From'    => $smtpinfo["username"],
              'Subject' => 'Postify register confirmation'
            );
			
			$mime = new Mail_mime(array('eol' => $crlf));
			$mime->setTXTBody($txtMessage);
			$mime->setHTMLBody($htmlMessage);
			
			$body = $mime->get();
			$hdrs = $mime->headers($hdrs);
			
			$mail =&Mail::factory('smtp', $smtpinfo);
			$mail->send($email, $hdrs, $body);
			
			if (PEAR::isError($mail)) { 
				$information['message']	= $mail->getMessage();
			} else {
				// If no exception thrown the return sucess message
				$information = array(
					'status'	=> 'Success',
					'code'		=> 'Information',
					'message'	=> 'User was created with success, please check your email for confirmation.',
				);			
			}
			
		} catch (Exception $e) {
			$information['message'] = $e->getMessage();
		}
		
		
		return $information;
	}

	function userConfirm() {
		global $link;
		
		$information = false;
		
		$hash = mysqli_real_escape_string($link, $_REQUEST['t']);
		$SQL = "SELECT count(`email`) AS records FROM `users` WHERE `hash` = '$hash' and `confirmed`=0";
		try {
			$data = mysqli_fetch_assoc(mysqli_query($link, $SQL));
			if ($data['records'] > 0) {
				$SQL = "UPDATE `users` SET `confirmed`=1 WHERE `hash`='$hash'";
				mysqli_query($link, $SQL);
				$information['message'] = "";
				$information = true;
			}
		} catch (Exception $e) {
		}
		
		return $information;
	}

	function haveSignIn() {
		if ($_SESSION['auth']['token']) return true;
		return false;
	}

	function userSignIn() {
		global $link;
		
		$information = array(
			'status'	=> 'Failed',
			'code'		=> 'Error',
			'message'	=> 'User and Password values are incorrect.',
		);

		$email = mysqli_real_escape_string($link, $_POST['email']);
		$password = mysqli_real_escape_string($link, $_POST['password']);

		$SQL = "SELECT `id`, `hash` FROM `users` WHERE `email` = '$email' AND `pass` = '$password' AND `confirmed`=1";
		try {
			$data = mysqli_fetch_assoc(mysqli_query($link, $SQL));
			
			$_SESSION['auth']['tries']++;
			
			if ($data['id']) {
				$SQL = "INSERT INTO `access` VALUES ($data[id],UTC_TIMESTAMP())";
				//$SQL = "INSERT INTO `access` VALUES ($data[id],NOW())";
				mysqli_query($link, $SQL);
				
				$_SESSION['auth']['token'] = $data['hash'];
				$information = array(
					'status'	=> 'Success',
					'code'		=> 'Information',
					'message'	=> 'Login Successfull!',
					'token'		=> $data['hash'],
				);
			}
		} catch (Exception $e) {
			$information['message'] = $e->getMessage();
		}
		
		return $information;
	}

	function userSignOut() {
		global $link;
		
		$information = array(
			'status'	=> 'Failed',
			'code'		=> 'Error',
			'message'	=> 'An error occurred.',
		);

		$hash = mysqli_real_escape_string($link, $_POST['token']);

		if ($hash == $_SESSION['auth']['token']) {
			try {
				$_SESSION['auth']['tries']=0;
				unset($_SESSION['auth']['token']);
				$information = array(
					'status'	=> 'Success',
					'code'		=> 'Information',
					'message'	=> 'Sign Out Successfull',
				);
			} catch (Exception $e) {
				$information['message'] = $e->getMessage();
			}
		}
		
		return $information;
	}

	function sess_getLastAccesses() {
		global $link;
		
		$information = array(
			'status'	=> 'Failed',
			'code'		=> 'Error',
			'message'	=> 'Something went wrong.',
		);

		$hash = mysqli_real_escape_string($link, $_POST['token']);

		if ($hash == $_SESSION['auth']['token']) {
			$SQL = "SELECT `access`.`id`, `access`.`date` FROM `access`,`users` WHERE `access`.`id`=`users`.`id` AND `users`.`hash` = '$hash' ORDER BY `access`.`date` DESC LIMIT 0,5";
			try {
				$res = mysqli_query($link, $SQL);
	
				$information = array(
					'status'	=> 'Success',
					'code'		=> str_replace(" ", " &nbsp;&nbsp; ", 'data'),
				);
				$pos = 1;
				while ($data = mysqli_fetch_assoc($res)) {
					$information['data'][] = array(
						'pos' => $pos,
						'date' => $data['date'],
					);
					$pos++;
				}
			} catch (Exception $e) {
				$information['message'] = $e->getMessage();
			}
		}
		
		return $information;
	}
	
	function contactMe() {
		global $smtpinfo;
		
		$information = array(
			'status'	=> 'Failed',
			'code'		=> 'Error',
			'message'	=> 'Could not send your message, please try later.',
		);

		try {
			$txtMessage = $_POST['cn_message'];
			
			$crlf = "\n";
			$hdrs = array(
              'From'    => $_POST['cn_email'],
              'Subject' => 'IMPORTANT!!! - Contact from POSTIFY assignment.'
            );
			
			$mime = new Mail_mime(array('eol' => $crlf));
			$mime->setTXTBody($txtMessage);
			
			$body = $mime->get();
			$hdrs = $mime->headers($hdrs);
			
			$mail =&Mail::factory('smtp', $smtpinfo);
			$mail->send('joao.correia@genectiva.com', $hdrs, $body);
			
			if (PEAR::isError($mail)) { 
				$information['message']	= $mail->getMessage();
			} else {
				// If no exception thrown the return sucess message
				$information = array(
					'status'	=> 'Success',
					'code'		=> 'Information',
					'message'	=> 'Thanks for you input, your message will have a response as soon as possible.',
				);			
			}
			
		} catch (Exception $e) {
			$information['message'] = $e->getMessage();
		}
		
		
		return $information;
	}
?>