<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <title>Blog | Signup</title>
</head>
<body>
    
    <div class="signsection">
        <img src="media/signup/icon-4102192_1280.png" alt="">
        <div class="signbox">
            <p class="signhead">SignUp</p>
            <form action="includes/register.inc.php" method="POST">
                <input class="userpass" name="firstname" type="text" placeholder="First Name">
                <input class="userpass" name="middlename" type="text" placeholder="Middle Name">
                <input class="userpass" name="lastname" type="text" placeholder="Last Name">
                <input class="userpass" name="email" type="text" placeholder="Johndoe@email.com">
                <input class="userpass" name="phonenumber" type="text" placeholder="Phonenumber e.g +250">
                <input class="userpass" name="password_1" type="password"  id="myInput" placeholder="Password">
                <input class="userpass" name="password_2" type="password"  id="myInp" placeholder="Confirm password">
                <div class="showpass">
                    <!-- An element to toggle between password visibility -->
                    <input type="checkbox" onclick="myFunction()">
                    Show Password
                </div>
                <button class="Henrybtn" type="submit" name="submit">Register</button>
                
            </form>
            <?php
                if (isset($_GET["error"])){
                    if ($_GET["error"] == "emptyfield"){
                        echo "<p class='errorwarn'>Fill in all the Fields!</p>";
                    }
                    else if ($_GET["error"] == "invalidemail"){
                        echo "<p class='errorwarn'>Write a proper email</p>";
                    }
                    else if ($_GET["error"] == "invalidphone"){
                        echo "<p class='errorwarn'>Write a proper phone number</p>";
                    }
                    else if ($_GET["error"] == "passwordsdontmatch"){
                        echo "<p class='errorwarn'>Passwords dont match</p>";
                    }
                    else if ($_GET["error"] == "emailexists"){
                        echo "<p class='errorwarn'>An account already used that Email</p>";
                    }
                    else if ($_GET["error"] == "stmtfailed"){
                        echo "<p class='errorwarn'>Something went wrong during  signup</p>";
                    }
                }
            ?>
            <p>Already have an account?<a href="login.php">Signin</a></p>
        </div>
    </div>

    <nav>
        <div class="logo">
            <img src="media/logo/bnr_logo.png" alt="">
            <p>National Bank Of Rwanda</p>
        </div>
        <div class="navicons">
            <img src="media/icons/icons8_facebook_96px_7.png" alt="">
            <img src="media/icons/icons8_linkedin_96px_4.png" alt="">
            <img src="media/icons/icons8_twitter_96px_2.png" alt="">
        </div>
    </nav>

    <script type="text/javascript" src="js\main.js"></script>
</body>
</html>