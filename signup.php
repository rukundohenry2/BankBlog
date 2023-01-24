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
            <form action="includes/register.php" method="POST">
                <input class="userpass" name="fullname" type="text" placeholder="Fullname">
                <input class="userpass" name="email" type="text" placeholder="Johndoe@email.com">
                <input class="userpass" name="phonenumber" type="text" placeholder="Phonenumber e.g +250">
                <input class="userpass" name="password_1" type="password"  id="myInput" placeholder="Password">
                <input class="userpass" name="password_2" type="password"  id="myInput" placeholder="Confirm password">
                <div class="showpass">
                    <!-- An element to toggle between password visibility -->
                    <input type="checkbox" onclick="myFunction()">
                    Show Password
                </div>
                <button class="Henrybtn" type="submit">Register</button>
                
            </form>
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