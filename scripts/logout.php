<?php
//load the session
ini_set("session.use_trans_sid", true);
ini_set("session.use_only_cookies", false);
session_start();

//clear the session
session_unset();
session_destroy();

//back to the home page
header("Location: ../index.php");