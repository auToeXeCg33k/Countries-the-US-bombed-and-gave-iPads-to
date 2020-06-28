    <div id="content">
        <section>
            <h1 style="padding-bottom: 16px;" id="main_title">DaTaBaSe</h1>
        </section>
        <main>
            <div style="overflow-x: auto; padding-bottom: 16px;">
                <table>
                    <thead>
                    <tr><th id="name">Name</th><th id="age">Age</th><th id="gender">Gender</th><th id="origin">Country of origin</th><th id="originbombed">Country of origin bombed</th><th id="origindate">Date</th><th id="current">Current Country</th><th id="currentbombed">Current country bombed</th><th id="currentdate">Date</th></tr>
                    </thead>
                    <tbody>
                    <tr id="database"><td headers="name">Elek</td><td headers="age">0-14</td><td headers="gender">Male</td><td headers="origin">SYR</td><td headers="originbombed">Yes</td><td headers="origindate">2018-18-18</td><td headers="current">HUN</td><td headers="currentbombed">No</td><td headers="currentdate">-</td></tr>
                    <?php
                    require_once "include/reader.inc";
                    $data = Reader::load_data("database/data.txt");

                    //load table entries
                    foreach ($data as $entry)
                        echo "<tr><td headers=\"name\">$entry[name]</td><td headers=\"age\">$entry[age]</td><td headers=\"gender\">$entry[gender]</td><td headers=\"origin\">$entry[origin]</td><td headers=\"originbombed\">$entry[originbombed]</td><td headers=\"origindate\">$entry[origindate]</td><td headers=\"current\">$entry[current]</td><td headers=\"currentbombed\">$entry[currentbombed]</td><td headers=\"currentdate\">$entry[currentdate]</td>";
                    ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>