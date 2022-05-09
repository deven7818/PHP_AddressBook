<?php

include "ContactInfo.php";

/**
 * Uc-4
 * 1.Create contact in address book with following details
 * - first name, last name, address, city, state, zip, phone number and email.
 * 2.Create new contact in address book
 * 3.Edit existing contact person using their name
 * 4.Delete Person from address book using first Name
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

    function editContact()
    {
        $editName = readline("\nEnter First Name of Person to edit : ");
        for ($i = 0; $i < count($this->contactArray); $i++) {
            $name = $this->contactArray[$i];
            echo "First Name " . $name->getFirstName() . "\n";
            if ($editName == $name->getFirstName()) {
                $this->firstName = readline("Edit your first name : ");
                $this->lastName = readline("Edit your last name : ");
                $this->address = readline("Edit your address : ");
                $this->city = readline("Edit your city : ");
                $this->state = readline("Edit your state : ");
                $this->zip = readline("Edit your zip code : ");
                $this->phoneNumber = readline("Edit your phone Number : ");
                $this->email = readline("Edit your email : ");

                $name->setFirstName($this->firstName);
                $name->setLastName($this->lastName);
                $name->setAddress($this->address);
                $name->setCity($this->city);
                $name->setState($this->state);
                $name->setZip($this->zip);
                $name->setPhoneNumber($this->phoneNumber);
                $name->setEmail($this->email);

                $this->contactArray[$i] = $name;
                $this->showContactDetails();
                break;
            } else {
                echo "The Name does not exist.";
            }
        }
    }

    /**
     * Function to delete contact by first Name
     */
    function deleteContact()
    {
        echo "\n";
        $deletePerson = readline("\nEnter the first name of person to delete person : ");
        for ($i = 0; $i < count($this->contactArray); $i++) {
            $name = $this->contactArray[$i];
            if ($deletePerson ==  $name->getFirstName()) {
                unset($this->contactArray[$i]);
                $this->showContactDetails();
            }
        }
    }

    /**
     * Function to show contact information given by user
     */
    function showContactDetails()
    {
        for ($i = 0; $i < count($this->contactArray); $i++) {
            echo "Contact information is : ";
            echo "\nFirst Name : " . $this->person->getFirstName()
                . "\Last Name : " . $this->person->getLastName()
                . "\nAddress : " . $this->person->getAddress()
                . "\nCity : " . $this->person->getCity()
                . "\nState : " . $this->person->getState()
                . "\nZip Code : " . $this->person->getZip()
                . "\nPhone Number : " . $this->person->getPhoneNumber()
                . "\nEmail Id : " . $this->person->getEmail();
        }
    }
}
//calling functions
$addressBook = new AddressBook();
$addressBook->welcome();
$addressBook->addNewContactDetails();
$addressBook->showContactDetails();
$addressBook->editContact();
$addressBook->deleteContact();
?>