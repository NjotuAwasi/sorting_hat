<?php 
require 'connection.php';

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$age = $_POST["age"];
$gender = $_POST["gender"];
$interests =$_POST["interests"];
$phone = $_POST["number"];

$sql = "INSERT INTO students (firstname, lastname, age, gender, interests, telephone )
VALUES ('$firstname', '$lastname', '$age', '$gender', '$interests', '$phone')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo "<br /><br /><a href='index.php'><button>Go Home</button></a>";
?>


