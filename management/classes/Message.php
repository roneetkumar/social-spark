<?php

class Message
{

    private $from;
    private $to;
    private $message;
    private $date;

    public function __construct($from, $to, $message, $date)
    {
        $this->from = $from;
        $this->to = $to;
        $this->message = $message;
        $this->date = $date;
    }

    public function getMessageFrom()
    {

        return $this->from;
    }

    public function findName($connection, $email)
    {
        $sql = "SELECT FirstName,LastName from user WHERE email=?";
        $prepare = $connection->prepare($sql);
        $prepare->execute([$email]);
        $tempName = $prepare->fetch();
        return $tempName['FirstName'] . " " . $tempName['LastName'];
    }

    public function getMessageTo()
    {
        return $this->to;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getMessageDate()
    {
        return $this->date;
    }

}
