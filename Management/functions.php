<?php

require_once "classes/Post.php";
require_once "classes/Message.php";

$profilePage = '../profile.php';
$profilePageV2 = './profile.php';
$loginPage = './index.php';
$errorPage = './404.html';

header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
session_start();

function signUp($connection)
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    $user = new User($fname, $lname, $email, $pass);
    $response = $user->createUser($connection);

    if ($response) {
        $_SESSION['user'] = $user;
        header("Location: " . $GLOBALS['profilePage']);
    } else {
        header("Location: $errorPage");
    }
}

function signIn($connection)
{
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    $user = new User();
    $user->setEmail($email);
    $found = $user->find($connection);

    if ($found) {
        $userPassword = $user->getPassword();
        $userEmail = $user->getEmail();
        if ($userPassword == $pass) {
            $_SESSION['user'] = $user;
            header("Location: " . $GLOBALS['profilePage']);
        } else {
            echo "Wrong password";
        }
    } else {
        echo "User does not exist";
    }
}

function findAllUsers($connection)
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

function createPost($connection)
{
    $content = $_POST['content'];
    $user = $_SESSION['user'];
    $image = $_POST['image'];
    $result = $user->setPost($content, $image, $connection);
    if ($result) {
        header("location: " . $_SERVER['PHP_SELF']);
    }
}

if (isset($_POST['logout'])) {
    unset($_SESSION['user']);
    session_destroy();
    header("location: " . $_SERVER['PHP_SELF']);
}

function addFriend($connection)
{
    $user = $_SESSION['user'];
    $friendEmail = $_POST['addFriend'];

    $result = $user->sendRequest($connection, $friendEmail);
    if ($result) {
        $noti = "requestSent,$friendEmail";
        $user->setNoti($connection, $noti);
        message("Request Sent");
    } else {
        message("can't sent request at the moment");
    }
}

function accept($connection)
{
    $user = $_SESSION['user'];
    $friendEmail = $_POST['accept'];

    $result = $user->acceptRequest($connection, $friendEmail);
    if ($result) {
        $noti = "accept,$friendEmail";
        $user->setNoti($connection, $noti);
        header("location: " . $_SERVER['PHP_SELF']);
    }
}

function reject($connection)
{
    $user = $_SESSION['user'];
    $friendEmail = $_POST['reject'];

    $result = $user->rejectRequest($connection, $friendEmail);
    if ($result) {
        $noti = "reject,$friendEmail";
        $user->setNoti($connection, $noti);
        header("location: " . $_SERVER['PHP_SELF']);
    }
}

function likePost($connection)
{
    $user = $_SESSION['user'];
    $postID = $_POST['like'];
    $result = $user->likePost($connection, $postID);
    if ($result) {
        $type = "like";
        // $user->setNoti($connection, $type);

        header("location: " . $_SERVER['PHP_SELF']);
    }

}

function deletePost($connection)
{
    $user = $_SESSION['user'];
    $postID = $_POST['delete'];
    $result = $user->deletePost($connection, $postID);
    if ($result) {
        header("location: " . $_SERVER['PHP_SELF']);
    }

}

function editPost($connection)
{
    $user = $_SESSION['user'];
    $postID = $_POST['update'];
    $newPost = $_POST['newPost'];

    $result = $user->editPost($connection, $postID, $newPost);
    if ($result) {
        header("location: " . $_SERVER['PHP_SELF']);
    }

}

function removeFriend($connection)
{
    $user = $_SESSION['user'];
    $friendEmail = $_POST['removeFriend'];
    $result = $user->removeFriend($connection, $friendEmail);
    if ($result) {
        header("location: " . $_SERVER['PHP_SELF']);
    }

}

function message($string)
{
    echo "<script> alert('$string') </script>";
}

function postsForFeed($connection = null)
{
    $posts = [];
    $sql = "SELECT * FROM posts ORDER BY date DESC";
    $prepare = $connection->prepare($sql);
    $prepare->execute();
    $result = $prepare->fetchAll();

    foreach ($result as $key => $tempPost) {
        if (sizeof($result) > 0) {
            $postID = $tempPost['postID'];
            $email = $tempPost['email'];
            $content = $tempPost['content'];
            $image = $tempPost['image'];
            $date = $tempPost['date'];

            $posts[$key] = new Post($postID, $email, $content, $image, $date);
        }
    }
    return $posts;

}

function sendMessage($connection)
{
    $_SESSION['friend'] = $_POST['send'];

    $friend = $_SESSION['friend'];
    $user = $_SESSION['user'];
    $message = $_POST['content'];

    $result = $user->sendMessage($connection, $friend, $message);

    if ($result) {
        header("location: " . $_SERVER['PHP_SELF']);
    }

}

function changepassword($connection)
{
    $newPass = $_POST['nPass'];
    $rePass = $_POST['rPass'];
    $oldPass = $_POST['oPass'];

    $user = $_SESSION['user'];

    if ($newPass == $rePass) {
        if ($oldPass == $user->getPassword()) {
            $user->setPassword($newPass);
            $done = $user->changePassword($connection);
            echo $done;
            if ($done) {

                echo "password changed";
            }
        } else {
            echo "wrong old password";
        }
    } else {
        echo "new password do not match";
    }

}

function deleteAccount($connection)
{
    $user = $_SESSION['user'];
    $result = $user->deleteAccount($connection);
    if ($result) {
        unset($_SESSION['user']);
        session_destroy();
        header("location: ./index.php");

    }

}

function clearData($connection)
{
    $user = $_SESSION['user'];
    $result = $user->clearData($connection);
    if ($result) {
        unset($_SESSION['user']);
        session_destroy();
        header("location: ./index.php");

    }

}

function displayMessages($connection)
{
    $email = $_SESSION['user']->getEmail();
    // echo $email;
    $unread = [];
    $sql = 'SELECT DISTINCT fromUser, toUser FROM message WHERE toUser = ? AND seen = ? ORDER BY DATE';
    $prepare = $connection->prepare($sql);
    $prepare->execute([$email, 0]);
    $result = $prepare->fetchAll();

    foreach ($result as $key => $value) {
        if (sizeof($result) > 0) {
            $from = $value['fromUser'];
            $to = $value['toUser'];
            $unread[$key] = new Message($from, $to, "", "");

        } else {
            return null;
        }
    }
    return $unread;
}

function unsetMessages($connection, $friend)
{
    $email = $_SESSION['user']->getEmail();

    $sql = "UPDATE message SET seen = ? WHERE fromUser = ? AND toUser=?";
    $prepare = $connection->prepare($sql);
    $prepare->execute([1, $friend, $email]);
}

function displayNotification($connection)
{
    $email = $_SESSION['user']->getEmail();

    $sql = "SELECT * FROM ";
}

function savePost($connection)
{
    $postId = $_POST['save'];
    $user = $_SESSION['user'];
    $result = $user->savePost($connection, $postId);
    if ($result) {
        header("location: " . $GLOBALS['profilePageV2']);
    } else {
        message("Post already Saved");
    }

}

function deleteSaved($connection)
{
    $postID = $_POST['deleteSaved'];
    $user = $_SESSION['user'];
    $result = $user->deleteSavedPost($connection, $postID);
    if ($result) {
        header("location: " . $_SERVER['PHP_SELF']);
    }

}
