<?php
/**
 * Created by PhpStorm.
 * User: Eric McWinNEr
 * Date: 11/24/2017
 * Time: 10:51 PM
 */

class messenger
{
    private $firstname;
    private $userid;
    private $email;
    private $lastname;
    private $lastIpAddressUsed;
    private $lastBrowserUsed;
    private $timeAdded;
    private $timeLastMessageSent;
    private $messagesSent;

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     * @return messenger
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastIpAddressUsed()
    {
        return $this->lastIpAddressUsed;
    }

    /**
     * @param mixed $lastIpAddressUsed
     * @return messenger
     */
    public function setLastIpAddressUsed($lastIpAddressUsed)
    {
        $this->lastIpAddressUsed = $lastIpAddressUsed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastBrowserUsed()
    {
        return $this->lastBrowserUsed;
    }

    /**
     * @param mixed $lastBrowserUsed
     * @return messenger
     */
    public function setLastBrowserUsed($lastBrowserUsed)
    {
        $this->lastBrowserUsed = $lastBrowserUsed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimeAdded()
    {
        return $this->timeAdded;
    }

    /**
     * @param mixed $timeAdded
     * @return messenger
     */
    public function setTimeAdded($timeAdded)
    {
        $this->timeAdded = $timeAdded;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimeLastMessageSent()
    {
        return $this->timeLastMessageSent;
    }

    /**
     * @param mixed $timeLastMessageSent
     * @return messenger
     */
    public function setTimeLastMessageSent($timeLastMessageSent)
    {
        $this->timeLastMessageSent = $timeLastMessageSent;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessagesSent()
    {
        return $this->messagesSent;
    }

    /**
     * @param mixed $messagesSent
     * @return messenger
     */
    public function setMessagesSent($messagesSent)
    {
        $this->messagesSent = $messagesSent;
        return $this;
    }

    /**
     * messenger constructor.
     */
    public function __construct($messenger = null)
    {
        if($messenger !== null){
            $this->create($messenger);
        }
    }

    /**
     * initialize an object
     * @param messenger The object to be instantiated
     */
    private function create($messenger){
        $this->firstname = $messenger->getFirstname();
        $this->userid = $messenger->getUserid();
        $this->email = $messenger->getEmail();
        $this->lastname = $messenger->getLastname();
        $this->lastIpAddressUsed = $messenger->getLastIpAddressUsed();
        $this->lastBrowserUsed = $messenger->getLastBrowserUsed();
        $this->timeAdded = $messenger->getTimeAdded();
        $this->timeLastMessageSent = $messenger->getTimeLastMessageSent();
        $this->messagesSent = $messenger->getMessagesSent();
    }
    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     * @return messenger
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param mixed $userid
     * @return messenger
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return messenger
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }


}