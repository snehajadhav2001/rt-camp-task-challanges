<?php
require 'function.php';
$id = $_GET["id"];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users1 WHERE id = $id"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form class="" action="" method="post" enctype="multipart/form-data">

        Name
        <input type="text" name="name" value="<?php echo $user['name']; ?>" required><br>
        Image
        <input type="file" name="file" required><br>
        <button type="submit" name="submit" value="edit">Edit</button>
    </form>
    <br>
    <a href="index1.php">Index Page</a>
</body>
</html>