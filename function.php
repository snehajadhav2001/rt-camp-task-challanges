<?php
$conn = mysqli_connect("localhost","root","","login");


if(isset($_POST["submit"])){
    if($_POST["submit"] == "add"){
        add();
    }
    else if($_POST["submit"] == "edit"){
        edit();
    }
    else{
        delete();
    }
}





function add(){
    global $conn;

    $name = $_POST["name"];
    $filename =$_FILES["file"]["name"];
    $tmpname =$_FILES["file"]["tmp_name"];

    $newfilename = uniqid() . "-" . $filename;

    move_uploaded_file($tmpname, 'uploads/' . $newfilename);
    $query = "INSERT INTO users1 VALUES('', '$name', '$newfilename')";
    mysqli_query($conn,$query);

    echo
    "
    <script> alert('User Added Successful'); document.location.href = 'index1.php'; </script>
    ";
}

function edit(){
    global $conn;

    $id = $_GET["id"];
    $name = $_POST["name"];

    if($_FILES["file"]["error"] !=4){
        $filename = $_FILES["file"]["name"];
        $tmpname = $_FILES["file"]["tmp_name"];

        $newfilename = uniqid() . "-" . $filename;

        move_uploaded_file($tmpname, 'uploads/' . $newfilename);
        $query = "UPDATE users1 SET image = '$newfilename' WHERE id = $id";
        mysqli_query($conn,$query);
    }

    $query = "UPDATE users1 SET name = '$name' WHERE id = $id";
    mysqli_query($conn,$query);
    echo
    "
    <script> alert('User Edited Successfully'); document.location.href = 'index1.php';</script>
    ";
}

function delete(){
    global $conn;

    $id = $_POST["submit"];

    $query = "DELETE FROM users1 WHERE id = $id";
    mysqli_query($conn,$query);

    echo
    "
    <script> 
    alert('USer Deleted Successfully');
    </script>
    ";
}
?>