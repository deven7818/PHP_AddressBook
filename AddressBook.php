<?php

include "ContactInfo.php";
include "Util.php";
/**
 * Uc-8
 * 1.Create contact in address book with following details
 * - first name, last name, address, city, state, zip, phone number and email.
 * 2.Create new contact in address book
 * 3.Edit existing contact person using their name
 * 4.Delete Person from address book using first Name
 * 5.Add Multiple person to address book
 * 6.add multiple Address Book to the System with a unique Name
 * 7.Search contact by City Name in address book.
 * 8.Sort contact by First name in address book.
 * 
 */

class AddressBook
{
    public $person;

    /**
     * Function to get contact details information from user
     * Passing firstName as parameter
     * Returns person object
     */
    function addNewContactDetails($firstName)
    {

        $util = new Util();

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

        //+91-9075183900
        $this->phoneNumber = readline("Enter your phone Number : ");
        $util->validatePhoneNumber($this->phoneNumber);

        $this->email = readline("Enter your email : ");
        $util->validateEmail($this->email);

        $this->person = new ContactInfo($firstName, $this->lastName, $this->address, $this->city, $this->state, $this->zip, $this->phoneNumber, $this->email);

        return $this->person;
    }

    //Function to edit contact with first name
    function editContact()
    {
        $firstName = readline("Edit your first name : ");
        $lastName = readline("Edit your last name : ");
        $address = readline("Edit your address : ");
        $city = readline("Edit your city : ");
        $state = readline("Edit your state : ");
        $zip = readline("Edit your zip code : ");
        $phoneNumber = readline("Edit your phone Number : ");
        $email = readline("Edit your email : ");

        $this->person->setFirstName($this->firstName);
        $this->person->setLastName($this->lastName);
        $this->person->setAddress($this->address);
        $this->person->setCity($this->city);
        $this->person->setState($this->state);
        $this->person->setZip($this->zip);
        $this->person->setPhoneNumber($this->phoneNumber);
        $this->person->setEmail($this->email);

        return $this->person;
    }

    /**
     * Function to delete contact by first Name
     * passing parameter addressBook
     * return the addressBook
     */
    function deleteContact($addressBook)
    {
        echo "\n";
        $deletePerson = readline("\nEnter the first name of person to delete person : ");
        foreach ($addressBook as $key => $values) {
            for ($i = 0; $i < count($values); $i++) {
                $name = $values[$i];
                if ($deletePerson ==  $name->getFirstName()) {
                    unset($values[$i]);
                }
            }
        }
        return $addressBook;
    }
}
?>