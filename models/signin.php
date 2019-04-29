<?php
function checkEmailAndPassword($email, $pass)
{

   // get the connection to db
   $db = Database::getInstance();
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $user = User::getUserByEmail($email);
   if (isset($user)) {
      if (md5($pass) == $user->password) {
         $_SESSION['email']    = $user->email;
         $_SESSION['name']     = $user->name;
         $_SESSION['id']    = $user->id;
         return true;
      }
   }

   return false;
}
