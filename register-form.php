

<?php
echo '<span class="icon gold key">'.file_get_contents("img/svg/key.svg").'</span>';
?>

<form class="login" action="" method="post">
 <h3>New Character Sign Up</h3>
 <p class="lft hide">New Username: </p>
 <input class="whiteBG ddgray inset" type="text" name="username" placeholder="username" maxlength="60">
 <p class="lft hide">Password:</p>
<input class="whiteBG ddgray inset" type="password" name="pass" placeholder="password" maxlength="10">
 <p class="lft hide">Confirm Password:</p>
 <input class="whiteBG ddgray inset" type="password" name="pass2" placeholder="confirm password" maxlength="10">
 <input class="btn login blueBG" type="submit" name="submit" value="Register">
 </form>

<a class="btn" href="index.php">RETURN HOME</a>
