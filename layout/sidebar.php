<div id="container">
    <div id="sidebar">
        <nav>
            <ul>
                <?php
                //generate sidebar links
                foreach ($i->get_links() as $key=>$value)
                    echo "<li><a href=\"" .$key . "\">". $value ."</a></li>"
                ?>
            </ul>
        </nav>
    </div>