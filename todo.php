<?php session_start(); 
unset($_SESSION['edit_bmID']);
$_SESSION['table'] = "r";
$pagename = htmlentities($_SERVER['PHP_SELF']);
include 'lib/mysqlconnect.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Alex Toneka's Research URLs</title>
    <?php include 'styles.php';?>
</head>  
<body>
 
    
<?php
//CODE TO PROCESS BOOKMARK DELETION IF REQUESTED//////////////
include 'lib/delete_bookmark.php';    
    
//PAGE HEADER////////////////
include 'lib/header.php';
?>

    
<nav>  
    <ul id="main-nav">
        <li class="navbutton"><a class="navlink" href="index.php">Home</a></li>
        <li class="navbutton"><a class="navlink" href="bookmarks.php">Bookmarks</a></li>
        <li class="navbutton"><a class="navlink navactive" href="todo.php">To Do</a></li>
        <li class="navbutton"><a class="navlink" href="money.php">$I/O</a></li>
        <li class="navbutton"><a class="navlink" href="showtracker.php">Show Tracker</a></li>
        <li class="currentpage">So much to do, so little time. What's next?</li>
    </ul>
</nav> 
        

<div id="page-wrap">    
    <section id="side-panel">  
        To do lists
    </section>


    <section id="top-line">
        <div id="top-line-content">
        </div>
    </section>


    <section id="results_table">
    </section>   
</div>
    
<?php include 'lib/footer.php'; ?>
    
</body>
</html>