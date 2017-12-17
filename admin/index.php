
<?php
include '../include/config.php';
if(!isset($_SESSION['loggedin'])){
    
    header('Location: login.php');
}

?>
<html>
<body>
    <?php
   include'menu.php';
    ?>
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/normalize.css">
</body>
</html>
<div id="wrapper">

		<h1>Blog</h1>
		<hr />
		
		<h1> Edit, Delete or Add Post
<?php
ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
try{
    //start mysql with sudo /etc/init.d/mysql start 
    //use this for comment section
    //$postid = 1; and WHERE postID = $postid
    $query = "SELECT postID, postTitle, postDate, postCont FROM blog_posts ORDER BY postID DESC ";
    $result = mysqli_query($link, $query) or die (mysqli_error($link));

     while ($row = mysqli_fetch_row($result)) {
           $cont = urldecode($row[3]);
  
         echo '<div>';
                echo "<br></br>";
                echo $row[1];
                echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row[2])).'</p>';
                echo '<p>'.$cont.'</p>';   
                echo '<a href="edit-post.php?id='.$row[0].'">'.'edit post</a>';
                echo"<br></br>";
                echo '<a href="delete-post.php?id='.$row[0].'">'.'delete post</a>';                
                              
            echo '</div>';
    }


}
catch(Expection $e) {
      echo"error";
}
?>
   
</div>