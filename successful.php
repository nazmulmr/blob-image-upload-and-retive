<?php
session_start();
if(isset($_GET['logout'])){
//$login->logout();
    unset($_SESSION['brcode']);
    unset($_SESSION['name']);

    header('Location:login.php');
}
?>
<hr>
<!--a href="add-student.php">Add Student</a> ||-->
<a href="view.php">View Personal Info.</a> ||
<a href="?logout=true">Logout</a> ||
<a href=""><?php echo $_SESSION['name'] ?></a>
<hr>

<H1>Saved successfully</H1>
