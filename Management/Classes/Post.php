<?php

class Post
{
    private $postID;
    private $content;
    private $image;
    private $date;
    private $likes;
    private $email;
    private $postedBy;

    public function __construct()
    {
        $args = func_get_args(); //any function that calls this method can take an arbitrary number of parameters
        switch (func_num_args()) {
            //delegate to helper methods
            case 0:
                $this->construct0();
                break;
            case 2:
                $this->construct1($args[0], $args[1]);
                break;
            case 5:
                $this->construct2($args[0], $args[1], $args[2], $args[3], $args[4]);
                break;
            default:
                trigger_error('Incorrect number of arguments for Foo::__construct', E_USER_WARNING);
                break;
        }
    }

    private function construct0()
    {
        //constructor that takes no parameters
        $this->canEdit = false;

    }

    private function construct1($content, $image)
    {
        $this->postID = rand(10000, 99999);
        $this->content = $content;
        $this->image = $image;
        $this->date = date("Y-m-d h:i:s A");
        $this->canEdit = false;

    }

    private function construct2($postID, $email, $content, $image, $date)
    {
        $this->postID = $postID;
        $this->email = $email;
        $this->content = $content;
        $this->image = $image;
        $this->date = $date;
        $this->canEdit = false;

    }

    public function setPostedBy($connection)
    {
        $sql = "SELECT FirstName from user WHERE email=?";
        $prepare = $connection->prepare($sql);
        $prepare->execute([$this->email]);
        $tempPost = $prepare->fetch();
        $this->postedBy = $tempPost['FirstName'];
    }

    public function getPostedBy()
    {
        return $this->postedBy;
    }

    public function getPostID()
    {
        return $this->postID;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function getCanEdit()
    {
        return $this->canEdit;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getLikes($connection)
    {
        $sql = "SELECT count(postID) as 'likes' from likes WHERE postID=?";
        $prepare = $connection->prepare($sql);
        $prepare->execute([$this->postID]);
        $this->likes = $prepare->fetch()['likes'];

        return $this->likes;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPostID($id)
    {
        $this->postID = $id;
    }

    public function findPost($connection, $postID)
    {
        $sql = "SELECT * FROM posts WHERE postID =?";
        $prepare = $connection->prepare($sql);
        $prepare->execute([$postID]);
        $tempUser = $prepare->fetch();

        if (sizeof($tempUser) > 0) {
            $this->postID = $tempUser['postID'];
            $this->email = $tempUser['email'];
            $this->content = $tempUser['content'];
            $this->image = $tempUser['image'];
            $this->date = $tempUser['date'];
            return true;
        } else {
            return false;
        }

    }

    public function __toString()
    {
        return "$this->postID,$this->content, $this->date";
    }

}
