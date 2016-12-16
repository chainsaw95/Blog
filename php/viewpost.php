<?php
include_once("connect.php");
if(check_SQL()==0){

  $article_id=$_GET['article_id'];
  $db=new mysqli("localhost","root","hades","blog");
  $query="SELECT * from articles where article_key=$article_id";
  if(!$result=$db->query($query)){
    die("Error running query");
  }
  else{
    $row=$result->fetch_array(MYSQLI_NUM);

  }
}


echo <<<_END
<html>
<head>
<title>$row[1]</title>
<link rel="stylesheet" type="text/css" href="../styles/post.css">
</head>

<body>
<div id="navtop">

    <a href="../index.php">
    <img id="logo" src="../res/logo.png" width="100px" height="100px"></img>
    </a>
    <h1>    | $row[1]  </h1>
</div>




<div id="mainbox" align="center">
$row[2];


</div>
</body>
</html>

_END;

?>
