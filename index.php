<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>bank blog</title>
</head>
<body>
    
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mydb";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
    ?>
    <div class="restbody">
        
        <div class="navigation">
            
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
                        $anoSql = "SELECT * FROM `articleparagraph` WHERE Article_idArticle = ".strval($articleid) ;
                        $anoresult = $conn->query($anoSql);

                        echo "<div class='article'>";
                            echo "<p class= 'articlehead'>".$articletitle."</p>";
                            while($pararow = $anoresult->fetch_assoc()) {
                                echo "<p class='articlepara'>".$pararow["paratext"]."</p>";
                            }

                            $anoSql = "SELECT * FROM `bloggers` WHERE bloggerId = ".strval($blogerid) ;
                            $anoresult = $conn->query($anoSql);

                            while($pararow = $anoresult->fetch_assoc()) {
                                echo "<div class='person'>";
                                    echo "<img src='".$pararow["imgloc"]."' alt='bloggerimage'>";
                                    echo "<div class='personal'>";
                                        echo "<p class='bloggerName'>".$pararow["Name"]."</p>";
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
        <a href="signup.php">Logout</a>
    </nav>
</body>
</html>