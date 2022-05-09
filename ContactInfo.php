<?php

/**
 * Class for contact details created constructor , get methods and toString method 
 */
class ContactInfo
{
    protected $firstName;
    protected $lastName;
    protected $address;
    protected $city;
    protected $State;
    protected $zipCode;
    protected $phoneNumber;
    protected $email;

    /**
     * Parameterized constructor function
     */
    function __construct($firstName, $lastName, $address, $city, $state, $zip, $phoneNumber, $email)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
    }

    /**
     * Getter setter functions  
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getZip()
    {
        return $this->zip;
    }

    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }



    //function toString
    public function __toString()
    {
        return "\nFirst Name : " . $this->firstName
            . "\nLast Name : " . $this->lastName
            . "\nAddress : " . $this->address
            . "\nCity : " . $this->city
            . "\nState : " . $this->state
            . "\nZip : " . $this->zip
            . "\nPhone Number : " . $this->phoneNumber
            . "\nEmail : " . $this->email;
    }
}
?>