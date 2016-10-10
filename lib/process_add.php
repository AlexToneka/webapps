<?php 
$postname = mysqli_real_escape_string($connection, strip_tags(trim($_POST['name'])));
$posturl = mysqli_real_escape_string($connection, strip_tags(trim($_POST['url'])));
$postnotes = mysqli_real_escape_string($connection, strip_tags(trim($_POST['notes'])));
$shortdesc = mysqli_real_escape_string($connection, strip_tags(trim($_POST['shortdesc'])));

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



//DELETE FROM MAP AND BOOKMARKS    WORK IN PROGRESS
if (isset($_POST['delete_bmID'])) {
    $sql_delete_mapID =
    "DELETE FROM master
    WHERE master.masterID = '".$_POST['delete_bmID']."'";    
    
    $sql_delete_bmID =
    "DELETE FROM bookmarks
    WHERE bmID = '".$_POST['delete_bmID']."'";
         
    if ($connection->query($sql_delete_mapID) === TRUE) {
        if ($connection->query($sql_delete_bmID) === TRUE) {
            $deleted_bookmark = "Deleted a bookmark and map.";
        } else {
            $deleted_bookmark = "Bookmark NOT deleted. Map IS deleted.";
        }
    } else {
        $deleted_bookmark = "Neither bookmark nor map deleted.";
    }   
}    

    

//CHECK IF TAGS WERE SELECTED
if (isset($_POST['tags'])) {
    $post_tags = $_POST['tags'];
//CHECK IF NO NEW TAGS AND NO CHECKED TAGS
//} elseif (empty($_POST['newtag']) && empty($_POST['tags'])) {
} else {
    $post_tags = array("1"); //None defined
}



//INSERT INTO BOOKMARKS
$sql_insert_bookmarks = 
"INSERT INTO bookmarks (bmTitle, bmURL, bmShortDesc, bmNotes)
VALUES ('$postname', '$posturl', '$shortdesc', '$postnotes')";

if ($connection->query($sql_insert_bookmarks) === TRUE) {
    echo "<font color=\"#00b300\">Added new link: </font>" . $postname;
} else {
    echo "Not inserted into bookmarks.";
}
    
    
    
//GET NEW BOOKMARK ID FOR USE IN MASTER
$sql_get_bmID =
"SELECT bmID
FROM bookmarks
ORDER BY bmID DESC
LIMIT 1";
$new_bmID_result = mysqli_fetch_assoc($connection->query($sql_get_bmID));
$new_bmID = $new_bmID_result['bmID'];

    
    
//CHECK IF NEW TAG WAS SUBMITTED AND INSERT INTO MASTER
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

        //INSERT NEW BOOKMARK AND NEW TAG INTO MASTER
        $sql_insert_newtag_to_map =
        "INSERT INTO master (masterBMID, masterTagID, masterCatID, masterCollID)
        VALUES ($new_bmID, $newtag_id, $catID, $collID)";

        if ($connection->query($sql_insert_newtag_to_map)) {
            //new tag inserted into Master
        } else {
            echo "New Bookmark:New Tag values not inserted into Master";
        }
    } else {
        echo "New Tag not inserted into Tags.";
    }
}

    
    
//CHECK IF TAGS WERE SELECTED AND INSERT INTO MASTER
if (isset($post_tags)) {
    foreach ($post_tags as $tag) {
        $sql_insert_into_master =
        "INSERT INTO master (masterBMID, masterTagID, masterCatID, masterCollID)
        VALUES ($new_bmID, $tag, $catID, $collID)";
        $connection->query($sql_insert_into_master);
    }
}

echo " (Bookmark #" . $new_bmID . ")";
  
?>