<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];
	$language1 = $_POST['language1'];
	$language2 = $_POST['language2'];
	$language3 = $_POST['language3'];
	$developer = $_POST['developer'];
	$location = $_POST['location'];
	$linkedin = $_POST['linkedin'];
	$github = $_POST['github'];
	$mobile = $_POST['mobile'];


	// Database connection
	$conn = new mysqli("localhost","root","","test");
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$query1="SELECT * FROM registration WHERE email='$email'";
		$run=mysqli_query($conn,$query1);
		if(mysqli_num_rows($run)>0){
			echo "Email is already registered";
		}else{
		$stmt = $conn->prepare("insert into registration(name, email, password, gender, language1, language2, language3, developer, location, linkedin, github, mobile) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssssssssi", $name, $email, $password, $gender, $language1, $language2, $language3, $developer, $location, $linkedin, $github, $mobile);
		$execval = $stmt->execute();
		$stmt->close();
		$conn->close();
        header('Location: login.html');
		}
	}
?>