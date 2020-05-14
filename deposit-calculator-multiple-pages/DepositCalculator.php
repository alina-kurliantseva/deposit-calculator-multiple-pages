<?php
    session_start();
    if (!isset( $_SESSION["CustomerInfo"]))
    {
        header("location: CustomerInfo.php");
    }  
    include 'inc/Header.php';
    include 'inc/Functions.php';
    if (isset($_POST['btnSubmit']))
    {
        $validation = TRUE;
        extract($_POST);
        $errorPrincipalAmount = ValidatePrincipalAmount($PrincipalAmount);
        $errorInterestRate = ValidateInterestRate($InterestRate);
        if((strlen(trim($errorPrincipalAmount)) != 0) || (strlen(trim($errorInterestRate)) != 0))
        {
            $validation = FALSE;
        }
        elseif (isset($btnClear))
        {
            $PrincipalAmount = "";
            $InterestRate = "";                   
        }
    }
?>
<div class="container">
    <h3>Enter principal amount, interest rate and select number of years to deposit:</h3>
    <form method="post" action="<?php echo $_SERVER['PHP_SEFL']; ?>">
        <p>Principal Amount:
            <input type="text" name="PrincipalAmount" value="<?php echo $PrincipalAmount; ?>" />
            <span class="error"><?php echo $errorPrincipalAmount; ?></span>
        </p>
        <p>Interest Rate (%):
            <input type="text" name="InterestRate" value="<?php echo $InterestRate; ?>" />
            <span class="error"><?php echo $errorInterestRate; ?></span>
        </p>
        <p>Years to Deposit:</p>
        <select name="YearsToDeposit">
            <?php 
                for($i = 1; $i <= 20; $i++)
                {
                    print $YearsToDeposit == $i ? "<option value='$i' selected>$i</option>" : "<option value='$i'>$i</option>";
                }
            ?>
        </select><br /><br />
        <p>
            <input type="submit" name="btnSubmit" value="Calculate" class="btn btn-primary" />
            <input type="submit" name="btnClear" value="Clear" class="btn btn-primary" />
        </p>
    </form>
</div>
<div class="container">
    <?php 
        if ($validation)
        {
    ?>
            <i>The following is the result of the calculation:</i><br /><br />
            <table class="table table-hover">
                <tr>
                    <th>Year</th>
                    <th>Principal at Year Start</th>
                    <th>Interest for the Year</th>
                </tr>
                <?php
                    $i = 1;
                    do {
                        print "<tr>";
                        print "<td>$i</td>";
                        $PrincipalAmount +=  $InterestForTheYear;
                        printf("<td>%1\$.2f</td>", $PrincipalAmount);
                        $InterestForTheYear = ($PrincipalAmount*$InterestRate)/100;
                        printf("<td>%1\$.2f</td>", $InterestForTheYear);
                        print "</tr>";
                        $i++;
                    } while ($i <= $YearsToDeposit);
        }
                ?>
            </table>
</div>
<?php include 'inc/Footer.php';