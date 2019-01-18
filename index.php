<?php
 require 'account\core.inc.php';
 require 'account\connect.inc.php';
 
 if (loggedin()) {
  //catches firstname and surname with getuserfield function in core.inc.php
  $firstname = getuserfield('fname');
  $surname = getuserfield('lname');
  echo 'You\'re logged in, '.$firstname.' '.$surname.'. <a href="account\logout.php">Log out</a><br>';
  }else {
  include 'account\login.php';
 }
?>
