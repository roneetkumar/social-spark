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
        $this->date = date("Y-m-d h:i:s A");
    }

    public function getMessageFrom()
    {
        return $this->from;
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
