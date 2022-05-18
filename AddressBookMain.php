<?php

include "MultipleAddressBook.php";
//include "AddressBook.php";

class AddressBookMain
{
    function multipleAddressBook()
    {
      //  $addressBook = new AddressBook();
        $multipleAddressBook = new MultipleAddressBook();

        while (true) {
            echo "\n1. Add New AddressBook 
                  \n2. Add New Contact to AddressBook
                  \n3. Edit Contact in a AddressBook 
                  \n4. Delete AddressBook
                  \n5. Delete Contact from AddressBook 
                  \n6. Search Contact by City Name 
                  \n7. Sort Contact by First Name 
                  \n8. Show Contacts from AddressBook
                  \n0. Exit\n";

            $choice = readline('Enter Your Choice : ');
            switch ($choice) {
                case 1:
                    $multipleAddressBook->addNewAddressBook();
                    break;
        
                case 2:
                    $multipleAddressBook->addNewContact();
                    break;
        
                case 3:
                    $multipleAddressBook->editContactFromAddressBook();
                    break;
        
                case 4:
                    $multipleAddressBook->deleteAddressBook();
        
                case 5:
                    $multipleAddressBook->deleteContactFromAddressBook();
                    break;
            
                case 6:
                    $multipleAddressBook->searchPersonByCity();
                    break;

                case 7:
                    $multipleAddressBook->sortPersonByName();
                    break;
    
                case 8:
                    $multipleAddressBook->showContactFromAddressBook();
                    break;
    
                case 0:
                    exit("Exit");
                    break;
    
                default:
                    echo "\nWrong Choice.";
                    break;
            }
        }
    }
}

$addressBookMain = new AddressBookMain();
$addressBookMain->multipleAddressBook();
?>