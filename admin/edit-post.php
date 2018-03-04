<?php
//remember to use urldecode when u output the post from batabase
include'menu.php';
include '../include/config.php';
include'../include/textarea.html';
if(!isset($_SESSION['loggedin'])){

  header('Location: login.php');
}
?>
<html>
<body>
  <link rel="stylesheet" href="style/main.css">
  <link rel="stylesheet" href="style/normalize.css">
</body>
<div id="wrapper">

  <h1>Blog</h1>
  <hr />
  <?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  ini_set("display_errors", 1);
  try{
    $postid = $_GET['id'];
    $query = "SELECT postID, postTitle, postCont FROM blog_posts WHERE postID = $postid";
    $result = mysqli_query($link, $query) or die (mysqli_error($link));
    while($row = mysqli_fetch_row($result)){

      echo '<form action="" method="post">';
      echo '<input type="hidden" name="postID"'. 'value="'.$row[0].'"><br>';
      echo '<label>Title</label><br />';
      echo '<input type="text" name="postTitle"'. 'value="'.$row[1].'"><br>';
      echo '<label>Content</label><br />';
      echo ' <textarea name="postCont" cols="60" rows="10">'.urldecode($row[2]).'</textarea></p>';
      echo ' <input type="submit" name="submit" value="Submit">';

    }
  }catch(Expection $e){
    echo "error";
  }
  ?>

</form>

<?php
if(isset($_POST['submit'])){
  try{
    $postid = $_POST['postID'];
    $posttitle = $_POST['postTitle'];
    $postcont = urlencode($_POST['postCont']);

    $query = "UPDATE blog_posts SET `postID` =  '$postid', `postTitle` = '$posttitle', `postCont` = '$postcont' WHERE `postID` = '$postid'";
    $result = mysqli_query($link, $query) or die (mysqli_error($link));
    header('Location: index.php?updated=true');
  }
  catch(Expection $e){
    echo "error";
  }
}


?>



</div>
