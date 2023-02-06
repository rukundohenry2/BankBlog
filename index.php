<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
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

        <div class="blogsection">
            <?php
                $sql = "SELECT * FROM article Order by idArticle DESC";
                $result = $conn->query($sql);


                if ($result->num_rows > 0) {
                    // output data of each row
                    while($rowarticle = $result->fetch_assoc()) {
                        $articleid = $rowarticle["idArticle"];
                        $blogerid = $rowarticle["Bloggers_bloggerId"];	
                        $articlelikes = $rowarticle["likes"];
                        $articledate = $rowarticle["Date"];
                        $articletitle = $rowarticle["title"];
                        
                        $anoSql = "SELECT * FROM `articleparagraph` WHERE Article_idArticle = $articleid LIMIT 2";
                        $anoresult = $conn->query($anoSql);
                        
                        echo "<div class='article'>";
                            echo "<p class= 'articlehead'>".$articletitle."</p>";
                            echo '<a class="articlelink" href="article.php?id=' . $articleid . '">';
                                while($pararow = $anoresult->fetch_assoc()) {
                                    
                                        echo "<p class='articlepara'>".$pararow["paratext"]."</p>";
                                    
                                }
                            echo '</a>';

                            $anoSql = "SELECT * FROM `bloggers` WHERE bloggerId = ".strval($blogerid) ;
                            $anoresult = $conn->query($anoSql);

                            while($pararow = $anoresult->fetch_assoc()) {
                                echo "<div class='person'>";
                                    echo "<img src='".$pararow["imgloc"]."' alt='bloggerimage'>";
                                    echo "<div class='personal'>";
                                        echo "<p class='bloggerName'>".$pararow["firstname"]."</p>";
                                        echo "<p class='articledate'>".$articledate."</p>";
                                    echo "</div>";
                                echo "</div>";
                            }
                            ?>
                            <div class="likeComm">
                                <div class="like">
                                    <a href="">
                                        <img src="media/likescomm/icons8_facebook_like_96px_1.png" alt="">
                                    </a>
                                    <div class="likenum">
                                        <?php
                                            echo $articlelikes."  Likes";
                                        ?>
                                    </div>
                                </div>
                                <div class="comment">
                                    <img src="media/likescomm/icons8_comments_96px_1.png" alt="">
                                    <div class="commentnum">
                                        <?php
                                            echo $articlelikes."  Comments";
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        echo "</div>";
                    }
                }
            ?>          
        </div>
        
        <div class="aboutsection">
                <p class='abouthead'>About</p>
                <p class='aboutdesc'>
                    This page is a blog for the national bank of rwanda giving you
                    information on how to make use of your bank account in any bank
                    that you might own. This Blog informs the citizens of rwanda on what
                    is going on financially in the economy. this Gives you first hand information opendi
                    on how to make use of your money properly as a citizen of  rwanda. Thanks.
                </p>
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


