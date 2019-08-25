<?php
session_start();
if($_SESSION['brcode'] == NULL){
    header('Location:login.php');
}

require_once 'vendor/autoload.php';
use App\classes\Student;
use App\classes\Login;
$student = new Student();
$login = new Login();
$result = $student->viewStudentInfo($_SESSION['brcode']);
$result1 = $student->getStudentInfoById($_SESSION['brcode']);
if(isset($_GET['status'])){
    $student->deleteStudentInfo($_GET['brcode']);
}

if(isset($_POST['btn'])){
    $result = $student->searchStudentInfo();
}

if(isset($_GET['logout'])){
    $login->logout();
}

    ?>
    <hr>
    <a href="add.php">Add Personal Info</a> ||
    <a href=""><?php echo $_SESSION['brcode'] ?></a> ||
    <a href="?logout=true" style="color:red">   Logout</a>
<!--    <hr>
    <form action="" method="post">
        <table>
            <tr>
                <td>Search Here</td>
                <td><input type="text" name="search_text"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="btn"></td>
            </tr>
        </table>
    </form>
    <hr>-->
    <thead>

    </thead>

    <table border="1">
        <tr>
            <th>Action</th>
            <th>Branch Code</th>
            <th>Name</th>
           <!-- <th>File Name</th>-->
            <th>Image</th>
            <th>Cell_No</th>
            <th>National_ID</th>
            <th>PIMS_No</th>
            <th>Home_Zilla </th>
            <th>Home Upzilla</th>
            <th>Present Post</th>
            <th>Prepsent_Post Joining_Date</th>
            <th>Date_of_Birth</th>
            <th>Entry Post</th>
            <th>Entry_Date of_Join</th>
            <th>Highest Degree</th>
            <th>Passing Year</th>
            <th>Abek_to_PSB OrderNo</th>
            <th>Transfer Date</th>
            <th>Preset Posting </th>
        </tr>
        <?php while($student = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><a href="edit.php?sr=<?php echo $student['sr'];?>">Edit</a>
                    <!--a href="?status=delete&&id=<?php echo $student['brcode'];?>" onclick="return confirm('Are you sure to delete this data?')">Delete</a>
               --> </td>
                <td><?php echo $student['brcode'] ?></td>
                <td><?php echo $student['name'] ?></td>
      <!--          <td><?php /*echo $student['file'] */?></td>-->
                <td>
                    <img src="data:image/png;base64, <?php echo $student['image'] ?>  " height="150" width="150"/>
                </td>
                <td><?php echo $student['cellno'] ?></td>
                <td><?php echo $student['nid'] ?></td>
                <td><?php echo $student['pimsno'] ?></td>
                <td><?php echo $student['homezilla'] ?></td>
                <td><?php echo $student['homeuzilla'] ?></td>
                <td><?php echo $student['ppost'] ?></td>
     <!--           <td><?php /*echo $student['ppostdojoin'] */?></td>-->
                <td><?php echo $student['dob'] ?></td>
                <td><?php echo $student['entrypost'] ?></td>
                <td><?php echo $student['entrydojoin'] ?></td>
                <td><?php echo $student['highestdegree'] ?></td>
                <td><?php echo $student['passingyear'] ?></td>
                <td><?php echo $student['orderno'] ?></td>
                <td><?php echo $student['transferdate'] ?></td>
                <td><?php echo $student['pposting'] ?></td>
            </tr>
        <?php } ?>
    </table>

