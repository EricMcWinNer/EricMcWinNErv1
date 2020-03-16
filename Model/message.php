<?php
class Message
{
    private $user_id;
    private $message_id;
    private $firstname;
    private $lastname;
    private $email;
    private $phonenumber;
    private $message;
    private $status;
    private $timesent;

    /**
     * Message constructor.
     */
    public function __construct($message = null)
    {
        if($message !== null){
            $this->message_id = $message->getMessageId();
            $this->firstname = $message->getFirstname();
            $this->lastname = $message->getLastname();
            $this->email = $message->getEmail();
            $this->phonenumber = $message->getPhonenumber();
            $this->message = $message->getMessage();
            $this->status = $message->getStatus();
            $this->timesent = $message->getTimesent();
            $this->user_id = $message->getUserId();
        }
    }


    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return Message
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     * @return Message
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessageId()
    {
        return $this->message_id;
    }

    /**
     * @param mixed $message_id
     * @return Message
     */
    public function setMessageId($message_id)
    {
        $this->message_id = $message_id;
        return $this;
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
     * @return Message
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     * @return Message
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
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
     * @return Message
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    /**
     * @param mixed $phonenumber
     * @return Message
     */
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     * @return Message
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimesent()
    {
        return $this->timesent;
    }

    /**
     * @param mixed $timesent
     * @return Message
     */
    public function setTimesent($timesent)
    {
        $this->timesent = $timesent;
        return $this;
    }

}