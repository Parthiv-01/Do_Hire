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
    <title>Update Profile</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/script.js"></script>
    <style>
        body{
            background-color: whitesmoke;

        }
        input{
            width: 40%;
            height: 5%;
            border: 1px;
            border-radius: 5px;
            padding: 8px 15px 8px 15px;
            margin: 10px 0px 15px 0px;
            box-shadow: 1px 1px 2px 1px grey;
        }
    </style>
</head>
<body>
    <center>
    <h1 class="card-header text-center bg-primary text-white">Update My Data</h1><br>
        <form action="" method="POST">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Update Name" value="<?php echo $fetch['name'];?>"><br>
            <label for="email">Email</label>
            <input type="text" name="email" value="<?php echo $fetch['email'];?>" readonly><br>
            <label for="mobile">Mobile</label>
            <input type="number" name="mobile" placeholder="Update Mobile" value="<?php echo $fetch['mobile'];?>"><br>
            <label for="gender">Gender</label>
            <select name="gender" id="gender">
                <option value="">--not selected--</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
                <option value="O">Other</option>
            </select><br>
            <label for="language1">First Priority Language</label>
                <select name="language1" id="language1" style="margin-top:5px;">
                    <option value="">--not selected--</option>
                    <option value="Python">Python</option>
                    <option value="Java">Java</option>
                    <option value="C++">C++</option>
                    <option value="C">C</option>
                    <option value="C#">C#</option>
                </select><br>
                <label for="language2">Second Priority Language</label>
                <select name="language2" id="language2" style="margin-top:5px;">
                    <option value="">--not selected--</option>
                    <option value="Python">Python</option>
                    <option value="Java">Java</option>
                    <option value="C++">C++</option>
                    <option value="C">C</option>
                    <option value="C#">C#</option>
                </select><br>
                <label for="language3">Third Priority Language</label>
                <select name="language3" id="language3" style="margin-top:5px;">
                    <option value="">--not selected--</option>
                    <option value="Python">Python</option>
                    <option value="Java">Java</option>
                    <option value="C++">C++</option>
                    <option value="C">C</option>
                    <option value="C#">C#</option>
                </select><br>
                <label for="developer">Developer Type</label>
                <select name="developer" id="developer" style="margin-top:5px;">
                    <option value="">--not selected--</option>
                    <option value="Front-End">Front-End</option>
                    <option value="Back-End">Back-End</option>
                    <option value="Full Stack">Full Stack</option>
                    <option value="App Developer">App Developer</option>
                </select><br>
                <label for="location">City</label>
                <input type="text" name="location" placeholder="Update City" value="<?php echo $fetch['location'];?>"><br>
            <input type="submit" name="update" style="background-color:blue; color:white;" value="UPDATE DATA"/>
        </form>
    </center>
</body>
</html>
<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'test');

if(isset($_POST['update']))
{
    $query = "UPDATE `registration` SET `name`='$_POST[name]',`email`='$_POST[email]',`mobile`='$_POST[mobile]',`gender`='$_POST[gender]',`language1`='$_POST[language1]',`language2`='$_POST[language2]',`language3`='$_POST[language3]',`developer`='$_POST[developer]',`location`='$_POST[location]' WHERE email='$_POST[email]'";
    $query_run = mysqli_query($connection,$query);
    header('location:profile.php');
}

?>