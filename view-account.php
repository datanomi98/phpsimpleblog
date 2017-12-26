<?php
include 'include/config.php';
include 'menu.php';
 ?>

<html>
<body>
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/normalize.css">
</body>
</html>
<div id = "background-img">
<div id="wrapper">

		<h1>User: <?php echo $_SESSION['user'];?></h1>
      <?php
      $stmt = $link ->prepare("SELECT userID, nickname, email, password FROM blog_users WHERE userID = ?");
      $stmt->bind_param("s", $_SESSION['userID']);
      $stmt->execute();
       $stmt->bind_result($userID,$nick, $emailDB, $pass);
       while ($stmt->fetch()) {
         echo "email: ". $emailDB;
       }
       ?>
