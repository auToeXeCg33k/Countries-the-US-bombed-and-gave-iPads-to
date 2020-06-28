    <div id="content">
        <section>
            <h1 style="padding-bottom: 16px;" id="main_title">lOgIn</h1>
        </section>
        <main>
            <?php
            //if a user is already logged in
            if (isset($_SESSION["user"]))
                echo "Ur already logged in.";
            else
            {
                //generate login form
                echo "<form action=\"scripts/login.php\" method=\"post\">
                <label for=\"lognev\">Username:</label><input id=\"lognev\" name=\"logname\" type=\"text\" required autofocus>
                <label for=\"logjel\">Password:</label><input id=\"logjel\" name=\"logpwd\" type=\"password\" required>
                <button name=\"logsubmit\" type=\"submit\">Login</button>";

                //show processing errors
                if (isset($_SESSION["error"]))
                {
                    echo "<label id=\"fadinglabel\">&#x274c$_SESSION[error]&#x274c</label>";
                    unset($_SESSION["error"]);
                }
            }
            ?>
            </form>
        </main>
    </div>
</div>


