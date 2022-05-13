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

        $lastName = readline("Enter your last name : ");
        $util->validateName($this->lastName);

        $address = readline("Enter your address : ");
        $util->validateAddress($this->address);

        $city = readline("Enter your city : ");
        $util->validateLocation($this->city);

        $state = readline("Enter your state : ");
        $util->validateLocation($this->state);

        $zip = readline("Enter your zip code : ");
        $util->validateZip($this->zip);

        //+91-9075183900
        $phoneNumber = readline("Enter your phone Number : ");
        $util->validatePhoneNumber($this->phoneNumber);

        $email = readline("Enter your email : ");
        $util->validateEmail($this->email);

        $this->person = new ContactInfo($firstName, $lastName, $address, $city, $state, $zip, $phoneNumber, $email);

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

        $this->person->setFirstName($firstName);
        $this->person->setLastName($lastName);
        $this->person->setAddress($address);
        $this->person->setCity($city);
        $this->person->setState($state);
        $this->person->setZip($zip);
        $this->person->setPhoneNumber($phoneNumber);
        $this->person->setEmail($email);

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