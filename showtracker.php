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
include 'lib/header.php';
?>
    
<nav>  
    <ul id="main-nav">
        <li class="navbutton"><a class="navlink" href="index.php">Home</a></li>
        <li class="navbutton"><a class="navlink" href="bookmarks.php">Bookmarks</a></li>
        <li class="navbutton"><a class="navlink" href="todo.php">To Do</a></li>
        <li class="navbutton"><a class="navlink" href="money.php">$I/O</a></li>
        <li class="navbutton"><a class="navlink navactive" href="showtracker.php">Show Tracker</a></li>
        <li class="currentpage">Look for a show. Pickup where you left off. Take control.</li>
    </ul>
</nav> 
    

<div id="page-wrap">    
    <section id="side-panel">  
        Track which episode of a show I am on.
    </section>


    <section id="top-line">
        <div id="top-line-content">

        </div>
    </section>


    <section id="results_table">

    </section>   
</div>
    
<?php 
    include 'lib/footer.php'; 
?>
    
    
    
</body>
</html>