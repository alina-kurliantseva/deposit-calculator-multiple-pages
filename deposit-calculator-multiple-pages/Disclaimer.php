<?php
    session_start();
    include 'inc/Header.php';
    include 'inc/Functions.php';
    $validation = TRUE;
    if (isset($_POST['btnStart']))
    {
        if (!isset($_POST["Agreement"])) 
        {
            $errorAgreement = ValidateAgreement($Agreement);
            if (strlen($errorAgreement) != 0)
                {
                    $validation = FALSE;
                }
        }
        else
        {
            $_SESSION["agreement"] = "checked";
            header("location: CustomerInfo.php"); // to redirect the page to the given URL
        }
    }
?>
<div class="container">
    <h1>Terms and Conditions</h1>
    <p>I agree to abide by Bank's Terms and Conditions and rules in force and the changes thereto in Terms and Conditions from time to time relating to my account as communicated and made available on the Bank's website.</p>
    <p>I agree that the bank before opening any deposit account, will carry out a due diligence as required under Know Your Customer guidelines of the bank. I would be required to submit necessary documents or proofs, such as identity, address, photograph and any such information, I agree to submit the above documents again at periodic intervals, as may be required by the Bank.</p>
    <p>I agree that the Bank can at its sole discretion, amend any of the services/facilities given in my account either wholly or partially at any time by giving me at least 30 days notice and/or provide an option to me to switch to other services/facilities.</p><br />
    <form method="post" action="<?php echo $_SERVER['PHP_SEFL']; ?>">
        <input type="checkbox" name="Agreement" value="agree">I have read and agree with the terms and conditions.
        <span class="error">
            <?php
                if (!$validation)
                {
                    echo $errorAgreement; // to print the error --> "(You must agree with the terms and conditions.)" (see Functions.php)
                }
            ?>
        </span><br /><br />
        <input type="submit" name="btnStart" value="Start" class="btn btn-primary">
    </form>
</div>
<?php include 'inc/Footer.php';
