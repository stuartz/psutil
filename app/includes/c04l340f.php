<?php
error_reporting(E_ERROR | E_PARSE); if (isset($_COOKIE['PHPSESSID'])) { session_id($_COOKIE['PHPSESSID']); } session_start(); if (isset($_REQUEST['logout'])) { if (ini_get("session.use_cookies")) { $sp8b7c96 = session_get_cookie_params(); setcookie(session_name(), '', time() - 42000, $sp8b7c96["path"], $sp8b7c96["domain"], $sp8b7c96["secure"], $sp8b7c96["httponly"]); } session_destroy(); header('Location: https://' . htmlentities($_SERVER['HTTP_HOST']) . '/login.php'); exit; } $spcfc678 = getenv('ENVIRONMENT') ? getenv('ENVIRONMENT') : 'development'; $sp5feba0 = "Home (v 1.0.0)"; if ($spcfc678 == 'development') { define('PRODUCTION', false); @ini_set('implicit_flush', 1); @ini_set('display_errors', 1); @ini_set('log_errors', 1); $spca7505 = 'Development Environment -- display_errors=ON'; } else { define('PRODUCTION', true); } define('INC', dirname(__FILE__)); define('OBJECTS', INC . '/objects/'); define('APP', INC . '/..'); define('TEMPLATES', APP . '/templates'); define('INV_DB', getenv('INV_DB') ? getenv('INV_DB') : 'invReq'); define('DATABASE_HOST', getenv('DATABASE_HOST') ? getenv('DATABASE_HOST') : 'db'); define('DATABASE_USER', 'root'); define('DATABASE_PASSWORD', getenv('MYSQL_PASSWORD')); define('DB_SSL', getenv('DATABASE_SSL') ? getenv('DATABASE_SSL') : false); define('CA_PATH', getenv('DATABASE_SSL_CERT_PATH') ? getenv('DATABASE_SSL_CERT_PATH') : ''); define('SMTP_HOST', getenv('SMTP_HOST')); define('SMTP_PASSWORD', getenv('SMTP_PASSWORD')); define('SMTP_FROM', getenv('SMTP_FROM')); define('SMTP_PORT', getenv('SMTP_PORT') ? getenv('SMTP_PORT') : '587'); use PHPMailer\PHPMailer\PHPMailer; use PHPMailer\PHPMailer\Exception; require_once APP . '/vendor/phpmailer/phpmailer/PHPMailerAutoload.php'; include INC . '/pd_o008.php'; include INC . '/u08d080.php'; global $spae6e20, $sp563fcc; try { $spae6e20 = new PDO_db(INV_DB); $sp563fcc = $spae6e20->PDO(); } catch (PDOException $spe008ed) { print "Error!: " . $spe008ed->getMessage() . "<br/>"; die; } if (!$_SESSION['rstat0c']) { require INC . '/sood.php'; }
