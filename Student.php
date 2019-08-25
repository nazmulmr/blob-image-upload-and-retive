<?php

namespace App\classes;

class Student
{
    public function saveStudentInfo(){
       echo "branch code=".$_SESSION['brcode'];
        extract($_POST);
        $image = $_FILES['imagefile']['tmp_name'];
        $file =$_SESSION['brcode'].$_FILES['imagefile']['name'];
        echo "file=".$file;
        $image = base64_encode(file_get_contents(addslashes($image)));
        $link = mysqli_connect('localhost','root','','test');
        $sql = "  INSERT INTO `hrdata` (`brcode`, `name`,`file`,`image`, `cellno`, `nid`, `pimsno`, `homezilla`, `homeuzilla`, `ppost`, `ppostdojoin`,
 `dob`, `entrypost`, `entrydojoin`, `highestdegree`, `passingyear`, `orderno`, `transferdate`, `pposting`) 
 VALUES ('$brcode','$name', '$file','$image', '$cellno','$nid', '$pimsno', '$homezilla', '$homeuzilla', '$ppost', '$ppostdojoin', '$dob', '$entrypost', 
 '$entrydojoin', '$highestdegree', '$passingyear', N'$orderno', '$transferdate', '$pposting');";
//        echo "".$sql;
      //  $sql = "INSERT INTO students(student_name,mobile_no,email_address) VALUES ('$student_name','$mobile_no','$email_address')";
        if(mysqli_query($link,$sql)){
            header('location:successful.php');
                       return 'Branch Data saved successfully';
        } else {
            die('Query Problem'.mysqli_error($link));
        };

    }

    public function viewStudentInfo($brcode){
         echo "Branch Code=".$_SESSION['brcode'];
        $link = mysqli_connect('localhost','root','','test');
        $sql = "SELECT * FROM hrdata WHERE  brcode = $brcode";
        if($result = mysqli_query($link,$sql)){
            return $result;
        } else {
            die('Query Problem'.mysqli_error($link));
        }
    }

    public function getStudentInfoById($sr){
        // echo "branch code=".$_SESSION['id'];
       //  echo " || Input Serial No=".$_GET['sr'];
        $link = mysqli_connect('localhost','root','','test');
        $sql = "SELECT * FROM hrdata WHERE  sr = $sr";
        if($result = mysqli_query($link,$sql)){
            return $result;
        } else {
            die('Query Problem'.mysqli_error($link));
        }
    }

    public function updateStudentInfo(){
        // echo "branch code=".$_SESSION['id'];

        extract($_POST);


        $image = $_FILES['imagefile']['tmp_name'];
        $file =$_GET['sr'].$_FILES['imagefile']['name'];
        $image = base64_encode(file_get_contents(addslashes($image)));

        $link = mysqli_connect('localhost','root','','test');
        $sql = "UPDATE hrdata SET name = '$name', file='$file', image='$image', cellno= '$cellno', nid= '$nid', pimsno= '$pimsno', homezilla = '$homezilla', homeuzilla= '$homeuzilla',ppost='$ppost',ppostdojoin='$ppostdojoin',dob='$dob',entrypost='$entrypost', entrydojoin='$entrydojoin',
highestdegree='$highestdegree',passingyear='$passingyear',orderno ='$orderno',transferdate ='$transferdate', pposting='$pposting'    WHERE sr = '$sr'";
        if(mysqli_query($link,$sql)){
            header('Location:view.php');
        } else {
            die('Query Problem'.mysqli_error($link));
        };
    }

    public function deleteStudentInfo($brcode){
        $link = mysqli_connect('localhost','root','','test');
        $sql = "DELETE FROM hrdata WHERE brcode = $brcode";
        if(mysqli_query($link,$sql)){
            header('Location:view.php');
        }else {
            die('Query Problem'.mysqli_error($link));
        };
    }

    public function searchStudentInfo(){
        extract($_POST);
        $link = mysqli_connect('localhost','root','','test');
//        $sql = "SELECT * FROM students WHERE student_name = '$search_text' || mobile_no = '$search_text'";
        $sql = "SELECT * FROM hrdata WHERE brcode LIKE '%$search_text%' || mobile_no LIKE '%$search_text%' || email_address LIKE '%$search_text%'";
        if($result = mysqli_query($link,$sql)){
            return $result;
        } else {
            die('Query Problem'.mysqli_error($link));
        }
    }
}