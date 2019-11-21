<form class="signUp" action="./management/main.php" method="POST" >
    <div class="field-container">
        <div class="icon"></div>
        <input type="text" placeholder="First Name" name="fname" required autocomplete="given-name">
    </div>

    <div class="field-container">
        <div class="icon"></div>
        <input type="text" placeholder="Last Name" name="lname" required autocomplete="family-name">
    </div>

    <div class="field-container">
        <div class="icon"></div>
        <input type="email" placeholder="Email" name="email" required autocomplete="email">
    </div>

    <div class="field-container">
        <div class="icon"></div>
        <input type="password" placeholder="Password" name="pass" required autocomplete="new-password">
    </div>
    <br>
    <button type="submit" name="signUp">Create Account</button>
</form>
