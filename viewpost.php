<html>
 <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/normalize.css">
      
    <div id = "background-img">
    <div id="wrapper">
<?php

include'include/textarea.html';
ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
include 'include/config.php';
include 'menu.php';

try{
    
    if(isset($_GET['id'])){
        $postid = $_GET["id"];
    $query = "SELECT postID, postTitle, postCont, postDate FROM blog_posts WHERE postID = $postid";
    $result = mysqli_query($link, $query) or die (mysqli_error($link));
    
     while ($row = mysqli_fetch_row($result)) {
         echo '<div>';
                echo '<h1>'.$row[1].'</h1>';
                echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row[3])).'</p>';
                echo '<p>'.urldecode($row[2]).'</p>';                
                             
            echo '</div>';
    }

}else{
    header('Location: index.php');
}

}catch(Expection $e){
    
    }
?>




		<h1>Comments</h1>
		
		<form action='' method='post'>
<?php
//check if user is logged in
if(isset($_SESSION['user'])){
  echo "<br /><label>Nickname</label>"; 
  echo "<br />".$_SESSION['user']."<br />";
  echo "<br /><label>Comment</label><br />";
  echo "<textarea name='comment' cols='60' rows='10'></textarea>";
  echo "<br /><input type='submit' name='submit-comment' value='Submit'>";
  echo "</form>";
}

?>

<?php
//add comment to the database
if(isset($_POST['submit-comment'])){
    try{
//had to use prepare statement to prevent sql injection
$stmt = $link->prepare("INSERT INTO blog_comments (postID, nickname, comment) VALUES (?,?,?)");
$stmt->bind_param("iss", $postID, $nickname, $comment);
$postID = $_GET['id'];
$nickname = $_SESSION['user'];
$comment = urlencode($_POST['comment']);
 $stmt->execute() or die (mysqli_error($link));   
$stmt->close();
header('Location: viewpost.php?id='.$postid);

}catch(Expection $e){
    
}

}

?>

<?php

$postid = $_GET['id'];
$query = "SELECT nickname, comment, commentDate, postID FROM blog_comments  WHERE postID = $postid  ORDER BY commentDate DESC ";
    $result = mysqli_query($link, $query) or die (mysqli_error($link));

     while ($row = mysqli_fetch_row($result)) {
         //make links clickable
         $string = urldecode($row[1]);
              
         echo '<div>';
                echo '<h2>'.$row[0].'</h2>';
                echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row[2])).'</p>';
                echo '<p class ="break" >'.$string.'</p>';                      
            echo '</div>';
    }
   
?>
</div>
</div>
</html>