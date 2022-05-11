<?php

include "AddressBook.php";
/**
 * Class for multiple Address Books
 * We can add multiple Address book
 */
class MultipleAddressBook
{
    public $addressBookArray;
    public $addressBook;

    function __construct()
    {
        $this->addressBook = new AddressBook();
        $this->addressBookArray = [];
    }

    function welcomeMessage()
    {
        echo "Welcome to Address Book Computation Problem\n";
    }

    /**
     * Function to add New AddressBook
     */
    function addNewAddressBook()
    {
        $addressBookName = readline("Enter Name Of Address Book : ");
        if (array_key_exists($addressBookName, $this->addressBookArray)) {
            echo "Address Book with given name already exist. Please Enter new name ";
            $this->addNewAddressBook();
        } else {
            $this->addressBookArray[$addressBookName] = NULL;
            $newBook = readline("1.To add another Book or press any key to exit.");
            if ($newBook == 1) {
                $this->addNewAddressBook();
            }
        }
    }

    /**
     * Function to add New Contacts to the AddressBook
     */
    public function addNewContact()
    {
        $addressBookName = readline("Enter name of the Address Book to add the contact : ");
        $number = (int)readline("Enter number of contacts to add : ");
        if (array_key_exists($addressBookName, $this->addressBookArray)) {
            for ($i = 0; $i < $number; $i++) {
                $this->addressBookArray[$addressBookName][$i] = $this->addressBook->$this->addNewContact();
            }
        } else {
            echo $addressBookName . "Address book not found";
        }
    }

    function editContactFromAddressBook()
    {
        $addressBookName = readline("Enter Name of the Address Book to edit Contact : ");
        $editName = readline("Enter First Name of person to edit : ");
        if (array_key_exists($addressBookName, $this->addressBookArray)) {
            foreach ($this->addressBookArray as $key => $values) {
                for ($i = 0; $i < count($values); $i++) {
                    $person = $values[$i];
                    if ($editName == $person->getFirstName()) {
                        $this->addressBookArray[$key][$i] = $this->addressBook->editContact($values[$i]);
                    }
                }
            }
        } else {
            echo $addressBookName . "Address Book not exist . please enter valid name. ";
            $this->editContactFromAddressBook();
        }
    }

    /**
     * Function to Delete AddressBook
     */
    function deleteAddressBook()
    {
        $addressBookName = readline("Enter Name of Address Book to delete : ");
        if (array_key_exists($addressBookName, $this->addressBookArray)) {
            unset($this->addressBookArray[$addressBookName]);
        } else {
            echo $addressBookName . "Address Book not exist. please enter valid Name.";
            $this->deleteAddressBook();
        }
    }

    /**
     * Function to Delete Contact from Address Book
     */
    function deleteContactFromAddressBook()
    {
        $addressBookName = readline("Enter the address book name from which want to contact delete : ");
        $deleteContact = readline("Enter Name of the Contact to delete : ");
        if (array_key_exists($addressBookName, $this->addressBookArray)) {
            foreach ($this->addressBookArray as $key => $values) {
                for ($i = 0; $i < count($values); $i++) {
                    $person = $values[$i];
                    if ($deleteContact == $person->getFirstName()) {
                        unset($this->addressBookArray[$key][$i]);
                    } else {
                        echo $addressBookName . "Address Book doesn't have " . $deleteContact . " contact in address book.";
                    }
                }
            }
        }else {
            echo $addressBookName . "AddressBook doesn't exist, Please enter valid name.";
            $this->deleteContactFromAddressBook();
        }
    }
     /**
     * Function to show all the Contacts from the Address Book
     */
    public function showContactFromAddressBook()
    {
        $addressBookName = readline('Enter Name of the AddressBook: ');
        foreach ($this->addressBookArray as $key => $values) {
            if ($key == $addressBookName) {
                echo $key . " Address Book";
                foreach ($values as $contact) {
                    echo $contact . "\n";
                }
            } else {
                echo "\nAddress Book Not Found";
            }
        }
    }
}
?>