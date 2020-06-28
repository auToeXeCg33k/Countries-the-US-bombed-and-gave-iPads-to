<div id="content">
    <section>
        <h1 style="padding-bottom: 16px;" id="main_title">uSeR</h1>
    </section>
    <main>
        <?php
        //if the user is not currently logged in
        if (!isset($_SESSION["user"]))
            //#pranked
            echo "<p>You managed to hack our website and access a page that should only really exist when you're logged in. Congrats, here's a cookie. 
                <img alt=\"a cookie\" style=\"height: 1em\" src=\"img/cookie.png\"> 
                Sadly, we thought of this already, and implemented this state-of-the-art anti-hacker system. So here it goes: 
                <a style=\"font-size: xx-large\" href=\"index.php?moment=mobi\">To access this page, log in here.</a></p>";
        else
        {
            echo "<div id=\"musicpref\">";

            //display error
            if (isset($_SESSION["error"]))
            {
                echo "<div class=\"error\">&#x274c$_SESSION[error]&#x274c</div>";
                unset($_SESSION["error"]);
            }

            //display notice
            if (isset($_SESSION["notice"]))
            {
                echo "<div class=\"notice\">&#x1F4E2 $_SESSION[notice] &#x1F4E2</div>";
                unset($_SESSION["notice"]);
            }

            require_once "include/reader.inc";
            echo "Choose your background music!";

            //generate music list
            foreach (Reader::load_user("database/users.txt", $_SESSION["user"])->get_tracks() as $key=>$value)
                echo "<div><a" . ($value === Reader::load_user("database/users.txt", $_SESSION["user"])->now_playing() ? " class=\"nowplaying\"" : "") . " href=\"?moment=cringe&ears=$key\">&#x1F50A $key &#x1F50A</a></div>";

            //music upload form
            echo "<span id=\"uploadmusic\">Upload your own music here! (We only support MP3 files and only up to 10 MiB)</span>
                  <form action=\"scripts/addmusic.php\" method=\"post\" enctype=\"multipart/form-data\">
                  <input type=\"file\" name=\"music\" required>
                  <button type=\"submit\" name=\"musicsubmit\">Upload</button>
            </form></div>";
        }
        ?>
    </main>
</div>
</div>


