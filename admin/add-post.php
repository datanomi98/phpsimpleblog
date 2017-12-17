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
   // $postdesc = $_POST['postDesc'];
    $postCont = urlencode($_POST['postCont']);
    $query =  'INSERT into blog_posts (postTitle, postCont) values(' .
"\"{$postitle}\", " .
"\"{$postCont}\");";
     $result = mysqli_query($link, $query) or die (mysqli_error($link));
     header('Location: index.php?action=added');
}
}catch(Expection $e){
    echo "error";
}

?>

</div>