<?php
require_once './User.php';

class Customer extends User
{
    private $customer_id;
    private $customer_id_code;
    private $customerIsActive;
    private $firstName;
    private $middleName;
    private $lastName;
    private $dateOfBirth;
    private $gender;
    private $maritalStatus;
    private $occupation;
    private $customerStatus;
    private $customerStatusDate;
    private $customerNotes;

    public function __construct($user_id, $user_id_code, $userIsActive, $username, $password, $newsletterSubscription, $termsAndPrivacyAccepted, $folderPath, $profilePicture, $userStatus, $userStatusDate, $userNotes, $customer_id, $customer_id_code, $customerIsActive, $firstName, $middleName, $lastName, $dateOfBirth, $gender, $maritalStatus, $occupation, $customerStatus, $customerStatusDate, $customerNotes)
    {
        parent::__construct($user_id, $user_id_code, $userIsActive, $username, $password, $newsletterSubscription, $termsAndPrivacyAccepted, $folderPath, $profilePicture, $userStatus, $userStatusDate, $userNotes);
        $this->customer_id = $customer_id;
        $this->customer_id_code = $customer_id_code;
        $this->customerIsActive = $customerIsActive;
        $this->firstName = $firstName;
        $this->middleName = $middleName;
        $this->lastName = $lastName;
        $this->dateOfBirth = $dateOfBirth;
        $this->gender = $gender;
        $this->maritalStatus = $maritalStatus;
        $this->occupation = $occupation;
        $this->customerStatus = $customerStatus;
        $this->customerStatusDate = $customerStatusDate;
        $this->customerNotes = $customerNotes;
    }

    // getter and setter methods
    function getId()
    {
        return $this->customer_id;
    }

    function setId($customer_id)
    {
        $this->customer_id = $customer_id;
    }

    function getIdCode()
    {
        return $this->customer_id_code;
    }

    function setIdCode($customer_id_code)
    {
        $this->customer_id_code = $customer_id_code;
    }

    function getIsActive()
    {
        return $this->customerIsActive;
    }

    function setIsActive($customerIsActive)
    {
        $this->customerIsActive = $customerIsActive;
    }

    function getFirstName()
    {
        return $this->firstName;
    }

    function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    function getMiddleName()
    {
        return $this->middleName;
    }

    function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }

    function getLastName()
    {
        return $this->lastName;
    }

    function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    function getGender()
    {
        return $this->gender;
    }

    function setGender($gender)
    {
        $this->gender = $gender;
    }

    function getMaritalStatus()
    {
        return $this->maritalStatus;
    }

    function setMaritalStatus($maritalStatus)
    {
        $this->maritalStatus = $maritalStatus;
    }

    function getOccupation()
    {
        return $this->occupation;
    }

    function setOccupation($occupation)
    {
        $this->occupation = $occupation;
    }

    function getStatus()
    {
        return $this->customerStatus;
    }

    function setStatus($customerStatus)
    {
        $this->customerStatus = $customerStatus;
    }

    function getStatusDate()
    {
        return $this->customerStatusDate;
    }

    function setStatusDate($customerStatusDate)
    {
        $this->customerStatusDate = $customerStatusDate;
    }

    function getNotes()
    {
        return $this->customerNotes;
    }

    function setNotes($customerNotes)
    {
        $this->customerNotes = $customerNotes;
    }
}
