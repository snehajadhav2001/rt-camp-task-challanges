<?php 

include 'connect.php';

if(isset($_POST['signup'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);
    
    $checkemail = "SELECT * from users where email = '$email'";
    $result = $conn->query($checkemail);
    if($result->num_rows>0){
        echo "Email Address Already Exists!";
    }
    else{
        $insertquery = "INSERT INTO users(fname,lname,email,password)
                        VALUES('$fname','$lname','$email','$password')";

                if($conn->query($insertquery)==TRUE){
                    header("location:home.php");
                }
                else{
                    echo "Error:".$conn->error;
                }
    }
}



if(isset($_POST['signin'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);
    
    $sql = "SELECT * FROM users WHERE email='$email' and password='$password'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['email']=$row['email'];
        header("Location:homepage.php");
        exit();
    }
    else{
        echo "Not Found, Incorrect Email or Password";
    }
    
}
?>