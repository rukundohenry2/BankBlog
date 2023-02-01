<?php
 
if (isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($firstname,$middlename,$lastname, $email, $phonenumber, $password_1, $password_2) == true){
        header("location: ../signup.php?error=emptyfield");
        exit();
    }
    if (invalidEmail($email) == true){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if (invalidPhone($phonenumber) == true){
        header("location: ../signup.php?error=invalidphone");
        exit();
    }
    if (passwordMatch($password_1,$password_2) == true){
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if (emailExists($conn,$email) !== false){
        header("location: ../signup.php?error=emailexists");
        exit();
    }
    if (emailExists($conn,$email) !== false){
        header("location: ../signup.php?error=emailexists");
        exit();
    }
    
    createUser($conn, $firstname,$middlename,$lastname,$email,$phonenumber, $password_1);

    
}
else{
    header("location: ../signup.php");
}





 
// Starting the session, necessary
// for using session variables
// session_start();
  
// // Declaring and hoisting the variables
// $fullname ="";
// $email = "";
// $phonenumber = "";
// $errors = array();
// $_SESSION['success'] = "";
  
// // DBMS connection code -> hostname,
// // username, password, database name
// $db = mysqli_connect('localhost', 'root', '', 'mydb');
  
// // Registration code
// if (isset($_POST['reg_user'])) {
  
//     // Receiving the values entered and storing
//     // in the variables
//     // Data sanitization is done to prevent
//     // SQL injections
//     $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
//     $email = mysqli_real_escape_string($db, $_POST['email']);
//     $phonenumber = mysqli_real_escape_string($db, $_POST['phonenumber']);
//     $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
//     $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  
//     // Ensuring that the user has not left any input field blank
//     // error messages will be displayed for every blank input
//     if (empty($fullname)) { array_push($errors, "Fullname is required"); }
//     if (empty($email)) { array_push($errors, "Email is required"); }
//     if (empty($password_1)) { array_push($errors, "Password is required"); }
  
//     if ($password_1 != $password_2) {
//         array_push($errors, "The two passwords do not match");
//         // Checking if the passwords match
//     }
  
//     // If the form is error free, then register the user
//     if (count($errors) == 0) {
         
//         // Password encryption to increase data security
//         $password = md5($password_1);
         
//         // Inserting data into table
//         $query = "INSERT INTO bloggers ('Name', 'email', 'phonenumber','password')
//                   VALUES(".$fullname.", ".$email.", ".$phonenumber.",".$password.")";

//         mysqli_query($db, $query);
  
//         // Storing username of the logged in user,
//         // in the session variable
//         $_SESSION['username'] = $fullname;
         
//         // Welcome message
//         $_SESSION['success'] = "You have logged in";
         
//         // Page on which the user will be
//         // redirected after logging in
//         header('location: index.php');
//     }
// }
?>