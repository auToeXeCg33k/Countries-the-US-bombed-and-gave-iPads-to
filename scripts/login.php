<?php
//load the session
ini_set("session.use_trans_sid", true);
ini_set("session.use_only_cookies", false);
session_start();


//if a user is already logged in
if (isset($_SESSION["user"]))
{
    header("Location: ../index.php&".SID);
    die("f");
}


//if the login form was sent
if (isset($_POST["logsubmit"]))
{
    require "../include/reader.inc";

    //if the username and password don't match anything in the database
    if (!Reader::user_valid("../database/users.txt", $_POST["logname"], $_POST["logpwd"]))
    {
        $_SESSION["error"] = "Invalid username or password.";
        header("Location: ../index.php?moment=mobi&".SID);
        die("f");
    }

    //process
    $_SESSION["user"] = $_POST["logname"];
    $_SESSION["notice"] = "Successful login!";
    header("Location: ../index.php?moment=cringe&".SID);
}