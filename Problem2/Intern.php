<!DOCTYPE html>
<html>
<head>
<title>Interns</title>
<style>
table, th, td {
  border: 1px solid black;
}
body {
  background-color: lightblue;
}
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
</head>
<body>
  <?php
  session_start();
  $username = $_SESSION['username'];
  //connect to database
  $conn=mysqli_connect('localhost', 'Jitendra' , 'Sankar@34' , 'jobs' );
  //check connection
  if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
  }
  $sql = "SELECT * FROM users WHERE username=('$username')";

    // get the query result
    $result = mysqli_query($conn, $sql);

    // fetch result in array format
    $details = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
    $a=$details['Samsung'];
    $b=$details['Microsoft'];
    $c=$details['Google'];
    $d=$details['Apple'];
  ?>
  <h1>Home:</h1>
  <h2>Welcome <?php echo $username ; ?> </h2>
  <h4>Available Interns are:</h4>
  <table style="width:100%">
  <tr>
    <th>S.No</th>
    <th>Company Name</th> 
    <th>Time period</th>
    <th>Salary per month</th>
    <th></th>
  </tr>
  <tr>
    <td>01</td>
    <td>Samsung</td>
    <td>6months</td>
    <td>10000</td>
    <td><input type="button" onclick="window.location.href='Samsung.php'" value='<?php if($a){echo "Applied";} else{echo "Apply";}?>'> </td>
  </tr>
  <tr>
    <td>02</td>
    <td>Microsoft</td>
    <td>4months</td>
    <td>12000</td>
    <td><input type="button" onclick="window.location.href='Microsoft.php'" value='<?php if($b){echo "Applied";} else{echo "Apply";}?>'> </td>
  </tr>
  <tr>
    <td>03</td>
    <td>Google</td>
    <td>8months</td>
    <td>15000</td>
    <td><input type="button" onclick="window.location.href='Google.php'" value='<?php if($c){echo "Applied";} else{echo "Apply";}?>'> </td>
  </tr>
  <tr>
    <td>04</td>
    <td>Apple</td>
    <td>6months</td>
    <td>18000</td>
    <td><input type="button" onclick="window.location.href='Apple.php'" value='<?php if($d){echo "Applied";} else{echo "Apply";}?>'> </td>
  </tr>
  </table>
  <input type="button" class="button" onclick="window.location.href='Applied.php'" value="Applied Interns">
  <input type="button" class="button" onclick="window.location.href='Login.php'" value="Logout">


</body>
</html>