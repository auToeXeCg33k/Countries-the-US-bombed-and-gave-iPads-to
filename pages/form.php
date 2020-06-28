    <div id="content">
        <section class="row">
            <h1 id="main_title">GiVe Us YoUr DATA!</h1>
        </section>
        <main class="row">
            <?php
            //if used is logged in
            if (!isset($_SESSION["user"]))
                echo "<p>You can help us grow our amazing database only if you're logged in. To do that, click <a href=\"index.php?moment=mobi\">here.</a></p>";
            else {
                echo "<form id=\"contribute\" method=\"post\" action=\"scripts/formprocess.php\">";

                //show error
                if (isset($_SESSION["error"])) {
                    echo "<label id='message'>$_SESSION[error]</label>";
                    unset($_SESSION["error"]);
                }

                //show notice
                if (isset($_SESSION["notice"])) {
                    echo "<label id='message'>$_SESSION[notice]</label>";
                    unset($_SESSION["notice"]);
                }

                //show form
                echo "<fieldset id=\"fieldset1\">
                    <legend>Personal</legend>
                    <label for=\"name\">Name:</label>
                    <input type=\"text\" id=\"name\" name=\"nname\" placeholder=\"Bob Bingi\" required autofocus>

                    <label for=\"ageranges\">Age:</label>
                    <select id =\"ageranges\"  name=\"ageranges\" required>
                        <option disabled selected value>Not selected</option>
                        <option value=\"0-14\">0-14</option>
                        <option value=\"15-18\">15-18</option>
                        <option value=\"19-30\">19-30</option>
                        <option value=\"31-50\">31-50</option>
                        <option value=\"51-65\">51-65</option>
                        <option value=\"65+\">65+</option>
                    </select>

                    <label for=\"gender\">Gender:</label>
                    <input id=\"gender\" list=\"genderlist\" name=\"gender\" required>
                    <datalist id=\"genderlist\">
                        <option value=\"Male\"></option>
                        <option value=\"Female\"></option>
                    </datalist>

                    <label for=\"origin\">Country of origin(country code):</label>
                    <input type=\"text\" id=\"origin\" name=\"origin\" pattern=\"[A-Za-z]{3}\" placeholder=\"AFG\" required>

                    <label for=\"current\">If different, current country(country code):</label>
                    <input type=\"text\" id=\"current\" name=\"current\" pattern=\"[A-Za-z]{3}\" placeholder=\"SYR\">
                </fieldset>

                <fieldset id=\"fieldset2\">
                    <legend>Bombings</legend>
                    <label>Has your country of origin been bombed?</label><br>
                    <label for=\"yes1\">Yes</label>
                    <input type=\"radio\" id=\"yes1\" name=\"originbombed\" value=\"Yes\">
                    <label for=\"no1\">No</label>
                    <input type=\"radio\" id=\"no1\" name=\"originbombed\" value=\"No\" required>
                    <br>
                    <label for=\"origindate\">If yes, date of bombing:</label>
                    <input type=\"date\" id=\"origindate\" name=\"origindate\">
                    <br>
                    <label>If different, has your current country been bombed?</label><br>
                    <label for=\"yes2\">Yes</label>
                    <input type=\"radio\" id=\"yes2\" name=\"currentbombed\" value=\"Yes\">
                    <label for=\"no2\">No</label>
                    <input type=\"radio\" id=\"no2\" name=\"currentbombed\" value=\"No\">
                    <br>
                    <label for=\"currentdate\">If yes, date of bombing</label>
                    <input type=\"date\" id=\"currentdate\" name=\"currentdate\">
                </fieldset>
                <div class=\"row\">
                    <button style=\"background: transparent\" type=\"submit\" name=\"formsubmit\"><img src=\"img/obamaki.png\" width=\"100\" height=\"100\" title=\"Submit\"></button>
                    <button style=\"background: transparent\" type=\"reset\"><img src=\"img/bush.png\" width=\"100\" height=\"100\" title=\"Reset\"></button>
                </div>
             </form>";
            }
            ?>
        </main>
    </div>
</div>