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

$message='';
if(isset($_POST['btn'])){
    $message = $student->saveStudentInfo();
}

if(isset($_GET['logout'])){
    $login->logout();
}

echo "branch code=".$_SESSION['brcode'];
?>
<html lang="en">
<head>
    <title>Hr Data</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js" xmlns:background-color="http://www.w3.org/1999/xhtml"
            xmlns:background-color="http://www.w3.org/1999/xhtml" xmlns:background-color="http://www.w3.org/1999/xhtml"
            xmlns:background-color="http://www.w3.org/1999/xhtml" xmlns:background-color="http://www.w3.org/1999/xhtml"></script>
<!--    <script>
        p.groove {border-style: groove;}
        function myFunction() {
            //  alert("OOKKKK")
            $( "#txt8" ).datepicker();
            $( "#txt8" ).datepicker("show");
        }
    </script>-->
<body >
</head>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="add.php">Add Personal Info.</a></li>
            <li><a href="view.php">View </a></li>
            <li><a href=""><?php echo $_SESSION['name'] ?></a></li>
            <li> <a href="?logout=true" style="color:red"   >   Logout</a></li>
        </ul>
        <button class="btn btn-danger navbar-btn"><a href="?logout=true" style="color:red"   >   Logout </a></button>
    </div>
</nav>
<hr>
    <a href="add.php">Add Personal Info.</a> ||
    <a href="view.php">View </a> ||
    <a href=""><?php echo $_SESSION['name'] ?></a> ||
    <a href="?logout=true" style="color:red"   >   Logout</a>
