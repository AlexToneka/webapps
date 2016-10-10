<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Bookmarks: Alex's Wonderful, Useful Webapps</title>
    <?php include 'styles.php';?>
</head>  
<body>
 
    
<?php
//INCLUDES
include 'lib/mysqlconnect.php';
include 'lib/delete_bookmark.php';  
include 'lib/variables.php';
include 'lib/header.php';
?>
    
<nav>  
    <ul id="main-nav">
        <li class="navbutton"><a class="navlink" href="index.php">Home</a></li>
        <li class="navbutton"><a class="navlink navactive" href="bookmarks.php">Bookmarks</a></li>
        <li class="navbutton"><a class="navlink" href="todo.php">To Do</a></li>
        <li class="navbutton"><a class="navlink" href="money.php">$I/O</a></li>
        <li class="navbutton"><a class="navlink" href="showtracker.php">Show Tracker</a></li>
        <li class="currentpage">Bookmarks by category. Create a collection. Master the web.</li>
    </ul>
</nav> 
    

<div id="page-wrap">    
    <section id="side-panel">  
        <?php
        
        //KEEPS USER ON SAME PAGE AFTER SUBMITTING FORM DATA
        if (isset($_POST['mode'])) {
            if ($_POST['mode'] == "BROWSE") {
                $_SESSION['mode'] = "BROWSE";
                include 'lib/add_link_form.php';
            }
        }
        
        
        //BROWSE                
        if ($_SESSION['mode'] == "BROWSE") {
            
            //CATEGORY OR COLLECTION
            if (isset($_SESSION['catID']) || isset($_SESSION['collID'])) {
                include 'lib/add_link_form.php';
            }
            
            
            
        //EDIT
        } elseif ($_SESSION['mode'] == "EDIT") {
            
            //USER CLICKED EDIT BUTTON
            if (isset($_GET['edit'])) {
                
                if ($_GET['edit'] == "true") {
                    include 'lib/edit_link_form.php';
                }
            }
            
            //USER CLICKED SAVE BUTTON
            if (isset($_POST['edit'])) {
                include 'lib/process_edit.php';
                include 'lib/edit_link_form.php';
            }

            
            
        //DEFAULT ALL
        } else {
            include 'lib/bookmark_categories.php';
            include 'lib/bookmark_collections.php';
            include 'lib/filter_by_tag.php';
            unset($_SESSION['bmID']);
            unset($_SESSION['catID']);
            unset($_SESSION['collID']);
        }
        ?>
    </section>


    <?php if (isset($_POST['add'])) {include 'lib/process_add.php';} ?>


    <section id="top-line">
        <div id="top-line-content">
            <?php 
            if ($_SESSION['mode'] == "DEFAULT" && !isset($_GET['catID']) && !isset($_GET['collID'])) { 
                echo "<h3>All bookmarks</h3>"; 
            }
            if ($_SESSION['mode'] == "EDIT") { echo "<h3>Edit</h3>"; }
            if (isset($_GET['catID'])) { echo "<h3>Category: $category_name</h3>"; }
            if (isset($_GET['collID'])) { echo "<h3>Collection: $collection_name</h3>"; }
            ?>
        </div>
    </section>


    <section id="results_table">
        <?php
                             //print_r($post_tags); echo $catID; echo $collID;
                             //echo $_SESSION['catID']; echo $_SESSION['collID'];
        
        //EDIT
        if ($_SESSION['mode'] == "EDIT") {
            include 'lib\edit_show_result.php';
        } else {       
            include 'lib/results_table.php';
        }
        
        $connection->close();
        ?>
    </section>   
</div>
    
<?php 
    include 'lib/footer.php'; 
?>
    
    
 <!--DIAGNOSTICS-->   
<div style="background-color:yellow; width:500px; height:auto; position:absolute; top:20px; left:65%;"><?php echo print_r($_SESSION);?></div>
    
    
    
</body>
</html>