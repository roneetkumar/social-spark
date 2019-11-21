<?php

class Post
{
    private $postID;
    private $content;
    private $image;
    private $date;
    private $likes;

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
            case 4:
                $this->construct2($args[0], $args[1], $args[2], $args[3]);
                break;
            default:
                trigger_error('Incorrect number of arguments for Foo::__construct', E_USER_WARNING);
                break;
        }
    }

    private function construct0()
    {
        //constructor that takes no parameters
    }

    private function construct1($content, $image)
    {
        $this->postID = rand(10000, 99999);
        $this->content = $content;
        $this->image = $image;
        $this->date = date("Y-m-d");

    }

    private function construct2($postID, $content, $image, $date)
    {
        $this->postID = $postID;
        $this->content = $content;
        $this->image = $image;
        $this->date = $date;

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

    public function getLikes()
    {
        // $sql = "SELECT likes from posts WHERE postID=?";
        // $prepare = $connection->prepare($sql);
        // $prepare->execute([$this->postID]);
        // $likes = $prepare->fetch()['likes'];

        // return $this->likes;
    }

    public function findPost($connection, $postID)
    {
        // $sql = "SELECT * FROM poast WHERE postID =?";
        // $prepare = $connection->prepare($sql);
        // $prepare->execute([$postID]);
        // $tempUser = $prepare->fetch();

        // if (sizeof($tempUser) > 0) {
        //     $this->fname = $tempUser['postID'];
        //     $this->lname = $tempUser['email'];
        //     $this->email = $tempUser['content'];
        //     $this->pass = $tempUser['image'];
        //     $this->pass = $tempUser['date'];
        //     $this->pass = $tempUser['likes'];
        //     return true;
        // } else {
        //     return false;
        // }

    }

    public function __toString()
    {
        return "$this->postID,$this->content, $this->date";
    }

}
