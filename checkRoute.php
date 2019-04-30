<?php
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
$isLogged = false;
if (isset($_SESSION['email']) && isset($_SESSION['name'])) {
  $isLogged = true;
}
function isConnected()
{
  // use 80 for http or 443 for https protocol
  $connected = @fsockopen("www.example.com", 80);
  if ($connected) {
    fclose($connected);
    return true;
  }
  return false;
}

if (!isConnected()) { // check if we have internet
  $controller = 'pages';
  $action     = 'noConnection';
  if ($_SERVER['REQUEST_URI'] == '/' . 'FOU' . '/') {
    header("Location:views/pages/error.php?controller=pages&action=noConnection");
  } else {
    header("Location:error.php?controller=pages&action=noConnection");
  }
} else {
  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'pages';
    $action     = 'main';
  }
}


// } else {
