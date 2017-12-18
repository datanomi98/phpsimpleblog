    <html>
     <body>
   <link rel="stylesheet" href="style/registerpage.css">
    
    <div id="wrapper">

  <h1>Create a New Account</h1>
      <form action = '' method = 'post' >
       <table>
        <tr>
         <td>Nickname :</td> <td><input type="text" name="nickname"></td><br>
        </tr>
        <tr>
         <td>Email :</td> <td><input type="text" name="email"></td><br>
        </tr>
        <tr>
         <td>Password :</td> <td><input type="password" name="password"></td><br>
        </tr>
        <tr>
        
        <tr>
         <td><input type="submit" value="Submit" name = "submit-register"></td>
        </tr>
       </table>
      </form>
</html>

<?php
ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
include 'include/config.php';
if(isset($_POST['submit-register'])){
try{

$nickname = $_POST['nickname'];
$email = $_POST ['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
echo $_SERVER['REMOTE_ADDR'];
$query = "SELECT * FROM blog_users WHERE nickname = '$nickname'";
$nickQuery = mysqli_query($link,$query);
$data = mysqli_fetch_row($nickQuery);
if($data[1] == $nickname) {
    header('Location: register-user.php?error=nick');

}else{
    $query = "SELECT * FROM blog_users WHERE email = '$email'";
$nickQuery = mysqli_query($link,$query);
$data = mysqli_fetch_row($nickQuery);
if($data[3] == $email) {
    header('Location: register-user.php?error=email');

}else{
$stmt = $link->prepare("INSERT INTO blog_users (nickname, password, email, ipAddress) VALUES (?,?,?)");
$stmt->bind_param("sss", $nickname, $password, $email);
$stmt->execute();
$stmt->close();
header('Location: index.php?userreg=succ');
}
}
}
catch(Expection $e){
echo "error";
}
}



?>