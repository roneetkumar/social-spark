<?php

class User
{
    // private $userID;
    private $fname;
    private $lname;
    private $email;
    private $gender;
    private $dob;
    private $phone;
    private $pass;

    public function __construct($fname = null, $lname = null, $email = null, $pass = null)
    {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->pass = $pass;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->pass;
    }

    public function create($connection)
    {
        $fname = $this->fname;
        $lname = $this->lname;
        $email = $this->email;
        $pass = $this->pass;

        $sql = "INSERT INTO user VALUES('$fname', '$lname', '','','$email','', '$pass')";
        $result = $connection->exec($sql);
        return $result;
    }

    public function find($connection)
    {
        $sql = "SELECT * FROM user WHERE email = :uEmail";
        $prepare = $connection->prepare($sql);
        $prepare->bindValue(":uEmail", $this->email, PDO::PARAM_INT);
        $prepare->execute();
        $result = $prepare->fetchAll();

        if (sizeof($result) > 0) {
            $fname = $result[0]['firstName'];
            $lname = $result[0]['lastName'];
            $email = $result[0]['email'];
            $pass = $result[0]['password'];
            $phone = $result[0]['phone'];

            $user = new User($fname, $lname, $email, $pass);
        } else {
            return null;
        }
        return $user;
    }

    public function __toString()
    {
        return "$this->fname,$this->lname, $this->email";
    }

}
