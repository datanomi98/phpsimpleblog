<html>
<body>
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/normalize.css">
</body>
</html>
<div id = "background-img">
<div id="wrapper">

		<h1>Blog</h1>
		<hr />
<?php

ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
include 'include/config.php';

include 'menu.php';
try{
    //start mysql with sudo /etc/init.d/mysql start
    $query = "SELECT postID, postTitle, postDate, postCont FROM blog_posts ORDER BY postID DESC ";
    $result = mysqli_query($link, $query) or die (mysqli_error($link));

     while ($row = mysqli_fetch_array($result)) {

         echo '<div>';
                echo '<h1><a href="viewpost.php?id='.$row[0].'">'.$row[1].'</a></h1>';
                echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row[2])).'</p>';
                           //call function to cut piece of postcontent to the desc part.
                echo '<p>'.cutTextForDesc($row[3]).'</p>';
                echo '<p><a href="viewpost.php?id='.$row[0].'">Read More</a></p>';
            echo '</div>';
    }



}
catch(Expection $e) {
      echo"error";
}
//function to cut piece of txt of the content to the description.
function cutTextForDesc($text){
 $cont = urldecode($text);
 //thanks to the php explode function it's this easy.
$firstSentense = explode("\n", $cont);
//u have to remember to add [0] or [1] because the explode function returns array.
  echo $firstSentense[0];
}
?>
</div>
</div>
