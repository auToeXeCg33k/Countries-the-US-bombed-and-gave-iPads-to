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


//if the registration form was sent
if (isset($_POST["regsubmit"]))
{
    //empty field test
    if (empty($_POST["regname"]) || empty($_POST["regpwd"]) || empty($_POST["regpwdconf"]))
    {
        $_SESSION["error"] = "Please fill all the fields out.";
        header("Location: ../index.php?moment=dik&".SID);
        die();
    }

    //name regex test
    if (!preg_match("(^[a-zA-Z]([0-9a-zA-Z_-]){5,})", $_POST["regname"]))
    {
        $_SESSION["error"] = "Invalid username format.";
        header("Location: ../index.php?moment=dik&".SID);
        die();
    }

    //pwd regex test
    if (!preg_match("(^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$)", $_POST["regpwd"]) || !preg_match("(^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$)", $_POST["regpwdconf"]))
    {
        $_SESSION["error"] = "Invalid password format.";
        header("Location: ../index.php?moment=dik&".SID);
        die();
    }


    //if the entered username is already taken
    require "../include/reader.inc";
    if (Reader::user_exists("../database/users.txt", $_POST["regname"]))
    {
        $_SESSION["error"] = "Username is already taken.";
        header("Location: ../index.php?moment=dik&".SID);
        die();
    }

    //if the two given passwords dont match
    if ($_POST["regpwd"] !== $_POST["regpwdconf"])
    {
        $_SESSION["error"] = "Passwords don't match!";
        header("Location: ../index.php?moment=dik&".SID);
        die();
    }


    //process
    require "../include/writer.inc";
    Writer::write_user("../database/users.txt", new User($_POST["regname"], $_POST["regpwd"]));
    $_SESSION["user"] = $_POST["regname"];
    $_SESSION["notice"] = "Successful registration!";
    header("Location: ../index.php?moment=cringe&".SID);
}