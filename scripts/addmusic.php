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


//form is sent
if(isset($_POST["musicsubmit"]))
{
    //check if file is mp3
    if (strtolower(pathinfo(basename($_FILES["music"]["name"]),PATHINFO_EXTENSION)) !== "mp3")
    {
        $_SESSION["error"] = "Unsupported file extension.";
        header("Location: ../index.php?moment=cringe&".SID);
        die("f");
    }

    //check if file is under 10 megs
    if ($_FILES["music"]["size"] > 10485760) {
        $_SESSION["error"] = "Your file is too large.";
        header("Location: ../index.php?moment=cringe&".SID);
        die("f");
    }

    require "../include/reader.inc";
    $user = Reader::load_user("../database/users.txt", $_SESSION["user"]);

    //check if user already has a file with this name
    foreach($user->get_tracks() as $key=>&$track)
        if ($key === basename($_FILES["music"]["name"]))
        {
            $_SESSION["error"] = "You already have a file with this name.";
            header("Location: ../index.php?moment=cringe&".SID);
            die("f");
        }

    //process
    require "../include/writer.inc";
    require "../include/namer.inc";
    $temp = Namer::rename("../audio/", "music");
    $user->add_track(basename($_FILES["music"]["name"]), $temp);
    $user->set_playing(basename($_FILES["music"]["name"]));
    Writer::modify_user("../database/users.txt", $user);
    move_uploaded_file($_FILES["music"]["tmp_name"], "../audio/" . $temp);
    header("Location: ../index.php?moment=cringe&".SID);
}