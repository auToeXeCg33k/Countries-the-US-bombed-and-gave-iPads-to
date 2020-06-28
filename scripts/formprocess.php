<?php
//load the session
ini_set("session.use_trans_sid", true);
ini_set("session.use_only_cookies", false);
session_start();


//if no user is logged in
if (!isset($_SESSION["user"]))
{
    header("Location: ../index.php&".SID);
    die("f");
}


//form sent
if(isset($_POST["formsubmit"]))
{
    //filled field test
    if (empty($_POST["nname"]) || empty($_POST["ageranges"]) || empty($_POST["gender"]) || empty(!$_POST["origin"]) || empty($_POST["originbombed"]))
    {
        $_SESSION["error"] = "Please fill out all the necessary fields!.";
        header("Location: ../index.php?moment=cool&".SID);
        die("f");
    }

    //regex test
    if (!preg_match("[A-Za-z]{3}", $_POST["origin"]) || (!empty($_POST["current"]) && !preg_match("[A-Za-z]{3}", $_POST["current"])))
    {
        $_SESSION["error"] = "Invalid country code format!";
        header("Location: ../index.php?moment=cool&".SID);
        die("f");
    }

    //gender validity test
    if (!(strtolower($_POST["gender"]) === "male" || strtolower($_POST["gender"]) === "female"))
    {
        $_SESSION["error"] = "Invalid gender.";
        header("Location: ../index.php?moment=cool&".SID);
        die("f");
    }

    //same country check
    if (!empty($_POST["current"]) && $_POST["current"] === $_POST["origin"])
    {
        $_SESSION["error"] = "Enter your current country only if it differs from your country of origin!";
        header("Location: ../index.php?moment=cool&".SID);
        die("f");
    }

    //same country date check
    if (empty($_POST["current"]) && (!empty($_POST["currentbombed"]) || !empty($_POST["currentdate"])))
    {
        $_SESSION["error"] = "If your current country is the same as your country of origin, please don't provide information on current country bombing!";
        header("Location: ../index.php?moment=cool&".SID);
        die("f");
    }

    //date provided check
    if (($_POST["currentbombed"] === "Yes" && empty($_POST["currentdate"])) || ($_POST["originbombed"] === "Yes" && empty($_POST["origindate"])))
    {
        $_SESSION["error"] = "If your country has been bombed, please provide the date of the bombing too!";
        header("Location: ../index.php?moment=cool&".SID);
        die("f");
    }

    //date if not bombed check
    if (($_POST["currentbombed"] === "No" && !empty($_POST["currentdate"])) || ($_POST["originbombed"] === "No" && !empty($_POST["origindate"])))
    {
        $_SESSION["error"] = "Please don't enter a bombing date if the country has not been bombed!";
        header("Location: ../index.php?moment=cool&".SID);
        die("f");
    }

    //processing
    $data["name"] = $_POST["nname"];
    $data["age"] = $_POST["ageranges"];
    $data["gender"] = $_POST["gender"];
    $data["origin"] = strtoupper($_POST["origin"]);
    $data["current"] = strtoupper($_POST[(empty($_POST["current"]) ? "origin" : "current")]);
    $data["originbombed"] = $_POST["originbombed"];
    $data["origindate"] = $data["originbombed"] === "Yes" ? $_POST["origindate"] : "-";
    if (empty($_POST["currentbombed"]))
        $data["currentbombed"] = $_POST["originbombed"];
    else
        $data["currentbombed"] = $_POST["currentbombed"];

    if (empty($_POST["currentdate"]))
        $data["currentdate"] = $data["origindate"];
    else
        $data["currentdate"] = $_POST["currentdate"];

    require_once "../include/writer.inc";
    Writer::write_data("../database/data.txt", $data);
    $_SESSION["notice"] = "Thank you for your contribution!";
    header("Location: ../index.php?moment=cool&".SID);
}
