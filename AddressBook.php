<?php


class AddressBook
{

    /**
     * Function for printing Welcome message
     */
    function welcome()
    {
        echo "Welcome to Address Book Program\n";
    }

}
//calling functions
$addressBook = new AddressBook();
$addressBook->welcome();
?>