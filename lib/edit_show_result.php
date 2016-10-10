<?php
$sql_edit_show_bm = 
"SELECT b.*
FROM bookmarks b
WHERE bmID = '" . $_SESSION['bmID'] . "'";

$sql_edit_show_cat = 
"SELECT m.*, b.*, t.*, ca.*
FROM master m, bookmarks b, tags t, categories ca
WHERE m.masterBMID = b.bmID
AND m.masterTagID = t.tagID
AND m.masterCatID IS NOT NULL
AND m.masterCatID = ca.catID
AND m.masterBMID = '" . $_SESSION['bmID'] . "'
GROUP BY m.masterID
ORDER BY ca.category";

$sql_edit_show_coll = 
"SELECT m.*, b.*, t.*, co.*
FROM master m, bookmarks b, tags t, collections co
WHERE m.masterBMID = b.bmID
AND m.masterTagID = t.tagID
AND m.masterCollID IS NOT NULL
AND m.masterCollID = co.collID
AND m.masterBMID = '" . $_SESSION['bmID'] . "'
GROUP BY m.masterID
ORDER BY co.collection";

$result_edit_show_bm = $connection->query($sql_edit_show_bm);
$result_edit_show_cat = $connection->query($sql_edit_show_cat);
$result_edit_show_coll = $connection->query($sql_edit_show_coll);

if ($row = $result_edit_show_bm->fetch_assoc()) {
    
    echo "<div class=\"edit-page-container\">";
    
    echo "<span class=\"edit-info-header\">Title : </span> " . 
        $row['bmTitle'] . "<br /><br />";
    echo "<span class=\"edit-info-header\">URL : </span> " .
        $row['bmURL'] . "<br /><br />";
    echo "<span class=\"edit-info-header\">Summary : </span> " .
        $row['bmShortDesc'] . "<br /><br />";
    echo "<span class=\"edit-info-header\">Notes : </span> " . 
        $row['bmNotes'] . "<br /><br />";
    echo "<span class=\"edit-info-header\">Tags : </span> ";
    
    echo "<br />Associated categories: ";
    
    if ($result_edit_show_cat->num_rows > 0) { 
        while($row_cat = $result_edit_show_cat->fetch_assoc()) {
            echo $row_cat['category'] . ", ";
        }
    }
    
    echo "<br />Associated collections: ";
    
    if ($result_edit_show_coll->num_rows > 0) { 
        while($row_coll = $result_edit_show_coll->fetch_assoc()) {
            echo $row_coll['collection'] . ", ";
        }
    }
    echo "</div>";
}