<?php
$username = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['designation'];
$phoneCode = $_POST['phoneCode'];
$phone = $_POST['phone'];
if (!empty($username) || !empty($password) || !empty($designation) || !empty($phoneCode) || !empty($phone)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "123";
    $dbname = "testdb";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $INSERT = "INSERT Into form (username, password, designation, phoneCode, phone) values(?,?, ?, ?, ?)";
     //Prepare statement
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssii", $username, $password, $designation, $phoneCode, $phone);
      $stmt->execute();
      echo "New record inserted sucessfully";
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
