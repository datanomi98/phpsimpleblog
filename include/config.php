<?php

ob_start();
session_start();

//db creds

$link = mysqli_connect("127.0.0.1", "username", "password", "db_name");

