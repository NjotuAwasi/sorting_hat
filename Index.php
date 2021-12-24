<html>

<body>
  <div style="
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
      ">
    <img src="https://cdn.pixabay.com/photo/2019/03/24/12/19/harry-potter-4077473_960_720.png" alt="" height="200px" />
    <br />
    <a href="add.html"><button>Add Person</button></a>
    <a href="sort.php"><button>Put Person in House</button></a>
  </div>
</body>

</html>
<?php


session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sorting_hat";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id FROM students where hatId IS NULL ";
$result = $conn->query($sql);

$_SESSION['ids'] = array();
$_SESSION['current_student'] = 0;
$_SESSION['first_student'] = true;

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    array_push($_SESSION['ids'], $row["id"]);
  }
} else {
  
}
sort($_SESSION['ids']);


$conn->close();

?>