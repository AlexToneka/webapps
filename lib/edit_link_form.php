<?php
$_SESSION['mode'] = "EDIT";
if (isset($_GET['bmID'])){$_SESSION['bmID'] = $_GET['bmID'];}

//GET AND STORE TITLE, URL, SHORTDESC, NOTES
$sql_row_to_edit = 
    "SELECT b.*
    FROM bookmarks b
    WHERE b.bmID = '" . $_SESSION['bmID'] . "'";
$result_row_to_edit = $connection->query($sql_row_to_edit);

while($row = $result_row_to_edit->fetch_assoc()) {
    $title = $row['bmTitle'];
    $url = $row['bmURL'];
    $shortdesc = $row['bmShortDesc'];
    $notes =$row['bmNotes'];
}

?>


<div id="side-top-box">     
    <form action="<?php echo $pagename;?>" method="post" autocomplete="off">
        
        <h1>Edit bookmark</h1>
        <input class="add-link-input" type="text" name="name" value="<?php echo $title;?>" autofocus>
        <input class="add-link-input highlight" type="text" name="url" value="<?php echo $url;?>">
        <input class="add-link-input" type="text" name="shortdesc" value="<?php echo $shortdesc;?>">
        
        <br>Add new tag:
        <input class="short add-link-input" type="text" name="newtag" placeholder="Enter new tag"><br />

            
        <div class="scroll-container">
        <?php
        $sql_tag_table = 
        "SELECT *
        FROM tags t
        ORDER BY tagName";
        $result_tag_table = $connection->query($sql_tag_table);  

        while ($tag_row_array = $result_tag_table->fetch_assoc()) {

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
        <input type="text" name="notes" class="add-link-input" style="clear:left; margin-top:5px;" value="<?php echo $notes;?>"><br>
        <input type="submit" class="edit-submit" name="edit" value="" />          
    </form>
</div>