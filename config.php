<?php
error_reporting(E_ALL^E_NOTICE);

// NORMAL SER CONFIG
$mysql_config["username"] = "mysql_username";
$mysql_config["password"] = "mysql_password";
$mysql_config["hostname"] = "localhost";
$mysql_config["port"] = 3306;
$mysql_config["name"] = "mysql_database";

// appFog Config
if (getenv("VCAP_SERVICES") != "") {
	$services_json = json_decode(getenv("VCAP_SERVICES"),true);
	$mysql_config = $services_json["mysql-5.1"][0]["credentials"];
}

$smtpinfo["host"] = "smtp.mail.domain";	//$host = "ssl://smtp.gmail.com"; //ssl://
$smtpinfo["port"] = "25"; 				//$port = "465";

//$smtpinfo["host"] = "ssl://smtp.gmail.com"; //ssl://
//$smtpinfo["port"] = "465";

$smtpinfo["auth"] = true; 
$smtpinfo["username"] = 'address@email.domain'; 
$smtpinfo["password"] = "email_password"; 
//check.email@gmx.com
?>	