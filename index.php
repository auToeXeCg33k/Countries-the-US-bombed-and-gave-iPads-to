<?php
//load the session
ini_set("session.use_trans_sid", true);
ini_set("session.use_only_cookies", false);
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>'Murica</title>
    <link rel="stylesheet" href="style/global.css">
    <?php
    //list of the user accessible pages
    require_once "include/page.inc";
    $pages = [
        "nice" => new Page(true, "home", "Home", "Jk, we just want to sell your data LMAO", "#intro", "Introduction", "#images", "Visual experiences", "#contribute", "Endless possibilities", "#info", "Huge library", "#explore", "Ready?"),
        "epic" => new Page(true, "gallery", "Gallery", "wikipedia.org\nworldbeyondwar.org\ncommondreams.org\nthedailybeast.com\nstripes.com", "#bomb", "Bombs", "#iraq", "Iraq", "#syria", "Syria", "#afg", "Afghanistan"),
        "cool" => new Page(true, "form", "Contribute", "We promise\nto respect\nyour privacy", "#fieldset1", "Personal", "#fieldset2", "Bombings"),
        "awesome" => new Page(true, "data", "Data", "You can trust our database", "#database", "Database"),
        "bruh" => new Page(true, "aboutus", "About Us", "If you are in need of an eye specialist after seeing this gem of creation, then consider leaving", "#start", "Who dis", "#eagle", "Fancy"),
        "mobi" => new Page(false, "loginpage", "Login", "Enter the cave of TRUTH", "#lognev", "Log in here!"),
        "dik" => new Page(false, "registerpage", "Register", "Join our noble cause today!", "#regnev", "Register here!"),
        "cringe" => new Page(false, "userpage", "User", "Enhance your experience!", "#musicpref", "Preferred music", "#uploadmusic", "Upload your own")
    ];

    //if the pageloader variable is set, and its value is valid
    if (!empty($_GET["moment"]) && array_key_exists($_GET["moment"], $pages))
            //set i to the name of the file need to be loaded
            $i = $pages[$_GET["moment"]];
    else
        $i = $pages["nice"];


    //link the related stylesheet
    echo "<link rel=\"stylesheet\" href=\"style/".$i->get_file().".css\">"
    ?>
</head>
<body>
<?php
include "layout/header.php";
include "layout/sidebar.php";
include "pages/".$i->get_file().".php";
include "layout/trump.php";
include "layout/footer.php";
?>
</body>
</html>