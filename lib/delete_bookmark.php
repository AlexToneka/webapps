<?php
//DELETE BOOKMARK CODE
if (isset($_POST['delete_bmID'])) {
    $delete_bmID = $_POST['delete_bmID'];
    
    $sql_delete_mapID =
    "DELETE FROM master
    WHERE masterBMID = $delete_bmID";    
    
    $sql_delete_bmID =
    "DELETE FROM bookmarks
    WHERE bmID = $delete_bmID";
         
    if ($connection->query($sql_delete_mapID) === TRUE) {
        if ($connection->query($sql_delete_bmID) === TRUE) {
            $deleted_bookmark = "Deleted a bookmark.";
        } else {
            $deleted_bookmark = "Master deleted. Bookmark not deleted...";
        }
    } else {
        $deleted_bookmark = "Nothing deleted.";
    }   
}
?>

