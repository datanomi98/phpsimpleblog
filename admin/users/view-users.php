<html>
<body>
<link rel="stylesheet" href="../../style/main.css">
<link rel="stylesheet" href="../../style/normalize.css">
<div id = "background-img">
<div id = "wrapper">

<body>
<table border="1" width="10%">

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set("display_errors", 1);
include '../../include/config.php';
include 'menu.php';
if(isset($_SESSION['loggedin'])){
$query = "SELECT userID, nickname, email FROM blog_users";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
//fetch all results from db
echo "<br>";
echo "<br>";
print('<td><b>userID</b></td>');
print('<td><b>Nickname</b></td>');
print('<td><b>EmailAddress</b></td>');
 while ($row = mysqli_fetch_row($result)) {
print('<tr><td>');
echo $row[0];
print('</td><td>');
echo $row[1]."  ". '<a href="delete-user.php?id='.$row[0].'">'.'Delete user</a>';
print('</td><td>');
echo $row[2];
print('</td></tr>');
print ("\n"); 
    }
}else{
	//if u are trying to access the site without loggin in it will redirect you to the login site with parameter 
	//of the site url
	header('Location: ../login.php?site='. $_SERVER['PHP_SELF']);
}
?>

</div>
</div>
</html>