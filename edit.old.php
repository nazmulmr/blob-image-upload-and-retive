<?php
session_start();
if($_SESSION['id'] == NULL){
    header('Location:login.php');
}
echo "Branch Code=".$_SESSION['id'];
require_once 'vendor/autoload.php';
use App\classes\Student;
use App\classes\Login;
$student = new Student();
$login = new Login();

$result = $student->getStudentInfoById($_SESSION['id']);
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
<form action="" method="post">
    <table>
        <thead>

        <tr>

            <th>
                Description (বিবরণ)
            </th>
            <th>
                Taka in English (লক্ষ টাকা)
            </th>

        </tr>
        </thead>

        <tr>
            <td>CBS Cash Deposit:</td>
            <td>
                <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                <input type="text" name="cbscashdeposit" value="<?php echo $data['cbscashdeposit']   ?>"   align = "center">

            </td>
        </tr>
        <tr>
            <td>CBS Sonali Bank:</td>
            <td><input type="text" name="cbssonalibank" value="<?php echo $data['cbssonalibank'] ?>"></td>
        </tr>
        <tr>
            <td>Mfs Disburse :</td>
            <td><input type="text" name="mfsDisburse" value="<?php echo $data['mfsDisburse'] ?>"></td>
        </tr>
        <tr>
            <td>SMS Disburse :</td>
            <td><input type="text" name="smeDisburse" value="<?php echo $data['smeDisburse'] ?>"></td>
        </tr>
        <tr>
            <td>MFS Project Repay  :</td>
            <td><input type="text" name="mfsProjectRepay" value="<?php echo $data['mfsProjectRepay'] ?>"></td>
        </tr>
        <tr>
            <td>Mfs Bank Repay :</td>
            <td><input type="text" name="mfsBankRepay" value="<?php echo $data['mfsBankRepay'] ?>"></td>
        </tr>
        <tr>
            <td>SME Repay  :</td>
            <td><input type="text" name="smeRepay" value="<?php echo $data['smeRepay'] ?>"></td>
        </tr>
        <tr>
            <td>Mfs Overdue ProjectRepay  :</td>
            <td><input type="text" name="mfsDisburse" value="<?php echo $data['mfsDisburse'] ?>"></td>
        </tr>
        <tr>
            <td>Mf Overdue BankRepay  :</td>
            <td><input type="text" name="mfsOdProjectRepay" value="<?php echo $data['mfsOdProjectRepay'] ?>"></td>
        </tr>
        <tr>
            <td>Mf Overdue BankRepay  :</td>
            <td><input type="text" name="mfOdBankRepay" value="<?php echo $data['mfOdBankRepay'] ?>"></td>
        </tr>
        <tr>
            <td>SME Overdue Repay  :</td>
            <td><input type="text" name="smeOdRepay" value="<?php echo $data['smeOdRepay'] ?>"></td>
        </tr>
        <tr>
            <td>Mfs Loan Balance  :</td>
            <td><input type="text" name="mfsLoanBal" value="<?php echo $data['mfsLoanBal'] ?>"></td>
        </tr>
        <tr>
            <td>SME Loan Balance :</td>
            <td><input type="text" name="smeLoanBal" value="<?php echo $data['smeLoanBal'] ?>"></td>
        </tr>
        <tr>
            <td>Mfs Overdue Balance :</td>
            <td><input type="text" name="mfsOdBal" value="<?php echo $data['mfsOdBal'] ?>"></td>
        </tr>
        <tr>
            <td>SME Overdue Balance :</td>
            <td><input type="text" name="smeOdBal" value="<?php echo $data['smeOdBal'] ?>"></td>
        </tr>
        <tr>
            <td>Overdue Percentage :</td>
            <td><input type="text" name="odPercentage" value="<?php echo $data['odPercentage'] ?>"></td>
        </tr>
        <tr>
            <td>Mfs Overdue Percentage :</td>
            <td><input type="text" name="mfsOdPercentage" value="<?php echo $data['mfsOdPercentage'] ?>"></td>
        </tr>
        <tr>
            <td>Savings Deposit Balance :</td>
            <td><input type="text" name="savingsDepositBal" value="<?php echo $data['savingsDepositBal'] ?>"></td>
        </tr>
        <tr>
            <td>SND Deposit Balance :</td>
            <td><input type="text" name="sndDepositBal" value="<?php echo $data['sndDepositBal'] ?>"></td>
        </tr>
        <tr>
            <td>Sonali Bank SND Interest :</td>
            <td><input type="text" name="sonaliBankSndInterest" value="<?php echo $data['sonaliBankSndInterest'] ?>"></td>
        </tr>
        <tr>
            <td>Samittee Saving Charge :</td>
            <td><input type="text" name="samitteeSavingCharge" value="<?php echo $data['samitteeSavingCharge'] ?>"></td>
        </tr>
        <tr>
            <td>Total Expense :</td>
            <td><input type="text" name="totalExpense" value="<?php echo $data['totalExpense'] ?>"></td>
        </tr>
        <tr>
            <td>Over All Profit :</td>
            <td><input type="text" name="overAllProfit" value="<?php echo $data['overAllProfit'] ?>"></td>
        </tr>
        <tr>
            <td>As On Deposit :</td>
            <td><input type="text" name="asOnDeposit" value="<?php echo $data['asOnDeposit'] ?>"></td>
        </tr>
        <tr>
            <td>Loan Calculation :</td>
            <td><input type="text" name="loanCalculation" value="<?php echo $data['loanCalculation'] ?>"></td>
        </tr>
        <tr>
            <td>Transfer AgentBank :</td>
            <td><input type="text" name="transferAgentBank" value="<?php echo $data['transferAgentBank'] ?>"></td>
        </tr>




        <tr>
            <td></td>
            <td><input type="submit" name="btn" value="Save"></td>
        </tr>
    </table>
</form>
