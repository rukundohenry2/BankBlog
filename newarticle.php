<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/newarticle.css">
    <link rel="icon" type="image/x-icon" href="media/logo/bnr_logo.png">
    <title>BLOG | NBR</title>
</head>
<body>
    <?php
        include_once "includes/dbh.inc.php";  
    ?>


    <div class="restbody">
        <div class="navigation">
            <div class="menu">
                <p class='menuheading'>Navigate</p>
                <a href=''>
                    <img src='media/icons/icons8_ratings_96px.png' alt=''>
                    <p>Trending posts</p>
                </a>
                <a href=''>
                    <img src='media/icons/icons8_info_96px_1.png' alt=''>
                    <p>About</p>
                </a>
                <a href=''>
                    <img src='media/icons/icons8_iphone_x_96px_6.png' alt=''>
                    <p>Contact info</p>
                </a>
                <a href=''>
                    <img src='media/icons/icons8_news_96px_1.png' alt=''>
                    <p>News</p>
                </a>
                <a href=''>
                    <img src='media/icons/icons8_news_96px_1.png' alt=''>
                    <p>News</p>
                </a>
                <a href='profile.php'>
                    <img src='media/icons/icons8_user_male_104px.png' alt=''>
                    <p>Profile</p>
                </a>
            </div>
        </div>
        <div class="profile">
            <div class="profilehead">
                <?php
                    if (isset($_SESSION['userfirstname'])){
                        echo "<img class='profileimg' src='".$_SESSION['imgloc']."' alt=''>";
                        echo "<p>".$_SESSION['usersecondname']." ".$_SESSION['userfirstname']."  ".$_SESSION['userlastname']."</p>";
                    }
                ?>
            </div>
            <div class="profilemenu">
                <a class="menuitem" href="profile.php">
                    <img src="media/icons/icons8_page_104px.png" alt=""> 
                    <p>Articles</p>
                </a>
                
                <a class="menuitem" href="">
                    <img src="media/icons/icons8_Plus_104px.png" alt=""> 
                    <p>New article</p>
                </a>

                <a class="menuitem" href="">
                    <img src="media/icons/icons8_edit_104px_1.png" alt=""> 
                    <p>Edit profile</p>
                </a>
            </div>
            <div class="newarticle">
                <p class="composehead">Compose new article</p>
                <form action="">
                    <div class="textheading">
                        <label for="title">Title of the Article</label>
                        <input class="titlebox" type="text" name="title" placeholder="Title goes here" id="">
                    </div>
                    <div class="textpara">
                        <label for="Paragraph">Paragraph</label>
                        <textarea name="para" id="articlepara"  rows="20" placeholder="Write your paragraph content here"></textarea>
                    </div>
                    
                    <p>Choose category</p>
                    <div class="tickbox">
                        <input type="checkbox" name="cartegory" id="">
                        <label for="cartegory">Events</label>
                    </div>
                    <div class="tickbox">
                        <input type="checkbox" name="cartegory" id="">
                        <label for="cartegory">Ideas</label>
                    </div>
                    <div class="tickbox">
                        <input type="checkbox" name="cartegory" id="">
                        <label for="cartegory">Opinions</label>
                    </div>
                    <button class="henrybtn" type="submit">Publish</button>
                </form>
                
            </div>
        </div>
    </div>
    <nav>
        <div class="logo">
            <img src="media/logo/bnr_logo.png" alt="">
            <p>National Bank Of Rwanda</p>
        </div>
        <div class="searchbar">
            <img src="media/icons/icons8_search_500px_1.png" alt="">
            <input type="text" placeholder="Search for Texts, Topics">
        </div>
        <div class="navicons">
            <img src="media/icons/icons8_facebook_96px_7.png" alt="">
            <img src="media/icons/icons8_linkedin_96px_4.png" alt="">
            <img src="media/icons/icons8_twitter_96px_2.png" alt="">
        </div>
        <?php 
            if(isset($_SESSION['userid'])){
                echo "<div class='profile'>";
                    echo "<img class='profileimg' src='".$_SESSION['imgloc']."' alt=''>";
                    echo "<div class='profdrop'>";
                        echo "<p> Hello ".$_SESSION['userfirstname']."</p>";
                        echo "<div class='logout'>";
                            echo "<img src='media/icons/icons8_imac_exit_96px.png' alt=''>";
                            echo "<a href='includes/logout.inc.php'>Logout</a>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            }
            else{
                echo "<a href='login.php'>Sign in</a>";
            }
        ?>
        
    </nav>
</body>
</html>