<?php
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
  }else{
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
