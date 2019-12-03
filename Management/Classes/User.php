<?php

include_once 'Post.php';
include_once 'Message.php';

class User
{
    private $fname;
    private $lname;
    private $email;
    private $pass;
    private $friends = [];
    private $posts = [];
    private $messages = [];
    private $requests = [];
    private $savedPosts = [];

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

    public function setPassword($pass)
    {
        $this->pass = $pass;
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

    public function getFriends($connection)
    {
        $this->friends = [];
        $sql = "SELECT * from user WHERE Email IN(SELECT RelatedUserEmail FROM friends WHERE RelatingUserEmail=? AND status =?)";
        $prepare = $connection->prepare($sql);
        $prepare->execute([$this->email, '1']);
        $result = $prepare->fetchAll();

        foreach ($result as $key => $value) {
            if (sizeof($result) > 0) {
                $fname = $value['FirstName'];
                $lname = $value['LastName'];
                $email = $value['Email'];
                $this->friends[$key] = new User($fname, $lname, $email);
            } else {
                return null;
            }
        }
        return $this->friends;
    }

    public function getPosts($connection)
    {
        $this->posts = [];
        $sql = "SELECT * FROM posts WHERE Email =? ORDER BY date DESC";
        $prepare = $connection->prepare($sql);
        $prepare->execute([$this->email]);
        $result = $prepare->fetchAll();

        foreach ($result as $key => $tempPost) {
            if (sizeof($result) > 0) {
                $postID = $tempPost['postID'];
                $content = $tempPost['content'];
                $image = $tempPost['image'];
                $date = $tempPost['date'];

                $this->posts[$key] = new Post($postID, "", $content, $image, $date);
            }
        }
        return $this->posts;
    }

    public function setPost($content, $image, $connection)
    {
        $tempPost = new Post($content, $image);
        $postID = $tempPost->getPostID();
        $content = $tempPost->getContent();
        $image = $tempPost->getImage();
        $date = $tempPost->getDate();

        $sql = "INSERT INTO posts VALUES('$postID', '$this->email', '$content', '$image','$date')";
        $result = $connection->exec($sql);
        return $result;
    }

    public function createUser($connection)
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

        if ($tempUser != null) {
            $this->fname = $tempUser['FirstName'];
            $this->lname = $tempUser['LastName'];
            $this->email = $tempUser['Email'];
            $this->pass = $tempUser['Password'];
            return true;
        } else {
            return false;
        }
    }

    public function sendRequest($connection, $friendEmail)
    {
        $myEmail = $this->email;
        $sql = "INSERT INTO friends VALUES('$this->email', '$friendEmail','0')";
        $result = $connection->exec($sql);
        return $result;
    }

    public function getRequest($connection)
    {
        $this->requests = [];
        $sql = "SELECT * from user WHERE Email IN(SELECT RelatingUserEmail FROM friends WHERE RelatedUserEmail=? AND status =?)";
        $prepare = $connection->prepare($sql);
        $prepare->execute([$this->email, '0']);
        $result = $prepare->fetchAll();

        foreach ($result as $key => $value) {
            if (sizeof($result) > 0) {
                $fname = $value['FirstName'];
                $lname = $value['LastName'];
                $email = $value['Email'];
                $this->requests[$key] = new User($fname, $lname, $email);
            } else {
                return null;
            }
        }
        return $this->requests;
    }

    public function acceptRequest($connection, $friendEmail)
    {
        $sql = "UPDATE friends SET status =? WHERE RelatedUserEmail=? AND RelatingUserEmail=?";
        $prepare = $connection->prepare($sql);
        $result = $prepare->execute(['1', $this->email, $friendEmail]);

        if ($result) {
            $sql = "INSERT INTO friends VALUES('$this->email', '$friendEmail','1')";
            $result = $connection->exec($sql);
            return $result;
        }
    }

    public function rejectRequest($connection, $friendEmail)
    {
        $sql = "DELETE FROM friends WHERE RelatedUserEmail=? AND RelatingUserEmail=?";
        $prepare = $connection->prepare($sql);
        $result = $prepare->execute([$this->email, $friendEmail]);
        return $result;
    }

    public function removeFriend($connection, $friendEmail)
    {
        $sql = "DELETE FROM friends WHERE RelatedUserEmail=? AND RelatingUserEmail=? AND status =?";
        $prepare = $connection->prepare($sql);
        $result = $prepare->execute([$friendEmail, $this->email, '1']);

        if ($result) {
            $sql = "DELETE FROM friends WHERE RelatedUserEmail=? AND RelatingUserEmail=? AND status =?";
            $prepare = $connection->prepare($sql);
            $result = $prepare->execute([$this->email, $friendEmail, '1']);
            return $result;
        }
    }

