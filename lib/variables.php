<?php

//KEEP AT TOP OR IT WILL UNSET THE SESSION MODES!!
//UNSET SESSION MODE:EDIT
if (!isset($_POST['edit']) && !isset($_GET['edit']) && !isset($_POST['mode'])) {
    unset($_SESSION['mode']);
    //echo "<script>location.reload();</script>";
    //die();
}

//INITIATE DEFAULT SESSION MODE
if (!isset($_SESSION['mode'])) {
    $_SESSION['mode'] = "DEFAULT";
}

//SESSION MODE HAS BEEN CLEARED
if (isset($_SESSION['mode']) && empty($_SESSION['mode'])) {
    $_SESSION['mode'] = "DEFAULT";
}
    
//USER CLICKED EDIT BUTTON
if (isset($_GET['edit'])) {
    if ($_GET['edit'] == "true") {
        $_SESSION['mode'] = "EDIT";
    }
}

//USER CLICKED SAVE BUTTON
if (isset($_POST['edit'])) {
    $_SESSION['mode'] = "EDIT";
}
    
//USER CLICKED A CATEGORY
if (isset($_GET['catID'])) {
    $_SESSION['mode'] = "BROWSE";
    $_SESSION['catID'] = $_GET['catID'];
}
    
//USER CLICKED A COLLECTION
if (isset($_GET['collID'])) {
    $_SESSION['mode'] = "BROWSE";
    $_SESSION['collID'] = $_GET['collID'];
}
    


$pagename = htmlentities($_SERVER['PHP_SELF']);


//GET CATEGORY NAME
if (isset($_GET['catID'])) {
    $sql_category_name = 
    "SELECT ca.*
    FROM categories ca
    WHERE catID = ' " .$_GET['catID'] . " ' ";

    $result_category_name = $connection->query($sql_category_name);

    while ($category_name_fetch = $result_category_name->fetch_assoc()) {
        $category_name = $category_name_fetch['category'];
    }
}


//GET COLLECTION NAME
if (isset($_GET['collID'])) {
    $sql_collection_name = 
    "SELECT co.*
    FROM collections co
    WHERE collID = ' " .$_GET['collID'] . " ' ";

    $result_collection_name = $connection->query($sql_collection_name);

    while ($collection_name_fetch = $result_collection_name->fetch_assoc()) {
        $collection_name = $collection_name_fetch['collection'];
    }
}
?>