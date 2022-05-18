<?php

/**
 *Util Class to validate user input using Regex
 */
class Util
{

    //function to validate Name
    function validateName($name)
    {
        if (preg_match("/^[A-Z]{1}[a-z]{2,}$/", $name)) {
            echo "Valid firstName\n";
        } else {
            echo "Invalid... Please inter valid firstName";
        }
    }

    //function to validate Address
    function validateAddress($address)
    {
        if (preg_match("/^[A-Za-z0-9]{1,15}[\.\-\s\,]{1,}[A-Za-z0-9]{1,15}$/", $address)) {
            echo "Valid Address\n";
        } else {
            echo "Invalid... Please inter valid Address\n";
        }
    }

    //function to validate Location like city, state
    function validateLocation($location)
    {
        if (preg_match("/^[A-Z]{1}[a-z]{2,}$/", $location)) {
            echo "Valid Location\n";
        } else {
            echo "Invalid... Please inter valid Location\n";
        }
    }

    //function to validate Zip code
    function validateZip($zip)
    {
        if (preg_match("/^[0-9]{6}$/", $zip)) {
            echo "Valid Zip code\n";
        } else {
            echo "Invalid... Please inter valid Zip Code\n";
        }
    }

    //function to validate Phone number
    function validatePhoneNumber($phoneNumber)
    {
        if (preg_match("/^\+[0-9]{2}-[0-9]{10}$/", $phoneNumber)) {
            echo "Valid phone Number\n";
        } else {
            echo "Invalid... Please inter valid phone Number\n";
        }
    }

    //function to validate Email id
    function validateEmail($email)
    {
        if (preg_match("/^[a-z0-9]+([_+-.][0-9a-z]+)*@[a-z]+.[a-z]{2,3}$/", $email)) {
            echo "Valid Email\n";
        } else {
            echo "Invalid... Please inter valid Email";
        }
    }
}
?>