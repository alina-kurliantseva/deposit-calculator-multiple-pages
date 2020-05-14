<?php
    session_start();
    if(!isset( $_SESSION["agreement"]))
    {
        header("location: Disclaimer.php");
    }
    include 'inc/Header.php';
    include 'inc/Functions.php';
    $validation = TRUE;
    if(isset($_POST['btnSubmit']))
    {
        extract($_POST);
        $errorName = ValidateName($Name);
        $errorPostalCode = ValidatePostalCode($PostalCode);
        $errorPhoneNumber = ValidatePhoneNumber($PhoneNumber);
        $errorEmailAddress = ValidateEmailAddress($EmailAddress);
        $errorContactMethod = ValidateContactMethod($PreferredContactMethod);
        $errorContactTime = ValidateContactTime($PreferredContactMethod, $ContactTime);
        if((strlen(trim($errorName)) != 0) || (strlen(trim($errorPostalCode)) != 0) || (strlen(trim($errorPhoneNumber)) != 0) ||
           (strlen(trim($errorEmailAddress)) != 0) || (strlen(trim($errorContactTime)) != 0) || (strlen(trim($errorContactMethod)) != 0))
        {
            $validation = FALSE; 
        }
        elseif (isset($btnClear))
        {
            $Name = "";
            $PostalCode = "";
            $PhoneNumber = "";
            $EmailAddress = "";
            $YearsToDeposit = "";
            $PreferredContactMethod = "";
            unset($ContactTime);                   
        }
        if($validation)
        {
            $_SESSION["CustomerInfo"] = array(
                "name" => $Name,
                "postalCode" => $PostalCode,
                "phoneNumber" => $PhoneNumber,
                "emailAddress" => $EmailAddress,
                "yearsToDeposit" => $YearsToDeposit,
                "preferredContactMethod" => $PreferredContactMethod
            );
            header("location: DepositCalculator.php");
        }                              
    }
?>
<div class="container">
    <h1>Customer Information</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SEFL']; ?>">
        <div class="form-group row">
            <label for="Name" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Alina Kurliantseva" name="Name" value="<?php echo $Name; ?>" />
                <span class="error">
                    <?php
                        if(!$validation)
                        {
                            echo $errorName;
                        }
                    ?>
                </span>
            </div>
        </div>  
        <div class="form-group row">
            <label for="PostalCode" class="col-sm-3 col-form-label">Postal Code</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="K2C 3L7" name="PostalCode" value="<?php echo $PostalCode; ?>" />
                <span class="error">
                    <?php
                        if(!$validation)
                        {
                            echo $errorPostalCode;
                        }
                    ?>
                </span>
            </div>
        </div>
        <div class="form-group row">
            <label for="PhoneNumber" class="col-sm-3 col-form-label">Phone Number (nnn-nnn-nnnn)</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="613-700-45" name="PhoneNumber" value="<?php echo $PhoneNumber; ?>" />
                <span class="error">
                    <?php
                        if(!$validation)
                        {
                            echo $errorPhoneNumber;
                        }
                    ?>
                </span>
            </div>
        </div>    
        <div class="form-group row">
            <label for="EmailAddress" class="col-sm-3 col-form-label">Email Address</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="alina.yildir@gmail.com" name="EmailAddress" value="<?php echo $EmailAddress; ?>" />
                <span class="error">
                    <?php
                        if(!$validation)
                        {
                            echo $errorEmailAddress;
                        }
                    ?>
                </span>
            </div>
        </div><br />
        <p>Preferred Contact Method:</p>
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="radio" name="PreferredContactMethod" value="Phone" <?php print($PreferredContactMethod=='Phone' ? 'checked' : '') ?> />Phone<br />
                <input type="radio" name="PreferredContactMethod" value="Email" <?php print($PreferredContactMethod=='Email' ? 'checked' : '') ?> />Email
                <div class="error">
                    <?php
                        if(!$validation)
                        {                
                            echo $errorContactMethod;
                        }                    
                    ?>
                </div>
            </label>
        </div><br />
        <p>If phone is selected, when can we contact you?</p>
        <p><i>(check all applicable)</i></p>
        <label class="custom-control custom-checkbox">
            <input type="checkbox" name="ContactTime[ ]" value="Morning" <?php print (isset($ContactTime) && in_array('Morning', $ContactTime) ? 'checked' : ''); ?> >morning<br />
            <input type="checkbox" name="ContactTime[ ]" value="Afternoon" <?php print (isset($ContactTime) && in_array('Afternoon', $ContactTime) ? 'checked' : ''); ?> >afternoon<br />
            <input type="checkbox" name="ContactTime[ ]" value="Eening" <?php print (isset($ContactTime) && in_array('Evening', $ContactTime) ? 'checked' : ''); ?> >evening
            <div class="error">
                <?php
                    if(!$validation)
                    {                
                        echo $errorContactTime;
                    }                    
                ?>
            </div>
        </label><br /><br />   
        <p>
            <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary" />
            <input type="submit" name="btnClear" value="Clear" class="btn btn-primary" />
        </p>    
    </form>
</div>
<?php include 'inc/Footer.php'; ?>
