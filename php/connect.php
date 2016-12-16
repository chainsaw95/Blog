<?php

  function check_SQL(){

  $db=new mysqli("localhost","root","hades","blog");

  if($db->connect_errno > 0){
    die('Unable to connect to database');
    return -1;
  }
  else{
    return 0;
  }

  }

?>
