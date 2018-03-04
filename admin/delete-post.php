<?php
include '../include/config.php';
//check if url has parameter id
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$query = "DELETE  FROM  blog_posts WHERE postID = $id";
	$result = mysqli_query($link, $query) or die (mysqli_error($link));
	$query = "DELETE FROM blog_comments WHERE postID =$id";
	$result = mysqli_query($link, $query) or die (mysqli_error($link));
	header('Location: index.php?delete=succ');
}else{
	header('Location: index.php');
}
