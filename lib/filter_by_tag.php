<div id="side-bottom-box">
    <h1>Filter by tags</h1>
        <form id="filter-tags" method="get" action="<?php echo $pagename;?>">
            <ul class="reset-pad-margin">
                <div class="scroll-container">
                <?php
                $sql_tag_table = 
                "SELECT *
                FROM tags t
                ORDER BY t.tagName";
                $result_tag_table = $connection->query($sql_tag_table);

                while ($tag_row_array = mysqli_fetch_assoc($result_tag_table)) {
                    foreach ($tag_row_array as $key=>$value) {
                        if (is_numeric($value)) {
                            $id = $value;
                        } elseif (!is_numeric($value)) {
                            echo
                            "<li class=\"filter-tags\">
                            <input type=\"checkbox\" class=\"sidelist dark-border\" id=\"filter_$id\" 
                            name=\"filter[]\" value=\"$id\">";
                            echo
                            "<label class=\"sidelabel\" for=\"filter_$id\">$value</label></li>";
                        }
                    }
                }?>
                </div>
            </ul>
            <input type="submit" class="filter-submit" name="submit" value="">
        </form>
    </div>