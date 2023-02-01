<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <title>Blog | Signin</title>
</head>
<body>
    
    <div class="signsection">
        <img src="media/signup/icon-4102192_1280.png" alt="">
        <div class="signbox">
            <p class="signhead">SignIn</p>
            <form action="includes/signin.inc.php" method="POST">
                <input class="userpass" name="uemail" type="text" placeholder="Johndoe@email.com">
                <input class="userpass" name="upassword" type="password"  id="myInput" placeholder="Password">
                <div class="showpass">
                    <!-- An element to toggle between password visibility -->
                    <input type="checkbox" onclick="myFunction()">
                    Show Password
                </div>
                <button class="Henrybtn" type="submit" name= "login_user">Signin</button>
                
            </form>
            <?php
                if (isset($_GET["error"])){
                    if ($_GET["error"] == "emptyfield"){
                        echo "<p class='errorwarn'>Fill in all the Fields!</p>";
                    }
                    else if ($_GET["error"] == "stmtfailed"){
                        echo "<p class='errorwarn'>Something went wrong during  signin</p>";
                    }
                }
            ?>
            <p>Dont have an account?<a href="signup.php">Signup</a></p>
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