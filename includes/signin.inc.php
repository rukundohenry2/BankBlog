<?php
    if(isset($_POST['login_user'])){
        $uemail = $_POST['uemail'];
        $upassword = $_POST['upassword'];
        
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if (emptyInputLogin($uemail, $upassword) == true){
            header("location: ../signup.php?error=emptyfield");
            exit();
        }
        loginUser($conn,$uemail,$upassword);
    }
    else{
        header("location: ../login.php?error=invalidemail");
        exit();
    }
?>