<hr>
<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <table class="table" id="myTable" border="1" bgcolor="#f0ffff">
            <thead>
            <tr>
                <th></th>
                <th>Field</th>
                <th>Data</th>

            </tr>
            </thead>
            <tbody>

            <tr style="font-weight: bold;">
                <td></td>
                <td><input type="hidden" name="brcode"  value ="<?php echo $_SESSION['brcode'] ?>" ></td>
                <td> </td>
            </tr>

            <tr class="success" style="font-weight: bold;" >
                <td></td>
                <td> 1. Full Name :</td></p>
                <td><input type="text" id="txt1"   name="name" required></td>
            </tr>

            <tr class="danger" style="font-weight: bold;">
                <td></td>
                <td>2. Mobile No  :</td>
                <td><input type="text" id="txt2"  name="cellno"  ></td>
            </tr>
            <tr style="font-weight: bold;">
            <td></td>
            <td>3. National Id :</td>
                <td><input type="text" id="txt3" name="nid"  ></td>
            </tr>
            <tr style="font-weight: bold;">
                <td></td>
                <td>4. Personal Information Number(PIMS No.):</td>
                <td><input type="text" id="txt4"  name="pimsno"    ></td>
            </tr>
            <tr style="font-weight: bold;">
                <td></td>
                <td>5.Home District   :</td>
                <td><select id="txt5"  name="homezilla" >
                        <option value="None">-- Select --</option>
                        <option value="Bagerhat">Bagerhat</option>
                        <option value="Bandarban">Bandarban</option>
                        <option value="Barguna">Barguna</option>
                        <option value="Barisal">Barisal</option>
                        <option value="Bhola">Bhola</option>
                        <option value="Bogra">Bogra</option>
                        <option value="Brahmanbaria">Brahmanbaria</option>
                        <option value="Chandpur">Chandpur</option>
                        <option value="Chapai Nawabganj">Chapai Nawabganj</option>
                        <option value="Chittagong">Chittagong</option>
                        <option value="Chuadanga">Chuadanga</option>
                        <option value="Comilla">Comilla</option>
                        <option value="Cox'S Bazar">Coxs Bazar</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Dinajpur">Dinajpur</option>
                        <option value="Faridpur">Faridpur</option>
                        <option value="Feni">Feni</option>
                        <option value="Gaibandha">Gaibandha</option>
                        <option value="Gazipur">Gazipur</option>
                        <option value="Gopalganj">Gopalganj</option>
                        <option value="Habiganj">Habiganj</option>
                        <option value="Jamalpur">Jamalpur</option>
                        <option value="Jessore">Jessore</option>
                        <option value="Jhalokathi">Jhalokathi</option>
                        <option value="Jhenaidah">Jhenaidah</option>
                        <option value="Joypurhat">Joypurhat</option>
                        <option value="Khagrachari">Khagrachari</option>
                        <option value="Khulna">Khulna</option>
                        <option value="Kishoreganj">Kishoreganj</option>
                        <option value="Kurigram">Kurigram</option>
                        <option value="Kushtia">Kushtia</option>
                        <option value="Laksmipur">Laksmipur</option>
                        <option value="Lalmonirhat">Lalmonirhat</option>
                        <option value="Madaripur">Madaripur</option>
                        <option value="Magura">Magura</option>
                        <option value="Manikganj">Manikganj</option>
                        <option value="Maulavibazar">Maulavibazar</option>
                        <option value="Meherpur">Meherpur</option>
                        <option value="Munshiganj">Munshiganj</option>
                        <option value="Mymensingh">Mymensingh</option>
                        <option value="Naogaon">Naogaon</option>
                        <option value="Narail">Narail</option>
                        <option value="Narayangonj">Narayangonj</option>
                        <option value="Narsingdi">Narsingdi</option>
                        <option value="Natore">Natore</option>
                        <option value="Netrokona">Netrokona</option>
                        <option value="Nilphamari">Nilphamari</option>
                        <option value="Noakhali">Noakhali</option>
                        <option value="Pabna">Pabna</option>
                        <option value="Panchagarh">Panchagarh</option>
                        <option value="Patuakhali">Patuakhali</option>
                        <option value="Perojpur">Perojpur</option>
                        <option value="Rajbari">Rajbari</option>
                        <option value="Rajshahi">Rajshahi</option>
                        <option value="Rangamati">Rangamati</option>
                        <option value="Rangpur">Rangpur</option>
                        <option value="Satkhira">Satkhira</option>
                        <option value="Shariatpur">Shariatpur</option>
                        <option value="Sherpur">Sherpur</option>
                        <option value="Sirajganj">Sirajganj</option>
                        <option value="Sunamganj">Sunamganj</option>
                        <option value="Sylhet">Sylhet</option>
                        <option value="Tangail">Tangail</option>
                        <option value="Thakurgaon">Thakurgaon</option>
                    </select></td>
            </tr>
            <tr style="font-weight: bold;">
                <td></td>
                <td>6.Home Upazilla : </td>
                <td><select id="txt6"  name="homeuzilla" >
                        <option value="None">-- Select --</option>
                        <option value="Amtali ">Amtali </option>
                        <option value="Patharghata ">Patharghata </option>
                        <option value="Bamna ">Bamna </option>
                        <option value="Betagi ">Betagi </option>
                        <option value="Barguna Sadar ">Barguna Sadar </option>
                        <option value="Taltaly ">Taltaly </option>
                        <option value="Mehendiganj ">Mehendiganj </option>
                        <option value="Barisal Sadar ">Barisal Sadar </option>
                        <option value="Wazirpur ">Wazirpur </option>
                        <option value="Agailjhara ">Agailjhara </option>
                        <option value="Babuganj Barisal">Babuganj Barisal</option>
                        <option value="Gournadi ">Gournadi </option>
                        <option value="Banaripara ">Banaripara </option>
                        <option value="Hijla ">Hijla </option>
                        <option value="Muladi ">Muladi </option>
                        <option value="Bakerganj ">Bakerganj </option>
                        <option value="Tajumuddin ">Tajumuddin </option>
                        <option value="Manpura Bhola">Manpura Bhola</option>
                        <option value="Daulatkhan ">Daulatkhan </option>
                        <option value="Lalmohan ">Lalmohan </option>
                        <option value="Bhola Sadar ">Bhola Sadar </option>
                        <option value="Charfession ">Charfession </option>
                        <option value="Borhanuddin Bhola">Borhanuddin Bhola</option>
                        <option value="Nalchiti ">Nalchiti </option>
                        <option value="Jhalokathi Sadar ">Jhalokathi Sadar </option>
                        <option value="Rajapur ">Rajapur </option>
                        <option value="Kathalia ">Kathalia </option>
                        <option value="Patuakhali Sadar ">Patuakhali Sadar </option>
                        <option value="Rangabali ">Rangabali </option>
                        <option value="Dasmina ">Dasmina </option>
                        <option value="Bauphal ">Bauphal </option>
                        <option value="Galachipa ">Galachipa </option>
                        <option value="Mirjaganj ">Mirjaganj </option>
                        <option value="Dumki ">Dumki </option>
                        <option value="Kalapara Patuakhali">Kalapara Patuakhali</option>
                        <option value="Mothbaria Perojpur">Mothbaria Perojpur</option>
                        <option value="Kaukhali ">Kaukhali </option>
                        <option value="Perojpur Sadar ">Perojpur Sadar </option>
                        <option value="Bhandaria ">Bhandaria </option>
                        <option value="Nesarabad (Shawrupkathi) ">Nesarabad (Shawrupkathi) </option>
                        <option value="Zia Nagar (Indurkani) ">Zia Nagar (Indurkani) </option>
                        <option value="Nazirpur ">Nazirpur </option>
                        <option value="Bandarban Sadar ">Bandarban Sadar </option>
                        <option value="Thanchi Bandarban">Thanchi Bandarban</option>
                        <option value="Rawanchari">Rawanchari</option>
                        <option value="Lama ">Lama </option>
                        <option value="Ali Kadam ">Ali Kadam </option>
                        <option value="Nakhoyngchari ">Nakhoyngchari </option>
                        <option value="Ruma">Ruma</option>
                        <option value="Akhaura Brahmanbaria">Akhaura Brahmanbaria</option>
                        <option value="Kashba ">Kashba </option>
                        <option value="Bancharampur ">Bancharampur </option>
                        <option value="Ashuganj">Ashuganj</option>
                        <option value="Sarail ">Sarail </option>
                        <option value="Brahmanbaria Sadar ">Brahmanbaria Sadar </option>
                        <option value="Bijoy Nagor ">Bijoy Nagor </option>
                        <option value="Nasirnagar ">Nasirnagar </option>
                        <option value="Nabinagar ">Nabinagar </option>
                        <option value="Matlab (South) ">Matlab (South) </option>
                        <option value="Matlab (North) (Chengarchar) ">Matlab (North) (Chengarchar) </option>
                        <option value="Shahrasti ">Shahrasti </option>
                        <option value="Chandpur Sadar ">Chandpur Sadar </option>
                        <option value="Kachua Chand">Kachua Chand</option>
                        <option value="Faridganj Chandpur">Faridganj Chandpur</option>
                        <option value="Haimchar ">Haimchar </option>
                        <option value="Hajiganj ">Hajiganj </option>
                        <option value="Rangunia ">Rangunia </option>
                        <option value="Banshkhali ">Banshkhali </option>
                        <option value="Hathazari ">Hathazari </option>
                        <option value="Sandwip ">Sandwip </option>
                        <option value="Satkania ">Satkania </option>
                        <option value="Lohagara Ctg. ">Lohagara Ctg. </option>
                        <option value="Anwara ">Anwara </option>
                        <option value="Fatikchari ">Fatikchari </option>
                        <option value="Boalkhali ">Boalkhali </option>
                        <option value="Mirsarai ">Mirsarai </option>
                        <option value="Patiya ">Patiya </option>
                        <option value="Sitakundu ">Sitakundu </option>
                        <option value="Chandanaish ">Chandanaish </option>
                        <option value="Raujan ">Raujan </option>
                        <option value="Comilla Sadar South ">Comilla Sadar South </option>
                        <option value="Monoharganj ">Monoharganj </option>
                        <option value="Chandina ">Chandina </option>
                        <option value="Muradnagar ">Muradnagar </option>
                        <option value="Titas ">Titas </option>
                        <option value="Chowddagram ">Chowddagram </option>
                        <option value="Barura ">Barura </option>
                        <option value="Meghna ">Meghna </option>
                        <option value="Laksam ">Laksam </option>
                        <option value="Burichang ">Burichang </option>
                        <option value="Debiduar ">Debiduar </option>
                        <option value="Brahmanpara ">Brahmanpara </option>
                        <option value="Daudkandi ">Daudkandi </option>
                        <option value="Nangolkot ">Nangolkot </option>
                        <option value="Comilla Sadar ">Comilla Sadar </option>
                        <option value="Homna Comilla">Homna Comilla</option>
                        <option value="Chakoria ">Chakoria </option>
                        <option value="Ukhia ">Ukhia </option>
                        <option value="Ramu ">Ramu </option>
                        <option value="Kutubdia ">Kutubdia </option>
                        <option value="Pekua ">Pekua </option>
                        <option value="Moheshkhali ">Moheshkhali </option>
                        <option value="Teknaf Coxs Bazar">Teknaf Coxs Bazar</option>
                        <option value="Coxs Bazar Sadar ">Coxs Bazar Sadar </option>
                        <option value="Daganbhuiyan ">Daganbhuiyan </option>
                        <option value="Sonagazi ">Sonagazi </option>
                        <option value="Feni Sadar ">Feni Sadar </option>
                        <option value="Fulgazi ">Fulgazi </option>
                        <option value="Parshuram ">Parshuram </option>
                        <option value="Chagalnayya ">Chagalnayya </option>
                        <option value="Khagrachari Sadar ">Khagrachari Sadar </option>
                        <option value="Mohalchari ">Mohalchari </option>
                        <option value="Panchari ">Panchari </option>
                        <option value="Dighinala Khagrachari">Dighinala Khagrachari</option>
                        <option value="Manikchari ">Manikchari </option>
                        <option value="Matiranga ">Matiranga </option>
                        <option value="Laksmichari ">Laksmichari </option>
                        <option value="Ramgarh ">Ramgarh </option>
                        <option value="Laksmipur Sadar ">Laksmipur Sadar </option>
                        <option value="Kamalnagar ">Kamalnagar </option>
                        <option value="Ramganj ">Ramganj </option>
                        <option value="Raipur ">Raipur </option>
                        <option value="Ramgati ">Ramgati </option>
                        <option value="Begumganj ">Begumganj </option>
                        <option value="Senbag ">Senbag </option>
                        <option value="Companiganj ">Companiganj </option>
                        <option value="Kabir Hat ">Kabir Hat </option>
                        <option value="Sonaimuri ">Sonaimuri </option>
                        <option value="Subarnachar ">Subarnachar </option>
                        <option value="Hatiya ">Hatiya </option>
                        <option value="Chatkhil ">Chatkhil </option>
                        <option value="Noakhali Sadar(Sudharam) ">Noakhali Sadar(Sudharam) </option>
                        <option value="Kawkhali ">Kawkhali </option>
                        <option value="Baghaichari ">Baghaichari </option>
                        <option value="Belaichari ">Belaichari </option>
                        <option value="Langadu ">Langadu </option>
                        <option value="Rajasthali ">Rajasthali </option>
                        <option value="Kaptai Rangamati">Kaptai Rangamati</option>
                        <option value="Naniarchar ">Naniarchar </option>
                        <option value="Jurachari ">Jurachari </option>
                        <option value="Barkal ">Barkal </option>
                        <option value="Rangamati Sadar ">Rangamati Sadar </option>
                        <option value="Nawabganj Dhaka">Nawabganj Dhaka</option>
                        <option value="Dohar ">Dohar </option>
                        <option value="Keraniganj">Keraniganj</option>
                        <option value="Savar ">Savar </option>
                        <option value="Dhamrai ">Dhamrai </option>
                        <option value="Saltha Faridpur">Saltha Faridpur</option>
                        <option value="Madhukhali ">Madhukhali </option>
                        <option value="Char Bhadrasan ">Char Bhadrasan </option>
                        <option value="Alfadanga ">Alfadanga </option>
                        <option value="Bhanga ">Bhanga </option>
                        <option value="Boalmari ">Boalmari </option>
                        <option value="Faridpur Sadar">Faridpur Sadar</option>
                        <option value="Sadarpur ">Sadarpur </option>
                        <option value="Nagarkanda ">Nagarkanda </option>
                        <option value="Sreepur Gazipur">Sreepur Gazipur</option>
                        <option value="Kapasia ">Kapasia </option>
                        <option value="Kaliganj (Gzpr)">Kaliganj (Gzpr)</option>
                        <option value="Kaliakoir ">Kaliakoir </option>
                        <option value="Gazipur Sadar">Gazipur Sadar</option>
                        <option value="Kotalipara ">Kotalipara </option>
                        <option value="Kasiani ">Kasiani </option>
                        <option value="Tungipara ">Tungipara </option>
                        <option value="Maksudpur ">Maksudpur </option>
                        <option value="Gopalganj Sadar">Gopalganj Sadar</option>
                        <option value="Tarail ">Tarail </option>
                        <option value="Austogram ">Austogram </option>
                        <option value="Bhairab ">Bhairab </option>
                        <option value="Pakundia ">Pakundia </option>
                        <option value="Kishoreganj Sadar ">Kishoreganj Sadar </option>
                        <option value="Itna ">Itna </option>
                        <option value="Nikli ">Nikli </option>
                        <option value="Karimganj Kishoreganj">Karimganj Kishoreganj</option>
                        <option value="Katiadi ">Katiadi </option>
                        <option value="Kuliarchar Kishoreganj">Kuliarchar Kishoreganj</option>
                        <option value="Hosainpu ">Hosainpu </option>
                        <option value="Mithamain">Mithamain</option>
                        <option value="Bajitpur ">Bajitpur </option>
                        <option value="Rajoir ">Rajoir </option>
                        <option value="Madaripur Sadar ">Madaripur Sadar </option>
                        <option value="Shibchar Madaripur">Shibchar Madaripur</option>
                        <option value="Kalkini ">Kalkini </option>
                        <option value="Singair ">Singair </option>
                        <option value="Daulatpur Manikganj ">Daulatpur Manikganj </option>
                        <option value="Manikganj Sadar">Manikganj Sadar</option>
                        <option value="Harirampur ">Harirampur </option>
                        <option value="Shibalaya ">Shibalaya </option>
                        <option value="Saturia ">Saturia </option>
                        <option value="Ghior ">Ghior </option>
                        <option value="Sreenagar ">Sreenagar </option>
                        <option value="Tangibari ">Tangibari </option>
                        <option value="Lauhajang ">Lauhajang </option>
                        <option value="Munshiganj Sadar ">Munshiganj Sadar </option>
                        <option value="Gazaria ">Gazaria </option>
                        <option value="Serajdikhan ">Serajdikhan </option>
                        <option value="Sonargaon ">Sonargaon </option>
                        <option value="Rupganj ">Rupganj </option>
                        <option value="Bandar ">Bandar </option>
                        <option value="Araihazar ">Araihazar </option>
                        <option value="Narayanganj Sadar ">Narayanganj Sadar </option>
                        <option value="Belabo ">Belabo </option>
                        <option value="Raipura ">Raipura </option>
                        <option value="Monohardi ">Monohardi </option>
                        <option value="Narshingdi Sadar ">Narshingdi Sadar </option>
                        <option value="Shibpur ">Shibpur </option>
                        <option value="Palash ">Palash </option>
                        <option value="Rajbari Sadar ">Rajbari Sadar </option>
                        <option value="Pangsha ">Pangsha </option>
                        <option value="Kalukhale ">Kalukhale </option>
                        <option value="Baliakandi ">Baliakandi </option>
                        <option value="Goalunda ">Goalunda </option>
                        <option value="Gosairhat Sariatpur">Gosairhat Sariatpur</option>
                        <option value="Bhedarganj ">Bhedarganj </option>
                        <option value="Naria Shariatpur">Naria Shariatpur</option>
                        <option value="Zajira ">Zajira </option>
                        <option value="Shariatpur Sadar ">Shariatpur Sadar </option>
                        <option value="Damudiya Shariatpur">Damudiya Shariatpur</option>
                        <option value="Delduar ">Delduar </option>
                        <option value="Tangail Sadar ">Tangail Sadar </option>
                        <option value="Kalihati ">Kalihati </option>
                        <option value="Bhuapur Tangail">Bhuapur Tangail</option>
                        <option value="Modhupur ">Modhupur </option>
                        <option value="Ghatail ">Ghatail </option>
                        <option value="Shakhipur ">Shakhipur </option>
                        <option value="Gopalpur ">Gopalpur </option>
                        <option value="Mirzapur ">Mirzapur </option>
                        <option value="Dhanbari ">Dhanbari </option>
                        <option value="Nagarpur ">Nagarpur </option>
                        <option value="Bashail ">Bashail </option>
                        <option value="Sarankhola ">Sarankhola </option>
                        <option value="Fakirhat ">Fakirhat </option>
                        <option value="Morelgonj ">Morelgonj </option>
                        <option value="Chitalmari ">Chitalmari </option>
                        <option value="Mollarhat Bagerhat">Mollarhat Bagerhat</option>
                        <option value="Bagerhat Sadar">Bagerhat Sadar</option>
                        <option value="Rampal ">Rampal </option>
                        <option value="Kachua Bag">Kachua Bag</option>
                        <option value="Mongla ">Mongla </option>
                        <option value="Damurhuda ">Damurhuda </option>
                        <option value="Chuadanga Sadar ">Chuadanga Sadar </option>
                        <option value="Alamdanga ">Alamdanga </option>
                        <option value="Jibannagar ">Jibannagar </option>
                        <option value="Jessore Sadar">Jessore Sadar</option>
                        <option value="Jhikargacha ">Jhikargacha </option>
                        <option value="Bagherpara Jessore">Bagherpara Jessore</option>
                        <option value="Manirampur Jessore">Manirampur Jessore</option>
                        <option value="Abhoynagar ">Abhoynagar </option>
                        <option value="Sharsha ">Sharsha </option>
                        <option value="Keshabpur ">Keshabpur </option>
                        <option value="Chowgacha ">Chowgacha </option>
                        <option value="Kaliganj ">Kaliganj </option>
                        <option value="Harinakunda ">Harinakunda </option>
                        <option value="Shailkupa ">Shailkupa </option>
                        <option value="Moheshpur ">Moheshpur </option>
                        <option value="Kotchandpur ">Kotchandpur </option>
                        <option value="Jhenaidah Sadar">Jhenaidah Sadar</option>
                        <option value="Koira Khulna">Koira Khulna</option>
                        <option value="Rupsa ">Rupsa </option>
                        <option value="Terokhada ">Terokhada </option>
                        <option value="Dacope ">Dacope </option>
                        <option value="Dumuria Khulna">Dumuria Khulna</option>
                        <option value="Dighalia ">Dighalia </option>
                        <option value="Batiaghata ">Batiaghata </option>
                        <option value="Phultala ">Phultala </option>
                        <option value="Paikgacha ">Paikgacha </option>
                        <option value="Daulatpur Kushtia ">Daulatpur Kushtia </option>
                        <option value="Kumarkhali ">Kumarkhali </option>
                        <option value="Mirpur ">Mirpur </option>
                        <option value="Kushtia Sadar ">Kushtia Sadar </option>
                        <option value="Khoksha ">Khoksha </option>
                        <option value="Bheramara">Bheramara</option>
                        <option value="Mohammadpur ">Mohammadpur </option>
                        <option value="Magura Sadar ">Magura Sadar </option>
                        <option value="Shalikha ">Shalikha </option>
                        <option value="Sreepur Magura">Sreepur Magura</option>
                        <option value="Gangni ">Gangni </option>
                        <option value="Mujibnagar ">Mujibnagar </option>
                        <option value="Meherpur Sadar ">Meherpur Sadar </option>
                        <option value="Kalia Narail">Kalia Narail</option>
                        <option value="Lohagara Narail">Lohagara Narail</option>
                        <option value="Narail Sadar ">Narail Sadar </option>
                        <option value="Tala Satkhira">Tala Satkhira</option>
                        <option value="Kolaroa ">Kolaroa </option>
                        <option value="Assasuni ">Assasuni </option>
                        <option value="Shyamnagar ">Shyamnagar </option>
                        <option value="Kaliganjsat ">Kaliganjsat </option>
                        <option value="Satkhira Sadar">Satkhira Sadar</option>
                        <option value="Debhata ">Debhata </option>
                        <option value="Madarganj Jamalpur">Madarganj Jamalpur</option>
                        <option value="Dewanganj">Dewanganj</option>
                        <option value="Melandah ">Melandah </option>
                        <option value="Sharishabari ">Sharishabari </option>
                        <option value="Bakshiganj ">Bakshiganj </option>
                        <option value="Jamalpur Sadar ">Jamalpur Sadar </option>
                        <option value="Islampur ">Islampur </option>
                        <option value="Iswarganj ">Iswarganj </option>
                        <option value="Bhaluka ">Bhaluka </option>
                        <option value="Gouripur ">Gouripur </option>
                        <option value="Fulpur ">Fulpur </option>
                        <option value="Trishal ">Trishal </option>
                        <option value="Dhubaura ">Dhubaura </option>
                        <option value="Haluaghat Mymensing">Haluaghat Mymensing</option>
                        <option value="Nandail ">Nandail </option>
                        <option value="Goffargaon ">Goffargaon </option>
                        <option value="Fulbaria Mymensing">Fulbaria Mymensing</option>
                        <option value="Muktagacha ">Muktagacha </option>
                        <option value="Mymensingh Sadar ">Mymensingh Sadar </option>
                        <option value="Barhatta">Barhatta</option>
                        <option value="Mohanganj ">Mohanganj </option>
                        <option value="Atpara ">Atpara </option>
                        <option value="Netrokona Sadar ">Netrokona Sadar </option>
                        <option value="Kalmakanda">Kalmakanda</option>
                        <option value="Purbadhala ">Purbadhala </option>
                        <option value="Madan ">Madan </option>
                        <option value="Kendua ">Kendua </option>
                        <option value="Khaliajuri ">Khaliajuri </option>
                        <option value="Durgapur Netrokona">Durgapur Netrokona</option>
                        <option value="Nalitabari Sherpur">Nalitabari Sherpur</option>
                        <option value="Sribordi ">Sribordi </option>
                        <option value="Jhenaigati ">Jhenaigati </option>
                        <option value="Sherpur Sadar ">Sherpur Sadar </option>
                        <option value="Nakla ">Nakla </option>
                        <option value="Sherpur Bogra">Sherpur Bogra</option>
                        <option value="Shajahanpur ">Shajahanpur </option>
                        <option value="Shibganj ">Shibganj </option>
                        <option value="Bogra Sadar">Bogra Sadar</option>
                        <option value="Dhubchanchia ">Dhubchanchia </option>
                        <option value="Nandigram ">Nandigram </option>
                        <option value="Adamdighi ">Adamdighi </option>
                        <option value="Sariakandi ">Sariakandi </option>
                        <option value="Sonatola ">Sonatola </option>
                        <option value="Gabtali ">Gabtali </option>
                        <option value="Dhunot ">Dhunot </option>
                        <option value="Kahaloo Bogra">Kahaloo Bogra</option>
                        <option value="Akkelpur ">Akkelpur </option>
                        <option value="Kalai ">Kalai </option>
                        <option value="Panchbibi ">Panchbibi </option>
                        <option value="Joypurhat Sadar">Joypurhat Sadar</option>
                        <option value="Khetlal ">Khetlal </option>
                        <option value="Atrai">Atrai</option>
                        <option value="Porsha ">Porsha </option>
                        <option value="Dhamoirhat ">Dhamoirhat </option>
                        <option value="Mahadebpur ">Mahadebpur </option>
                        <option value="Badalgachi Naogaon">Badalgachi Naogaon</option>
                        <option value="Raninagar ">Raninagar </option>
                        <option value="Shapahar ">Shapahar </option>
                        <option value="Naogaon Sadar">Naogaon Sadar</option>
                        <option value="Niamatpur ">Niamatpur </option>
                        <option value="Patnitala ">Patnitala </option>
                        <option value="Manda ">Manda </option>
                        <option value="Lalpur ">Lalpur </option>
                        <option value="Baraigram ">Baraigram </option>
                        <option value="Singra ">Singra </option>
                        <option value="Natore Sadar ">Natore Sadar </option>
                        <option value="Baghatipara Natore">Baghatipara Natore</option>
                        <option value="Gurudaspur">Gurudaspur</option>
                        <option value="Bholahat ">Bholahat </option>
                        <option value="Chapainawabganj Sadar ">Chapainawabganj Sadar </option>
                        <option value="Gomastapur ">Gomastapur </option>
                        <option value="Shibganj">Shibganj</option>
                        <option value="Nachole ">Nachole </option>
                        <option value="Sujanagar ">Sujanagar </option>
                        <option value="Santhia ">Santhia </option>
                        <option value="Bhangura ">Bhangura </option>
                        <option value="Pabna Sadar">Pabna Sadar</option>
                        <option value="Faridpur ">Faridpur </option>
                        <option value="Bera ">Bera </option>
                        <option value="Iswardi ">Iswardi </option>
                        <option value="Atgharia ">Atgharia </option>
                        <option value="Chatmohar ">Chatmohar </option>
                        <option value="Bagha ">Bagha </option>
                        <option value="Tanore ">Tanore </option>
                        <option value="Charghat ">Charghat </option>
                        <option value="Paba ">Paba </option>
                        <option value="Durgapur ">Durgapur </option>
                        <option value="Putia ">Putia </option>
                        <option value="Bagmara Rajshahi">Bagmara Rajshahi</option>
                        <option value="Godagari ">Godagari </option>
                        <option value="Mohanpur ">Mohanpur </option>
                        <option value="Kazipur ">Kazipur </option>
                        <option value="Ullapara ">Ullapara </option>
                        <option value="Raiganj Sirajganj">Raiganj Sirajganj</option>
                        <option value="Sirajganj Sadar">Sirajganj Sadar</option>
                        <option value="Tarash ">Tarash </option>
                        <option value="Chowhali ">Chowhali </option>
                        <option value="Belkuchi ">Belkuchi </option>
                        <option value="Kamarkhanda ">Kamarkhanda </option>
                        <option value="Shahajadpur ">Shahajadpur </option>
                        <option value="Birol ">Birol </option>
                        <option value="Kaharole ">Kaharole </option>
                        <option value="Hakimpur ">Hakimpur </option>
                        <option value="Bochaganj ">Bochaganj </option>
                        <option value="Birganj ">Birganj </option>
                        <option value="Ghoraghat ">Ghoraghat </option>
                        <option value="Nawabganj ">Nawabganj </option>
                        <option value="Phulbari ">Phulbari </option>
                        <option value="Chirirbandar ">Chirirbandar </option>
                        <option value="Khanshama ">Khanshama </option>
                        <option value="Dinajpur ">Dinajpur </option>
                        <option value="Parbatipur ">Parbatipur </option>
                        <option value="Birampur ">Birampur </option>
                        <option value="Sundarganj ">Sundarganj </option>
                        <option value="Fulchari ">Fulchari </option>
                        <option value="Palashbari ">Palashbari </option>
                        <option value="Shaghatta ">Shaghatta </option>
                        <option value="Gaibandha Sadar">Gaibandha Sadar</option>
                        <option value="Gobindaganj ">Gobindaganj </option>
                        <option value="Sadullapur ">Sadullapur </option>
                        <option value="Rajarhat ">Rajarhat </option>
                        <option value="Kurigram Sadar ">Kurigram Sadar </option>
                        <option value="Chilmary ">Chilmary </option>
                        <option value="Ulipur ">Ulipur </option>
                        <option value="Nageswari ">Nageswari </option>
                        <option value="Rajibpur Kurigram">Rajibpur Kurigram</option>
                        <option value="Bhurungamari ">Bhurungamari </option>
                        <option value="Rowmari ">Rowmari </option>
                        <option value="Fulbari Kurigram">Fulbari Kurigram</option>
                        <option value="Patgram ">Patgram </option>
                        <option value="Aditmari ">Aditmari </option>
                        <option value="Hatibandha Lalmonirhat">Hatibandha Lalmonirhat</option>
                        <option value="Kaliganj Lalmonirhat">Kaliganj Lalmonirhat</option>
                        <option value="Lalmonirhat Sadar ">Lalmonirhat Sadar </option>
                        <option value="Nilphamari Sadar">Nilphamari Sadar</option>
                        <option value="Jaldhaka ">Jaldhaka </option>
                        <option value="Domar ">Domar </option>
                        <option value="Kishoreganj Nilphamari">Kishoreganj Nilphamari</option>
                        <option value="Saidpur ">Saidpur </option>
                        <option value="Dimla ">Dimla </option>
                        <option value="Debiganj ">Debiganj </option>
                        <option value="Boda ">Boda </option>
                        <option value="Atwari ">Atwari </option>
                        <option value="Tetulia ">Tetulia </option>
                        <option value="Panchagarh Sadar">Panchagarh Sadar</option>
                        <option value="Gangachara">Gangachara</option>
                        <option value="Kaunia ">Kaunia </option>
                        <option value="Rangpur Sadar ">Rangpur Sadar </option>
                        <option value="Taraganj ">Taraganj </option>
                        <option value="Badarganj ">Badarganj </option>
                        <option value="Pirgacha ">Pirgacha </option>
                        <option value="Pirganj Rangpur">Pirganj Rangpur</option>
                        <option value="Mithapukur ">Mithapukur </option>
                        <option value="Pirganj ">Pirganj </option>
                        <option value="Haripur ">Haripur </option>
                        <option value="Thakurgaon ">Thakurgaon </option>
                        <option value="Baliadangi Thakurgaon">Baliadangi Thakurgaon</option>
                        <option value="Ranishankail">Ranishankail</option>
                        <option value="Madhabpur ">Madhabpur </option>
                        <option value="Habiganj Sadar ">Habiganj Sadar </option>
                        <option value="Nabiganj ">Nabiganj </option>
                        <option value="Baniachang ">Baniachang </option>
                        <option value="Ajmiriganj ">Ajmiriganj </option>
                        <option value="Chunarughat ">Chunarughat </option>
                        <option value="Lakhai ">Lakhai </option>
                        <option value="Bahubal ">Bahubal </option>
                        <option value="Sreemongal ">Sreemongal </option>
                        <option value="Moulvibazar Sadar ">Moulvibazar Sadar </option>
                        <option value="Kamalganj ">Kamalganj </option>
                        <option value="Rajnagar Maulavibazar">Rajnagar Maulavibazar</option>
                        <option value="Juri ">Juri </option>
                        <option value="Barlekha ">Barlekha </option>
                        <option value="Kulaura ">Kulaura </option>
                        <option value="Chattak ">Chattak </option>
                        <option value="Sulla ">Sulla </option>
                        <option value="Biswambharpur ">Biswambharpur </option>
                        <option value="Jagannathpur ">Jagannathpur </option>
                        <option value="Dowarabazar ">Dowarabazar </option>
                        <option value="Derai Sunamganj">Derai Sunamganj</option>
                        <option value="South Sunamganj ">South Sunamganj </option>
                        <option value="Sunamganj Sadar ">Sunamganj Sadar </option>
                        <option value="Jamalganj ">Jamalganj </option>
                        <option value="Taherpur ">Taherpur </option>
                        <option value="Dharmapasha ">Dharmapasha </option>
                        <option value="Gowainghat ">Gowainghat </option>
                        <option value="Beanibazar ">Beanibazar </option>
                        <option value="Biswanath ">Biswanath </option>
                        <option value="Balaganj ">Balaganj </option>
                        <option value="Jaintapur ">Jaintapur </option>
                        <option value="Kanaighat ">Kanaighat </option>
                        <option value="Sylhet Sadar ">Sylhet Sadar </option>
                        <option value="Zakiganj Sylhet">Zakiganj Sylhet</option>
                        <option value="Fenchuganj ">Fenchuganj </option>
                        <option value="Companyganj Sylhet">Companyganj Sylhet</option>
                        <option value="South Surma ">South Surma </option>
                        <option value="Golapganj ">Golapganj </option>
                    </select>
                </td>
            </tr>
            <tr style="font-weight: bold;">
                <td></td>
                <td>7. Present Post</td>
                <td><select id="txt7" name="ppost" >
                        <option value="None">-- Select --</option>
                        <option value="Programmer">Programmer</option>
                        <option value="Asst. Programmer">Asst. Programmer</option>
                        <option value="Officer">Officer</option>
                        <option value="Accountant">Accountant</option>
                        <option value="Jr. Officer">Jr. Officer</option>
                        <option value="Data Entry Operator">Data Entry Operator</option>
                        <option value="Computer Operator">Computer Operator</option>
                        <option value="Field Supervisor">Field Supervisor</option>
						<option value="Field Assistant">Filed Assistant</option>
                        <option value="Cash Assistant">Cash Assistant</option>
                        <option value="Office Assistant">Office Assistant</option>
                        <option value="MLSS">MLSS</option>
                        <option value="Driver">Driver</option>
                        <option value="Guard">Guard</option>
                        <option value="Night Guard">Night Guard</option>
                    </select>
                 </td>
            </tr>
            <tr style="font-weight: bold;">
                <td></td>
                <td>8. Date of Joining in Present Post:</td>
                <td><input type="date" id="txt8" name="ppostdojoin"   ></td>
            </tr>
            <tr style="font-weight: bold;">
                <td></td>
                <td>9.Date of Birth : </td>
                <td><input type="date" id="txt9"  name="dob" ></td>
            </tr>

            <tr style="font-weight: bold;">
                <td></td>
                <td>10.First Entry Post (ABAK): </td>
                <td><input type="text" id="txt10" name="entrypost"  ></td>
            </tr>
            <tr style="font-weight: bold;">
                <td></td>
                <td>11.Date of Fisrt Join (ABAK): </td>
                <td><input type="date" id="txt11" name="entrydojoin"   ></td>
            </tr>

            <tr style="font-weight: bold;">
                <td></td>
                <td>12. Highest Degree : </td>
                <td><input type="text" id="txt12"  name="highestdegree"     ></td>
            </tr>
            <tr style="font-weight: bold;">
                <td></td>
                <td>13. Passing Year of Highest Degree : </td>
                <td><input type="text" id="txt13"  name="passingyear"   ></td>
            </tr>

            <tr style="font-weight: bold;">
                <td></td>
                <td>14.ABEK to Bank Transfer Order No : </td>
                <td> <input type="text" id="txt14" name="orderno"  > </td>
            </tr>

            <tr style="font-weight: bold;">
                <td></td>
                <td>15.ABEK to Bank Transfer Date :</td>
                <td><input type="date" id="txt15" name="transferdate"  ></td>
            </tr>


            <tr style="font-weight: bold;">
                <td></td>
                <td>16.Present Place of Posting :</td>
                <td><input type="text" id="txt16"   name="pposting"   ></td>
            </tr>


            <tr style="font-weight: bold;">
                <td></td>
                <td>  Select image to upload:</td>
                <td>     <input type="file" name="imagefile" id="demo" >
                <img id="image_upload_preview" src="#" height="200" width="200px" "/></td>

            </tr>


            <tr align="right" >
                <td></td>
                <td><input type="submit"  name="btn"  value="Save"   ></td>
            </tr>

            </tbody>
        </table>

    </form>

 </div>

</body>

<script type="text/javascript">
    function display(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(event) {
                $('#image_upload_preview').attr('src', event.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#demo").change(function() {
        display(this);
    });
</script>