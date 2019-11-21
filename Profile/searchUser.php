<?php
echo "<div class='allUsers'>";
echo "<form method='POST'>";
foreach ($allUsers as $key => $value) {
    $friendName = $value->getFname() . " " . $value->getLname();
    $friendEmail = $value->getEmail();
    echo "  <div class='searchItem'>
                <span>$friendName</span>
                <button name='addFriend' value='$friendEmail'>
                    Add Friend
                </button>
                <button name='friendProfile' value='$friendEmail'>
                    View
                </button>
             </div>
                ";
}
echo "</form>";
echo "</div>";
?>

<div class="search-bar">
<button class="menu">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg>
</button>
    <div method="" action="" class="search">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
        <input type="text" name="search" placeholder="Find a friend">
    </div>
    <form action="" method="post">
    <button class="logout" type="submit" name='logout' value='logout'>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10.09 15.59L11.5 17l5-5-5-5-1.41 1.41L12.67 11H3v2h9.67l-2.58 2.59zM19 3H5c-1.11 0-2 .9-2 2v4h2V5h14v14H5v-4H3v4c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/></svg>
    </button>
    </form>
</div>
