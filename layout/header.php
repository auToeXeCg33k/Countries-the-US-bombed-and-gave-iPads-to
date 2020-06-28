<header>
    <audio loop="loop" autoplay="autoplay">
        <?php
        //if user is logged in
        if (isset($_SESSION["user"]))
        {
            include "include/reader.inc";
            include "include/writer.inc";

            //if their music was changed recently
            if (isset($_GET["ears"]))
            {
                $user = Reader::load_user("database/users.txt", $_SESSION["user"]);
                $user->set_playing($_GET["ears"]);
                unset($_GET["ears"]);
                Writer::modify_user("database/users.txt", $user);
            }

            $temp = Reader::load_user("database/users.txt", $_SESSION["user"])->now_playing();
            echo "<source src=\"audio/$temp\" type=\"audio/mpeg\">";
        }
        else
            echo "<source src=\"audio/music.mp3\" type=\"audio/mpeg\">"
        ?>
    </audio>

    <div>
        <img src="img/911.png" alt="Bill Clinton bein' badass and savin' humanity!">
        <div>
            <?php
            //if no user is logged in
            if (!isset($_SESSION["user"]))
                echo "<a href=\"?moment=mobi\">Login</a><a href=\"?moment=dik\">Register</a>";
            else
                echo "Logged in as: " . "<span>$_SESSION[user]</span>" .
                    "<a id=\"preferences\" href=\"?moment=cringe\">Preferences</a>" .
                    "<form action=\"scripts/logout.php\" method=\"get\"><button type=\"submit\">Logout</button></form>";
            ?>
        </div>
    </div>
</header>

<nav>
    <ul>
        <?php
        //generate links to the appropriate pages
        foreach ($pages as $key => $page)
            if ($page->get_menu() === true)
                echo "<li><a" . ($i === $page ? " class=\"active\"" : "") . " href=\"?moment=$key\">" . $page->get_title() . "</a></li>";
        ?>
    </ul>
</nav>