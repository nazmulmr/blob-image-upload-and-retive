<?php
session_start();
if($_SESSION['brcode'] == NULL){
    header('Location:login.php');
}
echo "Branch Code=".$_SESSION['brcode'];
require_once 'vendor/autoload.php';
//use App\classes\Student;
use App\classes\Login;

if(isset($_POST['Submit']))
{
    $login = new Login();
    $oldpass= ($_POST['opwd']);
    $brcode=$_SESSION['brcode'];
    echo "brcode=".$brcode;
    echo "oldpass".$oldpass;
    $newpassword= ($_POST['npwd']);
    $sql=mysqli_query("SELECT brcode,password FROM users where password='$oldpass' && brcode='$brcode'");
    $num=mysqli_fetch_array($sql);
    echo "\n test=".$num;
    if($num>0)
    {
        $con=mysqli_query("update users set password='$newpassword' where brcode='$brcode'");
        $_SESSION['msg1']="Password Changed Successfully !!";
    }
    else
    {
        $_SESSION['msg1']="Old Password not match !!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login for Change Password</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            padding-top: 70px;
            /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
        }
    </style>
    <script type="text/javascript">
        function valid()
        {
            if(document.chngpwd.opwd.value=="")
            {
                alert("Old Password Filed is Empty !!");
                document.chngpwd.opwd.focus();
                return false;
            }
            else if(document.chngpwd.npwd.value=="")
            {
                alert("New Password Filed is Empty !!");
                document.chngpwd.npwd.focus();
                return false;
            }
            else if(document.chngpwd.cpwd.value=="")
            {
                alert("Confirm Password Filed is Empty !!");
                document.chngpwd.cpwd.focus();
                return false;
            }
            else if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
            {
                alert("Password and Confirm Password Field do not match  !!");
                document.chngpwd.cpwd.focus();
                return false;
            }
            return true;
        }
    </script>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="view.php">View Page</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
               <!-- <li>
                    <a href="http://www.phpgurukul.com/all-demos/">All Demos</a>
                </li>
                <li>
                    <a href="http://www.phpgurukul.com/category/php-projects/">Free Projects</a>
                </li>
                <li>
                    <a href="http://www.phpgurukul.com/contact-us/">Contact</a>
                </li>-->
            </ul>
        </div>
    </div>

</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="col-lg-12 text-center">
            <h1>Change your Password</h1>
            <p style="color:red;"><?php echo $_SESSION['msg1'];?><?php echo $_SESSION['msg1']="";?></p>
            <form name="chngpwd" action="" method="post" onSubmit="return valid();">
                <table align="center">
                    <tr height="50">
                        <td>Old Password :</td>
                        <td><input type="password" name="opwd" id="opwd"></td>
                    </tr>
                    <tr height="50">
                        <td>New Passowrd :</td>
                        <td><input type="password" name="npwd" id="npwd"></td>
                    </tr>
                    <tr height="50">
                        <td>Confirm Password :</td>
                        <td><input type="password" name="cpwd" id="cpwd"></td>
                    </tr>
                    <tr>
                        <td><a href="add.php">Back to login Page</a></td>
                        <td><input type="submit" name="Submit" value="Change Passowrd" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- jQuery Version 1.11.1 -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
