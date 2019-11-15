<?php

include_once 'Post.php';

class User
{
    // private $userID;
    private $fname;
    private $lname;
    private $email;
    private $pass;
    private $friends = [];
    private $posts = [];
    private $pages = [];

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

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->pass;
    }

    public function getFname()
    {
        return $this->fname;
    }
    public function getLname()
    {
        return $this->lname;
    }

    public function getPosts()
    {
        return $this->posts;
    }

    public function setFriends($connection)
    {
        $sql = "SELECT * from user WHERE Email IN(SELECT RelatedUserEmail FROM friends WHERE RelatingUserEmail=?)";
        $prepare = $connection->prepare($sql);
        $prepare->execute([$this->email]);
        $result = $prepare->fetchAll();

        foreach ($result as $key => $value) {
            if (sizeof($result) > 0) {
                $fname = $value['FirstName'];
                $lname = $value['LastName'];
                $email = $value['Email'];
                // $pass = $value['Password'];

                $this->friends[$key] = new User($fname, $lname, $email);
            } else {
                return null;
            }

        }

    }

    public function setPosts($connection)
    {
        $sql = "SELECT * FROM posts WHERE Email =?";
        $prepare = $connection->prepare($sql);
        $prepare->execute([$this->email]);
        $result = $prepare->fetchAll();

        foreach ($result as $key => $tempPost) {
            if (sizeof($result) > 0) {
                $postID = $tempPost['postID'];
                $content = $tempPost['content'];
                $image = $tempPost['image'];
                $date = $tempPost['date'];

                $this->posts[$key] = new Post($postID, $content, $image, $date);
            } else {
                return null;
            }

        }

    }

    public function getFriends()
    {
        return $this->friends;
    }

    public function createPost($content, $image, $connection)
    {
        $tempPost = new Post($content, $image);
        $postID = $tempPost->getPostID();
        $content = $tempPost->getContent();
        $image = $tempPost->getImage();
        $date = $tempPost->getDate();

        $sql = "INSERT INTO posts VALUES('$postID', '$this->email', '$content', '$image','$date')";
        $result = $connection->exec($sql);
    }

    public function create($connection)
    {
        $fname = $this->fname;
        $lname = $this->lname;
        $email = $this->email;
        $pass = $this->pass;

        $sql = "INSERT INTO user VALUES('$fname', '$lname', '$email', '$pass')";
        $result = $connection->exec($sql);
        return $result;
    }

    public function find($connection)
    {
        $sql = "SELECT * FROM user WHERE email =?";
        $prepare = $connection->prepare($sql);
        $prepare->execute([$this->email]);
        $tempUser = $prepare->fetch();

        if (sizeof($tempUser) > 0) {
            $fname = $tempUser['FirstName'];
            $lname = $tempUser['LastName'];
            $email = $tempUser['Email'];
            $pass = $tempUser['Password'];

            $user = new User($fname, $lname, $email, $pass);
        } else {
            return null;
        }
        return $user;
    }

    public function findAll($connection)
    {
        $sql = "SELECT * from user";
        $prepare = $connection->prepare($sql);
        $prepare->execute();
        $result = $prepare->fetchAll();

        foreach ($result as $key => $value) {
            if (sizeof($result) > 0) {
                $fname = $value['FirstName'];
                $lname = $value['LastName'];
                $email = $value['Email'];

                $allUsers[$key] = new User($fname, $lname, $email);
            } else {
                return null;
            }

        }
        return $allUsers;
    }

    public function __toString()
    {
        return "$this->fname,$this->lname, $this->email";
    }

}
