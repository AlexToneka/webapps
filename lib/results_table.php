<?php //RESULTS TABLE
if (isset($_GET['bmID'])) {  //FILTER RESULTS BY BOOKMARK
    
    $bmID = $_GET['bmID'];
    
    $sql_linking_tables = 
    "SELECT m.*, b.*, t.*
    FROM master m, bookmarks b, tags t
    WHERE m.masterBMID = b.bmID
    AND m.masterTagID = t.tagID
    AND m.masterBMID = '".$bmID."'
    GROUP BY b.bmTitle
    ORDER BY b.bmTitle";
} elseif (isset($_SESSION['catID'])) {  //FILTER RESULTS BY CATEGORY
    
    $catID = $_SESSION['catID'];
    
    $sql_linking_tables = 
    "SELECT m.*, b.*, t.*
    FROM master m, bookmarks b, tags t
    WHERE m.masterBMID = b.bmID
    AND m.masterTagID = t.tagID
    AND m.masterCatID = '".$catID."'
    GROUP BY b.bmTitle
    ORDER BY b.bmTitle";
} elseif (isset($_SESSION['collID'])) {  //FILTER RESULTS BY COLLECTION
    
    $collID = $_SESSION['collID'];
    
    $sql_linking_tables = 
    "SELECT m.*, b.*, t.*
    FROM master m, bookmarks b, tags t
    WHERE m.masterBMID = b.bmID
    AND m.masterTagID = t.tagID
    AND m.masterCollID = '".$collID."'
    GROUP BY b.bmTitle
    ORDER BY b.bmTitle";
} elseif (isset($_GET['filter'])) { //FILTER RESULTS BY TAGS
    
    $filterIDs = implode(',',$_GET['filter']);
    
    $sql_linking_tables = 
    "SELECT b.*, t.*, bt.*
    FROM $table_map bt, $table_bm b, $table_tags t
    WHERE bt.bmMapID = b.bmID
    AND bt.tagMapID
    IN ( $filterIDs )
    GROUP BY b.bmID
    ORDER BY b.bmTitle";
} else {                          //NORMAL DISPLAY

    $sql_linking_tables = 
    "SELECT m.*, b.*, t.*
    FROM master m, bookmarks b, tags t
    WHERE m.masterBMID = b.bmID
    AND m.masterTagID = t.tagID
    GROUP BY b.bmTitle
    ORDER BY b.bmTitle";
}
$result_linking_tables = $connection->query($sql_linking_tables);


if ($result_linking_tables->num_rows > 0) {
    if (isset($deleted_bookmark)) {
        echo $deleted_bookmark . "<br>";
    }
    echo "<table id=\"link_output\">";?>
        <thead>
        <tr>
            <th class="title">← Title →</th>
            <th class="shortdesc">← Summary →</th>
            <th class="tags">← Tags →</th>
            <th class="notes">Notes</th>
            <th class="edit"></th>
            <th class="delete"></th>
        </tr>
        </thead>
        
        <?php echo "<tbody>";   
        //BEGIN TO POPULATE THE ROWS
        while($row = $result_linking_tables->fetch_assoc()) {
            //DECLARE TITLE FOR TITLE CELL
            if (!empty($row["bmTitle"])) {
                $rowname = $row["bmTitle"];
            } elseif (empty($row["bmTitle"]) && !empty($row["bmURL"])) {
                $rowname = $row["bmURL"];
            } else {
                $rowname = "null";
            }
            
            //DISPLAY TITLE
            echo "<tr><td><a href=\"" . $row["bmURL"] . 
            "\" class=\"bookmark\" target=\"_blank\">
            <img src=\"http://www.google.com/s2/favicons?domain=" . 
            $row['bmURL'] . "\" height=\"16\" width=\"16\"> " . 
            $rowname . "</a></td>";
            
            //DISPLAY SHORT DESCRIPTION
            echo "<td>" . $row["bmShortDesc"] . "</td>";
            
            //DISPLAY THE TAGS
            echo "<td class=\"alight-left\">";                                  
            $bmID = $row['bmID'];
            
            $sql_tag_map =
            "SELECT t.tagID, t.tagName
            FROM master m, bookmarks b, tags t
            WHERE m.masterTagID = t.tagID
            AND m.masterBMID = b.bmID
            AND m.masterBMID = $bmID";
            $result_tag_map = $connection->query($sql_tag_map);
            
            while ($tagrow = mysqli_fetch_assoc($result_tag_map)) {
                echo "<span class=\"tagDisplay\">$tagrow[tagName]</span>";
                //http_build_query()
            }
            
            //DISPLAY NOTES
            echo "<td>" . $row["bmNotes"] . "</td>";
            
            $bmID = $row['bmID'];
            //EDIT BUTTON
            echo "<td>
                <form method=\"get\" action=\"bookmarks.php\">
                <input type=\"hidden\" name=\"bmID\" value=\"$bmID\">
                <input type=\"hidden\" name=\"edit\" value=\"true\">";
                ?>
                    <button type="send">
                        <img src="images/icon-edit.png" name="submit" value="true" style="width:16px; height:16px;"/></button>
                <?php
            echo "</form></td>";
            
            //DELETE BUTTON
            echo "<td>
                <form method=\"post\" action=\"$pagename\">
                <input type=\"hidden\" name=\"delete_bmID\" value=\"$bmID\">";
                ?>
                    <button type="send">
                        <img src="images/icon-delete.png" name="submit" value="true" style="width:16px; height:16px;"/></button>
                <?php
            echo "</form></td></tr>";
        }
        echo "</tbody></table>";
} else {
    echo "0 results. Try adding some links.";
}