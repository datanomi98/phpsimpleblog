<link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/normalize.css">
<div class="dropdown">
<button onclick="myFunction()" class="dropbtn">Dropdown</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="index.php">index</a>
    <a href="add-post.php">add-post</a>
  </div>
</div>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>


<?php
    session_start();
    if(isset($_SESSION['user'])){
       echo "kirjauduttu sisään käyttäjällä ". $_SESSION['useradmin'];
    }?>