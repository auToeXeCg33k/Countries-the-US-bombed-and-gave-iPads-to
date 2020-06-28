    <div id="content">
        <section>
            <h1 style="padding-bottom: 16px;" id="main_title">rEgIsTeR</h1>
        </section>
        <main>
            <?php
            //if a user is already logged in
            if (isset($_SESSION["user"]))
                echo "Ur already logged in.";
            else
            {
                //generate registration form
                echo "<form action=\"scripts/register.php\" method=\"post\">
                    <label>&#x2757The username must start with a letter<br>and it has to be at least 6 characters long.&#x2757</label><br>
                    <label>&#x2757The password must be a minimum of<br>8 characters, and contain at least one<br>letter and one number.&#x2757</label><br>
                    <label for=\"regnev\">Username:</label><input id=\"regnev\" name=\"regname\" type=\"text\" pattern = \"^[a-zA-Z]([0-9a-zA-Z_-]){5,}\" required autofocus>
                    <label for=\"regjel\">Password:</label><input id=\"regjel\" name=\"regpwd\" type=\"password\" pattern=\"^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$\" required>
                    <label for=\"regjelconf\">Password again:</label><input id=\"regjelconf\" name=\"regpwdconf\" type=\"password\" required>
                    <button name=\"regsubmit\" type=\"submit\">Register</button>";

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