<?php 
    function ValidatePrincipalAmount($FieldName)
        {
            $Name = trim($FieldName);
            if (strlen($Name) == 0)
            {
                $errorPrincipalAmount = "Pricincipal Amount field can not be blank.";
            }
            elseif (!is_numeric($Name) || ($Name <= 0))
            {
                $errorPrincipalAmount = "Principal Amount must be numeric and greater than zero.";
            }
            else
            {
                $errorPrincipalAmount = "";
            }
            return $errorPrincipalAmount;
        }
    function ValidateInterestRate($FieldName)
        {
            $Name = trim($FieldName);
            if (strlen($Name) == 0)
            {
                $errorInterestRate = "Interest Rate field can not be blank.";
            }
            elseif (!is_numeric($Name) || ($Name < 0))
            {
                $errorInterestRate = "Interest Rate must be numeric and non-negative.";
            }            
            else
            {
                $errorInterestRate = "";
            }
            return $errorInterestRate;
        }
    function ValidateName($FieldName)
        {
            $Name = trim($FieldName);
            if (strlen($Name) == 0)
            {
                $errorName = "Name field can not be blank.";
            }
            else
            {
                $errorName = "";
            }
            return $errorName;
        }
    function ValidatePostalCode($FieldName)
        {
            $Name = trim($FieldName);
            $Name = str_replace(' ', '', $Name);
            if (strlen($Name) == 0)
            {
                $errorPostalCode = "Postal Code field can not be blank.";
            }
            elseif (!preg_match("#[a-zA-Z][0-9][a-zA-Z][0-9][a-zA-Z][0-9]#", $Name))
            {
                $errorPostalCode = "Postal Code is not valid.";
            }            
            else
            {
                $errorPostalCode = "";
            }
            return $errorPostalCode;
        }
    function ValidatePhoneNumber($FieldName)
        {
            $Name = trim($FieldName);
            if (strlen($Name) == 0)
            {
                $errorPhoneNumber = "Phone Number field can not be blank.";
            }
            elseif (!preg_match("#[2-9][0-9][0-9]-[2-9][0-9][0-9]-[0-9][0-9][0-9][0-9]$#", $Name))
            {
                $errorPhoneNumber = "Phone Number is not valid.";
            }             
            else
            {
                $errorPhoneNumber = "";
            }
            return $errorPhoneNumber;
        }        
    function ValidateEmailAddress($FieldName)
        {
            $Name = trim($FieldName);
            if (strlen($Name) == 0)
            {
                $errorEmailAddress = "Email Address field can not be blank.";
            }
            elseif (!preg_match("#[a-zA-Z0-9\.]*?@[a-zA-Z0-9\.]*?\.[a-zA-Z0-9]{2,4}$#", $Name))
            {
                $errorEmailAddress = "Email Address is not valid.";
            }            
            else
            {
                $errorEmailAddress = "";
            }
            return $errorEmailAddress;
        }
    function ValidateContactMethod($FieldName)
        {
            if (!isset($FieldName))
            {
                $errorContactMethod = "Contact Method must be selected.";
            }
            else
            {
                $errorContactMethod = "";
            }
            return $errorContactMethod;
        }                
    function ValidateContactTime($FieldName1, $FieldName2)
        {
            if ($FieldName1 == 'Phone' && !isset($FieldName2))
            {
                $errorContactTime = "When preferred contact method is phone, you have to select one or more contact times.";
            }
            else
            {
                $errorContactTime = "";
            }
            return $errorContactTime;
        }
    function ValidateAgreement($FieldName)
    {
        if (!isset($FieldName))
        {
            $errorAgreement = "(You must agree with the terms and conditions.)";
        }
        return $errorAgreement;
    }
