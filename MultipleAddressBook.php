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
            $newBook = readline("Press 1 To add another Book or press any key to exit.");
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
        echo "\n";
        $addressBookName = readline("Enter name of the Address Book to add new contact : ");
        echo "\n";
        $number = readline("Enter Number of contacts to add : ");
        if (array_key_exists($addressBookName, $this->addressBookArray)) {
            for ($i = 0; $i < $number; $i++) {
                $firstName = readline("Enter First Name : ");
                foreach ($this->addressBookArray as $key => $values) {
                    if ($key == $addressBookName) {
                        if ($values == null) {
                            $this->addressBookArray[$addressBookName][$i] = $this->addressBook->addNewContactDetails($firstName);
                            echo "Contact added successfully.\n";
                            break;
                        }
                        for ($j = 0; $j < $number; $j++) {
                            if ($firstName == $values[$j]->getFirstName()) {
                                echo "The person with given name is already exist.\n";
                                $i--;
                                break;
                            } else {
                                $this->addressBookArray[$addressBookName][$i] = $this->addressBook->addNewContactDetails($firstName);
                                echo "Contact added successfully. \n";
                                break;
                            }
                        }
                    }
                }
            }
        } else {
            echo $addressBookName . "Address book not found.\n";
        }
    }

    /**
     * Function to edit Contact from AddressBook using First Name
     */
    function editContactFromAddressBook()
    {
        echo "\n";
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
        echo "\n";
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
        echo "\n";
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
        } else {
            echo $addressBookName . "AddressBook doesn't exist, Please enter valid name.";
            $this->deleteContactFromAddressBook();
        }
    }

  

     /**
     * Function to search a person by their State
     */
    public function searchPersonByState()
    {
        echo "\n";
        $stateName = readline('Enter the State Name : ');
        foreach ($this->addressBookArray as $key => $values) {
            for ($i = 0; $i < count($values); $i++) {
                if ($stateName == $values[$i]->getState()) {
                    echo "Address Book : " . $key . "\n";
                    echo "First Name : " . $values[$i]->getFirstName() . "\n";
                    echo "Last Name : " . $values[$i]->getLastName() . "\n";
                    echo "Address :" .$values[$i]->getAddress() . "\n";
                    echo "City :" .$values[$i]->getCity() . "\n";
                    echo "State :" . $values[$i]->getState() . "\n"; 
                    echo "Zip code :" .$values[$i]->getZip() . "\n";
                    echo "Phone Number :" .$values[$i]->getPhoneNumber() . "\n";
                    echo "Email :" .$values[$i]->getEmail() . "\n";
                    echo "\n";
                }
            }
        }
    }

    
    /**
     * Function to sort the AddressBook contacts by name
     */
    public function sortPersonByName()
    {
        echo "\n";
        $addressBookName = readline('Enter the Name of Address Book : ');
        foreach ($this->addressBookArray as $key => $values) {
            if ($key == $addressBookName) {
                $num = count($values);
                for ($i = 0; $i < $num - 1; $i++) {
                    for ($j = $i + 1; $j <= $num - 1; $j++) {
                        if ($values[$i]->getFirstName() > $values[$j]->getFirstName()) {
                            $temp = $values[$i];
                            $values[$i] = $values[$j];
                            $values[$j] = $temp;
                        }
                    }
                }
                foreach ($values as $contact) {
                    echo $contact;
                }
            }
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
                echo $key . " Address Book Contains-";
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