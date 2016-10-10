<div id="side-middle-box">    
    
    <h1>Collections</h1>
    
    <div class="scroll-container">
        
        | <a href="<?php echo $pagename;?>?collID=new" class="graylink oblique">New...</a><br />
        
        <?php
        $sql_collections = 
            "SELECT co.*
            FROM collections co
            ORDER BY collID";
        $result_collections = $connection->query($sql_collections);

        while ($collections = $result_collections->fetch_assoc()) {
            echo "| <a href=".$pagename."?collID=" . $collections['collID'] .
            " class=\"graylink\">" . $collections['collection'] . "</a><br />";
        }
        ?>
        
    </div>
</div>