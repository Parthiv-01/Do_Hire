<?php
    
    if(isset($_POST['search']))
    {
        $id = $_POST['id'];
        $connect = mysqli_connect("localhost","root","","test");
        $query = "SELECT `name`, `email`, `mobile`, `linkedin`, `github` FROM `registration` WHERE `id`= $id ";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
            while ($row = mysqli_fetch_array($result))
        {
            $name = $row['name'];
            $mobile = $row['mobile'];
            $email = $row['email'];
            $linkedin = $row['linkedin'];
            $github = $row['github']; 
        }
        }else{
            echo "Undefined Id !!!";
            $name = "";
            $mobile = "";
            $email = "";
            $linkedin = "";
            $github = "";
        }    
        mysqli_free_result($result);
        mysqli_close($connect);
    }else{
        $name = "";
        $mobile = "";
        $email = "";
        $linkedin = "";
        $github = "";
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Data</title>
    <style>
        body{
            background-color: grey;

        }
        input{
            width: 40%;
            height: 5%;
            border: 1px;
            border-radius: 5px;
            padding: 8px 15px 8px 15px;
            margin: 10px 20px 15px 20px;
            box-shadow: 1px 1px 2px 1px black;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <b>ID:</b><input type="number" name="id">
        <input type="submit" name="search" value="Find"><br><br>
        <b>Name:</b><input type="text" name="name" value="<?php echo $name; ?>" readonly><img src="images/images (2).png" alt="Phone" width="30" height="30"><br><br>
        <b>Mobile:</b><input type="number" name="mobile" value="<?php echo $mobile; ?>" readonly><a href="tel:<?php echo $mobile; ?>"><img src="images/download (2).png" alt="Phone" width="30" height="30"></a><br><br>
        <b>Email:</b><input type="email" name="email" value="<?php echo $email; ?>" readonly><a href="mailto:<?php echo $email; ?>"><img src="images/images (1).png" alt="Mail" width="30" height="30"></a><br><br>
        <b>Linkedin:</b><input type="text" name="linkedin" value="<?php echo $linkedin; ?>" readonly><a href="https://www.linkedin.com/in/<?php echo $linkedin;?>"><img src="images/download.png" alt="Linkedin" width="30" height="30"></a><br><br>
        <b>Github:</b><input type="text" name="github" value="<?php echo $github; ?>"<readonly><a href="https://www.github.com/<?php echo $github;?>"><img src="images/download (1).png" alt="Github" width="30" height="30"></a></readonly>    
    </form>
    <button><a href="hire.php" class="btn btn-primary">Go Back</a></button>
</body>
</html>