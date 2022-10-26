<?php 
include 'config.php';
session_start();
$user = $_SESSION['user'];
if(!isset($user)){
    header('location:login.html');
}
$select = mysqli_query($conn, "SELECT * FROM registration WHERE email ='$user'") or die('query failed');
if(mysqli_num_rows($select) > 0){
    $fetch = mysqli_fetch_assoc($select);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<style>
    body
    {
        margin: 10px 10px 10px 10px;
    }
</style>
<body>
    <form action="" method="post">
       <h3>Welcome! <?php echo "$user"?>, are you sure to delete your account?</h3>
       <input type="submit" name="delete" value="Delete Account">
    </form>
    <a href="profile.php"><button class="btn btn-primary"
    style="margin-top:4px; margin-bottom:5px;">Go Back</button></a>
</body>
</html>
<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'test');

if(isset($_POST['delete']))
{
    $query = "DELETE FROM `registration` WHERE `email`='$user'";
    $query_run = mysqli_query($connection,$query);
    header('location:login.html');
}

?>
