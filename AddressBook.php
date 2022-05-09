<?php

include "ContactInfo.php";

/**
 * Uc-2
 * 1.Create contact in address book with following details
 * - first name, last name, address, city, state, zip, phone number and email.
 * 2.Create new contact in address book
 */

class AddressBook
{
    public $contactArray = array();
    public $person;

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
    function addNewContactDetails()
    {
        //echo "Contact informa"
        $this->firstName = readline("Enter your first name : ");
        $this->lastName = readline("Enter your last name : ");
        $this->address = readline("Enter your address : ");
        $this->city = readline("Enter your city : ");
        $this->state = readline("Enter your state : ");
        $this->zip = readline("Enter your zip code : ");
        $this->phoneNumber = readline("Enter your phone Number : ");
        $this->email = readline("Enter your email : ");

        $this->person = new ContactInfo($this->firstName, $this->lastName, $this->address, $this->city, $this->state, $this->zip, $this->phoneNumber, $this->email);
        array_push($this->contactArray, $this->person);
    }

    /**
     * Function to show contact information given by user
     */
    function showContactDetails()
    {

        for ($i = 0; $i < count($this->contactArray); $i++) {
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
}
//calling functions
$addressBook = new AddressBook();
$addressBook->welcome();
$addressBook->addNewContactDetails();
$addressBook->showContactDetails();
?>