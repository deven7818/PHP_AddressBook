<?php

include "ContactInfo.php";
include "Util.php";
/**
 * Uc-5
 * 1.Create contact in address book with following details
 * - first name, last name, address, city, state, zip, phone number and email.
 * 2.Create new contact in address book
 * 3.Edit existing contact person using their name
 * 4.Delete Person from address book using first Name
 * 5.Add Multiple person to address book
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
        echo "\nWelcome to Address Book Program\n";
    }

    /**
     * Function to get contact details information from user
     */

     
    function addNewContactDetails()
    {
        //echo "Contact informa"
        $util = new Util();
        $this->firstName = readline("Enter your first name : ");
        $util->validateName($this->firstName);


        $this->lastName = readline("Enter your last name : ");
        $util->validateName($this->lastName);

        $this->address = readline("Enter your address : ");
        $util->validateAddress($this->address);

        $this->city = readline("Enter your city : ");
        $util->validateLocation($this->city);



        $this->state = readline("Enter your state : ");
        $util->validateLocation($this->state);

        
        $this->zip = readline("Enter your zip code : ");
        $util->validateZip($this->zip);

        //^([0-9]{2}[\\s]?){1}[0-9]{9,10}$
        //+91-9075183900

        $this->phoneNumber = readline("Enter your phone Number : ");
        $util->validatePhoneNumber($this->phoneNumber);

        $this->email = readline("Enter your email : ");
        $util->validateEmail($this->email);

        $this->person = new ContactInfo($this->firstName, $this->lastName, $this->address, $this->city, $this->state, $this->zip, $this->phoneNumber, $this->email);
        array_push($this->contactArray, $this->person);
    }

    function editContact()
    {
        $editName = readline("Enter First Name of Person to edit : ");
        for ($i = 0; $i < count($this->contactArray); $i++) {
            $name = $this->contactArray[$i];
            echo "\nFirst Name " . $name->getFirstName() . "\n";
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
                echo "\nThe Name does not exist.";
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
        foreach ($this->contactArray as $contacts) {
            echo $contacts . "\n";
        }
    }
}
//calling functions
$addressBook = new AddressBook();
$addressBook->welcome();
// $addressBook->addNewContactDetails();
// $addressBook->showContactDetails();
// $addressBook->editContact();
// $addressBook->deleteContact();
while (true) {
    echo "\n1. Add New Contact \n2. Edit Person's Information \n3. Delete Person \n4. Show Person \n5.Exit \n";
    $choice = readline("Enter your choice : \n");
    switch ($choice) {
        case 1:
            $addressBook->addNewContactDetails();
            break;

        case 2:
            $addressBook->editContact();
            break;

        case 3:
            $addressBook->deleteContact();
            break;

        case 4:
            $addressBook->showContactDetails();
            break;

        case 5:
            exit("Exit");
            break;

        default:
            echo "\nWrong Choice.";
            break;
    }
}
?>