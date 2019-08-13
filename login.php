<?php

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // -------------------------DB QUERY!
    $sql = 'SELECT * FROM $username';
    if (!$result = $link->query($sql)) {
        die('There was an error running the query [' . $link->error . ']');
    }
    // -------------------------DB OUTPUT!
    while ($row = $result->fetch_assoc()) {
        if ($_SESSION['pass'] != $row['password']) {
            echo 'password dont match yoooooo';
        } else {
            echo ' first members - not sure if this thing is in use?!!!!!';
            //include('members.php');
        }
    }
}

//else
if (isset($_POST['submit'])) {  // if form has been submitted
 // makes sure they filled it in
    if (!$_POST['username'] | !$_POST['pass']) {
        echo '<div class="login"><p class="alert">You did not fill in a required field.</p>';
        die('<a class="btn" href="">return home</a></div>');
        //die();
    }

    $username = $_POST['username'];
    // checks if the username is in use
    $usercheck = $_POST['username'];

    $query = "SELECT * FROM $usercheck";
    //$query = "SHOW TABLES LIKE $usercheck";
    $result = $link->query($query);

    if ($result == '') {
        echo '<div class="login"><p class="alert">That user does not exist in our database.</p> ';

        die('<a class="btn" href="/">return home</a></div>');
        //die();
    }

    // -------------------------DB QUERY!
    $sql = "SELECT * FROM $username";
    if (!$result = $link->query($sql)) {
        die('There was an error running the query [' . $link->error . ']');
    }
    // -------------------------DB OUTPUT!
    while ($row = $result->fetch_assoc()) {
        $_POST['pass'] = stripslashes($_POST['pass']);
        $row['password'] = stripslashes($row['password']);
        $_POST['pass'] = md5($_POST['pass']);
        //gives error if the password is wrong
        if ($_POST['pass'] != $row['password']) {
            echo'<div class="login"><p class="alert">Incorrect password, please try again.<p>';
            die('<a class="btn" href="/">return home</a></div>');
        //die();
        } elseif ($_POST['pass'] == $row['password']) {
            // if login is ok set session variables
            $_POST['username'] = stripslashes($_POST['username']);
            $_SESSION['username'] = $username = $user = $_POST['username'];
            $_SESSION['pass'] = $pass = $_POST['pass'];
            //then redirect them to the members area
            //echo ' members 2';
            $loginFlag=1;
            //echo 'LOGIN FLAG SET TO 1';
            //echo 'MEMBBBS';
            include('members.php');
            die();
        }
    }
}


//include('members.php');

if (!isset($loginFlag)) {
    ?>
 <form class="login" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
  <h3>Log In</h3>
  <p class="lft hide">Username: </p>
  <input type="text" name="username" placeholder ="username" maxlength="40">
  <p class="lft hide">Password:</p>
  <input type="password" name="pass" placeholder="password" maxlength="50">
  <input class="btn login" type="submit" name="submit" value="LOGIN">
</form>

 <?php
}
//}
