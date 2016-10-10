<?php



//GET AND STORE CATEGORY AND COLLECTION ID
$sql_row_to_edit = 
    "SELECT m.*
    FROM master m
    WHERE m.masterBMID = '" . $_SESSION['bmID'] . "'";
$result_row_to_edit = $connection->query($sql_row_to_edit);

while($row = $result_row_to_edit->fetch_assoc()) {
    $_SESSION['catID'] = $row['masterCatID'];
    $_SESSION['collID'] = $row['masterCollID'];
}

if (isset($_SESSION['catID'])) {
    $catID = $_SESSION['catID'];
} elseif (!isset($_SESSION['catID'])) {
    $catID = "NULL";
}
                                       
if (isset($_SESSION['collID'])) {
    $collID = $_SESSION['collID'];
} elseif (!isset($_SESSION['collID'])) {
    $collID = "NULL";
}



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
    $notes = $row['bmNotes'];
}



//GET AND STORE TAGS
$sql_tags = 
"SELECT b.bmID, t.tagID
FROM master bt, bookmarks b, tags t
WHERE bt.masterTagID = t.tagID
AND bt.masterBMID = b.bmID
AND b.bmID = '" . $_SESSION['bmID'] . "'";
$result_tags = $connection->query($sql_tags);


while($row = $result_tags->fetch_assoc()) {
    
    if (isset($tags)) {
        array_push($tags, $row['tagID']);
    }
    
    if (!isset($tags)) {
        $tags = array($row['tagID']);
    }    
}


//IF TAGS WERE CHECKED
if (!empty($_POST['tags'])) {
    $tags = $_POST['tags'];
    
//IF NO NEW TAGS AND NO CHECKED TAGS
} elseif (empty($_POST['newtag']) && empty($_POST['tags'])) {
    if (!isset($tags)) {
        if ($_SESSION['table'] == "a") {$post_tags = array("4");} //None defined
        if ($_SESSION['table'] == "f") {$post_tags = array("17");} //None defined
        if ($_SESSION['table'] == "r") {$post_tags = array("19");} //None defined
    }
}
//OTHERWISE KEEP OLD TAG DATA


//GET AND STORE NEW DATA FROM FORM
if (!empty($_POST['name'])) {
    $title = mysqli_real_escape_string($connection, strip_tags(trim($_POST['name'])));
}

if (!empty($_POST['url'])) {
    $url = mysqli_real_escape_string($connection, strip_tags(trim($_POST['url'])));
}

if (!empty($_POST['notes'])) {
    $notes = mysqli_real_escape_string($connection, strip_tags(trim($_POST['notes'])));
}

if (!empty($_POST['shortdesc'])) {
    $shortdesc = mysqli_real_escape_string($connection, strip_tags(trim($_POST['shortdesc'])));
}


//DELETE FROM MAP
$sql_delete_mapID =
"DELETE FROM master
WHERE masterBMID = '".$_SESSION['bmID']."'";    
$connection->query($sql_delete_mapID);
    

//UPDATE BOOKMARK
$sql_update_bookmarks = 
"UPDATE bookmarks
SET bmTitle = '$title',
bmURL = '$url',
bmShortDesc = '$shortdesc',
bmNotes = '$notes'
WHERE bmID = '".$_SESSION['bmID']."'";

if ($connection->query($sql_update_bookmarks) === TRUE) {

    //CHECK IF NEW TAG WAS SUBMITTED AND CREATE SQL CODE
    if (!empty($_POST['newtag'])) {
        $newtag = mysqli_real_escape_string($connection, strip_tags(trim($_POST['newtag'])));
        
        $sql_insert_newtag =
        "INSERT INTO tags (tagName)
        VALUES ('$newtag')";
        
        if ($connection->query($sql_insert_newtag) === TRUE) {
            //GET ID OF NEW TAG
            $sql_get_newtag_id =
            "SELECT tagID
            FROM tags
            ORDER BY tagID DESC
            LIMIT 1";
            
            $get_newtag_id = mysqli_fetch_assoc($connection->query($sql_get_newtag_id));
            $newtag_id = $get_newtag_id['tagID'];
            
            //LINK NEW TAG WITH NEW BOOKMARK
            $sql_insert_newtag_to_map =
            "INSERT INTO master (masterBMID, masterTagID, masterCatID, masterCollID)
            VALUES (
            '".$_SESSION['bmID']."',
            $newtag_id,
            $catID, 
            $collID; 
            )";
            $connection->query($sql_insert_newtag_to_map);
        } else {
            echo "ERROR: New tag not inserted.";
        }
    }
    
    //INSERT INTO MAP
    foreach ($tags as $tag) {
        $sql_insert_into_map =
            "INSERT INTO master (masterBMID, masterTagID, masterCatID, masterCollID)
            VALUES (
            '".$_SESSION['bmID']."',
            $tag,
            $catID,
            $collID
            )";
        $connection->query($sql_insert_into_map);
    }
    
    
    //GET ID OF NEW BOOKMARK
    $biggest_bmID_result = $connection->query(
    "SELECT bmID
    FROM bookmarks
    ORDER BY bmID DESC
    LIMIT 1");

    $row = $biggest_bmID_result->fetch_assoc();
    $output_message = " (Bookmark #" . $row['bmID'] . ")" .
            "<font color=\"#00b300\"> Update Succesful: </font>" . $title . " // ";
} else {
    $output_message = "<font color=\"#B30000\"> Update Failed: </font>" . $title . 
    $connection->error;
        
}  
?>