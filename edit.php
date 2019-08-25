<?php
session_start();
if($_SESSION['brcode'] == NULL){
    header('Location:login.php');
}
echo "Branch Code=".$_SESSION['brcode'];
require_once 'vendor/autoload.php';
use App\classes\Student;
use App\classes\Login;
$student = new Student();
$login = new Login();
$result = $student->getStudentInfoById($_GET['sr']);

//$result = $student->getStudentInfoById($student['sr']);

$data = mysqli_fetch_assoc($result);


$message= '';
if(isset($_POST['btn'])){
    $message = $student->updateStudentInfo();
}


if(isset($_GET['logout'])){
    $login->logout();
}





?>
<hr>
<!--a href="add.php">Add </a> ||-->
<a href="view.php">View </a> ||

<a href="  "> <?php echo $_SESSION['name'] ?></a>

|| <a href="?logout=true" style="color:red">   Logout</a>
<hr>

<h2><?php echo $message; ?></h2>
<form action="" method="post"  enctype="multipart/form-data">
    <table>

        <tr>
            <td>Name:</td>
            <td>
                <input type="hidden" name="sr" value="<?php echo $data['sr'] ?>">
                <input type="hidden" name="brcode" value="<?php echo $data['brcode'] ?>">
                <input type="text" name="name" value="<?php echo $data['name']   ?>"   align = "center">

            </td>
        </tr>
        <tr>

            <td>Cell No:</td>
            <td><input type="text" name="cellno" value="<?php echo $data['cellno'] ?>"></td>
        </tr>
        <tr>
            <td>National Id :</td>
            <td><input type="text" name="nid" value="<?php echo $data['nid'] ?>"></td>
        </tr>
        <tr>
            <td>PIMS No :</td>
            <td><input type="text" name="pimsno" value="<?php echo $data['pimsno'] ?>"></td>
        </tr>
        <tr>
            <td>Home Zilla  :</td>
            <td><input type="text" name="homezilla" value="<?php echo $data['homezilla'] ?>"></td>
        </tr>
        <tr>
            <td>Home Upzilla :</td>
            <td><input type="text" name="homeuzilla" value="<?php echo $data['homeuzilla'] ?>"></td>
        </tr>
        <tr>
            <td>Present Post  :</td>
            <td><input type="text" name="ppost" value="<?php echo $data['ppost'] ?>"></td>
        </tr>
        <tr>
            <td>Present Post Joining Date  :</td>
            <td><input type="text" name="ppostdojoin" value="<?php echo $data['ppostdojoin'] ?>"></td>
        </tr>
        <tr>
            <td>Date of Birth :</td>
            <td><input type="text" name="dob" value="<?php echo $data['dob'] ?>"></td>
        </tr>
        <tr>
            <td>Entry Post  :</td>
            <td><input type="text" name="entrypost" value="<?php echo $data['entrypost'] ?>"></td>
        </tr>
        <tr>
            <td>Entry Join Date :</td>
            <td><input type="text" name="entrydojoin" value="<?php echo $data['entrydojoin'] ?>"></td>
        </tr>
        <tr>
            <td>Highest Degree  :</td>
            <td><input type="text" name="highestdegree" value="<?php echo $data['highestdegree'] ?>"></td>
        </tr>
        <tr>
            <td>Passing Year:</td>
            <td><input type="text" name="passingyear" value="<?php echo $data['passingyear'] ?>"></td>
        </tr>
        <tr>
            <td>orderno :</td>
            <td><input type="text" name="orderno" value="<?php echo $data['orderno'] ?>"></td>
        </tr>
        <tr>
            <td>Transfer Date :</td>
            <td><input type="text" name="transferdate" value="<?php echo $data['transferdate'] ?>"></td>
        </tr>
        <tr>
            <td>Present Posting Palace :</td>
            <td><input type="text" name="pposting" value="<?php echo $data['pposting'] ?>"></td>
        </tr>

        <tr>
            <td>  Select image to upload:</td>
            <td>     <input type="text" name="imagefile" value="<?php echo $data['file']?>" ></td>
              <!--<td>  <input type="hidden" name="sr" value="<?php /*echo $_GET['sr'];*/?>" id="sr"></td>-->
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" name="btn" value="Save"></td>
        </tr>
    </table>
