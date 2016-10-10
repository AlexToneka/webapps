<div id="side-top-box">    
    
    <h1>Categories</h1>
    
    <div class="scroll-container">
        
        | <a href="<?php echo $pagename;?>?catID=new" class="bluelink oblique">New...</a><br />
        
        <?php
        //DISPLAY CATEGORIES
        $sql_categories = 
            "SELECT ca.*
            FROM categories ca
            ORDER BY catID";
        $result_categories = $connection->query($sql_categories);
        
        while ($categories = $result_categories->fetch_assoc()) {
            echo "| <a href=".$pagename."?catID=" . $categories['catID'] .
            " class=\"bluelink\">" . $categories['category'] . "</a><br />";
        }
        ?>
        
    </div>
</div>

