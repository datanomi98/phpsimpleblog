<?php
session_start();
//check if session already exists
if(isset($_SESSION['loggedin'])){
    
    header('Location: index.php');
}
?>

<?php
//check if there is error message written to the url
if(isset($_GET['error']))
if($_GET['error'] == 1){
    echo"wrong username or password";
}
?>
<form action="" method="post">
<p><label>Username</label><input type="text" name="username" value=""  /></p>
<p><label>Password</label><input type="password" name="password" value=""  /></p>
<p><label></label><input type="submit" name="submit" value="Login"  /></p>
</form>

<?php
ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

if(isset($_POST['username']) && isset($_POST['password'])){
    //get the username and password from form
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo $username;
    echo "\n";
    echo $password;
    //check if username or password match
    if($username =="root" && $password == "kek"){
        $_SESSION['loggedin'] = "true";
        $_SESSION['adminuser'] = "root";
        header('Location: '.$_GET['site']);
    }else{
        header('Location: login.php?error=1');
    }

    
}
