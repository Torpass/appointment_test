<?php
class User
{
    private $user_id;
    private $user_id_code;
    private $userIsActive;
    private $username;
    private $password;
    private $newsletterSubscription;
    private $termsAndPrivacyAccepted;
    private $folderPath;
    private $profilePicture;
    private $userStatus;
    private $userStatusDate;
    private $userNotes;

    public function __construct($user_id, $user_id_code, $userIsActive, $username, $password, $newsletterSubscription, $termsAndPrivacyAccepted, $folderPath, $profilePicture, $userStatus, $userStatusDate, $userNotes)
    {
        $this->user_id = $user_id;
        $this->user_id_code = $user_id_code;
        $this->userIsActive = $userIsActive;
        $this->username = $username;
        $this->password = $password;
        $this->newsletterSubscription = $newsletterSubscription;
        $this->termsAndPrivacyAccepted = $termsAndPrivacyAccepted;
        $this->folderPath = $folderPath;
        $this->profilePicture = $profilePicture;
        $this->userStatus = $userStatus;
        $this->userStatusDate = $userStatusDate;
        $this->userNotes = $userNotes;
    }

    // getter and setter methods
    function getId()
    {
        return $this->user_id;
    }

    function setId($user_id)
    {
        $this->user_id = $user_id;
    }

    function getIdCode()
    {
        return $this->user_id_code;
    }

    function setIdCode($user_id_code)
    {
        $this->user_id_code = $user_id_code;
    }

    function getIsActive()
    {
        return $this->userIsActive;
    }

    function setIsActive($userIsActive)
    {
        $this->userIsActive = $userIsActive;
    }

    function getUsername()
    {
        return $this->username;
    }

    function setUsername($username)
    {
        $this->username = $username;
    }

    function getPassword()
    {
        return $this->password;
    }

    function setPassword($password)
    {
        $this->password = $password;
    }

    function getNewsletterSubscription()
    {
        return $this->newsletterSubscription;
    }

    function setNewsletterSubscription($newsletterSubscription)
    {
        $this->newsletterSubscription = $newsletterSubscription;
    }

    function getTermsAndPrivacyAccepted()
    {
        return $this->termsAndPrivacyAccepted;
    }

    function setTermsAndPrivacyAccepted($termsAndPrivacyAccepted)
    {
        $this->termsAndPrivacyAccepted = $termsAndPrivacyAccepted;
    }

    function getFolderPath()
    {
        return $this->folderPath;
    }

    function setFolderPath($folderPath)
    {
        $this->folderPath = $folderPath;
    }

    function getProfilePicture()
    {
        return $this->profilePicture;
    }

    function setProfilePicture($profilePicture)
    {
        $this->profilePicture = $profilePicture;
    }

    function getStatus()
    {
        return $this->userStatus;
    }

    function setStatus($userStatus)
    {
        $this->userStatus = $userStatus;
    }

    function getStatusDate()
    {
        return $this->userStatusDate;
    }

    function setStatusDate($userStatusDate)
    {
        $this->userStatusDate = $userStatusDate;
    }

    function getNotes()
    {
        return $this->userNotes;
    }

    function setNotes($userNotes)
    {
        $this->userNotes = $userNotes;
    }
}