</form>

<?php
//Connect to server
echo "sr=".$_GET['sr'];
echo "nid=".$data['nid'];
$conn = mysqli_connect('localhost','root','' ) OR DIE(mysqli_error());
$selectalreadycreateddatabase = mysqli_select_db($conn, "test");

if (isset($_POST['submit'])) {
    if (getimagesize($_FILES['imagefile']['tmp_name']) == false) {
        echo "<br />Please Select An Image.";
    } else {

//declare variables
        $image = $_FILES['imagefile']['tmp_name'];
        $name =$_GET['sr'].$_FILES['imagefile']['name'];

        $image = base64_encode(file_get_contents(addslashes($image)));

        $sqlInsertimageintodb = "INSERT INTO `imageuploadphpmysqlblob`(`name`, `image`) VALUES ('$name','$image')";
        if (mysqli_query($conn, $sqlInsertimageintodb)) {
            echo "<br />Image uploaded successfully.";
        } else {
            echo "<br />Image Failed to upload.<br />";
        }
    }
}

//Retrieve image from database and display it on html webpage
function displayImageFromDatabase(){
//use global keyword to declare conn inside a function
    global $conn;
    $sqlselectimageFromDb = "SELECT * FROM `imageuploadphpmysqlblob` ";
    $dataFromDb = mysqli_query($conn, $sqlselectimageFromDb);
    while ($row = mysqli_fetch_assoc($dataFromDb)) {
        if (startsWith ($row['name'], $_GET['sr'])) {
            echo '<img height="100px" width="100px" src=data:image;base64,'.$row['image'].'/>';
        }

    }
}

function startsWith ($string, $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}
//calling the function to display image
displayImageFromDatabase();
//Finnaly close connection
if (mysqli_close($conn)) {
    echo "<br />Connection Closed.......";
}
?>
    <script >
//document.getElementById('sr').
        function readURL(input) {
            //alert('sasdf');
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        /*
                $("#imgInp").change(function() {
                    alert('sasdf');
                    readURL(this);
                });*/
    </script>

    <body>

    <form action="test.php" method="post" enctype="multipart/form-data">
        Select image to upload <br />
        <input type="file" name="imagefile" onchange='readURL(this)'>
        <input type="hidden" name="sr" value="<?php echo $_GET['sr'];?>" id="sr">
        <br />
        <input type="submit" name="submit" value="Upload">
    </form>
    </body>

<!--    <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <form action="" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="imgInp" onchange='readURL(this)'>
        <img id="blah" src="#" alt="your image" />
        <input type="submit" value="Upload Image" name="submit">
    </form>
    </body>
    </html>-->

<?php
/*$target_dir = "uploads/";
echo "sr=".$_GET['sr'];
echo "nid=".$data['nid'];
$target_file = $target_dir .$data['brcode'].$_GET['sr'].$data['nid']. basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    $content =addslashes (file_get_contents($_FILES["fileToUpload"]["tmp_name"]));
    $imgData = base64_decode($content);
    echo "image=".$imgData;
    $link = mysqli_connect('localhost','root','','test') OR DIE(mysqli_error());
    //  $sql = "INSERT INTO upload_image (sr,brcode,nid,img) VALUES ('$GET['sr']','$data['brcode']','$data['nid']',{$imgData}');";
    $sql = "INSERT INTO upload_image (img) VALUES ($imgData);";
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 200000) {
    echo "File is too large. limit is 2000kbps";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
/*
        $imgData =addslashes (file_get_contents($_FILES["fileToUpload"]["tmp_name"]));
        echo "image=".$imgData;
        $link = mysqli_connect('localhost','root','','test') OR DIE(mysqli_error());
      //  $sql = "INSERT INTO upload_image (sr,brcode,nid,img) VALUES ('$GET['sr']','$data['brcode']','$data['nid']',{$imgData}');";
          $sql = "INSERT INTO upload_image (img) VALUES ('{$imgData}');";*/
/*
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}*/
?>