    public function likePost($connection, $postID)
    {
        $sql = "SELECT email FROM likes WHERE postID=? AND email=?";
        $prepare = $connection->prepare($sql);
        $prepare->execute([$postID, $this->email]);
        $liked = $prepare->fetch()['email'];
        if ($liked != null) {
            $sql = "DELETE FROM likes WHERE postID=? AND email=?";
            $prepare = $connection->prepare($sql);
            $result = $prepare->execute([$postID, $this->email]);
            return $result;
        } else {
            $sql = "INSERT INTO likes VALUES('$postID', '$this->email')";
            $result = $connection->exec($sql);
            return $result;
        }
    }

    public function deletePost($connection, $postID)
    {
        $sql = "DELETE FROM posts WHERE postID=?";
        $prepare = $connection->prepare($sql);
        $result = $prepare->execute([$postID]);
        return $result;
    }

    public function setMessage($connection, $friend)
    {

    }

    public function getMessage($connection, $friend)
    {
        $this->messages = [];
        $sql = "SELECT * from message WHERE (fromUser=? AND toUser=?) OR (fromUser=? AND toUser=?) ORDER BY date";
        $prepare = $connection->prepare($sql);
        $prepare->execute([$this->email, $friend, $friend, $this->email]);
        $result = $prepare->fetchAll();

        foreach ($result as $key => $value) {
            if (sizeof($result) > 0) {
                $from = $value['fromUser'];
                $to = $value['toUser'];
                $message = $value['message'];
                $date = $value['date'];

                $this->messages[$key] = new Message($from, $to, $message, $date);
            } else {
                return null;
            }
        }
        return $this->messages;
    }

    public function sendMessage($connection, $friend, $message)
    {
        $date = date("Y-m-d h:i:s A");
        $sql = "INSERT INTO message VALUES('$this->email','$friend','$message','$date', '0')";
        $result = $connection->exec($sql);
        return $result;
    }

    public function setNoti($connection, $noti, $to)
    {

        $sql = "INSERT INTO notifications VALUES('$this->email','$to','$noti')";
        $result = $connection->exec($sql);
        return $result;
    }

    public function unSetNoti($connection, $noti)
    {
        $sql = "DELETE FROM notifications WHERE email=? AND type=?";
        $prepare = $connection->prepare($sql);
        $result = $prepare->execute([$this->email, $noti]);
        return $result;
    }

    public function changePassword($connection)
    {
        $sql = "UPDATE user SET Password=? WHERE Email=?";
        $prepare = $connection->prepare($sql);
        $result = $prepare->execute([md5($this->pass), $this->email]);
        return $result;
    }

    public function deleteAccount($connection)
    {
        $sql = "DELETE FROM user WHERE Email=?";
        $prepare = $connection->prepare($sql);
        $result = $prepare->execute([$this->email]);
        return $result;
    }

    public function clearData($connection)
    {

        $sql = "DELETE FROM posts WHERE email=?";

        $prepare = $connection->prepare($sql);
        $result = $prepare->execute([$this->email]);

        if ($result) {
            $sql = "DELETE FROM message WHERE fromUser=?";
            $prepare = $connection->prepare($sql);
            $result = $prepare->execute([$this->email]);
            return $result;
        }

    }

    public function editPost($connection, $postID, $newPost)
    {
        $sql = "UPDATE posts SET content=? WHERE postID=?";

        $prepare = $connection->prepare($sql);
        $result = $prepare->execute([$newPost, $postID]);
        return $result;
    }

    public function savePost($connection, $postID)
    {
        $sql = "INSERT INTO savedposts VALUES ('$postID','$this->email')";
        $result = $connection->exec($sql);
        return $result;
    }

    public function getSavedPosts($connection)
    {
        $this->savedPosts = [];

        $sql1 = "SELECT * FROM posts WHERE postID IN (SELECT postID FROM savedposts WHERE email =?) ORDER BY date DESC";
        $prepare = $connection->prepare($sql1);
        $prepare->execute([$this->email]);
        $tempPost = $prepare->fetchAll();

        foreach ($tempPost as $key => $post) {
            $email = $post['email'];
            $postID = $post['postID'];
            $content = $post['content'];
            $image = $post['image'];
            $date = $post['date'];
            $this->savedPosts[$key] = new Post($postID, $email, $content, $image, $date);
            $this->savedPosts[$key]->setPostedBy($connection);
        }
        return $this->savedPosts;
    }

    public function deleteSavedPost($connection, $postID)
    {
        $sql = "DELETE FROM savedposts WHERE postID=?";
        $prepare = $connection->prepare($sql);
        $result = $prepare->execute([$postID]);
        return $result;
    }

    public function __toString()
    {
        return "$this->fname,$this->lname, $this->email";
    }
}
