<?php

    function emptyInputSignup($firstname,$middlename, $email, $phonenumber, $password_1, $password_2){
        $result;
        if(empty($firstname)||empty($middlename)||empty($email)||empty($phonenumber)||empty($password_1)||empty($password_2)){
            $result=true;
        }  
        else{
            $result = false;
        }
        return $result;
    }
    function invalidEmail($email){
        $result;
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }
    function invalidPhone($phonenumber){
        $result;
        if(!preg_match("/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/",$phonenumber)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }
    function passwordMatch($password_1,$password_2){
        $result;
        if($password_1 !== $password_2){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }
    function emailExists($conn,$email){
        $sql = "SELECT * FROM bloggers WHERE useremail = ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt,$sql)){
            header("location:../signup.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt,"s",$email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($resultData)){
            return $row;
            echo $upassword.$uemail;
        }
        else{ 
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
    }

    function createUser($conn, $firstname,$middlename,$lastname,$email,$phonenumber, $password_1){
        $sql = "INSERT INTO  bloggers (firstname,middlename,lastname,useremail,userphonenumber,userpassword)VALUES(?,?,?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt,$sql)){
            echo "inside here";
            header("location:../signup.php?error=stmtfailed");
            exit();
        }
        $hashedpwd = password_hash($password,PASSWORD_BCRYPT);

        mysqli_stmt_bind_param($stmt,"ssssss",$firstname,$middlename,$lastname,$email,$phonenumber, $hashedpwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../login.php?error=none");
        exit();
    }

    function emptyInputLogin($email,$password){
        $result;
        if(empty($email)||empty($password)){
            $result=true;
        }  
        else{
            $result = false;
        }
        return $result;
    }
    function loginUser($conn,$email,$password){
        $userExists = emailExists($conn,$email);

        if ($userExists === false){
            echo "user doesnt exist";
            header("location: ../login.php?error=wronglogin");
            exit();
        }
        
        $passhashed = $userExists["userpassword"];
        $checkpwd = password_verify($password,$passhashed);
        
        
        if ($checkpwd === false){
            echo $password;
            echo 'sth happened';
            // header("location: ../login.php?error=wrongpassword");
            exit();
        }
        
        else if ($checkpwd === true){
            session_start();
            $_SESSION["userid"] = $userExists['bloggerId'];
            $_SESSION["userfirstname"] = $userExists['firstname'];
            $_SESSION["usersecondname"] = $userExists['lastname'];
            $_SESSION["userlastname"] = $userExists['middlename'];
            //$_SESSION["useremail"] = $userExists['useremail'];
            $_SESSION["imgloc"] = $userExists['imgloc'];
            
            header("location: ../index.php");
            exit();
        }
    }
?>