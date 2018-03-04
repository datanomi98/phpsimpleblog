<html>
<body>
  <link rel="stylesheet" href="style/registerpage.css">

  <div id="wrapper">

    <h1>Login to your account</h1>
    <form action = '' method = 'post' >
      <table>
        <tr>
          <td>Email :</td> <td><input type="email" name="email"></td><br>
        </tr>
        <tr>
          <td>Password :</td> <td><input type="password" name="password"></td><br>
        </tr>
        <tr>
          <tr>
            <td><input type="submit" value="Submit" name = "submit-login"></td>
          </tr>
        </table>
      </form>


      <?php
      ini_set('display_errors', 1);
      error_reporting(E_ALL);
      ini_set("display_errors", 1);
      include 'include/config.php';
      if(isset($_POST['submit-login'])){
        try{
          $email = htmlspecialchars($_POST ['email']);
          $password = htmlspecialchars($_POST['password']);
          $stmt = $link ->prepare("SELECT userID, nickname, email, password FROM blog_users WHERE email = ?");
          $stmt->bind_param("s", $email);
          $stmt->execute();
          $stmt->bind_result($userID,$nick, $emailDB, $pass);
          $data = $stmt->fetch();
          //check if email exists
          if($data == false) {
            echo "<script>";
            echo "alert('wrong email');";
            echo "</script>";
          }else{
            if(password_verify($_POST['password'], $pass)){
              $_SESSION['user'] = $nick;
              $_SESSION['userID'] = $userID;
              header('Location: index.php?login=succ');
            }else{
              echo "<script>";
              echo "alert('wrong password');";
              echo "</script>";
            }
          }
        }
        catch(Expection $e){
          echo "error";
        }
      }
      ?>
      </html>
