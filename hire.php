<?php
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM `registration` WHERE CONCAT(`name`,`gender`,`location`,`language1`,`language2`,`language3`,`developer`)LIKE'%".$valueToSearch."%';";
    $search_result = filterTable($query);
}else{
    $query = "SELECT * FROM `registration`";
    $search_result = filterTable($query);
}
function filterTable($query)
{
    $connect = mysqli_connect("localhost","root","","test");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hire Someone</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <style>
        body
        {
            margin: 10px 10px 10px 10px;
        }
        table,tr,td,th
        {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="valueToSearch" placeholder="Search"><br><br>
        <input type="submit" name="search" value="Filter"><br><br>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>City</th>
                <th>First Priority Language</th>
                <th>Second Priority Language</th>
                <th>Third Priority Language</th>
                <th>Developer</th>
            </tr>
            <?php
                while($row = mysqli_fetch_array($search_result)):
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <td><?php echo $row['language1']; ?></td>
                <td><?php echo $row['language2']; ?></td>
                <td><?php echo $row['language3']; ?></td>
                <td><?php echo $row['developer']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table><br>
    </form>
    <h3>Copy the ID, then click here &rArr;<a href="data.php"><button class="btn btn-secondary"
    style="margin-top:4px; margin-bottom:5px;">Get Details</button></a></h3><br>
    <a href="home.html"><button class="btn btn-primary"
    style="margin-top:4px; margin-bottom:5px;">Go Back</button></a>
</body>
</html>