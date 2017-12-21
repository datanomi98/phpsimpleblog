<html>
<?php 
include'menu.php';
?>

<div id = "background-img">
<div id="wrapper">

		<h1>Blog</h1>
		<hr />
		<form action='' method='post'>

		<label>Title</label><br />
		<input type='text' name='postTitle'>

		

		<label>Content</label><br />
		<textarea name='postCont' cols='60' rows='10'></textarea>

		<input type='submit' name='submit' value='Submit'>

	</form>

<?php
ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
include "../include/textarea.html";
include '../include/config.php';
try{
if(isset($_POST['submit'])){
   // $_POST = array_map( 'stripslashes', $_POST );
    //extract($_POST);
    $postitle = $_POST['postTitle'];
    $postCont = urlencode($_POST['postCont']);
   //we have to use prepare statement to prevent sql injection.
    $stmt = $link->prepare("INSERT into blog_posts (postTitle, postCont) values (?,?)");
    $stmt->bind_param("ss", $postitle, $postCont);
    $stmt->execute() or die (mysqli_error($link));
    $stmt->close();
     header('Location: index.php?action=added');
}
}catch(Expection $e){
    echo "error";
}

?>

</div>