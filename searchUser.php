
<div class="search-bar">
    <div method="" action="" class="search">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
        <input type="text" name="search" placeholder="Find a friend">
    </div>
</div>

<?php
require_once './php/functions.php';
require_once './php/main.php';

$allUsers = [];

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

echo "<div class='allUsers'>";

foreach ($allUsers as $key => $value) {
    $name = $value->getFname() . " " . $value->getLname();
    echo "<form>
                    <span>$name</span>
                    <button type='submit'>Add Friend</button>
                    <button type='submit'>View</button>
                </form>
                ";
}
echo "</div>";
