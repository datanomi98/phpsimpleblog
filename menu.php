<html>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">






    <!-- Custom styles for this template -->
    <link href="style/menustyle.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">

        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
           <?php
            if(!isset ($_SESSION['user'])){


            echo "<li class='nav-item'>";
            echo " <a class='nav-link' href='register-user.php'>Register</a>";
            echo " </li>";
        }

            ?>
          <?php
            if(!isset ($_SESSION['user'])){


            echo "<li class='nav-item'>";
            echo " <a class='nav-link' href='login.php'>Login</a>";
            echo " </li>";
        }

            ?>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view-account.php?id=<?php if(isset($_SESSION['userID'])){echo  $_SESSION['userID'];}?>"> <?php if(isset($_SESSION['user'])){
                  echo $_SESSION['user'];
              }?></a>
            </li>
            <?php
            if(isset ($_SESSION['user'])){


            echo "<li class='nav-item'>";
            echo " <a class='nav-link' href='logout.php'>Logout</a>";
            echo " </li>";
        }

            ?>


          </ul>

        </div>
      </div>

    </nav>

    <!-- Page Content -->
     <script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- /.container -->
</html>
