<?php
    $date=date('Y-m-d');

    $upvotes_count=0;


    $conn=mysqli_connect("localhost","root","hades","blog");
    if(!$conn){
      die("Connection failed to the database");
    }

    if(!get_magic_quotes_gpc()){
      $article_name=addslashes($_GET['article_name']);
      $article_content=addslashes($_GET['article_content']);
      $author_name=addslashes($_GET['author_name']);
      $category=addslashes($_GET['article_tags']);
    }
    else{
      $article_name=$_GET['article_name'];
      $article_content=$_GET['article_content'];
      $author_name=$_GET['author_name'];
      $category=$_GET['article_tags'];
    }

    $sql="INSERT INTO articles"."(date_of_post,article_name,article_content,category,upvotes_count,author_name)"."VALUES('$date','$article_name','$article_content','$category',$upvotes_count,'$author_name')";
    if(mysqli_query($conn,$sql)){
      echo "Article Posted Sucessfully";
    }
    else{
      echo "Connection error";
    }

    mysqli_close($conn);

?>
