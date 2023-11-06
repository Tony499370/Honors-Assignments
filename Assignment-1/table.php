<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel = "stylesheet" href = "table.css">
<body>


<h2>Form Information Table</h2>

<table>
  <tr>
    <th>Sr. Number</th>
    <th>Name</th>
    <th>Email</th>
    <th>City</th>
    <th>Gender</th>
  </tr>

  <?php
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "userdata";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    echo "Connection was successful<br>";
}

$sql = "SELECT * FROM `user info.`";
$result = mysqli_query($conn, $sql);

// Find the number of records returned
$num = mysqli_num_rows($result);
echo $num;
echo " records found in the DataBase<br>";
// Display the rows returned by the sql query
if($num> 0){

    // We can fetch in a better way using the while loop
    while($row = mysqli_fetch_assoc($result)){
        // echo var_dump($row);

        echo $row['sno'];  
        echo "<td>". $row['name'] ."</td>";  
        echo "<td>". $row['email'] ."</td>";  
        echo "<td>" . $row['city'] ."</td>";  
        echo "<td>" . $row['gender'] ."</td>";  
        echo "</tr>"; 

    }


}
?>



</table>

</body>
</html>