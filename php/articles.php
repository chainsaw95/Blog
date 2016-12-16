<html>
<head>
	<link rel="stylesheet" type="text/css" href="../styles/articles.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0" />
<title>Posts</title>
</head>
<body>
	<div id="navtop">

			<a href="../index.php">
			<img id="logo" src="../res/logo.png" width="100px" height="100px"></img>
			</a>
			<h1>    | Posts | </h1>
	</div>


	<div id="mainbox" align="center">
<?php
			$db=new mysqli("localhost","root","hades","blog");
			$rec_limit=5;
		  if($db->connect_errno > 0){
		    die('Unable to connect to database');
		  }

			if(!$result=$db->query("SELECT count(article_key) from articles")){
		    die("Error running query");
		  }

			$row=$result->fetch_array(MYSQLI_NUM);
			$rec_count=$row[0];

			if(isset($_GET{'page'})){
				$page=$_GET{'page'}+1;
				$offset=$rec_limit*$page;
			}
			else{
				$page=0;
				$offset=0;
			}
			$left_rec=$rec_count-($page * $rec_limit);


			$sql="SELECT *  from articles LIMIT $offset,$rec_limit";
			if(!$result=$db->query($sql)){
				die("Error running query");

			}

			while($row=$result->fetch_assoc()){
		    $date_of_post=$row['date_of_post'];
		    $article_name=$row['article_name'];
		    $article_upvotes=$row['upvotes_count'];
		    $author_name=$row['author_name'];
				$article_id=$row['article_key'];

			echo "<br />";
			echo '<div id="posts">';

						echo '<div id="article_name">';
						echo '<a href="viewpost.php?article_id=';
						echo "$article_id";
						echo '">';
						echo "$article_name";
						echo '</a>';
						echo '</div>';

						echo '<div id="date_of_post">';
						echo "$date_of_post";
						echo '</div>';

						echo '<div id="article_upvotes">';
						echo "$article_upvotes";
						echo '</div>';


						echo '<div id="author_name">';
						echo  "$author_name";
						echo '</div>';

			echo '</div>';

		  }


			echo '<div id="pgn">';

			if($page>0){
				$last=$page-2;
				echo '<div id="paginationprev">';
				echo "<a href= \"articles.php?page=$last\">PREV</a>";
				echo '</div>';
				echo '<div id="paginationnext">';
				echo "<a href= \"articles.php?page=$page\">NEXT</a>";
				echo '</div>';
			}
			else if($page==0){
				echo '<div id="paginationnext">';
				echo "<a href= \"articles.php?page=$page\">NEXT</a>";
				echo '</div>';
			}
			else if($left_rec<$rec_limit){
				$last=$page-2;
				echo '<div id="paginationnext">';
				echo "<a href= \"articles.php?page=$last\">END</a>";
				echo '</div>';
			}

			echo '</div>';

?>
</div>
</body>
</html>
