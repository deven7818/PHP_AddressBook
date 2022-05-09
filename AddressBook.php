<?php

/**
 * Uc-1
 * Create contact in address book with following details
 * - first name, last name, address, city, state, zip, phone number and email.
 */

class AddressBook
{
    public $firstName;
    public $lastName;
    public $address;
    public $city;
    public $state;
    public $zip;
    public $phoneNumber;
    public $email;


    /**
     * Function for printing Welcome message
     */
    function welcome()
    {
        echo "Welcome to Address Book Program\n";
    }

    /**
     * Function to get contact details information from user
     */
    function getContactDetails()
    {
        $this->firstName = readline("Enter your first name : ");
        $this->lastName = readline("Enter your last name : ");
        $this->address = readline("Enter your address : ");
        $this->city = readline("Enter your city : ");
        $this->state = readline("Enter your state : ");
        $this->zip = readline("Enter your zip code : ");
        $this->phoneNumber = readline("Enter your phone Number : ");
        $this->email = readline("Enter your email : ");
    }

    /**
     * Function to show contact information given by user
     */
    function showContactDetails()
    {
        echo "Contact information is : ";
        echo "\nFirst Name : " . $this->firstName;
        echo "\nLast Name : " . $this->lastName;
        echo "\nAddress : " . $this->address;
        echo "\nCity : " . $this->city;
        echo "\nState : " . $this->state;
        echo "\nZip Code : " . $this->zip;
        echo "\nPhone Number : " . $this->phoneNumber;
        echo "\nEmail address : " . $this->email;
    }
}
//calling functions
$addressBook = new AddressBook();
$addressBook->welcome();
$addressBook->getContactDetails();
$addressBook->showContactDetails();
?>