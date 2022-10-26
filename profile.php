<?php 
include 'config.php';
session_start();
$user = $_SESSION['user'];
if(!isset($user)){
    header('location:login.html');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>
    <div class="row justify-content-center">
        <div class="card w-50 my-auto shadow" >
            <?php
                $select = mysqli_query($conn, "SELECT * FROM registration WHERE email ='$user'") or die('query failed');
                if(mysqli_num_rows($select) > 0){
                    $fetch = mysqli_fetch_assoc($select);
                }
            ?>
                <h1 class="card-header text-center bg-primary text-white">My Profile</h1>
            <?php
                if($fetch['gender']=='M'){
                    echo'<img src=images\icon-5359553_1280.png>';
                }elseif($fetch['gender']=='F'){
                    echo'<img src=images\icon-5359554_1280.png>';
                }elseif($fetch['gender']=='O'){
                    echo'<img src=images\free-user-icon-3296-thumb.png>';
                }
            ?>
            <table class="table">
                <tr>
                    <th>Name: </th>
                    <td><?php echo $fetch['name'];?></td>
                </tr>
                <tr>
                    <th>Email: </th>
                    <td><?php echo $fetch['email'];?></td>
                </tr>
                <tr>
                    <th>Mobile: </th>
                    <td><?php echo $fetch['mobile'];?></td>
                </tr>
                <tr>
                    <th>First Priority Language: </th>
                    <td><?php echo $fetch['language1'];?></td>
                </tr>
                <tr>
                    <th>Second Priority Language: </th>
                    <td><?php echo $fetch['language2'];?></td>
                </tr>
                <tr>
                    <th>Third Priority Language: </th>
                    <td><?php echo $fetch['language3'];?></td>
                </tr>
                <tr>
                    <th>Developer type: </th>
                    <td><?php echo $fetch['developer'];?></td>
                </tr>
                <tr>
                    <th>City: </th>
                    <td><?php echo $fetch['location'];?></td>
                </tr>
                <tr>
                    <th>Linkedin Username: </th>
                    <td><?php echo $fetch['linkedin'];?></td>
                </tr>
                <tr>
                    <th>Github Username: </th>
                    <td><?php echo $fetch['github'];?></td>
                </tr>
            </table>
            <a href="update.php" class="btn btn-primary">Update Profile</a>
            <a href="home.html" class="btn btn-secondary">Go Back</a>            
            <button style="background-color:yellow; border-color:red; border-radius:1ex"><a href="reset.php"><b>Delete Account</b></a></button> 
        </div>
    </div>
</body>
</html>