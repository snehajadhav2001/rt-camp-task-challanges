<?php require 'function.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border=1 cellpadding=10 cellspacing=0>
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Image</td>
            <td>Action</td>
        </tr>

        <?php
        $users1 = mysqli_query($conn, "SELECT * FROM users1");
        $i =1;

        foreach($users1 as $user):
        ?>

        <tr>
            <td> <?php echo $i++; ?> </td>
            <td> <?php echo $user["name"]; ?> </td>
            <td> <img src="uploads/<?php echo $user["image"]; ?>" width="200" </td>
            <td>
                <a href="edituser.php?id=<?php echo $user['id']; ?>">Edit</a>
                <form class="" action="" method="post">
                    <button type="submit" name="submit" value= <?php echo $user['id']; ?>>Delete</button>
                </form>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <br>
    <a href="accountpage.php">Add User Page</a>
</body>
</html>