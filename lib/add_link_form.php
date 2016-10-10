<div id="side-top-box">   
    <form action="<?php echo $pagename;?>" method="post" autocomplete="off">
        
        <h1>Add a bookmark</h1>
        <input class="add-link-input" type="text" name="name" placeholder="Title"autofocus>
        <input class="add-link-input" type="text" name="url" placeholder= "URL">
        <input class="add-link-input" type="text" name="shortdesc" placeholder= "Short description">
        
        <br>Add new tag:
        <input class="short add-link-input" type="text" name="newtag" placeholder="New tag"><br />

        <div class="reset-pad-margin">
        <div class="scroll-container">    
            <?php
            $sql_tag_table = 
            "SELECT *
            FROM tags t
            ORDER BY tagName";
            $result_tag_table = $connection->query($sql_tag_table);

            while ($tag_row_array = mysqli_fetch_assoc($result_tag_table)) {
                foreach ($tag_row_array as $key=>$value) {
                    if (is_numeric($value)) {
                        $id = $value;

                    } elseif (!is_numeric($value)) {
                        echo
                        "<input type=\"checkbox\" class=\"sidelist\" id=\"tag_$value\" name=\"tags[]\" value=\"$id\">
                        <label class=\"sidelabel\" for=\"tag_$value\">$value</label><br>";
                    }
                }
            }
            ?>
        </div>
        </div>
        <textarea name="notes" class="add-link-input" placeholder="Notes" style="clear:left; height:36px; width:99%;  margin-top:15px;"></textarea><br>
        
        <input type="hidden" name="mode" value="BROWSE" />
        
        <input type="submit" class="link-submit" name="add" value="">          
    </form>
</div>